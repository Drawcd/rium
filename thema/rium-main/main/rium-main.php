<?php // add_stylesheet('<link rel="stylesheet" href="'.'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">',0); ?>
<?php
apms_script('scrolla');
apms_script('animate');
?>
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

<?php // echo apms_widget('basic-title', $wid.'-wt1', 'height=400px shadow=4', 'auto=0'); //타이틀 ?>
<!-- 메인슬라이더 Start-->
<?php include_once(G5_PATH.'/include/main-slider.php'); ?>
<!-- 메인슬라이더 End -->


<div id="section01" class="section">
  <div class="widget-box">
    <?php echo apms_widget('rium-page-include', $wid.'-main-slider-bottom'); ?>
  </div>
</div>

<div id="section02" class="section at-container">
  <div class="widget-box">
    <?php echo apms_widget('rium-page-include', $wid.'-main-slider-bottom-image'); ?>
  </div>
</div>
<!-- main-popup 1,2 End -->

<!-- company performance Start -->
<div id="section03" class="point-color02 performance">
  <div class="at-container widget-index">
    <div class="section">
      <div class="section-item">
        <h3 class="section-list-title animate" data-animate="fadeInUp" data-duration="1.0s" data-delay="0.1s" data-offset="30">건설사례 및 예정</h3>
        <div class="section-group animate performance-title" data-animate="fadeInUp" data-duration="1.0s" data-delay="0.3s" data-offset="30">
          <span class="">
            <h3 class="fc-orange section-list-sub">COMPANY</h3>
          </span>
          <span class="">
            <h3 class="section-list-sub">PERFORMANCE</h3>
          </span>
          <p>각 업무 영역별 업무실적 및 예정지를 안내해 드립니다.</p>
        </div>
      </div>
      <div class="widget-box animate main-rium-post-slider" data-animate="fadeIn" data-duration="1.5s" data-delay="0.1s" data-offset="30">
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
			<div class="widget-box widget-img main-popup02">
				<a href="#배너이동주소">
					<img src="<?php echo THEMA_URL;?>/assets/img/banner.jpg">
				</a>
			</div>
			<!-- 이미지 배너 끝 -->

			<!-- 배너 시작 -->
			<div class="div-title-underbar">
				<a href="<?php echo G5_BBS_URL;?>/board.php?bo_table=basic">
          <span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
            <h3>테스트</h3>
          </span>
				</a>
        <a href="<?php echo G5_BBS_URL;?>/board.php?bo_table=basic" class="main-board p-absolute p-right">
          <span class="lightgray <?php echo $font;?>"><i class="main-board far fa-plus"></i></span>
        </a>
			</div>





			<div class="widget-box main-bottom-board">
				<?php echo apms_widget('basic-post-slider', $wid.'-wm9', 'center=1 nav=1', 'auto=0'); ?>
			</div>
			<!-- 배너 끝 -->
		</div>
	</div>
</div>
