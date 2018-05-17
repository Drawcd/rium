<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

// 헤더 출력
if(isset($wset['hskin']) && $wset['hskin']) {
	$header_skin = $wset['hskin'];
	$header_color = $wset['hcolor'];
	include_once('./header.php');
}

// 타이틀 출력
if(!isset($wset['title']) || (isset($wset['title']) && !$wset['title'])) {
	echo apms_widget('title', 'group-title-'.$gr_id, '', '', $group_skin_path);
	echo '<div class="h30"></div>';
}
?>
<!-- 2단 그룹메인 -->
<?php if(!isset($wset['best']) || (isset($wset['best']) && !$wset['best'])) { // 베스트 ?>
	<div class="row">
		<div class="col-sm-6">
			<div class="div-title-wrap">
				<div class="div-title">
					<b>월간 베스트</b>
				</div>
				<div class="div-sep-wrap">
					<div class="div-sep sep-bold"></div>
				</div>
			</div>
			<?php // 최근 30일간 베스트
				echo apms_widget('list', 'group-month-'.$gr_id, 'rows=10 gr_list='.$gr_id.' cache=300 rank=red sort=hit term=day dayterm=30 date=m.d', 'rows=7', $group_skin_path);
			?>
			<div class="h30"></div>
		</div>
		<div class="col-sm-6">
			<div class="div-title-wrap">
				<div class="div-title">
					<b>주간 베스트</b>
				</div>
				<div class="div-sep-wrap">
					<div class="div-sep sep-bold"></div>
				</div>
			</div>
			<?php // 최근 7일간 베스트
				echo apms_widget('list', 'group-week-'.$gr_id, 'rows=10 gr_list='.$gr_id.' cache=300 rank=green sort=hit term=day dayterm=7 date=m.d', 'rows=7', $group_skin_path);
			?>
			<div class="h30"></div>
		</div>
	</div>
	<div class="h30"></div>
<?php } //베스트 끝 ?>

<div class="row">
<?php
// 보드추출
$bo_device = (G5_IS_MOBILE) ? 'pc' : 'mobile';
$sql = " select bo_table, bo_subject from {$g5['board_table']} where gr_id = '{$gr_id}' and bo_list_level <= '{$member['mb_level']}' and bo_device <> '{$bo_device}' and as_show = '1' ";
if(!$is_admin) $sql .= " and bo_use_cert = '' ";
$sql .= " order by as_order, bo_order ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) { ?>
	<?php if($i > 0 && $i%2 == 0) { ?>
			</div>
		<div class="row">
	<?php } ?>
	<div class="col-sm-6">
		<div class="div-title-wrap">
			<div class="div-title">
				<a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=<?php echo $row['bo_table']; ?>">
					<b><?php echo get_text($row['bo_subject']); ?></b>
				</a>
			</div>
			<div class="div-sep-wrap">
				<div class="div-sep sep-bold"></div>
			</div>
		</div>

		<?php //보드별 추출
			echo apms_widget('list', 'group-list-'.$row['bo_table'], 'rows=10 bo_list='.$row['bo_table'].' cache=300 icon={아이콘:caret-right} date=m.d', 'rows=7', $group_skin_path);
		?>

		<div class="h30"></div>
	</div>
<?php } ?>
</div>

<nav id="section-menu">
 <ul></ul>
</nav>
<!-- page-title Start -->
<div class="list-style-none procedure page-top-title section-group">
  <!-- section-title start -->
  <div class="page-top-title-bg">
    <div class="at-container">
			<div class="page-top-title-text">
	      <h1>서비스절차안내</h1>
	      <h5>Service Procedure Guide</h5>
	    </div>
	    <div class="page-top-title-subtext">
	      <h4 class="fc-white">최고의 사업 파트너로서 <span class="emphasize font-c01">가치</span>와 <span class="emphasize font-c01">성공</span>을 드리겠습니다.</h4>
	    </div>
		</div>
  </div>
