$(document).ready(function(){
	$("button").first().click(function(){
		$("p").each(function(index, el){
			var value = $(this).css("font-size");
			var size = value.slice(0,-2);
			if (parseInt(size) > 21) {
				size = size - 6;
				$(this).css("font-size", size);
			}	
		});
	});

	$("button").eq(1).click(function(){
		$songTextP = $('body').children("p");
		$songTextP.filter(":odd").addClass("giallo");
		$songTextP.filter(":even").addClass("blu");
	});
    
    $("button").eq(2).click(function(){
		$("body").children("p").removeClass("giallo blu");
    });
    
    // Inversione background
    $('body').children("p").mouseenter(function(){
        var source = $(this);
        
        if (source.hasClass("giallo")){
			source.removeClass("giallo").addClass("blu");
        } else if (source.hasClass("blu")){
			source.removeClass("blu").addClass("giallo");
        }
    });
    
});

