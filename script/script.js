var breakpoint = 720;
var $j = jQuery.noConflict();

$j(document).ready(function(e){
    
    changeMenuColor();
   
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

    resizePortfolioWrapper();
    
    // $j('.porfolioCategory').click(function(){
    //     var category = $j(this).data("value");
    //     showHidePortfolioItems(category);
    // });

    $j('#mixPortfolio').mixItUp();
    resizePortfolioWrapper();
});

$j(window).load(function() {
        $j('.flexslider').flexslider();
      });

// detect window resize
$j(window).resize(function() {
    var browserWidth = $j(window).width();
    
    if (browserWidth <= breakpoint) {
        $j('.menu').removeAttr('style');
    }
    
    changeMenuColor();

});

//change the size of the porfolio wrapper to prevent unnessesary painting during transitions
function resizePortfolioWrapper(){

    //get the wrapper height
    var height = $j('.portfolioWrapper').height();
    height += 130;

    $j('.portfolioWrapper').css('height', height)
}


function showHidePortfolioItems(category){

    if(category === 'ALL'){
        $j('.portfolioItem').show();
    } else {
        $j(".portfolioItem:not(."+category+")").hide();
    }
}


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