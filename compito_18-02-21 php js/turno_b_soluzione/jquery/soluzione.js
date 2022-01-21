$(document).ready(function() {
	
	var selected_row = -1;
	var selected_col = -1;

	$("table.tabellone td").click(function(){
		
		if(selected_row == -1 && selected_col == -1){
			selected_col = $(this).index();
			selected_row = $(this).parent().index();
			$(this).css("background", "#a9c5f2");
		}
		else{
			var new_selected_col = $(this).index();
			var new_selected_row = $(this).parent().index();
			
			if(selected_row == new_selected_row && selected_col == new_selected_col){
				$(this).css("background", "");
				selected_row = -1;
				selected_col = -1;
			}
			else{
				$("table.tabellone tr:eq("+selected_row+") td:eq("+selected_col+")").css("background", "");
				selected_row = new_selected_row;
				selected_col = new_selected_col;
				$(this).css("background", "#a9c5f2");
			}
		}
		console.log(selected_row + " " + selected_col);
	});
	
	$("table#numeri td").click(function(){
		
		if(selected_row == -1 && selected_col == -1){
			$("p.log").html("Cella non selezionata");
		}
		else{
			var numero = $(this).html();
			$("table.tabellone tr:eq("+selected_row+") td:eq("+selected_col+")").html(numero).css("background", "");	
			selected_row = -1;
			selected_col = -1;
			$("p.log").html("Numero inserito correttamente");
		}
	});

});