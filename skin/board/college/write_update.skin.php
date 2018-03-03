<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if($is_admin && $w != "c" && $w == "u"){
	$sql = "update $write_table set wr_name='$wr_names', wr_hit='$wr_hit', wr_datetime='$wr_datetime' where wr_id='$wr_id' ";
	sql_query($sql);
}
?>