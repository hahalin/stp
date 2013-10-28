<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie linen"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie linen" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie linen" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9 linen" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js linen" lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Register</title>
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

	<!-- jQuery Form Validation -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/js/libs/formValidator/developr.validationEngine.css?v=1">


	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/developer-admin/js/libs/DataTables/jquery.dataTables.css?v=1">

	<!-- JavaScript at bottom except for Modernizr	-->
 
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
	<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="(device-width: 320px)">
	<!-- iPhone (Retina) SPLASHSCREEN (640x960) -->
	<link rel="apple-touch-startup-image" href="img/splash/iphone-retina.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)">
	<!-- iPhone 5 SPLASHSCREEN (640×1096) -->
	<link rel="apple-touch-startup-image" href="img/splash/iphone5.png" media="(device-height: 568px) and (-webkit-device-pixel-ratio: 2)">
	<!-- iPad (portrait) SPLASHSCREEN (748x1024) -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="(device-width: 768px) and (orientation: portrait)">
	<!-- iPad (landscape) SPLASHSCREEN (768x1004) -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="(device-width: 768px) and (orientation: landscape)">
	<!-- iPad (Retina, portrait) SPLASHSCREEN (2048x1496) -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait-retina.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2)">
	<!-- iPad (Retina, landscape) SPLASHSCREEN (1536x2008) -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape-retina.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 2)">

	<!-- Microsoft clear type rendering -->
	<meta http-equiv="cleartype" content="on">

	<!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
	<meta name="application-name" content="Developr Admin Skin">
	<meta name="msapplication-tooltip" content="Cross-platform admin template.">
	<meta name="msapplication-starturl" content="http://www.display-inline.fr/demo/developr">
	<!-- These custom tasks are examples, you need to edit them to show actual pages -->
	<meta name="msapplication-task" content="name=Agenda;action-uri=http://www.display-inline.fr/demo/developr/agenda.html;icon-uri=http://www.display-inline.fr/demo/developr/img/favicons/favicon.ico">
	<meta name="msapplication-task" content="name=My profile;action-uri=http://www.display-inline.fr/demo/developr/profile.html;icon-uri=http://www.display-inline.fr/demo/developr/img/favicons/favicon.ico">
</head>



