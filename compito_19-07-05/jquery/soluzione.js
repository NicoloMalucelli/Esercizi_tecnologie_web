$(document).ready(function(){

	$("label + button").click(function(){
		$("p").text("");
		var nome = $("input[name='nome']").val();
		if(nome==undefined || nome.length==0){
			$("p").text("Errore! Input vuoto!");
		}
		else{
			var el = "<li><button>Up</button> "+nome+" <button>Down</button></li>";
			$("ol").append(el);
			$("input[name='nome']").val("");	
		}
	});
	
	$("ol li:last-child button:contains('Up')").click(function(){
		console.log("Up");
		$li = $(this).parent();
		$prima = $li.prev();
		$li.insertBefore($prima);
	});
	$("ol li:last-child button:contains('Down')").click(function(){
		console.log("Down");
		$li = $(this).parent();
		$dopo = $li.next();
		$li.insertAfter($dopo);
	});		

});