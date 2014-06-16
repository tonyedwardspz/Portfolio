var breakpoint = 650;

$(window).resize(function() {
    var browserWidth = $(window).width();
    var isDisplay = $('.menu').css('display');
    
    if ((browserWidth >= breakpoint) && (isDisplay == 'none')){
        $('.menu').css('display', 'inherit');
    } else {
       $('.menu').css('display', 'none'); 
    }
    
    
    
 });


$(document).ready(function(e){
   
    $('#pull').click(function () {
        toggleMenu();
    });
   
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