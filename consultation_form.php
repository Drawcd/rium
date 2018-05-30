<form name="fwrite" method="post" onSubmit="return submitChk(this)";>
	<input type=hidden name=sca value="<?=$sca?>">
	<div id="consultation_form">
		<div class="consultation_form-title"><h2>상담신청</h2> <h3>contact</h3></div>
		<div class="ileft">이름</div>
		<div class="icenter">
	    <input type="text" name="wr_name" size="25" class="input1" itemname="이름" required placeholder="성명을 넣어주세요">
	    <!-- <input name=wr_name class="input1" itemname="이름" required> -->
	  </div>
		<div class="iright"></div>

		<div class="iclear"></div>

		<div class="ileft">연락처</div>
		<div class="icenter"><input name=wr_1 class="input1" itemname="연락처" required placeholder="연락처"></div>
		<div class="iright"></div>

		<div class="iclear"></div>

		<div class="ileft">상담선택</div>
		<div class="icenter">
			<select name="wr_2" class="input1" required itemname="상담선택">
				<option value="시행문의" <? if ($write[wr_2]=="") echo "selected"; ?>>시행문의</option>
				<option value="설계문의" <? if ($write[wr_2]=="설계문의") echo "selected"; ?>>설계문의</option>
				<option value="건설문의" <? if ($write[wr_2]=="건설문의") echo "selected"; ?>>건설문의</option>
				<option value="분양문의" <? if ($write[wr_2]=="분양문의") echo "selected"; ?>>분양문의</option>
				<option value="기타" <? if ($write[wr_2]=="기타") echo "selected"; ?>>기타</option>
			</select>
		</div>
		<div class="iright"></div>

		<div class="iclear"></div>

		<div class="ileft">상담내용</div>
		<div class="icenter">
			<textarea name="wr_content" required class="input4" id="wr_content" itemname="내용" placeholder="상담하고자 하시는 내용을 간략하게 적어주시면 관련 담당자를 통하여 빠르게 연락드리겠습니다."></textarea>
		</div>
		<div class="iright"></div>

		<div class="iclear"></div>
		<div class="icenter">
			<input type=submit id="ibtn_submit" value="상담신청" onfocus='blur()'/>
		</div>
		<div class="iright"></div>

		<div class="iclear"></div>
	</div>
</form>
<script language="javascript">
  function submitChk(f)
  {
	  f.action = "/consultation_form_ok.php";
	  return true;
  }
</script>
