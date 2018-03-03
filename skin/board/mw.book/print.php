<?
include_once("_common.php");

if (!$board[bo_table])
    alert_close("존재하지 않는 게시판입니다.", $g4[path]);

if ($write[wr_is_comment]) 
    alert_close("코멘트는 인쇄 하실 수 없습니다.");

if (!$bo_table) 
    alert_close("bo_table 값이 넘어오지 않았습니다.");

// wr_id 값이 있으면 글읽기 
if ($wr_id) 
{
    // 글이 없을 경우 해당 게시판 목록으로 이동
    if (!$write[wr_id]) 
    {
        $msg = "글이 존재하지 않습니다.\\n\\n글이 삭제되었거나 이동된 경우입니다.";
        alert_close($msg);
    }

    // 그룹접근 사용
    if ($group[gr_use_access]) 
    {
        if (!$member[mb_id]) {
            $msg = "비회원은 이 게시판에 접근할 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.";
            alert_close($msg);
        }

        // 그룹관리자 이상이라면 통과 
        if ($is_admin == "super" || $is_admin == "group") 
            ; 
        else 
        {
            // 그룹접근
            $sql = " select count(*) as cnt 
                       from $g4[group_member_table] 
                      where gr_id = '$board[gr_id]' and mb_id = '$member[mb_id]' ";
            $row = sql_fetch($sql);
            if (!$row[cnt]) 
                alert_close("접근 권한이 없으므로 글읽기가 불가합니다.\\n\\n궁금하신 사항은 관리자에게 문의 바랍니다.", $g4[path]);
        }
    }

    // 로그인된 회원의 권한이 설정된 읽기 권한보다 작다면
    if ($member[mb_level] < $board[bo_read_level]) 
    {
        if ($member[mb_id]) 
            alert_close("글을 읽을 권한이 없습니다.");
        else 
            alert_close("글을 읽을 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.");
    }

    // 자신의 글이거나 관리자라면 통과
    if (($write[mb_id] && $write[mb_id] == $member[mb_id]) || $is_admin)
        ;
    else 
    {
        // 비밀글이라면
        if (strstr($write[wr_option], "secret")) 
        {
            // 회원이 비밀글을 올리고 관리자가 답변글을 올렸을 경우
            // 회원이 관리자가 올린 답변글을 바로 볼 수 없던 오류를 수정
            $is_owner = false;
            if ($write[wr_reply] && $member[mb_id])
            {
                $sql = " select mb_id from $write_table 
                          where wr_num = '$write[wr_num]' 
                            and wr_reply = ''
                            and wr_is_comment = '0' ";
                $row = sql_fetch($sql);
                if ($row[mb_id] == $member[mb_id]) 
                    $is_owner = true;
            }

            $ss_name = "ss_secret_{$bo_table}_$write[wr_num]";
            
            if (!$is_owner)
            {
                //$ss_name = "ss_secret_{$bo_table}_{$wr_id}";
                // 한번 읽은 게시물의 번호는 세션에 저장되어 있고 같은 게시물을 읽을 경우는 다시 패스워드를 묻지 않습니다.
                // 이 게시물이 저장된 게시물이 아니면서 관리자가 아니라면
                //if ("$bo_table|$write[wr_num]" != get_session("ss_secret")) 
                if (!get_session($ss_name)) 
                    goto_url("./password.php?w=s&bo_table=$bo_table&wr_id=$wr_id{$qstr}");
            }

            set_session($ss_name, TRUE);
        }
    }

    // 한번 읽은글은 브라우저를 닫기전까지는 카운트를 증가시키지 않음
    $ss_name = "ss_view_{$bo_table}_{$wr_id}";
    if (!get_session($ss_name)) 
    {
        sql_query(" update $write_table set wr_hit = wr_hit + 1 where wr_id = '$wr_id' ");

        // 자신의 글이면 통과
        if ($write[mb_id] && $write[mb_id] == $member[mb_id])
            ;
        else 
        {
            // 회원이상 글읽기가 가능하다면
            if ($board[bo_read_level] > 1) {
                if ($member[mb_point] + $board[bo_read_point] < 0)
                    alert_close("보유하신 포인트(".number_format($member[mb_point]).")가 없거나 모자라서 글읽기(".number_format($board[bo_read_point]).")가 불가합니다.\\n\\n포인트를 모으신 후 다시 글읽기 해 주십시오.");

                insert_point($member[mb_id], $board[bo_read_point], "$board[bo_subject] $wr_id 글읽기", $bo_table, $wr_id, '읽기');
            }
        }

        set_session($ss_name, TRUE);
    }

    $g4[title] = "$group[gr_subject] > $board[bo_subject] > " . strip_tags(conv_subject($write[wr_subject], 255));
} 


