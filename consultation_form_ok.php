<?
include_once("./common.php");

include_once("./lib/mailer.lib.php");
ob_start();
include_once ("./bbs/write_update_mail.php");
$content = ob_get_contents();
ob_end_clean();



$wr_1 = "$hp1-$hp2-$hp3";


$bo_table = "1q1a";
$write_table = $g5['write_prefix'] . $bo_table;

$wr_num = get_next_num($write_table);
$wr_reply = "";

$wr_subject = "{$_POST[wr_name]}님의 {$_POST[wr_2]}요청 글입니다";

//$secret = "secret";

    $sql = " insert into $write_table
                set wr_num = '$wr_num',
                     wr_reply = '$wr_reply',
                     wr_comment = 0,
                     ca_name = '$ca_name',
                     wr_option = '$html,$secret,$mail',
                     wr_subject = '$wr_subject',
                     wr_content = '$wr_content',
                     wr_link1 = '$wr_link1',
                     wr_link2 = '$wr_link2',
                     wr_link1_hit = 0,
                     wr_link2_hit = 0,
                     wr_hit = 0,
                     wr_good = 0,
                     wr_nogood = 0,
                     mb_id = '{$member['mb_id']}',
                     wr_password = '$wr_password',
                     wr_name = '$wr_name',
                     wr_email = '$wr_email',
                     wr_homepage = '$wr_homepage',
                     wr_datetime = '".G5_TIME_YMDHIS."',
                     wr_last = '".G5_TIME_YMDHIS."',
                     wr_ip = '{$_SERVER['REMOTE_ADDR']}',
                     wr_1 = '$wr_1',
                     wr_2 = '$wr_2',
                     wr_3 = '$wr_3',
                     wr_4 = '$wr_4',
                     wr_5 = '$wr_5',
                     wr_6 = '$wr_6',
                     wr_7 = '$wr_7',
                     wr_8 = '$wr_8',
                     wr_9 = '$wr_9',
                     wr_10 = '$wr_10' ";
    sql_query($sql);

$wr_id = sql_insert_id();

// 부모 아이디에 UPDATE
sql_query(" update $write_table set wr_parent = '$wr_id' where wr_id = '$wr_id' ");

// 새글 INSERT
sql_query(" insert into $g5[board_new_table] ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) values ( '$bo_table', '$wr_id', '$wr_id', '$g4[time_ymdhis]', '$member[mb_id]' ) ");

// 게시글 1 증가
sql_query("update $g5[board_table] set bo_count_write = bo_count_write + 1 where bo_table = '$bo_table'");

$super_admin = get_admin("super");
$wr_email = $super_admin[mb_email];
mailer($wr_name, $wr_email, $super_admin[mb_email], $wr_subject, $content, 1);


alert("상담글이 등록되었습니다.","index.php");
?>
