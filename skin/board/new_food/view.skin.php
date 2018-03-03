<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<?
$p_four = explode("|",$write[wr_4]);
$four01 = $p_four[0];
$four02 = $p_four[1];
$four03 = $p_four[2];
$four04 = $p_four[3];
$four05 = $p_four[4];
$four06 = $p_four[5];
$four07 = $p_four[6];
$four08 = $p_four[7];
$four09 = $p_four[8];
$four10 = $p_four[9];
$four11 = $p_four[10];
$four12 = $p_four[11];
$four13 = $p_four[12];
$four14 = $p_four[13];
$four15 = $p_four[14];
$four16 = $p_four[15];
$four17 = $p_four[16];
$four18 = $p_four[17];
$four19 = $p_four[18];
$four20 = $p_four[19];
$four21 = $p_four[20];
$four22 = $p_four[21];
$four23 = $p_four[22];
$four24 = $p_four[23];
$four25 = $p_four[24];
$four26 = $p_four[25];
$four27 = $p_four[26];
$four28 = $p_four[27];
$four29 = $p_four[28];
$four30 = $p_four[29];
?>
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
<script> 
//Table Size 조정 
/*
function ImageResizing(objFrame) { 
if (!objFrame) return; 

//height 조정 
var conversionSize = 380; 
var orgWidth = objFrame.width; 
var orgHeight = objFrame.height; 

if (( orgWidth > conversionSize) || (orgHeight > conversionSize)){ 
if (orgWidth > orgHeight){ 
newWidth = conversionSize; 
newHeight = Math.round((conversionSize * orgHeight)/orgWidth); 
}else{ 
newWidth = Math.round((conversionSize * orgWidth)/orgHeight); 
newHeight = conversionSize; 
} 

objFrame.width = newWidth; 
objFrame.height = newHeight; 
} 
} 
*/
function ThumbViewer(ImageObj){ 

// if (ImageObj.src == "http://pics.auction.co.kr/buy/itempage/no_image_thumb.gif") return; 
/*
ThumbImage0.style.border = "silver 1px solid"; 
ThumbImage1.style.border = "silver 1px solid"; 
ThumbImage2.style.border = "silver 1px solid"; 
ThumbImage3.style.border = "silver 1px solid"; 
ThumbImage4.style.border = "silver 1px solid"; 
ThumbImage5.style.border = "silver 1px solid"; 
ThumbImage6.style.border = "silver 1px solid"; 
ThumbImage7.style.border = "silver 1px solid"; 
ThumbImage8.style.border = "silver 1px solid"; 
ThumbImage9.style.border = "silver 1px solid"; 

if (ThumbImage0 == ImageObj) ThumbImage0.style.border = "#333333 1px solid"; 
if (ThumbImage1 == ImageObj) ThumbImage1.style.border = "#333333 1px solid"; 
if (ThumbImage2 == ImageObj) ThumbImage2.style.border = "#333333 1px solid"; 
if (ThumbImage3 == ImageObj) ThumbImage3.style.border = "#333333 1px solid"; 
if (ThumbImage4 == ImageObj) ThumbImage4.style.border = "#333333 1px solid"; 
if (ThumbImage5 == ImageObj) ThumbImage5.style.border = "#333333 1px solid"; 
if (ThumbImage6 == ImageObj) ThumbImage6.style.border = "#333333 1px solid"; 
if (ThumbImage7 == ImageObj) ThumbImage7.style.border = "#333333 1px solid"; 
if (ThumbImage8 == ImageObj) ThumbImage8.style.border = "#333333 1px solid"; 
if (ThumbImage9 == ImageObj) ThumbImage9.style.border = "#333333 1px solid"; 
*/
if (ThumbImage0 == ImageObj){ 
img0.style.display = ""; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img0); 
} 
else if (ThumbImage1 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = ""; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img1); 
} 
else if (ThumbImage2 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = "none"; 
img2.style.display = ""; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img2); 
} 
else if (ThumbImage3 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = ""; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img3); 
} 
else if (ThumbImage4 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = ""; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img4); 
} 
else if (ThumbImage5 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = ""; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img5); 
}
else if (ThumbImage6 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = ""; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img6); 
}
else if (ThumbImage7 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = ""; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img7); 
} 
else if (ThumbImage8 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = ""; 
img9.style.display = "none"; 
//ImageResizing(img8); 
} 
else if (ThumbImage9 == ImageObj){ 
img0.style.display = "none"; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = ""; 
//ImageResizing(img9); 
}
else { 
img0.style.display = ""; 
img1.style.display = "none"; 
img2.style.display = "none"; 
img3.style.display = "none"; 
img4.style.display = "none"; 
img5.style.display = "none"; 
img6.style.display = "none"; 
img7.style.display = "none"; 
img8.style.display = "none"; 
img9.style.display = "none"; 
//ImageResizing(img0); 
} 
} 
</script> 
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