include_once("$g4[path]/head.sub.php");

$width = $board[bo_table_width];
if ($width <= 100) $width .= '%'; 

// IP보이기 사용 여부
$ip = "";
$is_ip_view = $board[bo_use_ip_view];
if ($is_admin) {
    $is_ip_view = true;
    $ip = $write[wr_ip];
} else // 관리자가 아니라면 IP 주소를 감춘후 보여줍니다.
    $ip = preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", "\\1.♡.\\3.\\4", $write[wr_ip]);

// 분류 사용
$is_category = false;
$category_name = "";
if ($board[bo_use_category]) {
    $is_category = true;
    $category_name = $write[ca_name]; // 분류명
}

$view = get_view($write, $board, $board_skin_path, 255);

if (strstr($sfl, "subject"))
    $view[subject] = search_font($stx, $view[subject]);

$html = 0;
if (strstr($view[wr_option], "html1"))
    $html = 1;
else if (strstr($view[wr_option], "html2"))
    $html = 2;

$view[content] = conv_content($view[wr_content], $html);
if (strstr($sfl, "content"))
    $view[content] = search_font($stx, $view[content]);
$view[content] = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 name='target_resize_image[]' onclick='image_window(this)' style='cursor:pointer;' \\2 \\3", $view[content]);

$is_signature = false;
$signature = "";
if ($board[bo_use_signature] && $view[mb_id])
{
    $is_signature = true;
    $mb = get_member($view[mb_id]);
    $signature = $mb[mb_signature];

    //$signature = bad_tag_convert($signature);
    // 081022 : CSRF 보안 결함으로 인한 코드 수정
    $signature = conv_content($signature, 1);
}

include_once("$board_skin_path/lib/skin.lib.php");

// 파일 출력
ob_start();
for ($i=0; $i<=$view[file][count]; $i++) {
    if ($view[file][$i][view]) {
        if ($board[bo_image_width] < $view[file][$i][image_width]) { // 이미지 크기 조절
            $img_width = $board[bo_image_width];
        } else {
            $img_width = $view[file][$i][image_width];
        }
        $view[file][$i][view] = str_replace("<img", "<img width=\"{$img_width}\"", $view[file][$i][view]);	
	}
        echo $view[file][$i][view] . "<br/><br/>";
}
$file_viewer = ob_get_contents();
ob_end_clean();
$view[rich_content] = preg_replace("/{이미지\:([0-9]+)[:]?([^}]*)}/ie", "view_image(\$view, '\\1', '\\2')", $view[content]);
$this_url = "$g4[url]/$g4[bbs]/board.php?bo_table=$bo_table&wr_id=$wr_id";

$etc7_exp=explode("|" , $view[wr_7]);
$etc7_exp00 = $etc7_exp[0];
$etc7_exp01 = $etc7_exp[1];
$etc7_exp02 = $etc7_exp[2];
$etc7_exp03 = $etc7_exp[3];
$etc7_exp04 = $etc7_exp[4];
$etc7_exp05 = $etc7_exp[5];
$etc7_exp06 = $etc7_exp[6];
$etc7_exp07 = $etc7_exp[7];
$etc7_exp08 = $etc7_exp[8];
$etc7_exp09 = $etc7_exp[9];
$etc7_exp10 = $etc7_exp[10];
$etc7_exp11 = $etc7_exp[11];
$etc7_exp12 = $etc7_exp[12];
$etc7_exp13 = $etc7_exp[13];
$etc7_exp14 = $etc7_exp[14];
$etc7_exp15 = $etc7_exp[15];
$etc7_exp16 = $etc7_exp[16];




