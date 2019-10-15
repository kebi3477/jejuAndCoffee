$(document).ready(function() {
    $('.sub_content > button').click(function() {
        var name = $(this).parent('.sub_content').attr('id');
        var cafe_num = $(this).siblings('#event_img').children('img').attr('id');
        $('#popup').css('display','block');
        $('#popup_main > img').attr('src',"../images/Event_images/"+name+".jpg");
        $('#popup_main > img').wrap("<a href='../pages/cafe_detail.php?cafe_num="+cafe_num+"'></a>");
    });
    
    $('#popup_close').click(function() {
        $(this).parent('#popup').css('display','none'); 
        $('#popup_main > a > img').unwrap();
    });
});
