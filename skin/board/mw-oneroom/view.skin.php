<?php
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

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$mw_is_view = true;
$mw_is_list = false;
$mw_is_write = false;

include_once("$board_skin_path/mw.lib/mw.skin.basic.lib.php");
include("view_head.skin.php");
// 여기부터 추가된 내용 1
// 파일 출력
ob_start();
if ($board[bo_ucc]==0) {
for ($i=0; $i<=$view[file][count]; $i++)
	{
	 if ($view[file][$i][view])
		 {
		 if ($board[bo_image_width] < $view[file][$i][image_width]) { // 이미지 크기 조절
         $img_width = $board[bo_image_width];}
         else {$img_width = $view[file][$i][image_width];}
	     $view[file][$i][view] = str_replace("<img", "<img width=\"{$img_width}\"", $view[file][$i][view]);}
	     else {$view[file][$i][view] = str_replace("onclick='image_window(this);'", "onclick='image_window(this, {$view[file][$i][image_width]},{$view[file][$i][image_height]});'", $view[file][$i][view]); }
		 // 제나빌더용 (그누보드 원본수정으로 인해 따옴표' 가 없음;)
		 echo $view[file][$i][view] . "<br/><br/>";  }
																	}
$file_viewer = ob_get_contents();
ob_end_clean();

if (!strstr($view[content], "{이미지:"))// 파일 출력  
    $view[content] = $file_viewer . $view[content]; 
//배추 베이직 게시판 코드 참조
if ($write[wr_report] && $write[wr_report] < $board[bo_report_repeat] && $board[bo_report_wr_lockup]) {
    $content = " <div class='btn_report_lockup'> 신고가 접수된 게시물입니다. (신고수 : {$write[wr_report]}회)<br/>";
    $content.= " <span onclick=\"btn_report_view({$view[wr_id]})\" class='report_info'>여기</span>를 클릭하시면 내용을 볼 수 있습니다.";
    if ($is_admin == "super")
        $content.= "<span class='btn_report_lockup' onclick=\"btn_report_reset({$view[wr_id]})\">[신고 초기화]</span><br /><br />";
    $content.= " </div>";
    $content.= " <div id='report_lockup_{$view[wr_id]}' class='report_lockup'>{$view[content]} </div>";

    $view[content] = $content;
}else{
if ($write[wr_report] && $write[wr_report] >= $board[bo_report_repeat] && $board[bo_report_wr_lockup]) {
    $content = " <div class='btn_report_lockup'> ※ <span class='report_info'>{$board[bo_report_repeat]}회</span> 이상 신고된 게시물의 내용은 보실 수 없습니다. <br />";
    if ($is_admin == "super")
        $content.= "<li><span onclick=\"btn_report_view({$view[wr_id]})\" class='btn_report_lockup'>[신고글 보기]</span> <span class='btn_report_lockup' onclick=\"btn_report_reset({$view[wr_id]})\">[신고 초기화]</span><br /><br /></li>";
    $content.= " </div>";
    $content.= " <div id='report_lockup_{$view[wr_id]}' class='report_lockup'>{$view[content]} </div>";

    $view[content] = $content;
}
}
// 웹에디터 이미지 클릭시 원본 사이즈 조정
$data = $view[rich_content];
preg_match_all("/<img\s+name='target_resize_image\[\]' onclick='image_window\(this\)'.*src=\"(.*)\"/iUs", $data, $matchs);
for ($i=0; $i<count($matchs[1]); $i++) {
    $match = $matchs[1][$i];
    if (strstr($match, $g4[url])) { // 웹에디터로 첨부한 이미지 뿐 아니라 다양한 상황을 고려함.
        $path = str_replace($g4[url], "..", $match);
    } elseif (substr($match, 0, 1) == "/") {
        $path = $_SERVER[DOCUMENT_ROOT].$match;
    } else {
        $path = $match;
    }
    $size = @getimagesize($path);
    if ($size[0] && $size[1]) {
        $match = str_replace("/", "\/", $match);
        $match = str_replace(".", "\.", $match);
        $match = str_replace("+", "\+", $match);
        $pattern = "/(onclick=[\'\"]{0,1}image_window\(this\)[\'\"]{0,1}) (.*)(src=\"$match\")/iU";
        $replacement = "onclick='image_window(this, $size[0], $size[1])' $2$3";
        if ($size[0] > $board[bo_image_width])
            $replacement .= " width=\"$board[bo_image_width]\"";
        $data = preg_replace($pattern, $replacement, $data);
    }
}
$view[rich_content] = $data;
$view[rich_content] = preg_replace_callback("/\[code\](.*)\[\/code\]/iU", "_preg_callback", $view[rich_content]);

$etc2_exp=explode("|" , $view[wr_2]);
$etc2_exp00 = $etc2_exp[0];   $etc2_exp01 = $etc2_exp[1];
$etc2_exp02 = $etc2_exp[2];   $etc2_exp03 = $etc2_exp[3];

$etc7_exp=explode("|" , $view[wr_7]);
$etc7_exp00 = $etc7_exp[0];   $etc7_exp01 = $etc7_exp[1];
$etc7_exp02 = $etc7_exp[2];   $etc7_exp03 = $etc7_exp[3];
$etc7_exp04 = $etc7_exp[4];   $etc7_exp05 = $etc7_exp[5];
$etc7_exp06 = $etc7_exp[6];   $etc7_exp07 = $etc7_exp[7];
$etc7_exp08 = $etc7_exp[8];   $etc7_exp09 = $etc7_exp[9];
$etc7_exp10 = $etc7_exp[10];  $etc7_exp11 = $etc7_exp[11];
$etc7_exp12 = $etc7_exp[12];  $etc7_exp13 = $etc7_exp[13];
$etc7_exp14 = $etc7_exp[14];  $etc7_exp15 = $etc7_exp[15];
$etc7_exp16 = $etc7_exp[16];

$etc9_exp = explode("|",$view[wr_9]);
$etc9_exp00 = $etc9_exp[0];   $etc9_exp01 = $etc9_exp[1];
$etc9_exp02 = $etc9_exp[2];   $etc9_exp03 = $etc9_exp[3];
$etc9_exp04 = $etc9_exp[4];   $etc9_exp05 = $etc9_exp[5];
$etc9_exp06 = $etc9_exp[6];   $etc9_exp07 = $etc9_exp[7];
$etc9_exp08 = $etc9_exp[8];   $etc9_exp09 = $etc9_exp[9];
$etc9_exp10 = $etc9_exp[10];  $etc9_exp11 = $etc9_exp[11];
$etc9_exp12 = $etc9_exp[12];  $etc9_exp13 = $etc9_exp[13];
$etc9_exp14 = $etc9_exp[14];  $etc9_exp15 = $etc9_exp[15];
$etc9_exp16 = $etc9_exp[16];  $etc9_exp17 = $etc9_exp[17];
$etc9_exp18 = $etc9_exp[18];  $etc9_exp19 = $etc9_exp[19];
$etc9_exp20 = $etc9_exp[20];  $etc9_exp21 = $etc9_exp[21];
$etc9_exp22 = $etc9_exp[22];  $etc9_exp23 = $etc9_exp[23];
$etc9_exp24 = $etc9_exp[24];  $etc9_exp25 = $etc9_exp[25];
$etc9_exp26 = $etc9_exp[26];  $etc9_exp27 = $etc9_exp[27];
$etc9_exp28 = $etc9_exp[28];  $etc9_exp29 = $etc9_exp[29];
$etc9_exp30 = $etc9_exp[30];  $etc9_exp31 = $etc9_exp[31];
$etc9_exp32 = $etc9_exp[32];  $etc9_exp33 = $etc9_exp[33];
$etc9_exp34 = $etc9_exp[34];  $etc9_exp35 = $etc9_exp[35];
$etc9_exp36 = $etc9_exp[36];  $etc9_exp37 = $etc9_exp[37];


$etc13_exp=explode("|" , $view[wr_13]);
$etc13_exp00 = $etc13_exp[0];   $etc13_exp01 = $etc13_exp[1];
$etc13_exp02 = $etc13_exp[2];   $etc13_exp03 = $etc13_exp[3];
$etc13_exp04 = $etc13_exp[4];   $etc13_exp05 = $etc13_exp[5];
$etc13_exp06 = $etc13_exp[6];   $etc13_exp07 = $etc13_exp[7];
$etc13_exp08 = $etc13_exp[8];   $etc13_exp09 = $etc13_exp[9];
$etc13_exp10 = $etc13_exp[10];
?>
<style type="text/css">