$etc9_exp = explode("|",$view[wr_9]);
$etc9_exp00 = $etc9_exp[0];
$etc9_exp01 = $etc9_exp[1];
$etc9_exp02 = $etc9_exp[2];
$etc9_exp03 = $etc9_exp[3];
$etc9_exp04 = $etc9_exp[4];
$etc9_exp05 = $etc9_exp[5];
$etc9_exp06 = $etc9_exp[6];
$etc9_exp07 = $etc9_exp[7];
$etc9_exp08 = $etc9_exp[8];
$etc9_exp09 = $etc9_exp[9];
$etc9_exp10 = $etc9_exp[10];
$etc9_exp11 = $etc9_exp[11];
$etc9_exp12 = $etc9_exp[12];
$etc9_exp13 = $etc9_exp[13];
$etc9_exp14 = $etc9_exp[14];
$etc9_exp15 = $etc9_exp[15];
$etc9_exp16 = $etc9_exp[16];
$etc9_exp17 = $etc9_exp[17];
$etc9_exp18 = $etc9_exp[18];
$etc9_exp19 = $etc9_exp[19];
$etc9_exp20 = $etc9_exp[20];
$etc9_exp21 = $etc9_exp[21];
$etc9_exp22 = $etc9_exp[22];
$etc9_exp23 = $etc9_exp[23];
$etc9_exp24 = $etc9_exp[24];
$etc9_exp25 = $etc9_exp[25];
$etc9_exp26 = $etc9_exp[26];
$etc9_exp27 = $etc9_exp[27];
$etc9_exp28 = $etc9_exp[28];
$etc9_exp29 = $etc9_exp[29];
$etc9_exp30 = $etc9_exp[30];
$etc9_exp31 = $etc9_exp[31];
$etc9_exp32 = $etc9_exp[32];
$etc9_exp33 = $etc9_exp[33];
$etc9_exp34 = $etc9_exp[34];
$etc9_exp35 = $etc9_exp[35];
$etc9_exp36 = $etc9_exp[36];
$etc9_exp37 = $etc9_exp[37];


$etc13_exp=explode("|" , $view[wr_13]);
$etc13_exp00 = $etc13_exp[0];
$etc13_exp01 = $etc13_exp[1];
$etc13_exp02 = $etc13_exp[2];
$etc13_exp03 = $etc13_exp[3];
$etc13_exp04 = $etc13_exp[4];
$etc13_exp05 = $etc13_exp[5];
$etc13_exp06 = $etc13_exp[6];
$etc13_exp07 = $etc13_exp[7];
$etc13_exp08 = $etc13_exp[8];
$etc13_exp09 = $etc13_exp[9];
$etc13_exp10 = $etc13_exp[10];


$etc22_exp = explode("|",$view[wr_22]);
$etc22_exp00 = $etc22_exp[0];
$etc22_exp01 = $etc22_exp[1];
$etc22_exp02 = $etc22_exp[2];
$etc22_exp03 = $etc22_exp[3];
$etc22_exp04 = $etc22_exp[4];
$etc22_exp05 = $etc22_exp[5];
$etc22_exp06 = $etc22_exp[6];
$etc22_exp07 = $etc22_exp[7];
$etc22_exp08 = $etc22_exp[8];
$etc22_exp09 = $etc22_exp[9];
$etc22_exp10 = $etc22_exp[10];
$etc22_exp11 = $etc22_exp[11];
$etc22_exp12 = $etc22_exp[12];
$etc22_exp13 = $etc22_exp[13];
$etc22_exp14 = $etc22_exp[14];
$etc22_exp15 = $etc22_exp[15];
$etc22_exp16 = $etc22_exp[16];
$etc22_exp17 = $etc22_exp[17];
$etc22_exp18 = $etc22_exp[18];
$etc22_exp19 = $etc22_exp[19];
$etc22_exp20 = $etc22_exp[20];
$etc22_exp21 = $etc22_exp[21];
$etc22_exp22 = $etc22_exp[22];
$etc22_exp23 = $etc22_exp[23];
$etc22_exp24 = $etc22_exp[24];
$etc22_exp25 = $etc22_exp[25];
$etc22_exp26 = $etc22_exp[26];
$etc22_exp27 = $etc22_exp[27];
$etc22_exp28 = $etc22_exp[28];
$etc22_exp29 = $etc22_exp[29];
$etc22_exp30 = $etc22_exp[30];

?>


