<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


$pagePieceFileName = $wset['pagepiece'];
$page_piece_file = G5_PATH.'/'.page_piece.'/'.THEMA.'/'.$pagePieceFileName ;



if(is_file($page_piece_file)) {
	include_once($page_piece_file);
} else {
	echo '<div class="text-muted text-center" style="padding:50px 0px;">'.'파일을 지정하세요'.'</div>';

}
?>

<?php if($setup_href) { ?>
	<div class="btn-wset text-center p10">
		<a href="<?php echo $setup_href;?>" class="win_memo">
			<span class="text-muted font-12"><i class="fa fa-cog"></i> 위젯설정</span>
		</a>
	</div>
<?php } ?>
