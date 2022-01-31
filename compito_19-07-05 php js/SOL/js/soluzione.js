$(document).ready(function(){

	$("body > button").on("click", function(){
		$name = $(`input[name="nome"]`).val();
		if($name == null || $name == ""){
			$("p").html("Errore, nome vuoto");
			return;
		}else{
			$("p").html("");
			$("ol").append(`<li><button>Up</button><button>Down</button>${$name}</li>`);
			$(`input[name="nome"]`).val("");
		}
	});

	//up
	$("ol").on("click", "button:first-of-type()", function(){
		console.log("up");
		$(this).parent().prev().before($(this).parent());
	});

	//down
	$("ol").on("click", "button:last-of-type()", function(){
		console.log("down");
		$(this).parent().before($(this).parent().next());
	});

});