<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
include "$g4[path]/skin/multi_category/lib.php";
?>
<?
$ex1_filed = explode("|",$view[wr_1]); 
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

$ex2_filed = explode("|",$view[wr_2]); 
$ext2_00  = $ex2_filed[0];
$ext2_01  = $ex2_filed[1];
$ext2_02  = $ex2_filed[2];
$ext2_03  = $ex2_filed[3];
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
$ext2_19  = $ex2_filed[19];

$ex3_filed = explode("|",$view[wr_3]); 
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
?>
<!-- [����] �ɼ��ʵ� --��-->
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

<div style="height:12px; line-height:1px; font-size:1px;">&nbsp;</div>

<!-- �Խñ� ���� ���� -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>


<div style="clear:both; height:30px;">
    <div style="float:left; margin-top:6px;">
    <img src="<?=$board_skin_path?>/img/icon_date.gif" align=absmiddle border='0'>
    <span style="color:#888888;">�ۼ��� : <?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></span>
    </div>

    <!-- ��ũ ��ư -->
    <div style="float:right;">
    <? 
    ob_start(); 
    ?>
    <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/btn_copy.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>

    <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_list_search.gif' border='0' align='absmiddle'></a> "; } ?>
    <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>
    <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_modify.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
    <?
    $link_buttons = ob_get_contents();
    ob_end_flush();
    ?>
    </div>
</div>

<div style="border:1px solid #ddd; clear:both; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
    <table border=0 cellpadding=0 cellspacing=0 width=100%>
    <tr>
        <td style="padding:8px 0 0 10px;">
            <div style="color:#505050; font-size:13px; font-weight:bold; word-break:break-all;">
                <?=cut_hangul_last(get_text($view[wr_subject]))?>
            </div>
        </td>
        <td align="right" style="padding:6px 6px 0 0;" width=220>
            <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('$scrap_href');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>
		<!--�μ�-->
          <a href='#' title='�μ�' onclick="window.open('print.html','print_win','width=780,height=720,left=100,status=no,toolbar=no,resizable=no,scrollbars=yes')"><img src='<?=$board_skin_path?>/img/btn_print.gif' align="absmiddle" border='0' /></a>&nbsp;
          <!--�μ�-->

            <? if ($trackback_url) { ?><a href="javascript:trackback_send_server('<?=$trackback_url?>');" style="letter-spacing:0;" title='�ּ� ����'><img src="<?=$board_skin_path?>/img/btn_trackback.gif" border='0' align="absmiddle"></a><?}?>
        </td>
    </tr>
    </table>
</div>
<div style="height:3px; background:url(<?=$board_skin_path?>/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>

<!--�μ����-->
<div id='print_table'>

<table border=0 cellpadding=0 cellspacing=0 width=<?=$width?>>
<tr>
    <td height=30 background="<?=$board_skin_path?>/img/view_dot.gif" style="color:#888;">
        <div style="float:left;">
        &nbsp;�۾��� : 
        <?=$view[name]?><? if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>
        </div>
        <div style="float:right;">
        <img src="<?=$board_skin_path?>/img/icon_view.gif" border='0' align=absmiddle> ��ȸ : <?=number_format($view[wr_hit])?>
        <? if ($is_good) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align=absmiddle> ��õ : <?=number_format($view[wr_good])?><? } ?>
        <? if ($is_nogood) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align=absmiddle> ����õ : <?=number_format($view[wr_nogood])?><? } ?>
        &nbsp;
        </div>
    </td>
</tr>

<?
// ���� ����
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source] && !$view[file][$i][view]) {
        $cnt++;
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle border='0'>";
        echo "<a href=\"javascript:file_download('{$view[file][$i][href]}', '".urlencode($view[file][$i][source])."');\" title='{$view[file][$i][content]}'>";
        echo "&nbsp;<span style=\"color:#888;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span>";
        echo "&nbsp;<span style=\"color:#d3d3d3; font-size:11px;\">DATE : {$view[file][$i][datetime]}</span>";
        echo "</a></td></tr>";
    }
}

