$(document).ready(function(){
	$("button").click(handleAdd);
});

function handleAdd(){
	var nome = $(this).siblings("input").val();
		
		if(nome == null || nome == ""){
			$("body > p").html("Nome deve essere almeno un carattere");
		}
		else{
			$("body > p").html("");
			$(this).siblings("input").val("");
			
			let item = "<li><span>"+nome+"</span> <button class='extend'>+</button></li>";
			$(this).parent().parent().prepend(item);
			
			$(this).parent().parent().find("li:first-child button").click(function(){
			
				let new_elem = $(this).parent().append("<ul><li><input type='text' name='add' /><button>Add</button></li></ul>");
				$(this).parent().find("ul > li > button").click(handleAdd);
				$(this).attr("disabled", "disabled");
			});
		}
}