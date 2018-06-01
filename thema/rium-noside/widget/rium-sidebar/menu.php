<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가
?>

<!-- Categroy -->
<div class="en sidebar-close mobile-menu-title">
	<i class="fa fa-arrow-left"></i><h4>MENU</h4>
</div>
<div class="sidebar-menu panel-group" id="<?php echo $menu_id;?>" role="tablist" aria-multiselectable="true">
	<div class="panel">
		<div class="ca-head">

				<a href="/" class="no-sub">
					<h5>메인으로</h5>
					<span class="pull-right">&nbsp;</span>
				</a>
		</div>
	</div>

	<?php
		for($i=1; $i < $menu_cnt; $i++) {
			$cate_id = $menu_id.'_c'.$i;
			$sub_id = $menu_id.'_s'.$i;
	?>
		<?php if($menu[$i]['is_sub']) { //서브메뉴가 있을 때 ?>
			<div class="panel">
				<div class="ca-head<?php echo ($menu[$i]['on'] == "on") ? ' active' : '';?>" role="tab" id="<?php echo $cate_id;?>">
					<a href="#<?php echo $sub_id;?>" data-toggle="collapse" data-parent="#<?php echo $menu_id;?>" aria-expanded="true" aria-controls="<?php echo $sub_id;?>" class="is-sub">
						<span class="ca-href pull-right" onclick="sidebar_href('<?php echo $menu[$i]['href']; ?>');">&nbsp;</span>
						<h5>
						<?php echo $menu[$i]['name']; ?>
						<?php echo ($menu[$i]['new'] == "new") ? $menu_new : '';?>
						</h5>
					</a>
				</div>
				<div id="<?php echo $sub_id;?>" class="panel-collapse collapse<?php echo ($menu[$i]['on'] == "on") ? ' in' : '';?>" role="tabpanel" aria-labelledby="<?php echo $cate_id;?>">
					<ul class="ca-sub">
					<?php for($j=0; $j < count($menu[$i]['sub']); $j++) { ?>
						<?php if($menu[$i]['sub'][$j]['line']) { //구분라인 ?>
							<li class="ca-line">
								<?php echo $menu[$i]['sub'][$j]['line'];?>
							</li>
						<?php } ?>
						<li<?php echo ($menu[$i]['sub'][$j]['on'] == "on") ? ' class="on"' : '';?>>
							<a href="<?php echo $menu[$i]['sub'][$j]['href'];?>"<?php echo $menu[$i]['sub'][$j]['target'];?>>
								<h5>
								<?php echo $menu[$i]['sub'][$j]['name']; ?>
								<?php echo ($menu[$i]['sub'][$j]['new'] == "new") ? $menu_new : '';?>
								</h5>
							</a>
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>
		<?php } else { ?>
			<div class="panel">
				<div class="ca-head<?php echo ($menu[$i]['on'] == "on") ? ' active' : '';?>" role="tab">
					<a href="<?php echo $menu[$i]['href'];?>"<?php echo $menu[$i]['target'];?> class="no-sub">
						<h5>
						<?php echo $menu[$i]['name'];?>
						<?php echo ($menu[$i]['new'] == "new") ? $menu_new : '';?>
						</h5>
					</a>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</div>