.smfont1 {font-size:11px; color:#555555; font-family:dotum,돋움;}
.smfont2 {font-size:12pt; font-weight:bold; line-height:14px; color:#009520; font-family:dotum,돋움;}
.smfont4 { font-size:14pt; color:5c5c5c; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont66 { font-size:11pt; color:#3366cc; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont666 { font-size:11pt; color:#3366cc; font-family:맑은 고딕, 돋움;}
.smfont44 { font-size:11pt; color:0099FF; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont55 { font-size:11pt; color:#51463a; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont5 { font-size:14pt; color:black; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont6 { font-size:14pt; color:#3366cc; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont7 { font-size:12pt; color:black; font-weight:bold; font-family:맑은 고딕, 돋움;}

.smfont77 { font-size:12pt; color:#413dff; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont78 { font-size:12pt; color:#ff2d42; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont79 { font-size:12pt; color:#eb6137; font-weight:bold; font-family:맑은 고딕, 돋움;}

.smfont8 { font-weight:bold;font-size:9pt; color:#3a72a9; font-family:맑은 고딕, 돋움;}
.smfont9 {font-size:12pt; font-weight:bold; line-height:14px; color:#3a72a9; font-family:dotum,돋움;}
.current { font:bold 11px tahoma; color:#E15916; }
.smfont10 {font-size:11px; color:#E15916; font-family:dotum,돋움;}
</style>

<script>
  function chgImg( imgname, dnimgname, imgdesc ) {
    var LureExp = /<br>/gi;
    document.gallery_img.src=imgname;
      }
</script>

<script> 
function obxTabPage(sizex , sizey, cssHead){
    if(!cssHead) this.cssHead='';
    else this.cssHead=cssHead;
    document.write(
        '<table cellpadding="0" cellspacing="0" style="table-layout:fixed;padding:1;height:'+sizey+';width:'+sizex+'">' +
        '<tr><td class=TP_'+this.cssHead+'_NCELL width=*>&nbsp;</td></tr>'+
        '<tr><td class=TP_'+this.cssHead+'_CONTENT1 width=100%> </td></tr>'+ 
        '</table>'
    );
    this.height=sizey;
    this.width=sizex;
    var tables=document.getElementsByTagName("table");
	this.table=tables[tables.length-1];
    this.titleRow=this.table.rows[0];
    this.nullCell = this.titleRow.cells[0];
    this.contentRow = this.table.rows[1];
    this.contentCell = this.contentRow.cells[0];
    this.item= new Object();

    this.length=0;

    var re=new RegExp("\\bobxtp=(\\w+)\\b",'i');
    if(location.search.match(re)) this.defaultView = RegExp.$1;

    this.addStart= function (id,title,idx,action) {

		var iIndex=(idx) ? idx-1 : this.length;
        
        this.item[id] = this.titleRow.insertCell(iIndex);

		this.item[id].className='TP_'+this.cssHead+'_CELL';
        this.item[id].parentObject=this;
        this.item[id].onclick=Function("this.parentObject.show('"+id+"');");
        if(action) this.item[id].action = action;
        this.item[id].height=25;
        this.item[id].innerHTML=title;
        document.write('<div style="display:none;width:100%;height:100%">');
		var divs=document.getElementsByTagName("div");
        this.item[id].content = divs[divs.length-1];
        this.item[id].content.className='TP_'+this.cssHead+'_CONTENT2';
        this.DrawingID=id;
        this.length++;
        this.contentCell.colSpan=this.length+1;

    }
    
    this.addEnd = function () {
        document.write("</div></div>");
        this.contentCell.appendChild(this.item[this.DrawingID].content);
        if(!this.LastShownItemID) this.show(this.DrawingID,1);
        else if(this.defaultView==this.DrawingID) this.show(this.defaultView,1);
    }
    this.show = function (id,runtime){

        if (this.LastShownItemID) this.hide(this.LastShownItemID);
        this.LastShownItemID = id;
        this.item[id].className='TP_'+this.cssHead+'_SCELL';
        this.item[id].content.style.display='';
        if(this.item[id].action) {
            try{eval(this.item[id].action);}catch(e){}}
    }

    this.hide = function (id){
        this.item[id].className='TP_'+this.cssHead+'_CELL';;
        this.item[id].content.style.display="none";
    }
} 
</script>

<!--여기까지 1번 완료-->


<script type="text/javascript">
document.title = "<?=strip_tags(addslashes($view[wr_subject]))?>";
</script>

<link type="text/css" href="<?=$board_skin_path?>/mw.js/ui-lightness/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?=$board_skin_path?>/mw.js/jquery-ui-1.8.19.custom.min.js"></script>
<script type="text/javascript" src="<?=$board_skin_path?>/mw.js/tooltip.js"></script>

<script type="text/javascript" src="<?=$board_skin_path?>/mw.js/syntaxhighlighter/scripts/shCore.js"></script>
<script type="text/javascript" src="<?=$board_skin_path?>/mw.js/syntaxhighlighter/scripts/shBrushPhp.js"></script>
<link type="text/css" rel="stylesheet" href="<?=$board_skin_path?>/mw.js/syntaxhighlighter/styles/shCore.css"/>
<link type="text/css" rel="stylesheet" href="<?=$board_skin_path?>/mw.js/syntaxhighlighter/styles/shThemeDefault.css"/>
<script type="text/javascript">
SyntaxHighlighter.config.clipboardSwf = '<?=$board_skin_path?>/mw.js/syntaxhighlighter/scripts/clipboard.swf';
SyntaxHighlighter.all();
</script>
<link rel="stylesheet" href="<?=$board_skin_path?>/style.common.css?<?=filemtime("$board_skin_path/style.common.css")?>" type="text/css">

<script type="text/javascript" src="<?=$board_skin_path?>/mw.js/ZeroClipboard.js?time=<?=time()?>"></script>
<script type="text/javascript">
function initClipboard() {
    clipBoardView = new ZeroClipboard.Client();
    ZeroClipboard.setMoviePath("<?=$board_skin_path?>/mw.js/ZeroClipboard.swf");
    clipBoardView.addEventListener('mouseOver', function (client) {
        clipBoardView.setText($("#post_url").text());
    });
    clipBoardView.addEventListener('complete', function (client) {
        alert("클립보드에 복사되었습니다. \'Ctrl+V\'를 눌러 붙여넣기 해주세요.");
    });  
    clipBoardView.glue("post_url_copy");
}
$(document).ready(function () {
    if ($("#post_url").text()) {
        initClipboard();
    }
});
</script>

<!--출처 자동복사-->
<? if ($mw_basic[cf_source_copy]) { // 출처 자동 복사 ?>
<? $copy_url = $shorten ? $shorten : set_http("{$g4[url]}/{$g4[bbs]}/board.php?bo_table={$bo_table}&wr_id={$wr_id}"); ?>
<script type="text/javascript" src="<?=$board_skin_path?>/mw.js/autosourcing.open.compact.js"></script>
<style type="text/css">
DIV.autosourcing-stub { display:none }
DIV.autosourcing-stub-extra { position:absolute; opacity:0 }
</style>
<script type="text/javascript">
AutoSourcing.setTemplate("<p style='margin:11px 0 7px 0;padding:0'> <a href='{link}' target='_blank'> [출처] {title} - {link}</a> </p>");
AutoSourcing.setString(<?=$wr_id?> ,"<?=$config[cf_title];//$view[wr_subject]?>", "<?=$view[wr_name]?>", "<?=$copy_url?>");
AutoSourcing.init( 'view_%id%' , true);
</script>
<? } ?>

<? if ($mw_basic[cf_content_align] && $write[wr_align]) { ?>
<style>
#view_content { text-align:<?=$write[wr_align]?>; }
</style>
<? } ?>

<!-- 게시글 보기 시작 -->
<table width="<?=$bo_table_width?>" align="center" cellpadding="0" cellspacing="0"><tr><td id=mw_basic>

<?  if ($mw_basic['cf_include_head'] && file_exists($mw_basic['cf_include_head']) && strstr($mw_basic[cf_include_head_page], '/v/'))
    include_once($mw_basic[cf_include_head]); ?>

<? include_once("$board_skin_path/mw.proc/mw.list.hot.skin.php"); ?>

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
<table width="100%">
<tr height="25">
    <td width="30%">
        <form name="fcategory_view" method="get" style="margin:0;">
        <? if ($is_category && !$mw_basic[cf_category_tab]) { ?>
            <select name=sca onchange="location='<?=$category_location?>'+this.value;">
            <? if (!$mw_basic[cf_default_category]) { ?> <option value=''>전체</option> <? } ?>
            <?=$category_option?>
            </select>
        <? } ?>
        </form>
    </td>
    <td align="right">
        <? if ($mw_basic[cf_social_commerce]) { ?>
        <span class=mw_basic_total style="cursor:pointer;" onclick="win_open('<?=$social_commerce_path?>/order_list.php?bo_table=<?=$bo_table?>', 'order_list', 'width=800,height=600,scrollbars=1');">[주문내역]</span>
        <? } ?>
        <? include("$board_skin_path/mw.proc/mw.smart-alarm-config.php") ?>
        <span class=mw_basic_total>총 게시물 <?=number_format($total_count)?>건, 최근 <?=number_format($new_count)?> 건</span>
        <? if ($is_admin && $mw_basic[cf_collect] == 'rss' && file_exists("$g4[path]/plugin/rss-collect/_lib.php")) {?>
        <img src="<?=$g4[path]?>/plugin/rss-collect/img/btn_collect.png" align="absmiddle" style="cursor:pointer;" onclick="win_open('<?=$g4[path]?>/plugin/rss-collect/config.php?bo_table=<?=$bo_table?>', 'rss_collect', 'width=800,height=600,scrollbars=1')">
        <? } ?>
        <? if ($is_admin && $mw_basic[cf_collect] == 'youtube' && file_exists("$g4[path]/plugin/youtube-collect/_lib.php")) {?>
        <img src="<?=$g4[path]?>/plugin/youtube-collect/img/btn_collect.png" align="absmiddle" style="cursor:pointer;" onclick="win_open('<?=$g4[path]?>/plugin/youtube-collect/config.php?bo_table=<?=$bo_table?>', 'youtube_collect', 'width=800,height=600,scrollbars=1')">
        <? } ?>
        <a style="cursor:pointer" class="tooltip"
            title="읽기:<?=$board[bo_read_point]?>,
쓰기:<?=$board[bo_write_point]?><?
if ($mw_basic[cf_contents_shop_write]) { echo " ($mw_cash[cf_cash_name]$mw_basic[cf_contents_shop_write_cash]$mw_cash[cf_cash_unit])"; } ?>,
댓글:<?=$board[bo_comment_point]?>,
다운:<?=$board[bo_download_point]?>"><!--
        --><img src='<?=$board_skin_path?>/img/btn_info.gif' border=0 align=absmiddle></a>
        <? if ($mw_basic[cf_social_commerce] && $rss_href && file_exists("$social_commerce_path/img/xml.png")) { ?>
            <a href='<?=$social_commerce_path?>/xml.php?bo_table=<?=$bo_table?>'><img src='<?=$social_commerce_path?>/img/xml.png' border=0 align=absmiddle></a>
        <? } else if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
        <? if ($is_admin == "super") { ?><a href="<?=$config_href?>"><img src="<?=$board_skin_path?>/img/btn_config.gif" title="스킨설정" border="0" align="absmiddle"></a><?}?>
        <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif" title="관리자" width="63" height="22" border="0" align="absmiddle"></a><?}?>
    </td>
</tr>
</table>

<script type="text/javascript">
<?  if (!$mw_basic[cf_category_tab]) { ?>
if ('<?=$sca?>') document.fcategory_view.sca.value = '<?=urlencode($sca)?>';
<? } ?>
</script>

<? include_once("$board_skin_path/mw.proc/mw.notice.top.php") ?>
<? include_once("$board_skin_path/mw.proc/mw.search.top.php") ?>
<? include_once("$board_skin_path/mw.proc/mw.cash.membership.skin.php") ?>

<!-- 링크 버튼 -->
<?
ob_start();
?>
<table width=100%>
<tr height=35>
    <td>
        <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_search_list.gif' border='0' align='absmiddle'></a> "; } ?>
        <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>
        <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_update.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>
        <? //if ($good_href) { echo "<a href=\"$good_href\" target='hiddenframe'><img src='$board_skin_path/img/btn_good.gif' border='0' align='absmiddle'></a> "; } ?>
        <? //if ($nogood_href) { echo "<a href=\"$nogood_href\" target='hiddenframe'><img src='$board_skin_path/img/btn_nogood.gif' border='0' align='absmiddle'></a> "; } ?>

        <? //if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('$scrap_href');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>

    </td>
    <td align=right>
        <? if ($prev_href) { echo "<input type=image src=\"$board_skin_path/img/btn_prev.gif\" onclick=\"location.href='$prev_href'\" title=\"$prev_wr_subject\" accesskey='b'>&nbsp;"; } ?>
        <? if ($next_href) { echo "<input type=image src=\"$board_skin_path/img/btn_next.gif\" onclick=\"location.href='$next_href'\" title=\"$next_wr_subject\" accesskey='n'>&nbsp;"; } ?>
    </td>
</tr>
</table>
<?
$link_buttons = ob_get_contents();
ob_end_flush();
?>

<?
if ($is_category && $mw_basic[cf_category_tab]) {
    $category_list = explode("|", $board[bo_category_list]);
?>
<div class="category_tab">
<ul>
    <? if (!$mw_basic[cf_default_category]) { ?>
    <li <? if (!$sca) echo "class='selected'";?>><div><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>">전체</a></div></li>
    <? } ?>
    <? for ($i=0, $m=sizeof($category_list); $i<$m; $i++) { ?>
    <li <? if (urldecode($sca) == $category_list[$i]) echo "class='selected'";?>><div><a 
        href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&sca=<?=urlencode($category_list[$i])?>"><?=$category_list[$i]?></a></div></li>
    <? } ?>
</ul>
</div>
<? } ?>

<!-- 제목, 글쓴이, 날짜, 조회, 추천, 비추천 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr><td height=2 class=mw_basic_line_color></td></tr>
<!-- 제목 들어가는 곳 -->
<tr><td class=mw_basic_view_subject>
        <? if ($view[wr_is_mobile]) echo "<img src='$board_skin_path/img/icon_mobile.png' class='mobile_icon'>"; ?>
        <? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
        <h1><?=cut_hangul_last(get_text($view[wr_1]))?> <?=$view[icon_secret]?></h1>
        <? if ($mw_basic[cf_reward]) echo "&nbsp;<img src='$board_skin_path/img/btn_reward_$reward[re_status].gif' align='absmiddle'>"; ?>
        <? if ($mw_basic[cf_attribute] == 'qna' && !$view[is_notice]) { ?>
        <img src="<?=$board_skin_path?>/img/icon_qna_<?=$view[wr_qna_status]?>.png" align="absmiddle"></span> <?}?>
    </td></tr>
<!-- 제목 들어가는 곳 끝 -->
<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<!-- 글쓴이, IP, 날짜, 조회, 추천, 신고 -->
<tr><td height=30 class=mw_basic_view_title>
	<? if ($mw_basic[cf_contents_shop]) { // 배추 컨텐츠샵 ?>
	<strong>가격</strong> : 
	<span class="mw_basic_contents_price"><?=$mw_price?></span>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<? } ?>
        <? //if ($mw_basic[cf_attribute] != "anonymous") { ?>
        글쓴이 : 
	<span class=mw_basic_view_name> <?=$view[name]?>
        <? if ($mw_basic[cf_icon_level] && !$view[wr_anonymous] && $mw_basic[cf_attribute] != "anonymous" && $write[mb_id] && $write[mb_id] != $config[cf_admin]) { ?>
        <span class="icon_level<?=mw_get_level($write[mb_id])+1?>" style="border:1px solid #ddd;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <? } ?>
	<? if ($is_ip_view && $ip) { ?>
	&nbsp;(<?=$ip?>)
        <? if ($is_admin) { ?>
            <img src="<?=$board_skin_path?>/img/btn_ip.gif" align=absmiddle title='IP조회' style="cursor:pointer" onclick="btn_ip('<?=$view[wr_ip]?>')">
            <img src="<?=$board_skin_path?>/img/btn_ip_search.gif" align=absmiddle title='IP검색' style="cursor:pointer" onclick="btn_ip_search('<?=$view[wr_ip]?>')">
        <? } ?>
	<? //} // mw_basic[cf_attribute] != 'anonymous'?>
	</span>
        <? } ?>
        날짜 : <span class=mw_basic_view_datetime><?=substr($view[wr_datetime],0,10)." (".get_yoil($view[wr_datetime]).") ".substr($view[wr_datetime],11,5)?></span>
        조회 : <span class=mw_basic_view_hit><?=$view[wr_hit]?></span>
        <? /*if ($is_good) { ?>추천 : <span class=mw_basic_view_good><?=$view[wr_good]?></span><?}*/?>
        <? /*if ($is_nogood) { ?>비추천 : <span class=mw_basic_view_nogood><?=$view[wr_nogood]?></span><?}*/?>
        <? if ($singo_href) { ?><a href="<?=$singo_href?>"><img src="<?=$board_skin_path?>/img/btn_singo2.gif" align=absmiddle title='신고'></a><?}?>
        <? if ($print_href) { ?><a href="<?=$print_href?>"><img src="<?=$board_skin_path?>/img/btn_print.gif" align=absmiddle title='인쇄'></a><?}?>
    </td>
</tr>
<!-- 글쓴이, IP, 날짜, 조회, 추천, 신고 끝-->
<?  if ($mw_basic[cf_umz]) { // 짧은 글주소 사용 ?>
<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<tr><td height=30 class=mw_basic_view_title>
        글주소 : <span id="post_url"><?=$view[wr_umz]?></span>
        <img src="<?=$board_skin_path?>/img/copy.png" id="post_url_copy" align="absmiddle">
        <? if ($is_admin) { ?>
        <span id='btn_get_umz'><a><img src="<?=$board_skin_path?>/img/reumz.png" align="absmiddle"/></a></span>
        <script type="text/javascript">
        $(document).ready(function () {
            $("#btn_get_umz a").css("cursor", "pointer");
            $("#btn_get_umz").bind("click", function () {
                tmp = $("#btn_get_umz").html();
                $("#btn_get_umz").html("<img src='<?=$board_skin_path?>/img/icon_loading.gif' height='16' align='absmiddle'/>");
                $.get("<?=$board_skin_path?>/mw.proc/mw.umz.php", { 'bo_table':'<?=$bo_table?>', 'wr_id':'<?=$wr_id?>' }, function (url) {
                    if (url)
                        $("#post_url").text(url);
                    $("#btn_get_umz").html(tmp);
                });
            });
        });
        </script>
        <?} ?>
    </td>
</tr>
<? } ?>


<? if ($mw_basic[cf_shorten]) { ?>
<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<tr>
    <td height=30 class=mw_basic_view_title>
        글주소 : <span id="post_url"><?=$shorten?></span>
        <img src="<?=$board_skin_path?>/img/copy.png" id="post_url_copy" align="absmiddle">
    </td>
</tr>
<? } ?>

<? if ($mw_basic[cf_include_file_head]) { echo "<tr><td>"; @include_once($mw_basic[cf_include_file_head]); echo "</td></tr>"; } ?>

<? if ($mw_basic[cf_file_head]) { echo "<tr><td>$mw_basic[cf_file_head]</td></tr>"; } ?>
<?
// 가변 파일
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source] && !$view[file][$i][view] && !$view[file][$i][movie]) {
        $cnt++;
?>
<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<tr><td class=mw_basic_view_file>
        <a href="javascript:file_download('<?=$view[file][$i][href]?>', '<?=addslashes($view[file][$i][source])?>', '<?=$i?>');" title="<?=$view[file][$i][content]?>">
        <img src="<?=$board_skin_path?>/img/icon_file_down.gif" align=absmiddle>
        <?=$view[file][$i][source]?></a>
        <span class=mw_basic_view_file_info> (<?=$view[file][$i][size]?>), Down : <?=$view[file][$i][download]?>, <?=$view[file][$i][datetime]?></span>
        <? if ($good_href) { ?>
        <img src="<?=$board_skin_path?>/img/btn_down_good.png" align="absmiddle" style="cursor:pointer;" onclick="mw_good_act_nocancel('good')"/>
        <? } ?>
    </td></tr>
<?
    }
}

// 링크
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
?>
<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<tr><td class=mw_basic_view_link>
        <img src='<?=$board_skin_path?>/img/icon_link.gif' align=absmiddle>
        <a href='<?=$view[link_href][$i]?>' target='<?=$view[link_target][$i]?>'><?=$link?></a>
        <span class=mw_basic_view_link_info>(<?=$view[link_hit][$i]?>)</span>
        <span><img src="<?=$board_skin_path?>/img/qr.png" class="qr_code" value="<?=$view[link][$i]?>" align="absmiddle"></span>
    </td></tr>
<?
    }
}
?>

<script type="text/javascript">
$(document).ready(function () {
    $("#mw_basic").append("<div id='qr_code_layer'>QR CODE</div>");
    $(".qr_code").css("cursor", "pointer");
    $(".qr_code").toggle(function () {
        var url = $(this).attr("value");
        var x = $(this).offset().top;
        var y = $(this).offset().left;

        //$(".qr_code").append("<div");
        $("#qr_code_layer").hide("fast");

        $("#qr_code_layer").css("position", "absolute");
        $("#qr_code_layer").css("top", x + 20);
        $("#qr_code_layer").css("left", y);
        $("#qr_code_layer").html("<div class='qr_code_google'><img src='http://chart.apis.google.com/chart?cht=qr&chld=H|2&chs=100&chl="+url+"'></div>");
        $("#qr_code_layer").html($("#qr_code_layer").html() + "<div class='qr_code_info'>모바일로 QR코드를 스캔하면 웹사이트 또는 모바일사이트에 바로 접속할 수 있습니다.</div>");
        $("#qr_code_layer").show("fast");
    }, function () {
        $("#qr_code_layer").hide("fast");
    });
});
</script>
<style type="text/css">
#qr_code_layer { display:none; position:absolute; background-color:#fff; border:2px solid #ccc; padding:10px; width:280px; }
#qr_code_layer .qr_code_google { border:5px solid #469CE0; float:left; }
#qr_code_layer .qr_code_google img { width:100px; height:100px; }
#qr_code_layer .qr_code_info { float:left; margin:0 0 0 10px; width:115px; font:normal 12px 'gulim'; line-height:18px; color:#555; }
</style>

<? if ($mw_basic[cf_file_tail]) { echo "<tr><td>$mw_basic[cf_file_tail]</td></tr>"; } ?>

<? if ($mw_basic[cf_include_file_tail]) { echo "<tr><td>"; @include_once($mw_basic[cf_include_file_tail]); echo "</td></tr>"; } ?>

<? if ($is_admin || $history_href || $is_singo_admin) { ?>
<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<tr><td height=40 class="func_buttons">
        <?
        ob_start();
        if ($is_singo_admin && $view[mb_id] != $member[mb_id]) { 
            echo "<span><a href=\"javascript:btn_intercept()\">";
            echo "<img src='$board_skin_path/img/btn_intercept.gif' border='0' align='absmiddle'></a></span>"; 
        }
        if ($history_href) {
            echo "<span><a href=\"$history_href\"><img src='$board_skin_path/img/btn_history.gif' border='0' align='absmiddle'></a></span>";
        }
	if ($is_admin) {
            if ($download_log_href) {
                echo "<span><a href=\"$download_log_href\"><img src='$board_skin_path/img/btn_download_log.gif' border='0' align='absmiddle'></a></span>";
            }
            if ($link_log_href) {
                echo "<span><a href=\"$link_log_href\"><img src='$board_skin_path/img/btn_link_log.gif' border='0' align='absmiddle'></a></span>";
            }
            if ($copy_href) {
                echo "<span><a href=\"$copy_href\"><img src='$board_skin_path/img/btn_copy.gif' border='0' align='absmiddle'></a></span>";
            }
            if ($move_href) {
                echo "<span><a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a></span>";
            }
            if ($is_category) {
                echo "<span><a href=\"javascript:mw_move_cate_one();\"><img src=\"$board_skin_path/img/btn_select_cate.gif\" border=\"0\" align='absmiddle'></a></span>";
            }
            if ($nosecret_href) {
                echo "<span><a href=\"$nosecret_href\"><img src='$board_skin_path/img/btn_nosecret.gif' border='0' align='absmiddle'></a></span>";
            }
            if ($secret_href) {
                echo "<span><a href=\"$secret_href\"><img src='$board_skin_path/img/btn_secret.gif' border='0' align='absmiddle'></a></span>";
            }

            echo "<span><a href=\"javascript:btn_now()\"><img src='$board_skin_path/img/btn_now.gif' border='0' align='absmiddle'></a></span>";

            if ($view[is_notice]) $btn_notice = '_off'; else $btn_notice = ''; 
            echo "<span><a href=\"javascript:btn_notice()\"><img src='$board_skin_path/img/btn_notice{$btn_notice}.gif'";
            echo " border='0' align='absmiddle'></a></span>"; 

            if ($view[wr_comment_hide]) $btn_comment_hide = '_no'; else $btn_comment_hide = ''; 
            echo "<span><img src='$board_skin_path/img/btn_comment_hide{$btn_comment_hide}.gif' ";
            echo "onclick='btn_comment_hide()' style='cursor:pointer' align='absmiddle'></span>";

            if ($is_admin == "super") {
                echo "<span><img src=\"$board_skin_path/img/btn_member_email.gif\" style=\"cursor:pointer;\" ";
                echo "onclick=\"void(mw_member_email())\" align=\"absmiddle\"></span>"; 
            }

            $row = sql_fetch("select * from $mw[popup_notice_table] where bo_table = '$bo_table' and wr_id = '$wr_id'", false);
            if ($row) { $btn_popup = '_off'; $is_popup = true; } else { $btn_popup = ''; $is_popup = false; }
            echo "<span><a href=\"javascript:btn_popup()\"><img src='$board_skin_path/img/btn_popup{$btn_popup}.png' border='0' align='absmiddle'></a></span>"; 

            echo "<span><a href=\"javascript:void(btn_copy_new())\"><img src='$board_skin_path/img/btn_copy_new.png' border='0' align='absmiddle'></a></span>"; 

            if ($write[wr_view_block]) { $btn_block = '_off'; } else { $btn_block = ''; }
            echo "<span><a href=\"javascript:btn_view_block()\"><img src='$board_skin_path/img/btn_view_block{$btn_block}.png' ";
            echo "border='0' align='absmiddle'></a></span>"; 
        }
        $mw_admin_button = ob_get_contents();
        ob_end_flush();
        ?>
        <div class="block"></div>
    </td>
</tr>
<? } ?>
<!-- 소셜커머스 -->
<? if ($mw_basic[cf_social_commerce]) { ?>
<tr><td><? include("$social_commerce_path/view.skin.php") ?></td></tr>
<? } ?>
<!-- 재능마켓 -->
<? if ($mw_baic[cf_talent_market]) { ?>
<tr><td><? include("$talent_market_path/view.skin.php") ?></td></tr>
<? } ?>

<!-- 자동폭파 -->
<?
$bomb = sql_fetch(" select * from $mw[bomb_table] where bo_table = '$bo_table' and wr_id = '$wr_id' ");
if ($bomb) {
?>
<tr><td><div class="mw_basic_view_bomb">
        <img src="<?=$board_skin_path?>/img/icon_bomb.gif" align="absmiddle">&nbsp;
        이 게시물이 자동 폭파되기까지 <span id="bomb_end_timer"></span> 남았습니다.
        </div>
        <script type="text/javascript">
        var bomb_end_time = <?=(strtotime($bomb[bm_datetime])-$g4[server_time])?>;
        function bomb_run_timer()
        {
            var timer = document.getElementById("bomb_end_timer");

            dd = Math.floor(bomb_end_time/(60*60*24));
            hh = Math.floor((bomb_end_time%(60*60*24))/(60*60));
            mm = Math.floor(((bomb_end_time%(60*60*24))%(60*60))/60);
            ii = Math.floor((((bomb_end_time%(60*60*24))%(60*60))%60));

            var str = "";

            if (dd > 0) str += dd + "일 ";
            if (hh > 0) str += hh + "시간 ";
            if (mm > 0) str += mm + "분 ";
            str += ii + "초 ";

            //timer.style.color = "#FF6C00";
            timer.style.color = "#FF0000";
            timer.style.fontWeight = "bold";
            timer.innerHTML = str;

            bomb_end_time--;

            if (bomb_end_time <= 0)  {
                clearInterval(bomb_tid);
                location.href = "<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>";
            }
        }
        bomb_run_timer();
        bomb_tid = setInterval('bomb_run_timer()', 1000); 
        </script>
    </td>
</tr>
<? } ?>
<!-- 자동폭파 끝 -->
<!--여기가 진짜 내용이 들어가는 곳-->

</p>
<table width="59%" border="0" cellspacing="0" cellpadding="0">
<tr>
        <td width="100%" height="300">
            <table width="59%" border="0" cellspacing="0" cellpadding="0">
					
<!--여기가 사진 시작-->					
                <tr><td height="126" width="814">
                        <table width="813" border="0" cellspacing="0" cellpadding="0" height="112">
                            <tr><td width="7" height="112">&nbsp;</td>
                                <td width="796" valign="top" bgcolor=#ffffff height="112">
                                    <table width="570" border="0" cellspacing="0" cellpadding="0" align="center">
                                        <tr><td><? if ($view[file][0][view])  {?>
                                                <table width="570">
                                                    <tr valign="top" align="center"><td width="560">
								                        <table width="550" border="0" cellspacing="0" cellpadding="0">
                                                                <tr><td valign="top">				<? 
        for ($i=0; $i<=9; $i++) {
             $image[$i] = "$g4[path]/data/file/$bo_table/".$view[file][$i][file];

			 $thumimg[$i]="<img src =$image[$i] width=140 height=120 border=0 onclick=\"view('$image[$i]')\" style=cursor:hand>";
		}
        ?>
</td>  </tr>
  <tr>    <td valign="top">
<!--//-->
	<table width="570" border="0" cellspacing="0" cellpadding="0">  <tr>
    <td width="570" height="440" background="<?=$board_skin_path?>/img/photo_bg.gif" align="center" valign="top">
	             <table cellpadding="0" cellspacing="0"> <tr><? if ($view[file][0][file])  {?>
<img src=<?=$image[0]?> name=gallery_img width=530 height=400 border=0 style=vertical-align: middle;cursor:pointer; onClick="OpenWin('<?=$board_skin_path?>/slideshow.php?bo_table=<?=$bo_table?>&amp;wr_id=<?=$wr_id?>',900,570); return false;" border=0 value=0>  
<? } ?></a>
                                                               </td></tr></table>
                                                                    </td> </tr> </table>
                                                            <!--//-->							  

                                                        </td></tr>
                                                    <tr><td valign="top">
                                                            <!--//-->
                                                            <table align="center" height="52" width="23">
                                                                <tr><td height="48" width="17"><?=$view[file][0][content]?></td>
                                                                </tr></table>
                                   <!--//-->
							  
                                                        </td></tr></table>
                                            </td></tr> </table>
                                </td></tr> </table>

                        <? } else {?>
							
                       <? }?>                        </td>
                    <td width="3" height="10"><span style="font-size:1pt;">&nbsp;</span></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="56%">
    <tr height=35>
        <td width="774">
            
            <p align="center"><? if ($view[file][0][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[0]."','".$image[0]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[0]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][1][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[1]."','".$image[1]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[1]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][2][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[2]."','".$image[2]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[2]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][3][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[3]."','".$image[3]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[3]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][4][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[4]."','".$image[4]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[4]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][5][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[5]."','".$image[5]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[5]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][6][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[6]."','".$image[6]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[6]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][7][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[7]."','".$image[7]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[7]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][8][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[8]."','".$image[8]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[8]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>
            <? if ($view[file][9][file]) {?>
			<a href=# <? echo "onMouseOver=\"chgImg( '".$image[9]."','".$image[9]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($content) )."' );\"" ?>> <img src="<?=$image[9]?>" width="50" height="43" align="absmiddle" border="0"></a>
            <? }?>   </p>
			<p align="right"><a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/but_list.gif" width="60" height="21" border="0" /></a><img src="<?=$board_skin_path?>/img/tom5.gif" width="5" height="21" /><a href="javascript:btn_print();"><img src="<?=$board_skin_path?>/img/but_print.gif" width="60" height="21"  border="0" /></a><img src="<?=$board_skin_path?>/img/tom5.gif" width="1" height="21" />
 <a href="javascript:" onclick="win_scrap('<?=$scrap_href?>')"><img src='<?=$board_skin_path?>/img/but_zzim.gif' border='0' alt='찜하기'></a><img src="<?=$board_skin_path?>/img/tom5.gif" width="5" height="21" /></p>
            <table width="813" border="0" cellspacing="0" cellpadding="0" >
                <tr><td height="44"><img src="<?=$board_skin_path?>/img/salesinfo_top.gif" width="813" height="66" /></td></tr>

                <tr><td height="200">
                        <table width="813" border="0" cellspacing="0" cellpadding="0" height="165">
                            <tr><td width="7" height="165">&nbsp;</td>
                                <td width="796" valign="top" bgcolor=#ffffff height="165">
                                    <table width="740" border="0" align="center" cellpadding="0" cellspacing="1" height="151">
                                        <tr><td width="74" height="36"><img src="<?=$board_skin_path?>/img/m42.gif" width="75" height="20"></td>
                                            <td class="bold" width="663" height="36" colspan="3"><font class=black><?=$view[wr_1]?></font></td>
                                        </tr>
                                        <tr><td colspan="4" height="1" bgcolor="eee4e3" width="738"></td>
                                        </tr>

                                        <tr><td width="74" height="36"><img src="<?=$board_skin_path?>/img/m8.gif" width="75" height="20"></td>
                                            <td width="302" height="36" class="bold">
<font class="smfont6"><?=$view[wr_subject]?></font></td>
                                            <td width="75" height="36" class="bold"><img src="<?=$board_skin_path?>/img/realty_03.gif" width="95" height="20"></td>
                                            <td width="284" height="36" class="bold">
<font class="smfont66"><?=$etc2_exp00?> -<?=$etc2_exp01?>  -<?=$etc2_exp02?></font></td>
                                        </tr>
                                        <tr><td colspan="4" height="1" bgcolor="eee4e3" width="738"></td>
                                        </tr>
                                        <tr>
                                            <td width="74" height="36"><img src="<?=$board_skin_path?>/img/m5.gif" width="75" height="20"></td>
                                            <td width="302" height="36">
                                                <p style="line-height:100%; margin-top:0; margin-bottom:0;"><?if($etc7_exp02 == "월세(임대)") {?>
<img src='<?=$board_skin_path?>/img/icon_monthly.gif' border=0 align=absmiddle alt='보증금/월세'> <font class="smfont66"><?=$etc7_exp03?>/<?=$etc7_exp04 ?></font>
                                                <? } else {
    }
?>
                                                <?if($etc7_exp01 == "전세") { ?>
<img src='$board_skin_path/img/icon_deposit.gif' border=0 align=absmiddle alt='전세가'><font class="smfont66"><?=$etc7_exp05 ?>만원</font>
                                                <?  }?>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;관리비 <font class="smfont66"><?=$etc7_exp16?></font>만원</p>
                                            </td>
        <td width="75" height="36"><img src="<?=$board_skin_path?>/img/m9.gif" width="75" height="20"></td>
		<td width="284" height="36">전체<font class="smfont66"><?=$etc13_exp04?></font>층 중 <font class="smfont66"><?=$etc13_exp05?></font>층</td>
                                        </tr>

     <tr><td colspan="4" height="1" bgcolor="eee4e3" width="738"></td></tr>
     <tr><td width="74" height="36"><img src="<?=$board_skin_path?>/img/m12.gif" width="75" height="20"></td>
         <td width="302" height="36">방 : <font class="smfont66"><?=$etc13_exp02?></font>개 &nbsp;욕실 : <font class="smfont66"><?=$etc13_exp03?></font>개</td>
		 <td width="75" height="36"><img src="<?=$board_skin_path?>/img/m11.gif" width="75" height="20"></td>
		 <td width="284" height="36">
                                                <?
 
     $in_date = substr($view[wr_3],0,4)."년 ".sprintf("%2d",substr($view[wr_3],4,2))."월 ".sprintf("%2d",substr($view[wr_3],6,2))."일";
 
  ?>
                                                <?=$in_date?>	/<?=$etc13_exp00?></td>
                                        </tr>
                                    </table>
                                    <table width="708" cellpadding="0" cellspacing="0" align="center">
                                        <tr>
                                        </tr>
                                    </table>
                                </td>
                                <td width="10" height="165">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="813" border="0" cellspacing="0" cellpadding="0" height="608">
                <tr>
                    <td><img src="<?=$board_skin_path?>/img/optioninfo_top.gif" width="813" height="66" /></td>
                </tr>
                <tr>
                    <td height="533">
                        <table width="813" border="0" cellspacing="0" cellpadding="0" height="520">
                            <tr>
                                <td width="7" height="520">&nbsp;</td>
                                <td width="796" valign="top" bgcolor=#ffffff height="520">
                                    <!--//-->


                                    <table width="740" border="0" cellspacing="0" cellpadding="0" align="center">
                                        <tr>
                                            <td width="80"><img src="<?=$board_skin_path?>/img/option_01.gif" width="75" height="20"></td>
                                            <td width="667">
                                                <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="16%"><? if ($etc9_exp00 == "냉장고") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 냉장고<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>냉장고</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp01 == "에어컨") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 에어컨<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>에어컨</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp02 == "TV") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> TV<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>TV</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp03 == "전자렌지") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 전자렌지<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>전자렌지</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp04 == "세탁기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 세탁기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>세탁기</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp05 == "정수기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 정수기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>정수기</span><? } ?></td>
                                                    </tr></table></td></tr>

                                        <tr><td colspan="2" height="1" bgcolor="eee4e3"></td></tr>
                                        <tr><td><img src="<?=$board_skin_path?>/img/option_02.gif" width="75" height="20"></td>
                                            <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr><td width="16%"><? if ($etc9_exp06 == "붙박이장") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 붙박이장<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>붙박이장</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp07 == "옷장") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 옷장<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>옷장</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp08 == "책상") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 책상<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'> 책상</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp09 == "의자") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 의자<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>의자</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp10 == "침대") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 침대<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>침대</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp11 == "신발장") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 신발장<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'> 신발장<? } ?></td>
                                                    </tr></table></td></tr>

                                        <tr>
                                            <td colspan="2" height="1" bgcolor="eee4e3"></td>
                                        </tr>
                                        <tr><td><img src="<?=$board_skin_path?>/img/option_03.gif" width="103" height="20"></td>
                                            <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr><td width="16%"><? if ($etc9_exp12 == "씽크대") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 씽크대<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>씽크대</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp13 == "가스렌지") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 가스렌지<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>가스렌지</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp14 == "주방후드") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 주방후드<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>주방후드<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp15 == "세면대") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 세면대<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>세면대<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp16 == "욕실환구") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 욕실환구<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"><span class='check_off'> 욕실환구<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp17 == "욕실수납") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 욕실수납<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"><span class='check_off'> 욕실수납<? } ?></td>
                                                    </tr>
                                                </table></td></tr>
												
                                        <tr><td colspan="2" height="1" bgcolor="eee4e3"></td></tr>
                                        <tr><td><img src="<?=$board_skin_path?>/img/option_04.gif" width="75" height="20"></td>
                                            <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr><td width="16%"><? if ($etc9_exp18 == "CCTV") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> CCTV<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>CCTV</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp19 == "방범창") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 방범창<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>방범창<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp20 == "번호키") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 번호키<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>번호키</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp21 == "카드키") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 카드키<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>카드키</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp22 == "주차시설") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 주차시설<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'> 주차시설<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp23 == "경비원") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 경비원<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>경비원</span><? } ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr><td colspan="2" height="1" bgcolor="eee4e3"></td></tr>
                                        <tr><td><img src="<?=$board_skin_path?>/img/option_05.gif"></td>
                                            <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr><td width="16%"><? if ($etc9_exp24 == "도시가스") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 도시가스<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>도시가스</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp25 == "베란다") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 베란다<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>베란다</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp26 == "인터넷") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 인터넷<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>인터넷<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp27 == "승강기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 승강기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>승강기</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp28 == "화재경보기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 화재경보기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>화재경보기</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp29 == "심야전기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 심야전기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>심야전기</span><? } ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr><td colspan="2" height="1" bgcolor="eee4e3"></td>
                                        </tr>
                                        <tr><td><img src="<?=$board_skin_path?>/img/option_06.gif"></td>
                                            <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr><td width="16%"><? if ($etc9_exp30 == "할인마트") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 할인마트<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>할인마트</span><? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp31 == "편의점") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 편의점<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'> 편의점<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp32 == "식당") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 식당<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle">  <span class='check_off'>식당<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp33 == "미용실") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 미용실<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'> 미용실<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp34 == "세탁소") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 세탁소<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle">  <span class='check_off'>세탁소<? } ?></td>
                                                        <td width="16%"><? if ($etc9_exp35 == "정류장") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 정류장<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle">  <span class='check_off'>정류장<? } ?></td></tr> </table>
                                            </td>
                                        </tr>
                                        <tr><td colspan="2" height="1" bgcolor="eee4e3"></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
				</tr>							
        </td>
	</tr>
	<tr width="708"><p><!-- 내용 출력 -->
