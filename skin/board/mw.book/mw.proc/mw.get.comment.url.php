<?
/**
 * Bechu-Basic Skin for Gnuboard4
 *
 * Copyright (c) 2008 Choi Jae-Young <www.miwit.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

include_once("_common.php");
include_once("$board_skin_path/mw.lib/mw.skin.basic.lib.php");

header("Content-Type: text/html; charset=$g4[charset]");
$gmnow = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: 0"); // rfc2616 - Section 14.21
header("Last-Modified: " . $gmnow);
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); // HTTP/1.1
header("Pragma: no-cache"); // HTTP/1.0

$comment_url = "$g4[url]/$g4[bbs]/board.php?bo_table=$bo_table&wr_id=$write[wr_parent]#c_".$write[wr_id];
if ($mw_basic[cf_umz] && substr(trim($write[wr_umz]), 0, 10) != "http://umz") {
    $umz = umz_get_url($comment_url);
    sql_query("update $write_table set wr_umz = '$umz' where wr_id = '{$write[wr_id]}'");
    $comment_url = $umz;
}
else if ($mw_basic[cf_umz]) {
    $comment_url = $write[wr_umz];
}
?>

<table border="0" cellpadding="0" cellspacing="0">
<tr>
    <td>
        <nobr style="float:left; margin:10px 10px 0 10px; font:normal 11px 'gulim'; color:#888; word-break:break-all;" id="comment_url_result"><?=$comment_url?></nobr>
    </td>
    <td>
        <span style="float:left; margin:9px 10px 0 0; "><img src="<?=$board_skin_path?>/img/copy.png" id="comment_url_copy" align="absmiddle"></span>
    </td>
</tr>
</table>

