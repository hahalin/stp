		<div class="navbar navbar-fixed-top">
	      <div class="navbar-inner">
	        <div class="container">
	          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </a>
	          <a class="brand" href="<?php echo base_url(); ?>">SeasCloud Trade <span class="color-highlight">Startup</span></a>
	          <div class="nav-collapse">
	            <ul class="nav pull-right">
	              <li><a href="<?php echo base_url(); ?>">Home</a></li>
	              <li><a href="<?php echo base_url(); ?>features">Features</a></li>
	              <li><a href="<?php echo base_url(); ?>app">App</a></li>
				  
				  <?php if ($this->ion_auth->logged_in()) : ?>
				  
				  	<li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
				  
				  <?php endif ?>
				  
				  <?php if ($this->ion_auth->logged_in()) : ?>
				  
				  	<li><a href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
				  
				  <?php else : ?>
				  
				  	<li><a href="<?php echo base_url(); ?>auth/login">Login</a></li>
				  
				  <?php endif; ?>
				  
	            </ul>
	          </div><!--/.nav-collapse -->
	        </div>
	      </div>
	    </div>
	    
	    <div class="container">