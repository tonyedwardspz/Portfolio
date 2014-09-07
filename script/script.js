var breakpoint = 704;
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
    
    // call the mixItUp method on the portfolio page 
    // (the script is enqueued to load only on this page)
    if ($j('ul.filterList').length > 0){
        resizePortfolioWrapper();
        $j('#mixPortfolio').mixItUp();
    }
    imageSlider();
});


// detect window resize
$j(window).resize(function() {
    var browserWidth = $j(window).width();
    
    if (browserWidth <= breakpoint) {
        $j('.menu').removeAttr('style');
    }
    
    changeMenuColor();
    resizeSliderWrap();

});

// call the resize after assets are loaded to prevent an 
// incorrect li height size due to unloaded image.
$j(window).bind("load", function() { 
    resizeSliderWrap();
});

function imageSlider() { 
    // settings
    var $slider = $j('.slider');
    var $slide = 'li';
    var $transition_time = 1000;
    var $time_between_slides = 6000;

    function slides(){
        return $slider.find($slide);
    }

    slides().fadeOut();

    // set active classes
    slides().first().addClass('active');
    slides().first().fadeIn($transition_time);

    // auto scroll 
    $interval = setInterval(
    function(){
        var $i = $slider.find($slide + '.active').index();

        slides().eq($i).removeClass('active');
        slides().eq($i).fadeOut($transition_time);

        if (slides().length == $i + 1) $i = -1; // loop to start

        slides().eq($i + 1).fadeIn($transition_time);
        slides().eq($i + 1).addClass('active');
    }
    , $transition_time +  $time_between_slides 
    
    );
    resizeSliderWrap();
};


// make sure the containing li for the slider images is the same size as the 
// contained image. Called on page load and resize
function resizeSliderWrap(){
    
    // get the height of a porfolio image
    var listHeight = $j('li.active img').height();

    if (listHeight <= 200){
        listHeight = 736;
    }
    
    //update it
    $j('.slider').height(listHeight);
}

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