$(document).ready(function(){

	$("#tabella > button").click(function() {
		if($(this).text() == "Nascondi tabella") {
			$bottone = $(this);
			$("#utenti").parent().fadeOut("slow", function() {
				$bottone.text("Mostra tabella");
			});

		} 
		else if ($(this).text() == "Mostra tabella"){
			$("#utenti").parent().slideDown("slow", function() {
				$bottone.text("Nascondi tabella");
			});
		}
	});

	$("#utenti tr:odd").mouseover(function() {
		$("#utenti tr:odd").css("background-color", "#b7bff7");
	});

	$("#utenti tr:odd").mouseout(function() {
		$("#utenti tr:odd").css("background-color", "white");
	});

	$("#utenti tr:even").mouseover(function() {
		$("#utenti tr:even").css("background-color", "#b7f7ee");
	});

	$("#utenti tr:even").mouseout(function() {
		$("#utenti tr:even").css("background-color", "white");
	});

});
