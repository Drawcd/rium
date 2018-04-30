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

<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
<script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
<?php } ?>

<!-- Modernizr JS -->
<script src="<?php echo $member_skin_url;?>/js/modernizr-2.6.2.min.js"></script>
<!-- FOR IE9 below -->
<!--[if lt IE 9]>
<script src="<?php echo $member_skin_url;?>/js/respond.min.js"></script>
<![endif]-->


<!-- 회원정보 입력/수정 시작 { -->
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<!-- Start Sign In Form -->
			<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" class="mem-form animate-box" data-animate-effect="fadeIn">
			<input type="hidden" name="w" value="<?php echo $w ?>">
			<input type="hidden" name="url" value="<?php echo $urlencode ?>">
			<input type="hidden" name="agree" value="<?php echo $agree ?>">
			<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
			<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
			<input type="hidden" name="cert_no" value="">
			<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
			<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
			<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
			<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
			<?php }  ?>
			<input type="hidden" name="mb_open_default" value="<?php echo $member['mb_open'] ?>">
			<input type="hidden" name="mb_open" value="<?php echo $member['mb_open'] ?>">
				<h2>Sign Up</h2>
				<!--div class="form-group">
					<div class="alert alert-success" role="alert">Your info has been saved.</div>
				</div-->
				<div class="form-group">
					<label for="reg_mb_name" class="sr-only">이름</label>
					<?php if ($config['cf_cert_use']) { ?>
					<span class="frm_info">아이핀 본인확인 후에는 이름이 자동 입력되고 휴대폰 본인확인 후에는 이름과 휴대폰번호가 자동 입력되어 수동으로 입력할수 없게 됩니다.</span>
					<?php } ?>
					<input type="text" class="form-control <?php echo $required ?> <?php echo $readonly ?>" name="mb_name" id="reg_mb_name" value="<?php echo get_text($member['mb_name']) ?>" <?php echo $required ?> <?php echo $readonly; ?> placeholder="이름" autocomplete="off">
					<?php
					if($config['cf_cert_use']) {
						if($config['cf_cert_ipin'])
							echo '<button type="button" id="win_ipin_cert" class="btn_frmline">아이핀 본인확인</button>'.PHP_EOL;
						if($config['cf_cert_hp'])
							echo '<button type="button" id="win_hp_cert" class="btn_frmline">휴대폰 본인확인</button>'.PHP_EOL;

						echo '<noscript>본인확인을 위해서는 자바스크립트 사용이 가능해야합니다.</noscript>'.PHP_EOL;
					}
					?>
					<?php
					if ($config['cf_cert_use'] && $member['mb_certify']) {
						if($member['mb_certify'] == 'ipin')
							$mb_cert = '아이핀';
						else
							$mb_cert = '휴대폰';
					?>
					<div id="msg_certify">
						<strong><?php echo $mb_cert; ?> 본인확인</strong><?php if ($member['mb_adult']) { ?> 및 <strong>성인인증</strong><?php } ?> 완료
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="mb_id" class="sr-only">아이디</label>
					<input type="text" class="form-control <?php echo $required ?> <?php echo $readonly ?>" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $required ?> <?php echo $readonly ?> placeholder="아이디" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="reg_mb_password" class="sr-only">비밀번호</label>
					<input type="password" class="form-control <?php echo $required ?>" name="mb_password" id="reg_mb_password" <?php echo $required ?> placeholder="비밀번호" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="reg_mb_password_re" class="sr-only">비밀번호 확인</label>
					<input type="password" class="form-control <?php echo $required ?>" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> placeholder="비밀번호 확인" autocomplete="off">
				</div>
				<?php if ($req_nick) {  ?>
				<div class="form-group">
					<label for="reg_mb_nick" class="sr-only">닉네임</label>
					<input type="text" class="form-control required nospace" name="mb_nick" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>" id="reg_mb_nick" required placeholder="닉네임" autocomplete="off">
					<span id="msg_mb_nick"></span>
					<input type="hidden" name="mb_nick_default" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>">
				</div>
				<?php }  ?>
				<div class="form-group">
					<label for="reg_mb_email" class="sr-only">Email</label>
					<?php if ($config['cf_use_email_certify']) {  ?>
					<span class="frm_info">
						<?php if ($w=='') { echo "E-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; }  ?>
						<?php if ($w=='u') { echo "E-mail 주소를 변경하시면 다시 인증하셔야 합니다."; }  ?>
					</span>
					<?php }  ?>
					<input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
					<input type="email" class="form-control email required" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required placeholder="Email" autocomplete="off">
				</div>
				<?php if ($config['cf_use_homepage']) {  ?>
				<div class="form-group">
					<label for="reg_mb_homepage" class="sr-only">홈페이지</label>
					<input type="text" class="form-control <?php echo $config['cf_req_homepage']?"required":""; ?>" name="mb_homepage" value="<?php echo get_text($member['mb_homepage']) ?>" id="reg_mb_homepage" <?php echo $config['cf_req_homepage']?"required":""; ?> placeholder="홈페이지" autocomplete="off">
				</div>
				<?php }  ?>
				<?php if ($config['cf_use_tel']) {  ?>
				<div class="form-group">
					<label for="reg_mb_tel" class="sr-only">전화번호</label>
					<input type="text" class="form-control <?php echo $config['cf_req_tel']?"required":""; ?>" name="mb_tel" value="<?php echo get_text($member['mb_tel']) ?>" id="reg_mb_tel" <?php echo $config['cf_req_tel']?"required":""; ?> placeholder="전화번호" autocomplete="off">
				</div>
				<?php }  ?>
				<?php if ($config['cf_use_hp'] || $config['cf_cert_hp']) {  ?>
				<div class="form-group">
					<label for="reg_mb_hp" class="sr-only">휴대폰번호</label>
					<input type="text" class="form-control <?php echo ($config['cf_req_hp'])?"required":""; ?>" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> placeholder="휴대폰번호" autocomplete="off">
					<?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
					<input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
					<?php } ?>
				</div>
				<?php }  ?>
				<?php if ($config['cf_use_addr']) { ?>
				<div class="form-group">
					<label for="name" class="sr-only">우편번호</label>
					<input type="text" class="form-control <?php echo $config['cf_req_addr']?"required":""; ?>" name="mb_zip" value="<?php echo $member['mb_zip1'].$member['mb_zip2']; ?>" id="reg_mb_zip" <?php echo $config['cf_req_addr']?"required":""; ?> placeholder="우편번호" autocomplete="off" onclick="win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">
					<input type="text" class="form-control frm_address <?php echo $config['cf_req_addr']?"required":""; ?>" name="mb_addr1" value="<?php echo get_text($member['mb_addr1']) ?>" id="reg_mb_addr1" <?php echo $config['cf_req_addr']?"required":""; ?> placeholder="기본주소" autocomplete="off">
					<input type="text" class="form-control frm_address" name="mb_addr2" value="<?php echo get_text($member['mb_addr2']) ?>" id="reg_mb_addr2" placeholder="상세주소" autocomplete="off">
					<input type="text" class="form-control frm_address" name="mb_addr3" value="<?php echo get_text($member['mb_addr3']) ?>" id="reg_mb_addr3" placeholder="참고항목" autocomplete="off">
					<input type="hidden" name="mb_addr_jibeon" value="<?php echo get_text($member['mb_addr_jibeon']); ?>">
				</div>
				<?php }  ?>
				<?php if ($config['cf_use_signature']) {  ?>
				<div class="form-group">
					<label for="reg_mb_signature" class="sr-only">서명</label>
					<input type="text" class="form-control <?php echo $config['cf_req_signature']?"required":""; ?>" name="mb_signature" value="<?php echo $member['mb_signature'] ?>" id="reg_mb_signature" <?php echo $config['cf_req_signature']?"required":""; ?> placeholder="서명" autocomplete="off">
				</div>
				<?php }  ?>
				<?php if ($config['cf_use_profile']) {  ?>
				<div class="form-group">
					<label for="reg_mb_profile" class="sr-only">자기소개</label>
					<input type="text" class="form-control <?php echo $config['cf_req_profile']?"required":""; ?>" name="mb_profile" value="<?php echo $member['mb_profile'] ?>" id="reg_mb_profile" <?php echo $config['cf_req_profile']?"required":""; ?> placeholder="자기소개" autocomplete="off">
				</div>
				<?php }  ?>
				<?php if ($config['cf_use_member_icon'] && $member['mb_level'] >= $config['cf_icon_level']) {  ?>
				<div class="form-group">
					<label for="reg_mb_icon" class="sr-only">회원아이콘</label>
					<span class="frm_info">
						이미지 크기는 가로 <?php echo $config['cf_member_icon_width'] ?>픽셀, 세로 <?php echo $config['cf_member_icon_height'] ?>픽셀 이하로 해주세요.<br>
						gif만 가능하며 용량 <?php echo number_format($config['cf_member_icon_size']) ?>바이트 이하만 등록됩니다.
					</span>
					<input type="file" name="mb_icon" id="reg_mb_icon" class="form-control">
					<?php if ($w == 'u' && file_exists($mb_icon_path)) {  ?>
					<img src="<?php echo $mb_icon_url ?>" alt="회원아이콘">
					<input type="checkbox" name="del_mb_icon" value="1" id="del_mb_icon">
					<label for="del_mb_icon">삭제</label>
					<?php }  ?>
				</div>
				<?php }  ?>
				<div class="form-group">
					<label for="reg_mb_mailling"><input type="checkbox" name="mb_mailling" value="1" id="reg_mb_mailling" <?php echo ($w=='' || $member['mb_mailling'])?'checked':''; ?>> 정보 메일을 받겠습니다.</label>
				</div>
				<?php if ($config['cf_use_hp']) {  ?>
				<div class="form-group">
					<label for="reg_mb_sms"><input type="checkbox" name="mb_sms" value="1" id="reg_mb_sms" <?php echo ($w=='' || $member['mb_sms'])?'checked':''; ?>> 휴대폰 문자메세지를 받겠습니다.</label>
				</div>
				<?php }  ?>
				<?php if ($w == "" && $config['cf_use_recommend']) {  ?>
				<div class="form-group">
					<label for="reg_mb_recommend" class="sr-only">추천인아이디</label>
					<input type="text" class="form-control" name="mb_recommend" id="reg_mb_recommend" placeholder="추천인아이디" autocomplete="off">
				</div>
				<?php }  ?>
				<div class="form-group">
					<label for="name" class="sr-only">자동등록방지</label>
					<?php echo captcha_html(); ?>
				</div>
				<div class="form-group">
					<p>Already registered? <a href="<?php echo G5_BBS_URL ?>/login.php">Sign In</a></p>
				</div>
				<div class="form-group">
					<input type="submit" value="<?php echo $w==''?'회원가입':'정보수정'; ?>" id="btn_submit" class="btn btn-primary">
				</div>
			</form>
			<!-- END Sign In Form -->

		</div>
	</div>
	<div class="row" style="padding-top: 20px; clear: both;">
		<div class="col-md-12 text-center"><p><a href="<?php echo G5_URL ?>">메인으로 돌아가기</a></p></div>
	</div>
</div>
<!-- } 회원정보 입력/수정 끝 -->

