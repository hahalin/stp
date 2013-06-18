<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <title></title>
	  <meta name="description" content="">
	  <meta name="viewport" content="width=device-width">

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<link href="<?php echo base_url(); ?>assets/css/page.css" rel="stylesheet"  />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.twitter.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/base.css" type="text/css" media="screen" />

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/menu.css" type="text/css" media="screen" title="default" />

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootbase.css" type="text/css" media="screen" title="bootstrap" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/graymenu.css" type="text/css" media="screen" title="gray" />

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

		<!-- login sample 

		<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		-->
		<link href="<?php echo base_url() ?>assets/css/breadcrumb.css" rel="stylesheet" type="text/css" />
		
		<!--
		<script language="javascript" src="<?php echo base_url() ?>assets/js/main.js" ></script>
		-->
		
		<!-- website tour test -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/tour_style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquerytour.css" />
		<script src="<?php echo base_url(); ?>assets/js/cufon-yui.js" type="text/javascript"></script>
		<!-- /website tour test -->
		
		<title>国内商品</title>
		<!--[if IE 6]>
		<style>
		body {behavior: url("csshover3.htc");}
		#menu li .drop {background:url("img/drop.gif") no-repeat right 8px;
		</style>
		<![endif]-->

	</head>

	<body>
  		
  		<?php
  		   if (isset($error) && (trim($error)!=''))
		   {
		   	 //$data['error'] = '登入帳號密碼錯誤';
		   	 $data['error']=$error;
  		     $this->load->view('errdiv',$data);   
		   }
  		?>
		
		<?php $is_admin=false;if (isset($is_admin) && $is_admin) : $this->load->view('adminnav'); endif;?>
		
		 
		<div id="wrapper">
				
			
        <!-- header div -->					
				
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

			<?php 
			   if (isset($isLoggedIn) && $isLoggedIn) : $this->load->view('mainnav'); 
			   else : $this->load->view('logindiv'); 
			   endif;
			?>
			
			</div>

		<!-- /header div -->
			
			<div class="clear"></div>
			
		<!-- menu div -->
			
			<ul id="menu">
			<li class="menu_right" style="background-color:transparent;margin:0;padding:0;margin-top:3px;margin-bottom:3px;">

			<div  id="white">
			<form method="get" action="/search" id="search">
			<input name="q" type="text" size="40" placeholder=" 搜尋..." class="tour_2">
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
			
		<div id="breadcrumb" >
			<ul class="breadcrumb" style="padding:10px;">
				<li><a href="#">首頁</a> <span class="divider">/</span></li>
				<li><a href="#">商品分類</a> <span class="divider">/</span></li>
				<li class="active">分類1 </li>
			</ul>
		</div>
		
		
		<div id="content" >

			
		<div id="navi" >
			
		</div>

		<!-- main_content div -->
		<div id="main_content" >
				<header>

					<span class="list-style-buttons"> <a href="#" id="gridview" class="switcher tour_3"> <img src="<?php echo base_url(); ?>images/grid-view.png" alt="Grid"></a> 
					<a href="#" id="listview" class="switcher active tour_4"> <img src="<?php echo base_url(); ?>images/list-view-active.png" alt="List"> </a> </span>
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
				
				<!-- pagination div -->
				<div style="clear:both;overflow:hidden;height:1%;"></div>
				
				<div class="pagination pagination-large pagination-centered">
						<ul >
							<li><a href="#">«</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">»</a></li>
						</ul>
				</div><!-- /pagination div -->
				
		</div><!-- /main_content div -->
		

		</div>  <!-- /content div -->


		</div>  <!-- /main_content -->
		
		</div>  <!-- /wrapper -->
		
		
		<!-- ****************************************************************** -->
  <!--                        Active RFQ List Window                       -->
  <!-- ****************************************************************** -->


	<div id="dv-active-rfq-list"  style="position:absolute;display:none;">
										<h3>RFQ清單</h3>
										<span class="closediv" class="tooltip" title="關閉" type="button" class="close" data-dismiss="modal" aria-hidden="true">
											
											<i class="icon-remove"></i>
											
										</span>
										<div style="margin-left:10px;margin-right:10px;background:white;" >
										<table id="tb-rfq-list" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
												<th colspan="4" rowspan="1" style='text-align:center;vertical-align:middle'>
													<h4>單號:20130606001 &nbsp;&nbsp;日期:2013-06-06</h4>
												</th>
												</tr>		
												<tr>
													<th style="width:10px;">#</th>
													<th style="width:50px;">商品編號</th>
													<th style="width:70px;">供應商</th>
													<th style="width:70px;">聯絡人</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>1</td>
													<td><a href=#>Prod001</a></td>
													<td><a href=#>Suppliera</a></td>
													<td><a href=#>Contact</a></td>
												</tr>
												<tr>
													<td>2</td>
													<td><a href=#>Prod001</a></td>
													<td><a href=#>Suppliera</a></td>
													<td><a href=#>Contact</a></td>
												</tr>
												<tr>
													<td>3</td>
													<td><a href=#>Prod001</a></td>
													<td><a href=#>Suppliera</a></td>
													<td><a href=#>Contact</a></td>
												</tr>
												<tr>
													<td>4</td>
													<td><a href=#>Prod001</a></td>
													<td><a href=#>Suppliera</a></td>
													<td><a href=#>Contact</a></td>
												</tr>
												<tr>
													<td>5</td>
													<td><a href=#>Prod001</a></td>
													<td><a href=#>Suppliera</a></td>
													<td><a href=#>Contact</a></td>
												</tr>
												<tr>
													<td>6</td>
													<td><a href=#>Prod001</a></td>
													<td><a href=#>Suppliera</a></td>
													<td><a href=#>Contact</a></td>
												</tr>
												<tr>
													<td>7</td>
													<td><a href=#>Prod001</a></td>
													<td><a href=#>Suppliera</a></td>
													<td><a href=#>Contact</a></td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th colspan="4" rowspan="1">總計:7筆</th>
													
												</tr>
											</tfoot>
										</table>
										</div>
	</div>
		
	</body>
	<!--
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	-->

	<script src="<?php echo base_url(); ?>/assets/js/vendor/bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/main_o.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/showguide.js"></script>
	
	<div class="clear"></div>
	
<?php
$data=array();
$this->load->view('pfooter',$data);
?>
