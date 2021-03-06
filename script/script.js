var breakpoint = 720;
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

    // call the mixItUp method on the portfolio page
    if ($j('ul.filterList').length > 0){
        $j('#mixPortfolio').mixItUp({
            callbacks: {
                onMixStart: function(state, futureState){
                    state.$show.each(function(){
                        $j(this).removeClass('shown');
                    });

                    futureState.$show.each(function(){
                        $j(this).addClass('shown');
                    });
                } 
            }
        });
    }
    imageSlider();

    $j('pre code').each(function(i, block) {
      hljs.highlightBlock(block);
    });
});


// detect window resize
$j(window).resize(function() {
    if ($j(window).width() <= 720) {
      $j('.menu').removeAttr('style');
      $j('nav').width($j('header').width());
    } else {
      $j('nav').css('width','');
    }
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
    }, $transition_time +  $time_between_slides

    );
    resizeSliderWrap();
}

// alter the size of the container with the individual portfolio items. This keeps
// them in proportion on mobile devices (hopefully)
function resizePortfolioSlider(){

    // get the portfolio image height
    var imgHeight = $j(".portImage img").height();

    // add padding to keep everything reletive
    imgHeight += 4;

    // if it is a stupid height, make it the less stupud
    if (imgHeight < 180){
        imgHeight = 181;
    }

    // get the containing divs dimensions
    var divHeight = $j(".portfolioItem").height();

    // resize the div
    $j(".portfolioItem").height(imgHeight);

}

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

    $j('.portfolioWrapper').css('height', height);
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
      $j('.menu').show(500);
    }else if (isDisplay == 'block'){
      $j('.menu').hide(500);
    }

    if ($j(window).width() <= 720) {
        $j('nav').width($j('header').width());
    } else {
        $j('nav').css('width','');
    }
}

// Apply a max width to every pre element on page.
// This foreces code snippets to be responsive
function applyRainbowHiliteWidth() {

    if (document.querySelector('pre')){
        var containerWidth = $j('.container').width();

        $j('pre').each(function(){
            $j(this).css('max-width', containerWidth);
        });
    }
}
