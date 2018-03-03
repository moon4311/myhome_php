<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
// 광고베너 썸네일 출력 2012-11-29 코어웹개발

$table_latest_width  = "100%"; // 최신글 테이블폭
	
$cols = "{$board[bo_6]}" ; //  이미지 가로갯수 ,  이미지 세로 갯수는 메인(index.php)에서 지정(총 이미지 수)
$image_h  = "{$board[bo_7]}"; // 이미지 상하 간격

$thum_width = "{$board[bo_4]}"; //이미지 가로사이즈 (픽셀)
$image_quality = "{$board[bo_2]}"; //목록에서 보여질 이미지의 압축률 (100 이하)
$thum_height = "{$board[bo_5]}"; //이미지 새로사이즈 (픽셀)

$data_path = $g4[path]."/data/file/$bo_table"; //썸네일 파일경로
$thumb_path = $data_path.'/thumb';
?>

<table width="742" align="center" cellpadding="0" cellspacing="0" border="0">
  <tr><td align="center" valign="middle">
<table width=100% cellpadding=0 cellspacing=0 border=0  >
<tr bgcolor="#FFFFFF"><td colspan='2' align='center'>
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
<? if (count($list) == 0) { ?><tr bgcolor="#FFFFFF"><td  colspan=4 align='center'>등록된 베너가 없습니다.

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5" colspan="3"></td>
    </tr>
  <tr>
    <td></td>
    <td width="140" align="right">
<a href='#' onclick="window.open('<?=$g4['path']?>/bbs/write.php?bo_table=<?=$bo_table?>','win','resizable=no width=750 height=280');return false">
<img src='<?=$latest_skin_path?>/img/new_admin.jpg'  border='0'>
</a>

	</td>
    <td width="10"></td>
  </tr>
</table>
</td>
</tr><? } else { ?>
    <tr>
<? for ($i=0; $i<count($list); $i++) { 
     if ($i>0 && $i%$cols==0) { echo "</tr><tr><td colspan='$cols' height='0'></td></tr><tr>"; } 
?> 

    <td align="center" >
<?
											$image = $list[$i][file][0][file]; //원본
											$img=$data_path. "/".$image;  //썸네일이 없을경우 원본출력
											//$thumb = $thumb_path. "/". $list[$i][wr_id];


											  if ( file_exists($thumb) )
												$img = $thumb;
											  
												$style = "style='font-family:돋움; font-size:9pt; color:#686695;' ";
												if ($list[$i][icon_new]) {
												$style = "style='font-family:돋움; font-size:9pt; color:#134980;' "; }
												  $subject = "<span $style>".$list[$i][subject]."</span>"; //제목 글자수 자르기
												$wr_hit  = $list[$i]['wr_hit'];
												$wr_id  = $list[$i]['wr_id'];
											//    if ($list[$i]['comment_cnt']) //코
											//        $cmt = "({$list[$i]['comment_cnt']})";

												$bg = "";  //새글? 
												if ($list[$i][icon_new])
													$bg="la_top_2.gif";
												 else
													$bg="la_top_1.gif";

													echo $list[$i][icon_reply] . " ";

													echo "<table cellpadding='0' cellspacing='0' border='0'>";
													if($list[$i][wr_6] =='1'){
													echo "		<tr><td  valign='top' align='center'>
													<a href='{$list[$i][wr_link1]}' onfocus='this.blur()' title='$title' target='_blank' >
													<img src='{$img}' width='$thum_width' height='$thum_height' border=0' style='border:2 solid #ffffff'>
													</a></td></tr>";
													}
													else{
													echo "		<tr><td valign='top' align='center'>
													<a href='{$list[$i][wr_link1]}' onfocus='this.blur()' title='$title' target='_self' >
													<img src='{$img}' width='$thum_width' height='$thum_height' border=0' style='border:2 solid #ffffff'>
													</a></td></tr>";
													}
													echo "</table>";
?>

<? 
    $ssmbid = $_SESSION[ss_mb_id];
    if($ssmbid) $is_admin = is_admin($ssmbid);
    $loop_cnt = 0;
        // 일반회원 베너등록자, 관리자 일때만 출력 
        if($ssmbid == $list[$i][mb_id] or $is_admin or $list[$i][is_notice]) { 
            $loop_cnt++;    // 처리갯수 계산
?>
<a href='#' onclick="window.open('<?=$g4['path']?>/bbs/write.php?w=u&bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][wr_id]?>','win','resizable=no width=750 height=300');return false"><img src='<?=$latest_skin_path?>/img/admin.jpg'  border='0'>

</a>
<? 
    } // 일반회원 베너등록자, 관리자, 공지사항일때만 출력 
?>

    </td>
<?
}
$cnt = ($i%$cols); 
for ($k=$cnt; $k<$cols && $cnt; $k++) { 
    echo "<td></td>"; 
}
}
?>
</tr>
</table></td>
</tr></table>
<? if ($is_admin) { // 신규베너 관리자만등록?>  
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5" colspan="3"></td>
    </tr>
  <tr>
    <td></td>
    <td width="140" align="right">
<a href='#' onclick="window.open('<?=$g4['path']?>/bbs/write.php?bo_table=<?=$bo_table?>','win','resizable=no width=750 height=280');return false">
<img src='<?=$latest_skin_path?>/img/new_admin.jpg'  border='0'>
</a>

	</td>
    <td width="10"></td>
  </tr>
</table>
<? 
    } // 신규베너 관리자만등록
?>
</td></tr></table>