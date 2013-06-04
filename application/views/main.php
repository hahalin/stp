<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0060)http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html -->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<link href="<?php echo base_url(); ?>assets/css/page.css" rel="stylesheet"  />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/base.css" type="text/css" media="screen" />
		<!--
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/menu.css" type="text/css" media="screen" title="gray" />
		-->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootbase.css" type="text/css" media="screen" title="bootstrap" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/graymenu.css" type="text/css" media="screen" title="default" />

		<script  src="<?php echo base_url() ?>assets/js/jquery-1.9.0.js"></script>

		<!--
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" media="screen"  />
		
		<script language="javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		-->
		
		
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/accordion.css" type="text/css" media="screen"  />

		<!--
		<script language="JavaScript" src="js/jquery.loadmask.js"></script>
		<link href="js/jquery.loadmask.css" rel="stylesheet" title="" />
		-->
		<link href="<?php echo base_url() ?>assets/css/login-control.css" rel="stylesheet" type="text/css" />

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/searchbox.css" type="text/css" media="screen"  />

		<link href="<?php echo base_url() ?>assets/css/gdlv.css" rel="stylesheet" type="text/css" />

		<link href="<?php echo base_url() ?>assets/css/tabs.css" rel="stylesheet" type="text/css" />

		<!-- login sample -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

		<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		<!-- 
			<script language="javascript" src="<?php echo base_url() ?>assets/js/main.js" ></script>
			-->
		

		<title>国内商品</title>
		<!--[if IE 6]>
		<style>
		body {behavior: url("csshover3.htc");}
		#menu li .drop {background:url("img/drop.gif") no-repeat right 8px;
		</style>
		<![endif]-->

	</head>

	<body>
		
		<?php if (isset($is_admin) && $is_admin) : ?>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="#" name="top">Post Message App</a>
					<ul class="nav">
						<li>
							<a href="#"><i class="icon-home"></i> Home</a>
						</li>
						<li class="divider-vertical"></li>
						<li class="dropdown" >
							<a href=# data-toggle="dropdown" class="dropdown-toggle">
								aa
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href=#>aa</a></li>
								<li><a href=#>bb</a></li>
								<li class="divider"></li>
								<li class="nav-header">header</li>
								<li><a href=#>aa</a></li>
								<li><a href=#>aa</a></li>
							</ul>	
							
						</li>
						<div class="btn-group pull-left">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-wrench"></i> admin <span class="caret"></span> </a>
							<ul class="dropdown-menu">
								<li>aa</li>
								<li>bb</li>
							</ul>
						</div>
					</ul>
					<div class="btn-group pull-right">
						<?php 
						//$is_admin=false; 
						if (isset($is_admin) && $is_admin) :
						?>
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
		<?php endif; ?>

		<div id="wrapper">
			<div id="header">
				<div id="head">
					<div id="logo">
						<a href=# > <img src="http://placehold.it/250X50" alt="Logo" /> </a>
						<label>這裡放Logo圖檔</label>

					</div>
					
					<div class="ui-widget"  id="cssswitcher" style="display:none;">
						
						<label>切換模版</label>
						<select id="combobox">
							<option value="bootstrap">素顏</option>
							<option value="gray" >略施脂粉</option>
							<option value="default" selected="true">樸素淡妝</option>

						</select>
					</div>

				</div>
				
				<?php if (isset($isLoggedIn) && $isLoggedIn) : ?>
				<div class="navbar" style="float:right;margin-top:25px;">
							<div class="navbar-inner" style="float:left;position:relative;">
							<div class="container-fluid">

							<ul class="nav" style="border:0px dashed red;">
								
								<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href=#>
									切換模版 <span class="caret"></span>
								</a>
									<ul class="dropdown-menu" id="styleul">
										<li value="bootstrap"><a href=#><i></i>素顏</a></li>
										<li value="gray"><a href=#><i></i>略施脂粉</a></li>
										<li value="default" class="active"><a href=#><i></i>樸素淡妝</a></li>
									</ul>
								</li>
								
								<li class="divider-vertical"></li>
								
								<li class="dropdown">
									<a href="#" data-toggle="dropdown" class="dropdown-toogle">
										<i class="icon-user"></i>用戶專區
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu">
										<li><a href=# ><i class="icon-pencil"></i>設定</a></li>
										<li><a href=# ><i class="icon-off"></i>登出</a></li>
									</ul>
								</li>
								
								
								<style>
									.dropdown-menu li a span:first-of-type
										{
											padding-left:10px;	
										}
									.dropdown-menu li a span:first-of-type::after
									{
										content:' ';
									}										
										
								</style>									
									
								<li class="dropdown">
									<a href="#" data-toggle="dropdown" class="dropdown-toogle">
									<i class="icon-book"></i>
									交易信息
									<b class="caret"></b>	
									</a>
									<!-- style="font-size:12px;" 
										font-size:1.2em;
										-->
									<ul class="dropdown-menu" style="">
										<li class="nav-header" style="">
											RFQ
										</li>
										<li><a href=# ><i class="icon-th-list"></i><span>未回覆</span><span class="badge badge-warning">7</span></a></li>
										<li><a href=#><i class="icon-check"></i><span>已回覆</span><span class="badge badge-important">6</span></a></li>
										<li class="divider"></li>
										<li class="nav-header" style="font-size:1.2em;">詢價</li>
										<li><a href=#><i class=" icon-bell"></i><span>超過三天</span></span><span class="badge badge-warning">5</span></a></li>
										<li><a href=#><i class="icon-tasks"></i><span>新進詢價</span><span class="badge badge-important">16</span></a></li>
										
										</ul>
									
								</li>
								
								
            				</ul>
            			</div>
            		</div>
           		</div>
				<?php else : ?>	
				
				
				
				<div id="logindiv" class="rborder8">
					<div class="modal-header">
						<h3> Login </h3>
					</div>
					<div class="modal-body">
						<div class="controlgroup">
							<label class="cotrol-label"> ID</label>
							<div class="controls">
								<input type="text" id="userid" class="span2" />
							</div>
						</div>
						<div class="controlgroup">
							<label class="cotrol-label"> PASSWORD</label>
							<div class="controls">
								<input type="password" id="pwd" />
							</div>
							</input>
						</div>
					</div>
					<div class="login-button">
						<button class="btn btn-primary" id="btnlogin" type="button">
							Login
						</button>
						<!--
						<div class="controls">
						</div>
						-->
					</div>
				</div>
				<?php endif; ?>

			</div>

			<div class="clear"></div>
			<ul id="menu">
				<li class="menu_right" style="background-color:transparent;margin:0;padding:0;margin-top:3px;margin-bottom:3px;">

					<div  id="white">
						<form method="get" action="/search" id="search">
							<input name="q" type="text" size="40" placeholder=" 搜尋...">
						</form>
					</div>

					<div class="clear" />

				</li>
				<li>
					<a href="#" class="drop">国内商品分类</a><!-- Begin 4 columns Item -->

					<div class="dropdown_5columns" id="category">

						<!-- Begin 4 columns container -->

						<?php