<?=$view[wr_content]?></p> </tr>
            </table>
</table>

<!--여기가 진짜 내용 끝-->

<?  if ($mw_basic[cf_sns] or (($board[bo_use_good] or $board[bo_use_nogood]) and $mw_basic[cf_view_good] and $member[mb_level] >= $mw_basic[cf_view_good]) or $scrap_href) { ?>
<tr><td><? if (($board[bo_use_good] or $board[bo_use_nogood]) and $mw_basic[cf_view_good] and $member[mb_level] >= $mw_basic[cf_view_good]) { ?>
        <div class="view_good"><input type="button" value="추천(비) 회원목록" class="btn1"
            onclick="win_open('<?=$board_skin_path?>/mw.proc/mw.good.list.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>', 'good_list',
            'width=600,height=500,scrollbars=1');"/></div>
        <? } ?>

        <?
        if ($scrap_href) {
            $sql = " select count(*) as cnt from $g4[scrap_table] where bo_table = '$bo_table' and wr_id = '$wr_id' ";
            $row = sql_fetch($sql);
            $scrap_count = $row[cnt];
            ?>
            <div class="scrap_button"><input type="button" class="btn1" id="scrap_button" value="스크랩 +<?=$scrap_count?>" onclick="scrap_ajax()"></div>
            <script type="text/javascript">
            function scrap_ajax() {
                $.get("<?=$board_skin_path?>/mw.proc/mw.scrap.php", {
                    'bo_table' : '<?=$bo_table?>',
                    'wr_id' : '<?=$wr_id?>',
                    'token' : '<?=$token?>' // 토큰 새로만들어야 하는데 이것까지 토큰 쓰기에는 세션이 너무;
                }, function (str) {
                    tmp = str.split('|');
                    if (tmp[0] == 'false') {
                        alert(tmp[1]);
                        return;
                    }
                    $("#scrap_button").val("스크랩 +" + tmp[0]);
                    $("#scrap_button").effect("highlight", {}, 3000);
                });
            }
            </script>
        <? } ?>

        <? if ($mw_basic[cf_sns]) { ?>
        <div class="sns"> <?=$view_sns?> </div>
        <? } ?>
    </td>
