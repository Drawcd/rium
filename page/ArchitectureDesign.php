<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>


<!-- page-title Start -->
<div class="list-style-none service-infomation page-top-title section-group">
  <!-- section-title start -->
  <div class="page-top-title-bg">
    <div class="at-container">
			<div class="page-top-title-text">
	      <h1>서비스안내</h1>
	      <h5>Service information</h5>
	    </div>
	    <div class="page-top-title-subtext">
	      <h4 class="">최고의 사업 파트너로서 <span class="emphasize font-c01">가치</span>와 <span class="emphasize font-c01">성공</span>을 드리겠습니다.</h4>
	    </div>
		</div>
  </div>
</div>


<!-- php-include -->
<div id="section-one" class="widget-box section section-group scroll-item" title="서비스신청안내">
  <?php echo apms_widget('rium-page-include', $wid.'-serviceinfo01'); ?>
</div>
<!-- php-include End-->

<!-- php-include -->
<div id="section-three" class="widget-box section-group section scroll-item" title="상담신청">
  <?php echo apms_widget('rium-page-include', $wid.'-service-pro03'); ?>
</div>
<!-- php-include End-->
