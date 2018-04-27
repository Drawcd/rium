/*
 *  Amina App 1.0
 *
 *  Copyright (c) 2015 Amina
 *  http://amina.co.kr
 *
 */

(function($) {
	$.fn.amina_menu = function(option) {
        var cfg = { name: '.sub', show: '', hide: '' };

		if(typeof option == "object")
            cfg = $.extend(cfg, option);

		var subname = cfg.name;
		var submenu = $(this).find(subname).parent();

		submenu.each(function(i){
			$(this).hover(
				function(e){
					var targetmenu = $(this).children(subname + ":eq(0)");
					if (targetmenu.queue().length <= 1) {
						switch(cfg.show) {
							case 'show'  : targetmenu.show(); break;
							case 'fade'  : targetmenu.fadeIn(300, 'swing'); break;
							default		 : targetmenu.slideDown(300, 'swing'); break;
						}
					}
				},
				function(e){
					var targetmenu = $(this).children(subname + ":eq(0)");
					switch(cfg.hide) {
						case 'fade'		: targetmenu.fadeOut(100, 'swing'); break;
						case 'slide'	: targetmenu.slideUp(100, 'swing'); break;
						default			: targetmenu.hide(); break;
					}
				}
			); //end hover
			$(this).click(function(){
				$(this).children(subname + ":eq(0)").hide();
			})
		}); //end submenu.each()

		$(this).find(subname).css({display:"none", visibility:"visible"});
	}
}(jQuery));

function go_page(url) {
	document.location.href = decodeURIComponent(url);
	return false;
}

function tsearch_submit(f) {

	if (f.stx.value.length < 2) {
		alert("검색어는 두글자 이상 입력하십시오.");
		f.stx.select();
		f.stx.focus();
		return false;
	}

	f.action = f.url.value;

	return true;
}

$(document).ready(function() {

    $('#favorite').on('click', function(e) {
        var bookmarkURL = window.location.href;
        var bookmarkTitle = document.title;
        var triggerDefault = false;

        if (window.sidebar && window.sidebar.addPanel) {
            // Firefox version < 23
            window.sidebar.addPanel(bookmarkTitle, bookmarkURL, '');
        } else if ((window.sidebar && (navigator.userAgent.toLowerCase().indexOf('firefox') > -1)) || (window.opera && window.print)) {
            // Firefox version >= 23 and Opera Hotlist
            var $this = $(this);
            $this.attr('href', bookmarkURL);
            $this.attr('title', bookmarkTitle);
            $this.attr('rel', 'sidebar');
            $this.off(e);
            triggerDefault = true;
        } else if (window.external && ('AddFavorite' in window.external)) {
            // IE Favorite
            window.external.AddFavorite(bookmarkURL, bookmarkTitle);
        } else {
            // WebKit - Safari/Chrome
            alert((navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Cmd' : 'Ctrl') + '+D 키를 눌러 즐겨찾기에 등록하실 수 있습니다.');
        }

        return triggerDefault;
    });

	// Tooltip
    $('body').tooltip({
		selector: "[data-toggle='tooltip']"
    });

	// Mobile Menu
    $('#mobile_nav').sly({
		horizontal: 1,
		itemNav: 'centered', //basic
		smart: 1,
		mouseDragging: 1,
		touchDragging: 1,
		releaseSwing: 1,
		startAt: menu_startAt,
		speed: 300,
		elasticBounds: 1,
		dragHandle: 1,
		dynamicHandle: 1
    });

	if(menu_sub) {
		$('#mobile_nav_sub').sly({
			horizontal: 1,
			itemNav: 'centered', //basic
			smart: 1,
			mouseDragging: 1,
			touchDragging: 1,
			releaseSwing: 1,
			startAt: menu_subAt,
			speed: 300,
			elasticBounds: 1,
			dragHandle: 1,
			dynamicHandle: 1
		});
	}

	$(window).resize(function(e) {
		$('#mobile_nav').sly('reload');
		if(menu_sub) {
			$('#mobile_nav_sub').sly('reload');
		}
	});

	// Amina Menu
	$('.nav-slide').amina_menu({name:'.sub-slide', show: sub_show, hide: sub_hide});

	// Carousel Swipe
	$(".swipe-carousel").swiperight(function(e) {
		e.preventDefault();
		$(this).carousel('prev');
	});

	$(".swipe-carousel").swipeleft(function(e) {
		e.preventDefault();
		$(this).carousel('next');
	});

	// Top & Bottom Button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 250) {
			$('#go-btn').fadeIn();
		} else {
			$('#go-btn').fadeOut();
		}
	});

	$('.go-top').on('click', function () {
		$('html, body').animate({ scrollTop: '0px' }, 500);
		return false;
	});

	$('.go-bottom').on('click', function () {
		$('html, body').animate({ scrollTop: $(document).height() }, 500);
		return false;
	});

});


// main-popup-intro
function myFunction() {
	setTimeout(function(){
			$( "#main-popup-intro" ).fadeOut( 1600, "linear");
	  }, 4500);
	}
myFunction();


// main-popup-intro-logo
// new Vivus('logo-outline', {
//     type: 'delayed',
//     duration: 320,
//     animTimingFunction: Vivus.EASE_OUT
// });

