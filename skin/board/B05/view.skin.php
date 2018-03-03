<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<link href="<?=$board_skin_path?>/style.css" rel="stylesheet" type="text/css" />

<div style='height:10px;'>&nbsp;</div>

<!-- 게시글 보기 시작 -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0">
    <tr>
	    <td>		
		    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="34" style="clear:both; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
		        <tr>
		            <td>
		            <div style="color:#505050; font-size:13px; font-weight:bold; word-break:break-all;">&nbsp;
		            <? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
		            <!--<?=cut_hangul_last(get_text($view[wr_subject]))?>-->
		            <?=cut_hangul_last(get_text(cut_str(strip_tags($view[wr_subject]),$board[bo_subject_len],"...")))?>              
		        </td>
		            <td align="right" width="120">
		        <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('$scrap_href');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>
		        <? if ($trackback_url) { ?><a href="javascript:trackback_send_server('<?=$trackback_url?>');" style="letter-spacing:0;" title='주소 복사'><img src="<?=$board_skin_path?>/img/btn_trackback.gif" border='0' align="absmiddle"></a><?}?>&nbsp;&nbsp;
		        </td>
		        </tr>
		    </table>

		    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		        <tr>
		            <td height="30" background="<?=$board_skin_path?>/img/view_dot.gif">
		            <div style="float:left;">&nbsp;<span class='text_bold888'>작성자</span> : <?=$view[name]?></strong><span style="font-size:8pt; color:#D2D2D2;"><? if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></span></div>
		            <div style="float:right;"><span class='text_bold888'>작성일</span> : <span style=font-size:8pt;><?=date("Y-m-d", strtotime($view[wr_datetime]))?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='text_bold888'>조회</span> : <?=number_format($view[wr_hit])?></span>
		            <? if ($is_good) { ?>&nbsp;<span class='text_bold888'>추천</span> : <span style=font-size:8pt;><?=number_format($view[wr_good])?></span><? } ?>
		            <? if ($is_nogood) { ?>&nbsp;<span class='text_bold888'>비추천</span> : <span style=font-size:8pt;><?=number_format($view[wr_nogood])?></span><? } ?>&nbsp;
		            </div>
		            </td>
				</tr>
				    <?
				    // 가변 파일
				    $cnt = 0;
				    for ($i=0; $i<count($view[file]); $i++) {
				    if ($view[file][$i][source] && !$view[file][$i][view]) {
				        $cnt++;
				        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
				        echo "&nbsp;<span class='text_bold888'>첨부파일</span> : ";
				        echo "&nbsp;<a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title='{$view[file][$i][content]}'>";
				        echo "<span style=\"color:#888; font-size:11px;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span></a>";
				        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span>";
				        echo "&nbsp;<span style=\"color:#d3d3d3; font-size:11px;\">DATE : {$view[file][$i][datetime]}</span>";
				        echo "</td></tr>";
				        }
				    }
				    // 링크
				    $cnt = 0;
				    for ($i=1; $i<=$g4[link_count]; $i++) {
				    if ($view[link][$i]) {
				        $cnt++;
				        $link = cut_str($view[link][$i], 100);
				        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
				        echo "&nbsp;<span class='text_bold888'>관련링크</span> : ";
				        echo "<a href='{$view[link_href][$i]}' target=_blank>";
				        echo "&nbsp;<span style=font-size:8pt;><span style=\"color:#888;\">{$link}</span>";
				        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
				        echo "</a></td></tr>";
				        }
				    }
				    ?>
				<tr> 
				    <td height="150" valign="top" style="word-break:break-all; padding:25px 5px 50px 5px;">

				    <? 
				    // 파일 출력
				    for ($i=0; $i<=count($view[file]); $i++) {
				        if ($view[file][$i][view]) 
				        echo $view[file][$i][view] . "<p>";
				    }
				    ?>
					
					<br>
				    <!-- 내용 출력 -->
				    <span id="writeContents"><?=$view[content];?></span>        
				    <?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
				    <!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>
				    <? if ($nogood_href) {?>
				    <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
				    <div style="color:#888; margin:7px 0 5px 0;">비추천 : <?=number_format($view[wr_nogood])?></div>
				    <div><a href="<?=$nogood_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align="absmiddle"></a></div>
				    </div>
				    <? } ?>
				    <? if ($good_href) {?>
				    <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
				    <div style="color:#888; margin:7px 0 5px 0;"><span style='color:crimson;'>추천 : <?=number_format($view[wr_good])?></span></div>
				    <div><a href="<?=$good_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align="absmiddle"></a></div>
				    </div>
				    <? } ?>
				    </td>
				</tr>
				<? if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // 서명 출력 ?>
			</table>
			<?
			// 코멘트 입출력
			include_once("./view_comment.php");
			?>
<div style="height:1px; line-height:1px; font-size:1px; background-color:#dedede; clear:both;">&nbsp;</div>
<!-- 링크 버튼 -->
<div style="clear:both; height:43px;">
    <div style="float:left; margin-top:10px;">
    <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </div>


    <div style="float:right; margin-top:10px;">
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
<div style="height:1px; line-height:1px; font-size:1px; background-color:#dedede; clear:both;">&nbsp;</div>
</td></tr></table>




<script type="text/javascript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
    document.location.href=link;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    //drawFont();
}
</script>
<!-- 게시글 보기 끝 -->