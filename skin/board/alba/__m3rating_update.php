<? 
// �⺻ ��Ŭ��� 
$g4_path = "../../.."; 
include_once("$g4_path/common.php"); 

// ���� ó�� 
$gr_id = $_POST[gr_id]; 
$bo_table = $_POST[bo_table]; 
$wr_id = $_POST[wr_id]; 
$star = $_POST[star]; 
if($member[mb_id]) $mb_id = $member[mb_id]; 
else $mb_id = $_SERVER[REMOTE_ADDR]; 

// �ʿ��� ���� �Ѿ�Դ��� 
if(!$_POST[gr_id]) die("�׷� ���� ����"); 
if(!$_POST[bo_table]) die("�Խ��� ���� ����"); 
if(!$_POST[wr_id]) die("�� ��ȣ�� ����"); 
if(!$_POST[star]) die("������ �Ѿ���� ����"); 

// �� ���� �������� 
$sql = "select mb_id, wr_ip from `g4_write_$bo_table` where wr_id='$wr_id'"; 
$write = sql_fetch($sql); 

// ���� ���̸� 
if(!$write) die("���� ���̰ų� ������ ���Դϴ�."); 

// �� ���̸� 
$s_name = "�ڽ��� ���� ��õ�� �� �����ϴ�."; 
if($write[mb_id]==$mb_id || $write[wr_ip]==$mb_id) die($s_name); 
//if($write[mb_id]==$mb_id || $write[wr_ip]==$mb_id) die("�ڽ��� ���� ��õ�� �� �����ϴ�."); 

// ���� ���� �������� 
$sql = "select * from m3rating where bo_table='$bo_table' AND wr_id='$wr_id'"; 
$rating = sql_fetch($sql); 

// ���� ���� ������ 
if($rating) { 
// �̹� ������ ��� 
$s_name_alert = "�̹� ������ �ּ̽��ϴ�"; 
if(strpos(",".$rating[star_list].",", ",".$mb_id.",")!==false) die($s_name_alert);
 // �������� ���� ��� ������ �߰��Ѵ�. 
$star_average = (array_sum(explode(",",$rating[star_data]))+$star)/(sizeof(explode(",",$rating[star_data]))+1);
 $sql = "update m3rating set bo_table='$bo_table', wr_id='$wr_id', star_average='$star_average', star_data=CONCAT(star_data, ',$star'), star_list=CONCAT(star_list, ',$mb_id') where gr_id='$gr_id' AND bo_table='$bo_table' AND wr_id='$wr_id'";
 } 
// ���� ������ ������ 
else { 
$sql = "insert into m3rating set gr_id='$gr_id', bo_table='$bo_table', wr_id='$wr_id', star_average='$star', star_data='$star', star_list='$mb_id'";
 } 

// �����ϱ� 
sql_query($sql); 

// �Ϸ� 
$s_name_end = "{$star}���� �ݿ��Ǿ����ϴ�"; 
die($s_name_end); 
?> 