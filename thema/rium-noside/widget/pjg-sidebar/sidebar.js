var sideBarWrap = (function(){

  var sidebar_menu_length = (document.getElementsByClassName("sidebar-menu-item")[0].getElementsByTagName("li").length) ;
  var sidebar_menu_width = $('#sidebar-box').width() / sidebar_menu_length;
  var sidebarMenuverticalHeight = Number( ( $('.sidebar-login .btn-group-justified a').css('height') ).replace(/[^(0-9)]/gi,"") ) ;
  var sidebarMenuverticalPadding = Number( ( $('.sidebar-login .btn-group-justified a').css('padding') ).replace(/[^(0-9)]/gi,"") * 2 ) ;
  var sidebarMenuvertical = ( sidebarMenuverticalHeight - sidebarMenuverticalPadding ) ;

  // .sidebar-common .btn-group-vertical a 세로 가운데 정렬
  $('.sidebar-common .btn-group-justified a').css({
    'line-height' : sidebarMenuvertical + 'px'
  });

  function sidebarMenuWidth (){
    $('.sidebar-menu-item li').width(sidebar_menu_width).css({
      'line-height' : '45px'
    });
    sidebar_mask('show');
  }

  function sidebar_mask(opt) {
  	var mask = $("#sidebar-box-mask");
  	if(opt == 'show') {
  		mask.show();
  		$('html, body').css({'overflow': 'hidden', 'height': '100%'});
  	} else {
  		mask.animate({opacity: '0'}, "slow", function(){ $(this).css({'display' : 'none'}) });
  		$('html, body').css({'overflow': '', 'height': ''});
  	}
  }

  $(window).resize(function () {
    sidebar_menu_width = $('#sidebar-box').width() / sidebar_menu_length - ( 17 / sidebar_menu_length);
    sidebarMenuWidth ();
  });
  sidebarMenuWidth ();

  return {
    sideMenubtn : function sidebarMenuButton (action){
      var sidebarButton = action.getAttribute("data-action-type");
      sidebar_mask(sidebarButton);
      console.log(sidebarButton);
    }
  };
//End
})();

$(document).ready(function() {
  var placeholderTarget = $('#sidebar_login_form input[type="text"], #sidebar_login_form input[type="password"]');
   //포커스시
  placeholderTarget.on('focus', function(){
  $(this).siblings('label').fadeOut('fast');
  });
  //포커스아웃시
  placeholderTarget.on('focusout', function(){
    if($(this).val() == ''){
      $(this).siblings('label').fadeIn('fast');
    }
  });
});



// input radius
// $(function(){
if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0)
{
    var _interval = window.setInterval(function ()
    {
        var autofills = $('input:-webkit-autofill');
        if (autofills.length > 0)
        {
            window.clearInterval(_interval); // stop polling
            autofills.each(function()
            {
                var clone = $(this).clone(true, true);
                $(this).after(clone).remove();
            });
        }
    }, 20);
}



var getParameters = function (paramName) {
    // 리턴값을 위한 변수 선언
    var returnValue;

    // 현재 URL 가져오기
    var url = location.href;

    // get 파라미터 값을 가져올 수 있는 ? 를 기점으로 slice 한 후 split 으로 나눔
    var parameters = (url.slice(url.indexOf('#') + 1, url.length)).split('&');

    // 나누어진 값의 비교를 통해 paramName 으로 요청된 데이터의 값만 return
    for (var i = 0; i < parameters.length; i++) {
        var varName = parameters[i].split('=')[0];
        if (varName.toUpperCase() == paramName.toUpperCase()) {
            returnValue = parameters[i].split('=')[1];
            return decodeURIComponent(returnValue);
        }
    }
};
var sider_bar_state_value = {};
for (var i = 0; i < $('.sidebar-menu-list').length; i++) {
  sider_bar_state_value[i] = $('.sidebar-menu-list').eq(i).attr('title');
  // console.log(i+1);
  // console.log(sider_bar_state_value);
  // console.log( $('.sidebar-menu-list').eq(i).attr('title') );
}

$('#sidebar-box').data('side',getParameters('side') );
var sidebar_data = $('#sidebar-box').data('side') ;

console.log( sidebar_data );
function sidebarBox(){
  if ( $('#sidebar-box').data('side') == 'open' ){
    $('#sidebar-box').fadeIn(200);
  } else {
    $('#sidebar-box').fadeOut(200);
  }
}





  //   sidebarBox();
  // });

// console.log( $('#sidebar-box').data('side') );
// console.log( $('#sidebar-box').data("side") );

// sidebarBox();



// });