<div style="height:12px; line-height:1px; font-size:1px;">&nbsp;</div>

<!-- 게시글 보기 시작 -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>


<div style="clear:both; height:30px;">
    <div style="float:left; margin-top:6px;">
    <img src="<?=$board_skin_path?>/img/icon_date.gif" align=absmiddle border='0'>
    <span style="color:#888888;">작성일 : <?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></span>
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

<!--글제목-->
<div style="border:1px solid #ddd; clear:both; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
    <table border=0 cellpadding=0 cellspacing=0 width=100%>
    <tr>
        <td style="padding:8px 0 0 10px;">
            <div style="color:#505050; font-size:13px; font-weight:bold; word-break:break-all;">
            <? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
            <?=cut_hangul_last(get_text($view[wr_subject]))?>
            </div>
        </td>
        <td align="right" style="padding:6px 6px 0 0;" width=120>
            <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('$scrap_href');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>
            <? if ($trackback_url) { ?><a href="javascript:trackback_send_server('<?=$trackback_url?>');" style="letter-spacing:0;" title='주소 복사'><img src="<?=$board_skin_path?>/img/btn_trackback.gif" border='0' align="absmiddle"></a><?}?>
        </td>
    </tr>
    </table>
</div>
<div style="height:3px; background:url(<?=$board_skin_path?>/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>

<!--글쓴이/조회-->
<table border=0 cellpadding=0 cellspacing=0 width=<?=$width?>>
<tr>
    <td height=30 background="<?=$board_skin_path?>/img/view_dot.gif" style="color:#888;">
        <div style="float:left;">
        &nbsp;글쓴이 : 
        <?=$view[name]?><? if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>
        </div>
        <div style="float:right;">
        <img src="<?=$board_skin_path?>/img/icon_view.gif" border='0' align=absmiddle> 조회 : <?=number_format($view[wr_hit])?>
        <? if ($is_good) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align=absmiddle> 추천 : <?=number_format($view[wr_good])?><? } ?>
        <? if ($is_nogood) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align=absmiddle> 비추천 : <?=number_format($view[wr_nogood])?><? } ?>
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
        echo "<a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title='{$view[file][$i][content]}'>";
        echo "&nbsp;<span style=\"color:#888;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span>";
        echo "&nbsp;<span style=\"color:#d3d3d3; font-size:11px;\">DATE : {$view[file][$i][datetime]}</span>";
        echo "</a></td></tr>";
    }
}
?>


