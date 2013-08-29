<?php 
  //print_r($columns);
  $unset_delete=false;
  $unset_edit=false;
  $unset_add=false;
?>
<?php  
	
	$this->set_css($this->default_theme_path.'/datatables/css/demo_table_jui.css');
	$this->set_css($this->default_css_path.'/ui/simple/'.hgrid::JQUERY_UI_CSS);
	$this->set_css($this->default_theme_path.'/datatables/css/datatables.css');	
	$this->set_css($this->default_theme_path.'/datatables/css/jquery.dataTables.css');
	$this->set_css($this->default_theme_path.'/datatables/extras/TableTools/media/css/TableTools.css');
	$this->set_js($this->default_javascript_path.'/'.hgrid::JQUERY);
	$this->set_js($this->default_javascript_path.'/jquery_plugins/ui/'.hgrid::JQUERY_UI_JS);
	$this->set_js($this->default_theme_path.'/datatables/js/jquery.dataTables.min.js');
	$this->set_js($this->default_theme_path.'/datatables/js/datatables-extras.js');
	$this->set_js($this->default_theme_path.'/datatables/js/datatables.js');
	$this->set_js($this->default_theme_path.'/datatables/extras/TableTools/media/js/ZeroClipboard.js');
	$this->set_js($this->default_theme_path.'/datatables/extras/TableTools/media/js/TableTools.min.js');
	
	/** Fancybox */
	$this->set_css($this->default_css_path.'/jquery_plugins/fancybox/jquery.fancybox.css');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.fancybox.pack.js');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.easing-1.3.pack.js');
?>




<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';
	var subject = 'Record';

	var unique_hash = '<?php echo $unique_hash; ?>';
	
	var displaying_paging_string = "Displaying _START_ to _END_ of _TOTAL_ items";
	var filtered_from_string 	= "(filtered from _MAX_ total entries)";
	var show_entries_string 	= "Show _MENU_ entries";
	var search_string 			= "Search";
	var list_no_items 			= "No items to display";
	var list_zero_entries 			= "Displaying 0 to 0 of 0 items";

	var list_loading 			= "Loading...";

	var paging_first 	= "First";
	var paging_previous = "Previous";
	var paging_next 	= "Next";
	var paging_last 	= "Last";

	var message_alert_delete = "Are you sure that you want to delete this record?";

	var default_per_page = 25;

	var unset_export = false;
	var unset_print = false;

	var export_text = 'Export';
	var print_text = 'Print';
	
		
	var datatables_aaSorting = [[ 0, "asc" ]];
	
</script>
<!--
<div id='report-error' class='report-div error report-list'></div>
<div id='report-success' class='report-div success report-list' ></div>	
<div class="datatables-add-button">
<a role="button" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" href="http://localhost:8080/stp_cosmos/examples/film_management/add">
	<span class="ui-button-icon-primary ui-icon ui-icon-circle-plus"></span>
	<span class="ui-button-text">Add Record</span>
</a>
</div>
-->

<?php if(!$unset_add){?>
<div class="datatables-add-button">
<a role="button" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" href="<?php //echo $add_url?>">
	<span class="ui-button-icon-primary ui-icon ui-icon-circle-plus"></span>
	<span class="ui-button-text">Add<?php //echo $this->l('list_add'); ?>Subject<?php //echo $subject?></span>
</a>
</div>
<?php }?>
<div style='height:10px;'></div>

<?php echo $list_view?>
