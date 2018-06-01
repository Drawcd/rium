<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(THEMA_PATH.'/assets/thema.php');
?>

<div id="thema_wrapper" class="wrapper <?php echo $is_thema_layout;?> <?php echo $is_thema_font;?>">

	<!-- LNB -->
	<aside class="at-lnb">
		<div class="at-container">
			<div class="clearfix"></div>
		</div>
	</aside>


	<!-- Mobile Header -->
	<header class="m-header">
		<div class="at-container">
			<div class="header-wrap">
				<div class="header-icon">
					<a href="javascript:;" class="mobile-menu-open-btn" >
						<i class="fa fa-bars"></i>
					</a>
				</div>
				<div class="header-logo en">
					<!-- Mobile Logo -->
					<a href="<?php echo $at_href['home'];?>">
						<div class="nav-logo-mobile">
							<img src="/img/de-logo.png" alt=""/>
						</div>
					</a>
				</div>
				<div class="header-icon">
					<a href="javascript:;" onclick="sidebar_open('sidebar-search');">
						<i class="fa fa-search"></i>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</header>

	<!-- Menu -->
  <!-- <div class="at-menu-bg-margin"></div> -->
	<nav class="at-menu">
		<!-- PC Menu -->
		<div class="pc-menu navigation-bg-color">
			<!-- Menu Button & Right Icon Menu -->
			<div class="at-container">
				<div class="nav-right nav-rw nav-height">
					<ul>
						<?php if ($is_admin) { ?>
							<li>
								<a href="javascript:;" onclick="sidebar_open('sidebar-search');"<?php echo tooltip('검색');?>>
									<i class="fa fa-search"></i>
								</a>
							</li>
						<li class="menu-all-icon"<?php echo tooltip('전체메뉴');?>>
							<a href="javascript:;" class="pc-menu-open-btn" data-toggle="collapse" data-target="#menu-all">
								<i class="fa fa-th"></i>
							</a>
						</li>
						<?php } ?>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php include_once(THEMA_PATH.'/menu.php');	// 메뉴 불러오기 ?>
			<div class="clearfix"></div>
			<div class="nav-back"></div>
		</div><!-- .pc-menu -->

    <!-- PC All Menu Start -->
		<?php include_once(THEMA_PATH.'/mobile_menu.php');	// 메뉴 불러오기 ?>
		<!-- PC All Menu End -->

		<!-- Mobile Menu -->
	</nav><!-- .at-menu -->

	<div class="clearfix"></div>

	<?php if($page_title) { // 페이지 타이틀 ?>
		<div class="at-title">
			<!-- <div class="pc-menu"></div> -->
			<div class="at-container">
				<div class="page-title en">
					<span<?php echo ($bo_table) ? " class=\"cursor\" onclick=\"go_page('".G5_BBS_URL."/board.php?bo_table=".$bo_table."');\"" : "";?>>
						<?php echo $page_title;?>
					</span>
				</div>
				<?php if($page_desc) { // 페이지 설명글 ?>
					<div class="page-desc">
						<p>
						<?php echo $page_desc;?>
						</p>
					</div>
				<?php } ?>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php } ?>

	<div class="at-body">
		<?php if($col_name) { ?>
			<div class="at-container">
			<?php if($col_name == "two") { ?>
				<div class="row at-row">
					<div class="col-md-<?php echo $col_content;?><?php echo ($at_set['side']) ? ' pull-right' : '';?> at-col at-main">
			<?php } else { ?>
				<div class="at-content">
			<?php } ?>
		<?php } ?>
