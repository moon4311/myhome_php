<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$style_name = "mw-latest-list-img-$bo_table-$rows-$subject_len";
?>
<style type="text/css">
.<?=$style_name?> { border:0px solid #e1e1e1; }
.<?=$style_name?> .subject { background:url(<?=$latest_skin_path?>/img/box-bg.gif); height:24px; margin:20 0 7px 0; }
.<?=$style_name?> .subject .bo_table { margin:5px 0 0 5px; float:center; }
.<?=$style_name?> .subject .bo_table a { font-size:20px; color:#555; font-weight:bold; letter-spacing:-1px; text-decoration:none; }
.<?=$style_name?> .subject .list { margin:5px 5px 0 0; float:center; }
.<?=$style_name?> .subject .list a { font-weight:normal; font-size:15px; letter-spacing:-1px; color:#555; }
.<?=$style_name?> .post-subject { width:160px; height:180px; overflow:hidden; padding:3px 3px 3 3; letter-spacing:-1px; font-size:15px; }
.<?=$style_name?> .post-subject a:hover { color:#7c7c7c; text-decoration:bold; }
</style>

<table align="center" valign="middle"><tr><td onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#d9d9d9'" bgcolor="#d9d9d9" border="0">
<div class="<?=$style_name?>">
<table border=0 cellpadding=0 cellspacing=0 align="center" valign="middle">
<tr>
<td bgcolor="#ffffff" align=center valign="middle" class=file>
<div class="post-subject">
	<? for ($i=0; $i<$rows; $i++) { ?>
<?
$list[$i][subject] = mw_builder_reg_str($list[$i][subject]);
?><a href="<?=$list[$i][href]?>"><b><?=$list[$i][subject]?></b></a></div>
</td>
<? } ?>
</tr>
</table>
</div>
</div>
</td></tr></table>