// // Sidebar
// var sidebar_id;
// var sidebar_size = "500px";
// var sidebar_mobile_size = $(document).width() - 40 ;
//
// $(document).resize(function () {
// 	var sidebar_mobile_size = $(document).width() - 40 ;
// 	return sidebar_mobile_size;
// });
//
// function is_sidebar() {
// 	var side = 'pc-size';
// 	var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
// 	if(width > 991) {
// 		side = 'pc-size';
// 	} else {
// 		side = 'mobile-size';
// 	}
// 	return side;
// }
//
// function ani_sidebar(div, type, val) {
// 	if(type == "pc-size") {
// 		div.animate({ width : val });
// 	} else {
// 		div.animate({ width : sidebar_mobile_size });
// 	}
// }
//
// function sidebar_mask(opt) {
// 	var mask = $("#sidebar-box-mask");
// 	if(opt == 'show') {
// 		mask.show();
// 		$('html, body').css({'overflow': 'hidden', 'height': '100%'});
// 	} else {
// 		mask.hide();
// 		$('html, body').css({'overflow': '', 'height': ''});
// 	}
// }
//
// function sidebar_open(id) {
//
// 	var div = $("#sidebar-box");
// 	var side = is_sidebar();
// 	var is_div = div.css(side);
// 	var is_size;
// 	var is_open;
// 	var is_show;
//
// 	if(id == sidebar_id) {
// 		if(is_div === sidebar_size) {
// 			is_show = true;
// 			ani_sidebar(div, side, sidebar_size);
// 			if(side == "pc-size") {
// 				sidebar_mask('show');
// 			} else {
// 				sidebar_mask('hide');
// 			}
// 		} else {
// 			is_show = true;
// 			ani_sidebar(div, side, sidebar_size);
// 			sidebar_mask('hide');
// 		}
// 	} else {
// 		if(is_div === sidebar_size) {
// 			is_show = true;
// 			ani_sidebar(div, side, sidebar_size);
// 		} else {
// 			is_show = true;
// 		}
//
// 		if(side == "left") {
// 			sidebar_mask('show');
// 		} else {
// 			sidebar_mask('hide');
// 		}
// 	}
//
// 	// Show
// 	if(is_show) {
// 		$('.sidebar-item').hide();
//
// 		if(id == "sidebar-user") {
// 			$('.sidebar-common').hide();
// 		} else {
// 			$('.sidebar-common').show();
// 		}
//
// 		switch(id) {
// 			case 'sidebar-response'	: $('#' + id + '-list').load(sidebar_url + '/response.php'); break;
// 			case 'sidebar-cart'		: $('#' + id + '-list').load(sidebar_url + '/cart.php'); break;
// 		}
//
// 		$('#' + id).show();
// 		$('#sidebar-content').scrollTop(0);
// 	}
//
// 	// Save id
// 	sidebar_id = id;
//
// 	return false;
// }
//
// // sidebar Empty
// function sidebar_empty(id) {
//
// 	// Ajax
// 	switch(id) {
// 		case 'sidebar-cart' : $('#' + id + '-list').load(sidebar_url + '/cart.php?del=1'); break;
// 	}
//
// 	return false;
// }
//
// // sidebar Read
// function sidebar_read(id) {
//
// 	$('#sidebar-response-list').load(sidebar_url + '/response.php?read=1&id=' + id);
//
// 	return false;
// }
//
// // sidebar Href
// function sidebar_href(url) {
//
// 	$('.sidebar-menu .panel-collapse').hide();
//
// 	document.location.href = decodeURIComponent(url);
//
// 	return false;
// }
//
// // sidebar Login
// function sidebar_login(f) {
// 	if (f.mb_id.value == '') {
// 		alert('아이디를 입력해 주세요.');
// 		f.mb_id.focus();
// 		return false;
// 	}
// 	if (f.mb_password.value == '') {
// 		alert('비밀번호를 입력해 주세요.');
// 		f.mb_password.focus();
// 		return false;
// 	}
// 	return true;
// }
//
// // sidebar Search
// function sidebar_search(f) {
//
// 	if (f.stx.value.length < 2) {
// 		alert("검색어는 두글자 이상 입력하십시오.");
// 		f.stx.select();
// 		f.stx.focus();
// 		return false;
// 	}
//
// 	f.action = f.url.value;
//
// 	return true;
// }
//
// // sidebar Response Count
// function sidebar_response() {
//
// 	var $labels = $('.sidebarLabel');
// 	var $counts = $('.sidebarCount');
// 	var url = sidebar_url + '/response.php?count=1';
//
// 	$.get(url, function(data) {
// 		if (data.count > 0) {
// 			$counts.text(number_format(data.count));
// 			$labels.show();
// 		} else {
// 			$labels.hide();
// 		}
// 	}, "json");
// 	return false;
// }
//
// // Response Auto Check
// if(g5_is_member && sidebar_time > 0) {
// 	setInterval(function() {
// 		sidebar_response();
// 	}, sidebar_time * 1000); // Time = 1000ms ex) 10sec = 10 * 1000
// }
//
// $(document).ready(function () {
//
// 	// Sidebar Close
// 	$('.sidebar-close').on('click', function () {
// 		var div = $("#sidebar-box");
// 		var side = is_sidebar();
// 		ani_sidebar(div, side, 0);
// 		sidebar_mask('hide');
// 		return false;
//     });
//
// 	// Sidebar Menu
// 	$('.sidebar-menu .ca-head').on('click', function () {
// 		var clicked_toggle = $(this);
//
// 		if(clicked_toggle.hasClass('active')) {
// 			clicked_toggle.parents('.sidebar-menu').find('.ca-head').removeClass('active');
// 		} else {
// 			clicked_toggle.parents('.sidebar-menu').find('.ca-head').removeClass('active');
// 			clicked_toggle.addClass('active');
// 		}
// 	});
//
// 	// Sidebar Goto Top
// 	$('.sidebar-scrollup').on('click', function () {
//         $("html, body").animate({
//             scrollTop: 0
//         }, 500);
//         return false;
//     });
//
// 	// Sidebar Change
// 	$(window).resize(function() {
// 		var side = is_sidebar();
// 		if(side == 'left') {
// 			side = 'right';
// 		} else {
// 			side = 'left';
// 		}
// 		if($("#sidebar-box").css(side) != '') {
// 			$("#sidebar-box").css(side, '');
// 			sidebar_mask('hide');
// 		}
// 	});
// });
