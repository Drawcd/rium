<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
$page_dir = G5_PATH.'/'.page_piece.'/'.THEMA;
$pagePiece = readPagePiece($page_dir);
?>

<div class="tbl_head01 tbl_wrap">
	<table>
	<caption>위젯설정</caption>
	<colgroup>
		<col class="grid_1">
		<col class="grid_2">
		<col>
	</colgroup>
	<thead>
	<tr>
		<th scope="col" colspan="2">구분</th>
		<th scope="col">설정</th>
	</tr>
	</thead>
	<tr>
		<td align="center" rowspan="2">공통</td>
		<td align="center">반응형</td>
		<td>

			<select name="wset[effect]">

			</select>
			<input type="text" name="wset[auto]" value="<?php echo $wset['auto']; ?>" class="frm_input" size="4"> ms 간격(0 입력시 자동실행 안함)
		</td>
	</tr>

	<tr>
		<td align="center">include 파일</td>
		<td>
			<select id="pagepiece" name="wset[pagepiece]" class="form-control input-sm">
					<option  value="none">없음</option>
				<?php for ($i=0; $i<count($pagePiece); $i++) { ?>
					<option value="<?php echo $pagePiece[$i];?>"<?php echo get_selected($wset['pagepiece'],$pagePiece[$i]);?>><?php echo $pagePiece[$i];?></option>
				<?php } ?>
			</select>
		</td>
	</tr>

	</table>
</div>

<script>
$("#pagepiece").change(function(e){
	console.log($(this).val());
	console.log('change');
});
</script>
