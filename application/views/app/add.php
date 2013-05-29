<h2>Create a appcfg item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('app') ?>

	<label for="code">code</label> 
	<input type="input" name="code" /><br />

	<label for="v">v</label>
	<textarea name="v"></textarea><br />
	
	<input type="submit" name="submit" value="Create news item" /> 

</form>
