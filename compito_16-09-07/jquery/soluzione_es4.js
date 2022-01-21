$(document).ready(function(){
	var contatore = 0;
    $("button:first").click(function(){
		contatore++;
        $("span").text(contatore);
    });
	
	$("button").click(function(){
		if ($(this).text()=="Sottrai uno"){
			contatore=contatore-1;
			$("span").text(contatore);
		}
    });
	
	$("button").click(function(){
		if ($(this).text()=="Reset"){
			contatore=0;
			$("span").text(contatore);
		}
    });
	
	$("button").click(function(){
		if ($(this).text()=="Stop"){
			$("button").css("display","none");
			$(this).css("display","block");
			$(this).text("Start");
		} else if ($(this).text()=="Start"){
			$(this).text("Stop");
			$("button").css("display","block");
		}
    });
	
});