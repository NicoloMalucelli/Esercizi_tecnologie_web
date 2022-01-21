$(document).ready(function(){

	$("button").click(function(){

		if ($(this).text() == "Ingrandisci testo") {
			$("p").css("font-size",function(index,currentvalue){
				var newValue = (parseInt(currentvalue) + 9) + "px";
				if (currentvalue < "18px") {
					$(this).css("font-size", newValue);
				}
			});
		} else if ($(this).text() == "Applica background") {
			$("p:even").attr("class", "even");
			$("p:odd").attr("class", "odd");
		} else if ($(this).text() == "Reset stile") {
			$("p:odd").css("color","black");
		}
	});
	
	$("p:odd").mouseover(function(){
		if ($(this).attr("class") == "odd") {
			$(this).css("color","white");
		}
	});
});
