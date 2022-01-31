function get_star_wars_characters(){	
	$.getJSON('index.php', function(characters) { 
	
		console.log(characters);
		$("table tbody").html("");
		for(var i = 0; i < characters.length; i++){
			$("table tbody").append("<tr><td>"+characters[i].name+"</td><td>"+characters[i].height+"</td><td>"+characters[i].mass+"</td></tr>");
		}
	}); 
}


$(document).ready(function() {
	
	$("table").html("<thead><tr><th>Nome</th><th>Altezza</th><th>Peso</th></tr></thead><tbody></tbody>");
	
	get_star_wars_characters();
	
	$("button").click(function(){
		var name = $("input[name='nome'").val();
		var height = $("input[name='altezza'").val();
		var mass = $("input[name='peso'").val();
		if(name.length !== 0 && height.length !== 0 && mass.length !== 0){
			$.post("index.php", { name: name, height: height, mass: mass  }, function(){
				get_star_wars_characters();
			});
		}
	});
});


