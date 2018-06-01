<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// 위젯 대표아이디 설정
$wid = 'CMBL';
// 게시판 제목 폰트 설정
$font = 'font-16 en';
// 게시판 제목 하단라인컬러 설정 - red, blue, green, orangered, black, orange, yellow, navy, violet, deepblue, crimson..
$line = 'navy';
// 사이드 위치 설정 - left, right
$side = ($at_set['side']) ? 'left' : 'right';
?>
<style>
	.widget-index .at-main,
	.widget-index .at-side { padding-top:10px; padding-bottom:0px; }
	.widget-index .div-title-underbar { margin-bottom:15px; }
	.widget-index .div-title-underbar span { padding-bottom:4px; }
	.widget-index .div-title-underbar span b { font-weight:500; }
	.widget-index .widget-img img { display:block; max-width:100%; /* 배너 이미지 */ }
	.widget-box { margin-bottom:25px; }
</style>

<!-- main-title wedget 주석 -->
<?php // echo apms_widget('basic-title', $wid.'-wt1', 'height=400px shadow=4', 'auto=0'); ?>


<!-- mainslider -->

<div class="main-slider">

  <div class="item video">
    <video class="slide-video slide-media" loop muted preload="metadata" poster="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSXZCakVGZWhOV00">
      <source src="/video/video01.mp4" type="video/mp4" />
    </video>
    <p class="caption">HTML 5 Video</p>
  </div>
  <div class="item video">
    <video class="slide-video slide-media" loop muted preload="metadata" poster="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSXZCakVGZWhOV00">
      <source src="/video/video02.mp4" type="video/mp4" />
    </video>
    <p class="caption">HTML 5 Video</p>
  </div>

  <div class="item youtube">
    <!-- <span class="loading">Loading...</span> -->
    <iframe class="embed-player slide-media" width="1280" height="720" src="https://www.youtube.com/embed/wav98ohEEm0?enablejsapi=1&controls=0&fs=0&iv_load_policy=1&rel=0&showinfo=0&loop=1&playlist=tdwbYGe8pv8&start=0" frameborder="0" allowfullscreen></iframe>
    <p class="caption">YouTube</p>
    <!-- <figure>
      <div class="slide-image slide-media" style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRkY4S0JDTk1BbE0');">
        <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRkY4S0JDTk1BbE0" class="image-entity" />
      </div>
      <figcaption class="caption">Static Image</figcaption>
    </figure> -->
  </div>
  <div class="item vimeo" data-video-start="4">
    <iframe class="embed-player slide-media" src="https://player.vimeo.com/video/217885864?api=1&byline=0&portrait=0&title=0&background=1&mute=1&loop=1&autoplay=0&id=217885864" width="980" height="520" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    <p class="caption">Vimeo</p>
  </div>
  <div class="item image">
    <figure>
      <div class="slide-image slide-media" style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM');">
        <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM" class="image-entity" />
      </div>
      <figcaption class="caption">Static Image</figcaption>
    </figure>
  </div>
  <div class="item youtube">
    <iframe class="embed-player slide-media" width="980" height="520" src="https://www.youtube.com/embed/tdwbYGe8pv8?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1&playlist=tdwbYGe8pv8&start=102" frameborder="0" allowfullscreen></iframe>
    <p class="caption">YouTube</p>
  </div>
  <div class="item image">
    <figure>
      <div class="slide-image slide-media" style="background-image:url('https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSlBkWDBsWXJNazQ');">
        <img data-lazy="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSlBkWDBsWXJNazQ" class="image-entity" />
      </div>
      <figcaption class="caption">Static Image</figcaption>
    </figure>
  </div>
  <div class="item video">
    <video class="slide-video slide-media" loop muted preload="metadata" poster="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSXZCakVGZWhOV00">
      <source src="https://player.vimeo.com/external/138504815.sd.mp4?s=8a71ff38f08ec81efe50d35915afd426765a7526&profile_id=112" type="video/mp4" />
    </video>
    <p class="caption">HTML 5 Video</p>
  </div>
</div>

<!-- main-slider  -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'></script>

<!-- mainslider End-->
<!-- main-popup 1,2 Start -->
<div id="section01" class="section">
  <div class="widget-box">
    <?php echo apms_widget('rium-page-include', $wid.'-main-slider-bottom'); ?>
  </div>
</div>

<div id="section02" class="section">
  <div class="widget-box">
    <?php echo apms_widget('rium-page-include', $wid.'-main-slider-bottom-image'); ?>
  </div>
</div>
<!-- main-popup 1,2 End -->

