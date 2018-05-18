<?php
include_once "_common.php";

if($is_admin=='super') {
    $sql = " update $_POST[bo_table] set wr_datetime = '". $_POST['wr_datetime'] ."', wr_hit = '". $_POST['wr_hit'] ."' where wr_id = '". $_POST['wr_id'] ."' ";
    sql_query($sql);
}
?>
<script>
  location.href="<?php echo $_POST['REQUEST_URI']?>" ;
</script>
