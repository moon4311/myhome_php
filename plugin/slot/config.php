<?
/* 제작 : 데이 (dayever@naver.com
   이 주석이 달려 있는 한 수정과 재배포가 가능합니다.
*/
$sql = " select count(*) as cnt from $g4[point_table]
          where po_rel_table = '@pg4'
            and mb_id = '$member[mb_id]'
            and substring(po_rel_action,1,10) = '{$g4['time_ymd']}'";
$row = sql_fetch($sql);
$today_cnt = $row[cnt];
$today_max = "10"; //하루 최대 이용 횟수
$win_point = "100"; // 승리시 포인트
$lose_point = "5"; // 패배시 포인트
$min_point = "10"; // 포인트 참여에 필요한 최소 포인트

?>