<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

// 메시지 체크
if(isset($wset['cnt']) && $wset['cnt'] > 0) {

	$is_msg = false;
	for($i=1; $i <= $wset['cnt']; $i++) {
		$msg = trim($wset['t'.$i]);
		if($msg) {
			$is_msg = true;
			break;
		}
	}

	// 메시지 출력
	if($is_msg) {
		//add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
		add_stylesheet('<link rel="stylesheet" href="'.$widget_url.'/widget.css" media="screen">', 0);

		$color = (isset($wset['color']) && $wset['color']) ? $wset['color'] : 'red';
		$line = (isset($wset['line']) && $wset['line']) ? $wset['line'] : '';
		$tabs = ($line) ? ' tabs-'.$line.'-top' : ' trans-top';
		$sp = (isset($wset['sp']) && $wset['sp']) ? '' : ' is-tab';
		$open = (isset($wset['open']) && $wset['open']) ? $wset['open'] : 1;

		$widget_id = apms_id();
?>
		<style>
			#<?php echo $widget_id;?>_msg_tab .nav .active b { color:<?php echo apms_color($color);?>;}
		</style>
		<div id="<?php echo $widget_id;?>_msg_tab" class="div-tab tabs<?php echo $tabs;?> widget-msg-basic<?php echo $sp;?>" role="tabpanel">
			<div class="tab-head bg-light">
				<ul class="nav nav-tabs<?php echo ($sp) ? '' : ' nav-justified';?>" role="tablist">
				<?php
					$z = 1;
					for($i=1; $i <= $wset['cnt']; $i++) {

						if(!trim($wset['t'.$i])) continue;
				?>
					<li<?php echo ($open == $i) ? ' class="active"' : '';?>>
						<a href="#<?php echo $widget_id;?>_msg_<?php echo $z;?>" aria-controls="<?php echo $widget_id;?>_msg_<?php echo $z;?>" role="tab" data-toggle="tab"><b><?php echo $wset['t'.$i];?></b></a>
					</li>
				<?php $z++; } ?>
				</ul>
			</div>
			<div class="tab-content">
				<?php
				$z = 1;
				for($i=1; $i <= $wset['cnt']; $i++) {

					if(!trim($wset['t'.$i])) continue;

				?>
					<div role="tabpanel" class="tab-pane<?php echo ($open == $i) ? ' active' : '';?>" id="<?php echo $widget_id;?>_msg_<?php echo $z;?>">
						<?php echo apms_content($wset['m'.$i], false); ?>
					</div>
				<?php $z++; } ?>
			</div>
		</div>
	<?php } ?>
<?php } ?>

<?php if($setup_href) { ?>
	<div class="btn-wset text-center p10">
		<a href="<?php echo $setup_href;?>" class="win_memo">
			<span class="text-muted font-12"><i class="fa fa-cog"></i> 설정하기</span>
		</a>
	</div>
<?php } ?>
