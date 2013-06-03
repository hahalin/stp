  var Appa = {
  	
  };
function setstyle(title)
{
	var formData = {
		'style':title
	};
	$.ajax({
        type: 'POST',
        url: 'app/setstyle',
        dataType: 'text',
        data: formData,
        success: function(response) {
        	getStyle();
        },
        error: function(response) {
        	
        }
   });
}

function getStyle()
{
	var formData={
		
	};
	$.ajax({
        type: 'POST',
        url: 'app/getstyle',
        dataType: 'text',
        data: formData,
        success: function(response) {
        	$('#styleul li').removeClass('active');
        	$('#styleul li[value="'+response+'"]').addClass('active');
		},
        error: function(response) {
        	
        }
   });
}
function setActiveStyleSheet(title) {
	var i, a, main;
	for( i = 0; ( a = document.getElementsByTagName("link")[i]); i++) {
		if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
			a.disabled = true;
			//alert(a.getAttribute("title"));
			if(a.getAttribute("title") == title) {
				a.disabled = false;
			}
		}
	}
	
	
	
}


$(document).ready(function() {
	
	$('')
	
	$("#testbtn").click(function(){
		App.getbaseurl();
	});

	$("#combobox").change(function() {
		setActiveStyleSheet(this.value);
		setstyle(this.value);
	});
	$('#styleul li').click(function(){
		var style=$(this).attr('value');
		setstyle(style);
		setActiveStyleSheet(style);
	});
	
	setActiveStyleSheet('default');
	
	$('#st_bootstrap').click(function() {
		setActiveStyleSheet('bootstrap');
	});

	$('more').hide();

	$('#st_default').click(function() {
		setActiveStyleSheet('default');
		
	});

	 $("#tabs-content div").hide(); // Initially hide all content
        $("#tabs li:first").attr("id","current"); // Activate first tab
        $("#tabs-content div:first").fadeIn(); // Show first tab content
        $("#tabs-content div:first div").fadeIn();
 
    $('#tabs a').click(function(e) {
    	
        e.preventDefault();
        if ($(this).parent().index()==0)
    	{
    		$('#tabswrapper #tabs-content').css('border-top-left-radius','0');
    		$('#tabswrapper #tabs-content').css('border-top-left-radius','5px');
    	}
    	else 
    	{
    		$('#tabswrapper #tabs-content').css('border-top-left-radius','5px');
    	}
    	
        $("#tabs-content > div").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $('#' + $(this).attr('title')).fadeIn(); // Show content for current tab
        $('#' + $(this).attr('title')+" div").fadeIn();
    });


	$("a.switcher").bind("click", function(e){
		e.preventDefault();
		
		var theid = $(this).attr("id");
		var theproducts = $("ul#products");
		var classNames = $(this).attr('class').split(' ');
		
		var gridthumb = "images/products/grid-default-thumb.png";
		var listthumb = "images/products/list-default-thumb.png";
		
		if($(this).hasClass("active")) {
			// if currently clicked button has the active class
			// then we do nothing!
			return false;
		} else {
			// otherwise we are clicking on the inactive button
			// and in the process of switching views!

  			if(theid == "gridview") {
				$(this).addClass("active");
				$("#listview").removeClass("active");
			
				$("#listview").children("img").attr("src","images/list-view.png");
			
				var theimg = $(this).children("img");
				theimg.attr("src","images/grid-view-active.png");
			
				// remove the list class and change to grid
				theproducts.removeClass("list");
				theproducts.addClass("grid");
			
				// update all thumbnails to larger size
				$("img.thumb").attr("src",gridthumb);
			}
			
			else if(theid == "listview") {
				$(this).addClass("active");
				$("#gridview").removeClass("active");
					
				$("#gridview").children("img").attr("src","images/grid-view.png");
					
				var theimg = $(this).children("img");
				theimg.attr("src","images/list-view-active.png");
					
				// remove the grid view and change to list
				theproducts.removeClass("grid")
				theproducts.addClass("list");
				// update all thumbnails to smaller size
				$("img.thumb").attr("src",listthumb);
			} 
		}

	});


	return;
	

	$.ajax({
		type : "POST",
		url : "ws_category.php",
		dataType : 'json',
		success : function(Jdata) {
			//alert("SUCCESS!!!");
			//return;

			$('#navi').empty();
			var str="<section class='ac-container'>";
			$.each(Jdata, function(i, item) {
				//console.log(item);
				//i%5==0) &&
				if(((i ) % 5 == 0) && ((i ) > 0)) {
					var div = $('<div></div>').css('clear', 'both');

					$('#category').append(div);
				}
				
				
				//var navdiv=$('#navi').append('<div></div>');
				//$('#navi').append('<h3><a href="#">'+item.name+'</a></h3><div><p></p></div>');
				
				

				var div = $('<div></div>').addClass('col_1').attr('id', 'cat' + (i + 1));
				var title = $('<h3><a href=#>' + item.name + '</a></h3>');
				
				$(div).append(title);
				
				
				//$(title).append('<a></a>').attr('#','#').text(item.name);

				$('#category').append(div);
				if(item.children.length > 0) {


					var ul = $(div).append('<ul>');
					
					//.append('<li>').text('test');
					//$(ul).append('<li>').text(item.children[0].name);
					//$(ul).append('<li>').text('test');
					var j = 1;

					var title2 = $('<h3>' + item.name.replace('\/','\\') + '</h3>');
					//$(title2).appendTo("#navi");					
					//str +='<h3>' + item.name + '</h3>';
					
					str +='<div><input id="ac-'+(i+1)+'" name="accordion-a'+'" type="radio" ';
					if (i==0){
					    str +=' check >';	
					}
					else
					{
						str +=' >';
					}
					str +='<label for="ac-'+(i+1)+'">'+item.name+'</label>';
					str +='<article class="ac-small">';
					var substr="";
					$.each(item.children, function(i2, item2) {
						//var li = $(ul).append('<li>').text(item2.text);
						//$(li).text(item2.name);
						//$('#navi div:last-child').append('<li><a href=#>'+item2.name+'</a></li>');
						substr +="<li><a href=#>"+item2.name+"</a></li>" 
						//substr += item2.name +'</br>';
						//$( "<li>"+item2.name+"</li>" ).appendTo( "#navi div:last-child" );
						if(j < 3) {
							$('#cat' + (i + 1) + ' ul').append('<li><a href=#>' + item2.text + '</a></li>');
						}
						j++;
					});
					if (substr !="")
					{
						str +="<ul>";
						str +=""+substr+"";
						str +="</ul>";
					}
					str +="</article></div>"
					
					
					//$( "#navi" ).accordion('destroy').accordion();
					$('#cat' + (i + 1) + ' ul').append('<li><a href=# class="more">' + '鏇村...' + '</a></li>');
				}
				
				//var ul=$(div).add('ul');
				//$(ul).add('li').text(item.name);
				
			});
			str +="</section>";
			$(str).appendTo( "#navi" );
			//return;
			
		}
	}).done(function(result) {
		//alert('done');
		//$( "#navi" ).accordion(); return;
		
		//$( "#navi" ).accordion('destroy').accordion();
		return;
		$('#navi').accordion('destroy').accordion({
			//icons : icons,
			//heightStyle : "fill",

		});
	});
	
	
	//var icons = {
	//	header : "ui-icon-circle-arrow-e",
	//	activeHeader : "ui-icon-circle-arrow-s"
	//};
	return;
	$('#navi').accordion({
		//icons : icons,
		//heightStyle : "fill",

	});

});

function a() {
	$.ajax({
		type : "POST",
		url : "ws_category.php",
		dataType : 'json',
		success : function(Jdata) {
			alert("SUCCESS!!!");
		}
	}).done(function(result) {
		alert('done');
	});
}
