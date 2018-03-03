<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<?
// 게시판 관리의 상단 이미지 경로
if ($board[bo_image_head]) 
    echo "<img src='$g4[path]/data/file/$bo_table/$board[bo_image_head]' border='0'>";

// 게시판 관리의 상단 내용
if ($board[bo_content_head]) 
    echo stripslashes($board[bo_content_head]);

$etc4_exp=explode("|" , $view[wr_4]);
$etc4_exp00 = $etc4_exp[0];   $etc4_exp01 = $etc4_exp[1];
$etc4_exp02 = $etc4_exp[2];   $etc4_exp03 = $etc4_exp[3];

?>
<!--- 끝 --->
<script language="JavaScript">
<!--
function change(html){
  text1.innerHTML=html
}
//-->
</script>

<style>
.tp_test_nCell{border-bottom: 0px solid #cccccc;}

.tp_test_Content1{border: 0px solid #cccccc;border-top-width:0;padding:0px}
.tp_test_Content2{font:12px 돋움;}
.tp_test_Cell{
	padding-top:5;
	font:13px 돋움;
	background:url('<?=$board_skin_path?>/img/tp_unselect.png')  no-repeat 50%;
	height:29;
	width:100;
	text-align:center;
	cursor:pointer;
	cursor:hand;
}
.tp_test_sCell{
	padding-top:5;
	font:13px 돋움;
	background-image:url('<?=$board_skin_path?>/img/tp_select.png'); 
	background-position: 50%;
	background-repeat: no-repeat;
	height:29;
	width:100;
	text-align:center;
	cursor:pointer;
	cursor:hand;
}
td.05{
 border-bottom:1px solid #c9c9c9;
 border-right:1px solid #c9c9c9;
 border-left:1px solid #c9c9c9;
 border-top:1px solid #c9c9c9;
 font-size:12px;
 }

tr.01 {background-color:#F7F8F9}
td.01 {text-align:right; padding:0 10 0 0}
td.02 {background-color:#FFFFFF}
td.03 {background-color:#6B7783}
td.04 {font-weight:bold; color:603000; background-color:#FFFFFF}
</style>

<table width="675" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="675">

            <div style="height:30px; clear:both;">
                <div style="margin-top:6px; float:left;">    <img src="<?=$board_skin_path?>/img/icon_date.gif" align=absmiddle border='0'>
    <span style="color:#888888;">작성일 :  <?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></span>
                </div>
                <!-- 링크 버튼 -->
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
            <div style="background-image:url('<?=$board_skin_path?>/img/title_bg.gif'); background-repeat:repeat-x; border-width:1px; border-color:rgb(208,208,208); border-style:solid; height:110px; clear:both;">
                <table border=0 cellpadding=0 cellspacing=0 width=100%>
                    <tr>
                        <td style="padding:8px 0 0 10px;" width="538">
                            <div style="font-weight:bold; font-size:13px; color:rgb(80,80,80); word-break:break-all;">
                                <table width="537" cellpadding="0" cellspacing="0" height="92">
                                    <tr>
                                        <td width="537" height="23">
                                            <p style="line-height:100%; margin-top:0; margin-bottom:0;"><? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="537" height="20">
                                            <p style="line-height:100%; margin-top:0; margin-bottom:0;">제    목 : <?=cut_hangul_last(get_text($view[wr_subject]))?> [<?=cut_hangul_last(get_text($view[wr_1]))?>]
</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="537" height="20">
                                            <p style="line-height:100%; margin-top:0; margin-bottom:0;">
업무시간 : <?=cut_hangul_last(get_text($view[wr_2]))?>
</p>                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="537" height="20">
                                            <p style="line-height:100%; margin-top:0; margin-bottom:0;">
급 여 액 : <?=cut_hangul_last(get_text($view[wr_3]))?>
</p>                                        </td>
                                    </tr>
									<tr>
                                        <td width="537" height="20">
                                            <p style="line-height:100%; margin-top:0; margin-bottom:0;">
연 락 처 : <?=cut_hangul_last(get_text($view[wr_4]))?>
</p>                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>

                        <td align="right" style="padding:6px 6px 0 0;" width="119" valign="bottom">
									<? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('$scrap_href');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>
									<? if ($trackback_url) { ?><a href="javascript:trackback_send_server('<?=$trackback_url?>');" style="letter-spacing:0;" title='주소 복사'><img src="<?=$board_skin_path?>/img/btn_trackback.gif" border='0' align="absmiddle"></a><?}?>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="font-size:1px; line-height:1px; background-image:url('<?=$board_skin_path?>/img/title_shadow.gif'); background-repeat:repeat-x; height:3px;">
            </div>

            <table border=0 cellpadding=0 cellspacing=0 width="614">
                <tr>
                    <td height=30 background="<?=$board_skin_path?>/img/view_dot.gif" style="color:#888;" width="614">
                        <div style="float:left;">
        &nbsp;글쓴이 : 
                            <?=$view[name]?><? if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>
                        </div>
                        <div style="float:right;">
        <img src="<?=$board_skin_path?>/img/icon_view.gif" border='0' align=absmiddle> 조회 :  <?=number_format($view[wr_hit])?>
                            <? if ($is_good) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align=absmiddle> 추천 :  <?=number_format($view[wr_good])?><? } ?>
                            <? if ($is_nogood) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align=absmiddle> 비추천 :  <?=number_format($view[wr_nogood])?><? } ?>
        &nbsp;
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
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle border='0'>";
        echo "<a href=\"javascript:file_download('{$view[file][$i][href]}', '".urlencode($view[file][$i][source])."');\" title='{$view[file][$i][content]}'>";
        echo "&nbsp;<span style=\"color:#888;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span>";
        echo "&nbsp;<span style=\"color:#d3d3d3; font-size:11px;\">DATE : {$view[file][$i][datetime]}</span>";
        echo "</a></td></tr>";
    }
}

// 링크
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle border='0'>";
        echo "<a href='{$view[link_href][$i]}' target=_blank>";
        echo "&nbsp;<span style=\"color:#888;\">{$link}</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
        echo "</a></td></tr>";
    }
}
?>
                <tr>
                    <td height="150" style="word-break:break-all; padding:10px;" width="594">
                        <? 
        // 파일 출력
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>
                        <!-- 내용 출력 -->
        <span id="writeContents"><?=$view[content];?></span>
        
                        <?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
                        <!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>

                        <? if ($nogood_href) {?>
                        <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
                            <div style="color:gray; margin-top:7px; margin-right:0; margin-bottom:5px; margin-left:0;">비추천 :  <?=number_format($view[wr_nogood])?>
                            </div>
                            <div><a href="<?=$nogood_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align="absmiddle"></a></div>
                        </div>
                        <? } ?>
                        <? if ($good_href) {?>
                        <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
                            <div style="color:gray; margin-top:7px; margin-right:0; margin-bottom:5px; margin-left:0;"><span style='color:crimson;'>추천 :  <?=number_format($view[wr_good])?></span></div>
                            <div><a href="<?=$good_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align="absmiddle"></a></div>
                        </div>
                        <? } ?>
				   </td>
                </tr>
                <? if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // 서명 출력 ?>
            </table>
<br>
            <?
// 코멘트 입출력
include_once("./view_comment.php");
?>

            <div style="font-size:1px; line-height:1px; background-color:rgb(208,208,208); height:1px; clear:both;">&nbsp;</div>
            <div style="height:43px; clear:both;">
                <div style="margin-top:10px; float:left;"><? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
                    <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
                </div>
                <!-- 링크 버튼 -->
                <div style="margin-top:10px; float:right;">
                    <?=$link_buttons?>
                </div>
            </div>
            <div style="font-size:1px; line-height:1px; background-color:rgb(222,222,222); height:2px; clear:both;">&nbsp;</div>
        </td>
    </tr>
</table>