$(document).ready(function(){
	$("table tr td").html("<ul></ul>");
	
	$("div > button").click(function(){
		var todo = $("input").val();
		if(todo == null || todo == ""){
			$("body > p").html("To Do deve essere almeno un carattere");
		}
		else{
			$("body > p").html("");
			$("input").val("");
			let item = "<li><span>"+todo+"</span> <button class='doing'>Doing</button> <button  class='delete'>Delete</button></li>";
			$("table tr td:nth-child(1) ul").append(item);
			
			$("table tr td:nth-child(1) ul li:last-child button.doing").click(function(){
				let testo = $(this).parent().find("span").text();
				let item = "<li><span>"+testo+"</span> <button class='testing'>Testing</button> <button  class='delete'>Delete</button></li>";
				$("table tr td:nth-child(2) ul").append(item);
				
				$("table tr td:nth-child(2) ul li:last-child button.testing").click(function(){
					let testo = $(this).parent().find("span").text();
					let item = "<li><span>"+testo+"</span> <button class='done'>Done</button>  <button class='delete'>Delete</button></li>";
					$("table tr td:nth-child(3) ul").append(item);
					
					$("table tr td:nth-child(3) ul li:last-child button.done").click(function(){
						let testo = $(this).parent().find("span").text();
						let item = "<li><span>"+testo+"</span> <button class='delete'>Delete</button></li>";
						$("table tr td:nth-child(4) ul").append(item);
						
						$("table tr td:nth-child(4) ul li:last-child button.delete").click(function(){
							$(this).parent().remove();
						});
						
						$(this).parent().remove();
					});
					
					$("table tr td:nth-child(3) ul li:last-child button.delete").click(function(){
						$(this).parent().remove();
					});
					
					$(this).parent().remove();
				});
				
				$("table tr td:nth-child(2) ul li:last-child button.delete").click(function(){
					$(this).parent().remove();
				});
				
				$(this).parent().remove();
			});
			
			$("table tr td:nth-child(1) ul li:last-child button.delete").click(function(){
				$(this).parent().remove();
			});
		}
	});
});