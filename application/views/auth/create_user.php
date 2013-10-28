<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Le styles -->
	    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <?php $this->load->view('frontend/includes/header'); ?>
      
		<hr>
	      <div class="row">
	        <div class="span8">

				<h1>Create User <?php echo lang('index_create_user_link');?> </h1>
				
				<p>Please enter your information below:</p>
				
				<div id="infoMessage"><?php echo $message;?></div>
				
				<?php echo form_open("auth/create_user", "class='well'");?>
				
				      <p>
				            First Name: <br />
				            <?php echo form_input($first_name);?>
				      </p>
					  <!--
				      <p>
				            Last Name: <br />
				            <?php echo form_input($last_name);?>
				      </p>
				
					 
				      <p>
				            Company Name: <br />
				            <?php echo form_input($company);?>
				      </p>
					-->
				      <p>
				            Email: <br />
				            <?php echo form_input($email);?>
				      </p>
					<!--
				      <p>
				            Phone: <br />
				            <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
				      </p>
					 -->
				      <p>
				            Password: <br />
				            <?php echo form_input($password);?>
				      </p>
				
				      <p>
				            Confirm Password: <br />
				            <?php echo form_input($password_confirm);?>
				      </p>
				
				
				      <p><p><button type="submit" class="btn btn-success">Create Account</button></p></p>

					<?php echo form_close();?>
					
			</div><!--/.span8-->
		  </div><!--/.row-->
		
			<?php $this->load->view('frontend/includes/footer'); ?>
	      
	    </div><!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>