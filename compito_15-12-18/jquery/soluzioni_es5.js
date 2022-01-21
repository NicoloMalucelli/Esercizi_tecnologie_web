$(document).ready(function(){

	$("main button").click(function(){

		$(this).text(function(i, text){
			return text === "Nascondi le informazioni aggiuntive" ? "Mostra le informazioni aggiuntive" : "Nascondi le informazioni aggiuntive";
		});

		$(this).next().toggle();
	});

	$("input[name='username']").on("focusout", function(){
		var value = $("input[name='username']").val();

		var number = /[0-9]+/;
		var res = value.match(number);

		if(value.length < 5 | res) {
			$(this).css("border-color", "red");
		} else {
			$(this).removeAttr('style');
		}
	});

	$("input[name='password']").on("focusout", function(){
		var value = $(this).val();

		var number = /[0-9]+/;
		var res = value.match(number);

		if(value.length < 4 | res == null) {
			$(this).css("border-color", "red");
		} else {
			$(this).removeAttr('style');
		}
	});
});
