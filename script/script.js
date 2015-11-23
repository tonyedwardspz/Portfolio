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

    // remove the resizePortfolioSlider height to allow for css transitions
    if ($j("body").hasClass("post-type-archive-portfolio")){
        $j(".portfolioItem").hover(function(){
            // reset the inline height
            $j(this).height('');
        },function(){
            // call the resize method
            resizePortfolioSlider();
        });
    }

    applyRainbowHiliteWidth();

});


// detect window resize
$j(window).resize(function() {
    var browserWidth = $j(window).width();

    if (browserWidth <= breakpoint) {
        $j('.menu').removeAttr('style');
    }

    changeMenuColor();
    resizeSliderWrap();
    resizePortfolioSlider();
    applyRainbowHiliteWidth();

});

// call the resize after assets are loaded to prevent an
// incorrect li height size due to unloaded image.
$j(window).bind("load", function() {
    resizeSliderWrap();

    setTimeout(resizePortfolioSlider, 700);
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

/*! Picturefill - v3.0.1
 * http://scottjehl.github.io/picturefill
 * Copyright (c) 2015 https://github.com/scottjehl/picturefill/blob/master/Authors.txt;
 *  License: MIT
 */
!function(e,t,r){"use strict";function s(e){return" "===e||"	"===e||"\n"===e||"\f"===e||"\r"===e}function n(t,r){var s=new e.Image;return s.onerror=function(){E[t]=!1,ee()},s.onload=function(){E[t]=1===s.width,ee()},s.src=r,"pending"}function i(){L=!1,B=e.devicePixelRatio,Q={},F={},A.DPR=B||1,G.width=Math.max(e.innerWidth||0,z.clientWidth),G.height=Math.max(e.innerHeight||0,z.clientHeight),G.vw=G.width/100,G.vh=G.height/100,v=[G.height,G.width,B].join("-"),G.em=A.getEmValue(),G.rem=G.em}function c(e,t,r,s){var n,i,c,a;return"saveData"===T.algorithm?e>2.7?a=r+1:(i=t-r,n=Math.pow(e-.6,1.5),c=i*n,s&&(c+=.1*n),a=e+c):a=r>1?Math.sqrt(e*t):e,a>r}function a(e){var t,r=A.getSet(e),s=!1;"pending"!==r&&(s=v,r&&(t=A.setRes(r),A.applySetCandidate(t,e))),e[A.ns].evaled=s}function u(e,t){return e.res-t.res}function l(e,t,r){var s;return!r&&t&&(r=e[A.ns].sets,r=r&&r[r.length-1]),s=o(t,r),s&&(t=A.makeUrl(t),e[A.ns].curSrc=t,e[A.ns].curCan=s,s.res||Z(s,s.set.sizes)),s}function o(e,t){var r,s,n;if(e&&t)for(n=A.parseSet(t),e=A.makeUrl(e),r=0;r<n.length;r++)if(e===A.makeUrl(n[r].url)){s=n[r];break}return s}function f(e,t){var r,s,n,i,c=e.getElementsByTagName("source");for(r=0,s=c.length;s>r;r++)n=c[r],n[A.ns]=!0,i=n.getAttribute("srcset"),i&&t.push({srcset:i,media:n.getAttribute("media"),type:n.getAttribute("type"),sizes:n.getAttribute("sizes")})}function p(e,t){function r(t){var r,s=t.exec(e.substring(p));return s?(r=s[0],p+=r.length,r):void 0}function n(){var e,r,s,n,i,u,l,o,f,p=!1,h={};for(n=0;n<a.length;n++)i=a[n],u=i[i.length-1],l=i.substring(0,i.length-1),o=parseInt(l,10),f=parseFloat(l),K.test(l)&&"w"===u?((e||r)&&(p=!0),0===o?p=!0:e=o):X.test(l)&&"x"===u?((e||r||s)&&(p=!0),0>f?p=!0:r=f):K.test(l)&&"h"===u?((s||r)&&(p=!0),0===o?p=!0:s=o):p=!0;p||(h.url=c,e&&(h.w=e),r&&(h.d=r),s&&(h.h=s),s||r||e||(h.d=1),1===h.d&&(t.has1x=!0),h.set=t,d.push(h))}function i(){for(r(q),u="",l="in descriptor";;){if(o=e.charAt(p),"in descriptor"===l)if(s(o))u&&(a.push(u),u="",l="after descriptor");else{if(","===o)return p+=1,u&&a.push(u),void n();if("("===o)u+=o,l="in parens";else{if(""===o)return u&&a.push(u),void n();u+=o}}else if("in parens"===l)if(")"===o)u+=o,l="in descriptor";else{if(""===o)return a.push(u),void n();u+=o}else if("after descriptor"===l)if(s(o));else{if(""===o)return void n();l="in descriptor",p-=1}p+=1}}for(var c,a,u,l,o,f=e.length,p=0,d=[];;){if(r(N),p>=f)return d;c=r(V),a=[],","===c.slice(-1)?(c=c.replace(J,""),n()):i()}}function d(e){function t(e){function t(){i&&(c.push(i),i="")}function r(){c[0]&&(a.push(c),c=[])}for(var n,i="",c=[],a=[],u=0,l=0,o=!1;;){if(n=e.charAt(l),""===n)return t(),r(),a;if(o){if("*"===n&&"/"===e[l+1]){o=!1,l+=2,t();continue}l+=1}else{if(s(n)){if(e.charAt(l-1)&&s(e.charAt(l-1))||!i){l+=1;continue}if(0===u){t(),l+=1;continue}n=" "}else if("("===n)u+=1;else if(")"===n)u-=1;else{if(","===n){t(),r(),l+=1;continue}if("/"===n&&"*"===e.charAt(l+1)){o=!0,l+=2;continue}}i+=n,l+=1}}}function r(e){return o.test(e)&&parseFloat(e)>=0?!0:f.test(e)?!0:"0"===e||"-0"===e||"+0"===e?!0:!1}var n,i,c,a,u,l,o=/^(?:[+-]?[0-9]+|[0-9]*\.[0-9]+)(?:[eE][+-]?[0-9]+)?(?:ch|cm|em|ex|in|mm|pc|pt|px|rem|vh|vmin|vmax|vw)$/i,f=/^calc\((?:[0-9a-z \.\+\-\*\/\(\)]+)\)$/i;for(i=t(e),c=i.length,n=0;c>n;n++)if(a=i[n],u=a[a.length-1],r(u)){if(l=u,a.pop(),0===a.length)return l;if(a=a.join(" "),A.matchesMedia(a))return l}return"100vw"}t.createElement("picture");var h,m,g,v,A={},w=function(){},S=t.createElement("img"),x=S.getAttribute,y=S.setAttribute,b=S.removeAttribute,z=t.documentElement,E={},T={algorithm:""},R="data-pfsrc",M=R+"set",C=navigator.userAgent,P=/rident/.test(C)||/ecko/.test(C)&&C.match(/rv\:(\d+)/)&&RegExp.$1>35,k="currentSrc",D=/\s+\+?\d+(e\d+)?w/,U=/(\([^)]+\))?\s*(.+)/,$=e.picturefillCFG,I="position:absolute;left:0;visibility:hidden;display:block;padding:0;border:none;font-size:1em;width:1em;overflow:hidden;clip:rect(0px, 0px, 0px, 0px)",W="font-size:100%!important;",L=!0,Q={},F={},B=e.devicePixelRatio,G={px:1,"in":96},H=t.createElement("a"),j=!1,q=/^[ \t\n\r\u000c]+/,N=/^[, \t\n\r\u000c]+/,V=/^[^ \t\n\r\u000c]+/,J=/[,]+$/,K=/^\d+$/,X=/^-?(?:[0-9]+|[0-9]*\.[0-9]+)(?:[eE][+-]?[0-9]+)?$/,_=function(e,t,r,s){e.addEventListener?e.addEventListener(t,r,s||!1):e.attachEvent&&e.attachEvent("on"+t,r)},O=function(e){var t={};return function(r){return r in t||(t[r]=e(r)),t[r]}},Y=function(){var e=/^([\d\.]+)(em|vw|px)$/,t=function(){for(var e=arguments,t=0,r=e[0];++t in e;)r=r.replace(e[t],e[++t]);return r},r=O(function(e){return"return "+t((e||"").toLowerCase(),/\band\b/g,"&&",/,/g,"||",/min-([a-z-\s]+):/g,"e.$1>=",/max-([a-z-\s]+):/g,"e.$1<=",/calc([^)]+)/g,"($1)",/(\d+[\.]*[\d]*)([a-z]+)/g,"($1 * e.$2)",/^(?!(e.[a-z]|[0-9\.&=|><\+\-\*\(\)\/])).*/gi,"")+";"});return function(t,s){var n;if(!(t in Q))if(Q[t]=!1,s&&(n=t.match(e)))Q[t]=n[1]*G[n[2]];else try{Q[t]=new Function("e",r(t))(G)}catch(i){}return Q[t]}}(),Z=function(e,t){return e.w?(e.cWidth=A.calcListLength(t||"100vw"),e.res=e.w/e.cWidth):e.res=e.d,e},ee=function(e){var r,s,n,i=e||{};if(i.elements&&1===i.elements.nodeType&&("IMG"===i.elements.nodeName.toUpperCase()?i.elements=[i.elements]:(i.context=i.elements,i.elements=null)),r=i.elements||A.qsa(i.context||t,i.reevaluate||i.reselect?A.sel:A.selShort),n=r.length){for(A.setupRun(i),j=!0,s=0;n>s;s++)A.fillImg(r[s],i);A.teardownRun(i)}};h=e.console&&console.warn?function(e){console.warn(e)}:w,k in S||(k="src"),E["image/jpeg"]=!0,E["image/gif"]=!0,E["image/png"]=!0,E["image/svg+xml"]=t.implementation.hasFeature("http://wwwindow.w3.org/TR/SVG11/feature#Image","1.1"),A.ns=("pf"+(new Date).getTime()).substr(0,9),A.supSrcset="srcset"in S,A.supSizes="sizes"in S,A.supPicture=!!e.HTMLPictureElement,A.supSrcset&&A.supPicture&&!A.supSizes&&!function(e){S.srcset="data:,a",e.src="data:,a",A.supSrcset=S.complete===e.complete,A.supPicture=A.supSrcset&&A.supPicture}(t.createElement("img")),A.selShort="picture>img,img[srcset]",A.sel=A.selShort,A.cfg=T,A.supSrcset&&(A.sel+=",img["+M+"]"),A.DPR=B||1,A.u=G,A.types=E,g=A.supSrcset&&!A.supSizes,A.setSize=w,A.makeUrl=O(function(e){return H.href=e,H.href}),A.qsa=function(e,t){return e.querySelectorAll(t)},A.matchesMedia=function(){return e.matchMedia&&(matchMedia("(min-width: 0.1em)")||{}).matches?A.matchesMedia=function(e){return!e||matchMedia(e).matches}:A.matchesMedia=A.mMQ,A.matchesMedia.apply(this,arguments)},A.mMQ=function(e){return e?Y(e):!0},A.calcLength=function(e){var t=Y(e,!0)||!1;return 0>t&&(t=!1),t},A.supportsType=function(e){return e?E[e]:!0},A.parseSize=O(function(e){var t=(e||"").match(U);return{media:t&&t[1],length:t&&t[2]}}),A.parseSet=function(e){return e.cands||(e.cands=p(e.srcset,e)),e.cands},A.getEmValue=function(){var e;if(!m&&(e=t.body)){var r=t.createElement("div"),s=z.style.cssText,n=e.style.cssText;r.style.cssText=I,z.style.cssText=W,e.style.cssText=W,e.appendChild(r),m=r.offsetWidth,e.removeChild(r),m=parseFloat(m,10),z.style.cssText=s,e.style.cssText=n}return m||16},A.calcListLength=function(e){if(!(e in F)||T.uT){var t=A.calcLength(d(e));F[e]=t?t:G.width}return F[e]},A.setRes=function(e){var t;if(e){t=A.parseSet(e);for(var r=0,s=t.length;s>r;r++)Z(t[r],e.sizes)}return t},A.setRes.res=Z,A.applySetCandidate=function(e,t){if(e.length){var r,s,n,i,a,o,f,p,d,h=t[A.ns],m=A.DPR;if(o=h.curSrc||t[k],f=h.curCan||l(t,o,e[0].set),f&&f.set===e[0].set&&(d=P&&!t.complete&&f.res-.1>m,d||(f.cached=!0,f.res>=m&&(a=f))),!a)for(e.sort(u),i=e.length,a=e[i-1],s=0;i>s;s++)if(r=e[s],r.res>=m){n=s-1,a=e[n]&&(d||o!==A.makeUrl(r.url))&&c(e[n].res,r.res,m,e[n].cached)?e[n]:r;break}a&&(p=A.makeUrl(a.url),h.curSrc=p,h.curCan=a,p!==o&&A.setSrc(t,a),A.setSize(t))}},A.setSrc=function(e,t){var r;e.src=t.url,"image/svg+xml"===t.set.type&&(r=e.style.width,e.style.width=e.offsetWidth+1+"px",e.offsetWidth+1&&(e.style.width=r))},A.getSet=function(e){var t,r,s,n=!1,i=e[A.ns].sets;for(t=0;t<i.length&&!n;t++)if(r=i[t],r.srcset&&A.matchesMedia(r.media)&&(s=A.supportsType(r.type))){"pending"===s&&(r=s),n=r;break}return n},A.parseSets=function(e,t,s){var n,i,c,a,u=t&&"PICTURE"===t.nodeName.toUpperCase(),l=e[A.ns];(l.src===r||s.src)&&(l.src=x.call(e,"src"),l.src?y.call(e,R,l.src):b.call(e,R)),(l.srcset===r||s.srcset||!A.supSrcset||e.srcset)&&(n=x.call(e,"srcset"),l.srcset=n,a=!0),l.sets=[],u&&(l.pic=!0,f(t,l.sets)),l.srcset?(i={srcset:l.srcset,sizes:x.call(e,"sizes")},l.sets.push(i),c=(g||l.src)&&D.test(l.srcset||""),c||!l.src||o(l.src,i)||i.has1x||(i.srcset+=", "+l.src,i.cands.push({url:l.src,d:1,set:i}))):l.src&&l.sets.push({srcset:l.src,sizes:null}),l.curCan=null,l.curSrc=r,l.supported=!(u||i&&!A.supSrcset||c),a&&A.supSrcset&&!l.supported&&(n?(y.call(e,M,n),e.srcset=""):b.call(e,M)),l.supported&&!l.srcset&&(!l.src&&e.src||e.src!==A.makeUrl(l.src))&&(null===l.src?e.removeAttribute("src"):e.src=l.src),l.parsed=!0},A.fillImg=function(e,t){var r,s=t.reselect||t.reevaluate;e[A.ns]||(e[A.ns]={}),r=e[A.ns],(s||r.evaled!==v)&&((!r.parsed||t.reevaluate)&&A.parseSets(e,e.parentNode,t),r.supported?r.evaled=v:a(e))},A.setupRun=function(){(!j||L||B!==e.devicePixelRatio)&&i()},A.supPicture?(ee=w,A.fillImg=w):!function(){var r,s=e.attachEvent?/d$|^c/:/d$|^c|^i/,n=function(){var e=t.readyState||"";i=setTimeout(n,"loading"===e?200:999),t.body&&(A.fillImgs(),r=r||s.test(e),r&&clearTimeout(i))},i=setTimeout(n,t.body?9:99),c=function(e,t){var r,s,n=function(){var i=new Date-s;t>i?r=setTimeout(n,t-i):(r=null,e())};return function(){s=new Date,r||(r=setTimeout(n,t))}},a=z.clientHeight,u=function(){L=Math.max(e.innerWidth||0,z.clientWidth)!==G.width||z.clientHeight!==a,a=z.clientHeight,L&&A.fillImgs()};_(e,"resize",c(u,99)),_(t,"readystatechange",n)}(),A.picturefill=ee,A.fillImgs=ee,A.teardownRun=w,ee._=A,e.picturefillCFG={pf:A,push:function(e){var t=e.shift();"function"==typeof A[t]?A[t].apply(A,e):(T[t]=e[0],j&&A.fillImgs({reselect:!0}))}};for(;$&&$.length;)e.picturefillCFG.push($.shift());e.picturefill=ee,"object"==typeof module&&"object"==typeof module.exports?module.exports=ee:"function"==typeof define&&define.amd&&define("picturefill",function(){return ee}),A.supPicture||(E["image/webp"]=n("image/webp","data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA=="))}(window,document);
