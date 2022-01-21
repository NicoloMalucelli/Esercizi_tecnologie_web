function Persona(nome, cognome, data_nascita) {
    this.nome = nome;
    this.cognome = cognome;
    this.data_nascita = data_nascita;
    this.infoPersonaConsole = function() { 
		console.log("nome: " + nome + " cognome: " + cognome + " data di nascita: " + data_nascita);
	};
    this.infoPersonaDOM = function() {
		var domPersona = '<div class="card"><h2>'+ nome + ' ' + cognome +'</h2><p>'+data_nascita+'</p><span>X</span></div>';
		$("div.people").append(domPersona);
	};
}

function validaForm(){
	var is_valid = true;
	var nome = $("input[name='nome']").val();
	var cognome = $("input[name='cognome']").val();
	var data_nascita = $('input[name="data_nascita"]').val()
	var result = false;
	
	if(nome.length <= 1){
		is_valid = false;
	}
	if(cognome.length <= 1){
		is_valid = false;
	}
    if (!Date.parse(data_nascita)) {
		is_valid = false;
    }
	
	return is_valid;
}

function svuota_form(){
	$("input[name='nome']").val("");
	$("input[name='cognome']").val("");
	$("input[name='data_nascita']").val("");
}


var persone = []

$(document).ready(function() {	
	$("button").click(function(){
		event.preventDefault();
		is_form_valid = validaForm();
		if(is_form_valid){
			var nome = $("input[name='nome']").val();
			var cognome = $("input[name='cognome']").val();
			var data_nascita = $('input[name="data_nascita"]').val()
			var persona = new Persona(nome, cognome, data_nascita);
			persona.infoPersonaConsole();
			persona.infoPersonaDOM();
			persone.push(persona);
			
			svuota_form();
		}
		else{
			alert("Form non valido");
		}
	})
	$("div.people").on('click', 'div.card span', function(){
		var index = $(this).parent().index();
		console.log(index);
		console.log("prima");
		console.log(persone);
		persone.splice(index, 1);
		console.log("dopo");
		console.log(persone);
		$(this).parent().remove();
	});	
});
