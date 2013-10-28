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
	    
		<!--Start Carousel-->
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
              <div class="item active">
                <img src="images/slide1.png" alt="">
                <div class="carousel-caption">
                  <h4>Compatible iPhone App</h4>
                  <p>There may be many web startup packages out there, but this is the only one that comes with an iPhone App! All Xcode files are provided, along with the middle man for the app to communicate with the web server. You can do everything on the app that you can do on the website!</p>
                </div>
              </div>
              <div class="item">
                <img src="images/slide2.png" alt="">
                <div class="carousel-caption">
                  <h4>Built on Codeigniter</h4>
                  <p>With a backend built on Codeigniter's proven MVC structure, secured by the <a href="https://github.com/benedmunds/CodeIgniter-Ion-Auth" target="_blank">Ion Auth</a> login system, Web Startup Bootstrap doesn't leave any feature behind.</p>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="images/arrow.png" alt="Arrow"></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="images/arrow2.png" alt="Arrow"></a>
          </div>
		<!--End Carousel-->
		
		<hr>
	      <div class="row">
	        <div class="span4">
				<h3>Responsive Design<small></h3>
				<a rel="lightbox" href="images/home_responsive.png"><img src="images/home_responsive_thumb.png" alt="Thumbnail"></a>
	        </div>
	        <div class="span4">
				<h3>iPhone Application</h3>
				<a rel="lightbox" href="images/iphone.png"><img src="images/iphone.png" alt="Thumbnail"></a>
	        </div>
	        <div class="span4">
	          <h3>Details</h3>
				  <blockquote>The <b>Web Bootstrap Startup</b> Project was created as an all in one solution for anyone with "the next big idea". With a boilerplate user authentication system & backend profile, along with a compatible iPhone app built to iOS 6.1 standards, it is a rock solid starting place for any web application, or user driven service, with an equally awesome mobile presence.
				  </blockquote>
			  <p><a class="btn" href="<?php echo base_url(); ?>features">All Features &raquo;</a></p>
	        </div>
	      </div>
		  <!--Start second row of columns-->
		  <hr>
		  <div class="row">
			<div class="span6 thumb-list">
				<img src="images/top_users.png" alt="Top Users!" style="background:transparent;border:3px solid white;">
				<h3><a href="#">This Weeks Top Users!</a></h3><br/>
				<p>
						<?php
							foreach ($users as $user) {
								echo "- <a href='".base_url()."user/".$user->username."'>".$user->first_name . " " . $user->last_name."</a> (@".$user->username.")<br/>";
							}
						?>
				</p>
			</div>
			<div class="span6 thumb-list">
				<a rel="lightbox[secondary]" href="images/thumb-small02.png"><img src="images/thumb-small02.png" alt="Thumbnail"></a>
				<h3><a href="#">Your Content Here</a></h3>
				<p>This will be the description or something I guess. I don't know. Your choice.</p>
				<a href="#" class="btn">Details</a>
			</div>
		  </div>
		  <div class="row">
			<div class="span6 thumb-list">
				<a rel="lightbox[secondary]" href="images/thumb-small01.png"><img src="images/thumb-small01.png" alt="Thumbnail"></a>
				<h3><a href="#">Your Content Here</a></h3>
				<p>This will be the description or something I guess. I don't know. Your choice.</p>
				<a href="#" class="btn">Details</a>
			</div>
			<div class="span6 thumb-list">
				<a rel="lightbox[secondary]" href="images/thumb-small02.png"><img src="images/thumb-small02.png" alt="Thumbnail"></a>
				<h3><a href="#">Your Content Here</a></h3>
				<p>This will be the description or something I guess. I don't know. Your choice.</p>
				<a href="#" class="btn">Details</a>
			</div>
		  </div>
	
	      <?php $this->load->view('frontend/includes/footer'); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-ui-1.9.0.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.smooth-scroll.min.js"></script>
		<script src="<?php echo base_url(); ?>js/lightbox.js"></script>
        
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