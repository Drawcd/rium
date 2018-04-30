<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<style>
body {
	background-color: #f0f0f0;
}
</style>

<!-- Modernizr JS -->
<script src="<?php echo $member_skin_url;?>/js/modernizr-2.6.2.min.js"></script>
<!-- FOR IE9 below -->
<!--[if lt IE 9]>
<script src="<?php echo $member_skin_url;?>/js/respond.min.js"></script>
<![endif]-->

<!-- 로그인 시작 { -->
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<!-- Start Sign In Form -->
			<form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post" class="mem-form animate-box" data-animate-effect="fadeIn">
			<input class="logintitle" type="hidden" name="url" value="<?php echo $login_url ?>">
				<h2><?php echo $page_title;?></h2>
				<p><?php echo $page_desc;?></p>
				<div class="form-group">
					<label for="username" class="form-icon sr-only"><i class="fa fa-user-circle"></i></label>
					<input type="text" class="form-control" name="mb_id" id="login_id" required placeholder="회원아이디" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="password" class="form-icon sr-only"><i class="fas fa-key"></i></label>
					<input type="password" class="form-control" name="mb_password" id="login_pw" required placeholder="비밀번호" autocomplete="off">
				</div>
				<div class="form-group">
					<input type="checkbox" name="auto_login" id="login_auto_login"><label for="login_auto_login"></label><span class="auto_login_text">자동로그인</span>
				</div>
				<div class="form-group">
					<!--p>Not registered? <a href="javascript:register_check();">Sign Up</a> | <a href="<?php echo G5_BBS_URL ?>/password_lost.php">Forgot Password?</a></p-->
					<p><a class="col-md-5" href="javascript:register_check();">회원 가입</a><a class="col-md-7" href="<?php echo G5_BBS_URL ?>/password_lost.php">아이디 비밀번호 찾기</a></p>
				</div>
				<div class="form-group">
					<input type="submit" value="로그인" class="col-md-12">
				</div>
			</form>
			<!-- END Sign In Form -->

		</div>
	</div>
	<div class="row" style="padding-top: 30px; clear: both;">
		<div class="col-md-6 col-md-offset-3 text-center"><p><a href="<?php echo G5_URL ?>">메인으로 돌아가기</a></p></div>
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

$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    return true;
}

function register_check(){

	var temp_form = document.form_temp;
	temp_form.action = g5_bbs_url+"/register_form.php";
	temp_form.submit();

}
</script>
<!-- } 로그인 끝 -->
