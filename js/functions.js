// A collection of functions for the website
//(c) 2011 Maxim Safioulline 
//ConnectedCatMedia.com
$(document).ready(function(){
   $("dd").hide();
   $("dt a").click(function(){
	   $("dd:visible").slideUp("slow");
	   $(this).parent().next().slideDown("fast", function(){
		   $(this).next().slideDown("fast", function(){
			   $(this).next().slideDown("fast");
			 });
		   });
	   return false;
   });
   
   $("#slideshow").css("overflow", "hidden");
   
   $("#slides").cycle({
	  fx: 'fade',
	  timeout: 4000,
	  speed: 200,
	  delay: -2000,
	  slideResize: false,
	  containerResize: false,
   });

		
 });
 
$(window).resize(function() {
});