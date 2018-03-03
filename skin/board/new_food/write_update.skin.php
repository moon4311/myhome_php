<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
// 자신만의 코드를 넣어주세요.

for ($i = 0;  $i < count($wr_body_1); $i++)
{
	$wr_1 = $wr_1."|".$wr_body_1[$i];
	$wr_2 = $wr_2."|".$wr_body_2[$i];
}
$update_sql	 = " update $write_table 
				 set wr_1  = '$wr_1',
					 wr_2  = '$wr_2'					 
				where wr_id = '$wr_id' ";
sql_query($update_sql);

// 주소정보 업데이트 여유 필드 wr_3 적용
if ($ext3_00) {
// $wr_3 = "$ext3_00|$ext3_01|$ext3_02|$ext3_03|$ext3_04|$ext3_05|$ext3_06|$ext3_07|$ext3_08|$ext3_09";
$wr_3 = "$ext3_00|$ext3_01|$ext3_02|$ext3_03";
$sql3 = " update $write_table set wr_3 = '$wr_3' where wr_id = '$wr_id' ";
sql_query($sql3);
}
?>

<?
$wr_4 = "$four01|$four02|$four03|$four04|$four05|$four06|$four07|$four08|$four09|$four10|$four11|$four12|$four13|$four14|$four15|$four16|$four17|$four18|$four19|$four20|$four21|$four22|$four23|$four24|$four25|$four26|$four27|$four28|$four29|$four30|"; 
$sql4 = " update $write_table set wr_4 = '$wr_4' where wr_id = '$wr_id' ";
sql_query($sql4);
?>