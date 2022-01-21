$(document).ready(function(){
	
	
		$('legend').click(function(){
			$(this).next().slideToggle();
		});
		
		
		$( "input" ).first().focus();
		
		
		$( "input[name=cognome]").focusout(function() {
			stringa = $(this).val();
		
			if(stringa.length>8){
				$(this).parent().next().text("Deve contenere al massimo 8 caratteri!");
			}
			else{
				$(this).parent().next().text("");
			}
		});
		
		$( "input[name=matricola]" ).focus(function() {
			$( this ).blur();
		});

});
