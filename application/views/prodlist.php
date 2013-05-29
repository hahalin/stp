<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Product List</title>
	<!--
    <script type="text/javascript" src="<?=base_url()?>application/views/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.1.js"></script>
	-->
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.9.0.min.js"></script>
	

	<script language="JavaScript">
	
		$(document).ready(function(){

			$("#prodlist li a").click(function()
			  {
				 //alert(this.id);
				 var pid=$(this).parent().attr("pid");
				 
				 $.ajax({
                   url: '/stp_cosmos/app/addpid/'+pid,
                   type: 'post',
                   cache: false,
                   success:function(data)
                   {
					    var obj = jQuery.parseJSON('{"name":"John"}');
						console.log(obj.name);
						alert(data);
                        var o=$.parseJSON(data);
                        //Ext.getCmp('logininfo_region').setTitle('系統使用者:'+o.msg.userid); 
						
                        console.log(o);
                   },
                   complete: function () {
                      
                   }
        });
			});
	
		});
	
	</script>
</head>
<body>

<div>
    <ul id="prodlist">
        <li id="a01" pid="aa"><a pid="a" id="hr01" href=#>a01</a></li>
        <li id="a02" pid="bb"><a pid="b" id="hr02"href=#>a02</a></li>
        <li id="a03" pid="bb"><a pid="c" id="hr03"href=#>a03</a></li>
    </ul>
</div>


</body>

</html>