<style type="text/css">
body { padding:10px; margin:0; }
div#js_print { border:1px solid #d9d9d9; padding:20px; }
div#js_print div { margin:0 0 5px 0; }
div#js_print .js_subject { font-size:15px; height:30px; font-weight:bold; margin:0 0 10px 0; border-bottom:1px solid #d9d9d9; }
div#js_print .js_name { font-size:12px; height:20px; }
div#js_print .js_date { font-size:12px; height:20px; }
div#js_print .js_content { font-size:12px; border-top:1px solid #ddd; padding:20px 10px; line-height:20px; }
div#js_print .js_label { float:left; width:50px; font-weight:bold; }

.check_off {
	FONT-WEIGHT: normal; FONT-SIZE: 9pt; COLOR: #c8c7c8; FONT-FAMILY: "돋움"; TEXT-DECORATION: none;
	letter-spacing:0px
}

.smfont1 {font-size:11px; color:#555555; font-family:dotum,돋움;}
.smfont2 {font-size:12pt; font-weight:bold; line-height:14px; color:#009520; font-family:dotum,돋움;}
.smfont4 { font-size:14pt; color:5c5c5c; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont66 { font-size:14pt; color:#fd4a70; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont44 { font-size:11pt; color:#fd4a70; font-weight:bold; font-family:맑은 고딕, 돋움;}
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


<div id="js_print">
<table width="813" border="0" align="center" cellpadding="0" cellspacing="0" background="<?=$board_skin_path?>/img/view_topbg.gif">
                  <tr>
                    <td height="73"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="4%">&nbsp;</td>
                  <td width="96%"><img src="<?=$board_skin_path?>/img/tom5.gif" width="100" height="5" /> <font class="smfont66">[<?=$view[wr_5]?>]</font><font class="smfont4"><?=$view[wr_4]?></font></td>
                  </tr>
              </table></td>
                  </tr>
                </table>




<table width="813" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><img src="<?=$g4[path]?>/image/serch_top.gif" width="813" height="11" /></td>
  </tr>
  <tr>
    <td><table width="813" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="7"><img src="<?=$g4[path]?>/image/landmn_left.gif" width="7" height="453" /></td>
        <td width="796" valign="top" bgcolor=#ffffff> 
		
		
		
		
		<table width="570" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td><? if ($view[file][0][view])  {?><table width="570" >
                        <tr valign="top" align="center">
                  <td width="560" >
						  
						  
						  
						          <table width="550" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td valign="top">	<? 
        for ($i=0; $i<=9; $i++) {
             $image[$i] = "$g4[path]/data/file/$bo_table/".$view[file][$i][file];

			 $thumimg[$i]="<img src =$image[$i] width=140 height=120 border=0 onclick=\"view('$image[$i]')\" style=cursor:hand>";
		}
        ?>
</td>
  </tr>
  <tr>
    <td valign="top">


<!--//-->
	<table width="570" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="570" height="440" background="<?=$board_skin_path?>/img/photo_bg.gif" align="center" valign="middle">
	
	<table cellpadding="0" cellspacing="0">
                                <tr>
                                  <td bgcolor="ffffff">				  

									  
									  <? if ($view[file][0][file])  {?>

<img src=<?=$image[0]?> name=gallery_img width=530 height=400 border=0 style=vertical-align: middle;cursor:pointer; onClick="OpenWin('<?=$board_skin_path?>/slideshow.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>',900,570); return false;" border=0 value=0>
                                      <? } else {?>
                                      <img src="<?=$board_skin_path?>/img/noimge.gif" border=0>
                                      <? } ?></a>
									  
									  </td>
                                </tr>
                              </table>
							  
</td>
  </tr>
</table>
<!--//-->							  

							  </td>
  </tr>
  <tr>
    <td valign="top">                  

	<!--//-->
	<table align="center">
                                <tr>
                                  <td><?=$view[file][0][content]?></td>
                                </tr>
                              </table>
							  
							  <!--//-->
							  
							  </td>
  </tr>
  <tr>
    <td valign="top" align="center">
	
	<!--//-->

							 </td>
                                </tr>
                            </table> 
 </td>
                                </tr>
                            </table>  </td>
                                </tr>
                            </table> 
<? } else {?>
							
		<table width="570" height="440">
                          <tr>
                            <td width="570" height="440" background="<?=$board_skin_path?>/img/photo_bg.gif" align="center" valign="middle">
            (사이즈 530 * 400)</td>
                          </tr>
                        </table>					
							
							<? }?>            </td>
        <td width="10"><img src="<?=$g4[path]?>/image/landmn_right.gif" width="10" height="453" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="<?=$g4[path]?>/image/landmn_down.gif" width="813" height="9" /></td>
  </tr>
</table>




<table width="813" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="<?=$g4[path]?>/image/serch_top.gif" width="813" height="11" /></td>
      </tr>
      <tr>
        <td valign="top" align="center">
		

<table width="813" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="7"><img src="<?=$g4[path]?>/image/serch_left.gif" width="7" height="61" /></td>
            <td ><table border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                  <td align="center" width="100%"><? if ($view[file][0][file]) {?>
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
                                      <? }?>   
									  </td>
                                </tr>
                            </table> </td>
            <td width="10"><img src="<?=$g4[path]?>/image/serch_right.gif" width="10" height="61" /></td>
          </tr>
        </table>

						
		
		</td>
      </tr>
      <tr>
        <td><img src="<?=$g4[path]?>/image/serch_down.gif" width="813" height="10" /></td>
      </tr>
    </table>



<table width="813" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?=$board_skin_path?>/img/salesinfo_top.gif" width="813" height="66" /></td>
  </tr>
  <tr>
    <td><table width="813" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="7"><img src="<?=$g4[path]?>/image/viewmm_left.gif" width="7" height="283" /></td>
        <td width="796" valign="top" bgcolor=#ffffff>
<br>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
          <td ><div align="center">
            <table width="740" border="0" align="center" cellpadding="0" cellspacing="1">
                        <tr>
                <td width="81"><img src="<?=$board_skin_path?>/img/m42.gif"></td>
                <td colspan="3" class="bold"><font class="smfont44"><?=$view[wr_4]?></font></td>
                </tr>  
                <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr>
                        <tr>
                <td width="76"><img src="<?=$board_skin_path?>/img/m2.gif"></td>
                <td class="info_view2"><p><font class="smfont44"><?=$view[ca_name]?></font></p> </td>
                <td width="77" class="info_view2"><img src="<?=$board_skin_path?>/img/m41.gif"></td>
                <td width="269" class="bold"><font class="smfont55"><?=$view[wr_5]?></font></td>
                  </tr>   <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr>
              <tr>
                <td><span class="info_view2"><img src="<?=$board_skin_path?>/img/m3.gif"></span></td>
                <td><?=$view[wr_1]?> <?=$view[wr_2]?></td>
                <td class="bold"></td>
                <td class="bold"></td>
              </tr>   <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr>             
              <tr>
                <td><img src="<?=$board_skin_path?>/img/m5.gif"></td>
                <td><?if($etc7_exp02 == "월세(임대)") {?>
<img src='<?=$board_skin_path?>/img/icon_monthly.gif' border=0 align=absmiddle alt='보증금/월세'> <font class="smfont44"><?=$etc7_exp06 ?>/<?=$etc7_exp07 ?></font>
                 <? } else {
    }
?>
                  <?if($etc7_exp01 == "전세") { ?>
<img src='$board_skin_path/img/icon_deposit.gif' border=0 align=absmiddle alt='전세가'><font class="smfont55"><?=$etc7_exp05 ?>만원</font>
                <?  } else {
    }
?>
 
<?if($etc7_exp00 == "매매") { ?>

<img src='$board_skin_path/img/icon_sale.gif' border=0 align=absmiddle alt='융자금/매매가'><font class="smfont55">융자금:<?=$etc7_exp03?>만원/매매가<?=$etc7_exp04?>만원</font>
<?  } else {
    }
?>
</td>
                <td><img src="<?=$board_skin_path?>/img/m6.gif"></td>
                <td><font class="smfont55"><?=$etc7_exp16?>만원</font></td>
              </tr>   <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr>  
              
                  
              <tr>
                <td><img src='<?=$board_skin_path?>/img/m7.gif'></td>
                <td><?=$view[wr_18]?>평</td>
                <td><img src='<?=$board_skin_path?>/img/m8.gif'></td>
                <td><?=$view[wr_19]?>㎡</td>
              </tr>   <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr> 

              <tr>
                <td><img src="<?=$board_skin_path?>/img/m9.gif"></td>
                <td>전체 <font class="smfont55"><?=$etc13_exp04?></font>층 중 <font class="smfont55"><?=$etc13_exp05?></font>층</td>
                <td><img src="<?=$board_skin_path?>/img/m10.gif"></td>
                <td>
				<?
 
     $start_date = substr($etc7_exp15,0,4)."년 ".sprintf("%2d",substr($etc7_exp15,4,2))."월 ".sprintf("%2d",substr($etc7_exp15,6,2))."일";
 
  ?>
				
				<?=$start_date?></td>
              </tr>   <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr>  
              <tr>
                <td><img src="<?=$board_skin_path?>/img/m11.gif"></td>
                <td><?
 
     $in_date = substr($view[wr_12],0,4)."년 ".sprintf("%2d",substr($view[wr_12],4,2))."월 ".sprintf("%2d",substr($view[wr_12],6,2))."일";
 
  ?>
				<?=$in_date?>
				/<?=$etc13_exp00?>/<?=$etc13_exp01?></td>
                <td><img src="<?=$board_skin_path?>/img/m12.gif"></td>
                <td>방:<font class="smfont44"><?=$etc13_exp02?></font>개 욕실:<font class="smfont44"><?=$etc13_exp03?></font>개</td>
              </tr>   <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr>         
              <tr>
                <td><img src="<?=$board_skin_path?>/img/m13.gif"></td>
                <td>가능</td>
                <td></td>
                <td></td>
              </tr>   <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr> 
                   
            </table>
          </div></td>
        </tr>
       
      </table>


</td>
        <td width="10"><img src="<?=$g4[path]?>/image/viewmm_right.gif" width="10" height="283" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="<?=$g4[path]?>/image/landmn_down.gif" width="813" height="9" /></td>
  </tr>
</table>




<table width="813" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?=$board_skin_path?>/img/optioninfo_top.gif" width="813" height="66" /></td>
  </tr>
  <tr>
    <td><table width="813" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="7"><img src="<?=$g4[path]?>/image/optionm_left.gif" width="7" height="232" /></td>
        <td width="796" valign="top" bgcolor=#ffffff>
<br>

<!--//-->


<table width="740" border="0" cellspacing="0" cellpadding="0" align="center">
                       <tr>
                         <td width="80"><img src="<?=$board_skin_path?>/img/option_01.gif"></td>
                         <td width="667"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
<td width="16%"><? if ($etc9_exp00 == "냉장고") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 냉장고<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>냉장고</span><? } ?></td>
<td width="16%"><? if ($etc9_exp01 == "에어콘") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 에어콘 <? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>에어콘</span><? } ?></td>
<td width="16%"><? if ($etc9_exp02 == "TV") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> TV<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>TV</span><? } ?></td>
<td width="16%"><? if ($etc9_exp03 == "전자렌지") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 전자렌지<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>전자렌지</span><? } ?></td>
<td width="16%"><? if ($etc9_exp04 == "세탁기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 세탁기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>세탁기</span><? } ?></td>
<td width="16%"><? if ($etc9_exp05 == "정수기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 정수기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>정수기</span><? } ?></td>
</tr>
                         </table></td>
                       </tr>
                       <tr>
                         <td colspan="2" height="1" bgcolor="eee4e3"></td>
                         </tr>
                          <tr>
                         <td><img src="<?=$board_skin_path?>/img/option_02.gif"></td>
                         <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                           <tr>
<td width="16%"><? if ($etc9_exp06 == "붙박이장") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 붙박이장<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>붙박이장</span><? } ?> </td>
<td width="16%"><? if ($etc9_exp07 == "옷장") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 옷장<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>옷장</span><? } ?></td>
<td width="16%"><? if ($etc9_exp08 == "책상") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 책상<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'> 책상</span><? } ?></td>
<td width="16%"><? if ($etc9_exp09 == "의자") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 의자<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>의자</span><? } ?></td>
<td width="16%"><? if ($etc9_exp10 == "침대") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 침대<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>침대</span><? } ?></td>
<td width="16%"><? if ($etc9_exp11 == "식탁") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 식탁<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>식탁</span><? } ?></td>
                           </tr>
                         </table></td>
                       </tr>
                         <tr>
                         <td colspan="2" height="1" bgcolor="eee4e3"></td>
                         </tr>
                          <tr>
                         <td><img src="<?=$board_skin_path?>/img/option_03.gif"></td>
                         <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                           <tr>
