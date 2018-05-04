<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<style>
body {
	background-color: #f0f0f0;
}
.required, textarea.required {background:url('../img/wrest.gif') #fff top right no-repeat !important}
</style>

<!-- Modernizr JS -->
<script src="<?php echo $member_skin_url;?>/js/modernizr-2.6.2.min.js"></script>
<!-- FOR IE9 below -->
<!--[if lt IE 9]>
<script src="<?php echo $member_skin_url;?>/js/respond.min.js"></script>
<![endif]-->


<!-- 회원정보 찾기 시작 { -->
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<!-- Start Sign In Form -->
			<form name="fpasswordlost" action="<?php echo $action_url ?>" onsubmit="return fpasswordlost_submit(this);" method="post" autocomplete="off" class="mem-form animate-box" data-animate-effect="fadeIn">
				<h2>Forgot Password</h2>
				<!--div class="form-group">
					<div class="alert alert-success" role="alert">Your email has been sent.</div>
				</div-->
				<div class="form-group">
					<label for="mb_email" class="sr-only">Email</label>
					<input type="email" class="form-control email required" name="mb_email" id="mb_email" required placeholder="Email" autocomplete="off">
				</div>
				<div class="form-group">
					<?php echo captcha_html();  ?>
				</div>
				<div class="form-group">
					<p><a href="<?php echo G5_BBS_URL ?>/login.php">Sign In</a> or <a href="javascript:register_check();">Sign Up</a></p>
				</div>
				<div class="form-group">
					<input type="submit" value="회원정보 찾기" class="btn btn-primary">
				</div>
			</form>
			<!-- END Sign In Form -->


		</div>
	</div>
	<div class="row" style="padding-top: 20px; clear: both;">
		<div class="col-md-12 text-center"><p><a href="<?php echo G5_URL ?>">메인으로 돌아가기</a></p></div>
	</div>
</div>

<form name="form_temp" method="post">
<input type="hidden" name="agree" value="1">
<input type="hidden" name="agree2" value="1">
</form>
<!-- Placeholder -->
<script src="<?php echo $member_skin_url;?>/js/jquery.placeholder.min.js"></script>
<!-- Waypoints -->
<script src="<?php echo $member_skin_url;?>/js/jquery.waypoints.min.js"></script>
<!-- Main JS -->
<script src="<?php echo $member_skin_url;?>/js/main.js"></script>

<script>
function fpasswordlost_submit(f)
{
    <?php echo chk_captcha_js();  ?>

    return true;
}

function register_check(){

	var temp_form = document.form_temp;
	temp_form.action = g5_bbs_url+"/register_form.php";
	temp_form.submit();

}

$(function() {
    var sw = screen.width;
    var sh = screen.height;
    var cw = document.body.clientWidth;
    var ch = document.body.clientHeight;
    var top  = sh / 2 - ch / 2 - 100;
    var left = sw / 2 - cw / 2;
    moveTo(left, top);
});
</script>
<!-- } 회원정보 찾기 끝 -->
