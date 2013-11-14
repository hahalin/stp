

<body class="clearfix with-menu with-shortcuts">

	<!-- Prompt IE 6 users to install Chrome Frame -->
	<!--[if lt IE 7]><p class="message red-gradient simpler">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	<!-- Title bar -->
	<header role="banner" id="title-bar">
		<h2><?php echo $title; ?></h2>
	</header>

	<!-- Button to open/hide menu -->
	<a href="#" id="open-menu"><span>選單</span></a>

	<!-- Button to open/hide shortcuts -->
	<a href="#" id="open-shortcuts"><span class="icon-thumbs"></span></a>

	<!-- Main content -->
	<section role="main" id="main">

		<noscript class="message black-gradient simpler">Your browser does not support JavaScript! Some features won't work as expected...</noscript>

		<hgroup id="main-title" class="thin">
			<h1><?php echo $title; ?></h1>
		</hgroup>

		<div class="with-padding">
			<!--
			<p class="wrapped left-icon icon-info-round">
				Tables are responsive, too! Try resizing your browser
			</p>
			-->
			
			<h4>
				<?php echo $activebread; ?>
			</h4>		
			<div class="table-header button-height">
			</div>
			<table class="table responsive-table responsive-table-on" id="sorting-advanced">
				<thead>
					<tr>
						<th scope="col"><input type="checkbox" name="check-all" id="check-all" value="1"></th>
						<th scope="col">省份</th>
						<th scope="col">公司名稱</th>
						<th scope="col">地址</th>
						<th scope="col" width="60" class="align-center">action</th>	
						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="6">
							<?php
							$paged=$companies->paged;
							echo $paged->items_on_page;							
							//echo count($companies); 
							?> entries found
						</td>
					</tr>
				</tfoot>

				<tbody>
					
						
						<!--<td><small class="tag">User</small> <small class="tag">Client</small> <small class="tag green-bg">Valid</small></td>
						-->
					<?php
								
					foreach($companies as $cmp)
					{
						echo '<tr>';
						echo '<th scope="row" class="checkbox-cell"><input type="checkbox" name="checked[]" id="check-1" value="1"></th>';
						$p=$cmp->province->get();
						echo '<td>'.$p->name.'</td>';
						echo '<td>'.$cmp->name.'</td>';
						echo '<td>'.$cmp->addr.'</td>';
						$company_url=base_url().'/companycrl/company/'.$cmp->id;
						echo '<td class="low-padding align-center"><a href="'.$company_url.'" target="_blank"  class="button compact icon-gear">明細</a></td>';
						echo '</tr>';
					}
					?>
						
					
				</tbody>
			</table>
			<form method="post" action="" class="table-footer button-height large-margin-bottom">
				<div class="float-right">

				<?php 
						$page_url='companycrl/category/';
						$paged=$companies->paged;
						
						$iStart;
						$iEnd;
						$iListLength=7;
						$iHalf=floor($iListLength);
						
						if ( $paged->total_pages < $iListLength) {
							$iStart = 1;
							$iEnd = $paged->total_pages;
						}
						else if ( $paged->current_page <= $iHalf ) {
							$iStart = 1;
							$iEnd = $iListLength;
						} else if ( $paged->current_page >= ($paged->total_pages-$iHalf) ) {
							$iStart = $paged->total_pages - $iListLength + 1;
							$iEnd = $paged->total_pages;
						} else {
							$iStart = $paged->current_page - $iHalf + 1;
							$iEnd = $iStart + $iListLength - 1;
						}
						
						//echo $iStart.' - '.$iEnd;
						
						$prevclass=$iStart==1?'active':'';
						$ipage=$iStart-$iListLength;
						
						echo '<div class="button-group">';
						//<a href="#" title="First page" class="button blue-gradient glossy"><span class="icon-previous"></span></a>
						//<a href="#" title="Previous page" class="button blue-gradient glossy"><span class="icon-backward"></span></a>
						
						if ($ipage <=1)
						{
							$link=$mylink.'/1';
							//echo '<li class="'.$prevclass.'"><a href="'.$link.'"><</a></li>';
							echo '<a href="'.$link.'" title="First page" class="button blue-gradient glossy"><span class="icon-previous"></span></a>';
						
						}
						else 
						{
							$link=$mylink.'/1';
							//echo '<li class="'.$prevclass.'"><a href="'.$link.'"><</a></li>';
							echo '<a href="'.$link.'" title="First page" class="button blue-gradient glossy"><span class="icon-previous"></span></a>';
							$link=$mylink.'/'.($iStart-1);
							//echo '<li class="'.$prevclass.'"><a href="'.$link.'">1</a></li>';
							//echo '<a href="'.$link.'" title="Previous page" class="button blue-gradient glossy"><span class="icon-backword"></span></a>';
							$link=$mylink.'/'.$ipage;
							//echo '<li class="'.$prevclass.'"><a href="'.$link.'">...</a></li>';
							//echo '<a href="'.$link.'" title="..." class="button blue-gradient glossy">...</a>';
							echo '<a href="'.$link.'" title="Previous page" class="button blue-gradient glossy"><span class="icon-backward"></span></a>';
						}
						echo '</div>';	
						
						echo '<div class="button-group">';
						for ( $j=$iStart ; $j<=$iEnd ; $j++ ) {
							$sClass = ($j==$paged->current_page) ? 'active' : '';
							$link=$mylink.'/'.$j;
							//echo '<li class="'.$sClass.'"><a href="'.$link.'">'.($j).'</a></li>';
							echo '<a href="'.$link.'" class="button blue-gradient glossy '.$sClass.'">'.($j).'</a>';			
						}
						echo '</div>';
						
						echo '<div class="button-group">';
						//<a href="#" title="Next page" class="button blue-gradient glossy"><span class="icon-forward"></span></a>
						//<a href="#" title="Last page" class="button blue-gradient glossy"><span class="icon-next"></span></a>
						if ($paged->total_pages >= $iEnd)
						{
							$ipage=$iEnd+$iListLength;
							if ($ipage >$paged->total_pages)
							{
							  $ipage=$paged->total_pages;
							  $link=$mylink.'/'.($ipage);	
							  //echo '<li><a href="'.$link.'">'.$ipage.'</a></li>';	
 							  echo '<a href="'.$link.'" title="Last page" class="button blue-gradient glossy"><span class="icon-next"></span></a>';							
							}
							else 
							{
							  $link=$mylink.'/'.($ipage);	
							  //echo '<li><a href="'.$link.'">...</a></li>';	
							  //echo '<a href="'.$link.'" title="..." class="button blue-gradient glossy">...</a>';			
							  echo '<a href="'.$link.'" title="Next page" class="button blue-gradient glossy"><span class="icon-forward"></span></a>';	
							  
							  $nextclass=$iEnd==$paged->total_pages?'active':'';
							  $link=$mylink.'/'.($iEnd+1); 
							  //echo '<a href="'.$link.'" title="Next page" class="button blue-gradient glossy"><span class="icon-forward"></span></a>';	

							  $link=$mylink.'/'.($paged->total_pages);
							  //echo '<li><a href="'.$link.'">'.$paged->total_pages.'</a></li>';
							  echo '<a href="'.$link.'" title="Last page" class="button blue-gradient glossy"><span class="icon-next"></span></a>';	
							}
							
						}
						echo '</div>';

						//$nextclass=$iEnd==$paged->total_pages?'active':'';
						//$link=$mylink.'/'.($iEnd+1);
						//echo '<li class="'.$nextclass.'"><a href="'.$link.'">></a></li>';
					?>
					<!--
					<div class="button-group">
						<a href="#" title="First page" class="button blue-gradient glossy"><span class="icon-previous"></span></a>
						<a href="#" title="Previous page" class="button blue-gradient glossy"><span class="icon-backward"></span></a>
					</div>

					<div class="button-group">
						<a href="#" title="Page 1" class="button blue-gradient glossy">1</a>
						<a href="#" title="Page 2" class="button blue-gradient glossy active">2</a>
						<a href="#" title="Page 3" class="button blue-gradient glossy">3</a>
						<a href="#" title="Page 4" class="button blue-gradient glossy">4</a>
					</div>

					<div class="button-group">
						<a href="#" title="Next page" class="button blue-gradient glossy"><span class="icon-forward"></span></a>
						<a href="#" title="Last page" class="button blue-gradient glossy"><span class="icon-next"></span></a>
					</div>
					-->
				</div>
				<span class="select blue-gradient glossy mid-margin-left replacement select-styled-list tracked" tabindex="0">
					
				</span>
				<!--
				With selected:
				<span class="select blue-gradient glossy mid-margin-left replacement select-styled-list tracked" tabindex="0"><select name="select90" class="withClearFunctions" tabindex="-1">
					<option value="0">Delete</option>
					<option value="1">Duplicate</option>
					<option value="2">Put offline</option>
					<option value="3">Put online</option>
					<option value="4">Move to trash</option>
				</select><span class="select-value">Delete</span><span class="select-arrow"></span><span class="drop-down"></span></span>
				<button type="submit" class="button blue-gradient glossy">Go</button>
				-->
			</form>
			

			
			

		</div>

	</section>
	<!-- End main content -->

	<?php $this->load->view('developer-admin/sidetabs'); ?>

	<!-- Sidebar/drop-down menu -->
	<section id="menu" role="complementary">

		<!-- This wrapper is used by several responsive layouts -->
		<div id="menu-content">

			<?php $this->load->view('developer-admin/profilediv'); ?>

			

			<section class="navigable">
				<ul class="big-menu">
							<li class="with-right-arrow"><span>企業分類</span>
							<ul class="big-menu">
							
							<?php 
								
								$i=1;
								//$bzcategory=array();
								foreach ($bzcategory as $item) {
									
									//$active = $item -> active ? 'open' : '';
									$active=$item->active?'open':'closed';
									if (count($item->children)>0)
									{
							 		  //echo '<li class="width-right-arrow">'.count($item->children);
									}
									{
										//echo '<li>';
									}
									//echo '<a href="'.$baselink.'/'.$item->id.'" cid="'.$item->id.'">';
									$liclass="";
									if ($item->active)
									{
										$liclass="current";
									}
									if (count($item->children)>0)
									{
										echo '<li class="with-right-arrow"><span class="'.$liclass.'"><span class="list-count">'.count($item->children).'</span>'.$item->name.'</span>';
									}
									else 
									{
										echo '<li>'.$item->name;
									}
									//echo '</li>';
									
									if (count($item->children)>0)
									{
										echo '<ul class="big-menu">';
										foreach ($item->children as $citem)
										{
												echo '<li>';
												$liclass="";
												$active="";
												if ($citem->active)
												{
													$active='current navigable-current';
													//$liclass=''
												}
												echo '<a href="'.$baselink.'/'.$citem->id.'" class="'.$active.'">';
												echo '<span><span class="list-count">'.$citem->cmpcount.'</span>';
												echo $citem -> name;
												echo '</span>';
												echo '</a>';
												echo '</li>';
											
										}
										echo '</ul>';
									}
									echo '</li>';
								}
								
							?>
							</ul>
							</li>
							<li class="with-right-arrow"><span>商品分類</span>
							<ul class="big-menu">
							<?php 
								
								$i=1;
								//$bzcategory=array();
								foreach ($category as $item) {
									
									//$active = $item -> active ? 'open' : '';
									$active=$item->active?'open':'closed';
									if (count($item->children)>0)
									{
							 		   //echo '<li class="width-right-arrow">'.count($item->children);
									}
									{
										//echo '<li>';
									}
									//echo '<a href="'.$baselink.'/'.$item->id.'" cid="'.$item->id.'">';
									$liclass="";
									if ($item->active)
									{
										$liclass="current";
									}
									if (count($item->children)>0)
									{
										echo '<li class="with-right-arrow"><span class="'.$liclass.'"><span class="list-count">'.count($item->children).'</span>'.$item->name.'</span>';
									}
									else 
									{
										echo '<li>'.$item->name;
									}
									//echo '</li>';
									
									if (count($item->children)>0)
									{
										echo '<ul class="big-menu">';
										foreach ($item->children as $citem)
										{
												echo '<li>';
												$liclass="";
												$active="";
												if ($citem->active)
												{
													$active='current navigable-current';
													//$liclass=''
												}
												echo '<a href="'.$baselink.'/'.$citem->id.'" class="'.$active.'">';
												//echo '<span><span class="list-count">'.$citem->cmpcount.'</span>';
												echo $citem -> name;
												echo '</span>';
												echo '</a>';
												echo '</li>';
											
										}
										echo '</ul>';
									}
									echo '</li>';
								}
								
							?>	
								
							</ul>
							</li>	
					<!--	
					<li class="with-right-arrow">
						
						<span><span class="list-count">11</span>企業分類</span>
						
						<ul class="big-menu">
						
							<li><a href="typography.html">Typography</a></li>
							<li><a href="columns.html">Columns</a></li>
							<li><a href="tables.html" class="current navigable-current">Tables</a></li>
							<li><a href="colors.html">Colors &amp; backgrounds</a></li>
							<li><a href="icons.html">Icons</a></li>
							<li><a href="files.html">Files &amp; Gallery</a></li>
							<li class="with-right-arrow">
								<span><span class="list-count">4</span>Forms &amp; buttons</span>
								<ul class="big-menu">
									<li><a href="buttons.html">Buttons</a></li>
									<li><a href="form.html">Form elements</a></li>
									<li><a href="textareas.html">Textareas &amp; WYSIWYG</a></li>
									<li><a href="form-layouts.html">Form layouts</a></li>
									<li><a href="wizard.html">Wizard</a></li>
								</ul>
							</li>
							<li class="with-right-arrow">
								<span><span class="list-count">2</span>Agenda &amp; Calendars</span>
								<ul class="big-menu">
									<li><a href="agenda.html">Agenda</a></li>
									<li><a href="calendars.html">Calendars</a></li>
								</ul>
							</li>
							<li><a href="blocks.html">Blocks &amp; infos</a></li>
						</ul>
					</li>
					<li class="with-right-arrow">
						<span><span class="list-count">8</span>商品分類</span>
						<ul class="big-menu">
							<li><a href="auto-setup.html">Automatic setup</a></li>
							<li><a href="responsive.html">Responsiveness</a></li>
							<li><a href="tabs.html">Tabs</a></li>
							<li><a href="sliders.html">Slider &amp; progress</a></li>
							<li><a href="modals.html">Modal windows</a></li>
							<li class="with-right-arrow">
								<span><span class="list-count">3</span>Messages &amp; notifications</span>
								<ul class="big-menu">
									<li><a href="messages.html">Messages</a></li>
									<li><a href="notifications.html">Notifications</a></li>
									<li><a href="tooltips.html">Tooltips</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="with-right-arrow">
						<a href="ajax-demo/submenu.html" class="navigable-ajax" title="Menu title">With ajax sub-menu</a>
					</li>
					-->
				</ul>
			</section>

			<ul class="unstyled-list">
				<li class="title-menu">Today's event</li>
				<li>
					<ul class="calendar-menu">
						<li>
							<a href="#" title="See event">
								<time datetime="2011-02-24"><b>24</b> Feb</time>
								<small class="green">10:30</small>
								Event's description
							</a>
						</li>
					</ul>
				</li>
				<li class="title-menu">New messages</li>
				<li>
					<ul class="message-menu">
						<li>
							<span class="message-status">
								<a href="#" class="starred" title="Starred">Starred</a>
								<a href="#" class="new-message" title="Mark as read">New</a>
							</span>
							<span class="message-info">
								<span class="blue">17:12</span>
								<a href="#" class="attach" title="Download attachment">Attachment</a>
							</span>
							<a href="#" title="Read message">
								<strong class="blue">John Doe</strong><br>
								<strong>Mail subject</strong>
							</a>
						</li>
						<li>
							<a href="#" title="Read message">
								<span class="message-status">
									<span class="unstarred">Not starred</span>
									<span class="new-message">New</span>
								</span>
								<span class="message-info">
									<span class="blue">15:47</span>
								</span>
								<strong class="blue">May Starck</strong><br>
								<strong>Mail subject a bit longer</strong>
							</a>
						</li>
						<li>
							<span class="message-status">
								<span class="unstarred">Not starred</span>
							</span>
							<span class="message-info">
								<span class="blue">15:12</span>
							</span>
							<strong class="blue">May Starck</strong><br>
							Read message
						</li>
					</ul>
				</li>
			</ul>

		</div>
		<!-- End content wrapper -->

		<!-- This is optional -->
		<footer id="menu-footer">
			<p class="button-height">
				<input type="checkbox" name="auto-refresh" id="auto-refresh" checked="checked" class="switch float-right">
				<label for="auto-refresh">Auto-refresh</label>
			</p>
		</footer>

	</section>
	<!-- End sidebar/drop-down menu -->

	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
	<script src="<?php echo base_url();?>assets/developer-admin/js/libs/jquery-1.10.2.min.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/setup.js"></script>

	<!-- Template functions -->
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.input.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.navigable.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.notify.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.scroll.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.tooltip.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.table.js"></script>

	<!-- Plugins -->
	<script src="<?php echo base_url();?>assets/developer-admin/js/libs/jquery.tablesorter.min.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/libs/DataTables/jquery.dataTables.min.js"></script>

	<script>

		// Call template init (optional, but faster if called manually)
		$.template.init();

		// Table sort - DataTables
		var table = $('#sorting-advanced');
		table.dataTable({
			'aoColumnDefs': [
				{ 'bSortable': false, 'aTargets': [ 0, 5 ] }
			],
			'sPaginationType': 'full_numbers',
			'sDom': '<"dataTables_header"lfr>t<"dataTables_footer"ip>',
			'fnInitComplete': function( oSettings )
			{
				// Style length select
				table.closest('.dataTables_wrapper').find('.dataTables_length select').addClass('select blue-gradient glossy').styleSelect();
				tableStyled = true;
			}
		});

		// Table sort - styled
		$('#sorting-example1').tablesorter({
			headers: {
				0: { sorter: false },
				5: { sorter: false }
			}
		}).on('click', 'tbody td', function(event)
		{
			// Do not process if something else has been clicked
			if (event.target !== this)
			{
				return;
			}

			var tr = $(this).parent(),
				row = tr.next('.row-drop'),
				rows;

			// If click on a special row
			if (tr.hasClass('row-drop'))
			{
				return;
			}

			// If there is already a special row
			if (row.length > 0)
			{
				// Un-style row
				tr.children().removeClass('anthracite-gradient glossy');

				// Remove row
				row.remove();

				return;
			}

			// Remove existing special rows
			rows = tr.siblings('.row-drop');
			if (rows.length > 0)
			{
				// Un-style previous rows
				rows.prev().children().removeClass('anthracite-gradient glossy');

				// Remove rows
				rows.remove();
			}

			// Style row
			tr.children().addClass('anthracite-gradient glossy');

			// Add fake row
			$('<tr class="row-drop">'+
				'<td colspan="'+tr.children().length+'">'+
					'<div class="float-right">'+
						'<button type="submit" class="button glossy mid-margin-right">'+
							'<span class="button-icon"><span class="icon-mail"></span></span>'+
							'Send mail'+
						'</button>'+
						'<button type="submit" class="button glossy">'+
							'<span class="button-icon red-gradient"><span class="icon-cross"></span></span>'+
							'Remove'+
						'</button>'+
					'</div>'+
					'<strong>Name:</strong> John Doe<br>'+
					'<strong>Account:</strong> admin<br>'+
					'<strong>Last connect:</strong> 05-07-2011<br>'+
					'<strong>Email:</strong> john@doe.com'+
				'</td>'+
			'</tr>').insertAfter(tr);

		}).on('sortStart', function()
		{
			var rows = $(this).find('.row-drop');
			if (rows.length > 0)
			{
				// Un-style previous rows
				rows.prev().children().removeClass('anthracite-gradient glossy');

				// Remove rows
				rows.remove();
			}
		});

		// Table sort - simple
	    $('#sorting-example2').tablesorter({
			headers: {
				5: { sorter: false }
			}
		});

	</script>
</body>
</html>