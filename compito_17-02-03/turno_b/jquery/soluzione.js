$(document).ready(function(){
	$("main ul > li ul").hide();
	
	$("li > a").dblclick(function() {
		$(this).next().fadeToggle();
		
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