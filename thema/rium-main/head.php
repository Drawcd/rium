<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(THEMA_PATH.'/assets/thema.php');
?>

<?php include_once(G5_PATH.'/include/main-logo-intro.php'); ?>

<!-- 그룹사 안내 -->
<?php include_once(G5_PATH.'/include/subsidiary.php'); ?>
<!-- 사이드메뉴 -->
<?php include_once(G5_PATH.'/include/side_menu_bar.php'); ?>


<div id="thema_wrapper" class="wrapper <?php echo $is_thema_layout;?> <?php echo $is_thema_font;?>">

	<!-- Mobile Menu Start 모바일메뉴-->
	<div class="m-menu">
		<?php include_once(THEMA_PATH.'/m-menu.php');	// 메뉴 불러오기 ?>
	</div>
	<!-- Mobile Menu End -->
	<!-- Menu -->
	<nav class="at-menu">
		<!-- PC Menu -->
		<div id="pc-menu-all" class="pc-menu navigation-bg-color section-group">
			<!-- Menu Button & Right Icon Menu -->


			<div class="">

				<div class="nav-right nav-rw nav-height">
					<?php if ($is_admin) { ?>
					<ul>
						<?php if(IS_YC) { //영카트 ?>
							<li class="nav-show">
								<a href="<?php echo $at_href['cart'];?>" onclick="sidebar_open('sidebar-cart'); return false;"<?php echo tooltip('쇼핑');?>>
									<i class="fa fa-shopping-bag"></i>
									<?php if($member['cart'] || $member['today']) { ?>
										<span class="label bg-green en">
											<?php echo number_format($member['cart'] + $member['today']);?>
										</span>
									<?php } ?>
								</a>
							</li>
						<?php } ?>
						<li>
							<a href="javascript:;" onclick="sidebar_open('sidebar-response');"<?php echo tooltip('알림');?>>
								<i class="fa fa-bell"></i>
								<span class="label bg-orangered en"<?php echo ($member['response'] || $member['memo']) ? '' : ' style="display:none;"';?>>
									<span class="msgCount"><?php echo number_format($member['response'] + $member['memo']);?></span>
								</span>
							</a>
						</li>
						<li>
							<a href="javascript:;" onclick="sidebar_open('sidebar-search');"<?php echo tooltip('검색');?>>
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="menu-all-icon"<?php echo tooltip('전체메뉴');?>>
							<a href="javascript:;" data-toggle="collapse" data-target="#menu-all">
								<i class="fa fa-th"></i>
							</a>
						</li>
					</ul>
					<?php } ?>
					<div class="clearfix"></div>
				</div>
			</div>


			<?php include_once(THEMA_PATH.'/menu.php');	// 메뉴 불러오기 ?>
			<div class="clearfix"></div>
			<div class="nav-back"></div>
		</div><!-- .pc-menu -->

	</nav><!-- .at-menu -->

	<div class="clearfix"></div>

	<?php if($page_title) { // 페이지 타이틀 ?>
		<div class="at-title">
			<div class="at-container">
				<div class="page-title en">
					<strong<?php echo ($bo_table) ? " class=\"cursor\" onclick=\"go_page('".G5_BBS_URL."/board.php?bo_table=".$bo_table."');\"" : "";?>>
						<?php echo $page_title;?>
					</strong>
				</div>
				<?php if($page_desc) { // 페이지 설명글 ?>
					<div class="page-desc hidden-xs">
						<?php echo $page_desc;?>
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
