<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!-->
<html class="no-js" lang="en">
	<!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Developr</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">

		<!-- http://www.kylejlarson.com/blog/2012/iphone-5-web-design/ and http://darkforge.blogspot.fr/2010/05/customize-android-browser-scaling-with.html -->
		<meta name="viewport" content="user-scalable=0, initial-scale=1.0, target-densitydpi=115">

		<!-- For all browsers -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/css/reset.css?v=1">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/css/style.css?v=1">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/css/colors.css?v=1">
		<link rel="stylesheet" media="print" href="<?php echo base_url();?>assets/developer-admin/css/print.css?v=1">
		<!-- For progressively larger displays -->
		<link rel="stylesheet" media="only all and (min-width: 480px)" href="<?php echo base_url();?>assets/developer-admin/css/480.css?v=1">
		<link rel="stylesheet" media="only all and (min-width: 768px)" href="<?php echo base_url();?>assets/developer-admin/css/768.css?v=1">
		<link rel="stylesheet" media="only all and (min-width: 992px)" href="<?php echo base_url();?>assets/developer-admin/css/992.css?v=1">
		<link rel="stylesheet" media="only all and (min-width: 1200px)" href="<?php echo base_url();?>assets/developer-admin/css/1200.css?v=1">
		<!-- For Retina displays -->
		<link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="<?php echo base_url();?>assets/developer-admin/css/2x.css?v=1">

		<!-- Webfonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

		<!-- Additional styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/css/styles/form.css?v=1">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/css/styles/switches.css?v=1">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/css/styles/table.css?v=1">

		<!-- DataTables -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/js/libs/DataTables/jquery.dataTables.css?v=1">

		<!-- JavaScript at bottom except for Modernizr -->
		<script src="<?php echo base_url();?>assets/developer-admin/js/libs/modernizr.custom.js"></script>

		<!-- For Modern Browsers -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/developer-admin/img/favicons/favicon.png">
		<!-- For everything else -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/developer-admin/img/favicons/favicon.ico">

		<!-- iOS web-app metas -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- iPhone ICON -->
		<link rel="apple-touch-icon" href="<?php echo base_url();?>assets/developer-admin/img/favicons/apple-touch-icon.png" sizes="57x57">
		<!-- iPad ICON -->
		<link rel="apple-touch-icon" href="<?php echo base_url();?>assets/developer-admin/img/favicons/apple-touch-icon-ipad.png" sizes="72x72">
		<!-- iPhone (Retina) ICON -->
		<link rel="apple-touch-icon" href="<?php echo base_url();?>assets/developer-admin/img/favicons/apple-touch-icon-retina.png" sizes="114x114">
		<!-- iPad (Retina) ICON -->
		<link rel="apple-touch-icon" href="<?php echo base_url();?>assets/developer-admin/img/favicons/apple-touch-icon-ipad-retina.png" sizes="144x144">

		<!-- iPhone SPLASHSCREEN (320x460) -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/developer-admin/img/splash/iphone.png" media="(device-width: 320px)">
		<!-- iPhone (Retina) SPLASHSCREEN (640x960) -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/developer-admin/img/splash/iphone-retina.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)">
		<!-- iPhone 5 SPLASHSCREEN (640×1096) -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/developer-admin/img/splash/iphone5.png" media="(device-height: 568px) and (-webkit-device-pixel-ratio: 2)">
		<!-- iPad (portrait) SPLASHSCREEN (748x1024) -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/developer-admin/img/splash/ipad-portrait.png" media="(device-width: 768px) and (orientation: portrait)">
		<!-- iPad (landscape) SPLASHSCREEN (768x1004) -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/developer-admin/img/splash/ipad-landscape.png" media="(device-width: 768px) and (orientation: landscape)">
		<!-- iPad (Retina, portrait) SPLASHSCREEN (2048x1496) -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/developer-admin/img/splash/ipad-portrait-retina.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2)">
		<!-- iPad (Retina, landscape) SPLASHSCREEN (1536x2008) -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/developer-admin/img/splash/ipad-landscape-retina.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 2)">

		<!-- Microsoft clear type rendering -->
		<meta http-equiv="cleartype" content="on">
	</head>
