var breakpoint = 650;
var resizeTimeout;


$(document).ready(function(e){
   
    $('#pull').click(function () {
        toggleMenu();
    });
   
});



$(window).resize(function() {
    var browserWidth = $(window).width();
    var isDisplay = $('.menu').css('display');
    
    
    // display the menu if the screen is resized when the menu is 
    // set to 'display: none;'
    if ((browserWidth >= breakpoint) && (isDisplay == 'none')){
        $('.menu').css('display', 'block');
    }    
});
  





function toggleMenu(){
    
    var isDisplay = $('.menu').css('display');
    
    if (isDisplay == 'none'){
        $('.menu').css('display', 'block');
    }
    if (isDisplay == 'block'){
        $('.menu').css('display', 'none');
    }
    
    isDisplay = null;
}