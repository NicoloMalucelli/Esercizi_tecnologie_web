function get_random_int(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}


$(document).ready(function(){
	var finita = false;
	var num_righe = $("table > tbody >tr").length;
	var num_colonne = $("table > tbody > tr:first-child > td").length;
	var matrice = Array(num_righe).fill(0).map(()=>Array(num_colonne).fill(0));
	var num_bombe = Math.max(num_righe, num_colonne);
	var bombe_da_inserire = num_bombe; 
	var caselle_buone_rimaste = (num_colonne * num_righe) - num_bombe;
	
	console.log("caselle rimaste"+caselle_buone_rimaste);
	
	while(bombe_da_inserire > 0){
		r = get_random_int(0, num_righe);
		c = get_random_int(0, num_colonne);
		if(matrice[r][c] == 0){
			matrice[r][c] = 1;
			bombe_da_inserire--;
		}
	}
	
	console.log(matrice);
	
	$("table td").click(function(){
		if(finita==false){
			var content = $(this).html();
			if(content!="#"){
				var col = $(this).parent().children().index($(this));
				var row = $(this).parent().parent().children().index($(this).parent());
				
				if(matrice[row][col] == 0){
					$(this).html("#");
					caselle_buone_rimaste--;
					if(caselle_buone_rimaste == 0){
						finita=true;
						$("div p").html("Partita vinta");
					}
				}
				else{
					$(this).html("*");
					finita=true;
					$("div p").html("Partita persa");
				}
			}
		}
	});

});