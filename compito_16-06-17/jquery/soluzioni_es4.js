$(document).ready(function(){


  $("#gelati").click(function() {
    $("h2").each(function(index,element) {
      var element = $(this).text();
      if(element == "Gelati") {
        $(this).fadeOut();
        $(this).next().fadeOut();
      }

    });
  });

  $("#bevande").click(function() {
    $("h2").each(function(index,element) {
      var element = $(this).text();
      if(element == "Bevande") {
        $(this).slideUp();
        $(this).next().slideUp();
      }

    });
  });



  $("h2").on({
          mouseover: function(){
            var element = $(this).text();
            if(element == "Gelati") {
              $(this).css("background", "yellow");
              $(this).next().css("background", "yellow");
            } else {
              $(this).css("background", "blue");
              $(this).next().css("background", "blue");
            }
          },
          mouseout: function(){
            $(this).css("background", "white");
            $(this).next().css("background", "white");
          }
  });

  $("form").on({
          mouseover: function(){
            var element = $(this).prev().text();
            if(element == "Gelati") {
              $(this).css("background", "yellow");
              $(this).prev().css("background", "yellow");
            } else {
              $(this).css("background", "blue");
              $(this).prev().css("background", "blue");
            }
          },
          mouseout: function(){
            $(this).css("background", "white");
            $(this).prev().css("background", "white");
          }
  });


});
