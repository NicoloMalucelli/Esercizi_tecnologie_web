$(document).ready(function(){
	
	$.getJSON( "data.json", function( data ) {
		code = "";
		for(i = 0; i < data.length; i++){
			code += "<div><a href='#'>Elemento "+(i+1)+"</a><ul>";
			$.each(data[i], function(key, value){
				code += "<li>"+key+": "+value+"</li>";
			});
			code += "</ul></div>";
		}
		
		$("main").append(code);
	}).done(function() {
		$("main div ul").not("main div:first-child ul").hide();
		$("a").click(function() {
			$("main ul").hide();
			$(this).next().show();
		});
	}).fail(function() {
		$("main").append("<p>Errore nel caricamento dei dati</p>");
	});

});