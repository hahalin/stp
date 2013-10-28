<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<h2>
	<?php 
		echo $action;
		if ($type)
		{
			echo '-'.$type;
		}  
	?>
</h2>

<?php echo form_open_multipart('import/load/'.$action);?>

<input type="file" name="userfile"/>

<input type="submit" value="upload" />

</form>

<div class="footer">
	<a href='<?php echo site_url('import'); ?>'>go back </a>
</div>

</body>
</html>