</tr>
<? } ?>


<? if ($mw_basic[cf_related] && $view[wr_related]) { ?>
<? $rels = mw_related($view[wr_related]); ?>
<? if (count($rels)) {?>
<? if ($mw_basic[cf_related_table]) $bo_table2 = $mw_basic[cf_related_table]; else $bo_table2 = $bo_table; ?>
<tr><td class=mw_basic_view_related>
        <h3>관련글
            <a href="board.php?bo_table=<?=$bo_table2?>&sfl=wr_subject||wr_content,1&sop=or&stx=<?=urlencode(str_replace(",", " ", $view[wr_related]))?>">[더보기]</a>
        </h3>
    </td></tr>

<tr><td class="mw_basic_view_content mw_basic_view_related">
        <ul>
        <? for ($i=0; $i<count($rels); $i++) { ?>
        <li> <a href="<?=$rels[$i][href]?>">[<?=substr($rels[$i][wr_datetime], 0, 10)?>] <?=$rels[$i][subject]?> <?=$rels[$i][comment]?></a> </li>
        <? } ?>
        </ul>
    </td></tr>
<? } ?>
<? } ?>

<? if ($mw_basic[cf_latest]) { ?>
<? $latest = mw_view_latest(); ?>
<? if (count($latest)) {?>
<?
$bo_subject = $board[bo_subject];
if ($mw_basic[cf_latest_table]) {
    $tmp = sql_fetch("select bo_subject from $g4[board_table] where bo_table = '$mw_basic[cf_latest_table]'");
    $bo_subject = $tmp[bo_subject];
}
?>
<tr><td class=mw_basic_view_latest>
        <h3>
            <?=$view[name]?> 님의 <?=$bo_subject?> 최신글
            <a href="board.php?bo_table=<?=$bo_table?>&sfl=mb_id,1&stx=<?=$write[mb_id]?>">[더보기]</a>
        </h3>
    </td></tr>

<tr><td class="mw_basic_view_content mw_basic_view_latest">
        <ul>
        <? for ($i=0; $i<count($latest); $i++) { ?>
        <li> <a href="<?=$latest[$i][href]?>">[<?=substr($latest[$i][wr_datetime], 0, 10)?>] <?=$latest[$i][subject]?> <?=$latest[$i][comment]?></a> </li>
        <? } ?>
        </ul>
    </td></tr>
<? } ?>
<? } ?>

