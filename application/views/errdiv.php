<style>
	/*
		width: 500px;
		top:50px;
		right:100px;
		overflow:hidden;

	 */
	
	#errordiv{
		/*position:absolute;*/
	}
</style>

<div class="alert alert-error modal fade in">
	<a class="close" data-dismiss="alert">×</a>
	<strong>Error!</strong>
	<?php 
		echo $error;
	?>
</div>


