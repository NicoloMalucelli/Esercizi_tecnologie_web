$(document).ready(function(){
	var numImages = 3;
	var imgVisible = 0;
	$("div.slider-image img").hide();
	$("div.slider-image img:first-child").show();
	
	$("button#prev").click(function(){
		$( "div.slider-image" ).find( "img" ).eq( imgVisible ).hide();
		imgVisible = (imgVisible-1<0)? numImages-1 : imgVisible-1;		
		$( "div.slider-image" ).find( "img" ).eq( imgVisible ).fadeIn( "slow" );
	});
	
	
	$("button.foll").click(function(){
		$( "div.slider-image" ).find( "img" ).eq( imgVisible ).hide();
		imgVisible = (imgVisible+1)%3;
		$( "div.slider-image" ).find( "img" ).eq( imgVisible ).fadeIn( "slow" );
	});
	
});
