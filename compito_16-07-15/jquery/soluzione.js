$(document).ready(function(){

  $("header:first").click(function(){
   $("body").css("font-size", "130%");
   
  });

  $("form").mouseover(function(){
      $("section").css("background-color", "orange");
      $("section").css("color", "white");

  });

  $("form").mouseout(function(){
    $("section").css("background-color", "white");
    $("section").css("color", "black");
  });


  $("input").focusin(function(){ 
    $(this).css("box-shadow", "red 5px 5px 5px"); 
    $(":input:eq(" + ($(":input").index(this) + 1) + ")").css("box-shadow", "yellow 5px 5px 5px"); 
    
});

  $("input").focusout(function(){
    $("input").css("box-shadow", "grey 5px 5px 5px");
  });

});
