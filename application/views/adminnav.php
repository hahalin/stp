<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="#" name="top" style="font-size:18px;">Admin 系統管理</a>
					<ul class="nav">
						<li>
							<a href="#"><i class="icon-home"></i> Home</a>
						</li>
						<li class="divider-vertical"></li>
						<li class="dropdown" > 
							<a href=# data-toggle="dropdown" class="dropdown-toggle"> 基礎數據 <b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<li>
									<a href=#>用戶管理</a>
								</li>
								<li>
									<a href=#>商品分類</a>
								</li>
								<li>
									<a href=#>企業分類</a>
								</li>
								<li>
									<a href=#>商品</a>
								</li>
								<li>
									<a href=#>企業</a>
								</li>
								<li class="divider"></li>
								<li class="nav-header">
									header
								</li>
								<li>
									<a href=#>aa</a>
								</li>
								<li>
									<a href=#>aa</a>
								</li>
							</ul>
						</li>

					</ul>

					<div class="btn-group pull-right">
						
		<?php if (isset($is_admin) && $is_admin) : ?>

					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-wrench"></i> admin <span class="caret"></span> </a>
						<ul class="dropdown-menu">
						<li>
						<a data-toggle="modal" href="#myModal"><i class="icon-user"></i> New User</a>
						</li>
						<li class="divider"></li>
						<li>
						<a href="<?php echo base_url() ?>/index.php/login/logout_user"><i class="icon-share"></i> Logout</a>
						</li>
						</ul>
						<?php else : ?>
						<a class="btn" href="<?php echo base_url() ?>/index.php/login/logout_user"><i class="icon-share"></i> Logout</a>
						<?php endif; ?>
					</div>
				</div>
				<!--/.container-fluid -->
			</div>
			<!--/.navbar-inner -->
		</div>
		<!--/.navbar -->