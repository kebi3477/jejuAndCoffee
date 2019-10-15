$(document).ready(function() {
    $('.theme_pack').mouseover(function() {
        $(this).children('h1,#opacity').stop().fadeOut();
    });
    $('.theme_pack').mouseleave(function() {
        $(this).children('h1,#opacity').stop().fadeIn();
    });
});