var parola = "appello";
var codificata = "a--+--o";
$( document ).ready(function() {
	
	var errore = 0;
	
	$("span.vinto, span.perso").hide();
	$("span#parola").html(codificata);
	
	$("button").click(function(){
		var lettera = $("input").val();

		if(parola.indexOf(lettera) == -1){
			if(errore == 10){
				$("span.perso").show();
			}
			else{
				errore = aggiorna_errore(errore);
			}
		}
		else{
			for(i = 1; i < parola.length - 1; i++){
				if(parola[i] == lettera){
					codificata = replaceAt(codificata, i, lettera);
				}
			}
			console.log("aggiorno");
			console.log(codificata);
			$("span#parola").html(codificata);
			
			if(codificata.indexOf("+") == -1 && codificata.indexOf("-") == -1){
				$("span.vinto").show();
			}
		}
	});
});


function replaceAt(string, index, replace) {
  return string.substring(0, index) + replace + string.substring(index + 1);
}


function aggiorna_errore(errore){
	errore++;
	$("main div img").attr("src", "img/"+errore+".jpg");
	
	return errore;
}