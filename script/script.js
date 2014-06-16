var breakpoint = 720;


$(document).ready(function(e){
   
    // Handle the menu icon click.
    $('#pull').click(function () {
        toggleMenu();
    });
   
});

$(window).resize(function() {
    var browserWidth = $(window).width();
    
    // Remove any attached styles to prevent
    // missing navigation on window resize.
    if (browserWidth <= breakpoint) {
        $('.menu').removeAttr("style")
    }
});

// Insert inline css into 'menu' to show / hide menu.
function toggleMenu(){
    var isDisplay = $('.menu').css('display');
    
    if (isDisplay == 'none'){
        $('.menu').css('display', 'block');
    }else if (isDisplay == 'block'){
        $('.menu').css('display', 'none');
    }
}