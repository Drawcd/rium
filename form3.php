  <style type="text/css">
  .field { height:19px; font-family:돋움; font-size:11px; padding:1px 1px 1px 1px; margin-top:1px; border:1px solid #eaeaea;}
  .ddd {
	  color: #666;
  }
  body {
	  background-color: #fff;
  }
  </style>
  <div style="padding:0px;">
  <form name="fwrite" method="post" onSubmit="return submitChk(this)"; style="margin:0px;">
  <input type=hidden name=sca      value="<?=$sca?>">
  <table    border="0" cellpadding="0" cellspacing="0">

	  <tr>
		  <td width="57" height="20" class="ddd"style="padding-left: 10px; font-weight: bold;">이름</td>
	    <td width="244" colspan="3" ><input name=wr_name class='ed' style="width:70px;" size="5" maxlength=20 itemname="이름" required></td>
	    </tr>
	  <tr>
		  <td  width="57" height="23" class="ddd"style="padding-left: 10px; font-weight: bold;">연락처</td>
		  <td colspan="3" ><select name="hp1" itemname="휴대폰" required style="" style="">
				  <option value="010">010</option>
				  <option value="011">011</option>
				  <option value="016">016</option>
				  <option value="017">017</option>
				  <option value="018">018</option>
				  <option value="019">019</option>
			   </select>
		    <input name="hp2" type="text" required class='ed' style="width:35px;border:1px solid #ddd;" maxlength="4" itemname="휴대폰"/>
		    <input name="hp3" type="text" required class='ed' style="width:35px;border:1px solid #ddd;" maxlength="4" itemname="휴대폰"/>
			   <select name="wr_2" class="ed" required itemname="상담선택">
			     <option value="" <? if ($write[wr_2]=="") echo "selected"; ?>>상담선택</option>
			     <option value="창업문의" <? if ($write[wr_2]=="창업문의") echo "selected"; ?>>창업문의</option>
			     <option value="기타" <? if ($write[wr_2]=="기타") echo "selected"; ?>>기타</option>
	        </select>
	    </td>
	  </tr>

	  <tr>
		  <td width="57" height="39" class="ddd"style="padding-left: 10px; font-weight: bold;">내 용</td>
		  <td colspan="3" ><textarea name="wr_content" cols="22" rows=3 required class=tx id="wr_content" overflow-y:hidden;word-break:break-all; itemname="내용"></textarea>
		    <input type=image id="btn_submit" src="images/latest/btn.png" border="0" onfocus='blur()' />
			  </td>
	  </tr>

  </table>
  </form>
  </div>


  <script language="javascript">
  function submitChk(f)
  {
	  f.action = "form_ok.php";
	  return true;
  }
  </script>
