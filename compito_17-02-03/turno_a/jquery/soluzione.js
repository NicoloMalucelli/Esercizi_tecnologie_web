$(document).ready(function(){
	$("main ul > li ul").hide();
	
	$("li > a").hover(function() {
		$(this).next().slideToggle();
		
		if ($(this).siblings().size() == 0) {
			$("span").text($(this).text());
			$(this).parents("ul").each(function() {
				if ($(this).prev().text() != "Dropdown") {
					$("span").text( $(this).prev().text() + " - "  + $("span").text());
				}
			});
		}
	});
});