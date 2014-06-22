var breakpoint = 720;


$(document).ready(function(e){
   
    // Handle the menu icon click.
    $('#pull').click(function () {
        toggleMenu();
    });
    
     $('.social-links img').hover(function () {
        
        var elmHeight = $(this).height() - 4;
        var elmWidth = $(this).width() - 4;
        
        $(this).css(
            'width', elmHeight + 'px',
            'height',elmWidth + 'px'
        );
         $(this).addClass('hover-margin');
        
    }, function() {
        $(this).removeAttr('style');
        $(this).removeClass('hover-margin');
        
    });
       
});




$(window).resize(function() {
    var browserWidth = $(window).width();
    
    if (browserWidth <= breakpoint) {
        $('.menu').removeAttr('style');
    }
    
    toggleMenu();
    changeMenuColor();

});


// Insert inline css into 'menu' to show / hide menu.
function toggleMenu(){
    var isDisplay = $('.menu').css('display');
    
    if (isDisplay == 'none'){
        $('.menu').css('display', 'block');
    }else if (isDisplay == 'block'){
        $('.menu').css('display', 'none');
    }
    
    changeMenuColor();
}


// change the default psuedo classes for the main navigation on smaller screens
function changeMenuColor() {
    
    if ($(window).width() < breakpoint) {
        $('.menu').removeClass('force-darkgrey');
        $('.menu').addClass('force-white');
        
    } 
    if ($(window).width() >= breakpoint) {
        $('.menu').removeClass('force-white');
        $('.menu').addClass('force-darkgrey');
        $('.menu').css('display', 'block');
    }
}