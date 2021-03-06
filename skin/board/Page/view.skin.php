<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 전체목록보이기 무조건 사용 - 목록에 내용표시
$board['bo_use_list_view'] = 1;

// SEO
if(empty($seometa['img'])) {
	$seometa['img'] = apms_wr_thumbnail($bo_table, $view, 0, 0, false, true); // 썸네일
}

$sns_url = G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$view['wr_id'];
$sns_title = get_text($g5['title']);

// 헤더
if(!$header_color)
	$header_color = 'color';

if($page_file) {
	$page_file = G5_PATH.'/page/'.$page_file;
	if(is_file($page_file)) {
		$page_path = str_replace("/".basename($page_file), "", $page_file);
		$page_url = str_replace(G5_PATH, G5_URL, $page_path);
		ob_start();
		@include_once($page_file);
		$page_content = ob_get_contents();
		ob_end_clean();
		$page_content = str_replace("./", $page_url."/", $page_content);
		$page_content = apms_content($page_content);
	} else {
		$page_content = '<p class="page-none">/page/'.$page_file.' 파일이 없습니다.</p>'.PHP_EOL;
	}
} else if($view['file'][1]['file']) {
	$page_file = G5_DATA_PATH.'/file/'.$bo_table.'/'.$view['file'][1]['file'];
	if(is_file($page_file)) {
		ob_start();
		@include_once($page_file);
		$page_content = ob_get_contents();
		ob_end_clean();
		$page_content = apms_content($page_content);
	} else {
		$page_content = '<p class="page-none">첨부된 문서파일이 없습니다.</p>'.PHP_EOL;
	}
} else {
	$page_content = $view['content'];
}

if(G5_IS_MOBILE) {
	echo '<div class="page-wrap font-14">'.PHP_EOL;
} else {
	echo '<div class="page-wrap">'.PHP_EOL;
}

// 스킨
$page_skin_path = G5_SKIN_PATH.'/page/'.$page_skin;
$page_skin_url = G5_SKIN_URL.'/page/'.$page_skin;

if($page_skin && is_file($page_skin_path.'/page.skin.php')) {
	include_once($page_skin_path.'/page.skin.php');
} else {
	if($header_skin)
		include_once('./header.php');

	echo $page_content;
}

echo '</div>'.PHP_EOL;

// 댓글사용 체크
$ucate = explode(",", $boset['use_cmt']);
if($write['ca_name'] && in_array($write['ca_name'], $ucate)) {
	include_once('./view_comment.php');
}

?>