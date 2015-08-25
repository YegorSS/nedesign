$(document).ready(function () {
    
    $('.droopdown').click(function(){
       $(this).toggleClass("open"); 
    });
    
    $('#postimage-image').change(function(){

   		var qty = this.files.length;
   		var inputtags = ""

   		for(var i = 0; i < qty; i++){
   			inputtags = inputtags + "<label class='col-sm-2 control-label right'>Alt картинки</label><div class='col-sm-10'><input type='text' id='postimage-alt' class='form-control' name='Postimage[alt][" + i + "]'></div><label class='col-sm-2 control-label right'>Title картинки</label><div class='col-sm-10'><input type='text' id='postimage-title' class='form-control' name='Postimage[title][" + i + "]'></div>"
   		}
   			$("#imagealt").html(inputtags)
    });
    


}); 