<td width="16%"><? if ($etc9_exp12 == "씽크대") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 씽크대<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>씽크대</span><? } ?></td>
<td width="16%"><? if ($etc9_exp13 == "가스렌지") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 가스렌지<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>가스렌지</span><? } ?></td>
<td width="16%"><? if ($etc9_exp14 == "비대") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 비대<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>비대</span><? } ?></td>
<td width="16%"><? if ($etc9_exp15 == "샤워부스") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 샤워부스<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>샤워부스</span><? } ?></td>
<td width="16%"><? if ($etc9_exp16 == "전기렌지") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 전기렌지<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>전기렌지</span><? } ?></td>
<td width="16%"><? if ($etc9_exp17 == "인덕션") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 인덕션<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>인덕션</span><? } ?></td>
                           </tr>
                         </table></td>
                       </tr>
                         <tr>
                         <td colspan="2" height="1" bgcolor="eee4e3"></td>
                         </tr>
                          <tr>
                         <td><img src="<?=$board_skin_path?>/img/option_04.gif"></td>
                         <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                           <tr>
<td width="16%"><? if ($etc9_exp18 == "CCTV") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> CCTV<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>CCTV</span><? } ?></td>
<td width="16%"><? if ($etc9_exp19 == "인터폰") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 인터폰<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>인터폰</span><? } ?></td>
<td width="16%"><? if ($etc9_exp20 == "번호키") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 번호키<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>번호키</span><? } ?></td>
<td width="16%"><? if ($etc9_exp21 == "카드키") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 카드키<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>카드키</span><? } ?></td>
<td width="16%"><? if ($etc9_exp22 == "비디오폰") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 비디오폰<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>비디오폰</span><? } ?></td>
<td width="16%"><? if ($etc9_exp23 == "경비원") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 경비원<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>경비원</span><? } ?></td>
                           </tr>
                         </table></td>
                       </tr>
                         <tr>
                         <td colspan="2" height="1" bgcolor="eee4e3"></td>
                         </tr>
                          <tr>
                         <td><img src="<?=$board_skin_path?>/img/option_05.gif"></td>
                         <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                           <tr>
