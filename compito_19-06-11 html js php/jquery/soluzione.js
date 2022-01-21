function Rettangolo(base, altezza) {
    this.base = base;
    this.altezza = altezza;
    this.stampaInConsole = function() { 
		console.log("Base=" + base + " - Altezza=" + altezza + " - Perimetro=" + (2*(base + altezza)) + " - Area=" + (base * altezza));
	};
	this.visualizzaNelDOM = function(selector) {
		$(selector).append("<div style='width: "+(this.base -2)+"px;height: "+(this.altezza-2)+"px; border: 1px solid #000;'><a href='#'>x</a></div>");
		$(selector + " > div:last-child a").click(function(){
			$(this).parent().remove();
		});
	};
}

$(document).ready(function(){
	r1 = new Rettangolo(10,5);
	r1.stampaInConsole();
	var rettangoli = [];
	
	$("button").click(function(){
		var base = $("input[name='base']").val();
		var altezza = $("input[name='altezza']").val();
		var r = new Rettangolo(base,altezza);
		r.visualizzaNelDOM("body > div");
		rettangoli.push(r);
	});
});