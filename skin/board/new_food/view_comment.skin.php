<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�
?>

<script language="JavaScript">
// ���ڼ� ����
var char_min = parseInt(<?=$comment_min?>); // �ּ�
var char_max = parseInt(<?=$comment_max?>); // �ִ�
</script>
<table width="100%" >
  <tr>
    <td><table width="100%" cellpadding="3" cellspacing="1" bgcolor="dddddd" >
        <tr>
          <td bgcolor="ffffff"><table width="100%" cellpadding="3" bgcolor="f8f8f9" >
            <tr>
              <td>
			  
			  
<?
for ($i=0; $i<count($list); $i++) {
    $comment_id = $list[$i][wr_id];
?>
<a name="c_<?=$comment_id?>"></a>

<table width="100%" cellpadding="0" >
  <tr>
    <td><table width=100% cellpadding="0" >
  <tr valign=top>
    <td><? for ($k=0; $k<strlen($list[$i][wr_comment_reply]); $k++) echo " &nbsp; "; ?></td>
     <td>
	 <table width="100%" >
  <tr valign="top">
    <td width="100">
                  <table width="100%" >
                    <tr>
                      <td><? if ($list[$i][wr_10]){?>
				  <img src="<?=$board_skin_path?>/img/<?=$list[$i][wr_10]?>.gif" align="absbottom">
				  <? } else {?>
				  <img src="<?=$board_skin_path?>/img/01.gif" align="absbottom">
				  <? } ?><?=$list[$i][name]?></td>
                    </tr>
                  </table>	</td>
    <td bgcolor="ffffff"><table width="100%" cellpadding="3" >
  <tr>
    <td class="bbs"><?=$list[$i][content]?>
                <? if ($list[$i][trackback]) { echo "<p>".$list[$i][trackback]."</p>"; } ?>
                <span id='edit_<?=$comment_id?>' style='display:none;'></span><!-- ���� -->
                <span id='reply_<?=$comment_id?>' style='display:none;'></span><!-- �亯 -->
				</td>
  </tr>
</table>
<table width="100%" cellpadding="0" >
  <tr>
    <td height="1" background="<?=$board_skin_path?>/img/dot.gif"></td>
  </tr>
</table>

      <table width="100%" cellpadding="0" >
        <tr>
          <td> <? if ($list[$i][wr_3] == "10"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif">
				  <? } else if ($list[$i][wr_3] == "9"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st2.gif">
				  <? } else if ($list[$i][wr_3] == "8"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? } else if ($list[$i][wr_3] == "7"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st2.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? } else if ($list[$i][wr_3] == "6"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? } else if ($list[$i][wr_3] == "5"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st2.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? } else if ($list[$i][wr_3] == "4"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? } else if ($list[$i][wr_3] == "3"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st2.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? } else if ($list[$i][wr_3] == "2"){?>
				  <img src="<?=$board_skin_path?>/img/st1.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? } else if ($list[$i][wr_3] == "1"){?>
				  <img src="<?=$board_skin_path?>/img/st2.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? } else {?>
				  <img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif"><img src="<?=$board_skin_path?>/img/st3.gif">
				  <? }?></td>
          <td align="right"><font color="gray"><span style="font-size:8pt"><?=$list[$i][datetime]?> | <? if ($is_ip_view) { echo "{$list[$i][ip]}"; } ?></span></font>
				<? if ($list[$i][is_reply]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'c');\"><img src='$board_skin_path/img/creply.gif' border=0 align=absmiddle  title='�ڸ�Ʈ �亯'></a> "; } ?>
					<? if ($list[$i][is_edit]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'cu');\"><img src='$board_skin_path/img/cupdate.gif' border=0 align=absmiddle title='�ڸ�Ʈ ����'></a> "; } ?>
                    <? if ($list[$i][is_del])  { echo "<a href=\"javascript:comment_delete('{$list[$i][del_link]}');\"><img src='$board_skin_path/img/cdelete.gif' border=0 align=absmiddle title='�ڸ�Ʈ ����'></a> "; } ?>
                </td>
        </tr>
      </table></td>
  </tr>
