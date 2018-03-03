<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$mod = $board[bo_gallery_cols]; 

if (!$board[bo_gallery_cols])
	$mod = 2;	// 가로 이미지 개수
	$col = $mod;

$td_width = (int)(100 / $mod);

//섬네일 관련 설정
$thumb_width=120;//섬네일 최대폭 300
$thumb_height=100;//섬네일 최대높이

 //DQ엔진 인클루드 2005-03-22 석훈 
include_once "$g4[path]/thumbEngine/dq_thumb_engine2.php";
$dqEngine['thumb_resize']	= 2;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>
?>

<style>
a.text:link, a.text:visited, a.text:active { color:#A8A8A8; text-decoration:none;}
a.text:hover { color:#BF0000; text-decoration:none;}
</style>

<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<!-- 제목 -->
<form name="fboardlist" method="post" style="margin:0px;">
<input type="hidden" name="bo_table" value="<?=$bo_table?>">
<input type="hidden" name="sfl"  value="<?=$sfl?>">
<input type="hidden" name="stx"  value="<?=$stx?>">
<input type="hidden" name="spt"  value="<?=$spt?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="sw"   value="">
<table width=100% cellpadding=0 cellspacing=0>
<tr><td colspan="<?=$col?>" height="1" style="background: url('<?=$board_skin_path?>/img/ver3_bottom_dotline.gif') left;"></td></tr>
	<tr>
		<td class="s11 color_gray1" height="28" colspan=<?=$col?>>
		<? include "category.php"; ?></td>
	</tr>
	<tr><td colspan="<?=$col?>" height="1" style="background: url('<?=$board_skin_path?>/img/ver3_bottom_dotline.gif') left;"></td></tr>

	<tr><td colspan="<?=$col?>">
	
	<!--게시물갯수, 관리자-->
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr height="25">
    <td align="right" class="s11">
        *<b><?=number_format($total_count)?></b> review
       <!--
	   <? if ($rss_href) { ?><a href='<?=$rss_href?>' target=_blank><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
	   -->
       <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif" title="관리자" width="15" height="15" border="0" align="absmiddle"></a><?}?></td>
	</tr>
	</table>
	</td></tr>

<!-- 목록 -->
	<tr> 
	<? for ($i=0; $i<count($list); $i++) {
		$e_text = array("(",")"); //괄호 표시 
		$list[$i][comment_k] = str_replace($e_text, "", $list[$i][comment_cnt]); //괄호 표시 변환으로 삭제 

		if($list[$i][comment_k]!=null) {
			if ($list[$i][last] >= date("Y-m-d H:i:s", $g4['server_time'] - ($board['bo_new'] * 3600)))
		    {
				$list[$i][comment_k] = "(<font color='#FF6600'><b>+{$list[$i][comment_k]} <img src='{$board_skin_path}/img/icon_new.gif' border='0' style='margin-top:3'></b></font>)";
		        //if($list[$i][comment_k]!=null) $list[$i][comment_k] = "<b>".$list[$i][comment_k]."</b>"; 
		    } 
		    else 
		    { 
		        $list[$i][comment_k] = "({$list[$i][comment_k]})";
		    } 
		}

	    if ($i && $i%$mod==0) 
	    echo "</tr><tr><td colspan='3' height='3'></td></tr><tr>";
	?>
	    <td align=center width="<?=$td_width?>%">

	    	<table width=98% cellpadding=0 cellspacing=0 style="border:1 solid #dddddd;">
				<? 
                 if ($wr_id == $list[$i][wr_id]) // 현재위치
                echo "<tr><td colspan='2' height=3 bgcolor=#FF0000></td></tr>";
				else 
					echo "<tr><td colspan='2' height=3 bgcolor=#58A0DC></td></tr>";
	            ?>
				
				<tr>
	    			<td height=28 width=100% colspan="2" style='padding-left:20px' background="<?=$board_skin_path?>/img/dot01.gif">
	    				<? echo " " . $list[$i][icon_secret]; ?>
				        <? 
				        echo $nobr_begin;
				        echo $list[$i][reply];
				        echo $list[$i][icon_reply];
				        echo "&nbsp;<a href='{$list[$i][href]}' class='text'>";
				        if ($list[$i][is_notice])
				            echo "<font color='#884E3D'><strong>{$list[$i][subject]}</strong></font>";
				        else
				        {
				            echo "[{$list[$i][ca_name]}] <b><span style='font-family:Tahoma;font-size:9pt;color:#555555;'>{$list[$i][subject]}</span></b>";
				        }
				        echo "</a>";

				        //echo " " . $list[$i][icon_new];
				        echo $nobr_end;
				        ?>
					</td>
	        	</tr>
				<tr><td height=1 colspan=2 bgcolor=#CCCCCC></td></tr>
				<tr><td colspan=2 height=2></td></tr>
	    
				<tr>
	    			<td width="<?=(int)($thumb_width+10)?>" height="<?=(int)($thumb_height+10)?>" align=center>

					<table cellpadding=0 cellspacing=0>
					<tr><td style="padding:2px;">
					<?
					$image = $list[$i][file][0][file]; //공백으로인한썸네일깨짐방지
					//$image = urlencode($list[$i][file][0][file]); // 첫번째 파일이 이미지라면
						if (preg_match("/\.(gif|jpg|png)$/i", $image)) {

						$thumbdir = $g4[path]."/data/file/".$bo_table."/img";
						if (!is_dir($thumbdir)) {
						@mkdir($thumbdir, 0707);
						@chmod($thumbdir, 0707);
					    // 디렉토리에 있는 파일의 목록을 보이지 않게 한다.
					    $file = $thumbdir."/index.php";
					    $f = @fopen($file, "w");
					    @fwrite($f, "");
					    @fclose($f);
					    @chmod($file, 0606);
						}
						
						$thumbsource="$g4[path]/data/file/$bo_table/" . $image;
						$thumbimg = $thumbdir."/".$list[$i][wr_id].".thumb";
						make_thumb($thumb_width,$thumb_height,$thumbsource,$thumbimg);
						@chmod($thumbimg, 0707);

			    		//echo "<td width='".$thumb_width."' height='".$thumb_height."' background='".$thumbimg."'>"; //이미지 배경으로 지정
						//echo "<a href='{$list[$i][href]}'><img src='$board_skin_path/img/sd_logo.gif' border='0' style='filter:alpha(opacity=70)'></a>";
						echo "<a href='{$list[$i][href]}'><img src='$thumbimg' style='border:2 #CCCCCC solid' onmouseover=this.style.filter='alpha(opacity=70)' onmouseout=this.style.filter=''></a>";

						} else {
						echo "<a href='{$list[$i][href]}'><img src='$board_skin_path/img/no_img.gif' width='{$thumb_width}' height='{$thumb_height}' style='border:1 #E7E7E7 solid'></a>"; 
						}
					?>
					</td></tr></table>
					</td>
			        	
					<td width="" align=left>
					<?
					$address = substr($list[$i][wr_3], 8); // 3번 여유 필드에 저장 되어 있는 주소의 우편번호를 삭제
					$adrress1 = str_replace("|","",$address); // | 태그 삭제
					?>
					<table width=100% cellpadding=2 cellspacing=0>
					<tr>
					<?
						$p_four = explode("|",$list[$i][wr_4]);
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
					<td align=left width=100%><font color=FF8000><strong>문의 : <?=$four01?></strong></font><br><br>휴일 : <?=$four03?> <br><br> <?=$adrress1?></td></tr>
				    </tr></table>
				</td></tr>
				<tr><td colspan="2" height=25 bgcolor=#F1F1F1 align=right style="padding:3px;"><? if ($is_checkbox) { ?><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"><? } ?>
					<?
						if ($list[$i][comment_k]) {
				            echo "<a href=\"{$list[$i][comment_href]}\"><span style='font-size:9pt;'>{$list[$i][comment_k]}개의 고객평가가 있습니다.</span></a>";
					} else {
						echo "<span style='font-size:9pt;'>고객평가가 없습니다</span>";
					}
					?>
							
				
					</td></tr>
				</td></tr></table>
		
		</td>
	<? } 
// 나머지 td
$cnt = $i%$mod;
if ($cnt)
    for ($i=$cnt; $i<$mod; $i++)
        echo "<td width='{$td_width}%'>&nbsp;</td>";
echo "</tr>";
?>

<? if (count($list) == 0) { echo "<tr><td colspan='$col' height=100 align=center>게시물이 없습니다.</td></tr>"; } ?>
<tr><td colspan='<?=$col?>' height='1' style="background: url('<?=$board_skin_path?>/img/ver3_dot.gif') left;"></td></tr>
</table>
</form>


<!-- 페이지 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr> 
    <td width="100%" align="center" height=30 valign=bottom>
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/btn_search_prev.gif' border=0 align=absmiddle title='이전검색'></a>"; } ?>
        <?
        // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
        //echo $write_pages;
        $write_pages = str_replace("처음", "<img src='{$board_skin_path}/img/begin.gif' border='0' title='처음'>", $write_pages);
        $write_pages = str_replace("이전", "<img src='{$board_skin_path}/img/prev.gif' border='0' title='이전'>", $write_pages);
        $write_pages = str_replace("다음", "<img src='{$board_skin_path}/img/next.gif' border='0' title='다음'>", $write_pages);
        $write_pages = str_replace("맨끝", "<img src='{$board_skin_path}/img/end.gif' border='0' title='맨끝'>", $write_pages);
        $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<b><font class=\"s11 color_gray1\">$1</font></b>", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><font class=\"s11 color_pink1\">$1</font></b>", $write_pages);
        ?>
        <?=$write_pages?>
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/btn_search_next.gif' border=0 align=absmiddle title='다음검색'></a>"; } ?>
    </td>
</tr>
</table>

<!-- 링크 버튼, 검색 -->
<form name=fsearch method=get style="margin:0px;">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=sca      value="<?=$sca?>">
<table width=100% cellpadding=0 cellspacing=0>
<tr> 
    <td width="50%" height="40">
        <? if ($list_href) { ?><a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/btn_list.gif" border="0"></a><? } ?>
        <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border="0"></a><? } ?>
        <? if ($is_checkbox) { ?>
            <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" border="0"></a>
            <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/btn_select_copy.gif" border="0"></a>
            <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/btn_select_move.gif" border="0"></a>
        <? } ?>
    </td>
    <td width="50%" align="right">
        <select name=sfl>
            <option value='wr_subject'>업소명</option>
            <option value='wr_content'>내용</option>
            <option value='wr_subject||wr_content'>업소명+내용</option>
            <option value='mb_id,1'>회원아이디</option>
            <option value='mb_id,0'>회원아이디(코)</option>
            <option value='wr_name,1'>이름</option>
            <option value='wr_name,0'>이름(코)</option>
        </select><input name=stx maxlength=15 size=10 itemname="검색어" required value='<?=$stx?>'><select name=sop>
            <option value=and>and</option>
            <option value=or>or</option>
        </select>
        <input type=image src="<?=$board_skin_path?>/img/search_btn.gif" border=0 align=absmiddle></td>
</tr>
</table>
</form>

</td></tr></table>

<script language="JavaScript">
if ('<?=$sca?>') document.fcategory.sca.value = '<?=$sca?>';
if ('<?=$stx?>') {
    document.fsearch.sfl.value = '<?=$sfl?>';
    document.fsearch.sop.value = '<?=$sop?>';
}
</script>

<? if ($is_checkbox) { ?>
<script language="JavaScript">
function all_checked(sw)
{
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str)
{
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
function select_delete()
{
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
function select_copy(sw)
{
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=396, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- 게시판 목록 끝 -->
