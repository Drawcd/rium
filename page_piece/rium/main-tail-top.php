<?php
// 소셜아이콘
$sns_share_url  = (IS_YC && IS_SHOP) ? G5_SHOP_URL : G5_URL;
$sns_share_title = get_text($config['cf_title']);
$sns_share_img = G5_URL.'/img/sns';
$sns_share_icon = '<div class="sns-share-icon">'.PHP_EOL;
$sns_share_icon .= get_sns_share_link('facebook', $sns_share_url, $sns_share_title, $sns_share_img.'/facebook.png').PHP_EOL;
$sns_share_icon .= get_sns_share_link('twitter', $sns_share_url, $sns_share_title, $sns_share_img.'/twitter.png').PHP_EOL;
$sns_share_icon .= get_sns_share_link('googleplus', $sns_share_url, $sns_share_title, $sns_share_img.'/googleplus.png').PHP_EOL;
$sns_share_icon .= get_sns_share_link('kakaostory', $sns_share_url, $sns_share_title, $sns_share_img.'/kakaostory.png').PHP_EOL;
$sns_share_icon .= get_sns_share_link('kakaotalk', $sns_share_url, $sns_share_title, $sns_share_img.'/kakaotalk.png').PHP_EOL;
$sns_share_icon .= get_sns_share_link('naverband', $sns_share_url, $sns_share_title, $sns_share_img.'/naverband.png').PHP_EOL;
$sns_share_icon .= '</div>';
?>


<div  class="widget-box">
  <div class="row at-row">
    <!-- 메인 영역 -->
    <div class="col-md-12<?php echo ($side == "left") ? ' pull-right' : '';?> at-col at-main">
      <div class="row">
        <div class="col-sm-6">
          <div class="tail-contactinfo-wrap">
            <div>
              <h2>Contact</h2>
              <h3>부담없이 연락주세요</h3>
              <h3><b class="">리움</b>은 성공을 위한 파트너이기 이전에</h3>
              <h3>고객님의 마음부터 얻겠습니다.</h3>
              <h4>전화문의</h4>
              <h3>031)962-8070</h3>
            </div>
            <!-- <div class="sns">
              <a href="" class="border-radius-10"><img src="/img/sns/facebook.png" alt=""></a>
              <a href="" class="border-radius-10"><img src="/img/sns/kakaostory.png" alt=""></a>
              <a href="" class="border-radius-10"><img src="/img/sns/naverband.png" alt=""></a>
              <a href="" class="border-radius-10"><img src="/img/sns/twitter.png" alt=""></a>
              <a href="" class="border-radius-10"><img src="/img/sns/googleplus.png" alt=""></a>
            </div> -->
          </div>
          <!-- SNS아이콘 시작 -->
          <div class="widget-box text-left">
            <?php echo $sns_share_icon; ?>
          </div>
          <!-- SNS아이콘 끝 -->
        </div>
        <div class="col-sm-6">
          <div class="tail-request-wrap">
            <?php include_once(G5_PATH.'/form.php'); // 빠른상담불러오기 ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
