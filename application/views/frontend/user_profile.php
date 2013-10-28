<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Le styles -->
	    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <?php $this->load->view('frontend/includes/header'); ?>
	    
	    <div class="row">
	        <div class="span8">
				
				<div class="well">
				<h1><?php echo $user_info->username . " (" . $user_info->first_name . " " . $user_info->last_name . ")"; ?></h1><br/>
				<p><?php echo $user_info->biography; ?></p>
				</div>
	        </div>
			<div class="span4">
				<p><h3>Profile Picture</h3></p>
				<img src="<?php echo base_url(); ?>images/male_icon.png" />
	        </div>
	      </div>
		  <!--Start second row of columns-->
		  <div class="row">
			<div class="span4">
				<p><h3>User Information</h3></span></p>
				<blockquote>
					- <b>Username:</b> <?php echo $user_info->username; ?><br/>
					&nbsp;- <b>First Name:</b> <?php echo $user_info->first_name; ?><br/>
					&nbsp;- <b>Last Name:</b> <?php echo $user_info->last_name; ?><br/>
					&nbsp;- <b>Company:</b> <?php echo $user_info->company; ?>
				</blockquote>
			</div>
			<div class="span4">
				<p><h3>Contact Information</h3></span></p>
				<blockquote>
					- <b>E-mail:</b> <?php echo $user_info->email; ?><br/>
					&nbsp;- <b>Phone:</b> <?php echo $user_info->phone; ?>
				</blockquote>
			</div>
			<div class="span4">
				<p><h3>Other Information</h3></span></p>
				<blockquote>
					- <b>Account Created:</b> <?php echo date("m/d/Y H:m",$user_info->created_on); ?><br/>
					&nbsp;- <b>Last Login:</b> <?php echo date("m/d/Y H:m",$user_info->last_login); ?>
				</blockquote>
			</div>
		</div>
	
	    <?php $this->load->view('frontend/includes/footer'); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-ui-1.9.0.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.smooth-scroll.min.js"></script>
        
        <script src="<?php echo base_url(); ?>js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>