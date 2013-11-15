$(function() {
	
	var doc = $(document);
	doc.on('click','.navigable ul  li > span',function(event){
		//if (event.target !== this)
		//{
		//	return;
		//}
		
		event.preventDefault();
		var clicked = $(this);
		//alert(clicked.attr('cid'));
		if (!clicked.attr('cid'))
		{
			return;
		}
		
		$.ajax({
			url: "app/getproduct/"+clicked.attr('cid'),
			dataType:'json',
			success: function(Jdata) {
    			//alert("SUCCESS!!!");
    			//alert(Jdata);
    			$('#products li').remove();
    			var plist=$('#products');
    			for(var i=0;i<Jdata.length;i++)
    			{
    				var o=Jdata[i];
    				//alert(o['productname']);
    			    var li=$('#products').add('li').addClass('clearfix').text(o['productname']);
    			    //var leftsection=li.add('section').addClass('left');
    			    //leftsection.add('h3').text(o['productname']);
    			    //plist.add(li);
    			}
		    }
		});
	});
	
	$('.navigable ul  li > span').click(function(){
		return;//alert($(this).attr('cid'));
		
	});
	
	return;
	
	function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress);
    };
    
	
	try {
		$('.carousel').carousel({
		  interval: 8000
		})
	} catch(err){}
	
	$("#edit_profile").submit(function() {
		var errortxt = "";
		errors = 0;
		
		if ($("#company").val().length == 0) {
			errors++;
			errortxt += "Please enter your company name.\n";
		}
		
		if ($("#phone").val().length == 0) {
			errors++;
			errortxt += "Please enter your phone number.\n";
		}
		
		if ($("#biography").val().length == 0) {
			errors++;
			errortxt += "Please enter a little bit about yourself.\n";
		}
		
		if (errors > 0) {
			alert(errortxt);
			return false;
		}
		
		return true;
	});
	
	$("#edit_account").submit(function() {
		var errortxt = "";
		errors = 0;
		
		if ($("#email").val().length == 0 || !isValidEmailAddress($("#email").val())) {
			errors++;
			errortxt += "Please enter a valid e-mail address.\n";
		}
		
		if ($("#fname").val().length == 0) {
			errors++;
			errortxt += "Please enter your first name.\n";
		}
		
		if ($("#lname").val().length == 0) {
			errors++;
			errortxt += "Please enter your last name.\n";
		}
		
		if (errors > 0) {
			alert(errortxt);
			return false;
		}
		
		return true;
	});
});
