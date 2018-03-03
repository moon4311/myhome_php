<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<script language="JavaScript">
// 글자수 제한
var char_min = parseInt(<?=$comment_min?>); // 최소
var char_max = parseInt(<?=$comment_max?>); // 최대
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
                <span id='edit_<?=$comment_id?>' style='display:none;'></span><!-- 수정 -->
                <span id='reply_<?=$comment_id?>' style='display:none;'></span><!-- 답변 -->
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
				<? if ($list[$i][is_reply]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'c');\"><img src='$board_skin_path/img/creply.gif' border=0 align=absmiddle  title='코멘트 답변'></a> "; } ?>
					<? if ($list[$i][is_edit]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'cu');\"><img src='$board_skin_path/img/cupdate.gif' border=0 align=absmiddle title='코멘트 수정'></a> "; } ?>
                    <? if ($list[$i][is_del])  { echo "<a href=\"javascript:comment_delete('{$list[$i][del_link]}');\"><img src='$board_skin_path/img/cdelete.gif' border=0 align=absmiddle title='코멘트 삭제'></a> "; } ?>
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
		<select name='wr_3' itemname="별점">
				<option value=''>별점주기</option>
				<option value='10'>★★★★★ 10점
                <option value='9'>★★★★★ 9점
				<option value='8'>☆★★★★ 8점
				<option value='7'>☆★★★★ 7점
				<option value='6'>☆☆★★★ 6점
				<option value='5'>☆☆★★★ 5점
				<option value='4'>☆☆☆★★ 4점
				<option value='3'>☆☆☆★★ 3점
				<option value='2'>☆☆☆☆★ 2점
				<option value='1'>☆☆☆☆★ 1점
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
		<? if ($comment_min || $comment_max) { ?><span id=char_count></span>자<? }?>
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
	<td><textarea id="wr_content" name="wr_content" rows="10" itemname="내용" required 
            <? if ($comment_min || $comment_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<? }?> style='width:100%; word-break:break-all;'></textarea>
            <? if ($comment_min || $comment_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><? }?>
			</td>
			</tr>
	
	<tr><td>
	<table width="100%" cellpadding="0" >
      <tr>
        <td><? if ($is_guest) { ?>
        <font color="gray">이름</font> <INPUT type=text maxLength=20 size=10 name="wr_name" itemname="이름" required>
        <font color="gray">패스워드</font> <INPUT type=password maxLength=20 size=10 name="wr_password" itemname="패스워드" required>
            <? if ($is_norobot) { ?>
                <?=$norobot_str?>
                <INPUT title="왼쪽의 글자중 빨간글자만 순서대로 입력하세요." size=10 type="input" name="wr_key" itemname="자동등록방지" required>
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
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자

    var s;
    if (s = word_filter_check(document.getElementById('wr_content').value))
    {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        document.getElementById('wr_content').focus();
        return false;
    }

    // 양쪽 공백 없애기
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자
    document.getElementById('wr_content').value = document.getElementById('wr_content').value.replace(pattern, "");
    if (char_min > 0 || char_max > 0)
    {
        check_byte('wr_content', 'char_count');
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("코멘트는 "+char_min+"글자 이상 쓰셔야 합니다.");
            return false;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("코멘트는 "+char_max+"글자 이하로 쓰셔야 합니다.");
            return false;
        }
    }
    else if (!document.getElementById('wr_content').value)
    {
        alert("코멘트를 입력하여 주십시오.");
        return false;
    }

    if (typeof(f.wr_name) != 'undefined')
    {
        f.wr_name.value = f.wr_name.value.replace(pattern, "");
        if (f.wr_name.value == '')
        {
            alert('이름이 입력되지 않았습니다.');
            f.wr_name.focus();
            return false;
        }
    }

    if (typeof(f.wr_password) != 'undefined')
    {
        f.wr_password.value = f.wr_password.value.replace(pattern, "");
        if (f.wr_password.value == '')
        {
            alert('패스워드가 입력되지 않았습니다.');
            f.wr_password.focus();
            return false;
        }
    }

    if (typeof(f.wr_key) != 'undefined')
    {
        if (hex_md5(f.wr_key.value) != md5_norobot_key)
        {
            alert('자동등록방지용 빨간글자가 순서대로 입력되지 않았습니다.');
            f.wr_key.focus();
            return false;
        }
    }

    return true;
}

function comment_box(comment_id, work)
{
    var el_id;
    // 코멘트 아이디가 넘어오면 답변, 수정
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
        // 코멘트 수정
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
    if (confirm("이 코멘트를 삭제하시겠습니까?")) location.href = url;
}
comment_box('', 'c'); // 코멘트 입력폼이 보이도록 처리하기위해서 추가
</script>

<? if($cwin==1) { ?>
<p align=center>
<a href="javascript:window.close();"><img src="<?=$board_skin_path?>/img/cancel.gif" border="0"></a>
<? }?>