$ia=0;
$tree=array();
foreach ($tree as $t) {

if (($ia % 5)==0)
{
						?>
						<div style="clear:both;"></div>

						<?php
						}
						$ia++;
						$obj -> tid = $t -> tid;
						$obj -> name = $t -> name;
						$obj -> text = $t -> name;
						?>

						<div class="col_1">

							<h3><a href=#><?php print $t->name
							?></a></h3>
							<ul>

								<?php
$subtree = taxonomy_get_tree($t -> vid, $t -> tid, 1, false);
$i=1;
$subtree=array();
foreach ($subtree as $subt) {

								?>
								<li>
									<a href=#> <?php

									print $subt -> name;
									?></a>
								</li>
								<?php
								if ($i > 1) {
									if ($i < count($subtree)) {
										print "<li><a href=# class='more  small'>more...</a></li>";
									}
									break;
								}
								$i++;
								}
								?>
							</ul>
						</div>
						<?php
						}
						?>
					</div><!-- End 4 columns container -->

				</li><!-- End 4 columns Item -->
				<li>
					<a href=# class="drop">企業總覽TypeA</a>
					<div class="dropdown_4columns" id="tabswrapper">
						<ul id="tabs">
							<li>
								<a href="#" title="tab1">熱門</a>
							</li>
							<li>
								<a href="#" title="tab2">產業類別</a>
							</li>
							<li>
								<a href="#" title="tab3">大區</a>
							</li>
							<li>
								<a href="#" title="tab4">省份</a>
							</li>

						</ul>

						<div id="tabs-content">
							<div id="tab1" >
								<div class="col_4"></div>
								<div class="col_2">
									<h3>群組A</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
								<div class="col_2">
									<h3>群組B</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
								<div class="col_2">
									<h3>群組A</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>

										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
								<div class="col_2">
									<h3>群組A</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>

										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="tab2">
								<div class="col_4"></div>
								<div class="col_2">
									<h3>群組A</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
								<div class="col_2">
									<h3>群組B</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="tab3">
								<div class="col_4"></div>
								<div class="col_2">
									<h3>群組A</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
								<div class="col_2">
									<h3>群組B</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="tab4">
								<div class="col_4"></div>
								<div class="col_2">
									<h3>群組A</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
								<div class="col_2">
									<h3>群組B</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="tab5">
								<div class="col_4"></div>
								<div class="col_2">
									<h3>群組A</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
								<div class="col_2">
									<h3>群組B</h3>
									<ul>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>公司名稱aaa</a>
										</li>
										<li>
											<a href=#>更多...</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</li>
				<li>
					<a href=# class="drop">企業總覽-TypeB</a>
					<div class="dropdown_4columns">
						<div class="col_4">
							<h2>熱門企業分類</h2>
						</div>
						<div class="col_2">

							<h3>群組A</h3>
							<ul>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>更多...</a>
								</li>
							</ul>

						</div>

						<div class="col_2">

							<h3>群組B</h3>
							<ul>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>更多...</a>
								</li>
							</ul>

						</div>

						<div class="col_2">

							<h3>群組C</h3>
							<ul>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>更多...</a>
								</li>
							</ul>
						</div>

						<div class="col_1">

							<h3>群組D</h3>
							<ul>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>公司名稱aaa</a>
								</li>
								<li>
									<a href=#>更多...</a>
								</li>
							</ul>
						</div>

					</div>
				</li>
				<li style="display:none;">
					<a href="#" class="drop">Home</a><!-- Begin Home Item -->

					<div class="dropdown_2columns">
						<!-- Begin 2 columns container -->

						<div class="col_2">
							<h2>Welcome !</h2>
						</div>

						<div class="col_2">
							<p>
								Hi and welcome here ! This is a showcase of the possibilities of this awesome Mega Drop Down Menu.
							</p>
							<p>
								This item comes with a large range of prepared typographic stylings such as headings, lists, etc.
							</p>
						</div>

						<div class="col_2">
							<h2>Cross Browser Support</h2>
						</div>

						<div class="col_1">
							<img src="./Mega Drop Down Menu_files/browsers.png" width="125" height="48" alt="">
						</div>

						<div class="col_1">
							<p>
								This mega menu has been tested in all major browsers.
							</p>
						</div>

					</div><!-- End 2 columns container -->

				</li><!-- End Home Item -->

				<li style="display:none;">
					<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#" class="drop">5 Columns</a><!-- Begin 5 columns Item -->

					<div class="dropdown_5columns">
						<!-- Begin 5 columns container -->

						<div class="col_5">
							<h2>This is an example of a large container with 5 columns</h2>
						</div>

						<div class="col_1">
							<p class="black_box">
								This is a dark grey box text. Fusce in metus at enim porta lacinia vitae a arcu. Sed sed lacus nulla mollis porta quis.
							</p>
						</div>

						<div class="col_1">
							<p>
								Phasellus vitae sapien ac leo mollis porta quis sit amet nisi. Mauris hendrerit, metus cursus accumsan tincidunt.
							</p>
						</div>

						<div class="col_1">
							<p class="italic">
								This is a sample of an italic text. Consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi porta quis sit amet.
							</p>
						</div>

						<div class="col_1">
							<p>
								Curabitur euismod gravida ante nec commodo. Nunc dolor nulla, semper in ultricies vitae, vulputate porttitor neque.
							</p>
						</div>

						<div class="col_1">
							<p class="strong">
								This is a sample of a bold text. Aliquam sodales nisi nec felis hendrerit ac eleifend lectus feugiat scelerisque.
							</p>
						</div>

						<div class="col_5">
							<h2>Here is some content with side images</h2>
						</div>

						<div class="col_3">

							<img src="./Mega Drop Down Menu_files/01.jpg" width="70" height="70" class="img_left imgshadow" alt="">
							<p>
								Maecenas eget eros lorem, nec pellentesque lacus. Aenean dui orci, rhoncus sit amet tristique eu, tristique sed odio. Praesent ut interdum elit. Sed in sem mauris. Aenean a commodo mi. Praesent augue lacus.<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Read more...</a>
							</p>

							<img src="./Mega Drop Down Menu_files/02.jpg" width="70" height="70" class="img_left imgshadow" alt="">
							<p>
								Aliquam elementum felis quis felis consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi. Aliquam pretium mollis fringilla. Nunc in leo urna, eget varius metus. Aliquam sodales nisi.<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Read more...</a>
							</p>

						</div>

						<div class="col_2">

							<p class="black_box">
								This is a black box, you can use it to highligh some content. Sed sed lacus nulla, et lacinia risus. Phasellus vitae sapien ac leo mollis porta quis sit amet nisi. Mauris hendrerit, metus cursus accumsan tincidunt.Quisque vestibulum nisi non nunc blandit placerat. Mauris facilisis, risus ut lobortis posuere, diam lacus congue lorem, ut condimentum ligula est vel orci. Donec interdum lacus at velit varius gravida. Nulla ipsum risus.
							</p>

						</div>

					</div><!-- End 5 columns container -->

				</li><!-- End 5 columns Item -->

				<li class="menu_right2" style="display:none;">
					<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#" class="drop">1 Column</a>

					<div class="dropdown_1column align_right">

						<div class="col_1">

							<ul class="simple">
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">FreelanceSwitch</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Creattica</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">WorkAwesome</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Mac Apps</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Web Apps</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">NetTuts</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">VectorTuts</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">PsdTuts</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">PhotoTuts</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">ActiveTuts</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Design</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Logo</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Flash</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Illustration</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">More...</a>
								</li>
							</ul>

						</div>

					</div>

				</li>

				<li class="menu_right2" style="display:none;">
					<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#" class="drop">3 columns</a><!-- Begin 3 columns Item -->

					<div class="dropdown_3columns align_right2">
						<!-- Begin 3 columns container -->

						<div class="col_3">
							<h2>Lists in Boxes</h2>
						</div>

						<div class="col_1">

							<ul class="greybox">
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">FreelanceSwitch</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Creattica</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">WorkAwesome</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Mac Apps</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Web Apps</a>
								</li>
							</ul>

						</div>

						<div class="col_1">

							<ul class="greybox">
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">ThemeForest</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">GraphicRiver</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">ActiveDen</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">VideoHive</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">3DOcean</a>
								</li>
							</ul>

						</div>

						<div class="col_1">

							<ul class="greybox">
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Design</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Logo</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Flash</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Illustration</a>
								</li>
								<li>
									<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">More...</a>
								</li>
							</ul>

						</div>

						<div class="col_3">
							<h2>Here are some image examples</h2>
						</div>

						<div class="col_3">
							<img src="./Mega Drop Down Menu_files/02.jpg" width="70" height="70" class="img_left imgshadow" alt="">
							<p>
								Maecenas eget eros lorem, nec pellentesque lacus. Aenean dui orci, rhoncus sit amet tristique eu, tristique sed odio. Praesent ut interdum elit. Maecenas imperdiet, nibh vitae rutrum vulputate, lorem sem condimentum.<a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Read more...</a>
							</p>

							<img src="./Mega Drop Down Menu_files/01.jpg" width="70" height="70" class="img_left imgshadow" alt="">
							<p>
								Aliquam elementum felis quis felis consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi. Aliquam pretium mollis fringilla. Vestibulum tempor facilisis malesuada. <a href="http://nettuts.s3.amazonaws.com/819_megamenu/demo/index.html#">Read more...</a>
							</p>
						</div>

					</div><!-- End 3 columns container -->

				</li><!-- End 3 columns Item -->

			</ul>
			<div class="clear"></div>

			<!-- style="width:1000px;margin:0 auto;padding:5px;" -->

			<div class="clear" ></div>

			<div id="content">

				<div id="navi">

				</div>
				<div id="main_content">
					<header>
												
						<span class="list-style-buttons"> <a href="#" id="gridview" class="switcher"> <img src="<?php echo base_url(); ?>images/grid-view.png" alt="Grid"></a> <a href="#" id="listview" class="switcher active"> <img src="<?php echo base_url(); ?>images/list-view-active.png" alt="List"> </a> </span>
						<h1>Our Products</h1>
					</header>
					<ul id="products" class="list clearfix">
						<!-- row 1 -->
						<li class="clearfix">
							<section class="left">
								
								<img src="http://placehold.it/190X120" alt="default thumb" class="thumb">
								<h3>Product Name</h3>
								<span class="meta">Product ID: 543J423</span>
							</section>

							<section class="right">
								<span class="darkview"> <a href="javascript:void(0);" class="firstbtn">
									<button class="btn blue">
										明細
									</button> </a> <a href="javascript:void(0);">
									<button class="btn orange">

										RFQ

									</button> </a> </span>
							</section>
						</li>

						<!-- row 2 -->
						<li class="clearfix alt">
							<section class="left">
								<img src="images/products/list-default-thumb.png" alt="default thumb" class="thumb">
								<h3>Product Name</h3>
								<span class="meta">Product ID: 543J424</span>
							</section>

							<section class="right">

								<span class="darkview"> <a href="javascript:void(0);" >
									<button class="btn blue">
										明細
									</button> </a> <a href="javascript:void(0);">
									<button class="btn orange">

										RFQ

									</button> </a> </span>
							</section>
						</li>

						<!-- row 3 -->
						<li class="clearfix third">
							<section class="left">
								<img src="images/sale-banner.png" alt="on sale" class="featured-banner">
								<img src="images/products/list-default-thumb.png" alt="default thumb" class="thumb">
								<h3>Product Name</h3>
								<span class="meta">Product ID: 543J425</span>
							</section>

							<section class="right">

								<span class="darkview"> <a href="javascript:void(0);" >
									<button class="btn blue">
										明細
									</button> </a> <a href="javascript:void(0);">
									<button class="btn orange">

										RFQ

									</button> </a> </span>

							</section>
						</li>

						<!-- row 4 -->
						<li class="clearfix alt">
							<section class="left">
								<img src="images/products/list-default-thumb.png" alt="default thumb" class="thumb">
								<h3>Product Name</h3>
								<span class="meta">Product ID: 543J426</span>
							</section>

							<section class="right">
								<span class="darkview"> <a href="javascript:void(0);" >
									<button class="btn blue">
										明細
									</button> </a> <a href="javascript:void(0);">
									<button class="btn orange">

										RFQ

									</button> </a> </span>

							</section>
						</li>

						<!-- row 5 -->
						<li class="clearfix">
							<section class="left">
								<img src="images/products/list-default-thumb.png" alt="default thumb" class="thumb">
								<h3>Product Name</h3>
								<span class="meta">Product ID: 543J427</span>
							</section>

							<section class="right">

								<span class="darkview"> <a href="javascript:void(0);" >
									<button class="btn blue">
										明細
									</button> </a> <a href="javascript:void(0);">
									<button class="btn orange">

										RFQ

									</button> </a> </span>

							</section>
						</li>

						<!-- row 6 -->
						<li class="clearfix alt third">
							<section class="left">
								<img src="images/products/list-default-thumb.png" alt="default thumb" class="thumb">
								<h3>Product Name</h3>
								<span class="meta">Product ID: 543J428</span>
							</section>

							<section class="right">
								<span class="darkview"> <a href="javascript:void(0);" >
									<button class="btn blue">
										明細
									</button> </a> <a href="javascript:void(0);">
									<button class="btn orange">

										RFQ

									</button> </a> </span>

							</section>
						</li>

					</ul>

				</div>
				<div style="clear:both;overflow:hidden;height:1%;"></div>
			</div>

		</div>
		</div>
	</body>
	<!--
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	-->

	<script src="<?php echo base_url(); ?>/assets/js/vendor/bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/main_o.js"></script>
	
	