<tr><td>
<!--갤러리-->
	<table style="border:10px #f2f2f2 solid;" cellspacing="0" cellpadding="12" width="100%" align="center">
		<tr><td valign="top">

		<table width="100%" cellpadding="0" cellspacing="0" >
		<tr><td valign="top" width="100%" align="center">

		<table cellpadding="2" cellspacing="1" width="600" bgcolor="#F1F1F1">
		<tr><td width=380 align=center>
			
			<table width="100%" cellpadding="0" cellspacing="0">
				<tr><td width=100% align=center>
        
						<? 
							// 파일 출력 
							$sql = "select * from $g4[board_file_table] where `bo_table`='$bo_table' and `wr_id`='$wr_id'"; 
							$result=mysql_query($sql); 
							
							for($i=0 ; $row = mysql_fetch_array($result) ; $i++){ 
							if($i > 0){ 
							$style= "style=\"display:none\""; 
							} 
							echo "<img src =$g4[path]/data/file/$bo_table/$row[bf_file] width=380 height=300 border=0 id=img$i $style>"; 
							//echo nl2br($view[file][$i][content]); // 파일내용 보이게 ,엔터키
							$thumimg[$i]="<img src =$g4[path]/data/file/$bo_table/$row[bf_file] width=70 height=60 border=0 id=ThumbImage$i onfocus=\"javascript:ThumbViewer(this)\" onmouseover=\"javascript:ThumbViewer(this)\">"; 
							} 
						?> 
							</td></tr>

							<tr><td height="28" style="padding:0 10 0 10;"><div id="text1"></div></td></tr>

							<tr>
							<td>
								<table cellpadding=3 cellspacing=0 border=0>
									<tr>				
										<? 
										for ($i=0; $i<=9; $i++) {
											$content2[$i]=nl2br($view[file][$i][content]); // 파일내용 보이게 ,엔터키
											}
										?>
										<td width="20%"><a href="#" onmouseover="javascript:change('<?=$content2[0]?>')" onmouseout="javascript:change('')"><?=$thumimg[0]?></a></td>
										<td width="20%"><a href="#" onmouseover="javascript:change('<?=$content2[1]?>')" onmouseout="javascript:change('')"><?=$thumimg[1]?></a></td>
										<td width="20%"><a href="#" onmouseover="javascript:change('<?=$content2[2]?>')" onmouseout="javascript:change('')"><?=$thumimg[2]?></a></td>
										<td width="20%"><a href="#" onmouseover="javascript:change('<?=$content2[3]?>')" onmouseout="javascript:change('')"><?=$thumimg[3]?></a></td>
										<td width="20%"><a href="#" onmouseover="javascript:change('<?=$content2[4]?>')" onmouseout="javascript:change('')"><?=$thumimg[4]?></a></td>
									</tr>
									<tr>
										<td><a href="#" onmouseover="javascript:change('<?=$content2[5]?>')" onmouseout="javascript:change('')"><?=$thumimg[5]?></a></td>
										<td><a href="#" onmouseover="javascript:change('<?=$content2[6]?>')" onmouseout="javascript:change('')"><?=$thumimg[6]?></a></td>
										<td><a href="#" onmouseover="javascript:change('<?=$content2[7]?>')" onmouseout="javascript:change('')"><?=$thumimg[7]?></a></td>
										<td><a href="#" onmouseover="javascript:change('<?=$content2[8]?>')" onmouseout="javascript:change('')"><?=$thumimg[8]?></a></td>
										<td><a href="#" onmouseover="javascript:change('<?=$content2[9]?>')" onmouseout="javascript:change('')"><?=$thumimg[9]?></a></td>
									</tr>
								</table>			
							</td></tr></table>

			<!--갤러리 끝-->					
		</td>
		<td width=220 bgcolor="#F1F1F1" valign=top>

			<table width=100% cellpadding=5 cellspacing=1 style="border:1px solid #D3D3D3">
				<tr><td height=28 width=35% class="04">업종</td><td width=65% class="02"><? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?></td></tr>
				<tr><td height=28 class="04">전화번호</td><td class="02"><font color=#F80000><b><?=$four01?></b></font></td></tr>
				
				<tr><td height=28 class="04">주차시설</td><td class="02"><?=$four04?></td></tr>
				<tr><td height=28 class="04">영업시간</td><td class="02"><?=$four02?>&nbsp;부터<br><?=$four14?>&nbsp;까지</td></tr>
				<tr><td height=28 class="04">휴일</td><td class="02"><?=$four03?></td></tr>
				
				<tr><td height=28 class="04">홈페이지</td>
					<td class="02">					
						<?
						// 링크
						$cnt = 0;
						for ($i=1; $i<=$g4[link_count]; $i++) {
						if ($view[link][$i]) {
							$cnt++;
							$link = cut_str($view[link][$i], 70);
							echo "<a href='{$view[link_href][$i]}' target=_blank>";
							//echo "&nbsp;<span style=\"color:#888;\">{$link}</span>";
							echo "&nbsp;<span style=\"color:#888;\">방문하기</span>";
							echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
							echo "</a>";
						}
					}
					?>
					</td></tr>
				<tr><td height=28 class="04" colspan="2">배달가능지역</td></tr>
					<tr><td class="04" colspan="2">
						<table width=100% cellpadding=0 cellspacing=0>
						<tr><td><? if ($four05 == "일원동") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 일원동<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">일원동</font><? } ?></td>
							<td><? if ($four06 == "이원동") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 이원동<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">이원동</font><? } ?></td></tr>
						<tr><td><? if ($four07 == "삼원동") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 삼원동<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">삼원동</font><? } ?></td>
							<td><? if ($four08 == "사원동") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 사원동<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">사원동</font><? } ?></td></tr>
						<tr><td><? if ($four09 == "오원동") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 오원동<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">오원동</font><? } ?></td>
							<td><? if ($four10 == "육원동") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 육원동<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">육원동</font><? } ?></td></tr>
						<tr><td><? if ($four11 == "칠원동") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 칠원동<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">칠원동</font><? } ?></td>
							<td><? if ($four12 == "전지역") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 전지역<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">전지역</font><? } ?></td></tr>
						<tr><td colspan="2"><? if ($four13 == "배달불가") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> 배달은 하지 않습니다<? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"><font color="#d2d2d2">배달은 하지 않습니다</font><? } ?></td>
						</tr></table>

				</td></tr>
					
					<tr><td height=28 colspan="2" class="04">
					<?
					$address = substr($view[wr_3], 8); // 3번 여유 필드에 저장 되어 있는 주소의 우편번호를 삭제
					$adrress1 = str_replace("|","",$address); // | 태그 삭제
					{
					echo "$adrress1" ;
					}
					?>
			</td></tr></table>

				<br>
				<img src="<?=$board_skin_path?>/img/icon_hit.png" border='0' align=absmiddle><font color=#880000 size=3><?=number_format($view[wr_hit])?></font>&nbsp;&nbsp;분이 방문하셨습니다.
				<br>
				<table width="100%" cellpadding="3" >
							<tr>
							  <td width=40%><?
					$cmtpoint ='0';
					$totalcount = '0';
					$userrating = '0';

					$tbl = "{$g4[write_prefix]}{$bo_table}";
					$sql2 = " select wr_3 from $tbl  where wr_is_comment > 0 && wr_parent = '$wr_id' && wr_3 > '0' ";
					$result2 = sql_query($sql2);

					while($row2 = mysql_fetch_array($result2)  ) {
					$point=$row2[0];
					$cmtpoint=$cmtpoint + $point;
					$totalcount++;
					}

					if ($totalcount!=0) {
					$cmtpoint= $cmtpoint/$totalcount;
					$cmtpoint= number_format($cmtpoint,2);
					}
					?>
					<font color="gray">네티즌평가 |  </font></td><td width=60%><? if ($cmtpoint > "9"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif">
									  <? } else if ($cmtpoint > "8"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star2.gif">
									  <? } else if ($cmtpoint > "7"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									  <? } else if ($cmtpoint > "6"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star2.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									  <? } else if ($cmtpoint > "5"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									  <? } else if ($cmtpoint > "4"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star2.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									  <? } else if ($cmtpoint > "3"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									  <? } else if ($cmtpoint > "2"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star2.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									  <? } else if ($cmtpoint > "1"){?>
									  <img src="<?=$board_skin_path?>/img/star1.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									  <? } else if ($cmtpoint > "0"){?>
									  <img src="<?=$board_skin_path?>/img/star2.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									  <? } else {?>
									  <img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif"><img src="<?=$board_skin_path?>/img/star3.gif">
									<? }?>
									</td></tr>
									<td></td><td>(총 <?=$totalcount?> 명 참여) </td>
							</tr>
						  </table>
				
		</td></tr></table>
	  </td></tr></table>
	</td></tr></table>

