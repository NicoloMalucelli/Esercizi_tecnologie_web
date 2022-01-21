$( document ).ready(function() {
	$.ajax({
		type: "post", 
		url: "data.json", 
		success: function(result){
			console.log(result);
			var stringa = result.parola;
			var codificata = codifica(stringa);
			console.log(stringa);
			console.log(codificata);
			$("span#parola").html(codificata);
		}, 
		error: function (request, status, error) {
			console.log(request);
			console.log(status);
			console.log(error);
			console.log(request.responseText);
			$("div.errore").html("<p>Errore: "+error+"</p>");
		}
	});
});

function codifica(stringa){
	stringa = stringa.toLowerCase();
	stringa_codificata = stringa[0];
	for(i = 1; i < stringa.length -1; i++){
		if(vocale(stringa[i])){
			stringa_codificata += "+";
		} 
		else{
			stringa_codificata += "-";
		}
	}
	stringa_codificata += stringa[stringa.length -1];
	
	return stringa_codificata;
}

function vocale(carattere) {
    var result = carattere == "a" || carattere == "e" || carattere == "i" || carattere == "o" || carattere == "u";

    return result;
}