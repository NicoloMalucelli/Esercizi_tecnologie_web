$( document ).ready(function() {
	var turno = 0;
	var colori = ["red", "blue"];
	num_rows = 6;
	$("span").hide();
	
	var colonne = [num_rows, num_rows, num_rows, num_rows, num_rows, num_rows, num_rows];
	
	$("div.turno").css("background","red");
	
	$("button").click(function(){
		$("span").hide();
		colonna = $("input").val();
		
		riga = colonne[colonna - 1];
		
		if(riga!=0){
		
			colonne[colonna - 1] = riga - 1;
			console.log(riga);
			
			$("table tr:nth-child("+riga+") td:nth-child("+colonna+")").css("background",colori[turno]);
			
			turno = aggiorna_turno(turno, colori);
		}
		else{
			$("span").show();
		}
	});
	
});

function aggiorna_turno(turno, colori){
	turno = (turno + 1) % 2;
	$("div.turno").css("background",colori[turno]);
	
	return turno;
}