<!-- company performance Start -->
<div id="section03" class="point-color02 performance">
  <div class="at-container widget-index">
    <div class="section">
      <div class="section-item" >
        <h3 class="section-list-title animate" data-animate="fadeInUp" data-duration="1.0s" data-delay="0.1s" data-offset="100">건설사례 및 예정</h3>
        <div class="section-group animate performance-title" data-animate="fadeInUp" data-duration="1.0s" data-delay="0.3s" data-offset="100">
          <span class="">
            <h3 class="fc-orange section-list-sub">COMPANY</h3>
          </span>
          <span class="">
            <h3 class="section-list-sub">PERFORMANCE</h3>
          </span>
        </div>
      </div>
      <div class="widget-box animate main-rium-post-slider" data-animate="fadeIn" data-duration="1.5s" data-delay="0.1s" data-offset="100">
        <?php echo apms_widget('rium-post-slider', $wid.'-company-performance'); ?>
      </div>
    </div>
  </div>
</div>
<!-- company performance End -->

<!-- popup-customer -->
<div id="section04" class="section">
  <div class="widget-box">
    <?php echo apms_widget('rium-page-include', $wid.'-popup-customer'); ?>
  </div>
</div>
<!-- popup-customer End-->


<!-- main-popup 3 Start -->
<div id="section05" class="point-color01 business-area-wrap" >
  <div class="widget-index" >
    <div class="section-item" >
      <div class="section-group animate" data-animate="fadeIn" data-duration="1.0s" data-delay="0.1s" data-offset="100">
        <h3 class="section-list-title">사업영역</h3>
        <span>
          <h3 class="fc-orange section-list-sub">BUSINESS</h3>
        </span>
        <span>
          <h3 class="section-list-sub">AREA</h3>
        </span>
        <p>
          안정적인 사업 수립을 위하여 사업에 필요한 전반적인 요소를 갖추고 있습니다.
        </p>
      </div>
    </div>
    <div class="widget-box">
      <?php echo apms_widget('rium-page-include', $wid.'-business-area'); ?>
    </div>
  </div>
</div>
<!-- main-popup 3 End -->






<div id="section06" class="at-container widget-index">
	<div class="row at-row">
		<!-- 메인 영역 -->
		<div class="col-md-12<?php echo ($side == "left") ? ' pull-right' : '';?> at-col at-main">
			<div class="row">
				<div class="col-sm-6">
					<!-- 새소식-->
					<div class="div-title-underbar p-relative">
						<a href="<?php echo G5_BBS_URL;?>/board.php?bo_table=basic">
							<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
								<h3>새소식</h3>
							</span>
            </a>
            <a href="<?php echo G5_BBS_URL;?>/board.php?bo_table=basic" class="main-board p-absolute p-right">
              <span class="lightgray <?php echo $font;?>"><i class="main-board far fa-plus"></i></span>
						</a>
					</div>
					<div class="widget-box">
						<?php echo apms_widget('rium-post-garo', $wid.'-wm1', 'icon={아이콘:caret-right} date=1 center=1 strong=1,2'); ?>
					</div>
					<!-- 새소식 끝-->

				</div>
				<div class="col-sm-6">

          <!-- 상담문의 시작 -->
          <div class="div-title-underbar p-relative">
            <a href="<?php echo G5_BBS_URL;?>/board.php?bo_table=basic">
              <span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
                <h3>상담문의</h3>
              </span>
            </a>
            <a href="<?php echo G5_BBS_URL;?>/board.php?bo_table=basic" class="main-board p-absolute p-right">
              <span class="lightgray <?php echo $font;?>"><i class="main-board far fa-plus"></i></span>
            </a>
          </div>
          <div class="widget-box">
            <?php echo apms_widget('rium-post-list', $wid.'-wm7', 'icon={아이콘:caret-right} date=1 strong=1'); ?>
          </div>
          <!-- Q & A 끝 -->

				</div>
			</div>

      			<!-- 이미지 배너 시작 -->
			<div class="widget-box widget-img">
				<a href="#배너이동주소">
					<img src="<?php echo THEMA_URL;?>/assets/img/banner.jpg">
				</a>
			</div>
			<!-- 이미지 배너 끝 -->

			<!-- 배너 시작 -->
			<div class="div-title-underbar">
				<a href="<?php echo G5_BBS_URL;?>/board.php?bo_table=basic">
					<span class="pull-right lightgray <?php echo $font;?>">+</span>
					<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
						<b>Banner</b>
					</span>
				</a>
			</div>
			<div class="widget-box">
				<?php echo apms_widget('basic-post-slider', $wid.'-wm9', 'center=1 nav=1', 'auto=0'); ?>
			</div>
			<!-- 배너 끝 -->
		</div>
	</div>
</div>
<div id="sectiontail" class="point-color10">
  <div class="at-container widget-index">
    <?php echo apms_widget('rium-page-include', $wid.'-main-tail-top'); ?>
  </div>
</div>
