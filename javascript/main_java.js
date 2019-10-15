$(document).ready(function() {
    
    $('#main_img > img').addClass('scale');
    var m_text = $("#main_img > hgroup > h1");
    for(var i = 0; i < 2; i++) {
        $(m_text[i]).delay(i*300).animate({
            opacity: 1,
            marginLeft: 100
        }, 1000);
    }
    
    $slide = function(slides) {
        for(var i = 0; i <= 2; i++) {    
            $(slides[i]).delay(i*300).animate({
                    opacity: 1,
                    top: -80
            }, 800);
        }
    }
        
    $search_event2 = function() {
        var search = $('#main_search > form > #search_text').val();
        var search2 = search.replace(/ /gi, '|');
        location.href = "cafe_search.php?search="+search; 
    }
    
    $('#main_search > form > #search_text').keypress(function(e) {
        if(e.which == 13) {
            $search_event2();
        }
    });
    
    $('#main_search > form > #search_button').click(function() {    
        $search_event2();
    });
    
    $(window).scroll(function(e) {
        
        if($(this).scrollTop() > 800) {
            var slides = $(".theme_slide");
            $slide(slides);
        }
        if($(this).scrollTop() > 1200) {
            var slides = $(".cafe_slide");
            $slide(slides);
        }
        
    });
})