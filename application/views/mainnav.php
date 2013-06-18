<div class="navbar" style="float:right;margin-top:25px;">
			<div class="navbar-inner" style="float:left;position:relative;">
			<div class="container-fluid">

			<ul class="nav" style="border:0px dashed red;">

			<style>
			
				#styleul li a span:first-of-type {
					padding-left: 10px;
				}
				#styleul li a span:first-of-type::after {
					content: ' ';
				}

			</style>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href=#>
				切換模版 <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" id="styleul">
					<li value="default" class="active"><a href=#><i></i><span>樸素淡妝</span></a></li>
					<li value="gray"><a href=#><i></i><span>略施脂粉</span></a></li>
					<li value="bootstrap"><a href=#><i></i><span>素顏</span></a></li>
				</ul>
			</li>
			<li class="divider-vertical"></li>
			<li>
				<a href=#><span style="font-weight:500;font-size:18px;"><?php print $user_name; ?></span></a>				
			</li>

			<style>
				.dropdown-menu li a span:first-of-type {
					padding-left: 10px;
				}
				.dropdown-menu li a span:first-of-type::after {
					content: ' ';
				}

			</style>

			<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toogle">
			<i class="icon-user"></i><span>用戶專區</span>
			<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
			<li><a href=# ><i class="icon-pencil"></i><span>設定</span></a></li>
			<li><a href="login/logout_user" ><i class="icon-off"></i><span>登出</span></a></li>
			</ul>
			</li>
			
			

			<li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toogle tour_1">
				<i class="icon-book"></i>
				交易信息
				<b class="caret"></b>
				</a>
				<ul class="dropdown-menu" style="">
					<li class="nav-header" style="">
					作業中RFQ
					</li>
					<li>
						<a href="#" id="a-active-rfq" >
							<i class="icon-th-list"></i>
							<span>清單</span>
							<span class="badge badge-warning">7</span>
						</a>
						
						<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 						<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
						
					</li>
					<li class="divider"></li>
					<li class="nav-header" style="">
						已發送RFQ
					</li>
					<li><a href=# ><i class="icon-th-list"></i><span>未回覆</span><span class="badge badge-warning">7</span></a></li>
					<li><a href=#><i class="icon-check"></i><span>已回覆</span><span class="badge badge-important">6</span></a></li>
					<li class="divider"></li>
					<li class="nav-header" style="">
						客戶詢價
					</li>
					<li><a href=#><i class=" icon-bell"></i><span>超過三天</span></span><span class="badge badge-warning">5</span></a></li>
					<li><a href=#><i class="icon-tasks"></i><span>新進詢價</span><span class="badge badge-important">16</span></a></li>
				</ul>
				
				
				
			</li>

			</ul>
			</div>
			</div>
</div>