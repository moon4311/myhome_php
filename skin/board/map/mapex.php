<?php
include_once("./_common.php");
$g4['title'] = "로드맵";

$data_path = $g4[path]."/data/file/$bo_table";
//$thumb_path = $data_path.'/thumb';
$thumb_path = $data_path.'/latest_thumb';


$bo_table = 'roadmap';


    // 네이버 지도api 키값
    $map_key = "key=네이버 지도api 키값";

    if (!$map_query) $map_query = "경북 포항시 북구 장성동 1510-14";
    
    // 여기부터 주소 검색 xml 파싱
    $pquery = $map_key. "&query=". str_replace(" ","",$map_query);
  $fp = fsockopen ("openapi.map.naver.com", 80, $errno, $errstr, 30); 
    if (!$fp) { 
        echo "$errstr ($errno)";
        //exit;
    } else {
        fputs($fp, "GET /api/geocode.php?"); 
        fputs($fp, $pquery); 
        fputs($fp, " HTTP/1.1\r\n"); 
        fputs($fp, "Host: openapi.map.naver.com\r\n"); 
        fputs($fp, "Connection: Close\r\n\r\n"); 
         
        $header = ""; 
        while (!feof($fp)) { 
            $out = fgets ($fp,512); 
            if (trim($out) == "") { 
                break; 
            } 
            $header .= $out; 
        } 
         
        $mapbody = ""; 
        while (!feof($fp)) { 
            $out = fgets ($fp,512); 
            $mapbody .= $out; 
        } 
        
        $idx = strpos(strtolower($header), "transfer-encoding: chunked"); 
         
        if ($idx > -1) { // chunk data 
            $temp = ""; 
            $offset = 0; 
            do { 
                $idx1 = strpos($mapbody, "\r\n", $offset); 
                $chunkLength = hexdec(substr($mapbody, $offset, $idx1 - $offset)); 
                 
                if ($chunkLength == 0) { 
                    break; 
                } else { 
                    $temp .= substr($mapbody, $idx1+2, $chunkLength); 
                    $offset = $idx1 + $chunkLength + 4; 
                } 
            } while(true); 
            $mapbody = $temp; 
        } 
        //header("Content-Type: text/xml; charset=utf-8"); 
        fclose ($fp); 
    }     
    // 여기까지 주소 검색 xml 파싱




$queryp="select * from g4_write_roadmap where wr_id='$wr_id'";
$resultp = mysql_query($queryp) or die("로그인하십시오.");
$rowp=mysql_fetch_array($resultp);

$etc7_exp=explode("|" , $rowp[wr_7]);
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


$etc8_exp = explode("|",$rowp[wr_8]); 
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


$etc19_exp = explode("|",$rowp[wr_19]); 
$etc19_exp00  = $etc19_exp[0]; 
$etc19_exp01  = $etc19_exp[1];
$etc19_exp02  = $etc19_exp[2];

$etc24_exp=explode("|" , $rowp[wr_24]);
$etc24_exp00 = $etc24_exp[0];
$etc24_exp01 = $etc24_exp[1];
$etc24_exp02 = $etc24_exp[2];

$wr_idp=stripslashes($rowp["wr_id"]);
$ca_namep=stripslashes($rowp["ca_name"]);
$wr_subjectp=stripslashes($rowp["wr_subject"]);
$wr_contentp=stripslashes($rowp["wr_content"]);
$wr_link1p=stripslashes($rowp["wr_link1"]);
$wr_link2p=stripslashes($rowp["wr_link2"]);
$mb_idp=stripslashes($rowp["mb_id"]);
$mb_namep=stripslashes($rowp["mb_name"]);
$wr_lastp=stripslashes($rowp["wr_last"]);
$wr_1p=stripslashes($rowp["wr_1"]);
$wr_2p=stripslashes($rowp["wr_2"]);
$wr_3p=stripslashes($rowp["wr_3"]);
$wr_4p=stripslashes($rowp["wr_4"]);
$wr_5p=stripslashes($rowp["wr_5"]);
$wr_6p=stripslashes($rowp["wr_6"]);
$wr_7p=stripslashes($rowp["wr_7"]);
$wr_8p=stripslashes($rowp["wr_8"]);
$wr_9p=stripslashes($rowp["wr_9"]);
$wr_10p=stripslashes($rowp["wr_10"]);
$wr_11p=stripslashes($rowp["wr_11"]);
$wr_12p=stripslashes($rowp["wr_12"]);
$wr_13p=stripslashes($rowp["wr_13"]);
$wr_14p=stripslashes($rowp["wr_14"]);
$wr_15p=stripslashes($rowp["wr_15"]);
$wr_16p=stripslashes($rowp["wr_16"]);
$wr_17p=stripslashes($rowp["wr_17"]);
$wr_18p=stripslashes($rowp["wr_18"]);
$wr_19p=stripslashes($rowp["wr_19"]);
$wr_20p=stripslashes($rowp["wr_20"]);
$wr_21p=stripslashes($rowp["wr_21"]);
$wr_22p=stripslashes($rowp["wr_22"]);
$wr_23p=stripslashes($rowp["wr_23"]);
$wr_24p=stripslashes($rowp["wr_24"]);


