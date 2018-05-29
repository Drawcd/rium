/*
 *  Amina App 1.0
 *
 *  Copyright (c) 2015 Amina
 *  http://amina.co.kr
 *
 */

(function($) {
  $.fn.amina_menu = function(option) {
    var cfg = {
      name: '.sub',
      show: '',
      hide: ''
    };

    if (typeof option == "object")
      cfg = $.extend(cfg, option);

    var subname = cfg.name;
    var submenu = $(this).find(subname).parent();

    submenu.each(function(i) {
      $(this).hover(
        function(e) {
          var targetmenu = $(this).children(subname + ":eq(0)");
          if (targetmenu.queue().length <= 1) {
            switch (cfg.show) {
              case 'show':
                targetmenu.show();
                break;
              case 'fade':
                targetmenu.fadeIn(300, 'swing');
                break;
              case 'none':
                break;
              default:
                targetmenu.slideDown(300, 'swing');
                break;
            }
          }
        },
        function(e) {
          var targetmenu = $(this).children(subname + ":eq(0)");
          switch (cfg.hide) {
            case 'fade':
              targetmenu.fadeOut(100, 'swing');
              break;
            case 'slide':
              targetmenu.slideUp(100, 'swing');
              break;
            default:
              targetmenu.hide();
              break;
          }
        }
      ); //end hover
      $(this).click(function() {
        $(this).children(subname + ":eq(0)").hide();
      });
    }); //end submenu.each()

    $(this).find(subname).css({
      display: "none",
      visibility: "visible"
    });
  };
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

  if (menu_sub) {
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
    if (menu_sub) {
      $('#mobile_nav_sub').sly('reload');
    }
  });

  // Amina Menu
  $('.nav-slide').amina_menu({
    name: '.sub-slide',
    show: sub_show,
    hide: sub_hide
  });

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
  $(window).scroll(function() {
    if ($(this).scrollTop() > 250) {
      $('#go-btn').fadeIn();
    } else {
      $('#go-btn').fadeOut();
    }
  });

  $('.go-top').on('click', function() {
    $('html, body').animate({
      scrollTop: '0px'
    }, 500);
    return false;
  });

  $('.go-bottom').on('click', function() {
    $('html, body').animate({
      scrollTop: $(document).height()
    }, 500);
    return false;
  });

});

// 네비게이션 폭 정리 시작
$(document).ready(function() {
  var navigation_width = Number($('.at-container').css('max-width').replace(/[^-\d\.]/g, ''));
  var navigation_logo_width = Number($('.nav-logo').width());
  var navigation_rw_width = Number($('.nav-rw').width());
  var menu_ul = Number($('.menu-ul').width());
  var menu_ul_padding;

  function navigation_resize() {

    // navigation rw
    menu_ul_padding_right = (navigation_width + (navigation_rw_width)) - $(window).width();
    if ($(window).width() > (navigation_width + (navigation_rw_width * 2))) {
      menu_ul_padding_right = 0;
      $('.menu-ul').css('padding-right', menu_ul_padding_right);
      $('.table-responsive').css('padding-right', menu_ul_padding_right);
    } else {
      if ($(window).width() < navigation_width + (navigation_rw_width * 2)) {
        menu_ul_padding_right = (navigation_width + (navigation_rw_width * 2)) - $(window).width();
        if (menu_ul_padding_right > (navigation_rw_width * 2)) {
          // menu_ul_padding_right = navigation_rw_width;
          $('.menu-ul').css('padding-right', navigation_rw_width);
          $('.table-responsive').css('padding-right', navigation_rw_width);
        } else {
          $('.menu-ul').css('padding-right', (menu_ul_padding_right / 2));
          $('.table-responsive').css('padding-right', (menu_ul_padding_right / 2));
        }
      }
    }
    // navigation logo
    menu_ul_padding = (navigation_width + (navigation_logo_width)) - $(window).width();
    if ($(window).width() > (navigation_width + (navigation_logo_width * 2))) {
      menu_ul_padding = 0;
      $('.menu-ul').css('padding-left', menu_ul_padding);
      $('.table-responsive').css('padding-left', menu_ul_padding);
    } else {
      if ($(window).width() < navigation_width + (navigation_logo_width * 2)) {
        menu_ul_padding = (navigation_width + (navigation_logo_width * 2)) - $(window).width();
        if (menu_ul_padding > (navigation_logo_width * 2)) {
          // menu_ul_padding = navigation_logo_width;
          $('.menu-ul').css('padding-left', navigation_logo_width);
          $('.table-responsive').css('padding-left', navigation_logo_width);
        } else {
          $('.menu-ul').css('padding-left', (menu_ul_padding / 2));
          $('.table-responsive').css('padding-left', (menu_ul_padding / 2));
        }
      }
    }

  }
  navigation_resize();
  $(window).on('resize', function() {
    navigation_resize();
  });
});
// 네비게이션 폭 끝

// 계열사
$(function(){
  $(".subsidiary-button").data({ 'open' : false }).on('click', function(){

    if( $(".section-select").data().open ){
      $(this).removeClass('select-open');
      $('.subsidiary-page').css('left' , '100%');
      $(this).data({open : false});
    } else {
      location.href = '#p-wdc';
      $(".section-select").addClass('select-open');
      $('.subsidiary-page').css('left' , '10%' );
      $(this).data({open : true});
      $(document.body).css('overflow-y' , 'hidden' );
    }
  });
  // 계열사 페이지 클릭시
  $(".subsidiary-page").on('click', function(){
    $('.subsidiary-page').css('left' , '100%');
    $(".section-select").removeClass('select-open');
    $(document.body).css('overflow-y' , 'auto' );
    $(".subsidiary-button").data({open : false});
  });
});
