/*
* Apply Browser Selector from plugin
* Apply Page scroll From Plugin
// * */
jQuery( document ).ready(function( $ ) {
// Select Browser with browserselector
    $.browserSelector();

    // If browser is chrome then add smooth scroll
    if($("html").hasClass("chrome")) {
        $.smoothScroll();
    }

jQuery(document).ready(function($) {
    $( ".footer_area" ).append( "<a href=\'#\' class=\'back-to-top\'><i class=\'fa fa-angle-up\'></i></a>" );
    var offset = 220;
    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });

    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 1000);
        return false;
    })
});
});
