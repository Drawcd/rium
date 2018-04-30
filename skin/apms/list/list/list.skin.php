<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 분류명
$ca_name = array();
$ca_arr = array();
$sql = " select ca_id, ca_name from {$g5['g5_shop_category_table']} order by ca_order, ca_id ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
	$c = $row['ca_id'];
	$ca_name[$c] = $row['ca_name'];
}

// StyleSheet
add_stylesheet('<link rel="stylesheet" href="'.$list_skin_url.'/style.css" type="text/css" media="screen">',0);

?>

<?php if($is_nav) { // 네비게이션 ?>
	<aside class="list-nav en font-13 hidden-xs">
		<ol class="breadcrumb">
			<?php for($i=0;$i < count($nav); $i++) { ?>
				<li>
					<a href="./list.php?ca_id=<?php echo $nav[$i]['ca_id'];?>"<?php echo ($nav[$i]['on']) ? ' class="active"' : '';?>>
						<?php echo ($i == 0) ? '<i class="fa fa-gift"></i> ' : '';?>
						<?php echo $nav[$i]['name'];?> 
						<span>(<?php echo $nav[$i]['cnt'];?>)</span>
					</a>
				</li>
			<?php } ?>
		</ol>
	</aside>
<?php } ?>

<aside>
	<div class="row en">
		<div class="col-sm-3">
			<?php if($is_cate) { // 하위분류 ?>
				<div class="form-group input-group input-group-sm">
					<span class="input-group-addon"><i class="fa fa-tag"></i></span>
					<select name="ca_id" onchange="location='./list.php?ca_id=' + this.value;" class="form-control input-sm">
						<option value="<?php echo $ca_id;?>">카테고리</option>
						<?php for($i=0;$i < count($cate); $i++) { ?>
							<option value="<?php echo $cate[$i]['ca_id'];?>"<?php echo ($ca_id == $cate[$i]['ca_id']) ? ' selected' : '';?>><?php echo $cate[$i]['name'];?></option>
						<?php } ?>
					</select>
					<?php if($up_href) { ?>
						<span class="input-group-addon"><a href="<?php echo $up_href;?>" title="상위분류"><i class="fa fa-caret-up"></i></a></span>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<div class="col-sm-6">

		</div>
		<div class="col-sm-3">
			<div class="form-group input-group input-group-sm">
				<span class="input-group-addon"><i class="fa fa-sort"></i></span>
				<select name="sortodr" onchange="location='<?php echo $list_sort_href; ?>' + this.value;" class="form-control input-sm">
					<option value="">정렬하기</option>
					<option value="it_sum_qty&amp;sortodr=desc"<?php echo ($sort == 'it_sum_qty') ? ' selected' : '';?>>판매많은순</option>
					<option value="it_price&amp;sortodr=asc"<?php echo ($sort == 'it_price' && $sortodr == 'asc') ? ' selected' : '';?>>낮은가격순</option>
					<option value="it_price&amp;sortodr=desc"<?php echo ($sort == 'it_price' && $sortodr == 'desc') ? ' selected' : '';?>>높은가격순</option>
					<option value="it_use_avg&amp;sortodr=desc"<?php echo ($sort == 'it_use_avg') ? ' selected' : '';?>>평점높은순</option>
					<option value="it_use_cnt&amp;sortodr=desc"<?php echo ($sort == 'it_use_cnt') ? ' selected' : '';?>>후기많은순</option>
					<option value="pt_good&amp;sortodr=desc"<?php echo ($sort == 'pt_good') ? ' selected' : '';?>>추천많은순</option>
					<option value="pt_comment&amp;sortodr=desc"<?php echo ($sort == 'pt_comment') ? ' selected' : '';?>>댓글많은순</option>
					<option value="it_update_time&amp;sortodr=desc"<?php echo ($sort == 'it_update_time') ? ' selected' : '';?>>최근등록순</option>
				</select>
			</div>
		</div>
	</div>
</aside>

<section>
	<div class="table-responsive">
		<table class="table list-tbl">
		<thead>
		<tr class="list-head">
			<th scope="col" class="wh-40">번호</th>
			<th scope="col" class="wh-50">이미지</th>
			<th scope="col">제목</th>
			<th scope="col" class="wh-40">조회</th>
			<th scope="col" class="wh-40">추천</th>
			<th scope="col" class="wh-40">비추</th>
			<th scope="col" class="wh-40">판매</th>
			<th scope="col" class="wh-40">후기</th>
			<th scope="col" class="wh-100">별점</th>
			<th scope="col" class="wh-60">날짜</th>
			<th scope="col" class="wh-80">가격</th>
			<th scope="col" class="wh-50">포인트</th>
		</tr>
		</thead>
		<tbody>
		<?php for ($i=0; $i < count($list); $i++) { 

			$list[$i]['img'] = apms_it_thumbnail($list[$i], 40, 40, false, true);

			// 가격
			$it_price = str_replace('원','', display_price(get_price($list[$i]), $list[$i]['it_tel_inq']));
			$it_price = ($it_price) ? $it_price : '-';

			// 포인트
			$it_point = '-';
			if($list[$i]['it_point']) {
				$it_point = ($list[$i]['it_point_type']) ? $list[$i]['it_point'].'%' : number_format($list[$i]['it_point']);
			}

			// 현재글 스타일 체크
			if ($list[$i]['it_id'] == $it_id) {
				$tr_css = ' class="list-now"';
				$subject_css = ' now';
				$num = "<span class=\"red\">열람중</span>";
			} else {
				$tr_css = $subject_css = '';
				$num = '<span class="en">'.$list[$i]['num'].'</span>';
			}		

			// 분류명
			$c1 = $list[$i]['ca_id'];
			$c2 = $list[$i]['ca_id2'];
			$c3 = $list[$i]['ca_id3'];
			if($c1) $ca_arr[] = $ca_name[$c1];
			if($c2) $ca_arr[] = $ca_name[$c2];
			if($c3) $ca_arr[] = $ca_name[$c3];
			$ca_list = implode(' / ', $ca_arr);
			unset($ca_arr);
		?>
		<tr<?php echo $tr_css; ?>>
			<td class="text-center font-11">
				<?php echo $num;?>
			</td>
			<td class="text-center">
				<a href="<?php echo $list[$i]['href']; ?>">
					<?php if($list[$i]['img']['src']) {?>
						<img src="<?php echo $list[$i]['img']['src'];?>" alt="<?php echo $list[$i]['img']['alt'];?>">
					<?php } else { ?>
						<i class="fa fa-camera img-fa"></i>
					<?php } ?>				
				</a>
			</td>
			<td class="list-subject<?php echo $subject_css;?>">
				<a href="<?php echo $list[$i]['href']; ?>">
					<?php echo $list[$i]['it_name'];?>
					<?php if ($list[$i]['pt_comment']) { ?>
						<span class="sound_only">댓글</span><small><?php echo $list[$i]['pt_comment']; ?></small><span class="sound_only">개</span>
					<?php } ?>
					<?php if($list[$i]['pt_num'] >= (G5_SERVER_TIME - (24 * 3600))) { ?>
						<img src="<?php echo $list_skin_url;?>/img/icon_new.gif" alt="">
					<?php } ?>
				</a>
				<div class="text-muted font-11 list-cate">
					<?php echo item_icon($list[$i]);?>
					<?php echo $ca_list;?>
				</div>
			</td>
			<td class="text-center font-11 en">
				<?php echo $list[$i]['it_hit']; //조회 ?>
			</td>
			<td class="text-center font-11 en">
				<?php echo $list[$i]['pt_good']; //추천 ?>
			</td>						
			<td class="text-center font-11 en">
				<?php echo $list[$i]['pt_nogood']; //비추천 ?>
			</td>
			<td class="text-center font-11 en">
				<?php echo $list[$i]['it_sum_qty']; //판매량 ?>
			</td>						
			<td class="text-center font-11 en">
				<?php echo $list[$i]['it_use_cnt']; //후기수 ?>
			</td>						
			<td class="text-center red">
				<?php echo apms_get_star($list[$i]['it_use_avg']); ?>
			</td>
			<td class="text-center font-11 en">
				<?php echo ($list[$i]['pt_num'] > 0) ? apms_datetime($list[$i]['pt_num']) : apms_datetime(strtotime($list[$i]['it_time'])); //발행일 ?>
			</td>
			<td class="text-center en">
				<?php echo $it_price; ?>
			</td>
			<td class="text-center en">
				<?php echo $it_point; ?>
			</td>
		</tr>
		<?php } ?>
		<?php if ($i == 0) { ?>
			<tr><td colspan="12" class="list-none text-muted text-center">자료가 없습니다.</td></tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</section>

<div style="margin-bottom:20px;">
	<?php if($total_count > 0) { ?>
		<div class="pull-left">
			<ul class="pagination pagination-sm en" style="margin:0; padding:0;">
				<?php echo apms_paging($write_pages, $page, $total_page, $list_page); ?>
			</ul>
		</div>
	<?php } ?>
	<div class="pull-right">
		<?php if ($is_event) { ?>
			<a class="btn btn-color btn-sm" href="./event.php">이벤트</a>
		<?php } ?>
		<?php if ($write_href) { ?>
			<a class="btn btn-black btn-sm" href="<?php echo $write_href;?>">등록</a>
		<?php } ?>
		<?php if ($admin_href) { ?>
			<a class="btn btn-black btn-sm" href="<?php echo $admin_href;?>">관리</a>
		<?php } ?>
		<?php if ($config_href) { ?>
			<a class="btn btn-black btn-sm" href="<?php echo $config_href;?>">설정</a>
		<?php } ?>
		<?php if ($rss_href) { ?>
			<a class="btn btn-color btn-sm" title="카테고리 RSS 구독하기" href="<?php echo $rss_href;?>" target="_blank"><i class="fa fa-rss fa-lg"></i></a>
		<?php } ?>
	</div>
	<div class="clearfix"></div>
</div>
