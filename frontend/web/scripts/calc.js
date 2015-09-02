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

        var checkdopworkprice = ' + 0';

        var materials = ' + 0';
        
        for (var key in dopworkprice) {
            if($('#dopserv'+key+':checked').val()){
               checkdopworkprice += ' + ' + $('#dopserv'+key+':checked').val();
                for (var matkey in material) {

                    var qty = Math.ceil($('#matshir' + matkey).val() * $('#matvys' + matkey).val());
                    materials += ' + ' + material[matkey] * qty;
                }
               $('#matcount' + key).css('display', 'inline');
            }else{
                $('#matcount' + key).css('display', 'none');
            }

        }

        var dopwork = eval(checkdopworkprice);
        
        var dopmat = eval(materials);
        
        var sum = $('#products-formula').val();
        //$('#sum').text(eval(sum + ' + '+ checkbox));
        
        
        
        
        //sum = window.result(quantity, colorQuantity, priceWork, colorPrice, firstPrice, service2);
        
        $('.formula').text(quantity +' * ('+colorQuantity+ ' * ' + priceWork +' + ' + colorPrice + ') + ' + firstPrice);
        //$('#sum').text(sum);
        
        
  
      $('#check').click(function(){

            $('#sum').removeClass();
            $('#odometer').html(Math.round(eval(sum)));


            var variant = $('label[for="variant'+$(".variant:checked").attr("value")+'"]').text();
            var size = $('label[for="size'+$(".size:checked").attr("value")+'"]').text();
            var color = $('label[for="'+$(".color:checked").attr("id")+'"]').text();
            var colorQuantity1 = $('.colorQuantity1').val();
            var colorQuantity2 = $('.colorQuantity2').val();
            var serv = [];
            var dopserv = [];

            for(var i = 0; i < $('.serv').length; i++ ){
                if($('#serv'+i+':checked').val()){
                    serv.push($('label[for="serv' + i + '"]').text());
                }
            }

            for(var i = 0; i < $('.dopserv').length; i++ ){
                if($('#dopserv'+i+':checked').val()){
                    dopserv.push({"name":$('label[for="dopserv' + i + '"]').text(),"shir":$('#matshir'+i).val(), "vys":$('#matvys'+i).val()});
                }
            }


            var details = {};

            details['product'] = productName;
            details['variant'] = variant;
            details['size'] = size;
            details['color'] = color;
            details['colorQuantity1'] = colorQuantity1;
            details['colorQuantity2'] = colorQuantity2;
            details['quantity'] = quantity;
            details['serv'] = serv;
            details['dopserv'] = dopserv;
            details['price'] = Math.round(eval(sum));

            $('#orders-details').val(JSON.stringify(details));
            $('#form_orders').removeClass('unvisible');
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
