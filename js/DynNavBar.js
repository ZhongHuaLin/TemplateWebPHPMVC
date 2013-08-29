(function ($) {
	
	$.post('./getAllProductType.php', function(response){
		if(response.status == "ERROR"){
			console.log(response.message);
		}else{
			response.message.forEach(function(item){
				$(".dropdown .dropdown-menu").append("<li><a href=" + item.name + ">" + item.name + "</a>" +  "</li>");
			});
		}
	},"json");

} (jQuery));