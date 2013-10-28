

<style>

	body {
	  position: relative;
	  /*padding-top: 40px;*/
	}

	/* Sidenav for Docs
	 -------------------------------------------------- */

	.bs-docs-sidenav {
		width: 228px;
		margin: 30px 0 0;
		padding: 0;
		background-color: #fff;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		-webkit-box-shadow: 0 1px 4px rgba(0,0,0,.065);
		-moz-box-shadow: 0 1px 4px rgba(0,0,0,.065);
		box-shadow: 0 1px 4px rgba(0,0,0,.065);
	}
	.bs-docs-sidenav > li > a {
		display: block;
		width: 190px \9;
		margin: 0 0 -1px;
		padding: 8px 14px;
		border: 1px solid #e5e5e5;
	}
	.bs-docs-sidenav > li:first-child > a {
		-webkit-border-radius: 6px 6px 0 0;
		-moz-border-radius: 6px 6px 0 0;
		border-radius: 6px 6px 0 0;
	}
	.bs-docs-sidenav > li:last-child > a {
		-webkit-border-radius: 0 0 6px 6px;
		-moz-border-radius: 0 0 6px 6px;
		border-radius: 0 0 6px 6px;
	}
	.bs-docs-sidenav > .active > a {
		position: relative;
		z-index: 2;
		padding: 9px 15px;
		border: 0;
		text-shadow: 0 1px 0 rgba(0,0,0,.15);
		-webkit-box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
		-moz-box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
		box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
	}
	/* Chevrons */
	.bs-docs-sidenav .icon-chevron-right {
		float: right;
		margin-top: 2px;
		margin-right: -6px;
		opacity: .25;
	}
	.bs-docs-sidenav > li > a:hover {
		background-color: #f5f5f5;
	}
	.bs-docs-sidenav a:hover .icon-chevron-right {
		opacity: .5;
	}
	.bs-docs-sidenav .active .icon-chevron-right {
		background-image: url(../img/glyphicons-halflings-white.png);
		opacity: 1;
	}

	/*, .bs-docs-sidenav .active a:hover .icon-chevron-right */
	 
	 .bs-docs-sidenav.affix {
	 top: 120px;
	 }
	 .bs-docs-sidenav.affix-bottom {
	 position: absolute;
	 top: auto;
	 bottom: 270px;
	 }

</style>


<body>
   <!--data-target=".bs-docs-sidebar" data-twttr-rendered="true">-->
  	<div id="wrapper">
	  	<div id="header">
					<div id="head">
						<div id="logo">
						<a href=# > <img src="http://placehold.it/250X50" alt="Logo" /> </a>
						<label>這裡放Logo圖檔</label>
			
						</div>
		
					</div>
		</div>
		<div class="clear"></div>
		<div id="content">
	  	<div id="breadcrumb">
				<ul class="breadcrumb" style="padding:10px;">
				  <li><a href="#">首頁</a> <span class="divider">/</span></li>
				  <li><a href="#">企業分類</a> <span class="divider">/</span></li>
				  <li class="active"><?php echo $activebread; ?></li>
				</ul>
		
		</div>
	  	
	  	<div class="container-fluid">
		  
		  <div class="row-fluid">
		    <div class="span3">
		      <div class="well sidebar-nav">
		      <ul class="nav nav-list bs-docs-sidenav_ affix_">
			         <?php
	
						foreach ($bzcategory as $item) {
							$active = $item -> active ? 'active' : '';
							echo '<li class="nav-header ' . $active . '">';
							//echo '<a href="#">';
							//echo '<i class="icon-chevron-right"></i>';
							echo $item -> name;
							//echo '</a>';
							echo '</li>';
							
							foreach ($item->children as $childitem)
							{
								$active = $childitem -> active ? 'active' : '';
								echo '<li class="' . $active . '">';
								echo '<a href="#">';
								//echo '<i class="icon-chevron-right"></i>';
								echo $childitem -> name;
								echo '</a>';
								echo '</li>';
							}	
						}
					 ?>
			          <!--
			          <li class="active"><a href="#components"><i class="icon-chevron-right"></i> 1. Choose components</a></li>
			          <li class=""><a href="#plugins"><i class="icon-chevron-right"></i> 2. Select jQuery plugins</a></li>
			          <li class=""><a href="#variables"><i class="icon-chevron-right"></i> 3. Customize variables</a></li>
			          <li class=""><a href="#download"><i class="icon-chevron-right"></i> 4. Download</a></li>
			          -->
			  </ul>
			  </div>
		    </div>
		    <div class="span6">
		      <!--Body content-->
		    </div>
		  </div>
		</div>	
	</div> <!-- content-->
	</div> <!-- wrapper -->
  	 
  	 <!--
		<div id="wrapper" class="container">
				
			
 				
			<


		
	-->	
	