$sql33 = " select bf_file, bf_datetime from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '{$wr_idp}' and bf_type in (1,2,3) order by bf_no asc limit 0, 10 ";
 $result33=mysql_query($sql33); 
$row33 = mysql_fetch_array($result33); 


    // 파일이 있으면 출력.
	if (!file_exists($row33[bf_file])) {

// $img = "<a href='".$list[$i][href]."&listStyle=".$listStyle."'><img src='".$thumb."' align='absmiddle' border='0'></a>";
	$imgfile = "<img src =$g4[path]/data/file/$bo_table/$row33[bf_file] width=120 height=100  border=0>"; 

    } else {

     $imgfile = "<img src=$g4[path]/image/smile_icon.jpg width=70 height=80  border=0>"; 

    }

//$imgfileavm = "<img src =$g4[path]/data/file/$bo_table/$row3[bf_file] width=70 height=80  border=0>"; 

$metersz=explode(".",$wr_19p);



 // 여기부터 좌표값 변수에 등록
    $map_x_point_1=explode("<x>", $mapbody); 
    $map_x_point_2=explode("</x>", $map_x_point_1[1]); 
    $wr_16p=$map_x_point_2[0]; 
    $map_y_point_1=explode("<y>", $mapbody); 
    $map_y_point_2=explode("</y>", $map_y_point_1[1]); 
    $wr_17p=$map_y_point_2[0]; 
    // 여기까지 좌표값 변수에 등록

$update_timep = date("Y-m-d", mktime(0,0,0,substr($rowp['wr_12'],4,2),substr($rowp['wr_12'],6,2),substr($rowp['wr_12'],0,4)));

 //echo $map_query."<br>";
 //echo $map_x_point."<br>";
 //echo $map_y_point;

 
 ?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>러브하우스</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel='stylesheet' href='style.css' type='text/css'>


</head>
<!-- oncontextmenu="return false" onselectstart="return false" ondragstart="return false" -->
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
<tr><td bgcolor="#FFFFFF">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td align="center" valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="453" align="center">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="453" align="center" bgcolor="#f1f1f1">


<!-- 지도등록시작***************************************************************************************************************************** -->
<SCRIPT type="text/javascript" src="http://openapi.map.naver.com/js/naverMap.naver?key=네이버 지도api 키값"></SCRIPT>
<div id='mapContainer' style='border:0px solid #cccccc;width:600px;height:453px'></div>
<SCRIPT LANGUAGE="JavaScript">
<!--
	/*지도 개체 생성 */
	var opts = {width:600, height:453, mapMode:0};

	var mapObj = new NMap(document.getElementById('mapContainer'),opts);


<?if($vm == "pr"){?>

	/* 지도 좌표, 축적 수 준 초기화 */
	mapObj.setCenterAndZoom(new NPoint(<?=$wr_16p?>,<?=$wr_17p?>),2);



<?}else{?>

	mapObj.setCenterAndZoom(new NPoint(<?=$wr_16p?>,<?=$wr_17p?>),3);

<?}?>


	/* 지도 컨트롤 생성 */
	var zoom = new NZoomControl();

	zoom.setAlign("right");
	zoom.setValign("top");
	mapObj.addControl(zoom);

	/* 지도 모드 변경 버튼 생성 */
	var mapBtns = new NMapBtns();
	mapBtns.setAlign("right");
	mapBtns.setValign("top");
	mapObj.addControl(mapBtns);



// 정보 출력을 위한 NInfoWindow 객체를 생성하여 등록합니다.
var infowin = new NInfoWindow();
mapObj.addOverlay(infowin);
 
var MARKER_KEY = 'marker', LINE_KEY = 'line';