</table>
		<textarea id='save_comment_<?=$comment_id?>' style='display:none;'><?=get_text($list[$i][wr_content], 0)?></textarea>
	 </td>
  </tr>
</table></td>
  </tr>
    <tr>
  <td height="1" background="<?=$board_skin_path?>/img/dot.gif"></td>
  </tr>
</table>

<? } ?>
			  
<span id=comment_write style='display:none;'> 
<form name="fviewcomment" method="post" action="./write_comment_update.php" onsubmit="return fviewcomment_submit(this);" autocomplete="off" style="margin:0px;">
<input type=hidden name=w           id=w value='c'>
<input type=hidden name=bo_table    value='<?=$bo_table?>'>
<input type=hidden name=wr_id       value='<?=$wr_id?>'>
<input type=hidden name=comment_id  id='comment_id' value=''>
<input type=hidden name=sca         value='<?=$sca?>' >
<input type=hidden name=sfl         value='<?=$sfl?>' >
<input type=hidden name=stx         value='<?=$stx?>'>
<input type=hidden name=spt         value='<?=$spt?>'>
<input type=hidden name=page        value='<?=$page?>'>
<input type=hidden name=cwin        value='<?=$cwin?>'>
<table width="100%" >
  <tr>
    <td>
	<table width="100%" cellpadding="0" >
      <tr>
        <td>
		<select name='wr_3' itemname="����">
				<option value=''>�����ֱ�</option>
				<option value='10'>�ڡڡڡڡ� 10��
                <option value='9'>�ڡڡڡڡ� 9��
				<option value='8'>�١ڡڡڡ� 8��
				<option value='7'>�١ڡڡڡ� 7��
				<option value='6'>�١١ڡڡ� 6��
				<option value='5'>�١١ڡڡ� 5��
				<option value='4'>�١١١ڡ� 4��
				<option value='3'>�١١١ڡ� 3��
				<option value='2'>�١١١١� 2��
				<option value='1'>�١١١١� 1��
                </select>
				&nbsp; &nbsp;
		<img src="<?=$board_skin_path?>/img/01.gif" align=absmiddle>
		<input name=wr_10 type='radio' value='01' checked>
		<img src="<?=$board_skin_path?>/img/02.gif" align=absmiddle>
		<input name=wr_10 type='radio' value='02'>
		<img src="<?=$board_skin_path?>/img/03.gif" align=absmiddle>
		<input name=wr_10 type='radio' value='03'>
		<img src="<?=$board_skin_path?>/img/04.gif" align=absmiddle>
		<input name=wr_10 type='radio' value='04'>
		<img src="<?=$board_skin_path?>/img/05.gif" align=absmiddle>
		<input name=wr_10 type='radio' value='05'>
		<img src="<?=$board_skin_path?>/img/06.gif" align=absmiddle>
		<input name=wr_10 type='radio' value='06'>
		<img src="<?=$board_skin_path?>/img/07.gif" align=absmiddle>
		<input name=wr_10 type='radio' value='07'>
		</td>
		<td align="right">
		<? if ($comment_min || $comment_max) { ?><span id=char_count></span>��<? }?>
		</td>
        <td align="right" width="60">
		<span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif" ></span>
    <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif" ></span>
    <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif" ></span>
	</td>
      </tr>
    </table></td>
	</tr>
	<tr>
	<td><textarea id="wr_content" name="wr_content" rows="10" itemname="����" required 
            <? if ($comment_min || $comment_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<? }?> style='width:100%; word-break:break-all;'></textarea>
            <? if ($comment_min || $comment_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><? }?>
			</td>
			</tr>
	
	<tr><td>
	<table width="100%" cellpadding="0" >
      <tr>
        <td><? if ($is_guest) { ?>
        <font color="gray">�̸�</font> <INPUT type=text maxLength=20 size=10 name="wr_name" itemname="�̸�" required>
        <font color="gray">�н�����</font> <INPUT type=password maxLength=20 size=10 name="wr_password" itemname="�н�����" required>
            <? if ($is_norobot) { ?>
                <?=$norobot_str?>
                <INPUT title="������ ������ �������ڸ� ������� �Է��ϼ���." size=10 type="input" name="wr_key" itemname="�ڵ���Ϲ���" required>
            <? }?><? }?></td>
        <td align="right"><input type="image" src="<?=$board_skin_path?>/img/com.gif" border=0 align=absmiddle  accesskey='s'></td>
      </tr>
    </table>
	</td>
	</tr>