</table>
<? if ($is_admin) { ?>
<div style="padding:10px 0 0 0;" class="func_buttons">
    <?=$mw_admin_button?>
    <div class="block"></div>
</div>
<? } ?>
<br>
<?
if (!$view[wr_comment_hide] && ($mw_basic[cf_comment_level] <= $member[mb_level])) {
    include_once("./view_comment.php"); // 코멘트 입출력 
}
?>

<?=$link_buttons?>

<?  if ($mw_basic['cf_include_tail'] && file_exists($mw_basic['cf_include_tail']) && strstr($mw_basic[cf_include_tail_page], '/v/'))
    include_once($mw_basic[cf_include_tail]); ?>

</td></tr></table><br>

<? if ($mw_basic[cf_exif]) { ?>
<script type="text/javascript">
function show_exif(no, obj, event) {
    var url = "<?=$board_skin_path?>/mw.proc/mw.exif.show.php";

    if (g4_is_ie) {
	x = window.event.clientX; 
	y = window.event.clientY + document.body.scrollTop;
    } else {
	x = event.clientX;
	y = event.clientY + document.body.scrollTop;
    }

    $.post (url, { bo_table:'<?=$bo_table?>', wr_id:'<?=$wr_id?>', bf_no:no }, function (req) {
            var exif = document.getElementById("exif-info");
            exif.style.left = x;
            exif.style.top = y;
            exif.style.display = "block";
            exif.innerHTML = req;
            exif.onclick = function () { this.style.display = "none"; }
	}
    );
}
</script>
<style type="text/css">
#exif-info { display:none; position:absolute; width:350px; height:200px; }
#exif-info { cursor:pointer; color:#bfbfbf;  }
#exif-info { background:url(<?=$board_skin_path?>/img/exif.png) no-repeat; }
*html #exif-info { background:; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=$board_skin_path?>/img/exif.png',sizingMethod='crop'); }
#exif-info table { margin:55px 0 0 20px; }
#exif-info td { color:#ddd; height:18px;  }
</style>

<div id="exif-info" title='클릭하면 창이 닫힙니다.'></div>
<? } ?>

