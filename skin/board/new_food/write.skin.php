<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�
if ($w == "u") {
	$wr_body_1 = explode("|",substr($write[wr_1], 1));
	$wr_body_2 = explode("|",substr($write[wr_2], 1));
	}

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}
?>
<? 
// �ּ��Է�ó���ϴ� �����ʵ�(������ 'wr_3' �����ʵ带 �ٽ� �ɰ��� Ȯ���ʵ�� ����)
//[����] �����ʵ带 ������Ʈ�ϱ� ���ؼ��� 'write_update.skin.php' �� �����

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

$p_four = explode("|",$write[wr_4]);
$four01 = $p_four[0];
$four02 = $p_four[1];
$four03 = $p_four[2];
$four04 = $p_four[3];
$four05 = $p_four[4];
$four06 = $p_four[5];
$four07 = $p_four[6];
$four08 = $p_four[7];
$four09 = $p_four[8];
$four10 = $p_four[9];
$four11 = $p_four[10];
$four12 = $p_four[11];
$four13 = $p_four[12];
$four14 = $p_four[13];
$four15 = $p_four[14];
$four16 = $p_four[15];
$four17 = $p_four[16];
$four18 = $p_four[17];
$four19 = $p_four[18];
$four20 = $p_four[19];
$four21 = $p_four[20];
$four22 = $p_four[21];
$four23 = $p_four[22];
$four24 = $p_four[23];
$four25 = $p_four[24];
$four26 = $p_four[25];
$four27 = $p_four[26];
$four28 = $p_four[27];
$four29 = $p_four[28];
$four30 = $p_four[29];
?>
<div style="height:14px; line-height:1px; font-size:1px;">&nbsp;</div>
<script>
function addRow() {
	var oRow = dyntbl1.insertRow();
		oRow.onmouseover=function(){dyntbl1.clickedRowIndex=this.rowIndex};
		var oCell1 = oRow.insertCell();
		var oCell2 = oRow.insertCell();
		var oCell6 = oRow.insertCell();
		oCell1.innerHTML = "<input class=ed style='width:200;' required name=wr_body_1[] itemname='�޴�' maxlength='60'>";
		oCell2.innerHTML = "<input class=ed style='width:200;' name=wr_body_2[] itemname='����' maxlength='60'>";
		oCell6.innerHTML = "<input type=button value=\" ���� \" onClick=\"delRow()\">";
		document.recalc();
}
function delRow() {
	dyntbl1.deleteRow(dyntbl1.clickedRowIndex);
}

function delRow_php(r)
{
var i=r.parentNode.parentNode.rowIndex;
document.getElementById('dyntbl2').deleteRow(i);
}

function fixscreen() {
	var buffer = document.all.item(0).outerHTML;
	document.open("text/html", "replace");
	document.write(buffer);
	document.close();
}

function addCol() {
	var vCell,tmp;
		for (var i=0; i<dyntbl1.rows.length; i++) {
		tmp=dyntbl1.rows[i].cells[dyntbl1.rows[i].cells.length-1].cloneNode(true);
		dyntbl1.rows[i].deleteCell();
		vCell=dyntbl1.rows[i].insertCell();
		vCell.innerHTML=i==0?"<input type=button value=' X ' onclick='delCol(parentNode.cellIndex)'>":"&nbsp;";
		vCell=dyntbl1.rows[i].insertCell();
		vCell.innerHTML=tmp.innerHTML;
		}
}
function delCol(idx) {
	for (var i=0; i<=dyntbl1.rows.length; i++) {
	dyntbl1.rows[i].cells[idx].removeNode();
	}
}
</script>

