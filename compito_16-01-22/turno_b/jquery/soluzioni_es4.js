$(document).ready(function(){

	$("div.descr_libro")
		.css("background-color", "#daedef")
		.css("border-style", "solid")
		.css("border-color", "orange");

	$("div.titolo_libro").click(function(){

		$(this).next().fadeToggle(function() {
			if($(this).is(":visible")) {
				$(this).prev()
					.css("background-color", "#f7f19e")
					.css("color", "black");
			} else {
				$(this).prev()
					.css("background-color", "orange")
					.css("color", "white");
			}
		});
	});

	$("div.descr_libro").mouseover(function() {
		$(this).find("p").css("font-size", "20px");
	});

	$("div.descr_libro").mouseout(function() {
		$(this).find("p").css("font-size", "18px");
	});
});
