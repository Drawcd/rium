<!-- PC All Menu -->
<div class="pc-menu-all">
  <!-- <div id="menu-all" class="collapse"> -->
  <div id="mobile-menu" class="">
    <div class="mobile-container mobile-menu-responsive">
      <div class="mobile-menu">
          <ul class="dept1-wrap">
            <!-- <li class="menu-all-btn">
              <div class="padding-20 menu-a">
                <ul>
                  <li class="mobile-menu-open-logo">
                    <img src="/img/de-logo.png" width="180px" alt="">
                  </li>
                </ul>
              </div>
            </li> -->
            <li class="menu-all-btn">
              <div class="padding-20">
                <a href="javascript:;" class="mobile-menu-close-btn" data-toggle="collapse" data-target="#menu-all"><i class="fa fa-times"> </i>
                  <span class="mobile-menu-close f_nanum font-w700 font-s22">메뉴 닫기</span>
                </a>
              </div>
            </li>
          <?php
            $az = 0;
            for ($i=1; $i < $menu_cnt; $i++) {

              if(!$menu[$i]['gr_id']) continue;

              // 줄나눔
              if($az && $az%$is_allm == 0) {
                echo '</ul><ul>'.PHP_EOL;
              }
          ?>
          <li class="dept1-item <?php echo $menu[$i]['on'];?>">
            <a class="dept1-link menu-a font-s22 collapse" href="<?php echo $menu[$i]['href'];?>"<?php echo $menu[$i]['target'];?>>
              <?php echo $menu[$i]['name'];?>
              <?php if($menu[$i]['new'] == "new") { ?>
                <i class="fa fa-bolt new"></i>
              <?php } ?>
            </a>
            <?php if($menu[$i]['is_sub']) { //Is Sub Menu ?>
              <div class="sub-1div">
                <ul class="sub-1dul">
                <?php for($j=0; $j < count($menu[$i]['sub']); $j++) { ?>

                  <?php if($menu[$i]['sub'][$j]['line']) { //구분라인 ?>
                    <li class="sub-1line"><a><?php echo $menu[$i]['sub'][$j]['line'];?></a></li>
                  <?php } ?>

                <li class="sub-1dli font-s18 <?php echo $menu[$i]['sub'][$j]['on'];?>">
                  <a href="<?php echo $menu[$i]['sub'][$j]['href'];?>" class="sub-1da<?php echo ($menu[$i]['sub'][$j]['is_sub']) ? ' sub-icon' : '';?>"<?php echo $menu[$i]['sub'][$j]['target'];?>>
                    <?php echo $menu[$i]['sub'][$j]['name'];?>
                    <?php if($menu[$i]['sub'][$j]['new'] == "new") { ?>
                      <i class="fa fa-bolt sub-1new"></i>
                    <?php } ?>
                  </a>
                </li>
                <?php } //for ?>
              </ul>
            <!-- </div> -->
            <?php } ?>
          </li>
        <?php $az++; } //for ?>
          <!-- <li class="menu-all-btn">
            <div class="">
              <a href="javascript:;" class="mobile-menu-close-btn menu-a point-color03" data-toggle="collapse" data-target="#menu-all"><i class="fa fa-times"> </i>
                <span class="mobile-menu-close f_nanum font-w700 font-s22">메뉴 닫기</span>
              </a>
            </div>
          </li> -->
          <li class="menu-all-bottom-btn ">
            <div class="point-color05">
              <h4 class="font-s16">상담문의 : 031-962-8070</h4>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div><!-- .pc-menu-all -->
