<style>

A:link { COLOR: #757575; FONT-FAMILY: ±¼¸²,Gulim,Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none }
A:visited {COLOR: #757575;  FONT-FAMILY: ±¼¸²,Gulim,Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none }
A:active {COLOR: #757575;  FONT-FAMILY: ±¼¸²,Gulim,Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none }
A:hover { COLOR: #000000; FONT-FAMILY: ±¼¸²,Gulim,Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none }

.title_pro07 {color:#2E2E2E;font-weight:bold;font-size:9pt}
.title_pro07 A:link {color:#2E2E2E;font-weight:bold;font-size:9pt}
.title_pro07 A:visited {color:#2E2E2E;font-weight:bold;font-size:9pt}
.title_pro07 A:active {color:#2E2E2E;font-weight:bold;font-size:9pt}
.title_pro07 A:hover {color:#2E2E2E;font-weight:bold;font-size:9pt}
.comment {font-family:tahoma;font-size:7pt}
.redplus {color:#ffd700}
</style>
<table id="Table_01" width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td colspan="2" background="<?=$latest_skin_path?>/images/bg_1.gif" align="left">
			<img src="<?=$latest_skin_path?>/images/subject.gif"  height="39" alt=""></td>
		<td background="<?=$latest_skin_path?>/images/bg_1.gif">
			&nbsp;</td>
		<td colspan="2" background="<?=$latest_skin_path?>/images/bg_3.gif" align="right">
			<a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>" onFocus="this.blur()"><img src="<?=$latest_skin_path?>/images/more.gif" height="39" alt="" border="0"></a></td>
	</tr>
	<tr>
		<td height="1" width="15" background="<?=$latest_skin_path?>/images/left_bg.gif">
			&nbsp;</td>
        <td colspan="3" height="1" align="center" valign="top">
			<table border=0 width=100% cellspacing=0 cellpadding=0 align="center">
<? for ($i=0; $i<count($list); $i++) { ?>
  <tr> 
        <td height=25 valign="middle">&nbsp;<img src="<?=$latest_skin_path?>/images/icon_img.gif" border=0 align=absmiddle>&nbsp;<span style="color:rgb(77,146,23);"> </span><?php  echo "<a href='{$list[$i]['href']}'>";  echo  $list[$i]['subject']?></a>&nbsp;<?php  echo " " . $list[$i]['icon_new'];?><span class='redplus'><?php echo $list[$i]['comment_cnt'] ?></span></td>
        <td height="25" valign="middle" align="right"><p>
		<span class='comment'><span class='redplus'></span></p>
</td>
  </tr>
  <tr>
    <td height=1 background="<?=$latest_skin_path?>/images/li.gif" colspan="2"></td> 
  </tr> 
<? } ?>
</table></td>
		<td height="1" width="15" background="<?=$latest_skin_path?>/images/right_bg.gif">
			&nbsp;</td>
	</tr>
	<tr>
		<td background="<?=$latest_skin_path?>/images/bg_2.gif" align="left">
			<img src="<?=$latest_skin_path?>/images/dl.gif" width="15" height="15" alt=""></td>
		<td colspan="3" background="<?=$latest_skin_path?>/images/bg_2.gif">
			<img src="<?=$latest_skin_path?>/images/bg_2.gif" width="4" height="15" alt=""></td>
		<td background="<?=$latest_skin_path?>/images/bg_2.gif" align="right">
			<img src="<?=$latest_skin_path?>/images/dr.gif" width="15" height="15" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?=$latest_skin_path?>/images/spacer.gif" width="15" height="1" alt=""></td>
		<td>
			<img src="i<?=$latest_skin_path?>/images/spacer.gif" width="149" height="1" alt=""></td>
		<td>
			<img src="<?=$latest_skin_path?>/images/spacer.gif" width="120" height="1" alt=""></td>
		<td>
			<img src="<?=$latest_skin_path?>/images/spacer.gif" width="25" height="1" alt=""></td>
		<td>
			<img src="<?=$latest_skin_path?>/images/spacer.gif" width="15" height="1" alt=""></td>
	</tr>
</table>