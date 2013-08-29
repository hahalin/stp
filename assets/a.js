$(document).ready(function() {
	/*
	 var oTable = $('#groceryCrudTable').dataTable( {
	 "sScrollY": "200px",
	 "bPaginate": false
	 } );
	 */
	return;
	var table = $.fn.dataTable.fnTables(true);
	if (table.length > 0) {
		$(table).dataTable().fnAdjustColumnSizing();
	}
	
	$(window).bind('resize', function() {
		var tb = $.fn.dataTable.fnTables(true);
		if (tb.length > 0) {
			$(tb).dataTable().fnAdjustColumnSizing(true);
			console.log('do sizing');
		}
		console.log('adjustsizing');
	});
	//alert('1');
	return;
	var oTable = $('#groceryCrudTable');
	$(window).bind('resize', function() {
		
	});
});
