$(document).ready(function(){
	$("button").not("button#reset").click(function(){
		valore = $("input").val();
		console.log(valore);
		colonna = valore % 10;
		console.log("colonna " + colonna);
		riga = (valore - colonna) / 10;
		console.log("riga " + riga);
		$("table tr:eq("+riga+") td:eq("+colonna+")").css("background","green");
		
	});
	
	$("button#reset").click(function(){
		$("table tr td").css("background","");
		
	});
});