<td width="16%"><? if ($etc9_exp24 == "도시가스") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 도시가스<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>도시가스</span><? } ?></td>
<td width="16%"><? if ($etc9_exp25 == "베란다") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 베란다<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>베란다</span><? } ?></td>
<td width="16%"><? if ($etc9_exp26 == "주차시설") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 주차시설<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>주차시설</span><? } ?></td>
<td width="16%"><? if ($etc9_exp27 == "승강기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 승강기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>승강기</span><? } ?></td>
<td width="16%"><? if ($etc9_exp28 == "화재경보기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 화재경보기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>화재경보기</span><? } ?></td>
<td width="16%"><? if ($etc9_exp29 == "심야전기") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 심야전기<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>심야전기</span><? } ?></td>
                           </tr>
                         </table></td>
                       </tr>
                         <tr>
                         <td colspan="2" height="1" bgcolor="eee4e3"></td>
                         </tr>
                          <tr>
                         <td><img src="<?=$board_skin_path?>/img/option_06.gif"></td>
                         <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                           <tr>
<td width="16%"><? if ($etc9_exp30 == "할인마트") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 할인마트<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>할인마트</span><? } ?></td>
<td width="16%"><? if ($etc9_exp31 == "스포츠센터") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 스포츠센터<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>스포츠센터</span><? } ?></td>
<td width="16%"><? if ($etc9_exp32 == "병원") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 병원<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>병원</span><? } ?></td>
<td width="16%"><? if ($etc9_exp33 == "백화점") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 백화점<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>백화점</span><? } ?></td>
<td width="16%"><? if ($etc9_exp34 == "공원") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 공원<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>공원</span><? } ?></td>
<td width="16%"><? if ($etc9_exp35 == "교육시설") { ?><img src="<?=$board_skin_path?>/img/check_on.gif" align="absmiddle"> 교육시설<? }else{ ?> <img src="<?=$board_skin_path?>/img/check_off.gif" align="absmiddle"> <span class='check_off'>교육시설</span><? } ?></td>
                           </tr>
                         </table></td>
                       </tr>
                         <tr>
                         <td colspan="2" height="1" bgcolor="eee4e3"></td>
                         </tr>
                          <tr>
                         <td><img src="<?=$board_skin_path?>/img/option_07.gif"></td>
                         <td>&nbsp;&nbsp;</td>
                       </tr>
                         <tr>
                         <td colspan="2" height="1" bgcolor="eee4e3"></td>
                         </tr>
                     </table>

