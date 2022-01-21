$(document).ready(function(){
	$("button.insert").click(function(){
		var duplicate = false;
		var valore = $("input").val();
		console.log(valore);

		//check se il valore è duplicato
		$('.col-md-1').each(function() {
			if($(this).html() == valore){
				duplicate = true;
			}
		});

		console.log(duplicate);
		var numElement = $(".col-md-1").length
		if(valore>0 && valore <91){
			if(numElement <5){
						if(duplicate == false){
							//inserisci il valore
							$(".row").prepend("<div class='col-md-1'>" + valore + "</div>")
							$(".col-md-1:first-child").css("background","green");
						 }else{
							$(".error").append("<p>Il valore è già stato inserito</p>").css("background","red");
						 }
			}else{
					$(".error").append("<p>Raggiunto il numero massimo di numero da inserire</p>").css("background","red");
			}
		}else{
			$(".error").append("<p>Non è possibile inserire questo numero</p>").css("background","red");
		}
	});

	$("button").not("button.insert").click(function(){
		$(".row .col-md-1").remove();
		$(".error p").remove();
	});
});
