




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