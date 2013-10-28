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
	        <div class="span4">
				<p><h3>Native iPhone App</h3></p>
				<img src="<?php echo base_url(); ?>images/iphone.png" /><br/><br/>
				<p>The Native iPhone App provided with this project gives your website users the ability to have all of the functionality of the native website, in the handy pocket size on the go version. Features include: dashboard view, profile view, ability to edit and save profile. With all updates being reflected in real time from the website. Xcode project included.</p>
	        </div>
	        <div class="span4">
				<p><h3>Website Backend</h3></p>
				<img src="<?php echo base_url(); ?>images/pic_backend.png" /><br/><br/>
				<p>The websites backend system includes, login, register, forgot password, dashboard view, ability to edit and save account information and profile information. Header and Footer navigation reflect the user is logged in by displaying a dashboard link. Which a small feature, it's minute details like these that set your website apart from competitors by providing the a very friendly user experience.</p>
	        </div>
	        <div class="span4">
				<p><h3>User Frontend</h3></p>
				<img src="<?php echo base_url(); ?>images/pic_frontend.png" /><br/><br/>
				<p>If you website is a user driven/profile site, the ability for front end user profiles is supported, http://yoursite/user/username will provide a customizable profile view for non-logged in users, as well as be beneficial for search engine and SEO purposes. If your website is a service, providing a backend dashboard only, the front end user experience may be disabled for your website to act specifically as a web service.</p>
	        </div>
	    </div>
	    
	    <div class="row">
			<div class="span4">
				<p><h3>Codeigniter Backend</h3></span></p>
				<p>With a backend built on <a href="http://www.codeigniter.com" target="_blank">Codeigniter's</a> proven MVC model, it won't take much for even novice programmers to make this skeleton of a web service a full blown user driven content site.</p>
			</div>
			<div class="span4">
				<p><h3>Responsive Bootstrap Frame</h3></span></p>
				<p>The markup is supported by <a href="http://twitter.github.com/bootstrap/" target="_blank">Twitter Bootstrap's</a> Responsive Framework, which allows the website to morph around itself depending on the size of the screen it detects. Go ahead, drag this window smaller, watch the elements adapt. Twitter Bootstrap also comes packed with hundreds of CSS and Javascript features that are ready to deploy with a single line.</p>
			</div>
			<div class="span4">
				<p><h3>Ion Auth Security</h3></span></p>
				<p><a href="https://github.com/benedmunds/CodeIgniter-Ion-Auth" target="_blank">Ion Auth</a> is a lightweight secure authentication system built on the Codeigniter framework, which allows features such as, but not limited to: login, register, forgot password, change password, deactivate user, edit user, etc.</p>
			</div>
		</div>
		
		<div class="row">
			<div class="span4">
				<p><h3>Easy to Install</h3></span></p>
				<p>While altering the structure may require a slight programming knowledge, installation to a working product is simple. Just upload the files, create a database, hook it all up and your done! To get the iPhone app working, just load the files into Xcode and change the URL for the website to yours and everything should just work! Refer to the extensive documentation for questions.</p>
			</div>
			<div class="span4">
				<p><h3>A Great Opportunity</h3></span></p>
				<p>Why spend countless dollars starting from scratch when you can skip all of the boring startup nonsense and take your website from idea to a start-up as fast as ever!</p>
			</div>
			<div class="span4">
				<p><h3>Useful for Programmers</h3></span></p>
				<p>This package is also great for experienced programmers! Quit wasting your time building the same startup skeleton project after project. Start with a proven solution and save yourself time! If not, use the code and integrate it into an existing website for that security/user experience boost.</p>
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