<!--//-->


</td>
        <td width="10"><img src="<?=$g4[path]?>/image/optionm_right.gif" width="10" height="232" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="<?=$g4[path]?>/image/landmn_down.gif" width="813" height="9" /></td>
  </tr>
</table>



<table width="813" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?=$board_skin_path?>/img/position_top.gif" width="813" height="66" /></td>
  </tr>
  <tr>
    <td><table width="813" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="7"><img src="<?=$g4[path]?>/image/landmn_left.gif" width="7" height="453" /></td>
        <td width="796" valign="top" >
 <?  include_once("$board_skin_path/view.map.php"); ?>
</td>
        <td width="10"><img src="<?=$g4[path]?>/image/landmn_right.gif" width="10" height="453" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="<?=$g4[path]?>/image/landmn_down.gif" width="813" height="9" /></td>
  </tr>
</table>

<?
$etc8_exp = explode("|",$view[wr_8]); 
$etc8_exp00  = $etc8_exp[0]; 
$etc8_exp01  = $etc8_exp[1]; 
$etc8_exp02  = $etc8_exp[2]; 
$etc8_exp03  = $etc8_exp[3]; 
$etc8_exp04  = $etc8_exp[4]; 
$etc8_exp05  = $etc8_exp[5]; 
$etc8_exp06  = $etc8_exp[6]; 
$etc8_exp07  = $etc8_exp[7]; 
$etc8_exp08  = $etc8_exp[8]; 
$etc8_exp09  = $etc8_exp[9]; 
$etc8_exp10  = $etc8_exp[10]; 
$etc8_exp11  = $etc8_exp[11]; 
$etc8_exp12  = $etc8_exp[12]; 
$etc8_exp13  = $etc8_exp[13]; 
$etc8_exp14  = $etc8_exp[14]; 
$etc8_exp15  = $etc8_exp[15]; 
$etc8_exp16  = $etc8_exp[16]; 
$etc8_exp17  = $etc8_exp[17]; 
$etc8_exp18  = $etc8_exp[18]; 
$etc8_exp19  = $etc8_exp[19]; 
$etc8_exp20  = $etc8_exp[20]; 
$etc8_exp21  = $etc8_exp[21]; 
$etc8_exp22  = $etc8_exp[22]; 
$etc8_exp23  = $etc8_exp[23]; 