<style type="text/css">
.write_head { height:30px; text-align:center; color:#8492A0; }
.field { border:1px solid #ccc; }
</style>

<script language="javascript">
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
    <td><?=$option?></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_category) { ?>
<tr>
    <td class=write_head>�� ��</td>
    <td><select name=ca_name required itemname="�з�"><option value="">�����ϼ���<?=$category_option?></select></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr>
    <td class=write_head>��ü��</td>
    <td><input class='ed' style="width:100%;" name=wr_subject id="wr_subject" itemname="����" required value="<?=$subject?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>��ȭ��ȣ</td>
    <td><input class="input" style="width:100%;" name=four01 itemname="��ȭ��ȣ" required value="<?=$four01?>"></td></tr>
		
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>�����ð�</td>
    <td><input class="input" style="width:40%;" name=four02 itemname="�����ð�1" value="<?=$four02?>">&nbsp;���� &nbsp;&nbsp;&nbsp;
		<input class="input" style="width:40%;" name=four14 itemname="�����ð�2" value="<?=$four14?>">&nbsp;����</td></tr>
		
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>��  ��</td>
    <td><input class="input" style="width:100%;" name=four03 itemname="����" value="<?=$four03?>"></td></tr>
		
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>


<tr>
    <td class=write_head>�����ü�</td>
    <td><input name=four04 type="radio" value="��������" <? if ($four04 == '��������') echo'checked';?> checked>��������
		<input name=four04 type="radio" value="���������" <? if ($four04 == '���������') echo'checked';?>>��������� </td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>��ް�������</td>
    <td>
		
		<input type="checkbox" name="four05" value="�Ͽ���" <? if ($four05 == '�Ͽ���') echo "checked";?>>�Ͽ���</label>&nbsp;&nbsp;
		<input type="checkbox" name="four06" value="�̿���" <? if ($four06 == '�̿���') echo "checked";?>>�̿���</label>&nbsp;&nbsp;
		<input type="checkbox" name="four07" value="�����" <? if ($four07 == '�����') echo "checked";?>>�����</label>&nbsp;&nbsp;
		<input type="checkbox" name="four08" value="�����" <? if ($four08 == '�����') echo "checked";?>>�����</label>&nbsp;&nbsp;
		<input type="checkbox" name="four09" value="������" <? if ($four09 == '������') echo "checked";?>>������</label>&nbsp;&nbsp;
		<input type="checkbox" name="four10" value="������" <? if ($four10 == '������') echo "checked";?>>������</label>&nbsp;&nbsp;
		<input type="checkbox" name="four11" value="ĥ����" <? if ($four11 == 'ĥ����') echo "checked";?>>ĥ����</label><br>
		<input type="checkbox" name="four12" value="������" <? if ($four12 == '������') echo "checked";?>>������</label>&nbsp;&nbsp;
		<input type="checkbox" name="four13" value="��޺Ұ�" <? if ($four13 == '��޺Ұ�') echo "checked";?>>��޺Ұ�</label>&nbsp;&nbsp;
	
	</td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>



<tr>
    <td class=write_head style='padding-left:20px;'>����</td>
    <td style='padding:5 0 5 0;'>
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
        <? if ($write_min || $write_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
    </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#dddddd></td></tr>
<!-- �޴��Է�-->
<tr><td colspan=2>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan=2 height=40 align="right"><input type=button value="�޴� �߰� +" onClick="addRow()"></td></tr>
<tr>
	<td colspan="2">

	<table width="100%" cellspacing=1 cellpadding=3 bgcolor="#EEEEEE">
	<col bgcolor="#FFFFFF" align="center" width="250"></col>
	<col bgcolor="#FFFFFF" align="center" width="250"></col>
	<col bgcolor="#FFFFFF" align="center" width=""></col>
	<tr height="30">
		<td><b>�޴�</b></td>
		<td><b>����</b></td>
		<td><b>����</b></td>
	</tr>
	</table>
<?	if ($w == "u") { ?>
	<table id=dyntbl2 width="100%" cellspacing=1 cellpadding=3 bgcolor="#EEEEEE">
	<col bgcolor="#FFFFFF" align="center" width="250"></col>
	<col bgcolor="#FFFFFF" align="center" width="250"></col>
	<col bgcolor="#FFFFFF" align="center" width=""></col>
<div>
<? for ($i = 0;  $i < count($wr_body_1); $i++) { ?>
	<tr height="30" id=v_<?=$i?>>
		<td><input class=ed style='width:200;' required name=wr_body_1[] itemname='�޴�' value='<?=$wr_body_1[$i]?>' maxlength='40'></td>
		<td>
				<input class=ed style='width:200;' name=wr_body_2[] itemname='����' value='<?=$wr_body_2[$i]?>' maxlength='60'>
		</td>
		<td><input type=button value=" ���� " onClick="delRow_php(this)"></td>
	</tr>
<? } ?>
</div>
	</table>
<?	} ?>
<table id=dyntbl1 width="100%" cellspacing=1 cellpadding=3 bgcolor="#EEEEEE">
	<col bgcolor="#FFFFFF" align="center" width="250"></col>
	<col bgcolor="#FFFFFF" align="center" width="250"></col>
	<col bgcolor="#FFFFFF" align="center" width=""></col>
	</table>
	</td>
</tr></table>
</td></tr>
<!--�޴��� ��-->
<tr><td colspan=2 height=1 bgcolor=#dddddd></td></tr>
<tr>
    <td class=write_head>���ô� ��</td>
    <td><input class="input" style="width:80%;" name=wr_5 itemname="�൵" value="<?=$write[wr_5]?>">[���ܼ���]</td></tr>
		
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<!--�ּ��Է�-->
<tr>
	 <td height="25" class=mw_basic_write_title>�� ��ġ(����)</td>
	 <td height="25">
	 <input class=ed type=text name='ext3_00' value='<?=$ext3_00?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�����ȣ ���ڸ�'>
      - 
      <input class=ed type=text name='ext3_01' value='<?=$ext3_01?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�����ȣ ���ڸ�'>
      &nbsp;<a href="javascript:;" onclick="win_zip('fwrite', 'ext3_00', 'ext3_01', 'ext3_02', 'ext3_03');"><img  src="<?=$board_skin_path?>/img/icon_addr.gif" height=19 width=85 align='absmiddle' border=0></a>
	 </td></tr>

	 <tr>
	 <td height="25"></td>
	 <td height="25">
		<input class=ed type=text name='ext3_02' value='<?=$ext3_02?>' size=60 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�ּ�'>
	 </td></tr>

     <tr>
	 <td height="25"></td>
	 <td height="25" colspan="2">
		<input class=ed  type=text name='ext3_03'  value='<?=$ext3_03?>' size=60 <?=$config[cf_req_addr]?'required':'';?> itemname='���ּ�'>
		&nbsp;<font color=#999999>(���ּ�)</font>
	 </td></tr>

	<!---------- ������� ----------------------------------------------------//-->
<tr><td colspan=2 height=1 bgcolor=#dddddd></td></tr>


<? if ($is_link) { ?>
<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
<tr>
    <td class=write_head>��ũ #<?=$i?></td>
    <td><input type='text' class='ed' size=50 name='wr_link<?=$i?>' itemname='��ũ #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>
<? } ?>



<? if ($is_file) { ?>
<tr>
    <td style='padding-left:20px; height:30px;'><table cellpadding=0 cellspacing=0><tr><td style=" padding-top: 10px;">�� ���� <span onclick="add_file();" style='cursor:pointer; font-family:tahoma; font-size:12pt;'>+</span> <span onclick="del_file();" style='cursor:pointer; font-family:tahoma; font-size:12pt;'>-</span></td></tr></table></td>
    <td style='padding:5 0 5 0;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script language="JavaScript">
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

            objCell.innerHTML = "<input type='file' class=ed size=70 name='bf_file[]' title='���� �뷮 <?=$upload_max_filesize?> ���ϸ� ���ε� ����'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><textarea cols=97 rows=2 class=ed name='bf_content[]' title='���ε� �̹��� ���Ͽ� �ش� �Ǵ� ������ ��.��.�� �Է��ϼ���.'></textarea>";
                <? } ?>
                ;
            }

            flen++;
        }

			<? // str_replace �̿�  <textarea> ����� ���ؾ��ε� ��� ����  
			
			$file_script = str_replace("add_file('');\n", "add_file('');", $file_script); 
			$file_script = str_replace("<input type='text' class=ed size=50", "<textarea cols=97 rows=2", $file_script);
			$file_script = str_replace("' title='���ε� �̹��� ���Ͽ� �ش� �Ǵ� ������ �Է��ϼ���.'>", "</textarea>", $file_script);
			$file_script = preg_replace("/(name='bf_content\[[0-9]*]') value='/", "\\1 title='���ε� �̹��� ���Ͽ� �ش� �Ǵ� ������ ��.��.�� �Է��ϼ���.'>", $file_script);
			$file_script = str_replace(array("\r","\n","</"), array("","\\n","<\\/"), $file_script);
			echo str_replace('/textarea>");\n', '/textarea>");', $file_script);
			
			?> 


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
        </script></td>
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
    <td class=write_head><img id='kcaptcha_image' border='0' width=120 height=60 onclick="imageClick();" style="cursor:pointer;" title="���ڰ� �߾Ⱥ��̴� ��� Ŭ���Ͻø� ���ο� ���ڰ� ���ɴϴ�."></td>
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

<script type="text/javascript"> var md5_norobot_key = ''; </script>
<script type="text/javascript" src="<?="$g4[path]/js/prototype.js"?>"></script>
<script type="text/javascript">
function imageClick() {
    var url = "<?=$g4[bbs_path]?>/kcaptcha_session.php";
    var para = "";
    var myAjax = new Ajax.Request(
        url, 
        {
            method: 'post', 
            asynchronous: true,
            parameters: para, 
            onComplete: imageClickResult
        });
}

function imageClickResult(req) { 
    var result = req.responseText;
    var img = document.createElement("IMG");
    img.setAttribute("src", "<?=$g4[bbs_path]?>/kcaptcha_image.php?t=" + (new Date).getTime());
    document.getElementById('kcaptcha_image').src = img.getAttribute('src');

    md5_norobot_key = result;
}

<? if (!$is_member) { ?>Event.observe(window, "load", imageClick);<? } ?>

<?
// �����ڶ�� �з� ���ÿ� '����' �ɼ��� �߰���
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '����';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '����';
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
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("���� �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return false;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return false;
    }

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

    <?
    if ($is_dhtml_editor) echo cheditor3('wr_content');
    ?>

    if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('������ �Է��Ͻʽÿ�.'); 
            ed_wr_content.returnFalse();
            return false;
        }
    }

    if (typeof(f.wr_key) != 'undefined') {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) {
            alert('�ڵ���Ϲ����� ���ڰ� ����� �Էµ��� �ʾҽ��ϴ�.');
            f.wr_key.select();
            f.wr_key.focus();
            return false;
        }
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

<script language="JavaScript" src="<?="$g4[path]/js/board.js"?>"></script>
<script language="JavaScript"> window.onload=function() { drawFont(); } </script>
