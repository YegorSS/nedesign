$(document).ready(function () {

	var owlthumb = $("#owl-thumb");

    owlthumb.owlCarousel({
    	autoPlay: 2000, //Set AutoPlay to 3 seconds
    	items : 4 //10 items above 1000px browser width
    });





    $(function() {
 
	$(window).scroll(function() {
 
if($(this).scrollTop() != 0) {
 
$('#toTop').fadeIn();
 
} else {
 
$('#toTop').fadeOut();
 
}
 
});
 
$('#toTop').click(function() {
 
$('body,html').animate({scrollTop:0},800);
 
});
 
});





    
            
});