// ��ũ
/*
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 20);
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle border='0'>";
        echo "<a href='{$view[link_href][$i]}' target=_blank>";
        echo "&nbsp;<span style=\"color:#888;\">{$link}</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
        echo "</a></td></tr>";
    }
}
*/
?>
<tr><td>
<br> *** �п�����
<table width=100% cellpadding=0 cellspacing=0 border=0 bordercolor=#2080D0>
<tr><td width="28%"  style="border:1px solid CCC;">
	<table width=100% cellpadding=0 cellspacing=0>
		<tr><td align=center>
			 <? 
			if($view[file][0][file]){ 
			$image = $view[file][0][file];
			$file1_v= "<img src='$g4[path]/data/file/$board[bo_table]/$image' width='120' height=50 align='center' border=0  onclick=\"view('$g4[path]/data/file/$bo_table/$image')\">";}
			else{echo "<center><img src='$board_skin_path/img/no_img.gif' width='120' height=50 align='absmiddle' border=0></center>";}
			for ($i=0; $i<=count; $i++){
			if ($view[file][$i]){
			echo "$file1_v";}
			}
			?>
		</td></tr>
				<tr><td height="30" align="center"><b> <?=$ext2_18?></b></td></tr>

	 </table>
  </td>
  <td width="2%"></td>
  <td width="70%">
	 <table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	 <tr><td>
		<table width=100% cellpadding=0 cellspacing=1>
		<tr><td width="20%" class=write_cb> �п���</td><td colspan="3" class=write_fl><b> <?=$ext2_18?></b></td></tr>
		<tr><td width="20%" class=write_cb> ������</td><td colspan="3" class=write_fl><?=$ext1_00?>&nbsp;��</td></tr>
		<tr><td class=write_cb width="20%"> ������</td><td class=write_fl width="30%"><?=$ext1_01?></td>
			  <td class=write_cb width="20%"> �л���</td><td class=write_fl width="30%"><?=$ext1_02?></td></tr>
		<tr><td class=write_cb> �ּ�</td><td class=write_fl colspan="3"><?=$ext3_02?>&nbsp;&nbsp;<?=$ext3_03?></td></tr>
		<tr><td class=write_cb> ��ȭ��ȣ</td><td class=write_fl><?=$ext1_05?>-<?=$ext1_06?>-<?=$ext1_07?></td>
			  <td class=write_cb> Ȩ������</td><td class=write_fl>
			   <? if ($view[link][1]) {
                $link = cut_str($view[link][1], 22);
				?>
			  <a href="<?=$view[link_href][1]?>" target="_blank"><?=$link?>
			  </a>
			  <?}?>
			  </td></tr>
	 </table>
 </td></tr></table>

</td></tr></table>

</td></tr>

<tr><td>
<br>
***�����䰭(1)
			<?
				$a = join(MC::getNowCategories($view['ca_name']));
				$sido = substr($a, 0,4);
				$gugun = substr($a, 4,6);
				$subj = substr($a,10,4);
				$part = substr($a,14,4);
				$sex = substr($a,18,4);
			?>

<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td bgcolor=#CCCCCC>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=20% class=write_cb>�����о�</td>
	  <td width=20% class=write_cb>�������</td>
	  <td width=20% class=write_cb>�����ο�</td>
	  <td width=20% class=write_cb>��������</td>
	  <td width=20% class=write_cb>���</td>
</tr>
<tr><td class=write_fc><? echo $subj;?></td>
	  <td class=write_fc><?=$ext1_09?></td>
      <td class=write_fc><?=$ext1_10?></td>
      <td class=write_fc><? echo $part;?></td>
      <td class=write_fc><?=$ext1_11?></td>
</tr>

</table>
</td></tr></table>
<br>

***�����䰭(2)
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td bgcolor=#CCCCCC>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=20% class=write_cb>�з�</td>
	  <td width=20% class=write_cb>����</td>
	  <td width=20% class=write_cb>����</td>
	  <td width=20% class=write_cb>�ٹ��ϼ�</td>
	  <td width=20% class=write_cb>�����ü�</td>
</tr>
<tr><td class=write_fc><?=$ext1_12?></td>
	  <td class=write_fc><? echo $sex;?></td>
      <td class=write_fc><?=$ext1_13?></td>
      <td class=write_fc><?=$ext2_15?> </td>
      <td class=write_fc>�� &nbsp;<?=$ext2_16?>&nbsp;�ð�</td>
</tr>

</table>
</td></tr></table>

<br>

***���⼭��/�������/�޿�����
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td bgcolor=#CCCCCC>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=20% class=write_cb>���⼭��</td>
	  <td width="80%" class=write_fl><?=$ext1_03?></td>
</tr>
<tr><td width=20% class=write_cb>�ð�����</td>
	  <td width="80%" class=write_fl><?=$ext1_04?></td>
</tr>
<tr><td width=20% class=write_cb>�޿�</td>
	  <td width="80%" class=write_fl>���� : <?=$ext1_14?>&nbsp;���� :::: �ְ� : <?=$ext1_15?>&nbsp;����&nbsp;&nbsp;&nbsp; <font color=#FF0000><?=$ext1_08?></font></td>
</tr>
<tr><td width=20% class=write_cb>������</td>
	  <td width="80%" class=write_fl><?=$ext1_16?></td>
