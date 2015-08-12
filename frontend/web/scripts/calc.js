$(document).ready(function () {
	
    
	$('.variant').click(function(){
		$('.size').removeClass('visible');
		
		var variantId;
		variantId = $(".variant:checked").attr("value");
		if(variantId == 0){
			$('.size').addClass("visible");
		}

		$('.variant' + variantId).addClass("visible");
	});

	$('.size').click(function(){
		$('.color').removeClass('visible');
		
		var sizeId;
		sizeId = $(".size:checked").attr("value");
		if(sizeId == 0){
			$('.color').addClass("visible");
		}

		$('.size' + sizeId).addClass("visible");
	});

	$('.summary').on("change click keyup", function(){
		var priceSize;
		var colorPrice;
		var priceWork;
		var firstPrice;
        var quantity;
        var colorQuantity1;
        var colorQuantity2;
        var colorQuantity;
        var sum;
        

		priceSize = +$('.size:checked').attr('value');

		colorPrice = +$('.color:checked').attr('value');

		priceWork = +$('.sizew'+priceSize+'.service3').attr('value');

		firstPrice = +$('.sizew'+priceSize+'.service2').attr('value');
        
        quantity = +$('#quantityInput').val();
        $(".qty").text(quantity);
        
        colorQuantity1 = +$('.colorQuantity1').val();
        colorQuantity2 = +$('.colorQuantity2').val();
        
        colorQuantity = colorQuantity1 + colorQuantity2;
        
        if(colorPrice){
            $('#colorQTY').removeClass();
        }
        
        var checkbox = ' + 0';
        for(var i = 0; i < $('.serv').length; i++ ){
            if($('#serv'+i+':checked').val()){
                checkbox += ' + ' + $('#serv' + i + ':checked').val();
            }
        }

        var dopservice = eval(checkbox);

        var materials = ' + 0';
        for (var key in material) {
            materials += ' + ' + material[key] * $('#mat' + key).val();
        }
        
        var dopmat = eval(materials);
        
        var sum = $('#products-formula').val();
        //$('#sum').text(eval(sum + ' + '+ checkbox));
        
        
        
        
        //sum = window.result(quantity, colorQuantity, priceWork, colorPrice, firstPrice, service2);
        
        $('.formula').text(quantity +' * ('+colorQuantity+ ' * ' + priceWork +' + ' + colorPrice + ') + ' + firstPrice);
        //$('#sum').text(sum);
        
        
  
      $('#check').click(function(){
        //if(eval(sum)){

            $('#sum').removeClass();
            $('#odometer').html(Math.round(eval(sum)));
        //}
      });
        
    
	});
        
    
    $('#minusQ').click(function(){
        $('#quantityInput').val($('#quantityInput').val() - 50);
    });
    
    $('#addQ').click(function(){
        var col2 = $('#quantityInput').val();
        $('#quantityInput').val(parseInt(col2) + 50);
    });
    

    
   $('#minus1').click(function(){
        $('.colorQuantity1').val(parseInt($('.colorQuantity1').val()) - 1);
    });
    
    $('#add1').click(function(){
        var col1 = $('.colorQuantity1').val();
        $('.colorQuantity1').val(parseInt(col1) + 1);
    });
    
    $('#minus2').click(function(){
        $('.colorQuantity2').val($('.colorQuantity2').val() - 1);
    });
    
    $('#add2').click(function(){
        var col2 = $('.colorQuantity2').val();
        $('.colorQuantity2').val(parseInt(col2) + 1);
    });
  
  



  
});
