<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�
include "$g4[path]/skin/multi_category/lib.php";

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}
?>

<?
$ex1_filed = explode("|",$write[wr_1]); 
$ext1_00  = $ex1_filed[0];
$ext1_01  = $ex1_filed[1];
$ext1_02  = $ex1_filed[2];
$ext1_03  = $ex1_filed[3];
$ext1_04  = $ex1_filed[4];
$ext1_05  = $ex1_filed[5];
$ext1_06  = $ex1_filed[6];
$ext1_07  = $ex1_filed[7];
$ext1_08  = $ex1_filed[8];
$ext1_09  = $ex1_filed[9];
$ext1_10  = $ex1_filed[10];
$ext1_11  = $ex1_filed[11];
$ext1_12  = $ex1_filed[12];
$ext1_13  = $ex1_filed[13];
$ext1_14  = $ex1_filed[14];
$ext1_15  = $ex1_filed[15];
$ext1_16  = $ex1_filed[16];
$ext1_17  = $ex1_filed[17];
$ext1_18  = $ex1_filed[18];
$ext1_19  = $ex1_filed[19];
$ext1_20  = $ex1_filed[20];

$ex2_filed = explode("|",$write[wr_2]); 
$ext2_00  = $ex2_filed[0]; //�����
$ext2_01  = $ex2_filed[1]; //�����
$ext2_02  = $ex2_filed[2]; //�����
$ext2_03  = $ex2_filed[3]; //�����
$ext2_04  = $ex2_filed[4];
$ext2_05  = $ex2_filed[5];
$ext2_06  = $ex2_filed[6];
$ext2_07  = $ex2_filed[7];
$ext2_08  = $ex2_filed[8];
$ext2_09  = $ex2_filed[9];
$ext2_10  = $ex2_filed[10];
$ext2_11  = $ex2_filed[11];
$ext2_12  = $ex2_filed[12];
$ext2_13  = $ex2_filed[13];
$ext2_14  = $ex2_filed[14];
$ext2_15  = $ex2_filed[15];
$ext2_16  = $ex2_filed[16];
$ext2_17  = $ex2_filed[17];
$ext2_18  = $ex2_filed[18];
$ext2_19  = $ex2_filed[19]; //�����

$ex3_filed = explode("|",$write[wr_3]); 
$ext3_00  = $ex3_filed[0];
$ext3_01  = $ex3_filed[1];
$ext3_02  = $ex3_filed[2]; 
$ext3_03  = $ex3_filed[3]; 
$ext3_04  = $ex3_filed[4];
$ext3_05  = $ex3_filed[5];
$ext3_06  = $ex3_filed[6];
$ext3_07  = $ex3_filed[7];
$ext3_08  = $ex3_filed[8];
$ext3_09  = $ex3_filed[9];

//wr_3  ����
//wr_4  �����̾� ��ϱⰣ
//wr_5  ���� ������
//wr_6  ����� ��ϱⰣ
//wr_7  lib���� wr_6
//wr_8  �ֽűۿ� ��Ƽī�װ� ǥ���ϱ�
//wr_9  lib���� wr_4
//wr_10
?>
<!-- [����] �ɼ��ʵ� --//-->
<div style="height:14px; line-height:1px; font-size:1px;">&nbsp;</div>

