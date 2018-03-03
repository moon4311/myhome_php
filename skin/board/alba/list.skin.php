<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

//if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>


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
<style>
.board_top { clear:both; }

.board_list { clear:both; width:100%; table-layout:fixed; margin:5px 0 0 0; }
.board_list th { font-weight:bold; font-size:12px; } 
.board_list th { background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; } 
.board_list th { white-space:nowrap; height:34px; overflow:hidden; text-align:center; } 
.board_list th { border-top:1px solid #ddd; border-bottom:1px solid #ddd; } 

.board_list tr.bg0 { background-color:#fafafa; } 
.board_list tr.bg1 { background-color:#ffffff; } 

.board_list td { padding:.5em; }
.board_list td { border-bottom:1px solid #ddd; } 
.board_list td.num { color:#999999; text-align:center; }
.board_list td.checkbox { text-align:center; }
.board_list td.subject { overflow:hidden; }
.board_list td.name { padding:0 0 0 10px; }
.board_list td.datetime { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.hit { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.good { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.nogood { font:normal 11px tahoma; color:#BABABA; text-align:center; }

.board_list .notice { font-weight:normal; }
.board_list .current { font:bold 11px tahoma; color:#E15916; }
.board_list .comment { font-family:Tahoma; font-size:10px; color:#EE5A00; }

.board_button { clear:both; margin:10px 0 0 0; }

.board_page { clear:both; text-align:center; margin:3px 0 0 0; }
.board_page a:link { color:#777; }

.board_search { text-align:center; margin:10px 0 0 0; }
.board_search .stx { height:21px; border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8; }
</style>

<!-- 게시판 목록 시작 -->
<table width="658" align="center" cellpadding="0" cellspacing="0"><tr><td width="658">

    <!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
    <div class="board_top">
        <div style="float:left;">
            <form name="fcategory" method="get" style="margin:0px;">
            <? if ($is_category) { ?>
            <select name=sca onchange="location='<?=$category_location?>'+<?=strtolower($g4[charset])=='utf-8' ? "encodeURIComponent(this.value)" : "this.value"?>;">
            <option value=''>전체</option>
            <?=$category_option?>
            </select>
            <? } ?>
            </form>
        </div>
        <div style="float:right;">
            <img src="<?=$board_skin_path?>/img/icon_total.gif" align="absmiddle" border='0'>
            <span style="color:#888888; font-weight:bold;">Total <?=number_format($total_count)?></span>
            <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border='0' align="absmiddle"></a><?}?>
            <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif" border='0' title="관리자" align="absmiddle"></a><?}?>
        </div>
    </div>

    <!-- 제목 -->
            <form name="fboardlist" method="post">
    <input type='hidden' name='bo_table' value='<?=$bo_table?>'>
    <input type='hidden' name='sfl'  value='<?=$sfl?>'>
    <input type='hidden' name='stx'  value='<?=$stx?>'>
    <input type='hidden' name='spt'  value='<?=$spt?>'>
    <input type='hidden' name='page' value='<?=$page?>'>
    <input type='hidden' name='sw'   value=''>

                <table cellspacing="0" cellpadding="0" class="board_list" width="630" align="center">
                    <col width="40" />
                    <? if ($is_checkbox) { ?><col width="20" /><? } ?>
                    <col width="255"/>
                    <col width="125" />

                    <col width="125" />

                    <col width="45" />
                    <? if ($is_good) { ?><col width="20" /><? } ?>
                    <? if ($is_nogood) { ?><col width="20" /><? } ?>
                    <tr>
                        <th width="40">번호</th>
                        <? if ($is_checkbox) { ?>                        <th width="20">
                            <p><input onclick="if (this.checked) all_checked(true); else all_checked(false);" type="checkbox"></p>
                        </th>
                        <?}?>
                        <th align="center" width="255">제     목</th>
                        <th align="center" width="125">급여/시간</th>

                        <th align="center" width="125">연 락 처</th>

                        <th width="45"><?=subject_sort_link('wr_hit', $qstr2, 1)?>조회</a></th>
                        <? if ($is_good) { ?>
                        <th width="20"><?=subject_sort_link('wr_good', $qstr2, 1)?>추천</a></th>
                        <?}?>
                        <? if ($is_nogood) { ?>
                        <th width="20"><?=subject_sort_link('wr_nogood', $qstr2, 1)?>비추천</a></th>
                        <?}?>
                    </tr>
                    <? 
    for ($i=0; $i<count($list); $i++) { 
        $bg = $i%2 ? 0 : 1;
    ?>
                    <tr class="bg<?=$bg?>">
                        <td class="num" width="40">
                            <? 
            if ($list[$i][is_notice]) // 공지사항 
                echo "<b>공지</b>";
            else if ($wr_id == $list[$i][wr_id]) // 현재위치
                echo "<span class='current'>{$list[$i][num]}</span>";
            else
                echo $list[$i][num];
            ?>
                        </td>
                        <? if ($is_checkbox) { ?>                        <td class="checkbox" width="20">
                            <p><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></p>
                        </td>
                        <? } ?>
                        <td width="255" class="subject"><? 
            echo $nobr_begin;
            echo $list[$i][reply];
            echo $list[$i][icon_reply];
            if ($is_category && $list[$i][ca_name]) { 
                echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
            }

            if ($list[$i][is_notice])
                echo "<a href='{$list[$i][href]}'><span class='notice'>{$list[$i][subject]}</span></a>";
            else
                echo "<a href='{$list[$i][href]}'>{$list[$i][subject]}</a>";

            if ($list[$i][comment_cnt]) 
                echo " <a href=\"{$list[$i][comment_href]}\"><span class='comment'>{$list[$i][comment_cnt]}</span></a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            echo " " . $list[$i][icon_new];
            echo " " . $list[$i][icon_file];
            echo " " . $list[$i][icon_link];
            echo " " . $list[$i][icon_hot];
            echo " " . $list[$i][icon_secret];
            echo $nobr_end;
            ?>
                        </td>
                        <td class="subject" width="125">
                            <p align="center" style="line-height:100%; margin-top:2; margin-bottom:2;"><?=$list[$i]['wr_3']?></p>
                            <p align="center" style="line-height:100%; margin-top:2; margin-bottom:2;"><?=$list[$i]['wr_2']?></p>
                        </td>

                        <td width="125" class="name">
                            <p align="center" style="line-height:100%; margin-top:2; margin-bottom:2;"><?=$list[$i][name]?></p>
                            <p align="center" style="line-height:100%; margin-top:2; margin-bottom:2;"><?=$list[$i]['wr_4']?></p>
                        </td>

                        <td class="hit" width="45">
                            <p align="center"><?=$list[$i][wr_hit]?></p></td>

                        <? if ($is_good) { ?>                        
                        <td class="good" width="20">
                            <p align="center"><?=$list[$i][wr_good]?></p></td>
                        <? } ?>

                        <? if ($is_nogood) { ?>                        
                        <td class="nogood" width="20">
                            <p align="center"><?=$list[$i][wr_nogood]?></p></td>
                        <? } ?>
                    </tr>
                    <? } // end for ?>
                    <? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>게시물이 없습니다.</td></tr>"; } ?>
                </table>
            </form>
    <div class="board_button">
        <div style="float:left;">
        <? if ($list_href) { ?>
        <a href="<?=$list_href?>&quot;&gt;<img src="<?=$board_skin_path?>/img/btn_list.gif" align="absmiddle" border='0'></a>
        <? } ?>
        <? if ($is_checkbox) { ?>
        <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" align="absmiddle" border='0'></a>
        <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/btn_select_copy.gif" align="absmiddle" border='0'></a>
        <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/btn_select_move.gif" align="absmiddle" border='0'></a>
        <? } ?>
        </div>

        <div style="float:right;">
        <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border='0'></a><? } ?>
        </div>
    </div>

    <!-- 페이지 -->
    <div class="board_page">
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/page_search_prev.gif' border='0' align=absmiddle title='이전검색'></a>"; } ?>
        <?
        // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
        //echo $write_pages;
        $write_pages = str_replace("처음", "<img src='$board_skin_path/img/page_begin.gif' border='0' align='absmiddle' title='처음'>", $write_pages);
        $write_pages = str_replace("이전", "<img src='$board_skin_path/img/page_prev.gif' border='0' align='absmiddle' title='이전'>", $write_pages);
        $write_pages = str_replace("다음", "<img src='$board_skin_path/img/page_next.gif' border='0' align='absmiddle' title='다음'>", $write_pages);
        $write_pages = str_replace("맨끝", "<img src='$board_skin_path/img/page_end.gif' border='0' align='absmiddle' title='맨끝'>", $write_pages);
        //$write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "$1", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><span style=\"color:#4D6185; font-size:12px; text-decoration:underline;\">$1</span></b>", $write_pages);
        ?>
        <?=$write_pages?>
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/page_search_next.gif' border='0' align=absmiddle title='다음검색'></a>"; } ?>
    </div>

    <!-- 검색 -->
    <div class="board_search">
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?=$bo_table?>">
        <input type="hidden" name="sca"      value="<?=$sca?>">
        <select name="sfl">
            <option value="wr_subject">업 체 명</option>
            <option value="wr_name,1">글쓴이</option>
            <option value="wr_content">내용</option>
            <option value="wr_subject||wr_content">업체명+내용</option>
        </select>
        <input name="stx" class="stx" maxlength="15" itemname="검색어" required value='<?=stripslashes($stx)?>'>
        <input type="image" src="<?=$board_skin_path?>/img/btn_search.gif" border='0' align="absmiddle">
        <input type="radio" name="sop" value="and">and
        <input type="radio" name="sop" value="or">or
        </form>
    </div>

</td></tr></table>

<script type="text/javascript">
if ('<?=$sca?>') document.fcategory.sca.value = '<?=$sca?>';
if ('<?=$stx?>') {
    document.fsearch.sfl.value = '<?=$sfl?>';

    if ('<?=$sop?>' == 'and') 
        document.fsearch.sop[0].checked = true;

    if ('<?=$sop?>' == 'or')
        document.fsearch.sop[1].checked = true;
} else {
    document.fsearch.sop[0].checked = true;
}
</script>

<? if ($is_checkbox) { ?>
<script type="text/javascript">
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str) {
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete() {
    var f = document.fboardlist;

    str = "삭제";
    if (!check_confirm(str))
        return;

    if (!confirm("선택한 게시물을 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- 게시판 목록 끝 -->