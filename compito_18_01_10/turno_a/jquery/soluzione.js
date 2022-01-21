$(document).ready(function(){
	$("button.insert").click(function(){
		valore = $("input").val();
		console.log(valore);
		colonna = valore % 10;
		console.log("colonna " + colonna);
		riga = (valore - colonna) / 10;
		console.log("riga " + riga);
		colonna++;
		riga++;
		$("table tr:nth-child("+riga+") td:nth-child("+colonna+")").css("background","red");		
	});
	
	$("button").not("button.insert").click(function(){
		$("table tr td").css("background","");
		
	});
});