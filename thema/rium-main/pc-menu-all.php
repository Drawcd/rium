<!-- PC All Menu -->
<div class="">
  <div id="pc-menu-all" class="pc-menu-all-grep">
    <div class="at-container table-responsive">
      <table class="table">
      <tr>
      <?php
        $az = 0;
        for ($i=1; $i < $menu_cnt; $i++) {

          if(!$menu[$i]['gr_id']) continue;

          // 줄나눔
          if($az && $az%$is_allm == 0) {
            echo '</tr><tr>'.PHP_EOL;
          }
      ?>
        <td class="<?php echo $menu[$i]['on'];?>">
          <a class="menu-a" href="<?php echo $menu[$i]['href'];?>"<?php echo $menu[$i]['target'];?>>
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

                <li class="sub-1dli <?php echo $menu[$i]['sub'][$j]['on'];?>">
                  <a href="<?php echo $menu[$i]['sub'][$j]['href'];?>" class="sub-1da<?php echo ($menu[$i]['sub'][$j]['is_sub']) ? ' sub-icon' : '';?>"<?php echo $menu[$i]['sub'][$j]['target'];?>>
                    <?php echo $menu[$i]['sub'][$j]['name'];?>
                    <?php if($menu[$i]['sub'][$j]['new'] == "new") { ?>
                      <i class="fa fa-bolt sub-1new"></i>
                    <?php } ?>
                  </a>
                </li>
              <?php } //for ?>
              </ul>
            </div>
          <?php } ?>
        </td>
      <?php $az++; } //for ?>
      </tr>
      </table>
    </div>
  </div>
</div><!-- .pc-menu-all -->