// 검색 결과를 마커를 사용하여 지도에 표시합니다.
function initMarker(pos, count, content,icon)
{

	var iconUrl = 'imgs/icon01.png';


		   // 마커 생성
	var marker = new NMark(pos, new NIcon(iconUrl, new NSize(22, 33)));
		  // marker 객체에 마우스가 오버했을 때, 실행할 함수를 등록합니다.
	
	NEvent.addListener(marker, "mouseover",
 
	function(pos)
		{ 
			infowin.set(pos, getContent(content));
			infowin.showWindow();
		}
	);
 
// 지도에 마커를 등록합니다.
	mapObj.addOverlay(marker,MARKER_KEY);
}
 
 
 
function happy_Bound(XX,YY){
	mapObj.setCenterAndZoom(new NPoint(XX,YY),3);
}
 

mapObj.clearOverlays(MARKER_KEY);
infowin.hideWindow();




<?if($vm == "pr"){


?>


// 검색 결과를 마커를 사용하여 지도에 표시합니다.
function initMarker(pos, count, content,icon)
{
<?if($wr_20p == "1"){?>
	var iconUrl = 'imgs/estate.png';
<?}else if($wr_20p == "2"){?>
	var iconUrl = 'imgs/car.png';
<?}else if($wr_20p == "3"){?>
	var iconUrl = 'imgs/infonet.png';
<?}?>
		   // 마커 생성
	var marker = new NMark(pos, new NIcon(iconUrl, new NSize(22, 33)));
		  // marker 객체에 마우스가 오버했을 때, 실행할 함수를 등록합니다.
	
	NEvent.addListener(marker, "mouseover",
 
	function(pos)
		{ 
			infowin.set(pos, getContent(content));
			infowin.showWindow();
		}
	);
 
// 지도에 마커를 등록합니다.
	mapObj.addOverlay(marker,MARKER_KEY);
}
 
//$metersz=explode(".",$rowp["wr_19"]);

// initMarker(new NPoint(<?=$wr_16p?>,<?=$wr_17p?>), 1, new Array('<?=$wr_subjectp?>', '<?=$etc7_exp06?>/<?=$etc7_exp07?>','<?=$mb_namep?>','<?=$wr_8p?>','<?=$imgfileap?>'),1 );

initMarker(new NPoint(<?=$wr_16p?>, <?=$wr_17p?>),1, new Array('<?=$wr_4p?>','<?=$wr_1p?>','<?=$wr_2p?>','<?=$wr_18p?>','<?=$metersz[0];?>','<?=$wr_5p?>','<?=$ca_namep?>','<?=$etc13_exp03?>','<?=$etc7_exp06?>/<?=$etc7_exp07?>','<?=$wr_28p?>','<?=$wr_link1p?>','<?=$wr_idp?>','<?=$imgfile?>'),1 );


function getContent(content){
	var title = content[0];
	var wr_1vm = content[1];
	var wr_2vm = content[2];
	var wr_18vm = content[3];
	var metersz = content[4];
	var wr_5vm = content[5];
	var ca_namevm = content[6];
	var etc13_exp03 = content[7];
	var etc7 = content[8];
	var comsa = content[9];
	var sede = content[10];
	var link = content[11];
	var nanbang = content[12];
	var compyong = content[13];
	var cometer = content[14];
	var comstage = content[15];
	var body = ' \
<table width=250 align=center border=0 cellspacing=1 cellpadding=1 bgcolor=#f5edd9><tr><td><table width=100% align=center border=0 cellspacing=0 cellpadding=1><tr><td height=28 bgcolor=#f5f4e7> \
<table width=100% align=center border=0 cellspacing=0 cellpadding=0><tr><td><img src=<?=$g4[path]?>/image/arrow.gif align=absmiddle><a href=<?=$g4[bbs_path]?>/board.php?bo_table=roadmap&wr_id='+link+'& target=_blank><b>'+title+'</b></a></td> \
<td align=right><a href="javascript:infowin.hideWindow()"><img src=<?=$g4[path]?>/image/close.gif border=0></a></td></tr></table></td></tr> \
</table></td></tr> \
<tr><td bgcolor=#ffffff><table width=100% align=center border=0 cellspacing=0 cellpadding=2> \
<tr><td width=120 style=color:#fcf6e6;padding:1px 0px 1px 4px;>'+nanbang+'</td><td align=left valign=top> \
<table width=130 border=0 cellspacing=0 cellpadding=0> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_04.gif></td><td>'+wr_5vm+'</td></tr> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_01.gif></td><td>'+wr_2vm+'</td></tr> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_02.gif></td><td>'+wr_18vm+'평 ('+metersz+'㎡)</td></tr> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_03.gif></td><td>'+etc7+'</td></tr> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_05.gif></td><td>'+ca_namevm+'</td></tr> \
</table></td></tr></table></td></tr> \
</table></td></tr></table> \
	';
	return body;
}
 


<?

}else{


$queryvm="select * from g4_write_roadmap where wr_16 != '' order by wr_id desc";

$resultvm=mysql_query($queryvm);
$totalvm=mysql_num_rows($resultvm);

$startvm = "0";

$numbervm=$totalvm-$startvm;
for($ivm=$startvm;$ivm<$totalvm;$ivm++) {
	mysql_data_seek($resultvm,$ivm);
	$rowvm=mysql_fetch_array($resultvm);

$etc7_exp=explode("|" , $rowvm[wr_7]);
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


$etc8_exp = explode("|",$rowvm[wr_8]); 
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


$etc13_exp=explode("|" , $rowvm[wr_13]);
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



$etc21_exp=explode("|" , $rowvm[wr_21]);
$etc21_exp00 = $etc21_exp[0];
$etc21_exp01 = $etc21_exp[1];
$etc21_exp02 = $etc21_exp[2];
$etc21_exp03 = $etc21_exp[3];
$etc21_exp04 = $etc21_exp[4];
$etc21_exp05 = $etc21_exp[5];
$etc21_exp06 = $etc21_exp[6];
$etc21_exp07 = $etc21_exp[7];
$etc21_exp08 = $etc21_exp[8];
$etc21_exp09 = $etc21_exp[9];
$etc21_exp10 = $etc21_exp[10];

$etc24_exp=explode("|" , $rowvm[wr_24]);
$etc24_exp00 = $etc24_exp[0];
$etc24_exp01 = $etc24_exp[1];
$etc24_exp02 = $etc24_exp[2];

$wr_idvm=stripslashes($rowvm["wr_id"]);
$ca_namevm=stripslashes($rowvm["ca_name"]);
$wr_subjectvm=stripslashes($rowvm["wr_subject"]);
$wr_contentvm=stripslashes($rowvm["wr_content"]);
$wr_link1vm=stripslashes($rowvm["wr_link1"]);
$wr_link2vm=stripslashes($rowvm["wr_link2"]);
$mb_idvm=stripslashes($rowvm["mb_id"]);
$mb_namevm=stripslashes($rowvm["mb_name"]);
$wr_lastvm=stripslashes($rowvm["wr_last"]);
$wr_1vm=stripslashes($rowvm["wr_1"]);
$wr_2vm=stripslashes($rowvm["wr_2"]);
$wr_3vm=stripslashes($rowvm["wr_3"]);
$wr_4vm=stripslashes($rowvm["wr_4"]);
$wr_5vm=stripslashes($rowvm["wr_5"]);
$wr_6vm=stripslashes($rowvm["wr_6"]);
$wr_7vm=stripslashes($rowvm["wr_7"]);
$wr_8vm=stripslashes($rowvm["wr_8"]);
$wr_9vm=stripslashes($rowvm["wr_9"]);
$wr_10vm=stripslashes($rowvm["wr_10"]);
$wr_11vm=stripslashes($rowvm["wr_11"]);
$wr_12vm=stripslashes($rowvm["wr_12"]);
$wr_13vm=stripslashes($rowvm["wr_13"]);
$wr_14vm=stripslashes($rowvm["wr_14"]);
$wr_15vm=stripslashes($rowvm["wr_15"]);
$wr_16vm=stripslashes($rowvm["wr_16"]);
$wr_17vm=stripslashes($rowvm["wr_17"]);
$wr_18vm=stripslashes($rowvm["wr_18"]);
$wr_19vm=stripslashes($rowvm["wr_19"]);
$wr_20vm=stripslashes($rowvm["wr_20"]);
$wr_21vm=stripslashes($rowvm["wr_21"]);
$wr_22vm=stripslashes($rowvm["wr_22"]);
$wr_23vm=stripslashes($rowvm["wr_23"]);
$wr_24vm=stripslashes($rowvm["wr_24"]);
$wr_25vm=stripslashes($rowvm["wr_25"]);


$update_timevm = date("Y-m-d", mktime(0,0,0,substr($rowvm['wr_12'],4,2),substr($rowvm['wr_12'],6,2),substr($rowvm['wr_12'],0,4)));

 //$in_date = substr($rowvm[wr_12],0,4).'년 '.sprintf('%2d',substr($rowvm[wr_12],4,2)).'월 '.sprintf('%2d',substr($rowvm[wr_12],6,2)).'일';

$sql3 = " select bf_file, bf_datetime from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '{$wr_idvm}' and bf_type in (1,2,3) order by bf_no asc limit 0, 10 ";
 $result3=mysql_query($sql3); 
$row3 = mysql_fetch_array($result3); 


    // 파일이 있으면 출력.
	if (!file_exists($row3[bf_file])) {

// $img = "<a href='".$list[$i][href]."&listStyle=".$listStyle."'><img src='".$thumb."' align='absmiddle' border='0'></a>";
	$imgfileavm = "<img src =$g4[path]/data/file/$bo_table/$row3[bf_file] width=120 height=100  border=0>"; 

    } else {

     $imgfileavm = "<img src=$g4[path]/image/smile_icon.jpg width=70 height=80  border=0>"; 

    }

//$imgfileavm = "<img src =$g4[path]/data/file/$bo_table/$row3[bf_file] width=70 height=80  border=0>"; 

$metersz=explode(".",$rowvm["wr_19"]);

?>
initMarker(new NPoint(<?=$wr_16vm?>, <?=$wr_17vm?>), <?=$numbervm?>, new Array('<?=$wr_4vm?>','<?=$wr_1vm?>','<?=$wr_2vm?>','<?=$wr_18vm?>','<?=$metersz[0];?>','<?=$wr_5vm?>','<?=$ca_namevm?>','<?=$etc13_exp03?>','<?=$etc7_exp06?>/<?=$etc7_exp07?>','<?=$wr_28vm?>','<?=$wr_link1vm?>','<?=$wr_idvm?>','<?=$imgfileavm?>'),1 );
<?
	$numbervm--;
}	
?>
function getContent(content){
	var title = content[0];
	var wr_1vm = content[1];
	var wr_2vm = content[2];
	var wr_18vm = content[3];
	var metersz = content[4];
	var wr_5vm = content[5];
	var ca_namevm = content[6];
	var etc13_exp03 = content[7];
	var etc7 = content[8];
	var comsa = content[9];
	var sede = content[10];
	var link = content[11];
	var nanbang = content[12];
	var compyong = content[13];
	var cometer = content[14];
	var comstage = content[15];
	var body = ' \
<table width=250 align=center border=0 cellspacing=1 cellpadding=1 bgcolor=#f5edd9><tr><td><table width=100% align=center border=0 cellspacing=0 cellpadding=1><tr><td height=28 bgcolor=#f5f4e7> \
<table width=100% align=center border=0 cellspacing=0 cellpadding=0><tr><td><img src=<?=$g4[path]?>/image/arrow.gif align=absmiddle><a href=<?=$g4[bbs_path]?>/board.php?bo_table=roadmap&wr_id='+link+'& target=_blank><b>'+title+'</b></a></td> \
<td align=right><a href="javascript:infowin.hideWindow()"><img src=<?=$g4[path]?>/image/close.gif border=0></a></td></tr></table></td></tr> \
</table></td></tr> \
<tr><td bgcolor=#ffffff><table width=100% align=center border=0 cellspacing=0 cellpadding=2> \
<tr><td width=120 style=color:#fcf6e6;padding:1px 0px 1px 4px;>'+nanbang+'</td><td align=left valign=top> \
<table width=130 border=0 cellspacing=0 cellpadding=0> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_04.gif></td><td>'+wr_5vm+'</td></tr> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_01.gif></td><td>'+wr_2vm+'</td></tr> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_02.gif></td><td>'+wr_18vm+'평 ('+metersz+'㎡)</td></tr> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_03.gif></td><td>'+etc7+'</td></tr> \
<tr><td><img src=<?=$g4[path]?>/image/maptit_05.gif></td><td>'+ca_namevm+'</td></tr> \
</table></td></tr></table></td></tr> \
</table></td></tr></table> \
	';
	return body;
}
 

<?}?>




//-->
</SCRIPT>
<!-- 지도등록끝***************************************************************************************************************************** -->




</td></tr>
</table>

</td></tr>
</table>


</td>
<td align="center" valign="top" width="198">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="453" align="center"><iframe src="<?=$g4[path]?>/plugin/map/mapex_list.php?num=<?=$num?>&sc=<?=$sc?>&comcate=<?=$comcate?>" width="100%" height="453" marginwidth="0" marginheight="0" name="maplist" frameborder="0"></iframe></td></tr>
</table>

</td></tr>
</table>

</td></tr>
</table>

</body>
</html>
