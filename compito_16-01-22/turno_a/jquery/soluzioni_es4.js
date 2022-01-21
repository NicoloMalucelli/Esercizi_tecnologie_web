$(document).ready(function(){

  $("div.titolo").click(function(){
    $(this).css("background-color", "blue");
    $(this).css("color", "white");
    $(this).next().slideToggle(function() {
      if($(this).is(":visible")) {
        $(this)
			.css("background-color", "#daedef")
			.css("border-style", "solid")
			.css("border-color", "blue");

      } else {
        $(this).prev()
			.css("background-color", "#daedef")
			.css("color", "black");
      }
    });
  });

  $("div.descrizione").mouseover(function() {
    $(this).find("p").css("font-size", "20px");
  });

  $("div.descrizione").mouseout(function() {
    $(this).find("p").css("font-size", "18px");
  });


});
