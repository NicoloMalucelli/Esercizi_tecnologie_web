$(document).ready(function(){

	$("#lista-utenti td:even").mouseenter(function(){
		$("#lista-utenti tr:even").css("background-color","orange");
	});
	
	$("#lista-utenti td:even").mouseleave(function(){
		$("#lista-utenti tr:even").removeAttr("style");
	});

	$("#lista-utenti td:odd").mouseenter(function(){
		$("#lista-utenti tr:odd").css("background-color","green");
	});
	
	$("#lista-utenti td:odd").mouseleave(function(){
		$("#lista-utenti tr:odd").removeAttr("style");
	});

	$("button:first").click(function(){
		if($(this).text() == "Nascondi tabella"){
			$(this).text("Visualizza tabella");
			$("#lista-utenti").parent().slideUp("slow");
		} else {
			$(this).text("Nascondi tabella");
			$("#lista-utenti").parent().fadeIn("slow");
		}

	});

});
