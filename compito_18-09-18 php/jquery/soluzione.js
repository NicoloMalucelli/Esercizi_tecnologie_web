function generaGriglia(grandezza){
	var table = "<table>";
	for(r = 0; r < grandezza; r++){
		table += "<tr>";
		for(c = 0; c < grandezza; c++){
			table += "<td>[ ]</td>";
		}
		table += "</tr>";
	}
	table += "</table>";
	
	return table;
}

function generaArray(grandezza){
	var array = [];
	for(i = 0; i < grandezza / 2; i++){
		array.push(i);
		array.push(i);
	}
	
	return array;
}

function shuffle(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}

$(document).ready(function() {	
	var numeri;
	var celle_selezionate = [];
	var celle_bloccate = [];
	var radice;
	$("form button").click(function(){
		event.preventDefault();
		var numero = $("input").val();
		radice = Math.sqrt(numero);
		if(Number.isInteger(radice) && radice % 2 == 0){
			var table = generaGriglia(radice);
			$("div").append(table);
			
			numeri = generaArray(numero);
			numeri = shuffle(numeri);
			console.log(numeri);
		} else{
			alert("Numero non valido");
		}
	});
	
	$("div").on('click', 'table td', function(){
		console.log("celle selezionate");
		console.log(celle_selezionate);
		if(celle_selezionate.length == 2){
			console.log("devo sistemare la griglia");
			c1 = celle_selezionate[0];
			c2 = celle_selezionate[1];
			console.log($("td:eq("+c1+")"));
			$("td:eq("+c1+")").html("[ ]");
			$("td:eq("+c2+")").html("[ ]");
			celle_selezionate = [];
		}
		var indice_colonna = $(this).index();
		var indice_riga = $(this).parent().index();
		var indice = indice_riga * radice + indice_colonna;
		console.log("indice selezionato");
		console.log(indice);
		$(this).html("[" + numeri[indice] + "]");
		celle_selezionate.push(indice);
		
		if(celle_selezionate.length == 2){
			//controllo se elementi sono uguali
			c1 = celle_selezionate[0];
			c2 = celle_selezionate[1];
			if(numeri[c1] == numeri[c2]){
				//sono uguali
				celle_bloccate.push(c1);
				celle_bloccate.push(c2);
				celle_selezionate = []
			}
		}
	});	

});
