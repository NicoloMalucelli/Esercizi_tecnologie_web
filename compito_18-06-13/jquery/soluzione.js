var index = -1;

$(document).ready(function() {
	
	$("div").hide();
	
	$("table tr td").click(function(){
		var new_index = $(this).index();

		if(index == new_index){
			$("div").hide();
			$("table tr td").eq(new_index).css("background", "");
			index = -1;
		}
		else{
			if(index != -1){
				$("table tr td").eq(index).css("background", "");
			}
			else{
				$("div").show();
			}
			$(this).css("background", "red");
			index = new_index;
		}
		
		
	})
	
	$("button:first-child").click(function(){
		handleMovement(-1);
	})
	
	$("button.right").click(function(){
		handleMovement(+1);
	})
	
	
	$("button:nth-child(4)").click(function(){
		handleInsert(true);
	})

	$("button:nth-child(5)").click(function(){
		handleInsert(false);
	})
});

function handleInsert(before){
	var numero = $("input[name='numero'").val();
	if(numero){
		e = $("table tr td").eq(index);
		var to_insert = "<td>"+numero+"</td>";
		if(before){
			e.before(to_insert);
			index += 1;
		}
		else{
			e.after(to_insert);
		}
	}
	else{
		alert("Numero non valido");
	}		
}

function handleMovement(step){
	var count = $("table tr td").length;
	
	if(0 <= index + step && index+ step < count){
		
		e = $("table tr td").eq(index)
		
		if(step == -1){
			e.prev().insertAfter(e);
		}
		else{
			e.next().insertBefore(e);
		}
		
		index += step;
		console.log("Sono in range");
	}
	else{
		console.log("Fuori range con index "+index+" e step "+step);
	}
}
