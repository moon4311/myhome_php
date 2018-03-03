<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<? if ($mm_id) { ?>
	&nbsp;
    </td>
    <? if (!$mw_mmenu[mm_rmenu] && !$mw_smenu[ms_rmenu]) { ?>
    <td width=10></td>
    <td width=240 valign=top align=center bgcolor="#f5f5f5" style="border-left:1px solid #e1e1e1;">
	<div><?=mw_latest_rand("mw.side.img", "B03", 10, 28, 0, $group[gr_cache])?></div>
	<div class="latest-block"><?=mw_latest("mw.side.list", "B15", 5, 35, 0, $group[gr_cache])?></div>
	<div class="latest-block"><?=mw_latest_tab("mw.tab", "B05, B06, B07", 5, 32, $group[gr_cache])?></div>
	<div class="latest-block"><?=mw_latest_rand("mw.side2.list", "B14", 10, 35, 0, $group[gr_cache])?></div>
	&nbsp;
    </td>
    <? } ?>
</tr>
<tr>
    <td colspan="5" height="1" bgcolor="#e1e1e1"></td>
</tr>
</table>

<? } ?>

</td></tr></table>
<!--</div>-->

<?
include_once("$mw_index_skin_tail_path/index.tail.skin.php");
?>
