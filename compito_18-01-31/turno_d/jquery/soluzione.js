$( document ).ready(function() {
	var n_rows = 6;
	var n_cols = 7;
	var matrix = [];
	var colors = ["", "red", "blue"];
	for(var i=0; i<n_rows; i++) {
		matrix[i] = [];
		for(var j=0; j<n_cols; j++) {
			matrix[i][j] = Math.floor((Math.random() * 2) + 1);
		}
	}
	genera_tabella("main > table", matrix, colors);
	
	$("table td").click(function(){
		$(this).css("background","");
		var col = $(this). index();
		var row = $(this).parent().index();
		
		matrix[row][col] = 0;	
	});
	
	$("button").click(function(){
		$("div.copia table").html("");		
		genera_tabella("div.copia table", matrix, colors);
	});
});


function genera_tabella(table, matrix, colors){
	n_rows = matrix.length;
	n_cols = matrix[0].length;
	
	for(var i=0; i<n_rows; i++) {
		$(table).append("<tr>");
		for(var j=0; j<n_cols; j++) {
			$(table+" tr:nth-child("+(i+1)+")").append("<td style='background: "+colors[matrix[i][j]]+" '></td>");
		}
		$(table).append("</tr>");
	}
}