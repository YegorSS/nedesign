$(document).ready(function () {
    
    $('.droopdown').click(function(){
       $(this).toggleClass("open"); 
    });
    
    $('#postimage-image').change(function(){

   		var qty = this.files.length;
   		var inputtags = ""

   		for(var i = 0; i < qty; i++){
   			inputtags = inputtags + "<label class='col-sm-2 control-label right'>Alt картинки</label>  <div class='col-sm-10'> <div class='form-group field-postimage-altimage'><input type='text' id='postimage-altimage' class='form-control' name='Postimage[altimage][" + i + "]'' value=''><div class='help-block'></div></div></div>"
   		}
   			$("#imagealt").html(inputtags)
    });
    


}); 