</table>

</form> 
</span>  
			  
			  
			  
			  </td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>


<script language='JavaScript'>
var save_before = '';
var save_html = document.getElementById('comment_write').innerHTML;
function fviewcomment_submit(f)
{
    var pattern = /(^\s*)|(\s*$)/g; // \s ���� ����

    var s;
    if (s = word_filter_check(document.getElementById('wr_content').value))
    {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        document.getElementById('wr_content').focus();
        return false;
    }

    // ���� ���� ���ֱ�
    var pattern = /(^\s*)|(\s*$)/g; // \s ���� ����
    document.getElementById('wr_content').value = document.getElementById('wr_content').value.replace(pattern, "");
    if (char_min > 0 || char_max > 0)
    {
        check_byte('wr_content', 'char_count');
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("�ڸ�Ʈ�� "+char_min+"���� �̻� ���ž� �մϴ�.");
            return false;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("�ڸ�Ʈ�� "+char_max+"���� ���Ϸ� ���ž� �մϴ�.");
            return false;
        }
    }
    else if (!document.getElementById('wr_content').value)
    {
        alert("�ڸ�Ʈ�� �Է��Ͽ� �ֽʽÿ�.");
        return false;
    }

    if (typeof(f.wr_name) != 'undefined')
    {
        f.wr_name.value = f.wr_name.value.replace(pattern, "");
        if (f.wr_name.value == '')
        {
            alert('�̸��� �Էµ��� �ʾҽ��ϴ�.');
            f.wr_name.focus();
            return false;
        }
    }

    if (typeof(f.wr_password) != 'undefined')
    {
        f.wr_password.value = f.wr_password.value.replace(pattern, "");
        if (f.wr_password.value == '')
        {
            alert('�н����尡 �Էµ��� �ʾҽ��ϴ�.');
            f.wr_password.focus();
            return false;
        }
    }

    if (typeof(f.wr_key) != 'undefined')
    {
        if (hex_md5(f.wr_key.value) != md5_norobot_key)
        {
            alert('�ڵ���Ϲ����� �������ڰ� ������� �Էµ��� �ʾҽ��ϴ�.');
            f.wr_key.focus();
            return false;
        }
    }

    return true;
}

function comment_box(comment_id, work)
{
    var el_id;
    // �ڸ�Ʈ ���̵� �Ѿ���� �亯, ����
    if (comment_id)
    {
        if (work == 'c')
            el_id = 'reply_' + comment_id;
        else
            el_id = 'edit_' + comment_id;
    }
    else
        el_id = 'comment_write';

    if (save_before != el_id)
    {
        if (save_before)
        {
            document.getElementById(save_before).style.display = 'none';
            document.getElementById(save_before).innerHTML = '';
        }

        document.getElementById(el_id).style.display = '';
        document.getElementById(el_id).innerHTML = save_html;
        // �ڸ�Ʈ ����
        if (work == 'cu')
        {
            document.getElementById('wr_content').value = document.getElementById('save_comment_' + comment_id).value;
            if (typeof char_count != 'undefined')
                check_byte('wr_content', 'char_count');
        }

        document.getElementById('comment_id').value = comment_id;
        document.getElementById('w').value = work;

        save_before = el_id;
    }
}

function comment_delete(url)
{
    if (confirm("�� �ڸ�Ʈ�� �����Ͻðڽ��ϱ�?")) location.href = url;
}
comment_box('', 'c'); // �ڸ�Ʈ �Է����� ���̵��� ó���ϱ����ؼ� �߰�
</script>

<? if($cwin==1) { ?>
<p align=center>
<a href="javascript:window.close();"><img src="<?=$board_skin_path?>/img/cancel.gif" border="0"></a>
<? }?>