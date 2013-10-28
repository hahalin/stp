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
	        <div class="span3">
				<p><h3>Authentication</h3></p>
				<img src="<?php echo base_url(); ?>images/01_preview1.png" />
	        </div>
	        <div class="span3">
				<p><h3>Dashboard</h3></p>
				<img src="<?php echo base_url(); ?>images/02_preview2.png" />
	        </div>
	        <div class="span3">
				<p><h3>Profile</h3></p>
				<img src="<?php echo base_url(); ?>images/03_preview3.png" />
	        </div>
	        <div class="span3">
				<p><h3>Live Editing</h3></p>
				<img src="<?php echo base_url(); ?>images/04_preview4.png" />
	        </div>
	    </div>
	    
	    <div class="row">
			<div class="span6">
				<p><h3>Flexible</h3></span></p>
				<p>With minimal knowledge of iPhone development, the way the project is set up, and the ease of Codeigniter allow for quick duplication of basic site functionality to the iPhone app. The Codeigniter backend takes MySQL data and converts it to <a href="http://www.json.org/" target="_blank">JSON</a> data on the go, the iPhone app than takes that JSON data via <a href="https://github.com/AFNetworking/AFNetworking" target="_blank">AFNetworking</a>, and displays it to the user however you like.</p>
			</div>
			<div class="span6">
				<p><h3>Up to Date</h3></span></p>
				<p>The iPhone app is iOS 6.1 Compliant, ARC Project, <b>NOT</b> built on storyboard. Newer iPhone developers may not like the fact this is a non-storyboard project, while storyboard is good for smaller projects, it get more and more difficult to use as your project grows. So with <b>Web Startup Bootstrap</b> meant to be the gateway to a large scale web application, it is better off to use every possible gateway to large scale app development from the get-go.</p>
			</div>
		</div>
		
		<div class="row">
			<div class="span12">
				<p><h3>Easy to Get Started</h3></span></p>
				<p>All you have to do to get your iPhone app ready to communicate with your website is to change the calls to the JSON scripts to your new web URL. All the components out of the box will just start working. When adding new features to the app, anyone with just basic app development knowledge may find it easy to just copy and paste a few lines of code to get going. The app provides code for pulling data from the web server, breaking it down, displaying it to the user, and sending information back to the web server for editing and saving objects and seeing them reflected immediately on the web site. All of this is heavily documented in the provided documentation.</p>
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