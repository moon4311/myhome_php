<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
// 자신만의 코드를 넣어주세요.
include "$g4[path]/skin/multi_category/lib.php";//멀티 카테고리
include "config.point.php"; // 옵션사용시 포인트 차감

$str = join(MC::getNowCategories($ca_name));
$sido = substr($str, 0,4);
$gugun = substr($str, 4,6);
$subj = substr($str,10,4);
$part = substr($str,14,4);
$sex = substr($str,18,4);

$wr_8 = $sido." ".$subj;
$sql8 = "update $write_table set wr_8 = '$wr_8' where wr_id = '$wr_id' ";
sql_query($sql8);

$wr_1 = "$ext1_00|$ext1_01|$ext1_02|$ext1_03|$ext1_04|$ext1_05|$ext1_06|$ext1_07|$ext1_08|$ext1_09|$ext1_10|$ext1_11|$ext1_12|$ext1_13|$ext1_14|$ext1_15|$ext1_16|$ext1_17|$ext1_18|$ext1_19|$ext1_20";
$sql1 = " update $write_table set wr_1 = '$wr_1' where wr_id = '$wr_id' ";
sql_query($sql1);

$wr_2 = "$ext2_00|$ext2_01|$ext2_02|$ext2_03|$ext2_04|$ext2_05|$ext2_06|$ext2_07|$ext2_08|$ext2_09|$ext2_10|$ext2_11|$ext2_12|$ext2_13|$ext2_14|$ext2_15|$ext2_16|$ext2_17|$ext2_18|$ext2_19";
$sql2 = " update $write_table set wr_2 = '$wr_2' where wr_id = '$wr_id' ";
sql_query($sql2);

// 주소정보 업데이트 여유 필드 wr_3 적용
if ($ext3_00) {
// $wr_3 = "$ext3_00|$ext3_01|$ext3_02|$ext3_03|$ext3_04|$ext3_05|$ext3_06|$ext3_07|$ext3_08|$ext3_09";
$wr_3 = "$ext3_00|$ext3_01|$ext3_02|$ext3_03";
$sql3 = " update $write_table set wr_3 = '$wr_3' where wr_id = '$wr_id' ";
sql_query($sql3);
}


//wr_6에서 받은 날짜더함
$date = date('Ymd', strtotime("now"));
$dayadd =$wr_6;
//$cdate = date("Ymd", strtotime("$dayadd day"));
$cdate = date("Ymd", strtotime("$dayadd day", strtotime($date)));
$wr_7 = $cdate;
$sql7 = " update $write_table set wr_7 = '$wr_7' where wr_id = '$wr_id' ";
sql_query($sql7);

//wr_4에서 받은 날짜더함
$date2 = date('Ymd', strtotime("now"));
$dayadd2 =$wr_4;
//$cdate = date("Ymd", strtotime("$dayadd day"));
$cdate2 = date("Ymd", strtotime("$dayadd2 day", strtotime($date2)));
$wr_9 = $cdate2;
$sql9 = " update $write_table set wr_9 = '$wr_9' where wr_id = '$wr_id' ";
sql_query($sql9);


if($w != "u" && ($wr_6 > 0)) {  // 스페셜등록 포인트 차감

	if($wr_6 == 1) {  
	$point_del = $point_w1;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == 2) { 
	$point_del = $point_w2;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == 3) { 
	$point_del = $point_w3;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == 4) {
	$point_del = $point_w4;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}
}

if($w != "u" && ($wr_4 > 0)) {  // 프리미엄등록 포인트 차감

	if($wr_4 == 1) {  
	$point_del = $point_w11;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_4 == 2) { 
	$point_del = $point_w22;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_4 == 3) { 
	$point_del = $point_w33;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_4 == 4) {
	$point_del = $point_w44;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}
}

?>