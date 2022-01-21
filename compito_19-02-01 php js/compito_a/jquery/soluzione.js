$(document).ready(function(){
	$("button").click(function(){
		var num_righe = $("input[name='righe']").val();
		var num_colonne = $("input[name='colonne']").val();
		var max_bombe = 0;
		var num_bombe = 0;
		errors = "";
		if(num_righe == null || !$.isNumeric(num_righe) || num_righe <= 0){
			errors += "Numero di righe non corretto (obbligatorio e > 0)<br/>";
		}
		if(num_colonne == null || !$.isNumeric(num_colonne) || num_colonne <= 0){
			errors += "Numero di colonne non corretto (obbligatorio e > 0)<br/>";
		}
		if(errors.length > 0){
			$("div > p").html(errors);
		}
		else{
			
			max_bombe = Math.floor(num_colonne * num_righe / 2);
			table = "<table>";
			for(var r = 0; r < num_righe; r++){
				table += "<tr>";
				for(var c = 0; c < num_colonne; c++){
					table += "<td></td>";
				}
				table += "</tr>";
			}
			table += "</table>";
			$("div:nth-child(4)").html(table);
			$("table td").click(function(){
				$("div > p").html("");
				content = $(this).html();
				if(content.length == 0){
					if(num_bombe < max_bombe){
						content = "*";
						num_bombe++;						
					}
					else{
						$("div > p").html("Massimo numero di bombe raggiunto");
					}	
				}
				else{
					content = "";
					num_bombe--;
				}
				$(this).html(content);
			});
		}
		
	});
});