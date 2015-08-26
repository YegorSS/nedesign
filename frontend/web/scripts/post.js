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



$('#carousel-order').carousel({
  interval: 15000
})


/////Вопрос-ответ////////

$('a[href="#messages"]').click(function() {
$('#messages').append('<p style="text-align: center; font-size: 30px;" class="loader"><i class="fa fa-cog fa-spin"></i> Загрузка</p>');
$('#messages').append('<div id="hypercomments_widget"></div>');
$('#hypercomments_widget').hide();



        var scr = "<" + "script>_hcwp = window._hcwp || [];_hcwp.push({widget:'Stream', widget_id: 61067});(function() {if('HC_LOAD_INIT' in window)return;        HC_LOAD_INIT = true;var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage ||  'en').substr(0, 2).toLowerCase();var hcc = document.createElement('script'); hcc.type = 'text/javascript'; hcc.async = true;hcc.src = ('https:' == document.location.protocol ? 'https' : 'http')+'://w.hypercomments.com/widget/hc/61067/'+lang+'/widget.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(hcc, s.nextSibling);})();" + "<" + "/script>";


$('#messages').append(scr);


setTimeout(function() {
          $('.loader').remove();
          $('#hypercomments_widget').show();
        }, 1000);

});


/////Вопрос-ответ////////
    
            
});