<? if ($download_log_href) { ?>
<script type="text/javascript">
function btn_download_log() {
    win_open("<?=$board_skin_path?>/mw.proc/mw.download.log.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>", "mw_download_log", "width=500, height=300, scrollbars=yes");
}
</script>
<? } ?>

<? if ($link_log_href) { ?>
<script type="text/javascript">
function btn_link_log() {
    win_open("<?=$board_skin_path?>/mw.proc/mw.link.log.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>", "mw_link_log", "width=500, height=300, scrollbars=yes");
}
</script>
<? } ?>

<? if ($history_href) { ?>
<script type="text/javascript">
function btn_history(wr_id) {
    win_open("<?=$board_skin_path?>/mw.proc/mw.history.list.php?bo_table=<?=$bo_table?>&wr_id=" + wr_id, "mw_history", "width=500, height=300, scrollbars=yes");
}
</script>
<? } ?>

<? if ($singo_href) { ?>
<script type="text/javascript">
function btn_singo(wr_id, parent_id) {
    //if (confirm("이 게시물을 정말 신고하시겠습니까?")) {
    //hiddenframe.location.href = "<?=$board_skin_path?>/mw.proc/mw.btn.singo.php?bo_table=<?=$bo_table?>&wr_id=" + wr_id + "&parent_id=" + parent_id;
    win_open("<?=$board_skin_path?>/mw.proc/mw.btn.singo.php?bo_table=<?=$bo_table?>&wr_id=" + wr_id + "&parent_id=" + parent_id, "win_singo", "width=500,height=300,scrollbars=yes");
    //}
}
function btn_singo_view(wr_id) {
    var id = "singo_block_" + wr_id;

    if (document.getElementById(id).style.display == 'block')
        document.getElementById(id).style.display = 'none';
    else
        document.getElementById(id).style.display = 'block';
}

function btn_singo_clear(wr_id) {
    if (confirm("정말 초기화 하시겠습니까?")) {
        $.get("<?=$board_skin_path?>/mw.proc/mw.btn.singo.clear.php?bo_table=<?=$bo_table?>&token=<?=$token?>&wr_id="+wr_id, function(msg) {
            alert(msg);
        });
    }
}
</script>
<? } ?>

