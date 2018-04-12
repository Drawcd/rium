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
  <div class="at-menu-bg-margin"></div>
	<nav class="at-menu">
		<!-- PC Menu -->
		<div class="pc-menu bc-white">
			<!-- Menu Button & Right Icon Menu -->
			<div class="at-container">
				<div class="nav-right nav-rw nav-height">
					<ul>
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
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php include_once(THEMA_PATH.'/menu.php');	// 메뉴 불러오기 ?>
			<div class="clearfix"></div>
			<div class="nav-back"></div>
		</div><!-- .pc-menu -->

		<!-- PC All Menu -->
		<div class="pc-menu-all">
			<!-- <div id="menu-all" class="collapse"> -->
			<div id="mobile-menu" class="">
				<div class="mobile-container mobile-menu-responsive">
					<div class="mobile-menu">
							<ul class="dept1-wrap f_nanum">
								<li class="menu-all-btn">
									<div class="padding-20 menu-a">
										<ul>
											<li class="mobile-menu-open-logo">
												<img src="/img/de-logo.png" width="180px" alt="">
											</li>
										</ul>
									</div>
								</li>
								<!-- <li class="menu-all-btn">
									<div class="padding-20 bc-orange">
										<a href="javascript:;" class="mobile-menu-close-btn" data-toggle="collapse" data-target="#menu-all"><i class="fa fa-times"> </i>
											<span class="mobile-menu-close f_nanum font-w700 font-s22">메뉴 닫기</span>
										</a>
									</div>
								</li> -->
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
								<a class="dept1-link menu-a font-s22 " href="<?php echo $menu[$i]['href'];?>"<?php echo $menu[$i]['target'];?>>
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
								<div class="">
									<a href="javascript:;" class="mobile-menu-close-btn menu-a point-color03" data-toggle="collapse" data-target="#menu-all"><i class="fa fa-times"> </i>
										<span class="mobile-menu-close f_nanum font-w700 font-s22">메뉴 닫기</span>
									</a>
								</div>
								<div class="">
									<h4 class="f_nanum font-s16">상담문의 : 031-962-8070</h4>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- .pc-menu-all -->

		<!-- Mobile Menu -->
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
