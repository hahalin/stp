

	<body class="clearfix with-menu with-shortcuts">

		<!-- Prompt IE 6 users to install Chrome Frame -->
		<!--[if lt IE 7]><p class="message red-gradient simpler">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

		<!-- Title bar -->
		<header role="banner" id="title-bar">
			<h2><?php echo $title; ?></h2>
		</header>

		<!-- Button to open/hide menu -->
		<a href="#" id="open-menu"><span>Menu</span></a>

		<!-- Button to open/hide shortcuts -->
		<a href="#" id="open-shortcuts"><span class="icon-thumbs"></span></a>

		<!-- Main content -->
		<section role="main" id="main">

			<noscript class="message black-gradient simpler">
				Your browser does not support JavaScript! Some features won't work as expected...
			</noscript>

			<hgroup id="main-title" class="thin">
				<h1>Tables</h1>
			</hgroup>

			<div class="with-padding">

				<p class="wrapped left-icon icon-info-round">
					Tables are responsive, too! Try resizing your browser
				</p>

				<h4>Styled table with advanced sorting</h4>

				<p>
					This example uses the plugin <a href="http://datatables.net">DataTables</a>:
				</p>

				<table class="table responsive-table" id="sorting-advanced">
					<thead>
						<tr>
							<th scope="col" width="10%">
							<input type="checkbox" name="check-all" id="check-all" value="1" align="middle">
							</th>
							<th scope="col" width="30%" class="align-center">name</th>
							<th scope="col" width="60" class="align-center">status</th>
							<th scope="col" width="60" class="align-center">Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($tblist as $tb) {
							echo '<tr>';
							echo '<th scope="row" class="checkbox-cell align-center" align="middle">';
							echo '<input type="checkbox" name="checked[]"  table="' . $tb['table'] . '" />';
							echo '<td class="center">' . $tb['table'] . '</td>';
							echo '<td class="center">' . $tb['status'] . '</td>';
							echo '<td class="low-padding align-center"><a href="#" class="button compact icon-gear">Edit</a></td>';
							echo '</tr>';
						}
						?>

					</tbody>
					
				</table>

				
				
			</div>

		</section>
		<!-- End main content -->

		<!-- Side tabs shortcuts -->
		<ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right">
			<li>
				<a href="./" class="shortcut-dashboard" title="信息中控台">Dashboard</a>
			</li>
			<li>
				<a href="inbox.html" class="shortcut-messages" title="訊息">Messages</a>
			</li>
			<li>
				<a href="agenda.html" class="shortcut-agenda" title="Agenda">Agenda</a>
			</li>
			<li class="current">
				<a href="tables.html" class="shortcut-contacts" title="企業名單">Contacts</a>
			</li>
			<li>
				<a href="explorer.html" class="shortcut-medias" title="商品管理">Medias</a>
			</li>
			<li>
				<a href="sliders.html" class="shortcut-stats" title="Stats">Stats</a>
			</li>
			<li>
				<a href="form.html" class="shortcut-settings" title="系統設定">Settings</a>
			</li>
			<li>
				<span class="shortcut-notes" title="Notes">Notes</span>
			</li>
		</ul>

		<!-- Sidebar/drop-down menu -->
		<section id="menu" role="complementary">

			<!-- This wrapper is used by several responsive layouts -->
			<div id="menu-content">

				<header>
					Administrator
				</header>

				<div id="profile">
					<!--<img src="img/user.png" width="64" height="64" alt="User name" class="user-icon"> width="64" -->
					<img src="<?php echo base_url().$user_info -> avatar; ?>"   height="120"  alt="User name" class="user-icon">
					Hello
					<!-- <span class="name">John <b>Doe</b></span> -->
					<span class="name"><?php echo $user_info -> username; ?> </span>
				</div>

				<!-- By default, this section is made for 4 icons, see the doc to learn how to change this, in "basic markup explained" -->
				<ul id="access" class="children-tooltip">
					<li>
						<a href="inbox.html" title="Messages"><span class="icon-inbox"></span><span class="count">2</span></a>
					</li>
					<li>
						<a href="calendars.html" title="Calendar"><span class="icon-calendar"></span></a>
					</li>
					<li>
						<a href="login.html" title="Profile"><span class="icon-user"></span></a>
					</li>
					<li class="disabled">
						<span class="icon-gear"></span>
					</li>
				</ul>

				<section class="navigable">
					<ul class="big-menu">
						<li class="with-right-arrow">
							<span class="current"><span class="list-count">11</span>Main styles</span>
							<ul class="big-menu">
								<li>
									<a href="typography.html">Typography</a>
								</li>
								<li>
									<a href="columns.html">Columns</a>
								</li>
								<li>
									<a href="tables.html" class="current navigable-current">Tables</a>
								</li>
								<li>
									<a href="colors.html">Colors &amp; backgrounds</a>
								</li>
								<li>
									<a href="icons.html">Icons</a>
								</li>
								<li>
									<a href="files.html">Files &amp; Gallery</a>
								</li>
								<li class="with-right-arrow">
									<span><span class="list-count">4</span>Forms &amp; buttons</span>
									<ul class="big-menu">
										<li>
											<a href="buttons.html">Buttons</a>
										</li>
										<li>
											<a href="form.html">Form elements</a>
										</li>
										<li>
											<a href="textareas.html">Textareas &amp; WYSIWYG</a>
										</li>
										<li>
											<a href="form-layouts.html">Form layouts</a>
										</li>
										<li>
											<a href="wizard.html">Wizard</a>
										</li>
									</ul>
								</li>
								<li class="with-right-arrow">
									<span><span class="list-count">2</span>Agenda &amp; Calendars</span>
									<ul class="big-menu">
										<li>
											<a href="agenda.html">Agenda</a>
										</li>
										<li>
											<a href="calendars.html">Calendars</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="blocks.html">Blocks &amp; infos</a>
								</li>
							</ul>
						</li>
						<li class="with-right-arrow">
							<span><span class="list-count">8</span>Main features</span>
							<ul class="big-menu">
								<li>
									<a href="auto-setup.html">Automatic setup</a>
								</li>
								<li>
									<a href="responsive.html">Responsiveness</a>
								</li>
								<li>
									<a href="tabs.html">Tabs</a>
								</li>
								<li>
									<a href="sliders.html">Slider &amp; progress</a>
								</li>
								<li>
									<a href="modals.html">Modal windows</a>
								</li>
								<li class="with-right-arrow">
									<span><span class="list-count">3</span>Messages &amp; notifications</span>
									<ul class="big-menu">
										<li>
											<a href="messages.html">Messages</a>
										</li>
										<li>
											<a href="notifications.html">Notifications</a>
										</li>
										<li>
											<a href="tooltips.html">Tooltips</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="with-right-arrow">
							<a href="ajax-demo/submenu.html" class="navigable-ajax" title="Menu title">With ajax sub-menu</a>
						</li>
					</ul>
				</section>

				<ul class="unstyled-list">
					<li class="title-menu">
						Today's event
					</li>
					<li>
						<ul class="calendar-menu">
							<li>
								<a href="#" title="See event">
								<time datetime="2011-02-24">
									<b>24</b> Feb
								</time> <small class="green">10:30</small> Event's description </a>
							</li>
						</ul>
					</li>
					<li class="title-menu">
						New messages
					</li>
					<li>
						<ul class="message-menu">
							<li>
								<span class="message-status"> <a href="#" class="starred" title="Starred">Starred</a> <a href="#" class="new-message" title="Mark as read">New</a> </span>
								<span class="message-info"> <span class="blue">17:12</span> <a href="#" class="attach" title="Download attachment">Attachment</a> </span>
								<a href="#" title="Read message"> <strong class="blue">John Doe</strong>
								<br>
								<strong>Mail subject</strong> </a>
							</li>
							<li>
								<a href="#" title="Read message"> <span class="message-status"> <span class="unstarred">Not starred</span> <span class="new-message">New</span> </span> <span class="message-info"> <span class="blue">15:47</span> </span> <strong class="blue">May Starck</strong>
								<br>
								<strong>Mail subject a bit longer</strong> </a>
							</li>
							<li>
								<span class="message-status"> <span class="unstarred">Not starred</span> </span>
								<span class="message-info"> <span class="blue">15:12</span> </span>
								<strong class="blue">May Starck</strong>
								<br>
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
		<script src="<?php echo base_url();?>assets/developer-admin/s/developr.tooltip.js"></script>
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
				'aoColumnDefs' : [{
					'bSortable' : true,
					'aTargets' : [1,2]
				}],
				'sPaginationType' : 'full_numbers',
				'sDom' : '<"dataTables_header"lfr>t<"dataTables_footer"ip>',
				'fnInitComplete' : function(oSettings) {
					// Style length select
					table.closest('.dataTables_wrapper').find('.dataTables_length select').addClass('select blue-gradient glossy').styleSelect();
					tableStyled = true;
				}
			});

			// Table sort - styled
			$('#sorting-example1').tablesorter({
				headers : {
					0 : {
						sorter : false
					},
					5 : {
						sorter : false
					}
				}
			}).on('click', 'tbody td', function(event) {
				// Do not process if something else has been clicked
				if (event.target !== this) {
					return;
				}

				var tr = $(this).parent(), row = tr.next('.row-drop'), rows;

				// If click on a special row
				if (tr.hasClass('row-drop')) {
					return;
				}

				// If there is already a special row
				if (row.length > 0) {
					// Un-style row
					tr.children().removeClass('anthracite-gradient glossy');

					// Remove row
					row.remove();

					return;
				}

				// Remove existing special rows
				rows = tr.siblings('.row-drop');
				if (rows.length > 0) {
					// Un-style previous rows
					rows.prev().children().removeClass('anthracite-gradient glossy');

					// Remove rows
					rows.remove();
				}

				// Style row
				tr.children().addClass('anthracite-gradient glossy');

				// Add fake row
				$('<tr class="row-drop">' + '<td colspan="' + tr.children().length + '">' + '<div class="float-right">' + '<button type="submit" class="button glossy mid-margin-right">' + '<span class="button-icon"><span class="icon-mail"></span></span>' + 'Send mail' + '</button>' + '<button type="submit" class="button glossy">' + '<span class="button-icon red-gradient"><span class="icon-cross"></span></span>' + 'Remove' + '</button>' + '</div>' + '<strong>Name:</strong> John Doe<br>' + '<strong>Account:</strong> admin<br>' + '<strong>Last connect:</strong> 05-07-2011<br>' + '<strong>Email:</strong> john@doe.com' + '</td>' + '</tr>').insertAfter(tr);

			}).on('sortStart', function() {
				var rows = $(this).find('.row-drop');
				if (rows.length > 0) {
					// Un-style previous rows
					rows.prev().children().removeClass('anthracite-gradient glossy');

					// Remove rows
					rows.remove();
				}
			});

			// Table sort - simple
			$('#sorting-example2').tablesorter({
				headers : {
					5 : {
						sorter : false
					}
				}
			});

		</script>
	</body>
</html>