</tr>
<tr><td width=20% class=write_cb>������</td>
	  <td width="80%" class=write_fl><?=$view[wr_5]?></td>
</tr>

</table>
</td></tr></table>

<br>

***�������
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td bgcolor=#CCCCCC>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=20% class=write_cb>�������</td>
	  <td width="80%" class=write_fl>
	   <? if($ext1_17){
		  echo $ext1_17;
		  echo "&nbsp;/&nbsp;";
			}
			if($ext1_18){
		  echo $ext1_18;
		  echo "&nbsp;/&nbsp;";
			}
			if($ext1_19){
		  echo $ext1_19;
		  echo "&nbsp;/&nbsp;";
			}
			if($ext1_20){
		  echo $ext1_20;
		  echo "&nbsp;/&nbsp;";
			}
		  if($ext2_09){
		  echo $ext2_09;
		  echo "&nbsp;/&nbsp;";
			}
		?>  
	  </td>
</tr>
<tr><td width=20% class=write_cb>�����</td>
	  <td width="80%" class=write_fl><?=$ext2_04?></td>
</tr>
<tr><td width=20% class=write_cb>����ó</td>
	  <td width="80%" class=write_fl><?=$ext2_05?>-<?=$ext2_06?>-<?=$ext2_07?></td>
</tr>
<tr><td width=20% class=write_cb>�̸���</td>
	  <td width="80%" class=write_fl><?=$ext2_08?></td>
</tr>
<tr><td width=20% class=write_cb>�αٱ���</td>
	  <td width="80%" class=write_fl><?=$ext2_17?></td>
</tr>

</table>
</td></tr></table>
<br><br>
</td></tr>

<tr><td>***���γ���</td></tr>
<tr> 
    <td height="150" style="word-break:break-all; padding:10px;border:1px solid CCCCCC;">
        
        <!-- ���� ��� -->
        <span id="writeContents"><?=$view[content];?></span>
        
        <?//echo $view[rich_content]; // {�̹���:0} �� ���� �ڵ带 ����� ���?>
        <!-- �׷� �±� ������ --></xml></xmp><a href=""></a><a href=''></a>

        <? if ($nogood_href) {?>
        <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
        <div style="color:#888; margin:7px 0 5px 0;">����õ : <?=number_format($view[wr_nogood])?></div>
        <div><a href="<?=$nogood_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align="absmiddle"></a></div>
        </div>
        <? } ?>

        <? if ($good_href) {?>
        <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
        <div style="color:#888; margin:7px 0 5px 0;"><span style='color:crimson;'>��õ : <?=number_format($view[wr_good])?></span></div>
        <div><a href="<?=$good_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align="absmiddle"></a></div>
        </div>
        <? } ?>

</td></tr>

<tr><td>
<br><br>
***��������
<table width=100% cellpadding=10 cellspacing=0 border=0>
<tr><td bgcolor=#F1F1F1>
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td>
<? if ($view[wr_3]) { // �ӽ��ʵ��� wr_1�� �ּҰ� �ִٸ� ���̹� api ������ ��� ?>

        <div align='center' style="padding:10px 0 0 0;">
		<?
		// ���� ǥ�� 
		include_once "$board_skin_path/map.php"; 
		?>
		</div>
		<? } ?>
<? if (!$view[wr_3]) {
			echo "���� �غ����Դϴ�.";
		}
?>
</td></tr></table>
</td></tr></table>


</td></tr>
<? if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // ���� ��� ?>
</table>
<br>
<!--�μⳡ-->
</div>
<?
// �ڸ�Ʈ �����
include_once("./view_comment.php");
?>

<div style="height:1px; line-height:1px; font-size:1px; background-color:#ddd; clear:both;">&nbsp;</div>

<div style="clear:both; height:43px;">
    <div style="float:left; margin-top:10px;">
    <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </div>

    <!-- ��ũ ��ư -->
    <div style="float:right; margin-top:10px;">
    <?=$link_buttons?>
    </div>
</div>

<div style="height:2px; line-height:1px; font-size:1px; background-color:#dedede; clear:both;">&nbsp;</div>

</td></tr></table><br>

<script type="text/javascript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+decodeURIComponent(file)+"' ������ �ٿ�ε� �Ͻø� ����Ʈ�� ����(<?=number_format($board[bo_download_point])?>��)�˴ϴ�.\n\n����Ʈ�� �Խù��� �ѹ��� �����Ǹ� ������ �ٽ� �ٿ�ε� �ϼŵ� �ߺ��Ͽ� �������� �ʽ��ϴ�.\n\n�׷��� �ٿ�ε� �Ͻðڽ��ϱ�?"))<?}?>
    document.location.href=link;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}

</script>
<!-- �Խñ� ���� �� -->
