"use strict";
/* 1. initialization */
// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

var coverMaskLeft  =$('.bg-mask.special .m-left');
var coverMaskRight  =$('.bg-mask.special .m-right');
var topMenu  =$('.header-top');
var aboutSection  = $('.h-about');

var minHeight = $(window).height();
if(minHeight < (280 * 2 + 72) ){
   minHeight = 280 * 2 + 72;
}
$('.section.fill-h').css({
	'min-height': minHeight
});

$(window).resize(function(){
	minHeight = $(window).height();
	if(minHeight < (280 * 2 + 72) ){
	   minHeight = 280 * 2 + 72;
	}	
	
	$('.section.fill-h').css({
		'min-height': minHeight
	});
});

// Animation when document is ready 
$(document).ready(function() {
	$('.cover .bubble').removeClass('init');
	// Caroussel
	$(".slides").owlCarousel({
		autoplay:true,
		autoplayTimeout:8000,
		items : 1,
		loop:true,
		smartSpeed:450,

	  });
	// Caroussel
	$(".pict-slides").owlCarousel({
		autoplay:true,
		autoplayTimeout:8000,
		items : 1,
		loop:true,
		animateOut:'fadeOut ', // Use classes from Animate library
		animateIn:'flipInX',
		smartSpeed:450,
	});
  
	
	/* Animate background at scroll*/
	var rotValue = 45;
	var transValue =-80;
	var rotValue;
	var rotValue2;
	var scaleFact;
	var scaleValue;
	var opacityValue;
	var onTopPosition = true;
//	var slideScrolled = false;
	var lastScrollPosition = 0;

	
	
	if($(this).scrollTop() > 100 ){
		onTopPosition = false;
		topMenu.addClass("scrolled");
		aboutSection.removeClass("bg-transparent");
	}
	else{
		topMenu.removeClass("scrolled");
		aboutSection.addClass("bg-transparent");
	}
	
	$(window).scroll(function () {
		var scrollpos = $(this).scrollTop();
		if($(this).scrollTop() > 100 ){
			onTopPosition = false;
			topMenu.addClass("scrolled");
			aboutSection.removeClass("bg-transparent");
		}
		else{
			topMenu.removeClass("scrolled");
			aboutSection.addClass("bg-transparent");
		}
		

	});
});

// WOW Animation
var wow;
wow = new WOW(
  {
	animateClass: 'animated',
	offset:       100,
	callback:     function(box) {
//	  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
	}
  }
);
wow.init();

//var swiper = new Swiper('.swiper-container');
// Page Loader : hide loader when all are loaded
$(window).load(function(){
    $('#page-loader').addClass('gone-hidden');
    $('#page-loader .ion').removeClass('animated');
});

var smoothScrollClick = false;
// Smooth scroll <a> links 
var $root = $('html, body');
$('a.s-scroll').on('click',function() {
    var href = $.attr(this, 'href');
	smoothScrollClick = true;
    $root.animate({
        scrollTop: $(href).offset().top
    }, 500, function () {
		smoothScrollClick = false;
        window.location.hash = href;
    });
    return false;
});
$('a').on('click',function() {
    var href = $.attr(this, 'href');
    if(href.lastIndexOf('#') > 1){
      href = href.substr(href.lastIndexOf('#'), href.length-1);
      console.log(href);
    }
    
	smoothScrollClick = true;
    $root.animate({
        scrollTop: $(href).offset().top
    }, 500, function () {
		smoothScrollClick = false;
        window.location.hash = href;
    });
    return false;
});
/* FAQ Item list */
var faqList = $('.faq .item a');
var activeChild;
$('.faq .item a').on('click',function() {
	
	var fadeSpeed = 200;
	var slideSpeed = 300;
	
	// Remove last selected FAQ
	for (var i = 0; i < faqList.length; i++) {
		if($(faqList[i]).hasClass("active")){
			$(faqList[i]).removeClass("active");
			activeChild = $(faqList[i]).children(".answer");
			activeChild.animate({"opacity":0} , fadeSpeed , function(){
				activeChild.slideUp(slideSpeed, function(){
					activeChild.css({
						"display" : "none"
					});
				});
			});
		}
	}
	
	// Anim new selected FAQ 
	var child = $(this).children(".answer");
//	console.log(child.is(":visible"));
	if(child.is(":visible")){
		child.animate({"opacity":0} , fadeSpeed , function(){
			child.slideUp(slideSpeed, function(){
				child.css({
					"display" : "none"
				});
			});
		});
		$(this).removeClass("active");
	}
	else{
		child.slideDown(slideSpeed, function(){
			child.animate({"opacity":1} , fadeSpeed  );
		});
		$(this).addClass("active");
	}
});



/* 2. Background for page / section */

var background = '#ccc';
var backgroundMask = 'rgba(255,255,255,0.92)';
var backgroundVideoUrl = 'none';

/* Background image as data attribut */
var list = $('.bg-img');

for (var i = 0; i < list.length; i++) {
	var src = list[i].getAttribute('data-image-src');
	list[i].style.backgroundImage = "url('" + src + "')";
	list[i].style.backgroundRepeat = "no-repeat";
	list[i].style.backgroundPosition = "center";
	list[i].style.backgroundSize = "cover";
}

/* Background color as data attribut */
var list = $('.bg-color');
for (var i = 0; i < list.length; i++) {
	var src = list[i].getAttribute('data-bgcolor');
	list[i].style.backgroundColor = src;
}

/* Background slide show */
var imageList = $('.slide-show .img');
var imageSlides = [];
for (var i = 0; i < imageList.length; i++) {
	var src = imageList[i].getAttribute('data-src');
	imageSlides.push({src: src});
}
$(function(){
	// Static video  Background
	$('.video-container video, .video-container object').maximage('maxcover');
	
	// Youtube background 
	if(backgroundVideoUrl != 'none'){
        
        //disable video background for smallscreen
        if($(window).width() > 640){
          $.okvideo({ source: backgroundVideoUrl,
                    adproof: true
                    });
        }
    }
	
	// Slide show 
    $('.slide-show').vegas({
        delay: 10000,
        shuffle: true,
        slides: imageSlides,
    	//transition: [ 'zoomOut', 'burn' ],
		animation: [ 'kenburnsUp', 'kenburnsDown', 'kenburnsLeft', 'kenburnsRight' ]
    });
});

/* END OF Animate background at scroll*/