</td></tr>


<tr><td height=10></td></tr>



<tr><td>

<!-- 박스 시작-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
  <td width="100%">
  <!--탭시작 -->
<script>tp=new obxTabPage('100%','100%','test'); // 이게 초기설정</script>



<script>tp.addStart("1page","소개글"); // 1페이지 시작</script>

<table style="border:10px #f2f2f2 solid;" cellspacing="0" cellpadding="12" width="100%" align="center">
<tr><td valign="top">

<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top" width="100%" align="center">

<table cellpadding="4" cellspacing="1" width="100%" bgcolor="#FFFFFF">
<!--내용출력-->
<tr> 
    <td height="150" style="word-break:break-all; padding:10px;">
       
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

</td></tr></table>
</td></tr></table>
</td></tr></table>

<script>tp.addEnd();// 1페이지 끝</script>


<script>tp.addStart("2page","메뉴판");// 2페이지 시작</script>
<!-- 메뉴판-->
<table style="border:10px #f2f2f2 solid;" cellspacing="0" cellpadding="12" width="100%" align="center">
<tr><td valign="top">

<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top" width="100%" align="center">

<table cellpadding="4" cellspacing="1" width="100%" bgcolor="#e7e7e7">
		<col bgcolor="#FFFFFF" align="right" width="25%"></col>
		<col bgcolor="#FFFFFF" align="left" width="25%"></col>
		<col bgcolor="#FFFFFF" align="right" width="25%"></col>
		<col bgcolor="#FFFFFF" align="left" width="25%"></col>
		<tr height="30">
			<td class="02" align=center><b>메  뉴</b></td>
			<td class="02" align=center><b>가  격</b></td>
			<td class="02" align=center><b>메  뉴</b></td>
			<td class="02" align=center><b>가  격</b></td>
		</tr>
		<?
			$wr_body_1 = explode("|",substr($view[wr_1], 1));
			$wr_body_2 = explode("|",substr($view[wr_2], 1));			
			for ($i = 0;  $i < count($wr_body_1); $i++) {
				$k=$i+1;
				echo
					"
					<tr onmouseover=\"this.style.backgroundColor='#FEF6F7';return true;\" onMouseOut=\"this.style.backgroundColor='';return true;\">
						<td height=28 style=padding-right:10>$wr_body_1[$i]</td>
						<td style=padding-left:10>$wr_body_2[$i]원</td>
						<td height=28 style=padding-right:10>$wr_body_1[$k]</td>
						<td style=padding-left:10>$wr_body_2[$k]원</td>
					</tr>
					";
				$i=$i+1;
			}
		?>

		</table>
	</td></tr></table>
