<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$cols  = 5; //  이미지 가로갯수 //  이미지 세로 갯수는 메인에서 지정(총 이미지 수)
$col_width = (int)(99 / $cols);
$img_width = 120;   // 
$img_height = 40;  // 사이즈변경
$img_quality = 99;   // 
?> 
<table width=100 height=80 border="0" align="center" cellpadding="0" cellspacing="2">
  <tr>

<? for ($i=0; $i<count($list); $i++) { 
  if ($i>0 && $i%$cols==0) { 
	  echo "</tr><tr><td colspan='$cols' height=1></td></tr><tr>"; 
	  echo "</tr><tr><td colspan='$cols' height=1></td></tr><tr>"; 
	  echo "</tr><tr><td colspan='$cols' height=1></td></tr><tr>"; 
	  } 
?> 
<? if($list[$i][wr_7] == '1') { ?> <!--//1은 있고 0은 없다--> 

<?
   $img = "$g4[path]/data/file/$bo_table/".urlencode($list[$i][file][0][file]);
    if (!file_exists($img) || !$list[$i][file][0][file])
        $img = "$latest_skin_path/img/no_img.gif";
?>

<?	 $subject = cut_str(get_text($list[$i][wr_subject]), 18);
     $h_name = cut_str(get_text($list[$i][wr_10]), 21);
	// $h_name = substr($ext2_18, 0,12);
?>
<td width="<?=$col_width?>%" align="center" valign='top'>
<table width='99%' height="116" cellpadding='5' cellspacing='0' border='0' style="border:1px solid #cdcdcd; background:#f2f2f2;border-radius:6px;"><tr>
	<td>
	<table width='100%' cellpadding='0' cellspacing='5' border='0' style="background:#fff;border-radius:6px;">
		<tr>
			<td width=<?=$img_width?> height=<?=$img_height?> style="border-bottom:1px solid #c1c1c1;border-bottom-style:dashed;padding:5 5 5 5px;" align='center'><a href='#' onclick="javascript:window.open('<?=$latest_skin_path?>/new.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][wr_id]?>', '', 'left=200, top=100, width=780, height=600, scrollbars=1');"><b><img src="<?=$img?>" width='<?=$img_width?>' height='<?=$img_height?>' border=0 bordercolor=#BFBFBF></b></a>
			</td>
		</tr>
		<tr>
			<td align='center'><b><?=$list[$i][wr_10]?></b></td>
		</tr>
		<tr>
			<td><?=$list[$i][wr_12]?> <?=$list[$i][wr_13]?><br><? if($list[$i][wr_19] == 'TC'){
        echo "<img src=\"{$latest_skin_path}/img/money_tc.gif\" border=0 align=absmiddle>&nbsp;"; echo number_format($list[$i][wr_20])."원";
        } else if($list[$i][wr_19] == '시급'){
        echo "<img src=\"{$latest_skin_path}/img/money_time.gif\" border=0 align=absmiddle>&nbsp;";echo number_format($list[$i][wr_20])."원";
        } else if($list[$i][wr_19] == '일급'){
       	echo "<img src=\"{$latest_skin_path}/img/money_today.gif\" border=0 align=absmiddle>&nbsp;";echo number_format($list[$i][wr_20])."원"; 
        } else if($list[$i][wr_19] == '주급'){
        echo "<img src=\"{$latest_skin_path}/img/money_week.gif\" border=0 align=absmiddle>&nbsp;";echo number_format($list[$i][wr_20])."원";
        } else if($list[$i][wr_19] == '월급'){
        echo "<img src=\"{$latest_skin_path}/img/money_month.gif\" border=0 align=absmiddle>&nbsp;";echo number_format($list[$i][wr_20])."원";
        } else if($list[$i][wr_19] == '협의'){
        echo "<img src=\"{$latest_skin_path}/img/money_talk.gif\" border=0 align=absmiddle>";
        }
        ?>
			</td>
		</tr>
	</tr></table>
	</td>
</tr></table>

</td>
<? } else if($list[$i][wr_7] == '0') { ?>
<td width="<?=$col_width?>%" align="center" valign='top'>
<table width='99%' height="116" cellpadding='5' cellspacing='0' border='0' style="border:1px solid #cdcdcd; background:#f2f2f2;border-radius:6px;">
<tr>
	<td>
	<table width='100%' cellpadding='0' cellspacing='5' border='0' style="background:#fff;border-radius:6px;">
		<tr>
			<td><img src="<?=$latest_skin_path?>/img/no_ad.png" style="max-width:100%;height:auto;"></td>
		</tr>
	</table>
	</td>
</tr>
</table>
</td>
<? } else if($list[$i][wr_7] == '') { ?>
<td width="<?=$col_width?>%" align="center" valign='top'>
<table width='99%' height="116" cellpadding='5' cellspacing='0' border='0' style="border:1px solid #cdcdcd; background:#f2f2f2;border-radius:6px;">
<tr>
	<td>
	<table width='100%' cellpadding='0' cellspacing='5' border='0' style="background:#fff;border-radius:6px;">
		<tr>
			<td><img src="<?=$latest_skin_path?>/img/no_ad.png" style="max-width:100%;height:auto;"></td>
		</tr>
	</table>
	</td>
</tr>
</table>
</td>
<? } ?>
<?}?>


<? 
$cnt = ($i%$cols); 
for ($k=$cnt; $k<$cols && $cnt; $k++) { 
    echo "<td width=$col_width%>&nbsp;</td>"; 
} 
?> 

  <? if (count($list) == 0) { echo "<td align=center>게시물이 없습니다.</td>"; } ?>
  </tr>
  
</table>

