$(document).ready(function () {

	var owl = $("#owl-demo");
 
    owl.owlCarousel({
      items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    });
 

    owl.trigger('owl.play',1500); //owl.play event accept autoPlay speed as second parameter
});