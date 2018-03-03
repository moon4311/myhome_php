<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if($is_admin && $w != "c" && $w == "u"){
	$sql = "update $write_table set wr_name='$wr_names', wr_hit='$wr_hit', wr_datetime='$wr_datetime' where wr_id='$wr_id' ";
	sql_query($sql);
}
?>
<?
$wr_4 = "$etc4_exp00 - $etc4_exp01 - $etc4_exp02"; 
$sql4 = " update $write_table set wr_4 = '$wr_4' where wr_id = '$wr_id' ";
sql_query($sql4);
?>