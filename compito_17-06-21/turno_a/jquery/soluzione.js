// Attendo il caricamento del DOM
$(function() {

  var currImageIndex = -1;

  $("div.popup").hide();

  $("img").click(function() {
    $("div.picture").append($(this).clone());
    $("div.popup").show();
    currImageIndex = $("div.slider-image img").index($(this));
  });

  $("div.popup button.close").click(function() {
    $("div.picture").empty();
    $("div.popup").hide();
    currImageIndex = -1;
  });

  $("div.popup button#prev").click(function() {
    $("div.picture").empty();
    var prevIndex = currImageIndex == 0 ? $("div.slider-image img").index($("div.slider-image img:last")) : (currImageIndex - 1);
    currImageIndex = prevIndex;
    $("div.picture").append($("div.slider-image img:eq(" + currImageIndex + ")").clone());
  });

  $("div.popup button.foll").click(function() {
    $("div.picture").empty();
    var nextIndex = currImageIndex == $("div.slider-image img").index($("div.slider-image img:last")) ? 0 : (currImageIndex + 1);
    currImageIndex = nextIndex;
    $("div.picture").append($("div.slider-image img:eq(" + currImageIndex + ")").clone());
  });
});
