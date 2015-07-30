$(document).ready(function () {
    
    $('#rrr').change(function(){
        eval(window.funcrating)
    });
    
    $("#rrr").on("rating.change", function(event, value, caption) {
        $("#rrr").rating("refresh", {disabled: true, showClear: false, showCaption: true});
    });
    
    
    $("#searchinput").keyup(function(){
       var query = $(this).val();
       if (query.length > 2 ){ 
       $.ajax({
            type: "GET",
            url: siteurl + "site/search",
            data: "SearchForm[text]=" + query,
            success: function(msg){
                var posts = JSON.parse(msg);
                result = '<ul>';
                posts.forEach(function(entry) {
                    result += '<li><img src="'+ siteurl +'/uploads/post/main/65/65'
                    + entry['mainimage'] +
                    '" style="float:left"><a href="'
                            + entry['alias']+'">'
                            + entry['h_1'] +
                            '</a><p>'
                            + entry['h_2'] +
                            '</p></li><br>';
                });
                result += '</ul>';
                if(posts.length == 0){
                    result = 'Не найдено';
                }
                $("#searchresults").html(result);
            }
        }); 
    }else{
        var result = 'необходимо ввести 3-и и более символов'
                $("#searchresults").html(result);
    }
    });
    
    
    
    $('.searchlist').keyup(function(){
       var q = $('.post').length;
       var query = $('.searchlist').val().toLowerCase();
           
       var index, len;
        for (index = 0; index < q; ++index) {
            
            var item = $('.post').eq(index).text().toLowerCase();
            
            if(item.indexOf(query) == -1){
                $('.post').eq(index).addClass('unvisible');
            }else{
                $('.post').eq(index).removeClass('unvisible');  
            }
        }
       
    });
    
    
    
    
    
    
    
    
    
    
            
});

