/*global $:true, console:true */



$(function() {
    $('section.content').height(window.innerHeight);
    // Set up the slider
    $('#slides').slidesjs({
        width: 900,
        height: 480,
        play: {
            active: true,
            auto: true,
            interval: 4000,
            swap: true,
            effect: 'fade'
        },
        pagination: {
            active: true,
            effect: 'fade'
        }
    });
    
     $('.flexslider').flexslider({
         slideshow: true,
         directionNav: true
     });
});

function firstCaps(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function fadeInOut(elOut, elIn) {
    elOut.fadeOut(400, function() {
        elIn.fadeIn();
    });
}