</td></tr></table>

<!-- 메뉴끝-->


<script>tp.addEnd();// 2페이지 끝</script>


<script>tp.addStart("3page","오시는 길");// 3페이지 시작</script>
<table width=100% cellpadding=10 cellspacing=0><tr><td height=35><?=$view[wr_5]?></td></tr></table>
<table style="border:10px #f2f2f2 solid;" cellspacing="0" cellpadding="12" width="100%" align="center">
<tr><td valign="top">

<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top" width="100%" align="center">

<table cellpadding="4" cellspacing="1" width="100%">
<!-- 지도출력-->
<tr><td align=center height=150>

<? if ($view[wr_3]) { // 임시필드인 wr_3에 주소가 있다면 네이버 api 지도를 출력 ?>

        <div align='center' style="padding:10px 0 0 0;">
		<?
		// 지도 표시 
		include_once "$board_skin_path/map.php"; 
		?>
		</div>
		<? } ?>
<? if (!$view[wr_3]) {
			echo "지도 준비중입니다.";
		}
?>
</td></tr>
<!--지도 끝-->
</table>
</td></tr></table>
</td></tr></table>
<!--
<script>tp.addEnd();//3페이지 끝</script>


<script>tp.addStart("4page","갤러리");// 4페이지 시작</script>
-->	


<script>tp.addEnd();//4페이지 끝</script>

</td></tr></table>
<!-- 박스 끝-->

</td></tr>
<? if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // 서명 출력 ?>
</table>

<div style="height:10px;clear:both;">&nbsp;</div>

<?
// 코멘트 입출력
include_once("./view_comment.php");
?>

<div style="height:1px; line-height:1px; font-size:1px; background-color:#ddd; clear:both;">&nbsp;</div>

<div style="clear:both; height:43px;">
    <div style="float:left; margin-top:10px;">
    <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </div>

    <!-- 링크 버튼 -->
    <div style="float:right; margin-top:10px;">
    <?=$link_buttons?>
    </div>
</div>

<div style="height:2px; line-height:1px; font-size:1px; background-color:#dedede; clear:both;">&nbsp;</div>

</td></tr></table><br>

<script language="JavaScript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
    document.location.href=link;
}
</script>

<script language="JavaScript" src="<?="$g4[path]/js/board.js"?>"></script>
<script language="JavaScript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>

<!-- 게시글 보기 끝 -->