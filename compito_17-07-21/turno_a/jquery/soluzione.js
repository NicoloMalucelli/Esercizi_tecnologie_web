$(function() {
  $("div.popup").hide();
  
  var loading = 0;
  delta = 3;

  setColor(loading);
  updatePercentage(loading);
  
  $("div.bar div.progress").width("100%").css("text-align","right");

  $("button:first-child").click(function() {
	loading = (loading + delta > 100)? 100 : loading + delta;
    $("div.progress > div").width(loading+"%");
	console.log(loading);
	if(loading==100){
		$("div.popup").fadeIn();
	}
	setColor(loading);
	updatePercentage(loading);
  });
  
  $("button:nth-child(2)").click(function() {
	loading = (loading - delta <0)? 0 : loading - delta;
    $("div.progress > div").width(loading+"%");
	setColor(loading);
	updatePercentage(loading);
	console.log(loading);
  });
  
  $("div.popup button").click(function() {
	$("div.popup").fadeOut();
  });
});

function setColor(loading){
	if(loading <= 33){
		color = "#db2828";
	}
	else if (loading <= 67){
		color = "#f2c037";
	}
	else{
		color = "#21ba45";
	}
	$("div.progress > div").css("background-color",color);
}

function updatePercentage(loading){
		$("div.bar div.progress").html(loading+"%");
}