$(function(){
	$('.mobile-menu-open-btn, .mobile-menu-close-btn, .pc-menu-open-btn').on("click", function(){
		console.log('click');
		if ( $('.mobile-menu-open-btn').hasClass('mobile-menu-open-active')) {
			$('body').removeClass('no-scroll');
			console.log('close');
		} else {
			$('body').addClass('no-scroll');
			console.log('open');
		}
	});
});


// mobile-menu
$(document).ready(function(){
	// menu click event
	$('.mobile-menu-open-btn, .mobile-menu-close-btn, .pc-menu-open-btn').click(function() {
		$('.mobile-menu-open-btn').toggleClass('mobile-menu-open-active');
			if($('.mobile-menu-open-btn').hasClass('mobile-menu-open-active')) {
				$('.mobile-menu').addClass('mobile-menu-open-active');
				$('#mobile-menu').addClass('mobile-menu-open-active');
			}
			else {
				$('.mobile-menu').removeClass('mobile-menu-open-active');
				$('#mobile-menu').removeClass('mobile-menu-open-active');
			}
	});
});


// main slider
var slideWrapper = $(".main-slider"),
    iframes = slideWrapper.find('.embed-player'),
    lazyImages = slideWrapper.find('.slide-image'),
    lazyCounter = 0;

// POST commands to YouTube or Vimeo API
function postMessageToPlayer(player, command){
  if (player == null || command == null) return;
  player.contentWindow.postMessage(JSON.stringify(command), "*");
}

// When the slide is changing
function playPauseVideo(slick, control){
  var currentSlide, slideType, startTime, player, video;

  currentSlide = slick.find(".slick-current");
  slideType = currentSlide.attr("class").split(" ")[1];
  player = currentSlide.find("iframe").get(0);
  startTime = currentSlide.data("video-start");

  if (slideType === "vimeo") {
    switch (control) {
      case "play":
        if ((startTime != null && startTime > 0 ) && !currentSlide.hasClass('started')) {
          currentSlide.addClass('started');
          postMessageToPlayer(player, {
            "method": "setCurrentTime",
            "value" : startTime
          });
        }
        postMessageToPlayer(player, {
          "method": "play",
          "value" : 1
        });
        break;
      case "pause":
        postMessageToPlayer(player, {
          "method": "pause",
          "value": 1
        });
        break;
    }
  } else if (slideType === "youtube") {
    switch (control) {
      case "play":
        postMessageToPlayer(player, {
          "event": "command",
          "func": "mute"
        });
        postMessageToPlayer(player, {
          "event": "command",
          "func": "playVideo"
        });
        break;
      case "pause":
        postMessageToPlayer(player, {
          "event": "command",
          "func": "pauseVideo"
        });
        break;
    }
  } else if (slideType === "video") {
    video = currentSlide.children("video").get(0);
    if (video != null) {
      if (control === "play"){
        video.play();
      } else {
        video.pause();
      }
    }
  }
}

// Resize player
function resizePlayer(iframes, ratio) {
  if (!iframes[0]) return;
  var win = $(".main-slider"),
      width = win.width(),
      playerWidth,
      height = win.height(),
      playerHeight,
      ratio = ratio || 16/9;

  iframes.each(function(){
    var current = $(this);
    if (width / ratio < height) {
      playerWidth = Math.ceil(height * ratio);
      current.width(playerWidth).height(height).css({
        left: (width - playerWidth) / 2,
         top: 0
        });
    } else {
      playerHeight = Math.ceil(width / ratio);
      current.width(width).height(playerHeight).css({
        left: 0,
        top: (height - playerHeight) / 2
      });
    }
  });
}

// DOM Ready
$(function() {
  // Initialize
  slideWrapper.on("init", function(slick){
    slick = $(slick.currentTarget);
    setTimeout(function(){
      playPauseVideo(slick,"play");
    }, 1000);
    resizePlayer(iframes, 16/9);
  });
  slideWrapper.on("beforeChange", function(event, slick) {
    slick = $(slick.$slider);
    playPauseVideo(slick,"pause");
  });
  slideWrapper.on("afterChange", function(event, slick) {
    slick = $(slick.$slider);
    playPauseVideo(slick,"play");
  });
  slideWrapper.on("lazyLoaded", function(event, slick, image, imageSource) {
    lazyCounter++;
    if (lazyCounter === lazyImages.length){
      lazyImages.addClass('show');
      // slideWrapper.slick("slickPlay");
    }
  });

  //start the slider
  slideWrapper.slick({
    // fade:true,
    autoplaySpeed:4000,
    lazyLoad:"progressive",
    speed:600,
    arrows:false,
    dots:true,
    cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)"
  });
});

// Resize event
$(window).on("resize.slickVideoPlayer", function(){
  resizePlayer(iframes, 16/9);
});






// masonry
$('.section-wrap').masonry({
  itemSelector: '.size-four-two-one , .size-two-two-one ,.size-three-one-one',
  columnWidth: 0
});


// 인터넷익스프롤러 스크롤 filcker 현상 방지
$('body').on("mousewheel",function() {
  event.preventDefault();
  var wheelDelta = event.wheelDelta;
  var currentscrollPosition = window.pageYOffset;
  window.scrollTo(0, currentscrollPosition - wheelDelta);
});
