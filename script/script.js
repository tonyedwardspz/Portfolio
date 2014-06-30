var breakpoint = 734; // 16px less than css breakpoint
var $j = jQuery.noConflict();

$j(document).ready(function(e){
   
    // Handle the menu icon click.
    $j('#pull').click(function () {
        toggleMenu();
    });
    
    $j('.social-links img').hover(function () {
        
        var elmHeight = $j(this).height() - 4;
        var elmWidth = $j(this).width() - 4;
        
        $j(this).css(
            'width', elmHeight + 'px',
            'height',elmWidth + 'px'
        );
         $j(this).addClass('hover-margin');
        
    }, function() {
        $j(this).removeAttr('style');
        $j(this).removeClass('hover-margin');
        
    });
    
    changeMenuColor();
       
});


// detect window resize
$j(window).resize(function() {
    var browserWidth = $j(window).width();
    
    if (browserWidth <= breakpoint) {
        $j('.menu').removeAttr('style');
    }
    
    changeMenuColor();

});


// Insert inline css into 'menu' to show / hide menu.
function toggleMenu(){
    var isDisplay = $j('.menu').css('display');
    
    if (isDisplay == 'none'){
        $j('.menu').css('display', 'block');
    }else if (isDisplay == 'block'){
        $j('.menu').css('display', 'none');
    }
    
    changeMenuColor();
}


// change the default psuedo classes for the main navigation on smaller screens
function changeMenuColor() {
    
    if ($j(window).width() < breakpoint) {
        $j('.menu').removeClass('force-darkgrey');
        $j('.menu').addClass('force-white');
        
    } 
    if ($j(window).width() >= breakpoint) {
        $j('.menu').removeClass('force-white');
        $j('.menu').addClass('force-darkgrey');
        $j('.menu').css('display', 'block');
    }
}