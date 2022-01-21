$(document).ready(function() {
	
	//Creo matrice a partire dalla tabella
	var tabellone = Array();
	var numbers = Array(1,2,3,4,5,6,7,8,9);
	var valid = true;
	
	$("span").hide();

	$("table tr").each(function(row, row_value){
		tabellone[row] = Array();
		$(this).children('td').each(function(col, col_value){
			tabellone[row][col] = parseInt($(this).html());
		}); 
	})
	
	// Controllo righe
	for(var r = 0; r < 9; r++){
		if(!compareArray(numbers, tabellone[r])){
			valid = false;
		}
	}
	
	//Controllo colonna
	for(var c = 0; c < 9; c++){
		var tmp = Array();
		for(var r = 0; r < 9; r++){
			tmp.push(tabellone[r][c]);
		}
		if(!compareArray(numbers, tmp)){
			valid = false;
		}
	}
	
	//Controllo sottomatrice
	for(sr = 0; sr < 3; sr++){
		for(sc = 0; sc < 3; sc++){
			var tmp = Array();
			for(r = sr * 3 ; r < (sr + 1) * 3; r++){
				for(c = sc * 3; c < (sc + 1) * 3; c++){
					tmp.push(tabellone[r][c]);
				}
			}
			if(!compareArray(numbers, tmp)){
				valid = false;
			}
		}
	}
	var selector = "span.win";
	if(!valid){
		selector = "span#lose";
	}
	$(selector).show();
	console.log(valid);
});


function compareArray(array1, array2) {
	var sorted_array1 = array1.slice(0).sort();
	var sorted_array2 = array2.slice(0).sort();
	return (JSON.stringify(sorted_array1) === JSON.stringify(sorted_array2));
}

