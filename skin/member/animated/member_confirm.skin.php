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

<!-- 회원 비밀번호 확인 시작 { -->
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<!-- Start Sign In Form -->
			<form name="fmemberconfirm" action="<?php echo $url ?>" onsubmit="return fmemberconfirm_submit(this);" method="post" class="mem-form animate-box" data-animate-effect="fadeIn">
			<input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
			<input type="hidden" name="w" value="u">
				<h2>Password Confirmation</h2>
				<div class="form-group">
					<div class="alert alert-success" role="alert">
					<strong>비밀번호를 한번 더 입력해주세요.</strong>
					<?php if ($url == 'member_leave.php') { ?>
					비밀번호를 입력하시면 회원탈퇴가 완료됩니다.
					<?php }else{ ?>
					회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다.
					<?php }  ?>
					</div>
				</div>
				<div class="form-group">
					<p>회원아이디 : <?php echo $member['mb_id'] ?></p>
				</div>
				<div class="form-group">
					<label for="confirm_mb_password" class="sr-only">Password</label>
					<input type="password" class="form-control required" name="mb_password" id="confirm_mb_password" required placeholder="Password" autocomplete="off">
				</div>
				<div class="form-group">
					<input type="submit" id="btn_submit" value="확인" class="btn btn-primary">
				</div>
			</form>
			<!-- END Sign In Form -->

		</div>
	</div>
	<div class="row" style="padding-top: 20px; clear: both;">
		<div class="col-md-12 text-center"><p><a href="<?php echo G5_URL ?>">메인으로 돌아가기</a></p></div>
	</div>
</div>

<!-- Placeholder -->
<script src="<?php echo $member_skin_url;?>/js/jquery.placeholder.min.js"></script>
<!-- Waypoints -->
<script src="<?php echo $member_skin_url;?>/js/jquery.waypoints.min.js"></script>
<!-- Main JS -->
<script src="<?php echo $member_skin_url;?>/js/main.js"></script>

<script>
function fmemberconfirm_submit(f)
{
    document.getElementById("btn_submit").disabled = true;

    return true;
}
</script>
<!-- } 회원 비밀번호 확인 끝 -->