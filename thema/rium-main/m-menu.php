<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<!-- Mobile Header -->
<header class="m-header">
	<div class="at-container">
		<div class="header-wrap">
			<div class="header-icon">
				<a href="javascript:;" onclick="sidebar_open('sidebar-menu');">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="header-logo en">
				<!-- Mobile Logo -->
				<a href="<?php echo $at_href['home'];?>">
					<img src="<?php echo G5_URL;?>/img/de-logo.png" width="72px;"></img>
				</a>
			</div>
			<?php if ($is_admin) { ?>
				<div class="header-icon">
					<a href="javascript:;" onclick="sidebar_open('sidebar-user');">
						<i class="fa fa-user"></i>
					</a>
				</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
</header>
<div class="clearfix"></div>