?>

<table width="813" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?=$board_skin_path?>/img/realty_top.gif" width="813" height="66" /></td>
  </tr>
  <tr>
    <td><table width="813" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="7"><img src="<?=$board_skin_path?>/img/realty_left.gif" width="7" height="95" /></td>
        <td width="796" valign="top" bgcolor=#ffffff>
<br>
<!--//-->


<div align="center">
                     <table width="730" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                         <td width="81"><img src="<?=$board_skin_path?>/img/realty_01.gif"></td>
                         <td width="314"><?=$etc8_exp00 ?></td>
                         <td width="89"><img src="<?=$board_skin_path?>/img/realty_02.gif"></td>
                         <td width="263"><?=$etc8_exp03 ?></td>
                       </tr>
                        <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr>
                       <tr>
                         <td><img src="<?=$board_skin_path?>/img/realty_03.gif"></td>
                         <td><?=$etc8_exp04 ?></td>
                         <td><img src="<?=$board_skin_path?>/img/realty_04.gif"></td>
                         <td><?=$etc8_exp07 ?></td>
                       </tr>
                          <tr>
                    <td colspan="4" height="1" bgcolor="eee4e3"></td>
                  </tr>
                     </table>
                   </div>

<!--//-->

</td>
        <td width="10"><img src="<?=$board_skin_path?>/img/realty_right.gif" width="10" height="95" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="<?=$g4[path]?>/image/landmn_down.gif" width="813" height="9" /></td>
  </tr>
</table>
</div >


<script type="text/javascript">
print();
</script>
<div align="center">
   <a href="javascript:window.print();"><img src=<?=$board_skin_path?>/img/btn_print3.gif title="프린트하기" border=0></a> 
</div>
<?
include_once("$g4[path]/tail.sub.php");
?>
