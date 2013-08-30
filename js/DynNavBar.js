(function ($) {

	// this function use to change the active class at the
	// top navbar
	var url = window.location.pathname;
	var index = url.lastIndexOf('/');
	var pagestring = url.substring(index+1);
	if(pagestring == 'index.php'){
		$('.nav li a').each(function(){
			if($(this).text() == 'Home') $(this).parent().addClass("active");
		});
	}else {
		$('.nav li a').each(function(){
			if($(this).text().split(' ')[0] == pagestring.split('.')[0]) $(this).parent().addClass("active");
		});
	}
} (jQuery));