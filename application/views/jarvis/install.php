<div class="height-wrapper">

	<?php $this -> load -> view('jarvis/header'); ?>
	<div id="main" role="main" class="container-fluid">

		<div class="contained">

			<!-- aside -->
			<aside>
				<!-- search box -->
				<div class="main-search">
					<label for="main-search"><i class="icon-search"></i></label>
					<input id="main-search" type="text" placeholder="Search..." />
				</div>
				<div class="divider"></div>
				<!-- end search box -->
				<div class="sidebar-nav-fixed">
					<ul class="menu" id="accordion-menu-js">
						<li class="">
							<a href="javascript:void(0)"><i class="icon-off"></i>Dashboard <span class="badge">2</span></a>
						</li>
					</ul>
				</div>

				<div class="divider"></div>

				<div class="aside-buttons">
					<a href="javascript:void(0);" title="" class="btn btn-info">Add new table</a>
					<a href="javascript:void(0);" title="" class="btn btn-success">Add a new row</a>
					<a href="javascript:void(0);" title="" class="btn btn-warning">Update table</a>
					<a href="javascript:void(0);" title="" class="btn btn-danger">Delete Table</a>
				</div>

			</aside>
			<!-- aside end -->

			<div id="page-content">

				<h1 id="page-header">Install</h1>

				<div class="fluid-container">

					<section id="widget-grid" class="">

						<!-- row-fluid -->
						<div class="row-fluid">
							
							<article class="span12">
								
								<div class="jarviswidget" id="widget-id-0">

									<header>
										<h2>Create Table</h2>
										
									</header>
									
									<!--
									<a href="<?php echo base_url();?>auth/register" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
									-->
									
									<div class="inner-spacer">
										<!-- content goes here -->

										<!--<table class="table table-striped table-bordered responsive" id="dtable" >-->
										<!--<table class="table table-striped">-->
										<div >
									<table class="table table-bordered" id="s-table-bordered">
											<thead>
												<tr>
													<th scope="col" width="10%">
														<input type="checkbox" name="check-all" id="check-all" value="1" align="middle">
													</th>
													<th scope="col" width="30%" class="align-center">name</th>
													<th scope="col" width="60" class="align-center">status</th>
												</tr>
											</thead>
											
											<!--
											<tfoot>
												<tr>
													<td colspan="6"> 6 entries found </td>
													
												</tr>
											</tfoot>
											-->
											<tbody>
												<?php foreach ($tblist as $tb)
												{
													
													echo '<tr>';
													echo '<th scope="row" class="checkbox-cell align-center" align="middle">';
													echo '<input type="checkbox" name="checked[]"  table="'.$tb['table'].'" />';
													echo '<td class="center">'.$tb['table'].'</td>';
													echo '<td class="center">'.$tb['status'].'</td>';
													echo '</tr>';
												}
												
												?>
												<!--
												<tr>
													<th scope="row" class="checkbox-cell" align="middle">
														<input type="checkbox" name="checked[]" id="check-1" value="1">
													</th>
													<td>John Doe</td>
													<td>Jul 5, 2011</td>
													<td>Enabled</td>
													<td><small class="tag">User</small><small class="tag">Client</small><small class="tag green-bg">Valid</small></td>
													<td class="low-padding align-center"><a href="#" class="button compact icon-gear">Edit</a></td>
												</tr>
												-->
												
											</tbody>
										</table>
								</div>	
											
										
									
									</div>
									<div class="btn-group">
											
											<button  href="javascript:void(0);" title="" class="btn btn-info">run</button >
											<button  href="javascript:void(0);" title="" class="btn btn-success">go</button >
										
											
									</div>
									<!-- wrap div end -->
								</div>

							</article>

						</div>
						<!-- row-fluid end-->

					</section>

				</div>
				<!-- fluid-container-->
			</div>
			<!--  page-content-->
		</div>
	</div>
</div>

<!-- Scripts -->
<script src="<?php echo base_url(); ?>assets/developer-admin/js/libs/jquery-1.10.2.min.js"></script>
<!-- Plugins -->
<!--<script src="<?php echo base_url();?>assets/developer-admin/js/libs/jquery.tablesorter.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/developer-admin/js/libs/DataTables/jquery.dataTables.min.js"></script>

<script>
	// Call template init (optional, but faster if called manually)
	//$.template.init();

	$(document).ready(function() {
		$('#check-all').click(function(){
			var v=$('#check-all').prop("checked");
			
			$("input[name='checked[]']").each(function() {
		         $(this).prop("checked", true);
		    });
		}); 
		
	
		$("input[name='checked[]'").click(function(){
				alert(
					$(this).attr('table')
				);
		});
		
	});
	// Table sort - DataTables
	var table = $('#sorting-advanced');
	table.dataTable();
	return;
	table.dataTable({
		'aoColumnDefs' : [{
			'bSortable' : false,
			'aTargets' : [0, 5]
		}],
		'sPaginationType' : 'full_numbers',
		'sDom' : '<"dataTables_header"lfr>t<"dataTables_footer"ip>',
		'fnInitComplete' : function(oSettings) {
			// Style length select
			table.closest('.dataTables_wrapper').find('.dataTables_length select').addClass('select blue-gradient glossy').styleSelect();
			tableStyled = true;
		}
	}); 
</script>
