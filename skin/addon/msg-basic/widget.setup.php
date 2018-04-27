<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// input의 name을 wset[배열키] 형태로 등록
// 모바일 설정값은 동일 배열키에 배열변수만 wmset으로 지정 → wmset[배열키]

if(!$wset['color']) $wset['color'] = 'red';
if(!$wset['cnt']) $wset['cnt'] = 0;
if(!$wset['open']) $wset['open'] = 1;

// 에디터 적용
include_once(G5_EDITOR_LIB);

// 위젯설정창 크기
$win_size = 800;

?>
</form>
<!-- 에디터 적용을 위해 기존 form 닫고 새로운 form 생성함 -->
<form id="wsetup1" name="wsetup1" method="post" onsubmit="return fwidget_submit(this);">
<input type="hidden" name="mode" value="save">
<input type="hidden" name="wid" value="<?php echo $wid;?>">
<input type="hidden" name="wname" value="<?php echo $wname;?>">
<input type="hidden" name="wdir" value="<?php echo $wdir;?>">
<input type="hidden" name="wdemo" value="<?php echo $wdemo;?>">
<input type="hidden" name="thema" value="<?php echo $thema;?>">
<input type="hidden" name="add" value="<?php echo $add;?>">

<div class="tbl_head01 tbl_wrap">
	<table>
	<caption>위젯설정</caption>
	<colgroup>
		<col class="grid_2">
		<col>
	</colgroup>
	<thead>
	<tr>
		<th scope="col">구분</th>
		<th scope="col">설정</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td align="center"><b>탭스타일</b></td>
		<td>
			선택탭 글자색
			<select name="wset[color]">
				<?php echo apms_color_options($wset['color']);?>
			</select>
			&nbsp;
			선택탭 라인색
			<select name="wset[line]">
				<option value="">없음</option>
				<?php echo apms_color_options($wset['line']);?>
			</select>
			&nbsp;
			<label><input type="checkbox" name="wset[sp]" value="1"<?php echo get_checked($wset['sp'], '1');?>> 배분형</label>
		</td>
	</tr>
	<tr>
		<td align="center"><b>탭출력수</b></td>
		<td>
			<input type="text" name="wset[cnt]" value="<?php echo $wset['cnt']; ?>" class="frm_input" size="4"> 개 탭 생성 - 입력후 저장하시면 탭이 생성됩니다.
		</td>
	</tr>
	<?php for ($i=1; $i <= $wset['cnt']; $i++) { ?>
		<tr>
			<td align="center">
				<b>탭명 #<?php echo $i;?></b>
			</td>
			<td>
				<input type="text" name="wset[t<?php echo $i;?>]" value="<?php echo $wset['t'.$i];?>" size="20" class="frm_input"> (미등록시 출력안됨)
				&nbsp;
				<label><input type="radio" name="wset[open]" value="<?php echo $i;?>"<?php echo get_checked($wset['open'], $i);?>> 시작시 오픈탭</label>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo editor_html('m'.$i, $wset['m'.$i]); ?>
				<input type="hidden" id="mc<?php echo $i;?>" name="wset[m<?php echo $i;?>]" value="">
			</td>
		</tr>
	<?php } ?>
	</tbody>
	</table>
</div>

<script>
function fwidget_submit(f) { 
	<?php 
	//에디터 처리
	for ($i=1; $i <= $wset['cnt']; $i++) { 
		echo get_editor_js('m'.$i);
	?>
	$('#mc<?php echo $i;?>').val(f.m<?php echo $i;?>.value);
	<?php }	?>

	return true;
}
</script>