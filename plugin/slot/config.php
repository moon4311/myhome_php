<?
/* ���� : ���� (dayever@naver.com
   �� �ּ��� �޷� �ִ� �� ������ ������� �����մϴ�.
*/
$sql = " select count(*) as cnt from $g4[point_table]
          where po_rel_table = '@pg4'
            and mb_id = '$member[mb_id]'
            and substring(po_rel_action,1,10) = '{$g4['time_ymd']}'";
$row = sql_fetch($sql);
$today_cnt = $row[cnt];
$today_max = "10"; //�Ϸ� �ִ� �̿� Ƚ��
$win_point = "100"; // �¸��� ����Ʈ
$lose_point = "5"; // �й�� ����Ʈ
$min_point = "10"; // ����Ʈ ������ �ʿ��� �ּ� ����Ʈ

?>