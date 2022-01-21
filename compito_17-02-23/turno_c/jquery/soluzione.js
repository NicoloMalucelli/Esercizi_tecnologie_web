$(document).ready(function(){
	
		$( "input" ).first().focus();
		
		
		$("input[name=email]").keyup(function() {
			email = $(this).val();
			$(this).parent().next().text(email);
		});
		
		$("select.regione").change(function() {
			provincia = $(this).val();
			$("li.provincia").hide();
			$("li.provincia"+provincia).show();
		});
		
		$( "select.regione" ).trigger( "change" );
		
});