<? if ($print_href) { ?>
<script type="text/javascript">
function btn_print() {
    win_open("<?=$board_skin_path?>/mw.proc/mw.print.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>", "print", "width=800,height=600,scrollbars=yes");
}
</script>
<? } ?>

<? if ($secret_href || $nosecret_href) { ?>
<script type="text/javascript">
function btn_secret() {
    if (confirm("이 게시물을 비밀글로 설정하시겠습니까?")) {
        hiddenframe.location.href = "<?=$board_skin_path?>/mw.proc/mw.btn.secret.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&token=<?=$token?>";
    }
}
function btn_nosecret() {
    if (confirm("이 게시물의 비밀글 설정을 해제하시겠습니까?")) {
        hiddenframe.location.href = "<?=$board_skin_path?>/mw.proc/mw.btn.secret.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&token=<?=$token?>&flag=no";
    }
}

</script>
<? } ?>


<? if ($is_singo_admin && $view[mb_id] != $member[mb_id]) { ?>
<script type="text/javascript">
function btn_intercept() {
    mb_id = "<? echo $view[mb_id]?$view[mb_id]:$view[wr_ip]; ?>";
    win_open("<?=$board_skin_path?>/mw.proc/mw.intercept.php?bo_table=<?=$bo_table?>&mb_id=" + mb_id, "intercept", "width=500,height=300,scrollbars=yes");
}
</script>
<? } ?>
<? if ($is_admin) { ?>
<script type="text/javascript">
function btn_now() {
    var renum = 0;
    if (confirm("이 게시물의 작성시간을 현재로 변경하시겠습니까?")) {
        if (confirm("날짜순으로 정렬 하시겠습니까?")) renum = 1;

        $.get("<?=$board_skin_path?>/mw.proc/mw.time.now.php", { 
            "bo_table":"<?=$bo_table?>", 
            "wr_id":"<?=$wr_id?>", 
            "token":"<?=$token?>", 
            "renum":renum 
            } , function (ret) {
                if (ret)
                    alert(ret);
                else
                    location.reload();
            });
    }
}

function btn_view_block() {
    <? if ($write[wr_view_block]) { ?>
    if (!confirm("이 게시물 보기차단을 해제 하시겠습니까?")) return;
    <? } else { ?>
    if (!confirm("이 게시물 보기를 차단하시겠습니까?")) return;
    <? } ?>
    $.post("<?=$board_skin_path?>/mw.proc/mw.view.block.php", {
        "bo_table":"<?=$bo_table?>",
        "wr_id":"<?=$wr_id?>",
        "token":"<?=$token?>"
    }, function (str) {
        if (str)
            alert(str);
    });
}
function btn_ip(ip) {
    win_open("<?=$board_skin_path?>/mw.proc/mw.whois.php?ip=" + ip, "whois", "width=700,height=600,scrollbars=yes");
}
function btn_ip_search(ip) {
    win_open("<?=$g4[admin_path]?>/member_list.php?sfl=mb_ip&stx=" + ip);
}
function btn_notice() {
    var is_off = 0;
    <? if ($view[is_notice]) { ?>
    if (!confirm("이 공지를 내리시겠습니까?")) return;
    is_off = 1; 
    <? } else { ?>
    if (!confirm("이 글을 공지로 등록하시겠습니까?")) return;
    <? } ?>
    $.get("<?=$board_skin_path?>/mw.proc/mw.notice.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&token=<?=$token?>&is_off="+is_off, function(data) {
        alert(data);
    });
}
function btn_popup() {
    var is_off = 0;
    <? if ($is_popup) { ?>
    if (!confirm("이 팝업공지를 내리시겠습니까?")) return;
    is_off = 1; 
    <? } else { ?>
    if (!confirm("이 글을 팝업공지로 등록하시겠습니까?")) return;
    <? } ?>
    $.get("<?=$board_skin_path?>/mw.proc/mw.popup.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&token=<?=$token?>", function(data) {
        alert(data);
    });
}
function btn_comment_hide() {
    var is_off = 0;
    <? if (!$view[wr_comment_hide]) { ?>
    if (!confirm("이 글의 댓글을 감추시겠습니까?")) return;
    is_off = 1; 
    <? } else { ?>
    if (!confirm("이 글의 댓글을 보이시겠습니까?")) return;
    <? } ?>
    $.get("<?=$board_skin_path?>/mw.proc/mw.comment.hide.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&token=<?=$token?>&is_off="+is_off, function(data) {
        alert(data);
        location.reload();
    });
}
</script>
<? } ?>

