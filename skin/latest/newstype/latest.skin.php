<?
// 제작:정적인손님 (수정배포권장)
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 그누보드 팁자료실의 트루아이님의 글 참조 ^^
function new_count($table_id){ 
    // 오늘을 불러옵니다. 
    $intime = date("Y-m-d H:i:s", time() - (int)(60 * 60 * 24)); 

    // 여기는 오늘과 글쓴 날짜를 비교합니다. 
    $tmp_write_table .= "g4_write_$table_id"; 
    $sql2 = " select wr_datetime from $tmp_write_table where wr_datetime >= '$intime'"; 

    // 새로운 글이 몇개 있는지 확인합니다. 
    $result2 = sql_query($sql2); 

    $total_count = mysql_num_rows($result2); 

    if ($total_count > 0) { 
//        $str_cnt .= " [".$total_count."]"; 
        $str_cnt .= "".$total_count.""; 
        return $str_cnt; 
    } 
    else { 
        $str_cnt .= ""; 
        return $str_cnt; 
    } 
} 

// 이곳에 지역별로 만든 게시판ID를 넣어주삼
//예(: $seoul_bo = "seoulnote";
$seoul_bo = "college1";          //사회과학대학
$incheon_bo = "college2";      //인문예술대학
$daejeon_bo = "college3";      //사범대학
$daegu_bo = "college4";          //공과대학
$busan_bo = "college5";          //약학대학
$gwangju_bo = "college6";      //생명산업과학대학
//   $ulsan_bo = "게시판ID";          //울산시
//   $sejong_bo = "게시판ID";        //세종시

//   $kyonggi_bo = "게시판ID";      //경기도
//   $gangwon_bo = "게시판ID";      //강원도
//   $chungnam_bo = "게시판ID";    //충청남도
//   $chungbuk_bo = "게시판ID";    //충청북도
//   //   $gyeongbuk_bo = "게시판ID";  //경상북도
//   $kyungnam_bo = "게시판ID";    //경상남도
//   $jeonbuk_bo = "게시판ID";      //전라북도
//   $jeonnam_bo = "게시판ID";      //전라남도
//   $jeju_bo = "게시판ID";            //제주도

//   $foreign_bo = "게시판ID";            //해외
?>
<style type="text/css">
#mtenewslist{border:1px solid #cccdcf; background-color:#ecedef;}
#mtenewslisttip{border-bottom:1px solid #cccdcf; height:35px;}
#mtenewslistnew{width:27px; height:27px; position:absolute;margin:64px 0 0 65px; background-image:url(<?=$latest_skin_path?>/img/menuimgnew.gif);}
</style>

<div id="mtenewslist">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="left" valign="middle">
    <div id="mtenewslisttip">
    <div style="font-family:나눔고딕,Arial,굴림; font-weight:bold; font-size:13px; padding-top:10px; padding-right:0px; padding-bottom:10px; padding-left:20px; width:55px; float:left;">강의정보</div> 
    <div style="padding-top:7px; padding-right:5px; padding-bottom:0; padding-left:0; width:41px; float:left;"><a href="<?=$g4[path]?>/?mw_main=G01&amp;mw_menu=1"><img src='<?=$latest_skin_path?>/img/listicon.gif' border="0"></a></div> 
                    <div style="font-weight:bold; font-size:12px; padding-top:11px; padding-right:0; padding-bottom:0; padding-left:0; width:300px; float:left;">
단과대학을 선택하면 강의정보를 볼 수 있어요.</div>
    </div>
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$seoul_bo?>">
<? if (new_count($seoul_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
     <img src='<?=$latest_skin_path?>/img/cityicon01.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$incheon_bo?>">
    <? if (new_count($incheon_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon02.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$daejeon_bo?>">
    <? if (new_count($daejeon_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon03.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$daegu_bo?>">
    <? if (new_count($daegu_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon04.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$busan_bo?>">
    <? if (new_count($busan_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon05.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$gwangju_bo?>">
    <? if (new_count($gwangju_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon06.png' border="0" style="margin:10px;"></a></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$ulsan_bo?>">
    <? if (new_count($ulsan_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon07.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$sejong_bo?>">
    <? if (new_count($sejong_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon08.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$kyonggi_bo?>">
    <? if (new_count($kyonggi_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon09.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$gangwon_bo?>">
    <? if (new_count($gangwon_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon10.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$chungnam_bo?>">
    <? if (new_count($chungnam_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon11.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$chungbuk_bo?>">
    <? if (new_count($chungbuk_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon12.png' border="0" style="margin:10px;"></a></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$gyeongbuk_bo?>">
    <? if (new_count($gyeongbuk_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon13.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$kyungnam_bo?>">
    <? if (new_count($kyungnam_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon14.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$jeonbuk_bo?>">
    <? if (new_count($jeonbuk_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon15.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$jeonnam_bo?>">
    <? if (new_count($jeonnam_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon16.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$jeju_bo?>">
    <? if (new_count($jeju_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon17.png' border="0" style="margin:10px;"></a></td>
    <td align="center" valign="middle"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$foreign_bo?>">
    <? if (new_count($foreign_bo) > 0) { echo "<div id=mtenewslistnew></div>"; ?> <? } else {  echo ""; } ?> 
    <img src='<?=$latest_skin_path?>/img/cityicon18.png' border="0" style="margin:10px;"></a></td>
  </tr>
</table>
</td>
  </tr>
</table>
</div>