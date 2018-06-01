<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
		<?php if($col_name) { ?>
			<?php if($col_name == "two") { ?>
					</div>
					<div class="col-md-<?php echo $col_side;?><?php echo ($at_set['side']) ? ' pull-left' : '';?> at-col at-side">
						<?php include_once($is_side_file); // Side ?>
					</div>
				</div>
			<?php } else { ?>
				</div><!-- .at-content -->
			<?php } ?>
			</div><!-- .at-container -->
		<?php } ?>
	</div><!-- .at-body -->


	<div id="sectiontail" class="point-color10">
	  <div class="at-container widget-index">
	    <?php echo apms_widget('rium-page-include', $wid.'-main-tail-top'); ?>
	  </div>
	</div>


	<?php if(!$is_main_footer) { ?>
		<footer class="at-footer point-color05">
			<nav class="at-links">
				<div class="at-container">
					<ul class="pull-left bottom-openmenu-left">
						<li class="<?php echo $is_hide_intro;?>"><a href="<?php echo G5_BBS_URL;?>/page.php?hid=intro">사이트 소개</a></li>
						<li class="<?php echo $is_hide_provision;?>"><a href="<?php echo G5_BBS_URL;?>/page.php?hid=provision">이용약관</a></li>
						<li class="<?php echo $is_hide_privacy;?>"><a href="<?php echo G5_BBS_URL;?>/page.php?hid=privacy">개인정보처리방침</a></li>
						<li class="<?php echo $is_hide_noemail;?>"><a href="<?php echo G5_BBS_URL;?>/page.php?hid=noemail">이메일 무단수집거부</a></li>
						<li class="<?php echo $is_hide_disclaimer;?>"><a href="<?php echo G5_BBS_URL;?>/page.php?hid=disclaimer">책임의 한계와 법적고지</a></li>
					</ul>
					<ul class="pull-right bottom-openmenu-right">
						<!-- <li class=""><a href="<?php // echo G5_BBS_URL;?>/page.php?hid=guide">이용안내</a></li> -->
						<!-- <li class=""><a href="<?php // echo $at_href['secret'];?>">문의하기</a></li> -->
						<?php if ($is_admin) { ?><li class=""><a href="<?php echo $as_href['pc_mobile'];?>"><?php echo (G5_IS_MOBILE) ? 'PC' : '모바일';?>버전</a></li><?php } ?>
					</ul>
					<div class="clearfix"></div>
				</div>
			</nav>
			<div class="at-infos">
				<div class="at-container">
					<?php if(IS_YC) { // YC5 ?>
						<div class="media">
							<div class="pull-right hidden-xs">
								<!-- 하단 우측 아이콘 -->
							</div>
							<!-- <div class="pull-left hidden-xs bottom-logo"> -->
								<!-- 하단 좌측 로고 -->
								<!-- <a href="/"><img src="/img/de-logo.png" alt="" title=""></a> -->
							<!-- </div> -->
							<div class="media-body">
								<ul class="at-about hidden-xs bottom-openmenu-contact">
									<li><b><?php echo $default['de_admin_company_name']; ?></b></li>
									<li>대표 : <?php echo $default['de_admin_company_owner']; ?></li>
									<li><?php echo $default['de_admin_company_addr']; ?></li>
									<li class="<?php echo $is_hide_tel;?>">전화 : <span><?php echo $default['de_admin_company_tel']; ?></span></li>
									<li>사업자등록번호 : <span><?php echo $default['de_admin_company_saupja_no']; ?></span></li>
									<li class="<?php echo $is_hide_contactus;?>"><a href="http://www.ftc.go.kr/info/bizinfo/communicationList.jsp" target="_blank">사업자정보확인</a></li>
									<li class="<?php echo $is_hide_mailbusiness;?>">통신판매업신고 : <span><?php echo $default['de_admin_tongsin_no']; ?></span></li>
									<li>개인정보관리책임자 : <?php echo $default['de_admin_info_name']; ?></li>
									<li>이메일 : <span><?php echo $default['de_admin_info_email']; ?></span></li>
									<li class="copyright">
										<strong><?php echo $config['cf_title'];?> <i class="fa fa-copyright"></i></strong>
										<span>All rights reserved.</span>
									</li>
								</ul>
								<!-- <div class="clearfix"></div> -->
								<div class="clearfix"></div>
							</div>
						</div>
					<?php } else { // G5 ?>
						<div class="at-copyright">
							<i class="fa fa-leaf"></i>
							<strong><?php echo $config['cf_title'];?> <i class="fa fa-copyright"></i></strong>
							All rights reserved.
						</div>
					<?php } ?>
				</div>
			</div>
		</footer>
	<?php } ?>
</div><!-- .wrapper -->

<div class="at-go">
	<div id="go-btn" class="go-btn">
		<span class="go-top cursor"><i class="fa fa-chevron-up"></i></span>
		<span class="go-bottom cursor"><i class="fa fa-chevron-down"></i></span>
	</div>
</div>

<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/respond.js"></script>
<![endif]-->

<!-- JavaScript -->
<script>
var sub_show = "<?php echo $at_set['subv'];?>";
var sub_hide = "<?php echo $at_set['subh'];?>";
var menu_startAt = "<?php echo ($m_sat) ? $m_sat : 0;?>";
var menu_sub = "<?php echo $m_sub;?>";
var menu_subAt = "<?php echo ($m_subsat) ? $m_subsat : 0;?>";
</script>
<script src="<?php echo THEMA_URL;?>/assets/bs3/js/bootstrap.min.js"></script>
<script src="<?php echo THEMA_URL;?>/assets/js/sly.min.js"></script>
<script src="<?php echo THEMA_URL;?>/assets/js/custom.js"></script>
<?php if($is_sticky_nav) { ?>
<script src="<?php echo THEMA_URL;?>/assets/js/sticky.js"></script>
<?php } ?>

<?php echo apms_widget('basic-sidebar'); //사이드바 및 모바일 메뉴(UI) ?>

<?php if($is_designer || $is_demo) include_once(THEMA_PATH.'/assets/switcher.php'); //Style Switcher ?>


<!-- main-slider  -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'></script>
<!-- animate Start -->
<script>
$('.animate').scrolla({
  mobile: false,
  once: false
});
</script>
<!-- animate End -->
