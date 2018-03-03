<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$style_name = "mw-latest-list-img-$bo_table-$rows-$subject_len";
?>
<style type="text/css">
.<?=$style_name?> { border:0px solid #e1e1e1; }
.<?=$style_name?> .subject { background:url(<?=$latest_skin_path?>/img/box-bg.gif); height:24px; margin:0 0 7px 0; }
.<?=$style_name?> .subject .bo_table { margin:5px 0 0 5px; float:left; }
.<?=$style_name?> .subject .bo_table a { font-size:20px; color:#555; font-weight:bold; letter-spacing:-1px; text-decoration:none; }
.<?=$style_name?> .subject .list { margin:5px 5px 0 0; float:right; }
.<?=$style_name?> .subject .list a { font-weight:normal; font-size:11px; letter-spacing:-1px; color:#555; }
.<?=$style_name?> .file { width:270px; height:140px; padding-bottom:5px; }
.<?=$style_name?> .file-img { width:270px; height:140px; border:0px solid #e2e2e2; }
.<?=$style_name?> .post-subject { width:135px; height:20px; overflow:hidden; padding:5px 5px 0 0; letter-spacing:-1px; font-size:20px; }
.<?=$style_name?> .post-subject a:hover { color:#bd0000; text-decoration:bold; }
</style>

<table><tr><td onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#d9d9d9'" bgcolor="#d9d9d9" border="0">
<div class="<?=$style_name?>">
<table border=0 cellpadding=0 cellspacing=0 align="center">
<tr>
<? for ($i=0; $i<$rows; $i++) { ?>
<?
$img = "$g4[path]/data/file/$bo_table/thumb/{$list[$i][wr_id]}";
if (!@file_exists($img)) $img = "$g4[path]/data/file/$bo_table/thumbnail/{$list[$i][wr_id]}";
if (!@file_exists($img)) $img = "{$list[$i][file][0][path]}/{$list[$i][file][0][file]}";
if (!@file_exists($img)) $img = "$latest_skin_path/img/noimage.gif";
if (!$list[$i][wr_id]) $img = "$latest_skin_path/img/noimage.gif";
if (@is_dir($img)) $img = "$latest_skin_path/img/noimage.gif";
$list[$i][subject] = mw_builder_reg_str($list[$i][subject]);
$list[$i][content] = mw_builder_reg_str($list[$i][content]);
?>
<td bgcolor="#ffffff" align=left valign=top class=file>
    <div class="post-img"><a href="<?=$list[$i][href]?>"><img src="<?=$img?>" class="file-img"></a></div>
    <div class="post-subject">&nbsp;&nbsp;<a href="<?=$list[$i][href]?>"><b><?=$list[$i][subject]?></b></a></div>
    <div class="post-content">&nbsp;&nbsp;<a href="<?=$list[$i][href]?>"><?=$list[$i][content]?></a></div>
</td>
<? } ?>
</tr>
</table>
</div>
</div>
</td></tr></table>