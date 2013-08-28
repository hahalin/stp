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

<div class='container-fluid'>
	<div class='row-fluid'>
		<form class="form-horizontal">
			<fieldset>
				<legend>
					User Profile
				</legend>
			</fieldset>
			<div class='row'>
				<div class='span4'>
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
				<button type="submit" class="btn btn-primary">
					Save changes
				</button>
				<button type="button" class="btn">
					Cancel
				</button>
			</div>

		</form>

	</div>

</div>