<script>
    $(function() {
        $("#reg_zip_find").css("display", "inline-block");

        <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
        // 아이핀인증
        $("#win_ipin_cert").click(function() {
            if(!cert_confirm())
                return false;

            var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
            certify_win_open('kcb-ipin', url);
            return;
        });

        <?php } ?>
        <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
        // 휴대폰인증
        $("#win_hp_cert").click(function() {
            if(!cert_confirm())
                return false;

            <?php
            switch($config['cf_cert_hp']) {
                case 'kcb':
                    $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                    $cert_type = 'kcb-hp';
                    break;
                case 'kcp':
                    $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                    $cert_type = 'kcp-hp';
                    break;
                case 'lg':
                    $cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
                    $cert_type = 'lg-hp';
                    break;
                default:
                    echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                    echo 'return false;';
                    break;
            }
            ?>

            certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
            return;
        });
        <?php } ?>
    });

    // submit 최종 폼체크
    function fregisterform_submit(f)
    {
        // 회원아이디 검사
        if (f.w.value == "") {
            var msg = reg_mb_id_check();
            if (msg) {
                alert(msg);
                f.mb_id.select();
                return false;
            }
        }

        if (f.w.value == "") {
            if (f.mb_password.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password.focus();
                return false;
            }
        }

        if (f.mb_password.value != f.mb_password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            f.mb_password_re.focus();
            return false;
        }

        if (f.mb_password.value.length > 0) {
            if (f.mb_password_re.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password_re.focus();
                return false;
            }
        }

        // 이름 검사
        if (f.w.value=="") {
            if (f.mb_name.value.length < 1) {
                alert("이름을 입력하십시오.");
                f.mb_name.focus();
                return false;
            }

            /*
            var pattern = /([^가-힣\x20])/i;
            if (pattern.test(f.mb_name.value)) {
                alert("이름은 한글로 입력하십시오.");
                f.mb_name.select();
                return false;
            }
            */
        }

        <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
        // 본인확인 체크
        if(f.cert_no.value=="") {
            alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
            return false;
        }
        <?php } ?>

        // 닉네임 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
            var msg = reg_mb_nick_check();
            if (msg) {
                alert(msg);
                f.reg_mb_nick.select();
                return false;
            }
        }

        // E-mail 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
            var msg = reg_mb_email_check();
            if (msg) {
                alert(msg);
                f.reg_mb_email.select();
                return false;
            }
        }

        <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
        // 휴대폰번호 체크
        var msg = reg_mb_hp_check();
        if (msg) {
            alert(msg);
            f.reg_mb_hp.select();
            return false;
        }
        <?php } ?>

        if (typeof f.mb_icon != "undefined") {
            if (f.mb_icon.value) {
                if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
                    alert("회원아이콘이 gif 파일이 아닙니다.");
                    f.mb_icon.focus();
                    return false;
                }
            }
        }

        if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
            if (f.mb_id.value == f.mb_recommend.value) {
                alert("본인을 추천할 수 없습니다.");
                f.mb_recommend.focus();
                return false;
            }

            var msg = reg_mb_recommend_check();
            if (msg) {
                alert(msg);
                f.mb_recommend.select();
                return false;
            }
        }

        <?php echo chk_captcha_js();  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
</script>


<!-- Placeholder -->
<script src="<?php echo $member_skin_url;?>/js/jquery.placeholder.min.js"></script>
<!-- Waypoints -->
<script src="<?php echo $member_skin_url;?>/js/jquery.waypoints.min.js"></script>
<!-- Main JS -->
<script src="<?php echo $member_skin_url;?>/js/main.js"></script>