<style type="text/css">
.write_head {height:30px; text-align:center; color:#8492A0;}
.field { border:1px solid #ccc; }
.write_fl {background-color:#FFFFFF; font-size:12px; font-family:����;padding:5 5 5 5;text-align:left;}
.write_flb {background-color:#FFFFFF; font-size:12px; font-family:����;padding:5 5 5 5;text-align:left;font-weight:bold;}
.write_r {background-color:#F3F3F3; font-size:12px; font-family:����;padding:5 5 5 5;text-align:right;}
.write_rb {background-color:#F3F3F3; font-size:12px; font-family:����;padding:5 5 5 5;text-align:right;font-weight:bold;}
.write_fc {background-color:#FFFFFF; font-size:12px; font-family:����;padding:5 5 5 5;text-align:center;}
.write_fcb {background-color:#FFFFFF; font-size:12px; font-family:����;padding:5 5 5 5;text-align:center;font-weight:bold;}
.write_c {background-color:#F3F3F3; font-size:12px; font-family:����;padding:5 5 5 5;text-align:center;}
.write_cb {background-color:#F3F3F3; font-size:12px; font-family:����;padding:5 5 5 5;text-align:center;font-weight:bold;}
</style>

<script type="text/javascript">
// ���ڼ� ����
var char_min = parseInt(<?=$write_min?>); // �ּ�
var char_max = parseInt(<?=$write_max?>); // �ִ�
</script>

<form name="fwrite" method="post" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null> 
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">

<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>


<div style="border:1px solid #ddd; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
<div style="font-weight:bold; font-size:14px; margin:7px 0 0 10px;">:: <?=$title_msg?> ::</div>
</div>
<div style="height:3px; background:url(<?=$board_skin_path?>/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<colgroup width=90>
<colgroup width=''>
<tr><td colspan="2" style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; height:3px;"></td></tr>
<? if ($is_name) { ?>
<tr>
    <td class=write_head>�� ��</td>
    <td><input class='ed' maxlength=20 size=15 name=wr_name itemname="�̸�" required value="<?=$name?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr>
    <td class=write_head>�н�����</td>
    <td><input class='ed' type=password maxlength=20 size=15 name=wr_password itemname="�н�����" <?=$password_required?>></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr>
    <td class=write_head>�̸���</td>
    <td><input class='ed' maxlength=100 size=50 name=wr_email email itemname="�̸���" value="<?=$email?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_homepage) { ?>
<tr>
    <td class=write_head>Ȩ������</td>
    <td><input class='ed' size=50 name=wr_homepage itemname="Ȩ������" value="<?=$homepage?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? 
$option = "";
$option_hidden = "";
if ($is_notice || $is_html || $is_secret || $is_mail) { 
    $option = "";
    if ($is_notice) { 
        $option .= "<input type=checkbox name=notice value='1' $notice_checked>����&nbsp;";
    }

    if ($is_html) {
        if ($is_dhtml_editor) {
            $option_hidden .= "<input type=hidden value='html1' name='html'>";
        } else {
            $option .= "<input onclick='html_auto_br(this);' type=checkbox value='$html_value' name='html' $html_checked><span class=w_title>html</span>&nbsp;";
        }
    }

    if ($is_secret) {
        if ($is_admin || $is_secret==1) {
            $option .= "<input type=checkbox value='secret' name='secret' $secret_checked><span class=w_title>��б�</span>&nbsp;";
        } else {
            $option_hidden .= "<input type=hidden value='secret' name='secret'>";
        }
    }
    
    if ($is_mail) {
        $option .= "<input type=checkbox value='mail' name='mail' $recv_email_checked>�亯���Ϲޱ�&nbsp;";
    }
}

echo $option_hidden;
if ($option) {
?>
<tr>
    <td class=write_head>�� ��</td>
    <td align=left><?=$option?></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr><td colspan="2">
<br>
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		
		<table width="100%" cellpadding="0" cellspacing="1">
		    <tr><td width="20%" class=write_cb>��������</td>
				  <td width="80%" class=write_fl><input class='ed' style="width:100%;" name=wr_subject id="wr_subject" itemname="����" required value="<?=$subject?>"></td></tr>
		</table>
</td></tr></table>
</td></tr>


<? if ($is_category) { ?>
<tr><td colspan=2>
<br>
***�⺻�з�
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		
		<table width="100%" cellpadding="0" cellspacing="1">
		    <tr><td width="20%" class=write_cb>�⺻�з�</td>
				  <td width="80%" class=write_fc>
				 &nbsp;(��/��)  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (��/��) &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (����) &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (�з�)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  (����) <br>
			<?php echo MC::write_input_select($write['ca_name']);?>

			</td></tr>
		</table>
</td></tr></table>
</tr></td>
<? } ?>

<tr><td colspan=2>
<br>
***�п�����
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		
		<table width="100%" cellpadding="0" cellspacing="1">
		    <tr><td width="20%" class=write_cb>�п���</td>
				  <td colspan="3" class=write_fl><INPUT class=ed style="width:220;" name='ext2_18' id='ext2_18' value="<?=$ext2_18?>" maxlength='70'  itemname="ȸ���" required></td></tr>
			<tr><td width="20%" class=write_cb>������ </td>
				  <td width="30%" class=write_fl><INPUT class=ed style="width:150;" name='ext1_00' id='ext1_00' value="<?=$ext1_00?>" onkeydown='onlyNumber(this);' maxlength='70'  itemname="��������" > &nbsp;��</td>
			     <td width="20%" class=write_cb>��ȭ��ȣ</td>
				 <td width="30%" class=write_fl>
				 <SELECT name='ext1_05' class='ed' required itemname='��ȭ��ȣ'>
						<option value='02' <? if($ext1_05 == "02") echo "selected"; ?>>02</option>
						<option value='031' <? if($ext1_05 == "031") echo "selected"; ?>>031</option>
						<option value='032' <? if($ext1_05 == "032") echo "selected"; ?>>032</option>
						<option value='033' <? if($ext1_05 == "033") echo "selected"; ?>>033</option>
						<option value='041' <? if($ext1_05 == "041") echo "selected"; ?>>041</option>
						<option value='042' <? if($ext1_05 == "042") echo "selected"; ?>>042</option>
						<option value='043' <? if($ext1_05 == "043") echo "selected"; ?>>043</option>
						<option value='051' <? if($ext1_05 == "051") echo "selected"; ?>>051</option>
						<option value='052' <? if($ext1_05 == "052") echo "selected"; ?>>052</option>
						<option value='053' <? if($ext1_05 == "053") echo "selected"; ?>>053</option>
						<option value='054' <? if($ext1_05 == "054") echo "selected"; ?>>054</option>
						<option value='055' <? if($ext1_05 == "055") echo "selected"; ?>>055</option>
						<option value='061' <? if($ext1_05 == "061") echo "selected"; ?>>061</option>
						<option value='062' <? if($ext1_05 == "062") echo "selected"; ?>>062</option>
						<option value='063' <? if($ext1_05 == "063") echo "selected"; ?>>063</option>
						<option value='064' <? if($ext1_05 == "064") echo "selected"; ?>>064</option>
					  </select> - 
					  <input name='ext1_06' class=ed value='<?=$ext1_06?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='�Ϲ���ȭ �ι�°�ڸ�' class=input>  - 
					  <input name='ext1_07' class=ed value='<?=$ext1_07?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='�Ϲ���ȭ ����°�ڸ�' class=input>
				 </td></tr>
			<tr><td class=write_cb>������</td>
			      <td class=write_fl>
				  <select class=box name='ext1_01'  required itemname='������'>
                      <option value='5������' <? if($ext1_01 == "5������")	echo "selected"; ?>>5������</option>
					  <option value='6-10������' <? if($ext1_01 == "6-10������")	echo "selected"; ?>>6-10������</option>
					  <option value='11-15������' <? if($ext1_01 == "11-15������")	echo "selected"; ?>>11-15������</option>
					  <option value='16-20������' <? if($ext1_01 == "16-20������")	echo "selected"; ?>>16-20������</option>
					  <option value='21-25������' <? if($ext1_01 == "21-25������")	echo "selected"; ?>>21-25������</option>
					  <option value='26-30������' <? if($ext1_01 == "26-30������")	echo "selected"; ?>>26-30������</option>
					  <option value='31���̻�' <? if($ext1_01 == "31���̻�")	echo "selected"; ?>>31���̻�</option>
			</select>
				  </td>
			      <td class=write_cb>������</td>
				  <td class=write_fl>
				  <select class=box name='ext1_02'  required itemname='������'>
                      <option value='40������' <? if($ext1_02 == "4������")	echo "selected"; ?>>40������</option>
					  <option value='41-80������' <? if($ext1_02 == "41-80������")	echo "selected"; ?>>41-80������</option>
					  <option value='81-120������' <? if($ext1_02 == "81-120������")	echo "selected"; ?>>81-120������</option>
					  <option value='121-150������' <? if($ext1_02 == "121-150������")	echo "selected"; ?>>121-150������</option>
					  <option value='151-180������' <? if($ext1_02 == "151-180������")	echo "selected"; ?>>151-180������</option>
					  <option value='181-200������' <? if($ext1_02 == "181-200������")	echo "selected"; ?>>181-200������</option>
					  <option value='201���̻�' <? if($ext1_02 == "201���̻�")	echo "selected"; ?>>201���̻�</option>
			</select>
				  </td></tr>
			<tr><td class=write_cb>�ּ�</td>
			      <td class=write_fl colspan="3">
				  <input class=ed type=text name='ext3_00' value='<?=$ext3_00?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�����ȣ ���ڸ�'>
					  - 
					  <input class=ed type=text name='ext3_01' value='<?=$ext3_01?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�����ȣ ���ڸ�'>
					  &nbsp;<a href="javascript:;" onclick="win_zip('fwrite', 'ext3_00', 'ext3_01', 'ext3_02', 'ext3_03');"><img  src="<?=$board_skin_path?>/img/icon_addr.gif" height=19 width=85 align='absmiddle' border=0></a>
						<br>
					  <input class=ed type=text name='ext3_02' value='<?=$ext3_02?>' size=60 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�ּ�'>

					  <input class=ed  type=text name='ext3_03'  value='<?=$ext3_03?>' size=30 <?=$config[cf_req_addr]?'required':'';?> itemname='���ּ�'>
						&nbsp;<font color=#999999>(���ּ�)</font>
				  
				  </td></tr>
			<tr> <td class=write_cb>Ȩ������</td>
			       <td class=write_fl colspan="3">
				    <input type='text' class='ed' size=25 name='wr_link1' itemname='��ũ' value='<?=$write["wr_link1"]?>'>
			  </td></tr>
		</table>

</td></tr></table>
</td></tr>

<tr><td colspan=2>
<br>
***�����䰭
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>�������</td>
				  <td width="20%" class=write_cb>�����ο�</td>
				  <td width="20%" class=write_cb>�з�</td>
				  <td width="20%" class=write_cb>���</td>
				  <td width="20%" class=write_cb>����</td></tr>
			<!--�������-->
			<tr><td class=write_fc>
				<select name="ext1_09" required itemname='�������'>
					<option value="">�����ϼ���</option>
					<option value="�ʵ��" <? if($ext1_09 == "�ʵ��")	 echo "selected"; ?>>�ʵ��</option>
					<option value="�ߵ��" <? if($ext1_09 == "�ߵ��")	 echo "selected"; ?>>�ߵ��</option>
					<option value="����" <? if($ext1_09 == "����")	 echo "selected"; ?>>����</option>
					<option value="���ߵ��" <? if($ext1_09 == "���ߵ��")	 echo "selected"; ?>>���ߵ��</option>
					<option value="�߰���" <? if($ext1_09 == "�߰���")	 echo "selected"; ?>>�߰���</option>
					<option value="���߰�" <? if($ext1_09 == "���߰�")	 echo "selected"; ?>>���߰�</option>
					<option value="���ι�" <? if($ext1_09 == "���ι�")	 echo "selected"; ?>>���ι�</option>
					<option value="��Ÿ" <? if($ext1_09 == "��Ÿ")	 echo "selected"; ?>>��Ÿ</option>
			   </select>	
				</td>
				  <!--�����ο�-->
				  <td class=write_fc><input name='ext1_10' class=ed value='<?=$ext1_10?>' type='text' size='10' maxlength='7' onKeyDown='onlyNumber(this);' required itemname='�����ο�'>&nbsp;��</td>
				  <!--�з�-->
				  <td class=write_fc>
				  <select name="ext1_12" required itemname='���'>
						<option value="">�����ϼ���</option>
						<option value="����" <? if($ext1_12 == "����")	 echo "selected"; ?>>����</option>
						<option value="��������" <? if($ext1_12 == "��������")	 echo "selected"; ?>>��������</option>
						<option value="����" <? if($ext1_12 == "����")	 echo "selected"; ?>>����</option>
						<option value="���п���" <? if($ext1_12 == "���п���")	 echo "selected"; ?>>���п���</option>
				</select>
				  </td>
				  <!--���-->
				  <td class=write_fc>
				  <select name="ext1_11" required itemname='���'>
						<option value="">�����ϼ���</option>
						<option value="����" <? if($ext1_11 == "����")	 echo "selected"; ?>>����</option>
						<option value="1���̻�" <? if($ext1_11 == "1���̻�") echo "selected"; ?>>1���̻�</option>
						<option value="2���̻�" <? if($ext1_11 == "2���̻�") echo "selected"; ?>>2���̻�</option>
						<option value="3���̻�" <? if($ext1_11 == "3���̻�") echo "selected"; ?>>3���̻�</option>
						<option value="4���̻�" <? if($ext1_11 == "4���̻�") echo "selected"; ?>>4���̻�</option>
						<option value="5���̻�" <? if($ext1_11 == "5���̻�") echo "selected"; ?>>5���̻�</option>
						<option value="6���̻�" <? if($ext1_11 == "6���̻�") echo "selected"; ?>>6���̻�</option>
						<option value="7���̻�" <? if($ext1_11 == "7���̻�") echo "selected"; ?>>7���̻�</option>
						<option value="8���̻�" <? if($ext1_11 == "8���̻�") echo "selected"; ?>>8���̻�</option>
						<option value="9���̻�" <? if($ext1_11 == "9���̻�") echo "selected"; ?>>9���̻�</option>
						<option value="10���̻�" <? if($ext1_11 == "10���̻�") echo "selected"; ?>>10���̻�</option>
						</select>
				</td>
				  
				  <!--����-->
				  <td class=write_fc>
					<SELECT name='ext1_13' class='ed' required itemname='����'>
						 <OPTION value="" ?>����</OPTION>
						<option value='����' <? if($ext1_13 == "����") echo "selected"; ?>>����</option>
						<option value='23�� ����' <? if($ext1_13 == "23�� ����") echo "selected"; ?>>23�� ����</option>
						<option value='24�� ����' <? if($ext1_13 == "24�� ����") echo "selected"; ?>>24�� ����</option>
						<option value='25�� ����' <? if($ext1_13 == "25�� ����") echo "selected"; ?>>25�� ����</option>
						<option value='26�� ����' <? if($ext1_13 == "26�� ����") echo "selected"; ?>>26�� ����</option>
						<option value='27�� ����' <? if($ext1_13 == "27�� ����") echo "selected"; ?>>27�� ����</option>
						<option value='28�� ����' <? if($ext1_13 == "28�� ����") echo "selected"; ?>>28�� ����</option>
						<option value='29�� ����' <? if($ext1_13 == "29�� ����") echo "selected"; ?>>29�� ����</option>
						<option value='30�� ����' <? if($ext1_13 == "30�� ����") echo "selected"; ?>>30�� ����</option>
						<option value='31�� ����' <? if($ext1_13 == "31�� ����") echo "selected"; ?>>31�� ����</option>
						<option value='32�� ����' <? if($ext1_13 == "32�� ����") echo "selected"; ?>>32�� ����</option>
						<option value='33�� ����' <? if($ext1_13 == "33�� ����") echo "selected"; ?>>33�� ����</option>
						<option value='34�� ����' <? if($ext1_13 == "34�� ����") echo "selected"; ?>>34�� ����</option>
						<option value='35�� ����' <? if($ext1_13 == "35�� ����") echo "selected"; ?>>35�� ����</option>
						<option value='36�� ����' <? if($ext1_13 == "36�� ����") echo "selected"; ?>>36�� ����</option>
						<option value='37�� ����' <? if($ext1_13 == "37�� ����") echo "selected"; ?>>37�� ����</option>
						<option value='38�� ����' <? if($ext1_13 == "38�� ����") echo "selected"; ?>>38�� ����</option>
						<option value='39�� ����' <? if($ext1_13 == "39�� ����") echo "selected"; ?>>39�� ����</option>
						<option value='40�� ����' <? if($ext1_13 == "40�� ����") echo "selected"; ?>>40�� ����</option>
						<option value='41�� ����' <? if($ext1_13 == "41�� ����") echo "selected"; ?>>41�� ����</option>
						<option value='42�� ����' <? if($ext1_13 == "42�� ����") echo "selected"; ?>>42�� ����</option>
						<option value='43�� ����' <? if($ext1_13 == "43�� ����") echo "selected"; ?>>43�� ����</option>
						<option value='44�� ����' <? if($ext1_13 == "44�� ����") echo "selected"; ?>>44�� ����</option>
						<option value='45�� ����' <? if($ext1_13 == "45�� ����") echo "selected"; ?>>45�� ����</option>
						<option value='46�� ����' <? if($ext1_13 == "46�� ����") echo "selected"; ?>>46�� ����</option>
						<option value='47�� ����' <? if($ext1_13 == "47�� ����") echo "selected"; ?>>47�� ����</option>
						<option value='48�� ����' <? if($ext1_13 == "48�� ����") echo "selected"; ?>>48�� ����</option>
						<option value='49�� ����' <? if($ext1_13 == "49�� ����") echo "selected"; ?>>49�� ����</option>
						<option value='50�� ����' <? if($ext1_13 == "50�� ����") echo "selected"; ?>>50�� ����</option>
						<option value='51�� ����' <? if($ext1_13 == "51�� ����") echo "selected"; ?>>51�� ����</option>
						<option value='52�� ����' <? if($ext1_13 == "52�� ����") echo "selected"; ?>>52�� ����</option>
						<option value='53�� ����' <? if($ext1_13 == "53�� ����") echo "selected"; ?>>53�� ����</option>
						<option value='54�� ����' <? if($ext1_13 == "54�� ����") echo "selected"; ?>>54�� ����</option>
						<option value='55�� ����' <? if($ext1_13 == "55�� ����") echo "selected"; ?>>55�� ����</option>
					 </SELECT>
		  
				  
				  </td>				  
			</tr></table>
</td></tr></table>

<br>
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>�����ϼ�</td>
				  <td width="80%" class=write_fl>
				  <SELECT name='ext2_15' class='ed' required itemname='�����ϼ�'>
						 <OPTION value="" ?>����</OPTION>
						<option value='�� 1��' <? if($ext2_15 == "�� 1��") echo "selected"; ?>>�� 1��</option>
						<option value='�� 2��' <? if($ext2_15 == "�� 2��") echo "selected"; ?>>�� 2��</option>
						<option value='�� 3��' <? if($ext2_15 == "�� 3��") echo "selected"; ?>>�� 3��</option>
						<option value='�� 4��' <? if($ext2_15 == "�� 4��") echo "selected"; ?>>�� 4��</option>
						<option value='�� 5��' <? if($ext2_15 == "�� 5��") echo "selected"; ?>>�� 5��</option>
						<option value='�� 6��' <? if($ext2_15 == "�� 6��") echo "selected"; ?>>�� 6��</option>
						<option value='�� 7��' <? if($ext2_15 == "�� 7��") echo "selected"; ?>>�� 7��</option>
					</SELECT>
				  </td></tr>
			<tr><td class=write_cb>�ִ�����ð�</td>
				  <td class=write_fl><INPUT class=ed style="width:80;" name='ext2_16' id='ext2_16' value="<?=$ext2_16?>" maxlength='70'  itemname="�����ð�"> &nbsp;�ð�/��</td></tr>
		</table>
</td></tr></table>
</td></tr>


<tr><td colspan="2">
<br>
***���⼭��/�������/�޿�����
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>���⼭��</td>
				  <td width="80%" class=write_fl>
				  <INPUT class=ed style="width:98%;" name='ext1_03' id='ext1_03' value="<?=$ext1_03?>" maxlength='70'  itemname="���⼭��" required></td></tr>
			<tr><td class=write_cb>�ð�����</td>
				  <td class=write_fl>
				  
		  <INPUT type=radio name='ext1_04' required VALUE="�ð�����" <? if($ext1_04 == "�ð� ����")  echo "checked"; ?> checked>�ð� ���� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <INPUT type=radio name='ext1_04' required VALUE="�ð�����" <? if($ext1_04 == "�ð� ����")  echo "checked"; ?> >�ð� ����
				  </td></tr>
		  <tr><td class=write_cb>�޿�����</td>
				  <td class=write_fl>
				  �ּ� &nbsp;<INPUT class=ed style="width:80;text-align:right;" name='ext1_14' id='ext1_14' value="<?=$ext1_14?>" maxlength='70' onkeydown='onlyNumber(this);'  itemname="�ּұ޿�"> &nbsp;���� &nbsp;&nbsp;&nbsp;&nbsp;
						  �ִ� &nbsp;<INPUT class=ed style="width:80;text-align:right;" name='ext1_15' id='ext1_15' value="<?=$ext1_15?>" maxlength='70' onkeydown='onlyNumber(this);'  itemname="�ִ�޿�">&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;
			    <INPUT type=radio name='ext1_08' VALUE="�����İ���" <? if($ext1_08 == "�����İ���")  echo "checked"; ?>>�����İ���
				  </td></tr>
		<tr><td class=write_cb>������</td>
				  <td class=write_fl>
				  <INPUT type=radio name='ext1_16' required  VALUE="��" <? if($ext1_16 == "��")  echo "checked"; ?> >�� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<INPUT type=radio name='ext1_16' required  VALUE="��" <? if($ext1_16 == "��")  echo "checked"; ?> >��
				  </td></tr>
        <tr><td class=write_cb>������</td>
				  <td class=write_fl>
				  <input id="date" name='wr_5' maxlength="20" class=ed style="width:120;text-align:right;" required  value="<?=$write[wr_5]?>" maxlength='20'  itemname="�޷�1" />&nbsp;
                         <button height="10" onclick="win_calendar('date', document.getElementById('date').value, '-')"> ����
				  </td></tr>
	  </table>
</td></tr></table>

</td></tr>

<tr><td colspan="2">
<br>
***�������
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>�������</td>
				  <td width="80%" class=write_fl>
				    <input type=checkbox name="ext1_17" value="�¶��� ����" <? if($ext1_17 == "�¶��� ����")	 echo "checked"; ?>> �¶��� ����
				    <input type=checkbox name="ext1_18" value="�̸��� ����" <? if($ext1_18 == "�̸��� ����")	 echo "checked"; ?>> �̸��� ����
				    <input type=checkbox name="ext1_19" value="�����湮" <? if($ext1_19 == "�����湮")	 echo "checked"; ?>> �����湮
				    <input type=checkbox name="ext1_20" value="��ȭ����" <? if($ext1_20 == "��ȭ����")	 echo "checked"; ?>> ��ȭ����
	                 &nbsp;&nbsp;��Ÿ&nbsp;:&nbsp;<INPUT class=ed style="width:200;text-align:right;" name='ext2_09' value="<?=$ext2_09?>" maxlength='40'  itemname="��Ÿ�������"><br>
	<FONT color=#BF7878>�� �¶��� �������ý� ��������Ʈ, �̸��������� ����� �̸����� ���� �� �ֽʽÿ�.</font>
				  </td></tr>
			<tr><td class=write_cb>�����</td>
				  <td class=write_fl>
				  <INPUT class=ed style="width:120;text-align:right;" name='ext2_04' id='ext2_04' value="<?=$ext2_04?>" maxlength='70' itemname="�����" required>
				  </td></tr>
			<tr><td class=write_cb>����ó</td>
				  <td class=write_fl>
				  <SELECT name='ext2_05' class='ed' required itemname='����'>
		<option value=''>����</option>
        <option value='010' <? if($ext2_05 == "010") echo "selected"; ?>>010</option>
        <option value='011' <? if($ext2_05 == "011") echo "selected"; ?>>011</option>
        <option value='016' <? if($ext2_05 == "016") echo "selected"; ?>>016</option>
        <option value='019' <? if($ext2_05 == "019") echo "selected"; ?>>019</option>
      </select> - 
      <input name='ext2_06' class=ed value='<?=$ext2_06?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='�Ϲ���ȭ �ι�°�ڸ�' class=input>  - 
      <input name='ext2_07' class=ed value='<?=$ext2_07?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='�Ϲ���ȭ ����°�ڸ�' class=input>
	  </td></tr>
	  <tr><td class=write_cb>����� �̸���</td>
	 <td class=write_fl><input class='ed' maxlength=100 size=50 name=ext2_08 itemname="����" value="<?=$ext2_08?>"></td>
	 </tr>
			<tr><td class=write_cb>�αٱ���</td>
				  <td class=write_fl><INPUT class=ed style="width:98%;" name='ext2_17' id='ext2_17' value="<?=$ext2_17?>" maxlength='100'  itemname="�αٱ���"></td></tr>
		</table>
</td></tr></table>
</td></tr>

<? if ($w == "") { ?>
<tr><td colspan="2">
<br>
***�������(������ �ȵǹǷ� ������ �����Ͻʽÿ�.)<br>****���� <?=$member[mb_id]?>���� ����Ʈ��  <font color=#FF0000><?=$member[mb_point]?></font>���Դϴ�.
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>����ȵ��</td>
				  <td width="30%" class=write_fl>
				  <input name='wr_6' type="radio" value="-1" <? if ($write['wr_6'] == '-1') echo'checked';?> checked>��Ͼ���<br>
				  <input name='wr_6' type="radio" value="1" <? if ($write['wr_6'] == '1') echo'checked';?>>1��&nbsp;(100����Ʈ ����)<br>
				  <input name='wr_6' type="radio" value="2" <? if ($write['wr_6'] == '2') echo'checked';?>>2��&nbsp;(200����Ʈ ����)<br>
				  <input name='wr_6' type="radio" value="3" <? if ($write['wr_6'] == '3') echo'checked';?>>3��&nbsp;(300����Ʈ ����)<br>
				   <input name='wr_6' type="radio" value="4" <? if ($write['wr_6'] == '4') echo'checked';?>>4��&nbsp;(400����Ʈ ����)
				  </td>
				  <td width="50%" class=write_fc><img src="<?=$board_skin_path?>/img/sample_1.jpg"><br> ���������� ��ܿ� ����˴ϴ�.</td>
			</tr></table>
</td></tr></table>
<br>

<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>�����̾����</td>
				  <td width="30%" class=write_fl>
				  <input name='wr_4' type="radio" value="-1" <? if ($write['wr_4'] == '-1') echo'checked';?> checked>��Ͼ���<br>
				  <input name='wr_4' type="radio" value="1" <? if ($write['wr_4'] == '1') echo'checked';?>>1��&nbsp;(10����Ʈ ����)<br>
				  <input name='wr_4' type="radio" value="2" <? if ($write['wr_4'] == '2') echo'checked';?>>2��&nbsp;(20����Ʈ ����)<br>
				  <input name='wr_4' type="radio" value="3" <? if ($write['wr_4'] == '3') echo'checked';?>>3��&nbsp;(30����Ʈ ����)<br>
				   <input name='wr_4' type="radio" value="4" <? if ($write['wr_4'] == '4') echo'checked';?>>4��&nbsp;(40����Ʈ ����)
				  </td>
				  <td width="50%" class=write_fc><img src="<?=$board_skin_path?>/img/sample_2.jpg"><br> ���������� �ϴܿ� ����˴ϴ�.</td>
			</tr></table>
</td></tr></table>
</td></tr>
<br>
<?}?>

<tr><td colspan="2"><br>***���γ���<br></td></tr>

<tr>
    <td class='write_head' style='padding:5 0 5 10;' colspan='2'>
	
        <? if ($is_dhtml_editor) { ?>
            <?=cheditor2('wr_content', $content);?>
        <? } else { ?>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif"></span></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>����<?}?></td>
        </tr>
        </table>
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="����" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
    </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#dddddd></td></tr>

<? if ($is_link) { ?>
<? for ($i=2; $i<=$g4[link_count]; $i++) { ?>
<tr>
    <td class=write_head>��ũ #<?=$i?></td>
    <td><input type='text' class='ed' size=50 name='wr_link<?=$i?>' itemname='��ũ #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>
<? } ?>

<? if ($is_file) { ?>
<tr>
    <td class=write_head>
        <table cellpadding=0 cellspacing=0>
        <tr>
            <td class=write_head style="padding-top:10px; line-height:20px;">
                �п��ΰ���<br> 
                <span onclick="add_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_add.gif"></span> 
                <span onclick="del_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_minus.gif"></span>
            </td>
        </tr>
        </table>
    </td>
    <td style='padding:5 0 5 0;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script type="text/javascript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("�� �Խ����� "+upload_count+"�� ������ ���� ���ε尡 �����մϴ�.");
                return;
            }

            var objTbl;
            var objRow;
            var objCell;
            if (document.getElementById)
                objTbl = document.getElementById("variableFiles");
            else
                objTbl = document.all["variableFiles"];

            objRow = objTbl.insertRow(objTbl.rows.length);
            objCell = objRow.insertCell(0);

            objCell.innerHTML = "<input type='file' class='ed' name='bf_file[]' title='���� �뷮 <?=$upload_max_filesize?> ���ϸ� ���ε� ����'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class='ed' size=50 name='bf_content[]' title='���ε� �̹��� ���Ͽ� �ش� �Ǵ� ������ �Է��ϼ���.'>";
                <? } ?>
                ;
            }

            flen++;
        }

        <?=$file_script; //�����ÿ� �ʿ��� ��ũ��Ʈ?>

        function del_file()
        {
            // file_length ���Ϸδ� �ʵ尡 �������� �ʾƾ� �մϴ�.
            var file_length = <?=(int)$file_length?>;
            var objTbl = document.getElementById("variableFiles");
            if (objTbl.rows.length - 1 > file_length)
            {
                objTbl.deleteRow(objTbl.rows.length - 1);
                flen--;
            }
        }
        </script>
		�̹��� ������� 120 x 50 �� �����մϴ�.
		</td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_trackback) { ?>
<tr>
    <td class=write_head>Ʈ�����ּ�</td>
    <td><input class='ed' size=50 name=wr_trackback itemname="Ʈ����" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">�� ����<? } ?></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_guest) { ?>
<tr>
    <td class=write_head><img id='kcaptcha_image' /></td>
    <td><input class='ed' type=input size=10 name=wr_key itemname="�ڵ���Ϲ���" required>&nbsp;&nbsp;������ ���ڸ� �Է��ϼ���.</td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="100%" align="center" valign="top" style="padding-top:30px;">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
</tr>
</table>

</td></tr></table>
</form>
<script>
function onlyNumber(objtext1){
var inText = objtext1.value;
var ret;

for (var i = 0; i < inText.length; i++) {
ret = inText.charCodeAt(i);
if (!((ret > 47) && (ret < 58))) {
alert("���ڸ��� �Է��ϼ���");
objtext1.value = "";
objtext1.focus();
return false;
}
}
if (objtext1.value.length==6) {
document.form1.RNI_idnum2.focus() ;
}
return true;
}
</script>
<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
<?
// �����ڶ�� �з� ���ÿ� '����' �ɼ��� �߰���
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
       // document.fwrite.ca_name.options.length += 1;
        //document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '����';
        //document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '����';
    }";
} 
?>

with (document.fwrite) 
{
    if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();

    if (typeof(ca_name) != "undefined")
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj) 
{
    if (obj.checked) {
        result = confirm("�ڵ� �ٹٲ��� �Ͻðڽ��ϱ�?\n\n�ڵ� �ٹٲ��� �Խù� ������ �ٹٲ� ����<br>�±׷� ��ȯ�ϴ� ����Դϴ�.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_submit(f) 
{
    /*
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("���� �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return false;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return false;
    }
    */

    if (document.getElementById('char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(document.getElementById('char_count').innerHTML);
            if (char_min > 0 && char_min > cnt) {
                alert("������ "+char_min+"���� �̻� ���ž� �մϴ�.");
                return false;
            } 
            else if (char_max > 0 && char_max < cnt) {
                alert("������ "+char_max+"���� ���Ϸ� ���ž� �մϴ�.");
                return false;
            }
        }
    }

    if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('������ �Է��Ͻʽÿ�.'); 
            ed_wr_content.returnFalse();
            return false;
        }
    }

    <?
    if ($is_dhtml_editor) echo cheditor3('wr_content');
    ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: "<?=$board_skin_path?>/ajax.filter.php",
        type: "POST",
        data: {
            "subject": f.wr_subject.value,
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (subject) {
        alert("���� �����ܾ�('"+subject+"')�� ���ԵǾ��ֽ��ϴ�");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("���뿡 �����ܾ�('"+content+"')�� ���ԵǾ��ֽ��ϴ�");
        if (typeof(ed_wr_content) != "undefined") 
            ed_wr_content.returnFalse();
        else 
            f.wr_content.focus();
        return false;
    }

    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';";
    else
        echo "f.action = './write_update.php';";
    ?>
    
    return true;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>
