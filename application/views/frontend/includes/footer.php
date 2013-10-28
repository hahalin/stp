			<hr>
	
			<footer class="row">
				<div>
					<div class="span4">
						<div class="is-padded">
							<nav>
								<h2>Navigation</h2>
								<hr>
								<ul>
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
							</nav>
						</div>
					</div>
					<div class="span4">
						<div class="is-padded">
							<h2>Features</h2>
							<hr>
							<blockquote>
								- <a href="http://www.codeigniter.com" target="_blank">Built on Codeigniter</a><br/>
								&nbsp;- <a href="http://twitter.github.com/bootstrap/" target="_blank">Twitter Bootstrap Structure</a><br/>
								&nbsp;- Register/Login/Forgot Password<br/>
								&nbsp;- <b>iPhone Application</b><br/>
								&nbsp;- Responsive Design<br/>
								&nbsp;- Backend user area<br/>
								&nbsp;- Frontend user profiles<br/>
								&nbsp;- Profile editing<br/>
								&nbsp;- Easy to install<br/>
								&nbsp;- Completely scalable to your needs!
							</blockquote>
						</div>
					</div>
					<div class="span4">
						<div class="is-padded">
					  <h2>Overview</h2>
					  <hr>
							  <blockquote>
							  	<b>Web Bootstrap Startup</b> is an all in one solution for anyone looking to <em>start</em> their own web service. Complete with a compatible iPhone app that your users log into, <b>Web Bootstrap Startup</b> alleviates all of the stresses of getting off the ground. Just install, tweak, and promote!
							  </blockquote>
						  </div>
					</div>
				</div>
				<p>
				&copy;2013 Web Startup Bootstrap.<br>
				</p>
			</footer>
			
			</div><!-- /container -->