<body class="full-page-wizard">
	

		
	
	<?php echo form_open_multipart("auth/register", "id='form1' class='block wizard same-height'");?>
				
	<!--<form method="post" action="index.html" class="block wizard same-height">-->

		<h3 class="block-title">Register <span style="font-size:16px;">註冊會員</span></h3>
		

		<fieldset class="wizard-fieldset fields-list">

			<legend class="legend">About you</legend>

			<div class="field-block">
				<h4>Hello!</h4>
				<p>Please fill this form to complete your registration:</p>
			</div>

			<div class="field-block button-height">
				<label for="first_name" class="label"><b>帳號</b></label>
				<!-- <input type="text" name="first_name" id="first_name" value="" class="input validate[required]"> -->
				<?php echo form_input($first_name);?>
			</div>
			
			<div class="field-block button-height">
				<label for="password" class="label"><b>Password</b></label>
				<!--
				<input type="password" name="password" id="password" value="" class="input">
				<input type="password" name="repassword" id="repassword" value="" class="input">
				-->
				<?php echo form_input($password);?>
			</div>
			<div class="field-block button-height">
				<label for="password" class="label"><b>Password-Confirm</b></label>
				<?php echo form_input($password_confirm);?>
			</div>


		</fieldset>

		<fieldset class="wizard-fieldset fields-list">

			<legend class="legend">Profile</legend>

			<!--
			<div class="field-block">
				<h4>!</h4>
				<p>nickname and avatar</p>
			</div>
			-->
			
			<div class="field-block button-height">
				<small class="input-info">This is the name that will be displayed on profile page</small>
				<label for="nickname" class="label"><b>暱稱</b></label>
				<?php echo form_input($nickname);?>
			</div>
			
			<div class="field-block button-height">
				<label for="nickname" class="label"><b>Email</b></label>
				<?php echo form_input($email);?>
			</div>				

			<div class="field-block button-height">
				<span class="label"><b>Male</b></span>
				<input type="radio" name="gender" id="gender_male" value="male" class="radio"> <label for="gender_male">Male</label>
				<!--<br>-->
				<input type="radio" name="gender" id="gender_female" value="female" class="radio"> <label for="gender_female">Female</label>
			</div>			
			
			<!--
			<div class="field-block button-height">
				<small class="input-info">This is the name that will be displayed on profile page</small>
				<label for="login" class="label"><b>User login</b></label>
				<input type="text" name="login" id="login" value="" class="input validate[required,custom[onlyLetterNumber]]">
			</div>
			-->
			
			<div class="field-block button-height">
				<label for="file" class="label"><b>Avatar</b> (*.jpg|*.png)</label>
				<span class="input file"><span class="file-text"></span><span class="button compact">Select file</span>
				<!--<input type="file" name="file-input" id="file-input" value="" class="file withClearFunctions">-->
				
				<?php echo form_input($avatar);?></span>
				<small class="input-info">Max file size: 2MB ($.jpg|*.png)</small>
			</div>
			<!--
			<div class="field-drop button-height black-inputs">
				<label for="resize_height" class="label"><b>Resize height</b> (in px)</label>
				<span class="number input margin-right">
					<button type="button" class="button number-down">-</button>
					<input type="text" name="resize_height" id="resize_height" value="320" class="input-unstyled" data-number-options='{"min":100,"max":400}'>
					<button type="button" class="button number-up">+</button>
				</span>

				<input type="checkbox" name="crop" id="crop" class="switch medium" checked="checked"> &nbsp; <label for="crop">Enable crop</label>
			</div>
			-->
			<div class="field-block button-height wizard-controls align-right">

				<button type="submit" class="button glossy mid-margin-right">
					<span class="button-icon"><span class="icon-tick"></span></span>
					Save
				</button>
				<button type="button" id="btnsubmit" class="button glossy mid-margin-right">
					<span class="button-icon"><span class="icon-tick"></span></span>
					savea
				</button>

			</div>

		</fieldset>
		
		<!--
		<fieldset class="wizard-fieldset fields-list">

			<legend class="legend">Contact</legend>

			
			<div class="field-block button-height">
				<label for="mail" class="label"><b>Mail</b></label>
				<input type="text" name="mail" id="mail" value="" class="input validate[required,custom[email]]">
			</div>

			
			<div class="field-block button-height">
				<label for="twitter" class="label"><b>Twitter username</b></label>
				<input type="text" name="twitter" id="twitter" value="" class="input">
			</div>
			
			<div class="field-block button-height">
				<label for="mobile" class="label"><b>Mobile Phone</b></label>
				<input type="text" name="mobile" id="mobile" value="" class="input">
			</div>

			<div class="field-block button-height">
				<span class="label"><b>Address</b></span>
				<input type="text" name="street" id="street" value="" class="input" placeholder="Street"><br>
				<input type="text" name="zip_code" id="zip_code" value="" class="input" placeholder="Zip" size="3"> <input type="text" name="city" id="city" value="" class="input" placeholder="City"><br>
				<select name="country" class="select">
					<option value="USA">USA</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="Afghanistan">Afghanistan</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="American Samoa">American Samoa</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antarctica">Antarctica</option>
					<option value="Antigua and Barbuda">Antigua and Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Aruba">Aruba</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
			

				</select>
			</div>

		</fieldset>

		<fieldset class="wizard-fieldset fields-list">

			<legend class="legend">Preferences</legend>

			<div class="field-block button-height">
				<label for="newsletter" class="label"><b>Subscribe to newsletter</b></label>
				<input type="checkbox" name="newsletter" id="newsletter" value="1" class="switch" checked data-text-on="YES" data-text-off="NO">
			</div>

			<div class="field-block button-height">
				<label for="newsletter_html" class="label"><b>Newsletter format</b></label>
				<input type="checkbox" name="newsletter_html" id="newsletter_html" value="1" class="switch wide orange-active" checked data-text-on="HTML" data-text-off="TEXT">
				<small class="input-info">If you are not sure, use HTML</small>
			</div>

			<div class="field-block button-height">
				<span class="label"><b>Mail notifications</b></span>
				<input type="checkbox" name="notifications[]" id="notifications_mention" value="mention" class="checkbox"> <label for="notifications_mention">When I am mentioned</label><br>
				<input type="checkbox" name="notifications[]" id="notifications_message" value="message" class="checkbox"> <label for="notifications_message">When someone sends me a message</label><br>
				<input type="checkbox" name="notifications[]" id="notifications_reply" value="reply" class="checkbox"> <label for="notifications_reply">When someone replies to one of my messages</label><br>
				<input type="checkbox" name="notifications[]" id="notifications_reviewed" value="reviewed" class="checkbox"> <label for="notifications_reviewed">When a new review is published on one of my products</label>
			</div>

			<div class="field-block button-height wizard-controls align-right">

				<button type="submit" class="button glossy mid-margin-right">
					<span class="button-icon"><span class="icon-tick"></span></span>
					Save
				</button>

			</div>

		</fieldset>
		-->
		
	</form>

	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
	<script src="<?php echo base_url();?>assets/developer-admin/js/libs/jquery-1.10.2.min.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/setup.js"></script>

	<!-- Template functions -->
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.input.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.message.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.notify.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.scroll.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.tooltip.js"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/developr.wizard.js"></script>

	<!-- jQuery Form Validation -->
	<!--
	-->
	<script src="<?php echo base_url();?>assets/developer-admin/js/libs/formValidator/jquery.validationEngine.js?v=1"></script>
	<script src="<?php echo base_url();?>assets/developer-admin/js/libs/formValidator/languages/jquery.validationEngine-en.js?v=1"></script>
	<script>

		$(document).ready(function()
		{
				// Elements
			var form = $('.wizard'),

				// If layout is centered
				centered;

			// Handle resizing (mostly for debugging)
			function handleWizardResize()
			{
				centerWizard(false);
			};

			// Register and first call
			$(window).on('normalized-resize', handleWizardResize);

			/*
			 * Center function
			 * @param boolean animate whether or not to animate the position change
			 * @return void
			 */
			function centerWizard(animate)
			{
				form[animate ? 'animate' : 'css']({ marginTop: Math.max(0, Math.round(($.template.viewportHeight-30-form.outerHeight())/2))+'px' });
			};

			// Initial vertical adjust
			centerWizard(false);

			// Refresh position on change step
			form.on('wizardchange', function() { centerWizard(true); });

			// Validation
			if ($.validationEngine)
			{
				form.validationEngine();
			}
			
			
			$('#btnsubmit').click(function()
			{
				
			});
			
			$("#form1").submit(function()
			{
				
				return true;
				
				notify(
					'', 
					'bbb',  
					{
						system:				false,
						vPos:				'top',
						hPos:				'center',
						autoClose:			true,
						icon:				'', //$('#icon').prop('checked') ? 'img/demo/icon.png' : '',
						iconOutside:		true,
						closeButton:		true,
						showCloseOnHover:	false,
						groupSimilar:		true
					}
				);
				
				return true;
			});
				
			<?php if ($message) { 

							
				//$str=str_replace($message,'\'','');
				//$str=str_replace($str,'</p>','');
			
				$list=explode('\'',$message);
				foreach($list as $item)
				{
					if (trim($item) != '')
					{
				?>
				notify(
					'', 
					<?php echo ''.$item.''; ?>,  
					{
						system:				false,
						vPos:				'top',
						hPos:				'center',
						autoClose:			true,
						icon:				'', //$('#icon').prop('checked') ? 'img/demo/icon.png' : '',
						iconOutside:		true,
						closeButton:		true,
						showCloseOnHover:	false,
						groupSimilar:		true
					}
				);
			<?php }}} ?>
			
		});

	</script>

</body>
</html>