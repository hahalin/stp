			<header>
				Administrator
			</header>

			<div id="profile">
				<!--<img src="img/user.png" width="64" height="64" alt="User name" class="user-icon"> width="64" -->
				<img src="<?php echo base_url().$user_info -> avatar; ?>"   height="120"  alt="User name" class="user-icon">
				Hello
				<!-- <span class="name">John <b>Doe</b></span> -->
				<span class="name"><?php echo $user_info -> first_name; ?> </span>
			</div>
			
			<!-- By default, this section is made for 4 icons, see the doc to learn how to change this, in "basic markup explained" -->
			<ul id="access" class="children-tooltip">
				<li><a href="inbox.html" title="Messages"><span class="icon-inbox"></span><span class="count">2</span></a></li>
				<li><a href="calendars.html" title="Calendar"><span class="icon-calendar"></span></a></li>
				<li><a href="login.html" title="Profile"><span class="icon-user"></span></a></li>
				<li><a href="auth/logout" title="登出"><span class="icon-logout"></span></a></li>
				<!--<li class="disabled"><span class="icon-gear"></span></li>-->
			</ul>