<?
if ($mw_basic[cf_contents_shop] == "1")  // 배추컨텐츠샵-다운로드 결제
{
    $is_per = true;
    $is_buy = false;
    $is_per_msg = '예외오류';

    if (!$is_member) {
	//alert("로그인 해주세요.");
        $is_per = false;
	$is_per_msg = "로그인 해주세요.";
    }

    //if (!mw_is_buy_contents($member[mb_id], $bo_table, $wr_id) && $is_admin != "super")
    $con = mw_is_buy_contents($member[mb_id], $bo_table, $wr_id);
    if (!$con and $is_per)
    {
	//alert("결제 후 다운로드 하실 수 있습니다.");
        $is_per = false;
	$is_per_msg = "결제 후 다운로드 하실 수 있습니다.";
    }
    else if (!$write[wr_contents_price]) ;
    else
    {
        if ($mw_basic[cf_contents_shop_download_count] and $is_per) {
            $sql1 = "select count(*) as cnt from $mw_cash[cash_list_table] where rel_table = '$bo_table' and rel_id = '$wr_id' and cl_cash < 0";
            $row1 = sql_fetch($sql1);
            $sql2 = "select count(*) as cnt from $mw[download_log_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and dl_datetime > '$con[cl_datetime]'";
            $row2 = sql_fetch($sql2);
            if ($row2[cnt] >= ($mw_basic[cf_contents_shop_download_count])) {
                //alert("다운로드 횟수 ($mw_basic[cf_contents_shop_download_count]회) 를 넘었습니다.\\n\\n재결제 후 다운로드 할 수 있습니다.");
                $is_per = false;
                $is_per_msg = "다운로드 횟수 ($mw_basic[cf_contents_shop_download_count]회) 를 넘었습니다.\\n\\n재결제 후 다운로드 할 수 있습니다.";
            }
        }

        if ($mw_basic[cf_contents_shop_download_day] and $is_per) {
            $gap = floor(($g4[server_time] - strtotime($con[cl_datetime])) / (60*60*24));
            if ($gap >= $mw_basic[cf_contents_shop_download_day]) {
                //alert("다운로드 기간 ($mw_basic[cf_contents_shop_download_day]일) 이 지났습니다.\\n\\n재결제 후 다운로드 할 수 있습니다.");
                $is_per = false;
                $is_per_msg = "다운로드 기간 ($mw_basic[cf_contents_shop_download_day]일) 이 지났습니다.\\n\\n재결제 후 다운로드 할 수 있습니다.";
            }
        }
    }
}

?>

<? if ($mw_basic[cf_contents_shop]) { // 배추컨텐츠샵 ?>
<script type="text/javascript" src="<?=$mw_cash[path]?>/cybercash.js"></script>
<script type="text/javascript">
var mw_cash_path = "<?=$mw_cash[path]?>";
</script>
<!--<span><img src="<?=$board_skin_path?>/img/icon_cash2.gif" style="cursor:pointer;" onclick="buy_contents('<?=$bo_table?>', '<?=$wr_id?>')" align="absmiddle"></span>-->
<? } ?>


<script type="text/javascript">
function file_download(link, file, no) {
    <?
    if ($member[mb_level] < $board[bo_download_level]) {
        $alert_msg = "다운로드 권한이 없습니다.";
        if ($member[mb_id]) { 
            echo "alert('$alert_msg'); return;\n";
        } else {
            echo "alert('$alert_msg\\n\\n회원이시라면 로그인 후 이용해 보십시오.');\n";
            echo "location.href = './login.php?wr_id=$wr_id$qstr&url=".urlencode("$g4[bbs_path]/board.php?bo_table=$bo_table&wr_id=$wr_id")."';\n";
            echo "return;";
        }
    }
    ?>

    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+decodeURIComponent(file)+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>

    <? if ($mw_basic[cf_contents_shop] == "1" and !$is_per) { // 배추컨텐츠샵 다운로드 결제 ?>
    alert("<?=$is_per_msg?>");
    buy_contents('<?=$bo_table?>', '<?=$wr_id?>', no);
    return;
    <? } ?>

    if (<?=$mw_basic[cf_download_popup]?>)
        win_open("<?=$board_skin_path?>/mw.proc/download.popup.skin.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&no="+no, "download_popup", "width=<?=$mw_basic[cf_download_popup_w]?>,height=<?=$mw_basic[cf_download_popup_h]?>,scrollbars=yes");
    else
        document.location.href=link;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript" src="<?="$board_skin_path/mw.js/mw_image_window.js"?>"></script>

<script type="text/javascript">
// 서명 링크를 새창으로
if (document.getElementById('signature')) {
    var target = '_blank';
    var link = document.getElementById('signature').getElementsByTagName("a");
    for(i=0;i<link.length;i++) {
        link[i].target = target;
    }
}
</script>

<? if ($mw_basic[cf_write_notice]) { ?>
<script type="text/javascript">
// 글쓰기버튼 공지
function btn_write_notice(url) {
    var msg = "<?=$mw_basic[cf_write_notice]?>";
    if (confirm(msg))
	location.href = url;
}
</script>
<? } ?>

<? if ($mw_basic[cf_link_blank]) { // 본문 링크를 새창으로 ?>
<script type="text/javascript">
if (document.getElementById('view_content')) {
    var target = '_blank';
    var link = document.getElementById('view_content').getElementsByTagName("a");
    for(i=0;i<link.length;i++) {
        link[i].target = target;
    }
}
</script>
<? } ?>

<? if ($mw_basic[cf_source_copy]) { // 출처 자동 복사 ?>
<script type="text/javascript">
function mw_copy()
{
    if (window.event)
    {
        window.event.returnValue = true;
        window.setTimeout('mw_add_source()', 10);
    }
}
function mw_add_source()
{
    if (window.clipboardData) {
        txt = window.clipboardData.getData('Text');
        txt = txt + "\r\n[출처 : <?=$g4[url]?>]\r\n";
        window.clipboardData.setData('Text', txt);
    }
}
//document.getElementById("view_content").oncopy = mw_copy;

</script>
<? } ?>

<? if ($is_admin == "super") { ?>
<script type="text/javascript">
function mw_config() {
    win_open("<?=$board_skin_path?>/mw.adm/mw.config.php?bo_table=<?=$bo_table?>", "config", "width=980, height=700, scrollbars=yes");
}
function mw_member_email() {
    if (!confirm("이 글을 회원메일로 등록하시겠습니까?")) return false;
    $.get("<?=$board_skin_path?>/mw.proc/mw.member.email.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&token=<?=$token?>", function (data) {
        if (confirm(data)) location.href = "<?=$g4[admin_path]?>/mail_list.php";
    });
}
</script>
<? } ?>

<? if ($is_admin) { ?>
<script type="text/javascript">
function btn_copy_new() {
    if (!confirm("이 글을 새글로 등록하시겠습니까?")) return false;
    $.get("<?=$board_skin_path?>/mw.proc/mw.copy.new.php?token=<?=$token?>&bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>", function (data) {
        tmp = data.split("|");
        if (tmp[0] == 'true') {
            location.href = "<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&wr_id="+tmp[1];
        } else {
            alert(tmp[1]);
        }
    });
}
</script>
<? } ?>

<? if ($is_category) { ?>
<script type="text/javascript">
// 선택한 게시물 분류 변경
function mw_move_cate_one() {
    var sub_win = window.open("<?=$board_skin_path?>/mw.proc/mw.move.cate.php?bo_table=<?=$bo_table?>&chk_wr_id[0]=<?=$wr_id?>",
        "move", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>
<? } ?>

<script> $(document).ready (function() { resizeBoardImage(<?=$board[bo_image_width]?>); }); </script>

<style type="text/css">
/* 본문 img */
#mw_basic .mw_basic_view_content img {
    max-width:<?=$board[bo_image_width]?>px;
    height:auto; 
}

#mw_basic .mw_basic_comment_content img {
    max-width:<?=$board[bo_image_width]-200?>px;
    height:auto; 
}


<?=$mw_basic[cf_css]?>
</style>

<?
// 팝업공지
$sql = "select * from $mw[popup_notice_table] where bo_table = '$bo_table' order by wr_id desc";
$qry = sql_query($sql, false);
while ($row = sql_fetch_array($qry)) {
    $row2 = sql_fetch("select * from $write_table where wr_id = '$row[wr_id]'");
    if (!$row2) {
        sql_query("delete from $mw[popup_notice_table] where bo_table = '$bo_table' and wr_id = '$row[wr_id]'");
        continue;
    }
    $view = get_view($row2, $board, $board_skin_path, 255);
    mw_board_popup($view, $html);
}

// RSS 수집기
if ($mw_basic[cf_collect] == 'rss' && $rss_collect_path && file_exists("$rss_collect_path/_config.php")) {
    include_once("$rss_collect_path/_config.php");
    if ($mw_rss_collect_config[cf_license]) {
        ?>
        <script type="text/javascript">
        $(document).ready(function () {
            $.get("<?=$rss_collect_path?>/ajax.php?bo_table=<?=$bo_table?>");
        });
        </script>
        <?
    }
}

// Youtube 수집기
if ($mw_basic[cf_collect] == 'youtube' && $youtube_collect_path && file_exists("$youtube_collect_path/_config.php")) {
    include_once("$youtube_collect_path/_config.php");
    if ($mw_youtube_collect_config[cf_license]) {
        ?>
        <script type="text/javascript">
        $(document).ready(function () {
            $.get("<?=$youtube_collect_path?>/ajax.php?bo_table=<?=$bo_table?>");
        });
        </script>
        <?
    }
}