</div>

<!-- php-include -->
<div id="section-one" class="widget-box section section-group scroll-item" title="서비스신청안내">
  <?php echo apms_widget('rium-page-include', $wid.'-service-pro01'); ?>
</div>
<!-- php-include End-->

<!-- php-include -->
<div id="section-two" class="widget-box section-group scroll-item" title="시공안내">
  <?php echo apms_widget('rium-page-include', $wid.'-service-pro02'); ?>
</div>
<!-- php-include End-->

<!-- php-include -->
<div id="section-three" class="widget-box section-group section scroll-item" title="상담신청">
  <?php echo apms_widget('rium-page-include', $wid.'-service-pro03'); ?>
</div>
<!-- php-include End-->

<script>
jQuery(function($) {

  var html = $('html');
  var viewport = $(window);
  var viewportHeight = viewport.height();

  var scrollMenu = $('#section-menu');
  var timeout = null;

  function menuFreeze() {
    if (timeout !== null) {
      scrollMenu.removeClass('freeze');
      clearTimeout(timeout);
    }

    timeout = setTimeout(function() {
      scrollMenu.addClass('freeze');
    }, 2000);
  }
  scrollMenu.mouseover(menuFreeze);

  /* ==========================================================================
	   Build the Scroll Menu based on Sections .scroll-item
	   ========================================================================== */

  var sectionsHeight = {},
    viewportheight, i = 0;
  var scrollItem = $('.scroll-item');
  var bannerHeight;

  function sectionListen() {
    viewportHeight = viewport.height();
    bannerHeight = (viewportHeight);
    $('.section').addClass('resize');
    scrollItem.each(function() {
      sectionsHeight[this.title] = $(this).offset().top;
    });
  }
  sectionListen();
  viewport.resize(sectionListen);
  viewport.bind('orientationchange', function() {
    sectionListen();
  });

  var count = 0;

  scrollItem.each(function() {
    var anchor = $(this).attr('id');
    var title = $(this).attr('title');
    count++;
    $('#section-menu ul').append('<li><a id="nav_' + title + '" href="#' + anchor + '"><span>' + count + '</span> ' + title + '</a></li>');
  });

  function menuListen() {
    var pos = $(this).scrollTop();
    pos = pos + viewportHeight * 0.625;
    for (i in sectionsHeight) {
      if (sectionsHeight[i] < pos) {
        $('#section-menu a').removeClass('active');
        $('#section-menu a#nav_' + i).addClass('active');;
        var newHash = '#' + $('.scroll-item[title="' + i + '"]').attr('id');
        if (history.pushState) {
          history.pushState(null, null, newHash);
        } else {
          location.hash = newHash;
        }
      } else {
        $('#section-menu a#nav_' + i).removeClass('active');
        if (pos < viewportHeight - 72) {
          history.pushState(null, null, ' ');
        }
      }
    }
  }
  scrollMenu.css('margin-top', scrollMenu.height() / 2 * -1);

  /* ==========================================================================
	   Smooth Scroll for Anchor Links and URL refresh
	   ========================================================================== */

  scrollMenu.find('a').click(function() {
    var href = $.attr(this, 'href');
    $('html').animate({
      scrollTop: $(href).offset().top
    }, 500, function() {
      window.location.hash = href;
    });
    return false;
  });

  /* ==========================================================================
	   Fire functions on Scroll Event
	   ========================================================================== */

  function scrollHandler() {
    menuListen();
    menuFreeze();

  }
  scrollHandler();
  viewport.on('scroll', function() {
    scrollHandler();
    //			window.requestAnimationFrame(scrollHandler);
  });
});
</script>


<?php if($setup_href) { ?>
	<p class="text-center btn-wset">
		<a class="btn btn-color btn-sm win_memo" href="<?php echo $setup_href;?>">
			<i class="fa fa-cogs"></i> 스킨설정
		</a>
	</p>
<?php } ?>
