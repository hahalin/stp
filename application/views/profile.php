<style>
	/* Special grid styles
	 -------------------------------------------------- */

	.show-grid {
		/*
		 margin-top: 10px;
		 margin-bottom: 20px;
		 */
	}
	.show-grid [class*="span"] {
		background-color: #eee;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		/*
		 text-align: center;

		 min-height: 40px;
		 line-height: 40px;
		 */
	}
	.show-grid [class*="span"]:hover {
		background-color: #ddd;
	}
	/*
	 .show-grid .show-grid {
	 margin-top: 0;
	 margin-bottom: 0;
	 }
	 .show-grid .show-grid [class*="span"] {
	 margin-top: 5px;
	 }
	 */
	.show-grid [class*="span"] [class*="span"] {
		background-color: #ccc;
	}
	.show-grid [class*="span"] [class*="span"] [class*="span"] {
		background-color: #999;
	}

</style>

<script language="JavaScript">
	
	var base_url =  '<?=base_url() ?>';
	
	Ext.require(['*']);
	Ext.ns('App');
	Ext.onReady(function() {
	Ext.QuickTips.init();

	var func=function(res)
	{
		var o=Ext.decode(res.responseText);
				//$(this).closest("li").append($newList);
				$newList = $("<ul />");
				Ext.each(o,function(oi){
					
					$newList.append(
						"<li><a href='#' id='"+oi.id+"'>" + oi.text + "</a></li>"
					);
					
					$('#treeid').append($newList);
		});
		
		$("#treeid ul li > a").click(function(o) {
				//alert('click');
				var id=$(this).attr('id');
				var parent=$(this).parent();
				
				$(parent).children('ul').remove();
				
				Ext.Ajax.request({
					url : base_url + 'categoryc/bztree',
					params:{
						node:id
					},
					success:function(res)
					{
						
						var o=Ext.decode(res.responseText);
						$newList = $("<ul />");
						Ext.each(o,function(oi){
							
							$newList.append(
								"<li><a href='#' id='"+oi.id+"'>" + oi.text + "</a></li>"
							);
						});
						$(parent).append($newList);
						
					}
				});
		});

	}
	
	
	Ext.get('dosave').on('click',function(){
	//$('#myModal').modal();
		Ext.Ajax.request({
			url : base_url + 'categoryc/bztree',
			params:{
				node:'treeroot'
			},
			success:func
			/*
			function(res)
			{
				var o=Ext.decode(res.responseText);
				//$(this).closest("li").append($newList);
				$newList = $("<ul />");
				Ext.each(o,function(oi){
					
					$newList.append(
						"<li><a href='#'>" + oi.text + "</a></li>"
					);
					
					$('#treeid').append($newList);
				});
				
			}
			*/
		});
	
		return;

		var myMask = new Ext.LoadMask(Ext.getCmp('tree'), {msg:"Please wait..."});
		myMask.show();
		Ext.getCmp('tree').getStore().reload({
			callback:function()
			{
				alert('e');
				myMask.hide();
			}
		});
	});

	var dstree = new Ext.data.TreeStore({
		//autoLoad:false,
		proxy : {
			type : 'ajax',
			method:'post',
			url : base_url + 'categoryc/bztree',
			extraParams : {
				path : 'extjs'
			}
		},
		fields : ['id', 'text', 'seq', 'type','textv'],
		folderSort : true,
		sorters : [{
			property : 'seq',
			direction : 'ASC'
		}]
	});

	var tree = Ext.create('Ext.tree.Panel', {
		id: 'tree',
		border:false,
		frame:true,
		store: dstree,
		width: 250,
		height: 300,
		root : {
			text : '全部',
			id : 'treeroot',
			expanded : true
		}
		//renderTo: Ext.get('treeid')
	});

	//tree.render(Ext.get('treeid'));
});

</script>

<div id="myModal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			&times;
		</button>
		<h3>Modal header</h3>
	</div>
	<div class="modal-body">
		<p>
			One fine body…
		</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn">Close</a>
		<a href="#" class="btn btn-primary">Save changes</a>
	</div>
</div>

<div class='container-fluid'>
	<div class='row-fluid span12'>
		<form class="form-horizontal">
			<fieldset>
				<legend>
					User Profile
				</legend>
			</fieldset>
			<div class='row'>
				<div id='treeid' class='span2'>
					

				</div>
				<div class='span2'>

					<!--
					<div class="fileupload fileupload-new pull-right" data-provides="fileupload">
					<div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
					<img src='http://placehold.it/120x120' class='pull-right' />
					</div>
					<div class="fileupload-preview fileupload-exists thumbnail" style="width: 120px; height: 120px;"></div>
					<span class="btn btn-file"> <span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
					<input type="file">
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
					</div>
					-->
					<div class="fileupload fileupload-new pull-right" data-provides="fileupload">
						<!--
						<input type="hidden" value="hv" name="hn">
						-->
						<div class="fileupload-new thumbnail" style="width: 80px; height: 80px;"><img src="http://placehold.it/80x80" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="width: 60px; height: 60px; line-height: 60px;"></div>
						<span class="btn btn-small btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
							<input type="file" name="imgData" id="imgData">
						</span>
						<a href="#" class="btn btn-small btn-link fileupload-exists" data-dismiss="fileupload">Remove</a>
					</div>

				</div>
				<div class='span8'>

					<div class="control-group">

						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
							<input type="text" id="inputEmail" placeholder="Email" class='span2'>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputName">Name</label>
						<div class="controls">
							<input type="text" id="inputName" placeholder="Name" class='input-large'>
						</div>
					</div>
				</div>
			</div>
			<div class="form-actions span8">
				<button id='dosave' type="button" class="btn btn-primary">
					Save changes
				</button>
				<button type="button" class="btn">
					Cancel
				</button>
			</div>

		</form>

	</div>

</div>
