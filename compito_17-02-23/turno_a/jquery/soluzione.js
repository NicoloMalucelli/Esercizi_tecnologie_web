$(document).ready(function(){
	
	
		$('legend').click(function(){
			$(this).next().fadeToggle();
		});
		
		$( "input[name=nome]").focusout(function() {
			stringa = $(this).val();
			
			if(stringa.length<3){
				$(this).parent().next().text("Deve contenere almeno 3 caratteri!");
			}
			else{
				$(this).parent().next().text("");
			}
		});
		
		$( "input[name=matricola]" ).focus(function() {
			$( this ).blur();
		});

});
