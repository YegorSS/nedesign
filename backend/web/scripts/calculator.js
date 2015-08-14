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

	$('*').on("change click keyup", function(){
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
		$('.colorPrice').text("Цена пакета = " + colorPrice);

		priceWork = +$('.sizew'+priceSize+'.service3').attr('value');
		$('.priceWork').text("Печатные работы = " + priceWork);

		firstPrice = +$('.sizew'+priceSize+'.service2').attr('value');
		$('.firstPrice').text("Первый прогон = " + firstPrice);
        
        quantity = +$('#quantityInput').val();
		$('.quantity').text(quantity + 'шт.');
        $(".qty").text(quantity);
        
        colorQuantity1 = +$('.colorQuantity1').val();
        colorQuantity2 = +$('.colorQuantity2').val();
        
        colorQuantity = colorQuantity1 + colorQuantity2;
        
        service[1]  = +$('.service1').val();
		$('div .delivery').text(service[1] + ' грн.');
        
        var checkbox = ' + 0';
        for(var i = 0; i < $('.serv').length; i++ ){
            if($('#serv'+i+':checked').val()){
                checkbox += ' + ' + $('#serv'+i+':checked').val();
            }
        }
        var dopservice = eval(checkbox);

        

        var checkdopworkprice = ' + 0';
        var materials = ' + 0';
        for (var key in dopworkprice) {
            if($('#dopserv'+key+':checked').val()){
               checkdopworkprice += ' + ' + $('#dopserv'+key+':checked').val();
                for (var matkey in material) {
                    materials += ' + ' + material[matkey] * $('#mat' + matkey).val();
                }
               $('#matcount' + key).css('display', 'inline');
            }else{
                $('#matcount' + key).css('display', 'none');
            }

        }

        var dopwork = eval(checkdopworkprice);
        
        var dopmat = eval(materials);

        var sum = $('.textarea').val();
        $('#sum').text(eval(sum));
        
        //sum = window.result(quantity, colorQuantity, priceWork, colorPrice, firstPrice, service2);
        
        $('.formula').text(quantity +' * ('+colorQuantity+ ' * ' + priceWork +' + '+colorPrice+') + ' + firstPrice + checkbox + materials +  checkdopworkprice);
        //$('#sum').text(sum);
	});

    $('.viewEdit').click(function(){
       $('.view').toggleClass("unvisible"); 
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
