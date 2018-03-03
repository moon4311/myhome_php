<?
header("Content-Type: text/html; charset=utf-8");
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

 $wr_10 = $etc8_exp13 . $etc8_exp14;



 $wr_20 = 1;


 if ($w == 'u' && $is_admin) { // 임의로 등록날짜 수정가능
        $sql = " update $write_table set wr_datetime = '$wr_datetime' 
                where wr_id = '$wr_id' "; 
        sql_query($sql); 
    } 

if ($w == 'u' && $is_admin) { // 임의로 조회수 증가시키기
        $sql = " update $write_table set wr_hit = '$wr_hit' 
                where wr_id = '$wr_id' "; 
        sql_query($sql); 
    } 

 // 네이버 지도api 키값
    $map_key = "key=10fcefdb194c6dc67eada2d07817eaff";

    if (!$map_query) $map_query = "".$wr_10."";
    
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

 // 여기부터 좌표값 변수에 등록
    $map_x_point_1=explode("<x>", $mapbody); 
    $map_x_point_2=explode("</x>", $map_x_point_1[1]); 
    $wr_16=$map_x_point_2[0]; 
    $map_y_point_1=explode("<y>", $mapbody); 
    $map_y_point_2=explode("</y>", $map_y_point_1[1]); 
    $wr_17=$map_y_point_2[0]; 
    // 여기까지 좌표값 변수에 등록
?>



 <?

$sql1 = " update $write_table set wr_1 = '$wr_1' where wr_id = '$wr_id' ";
sql_query($sql1);

$wr_2 = "$etc2_exp00|$etc2_exp01|$etc2_exp02|"; 
$sql2 = " update $write_table set wr_2 = '$wr_2' where wr_id = '$wr_id' ";
sql_query($sql2);

$sql3 = " update $write_table set wr_3 = '$wr_3' where wr_id = '$wr_id' ";
sql_query($sql3);

$sql4 = " update $write_table set wr_4 = '$wr_4' where wr_id = '$wr_id' ";
sql_query($sql4);

$sql5 = " update $write_table set wr_5 = '$wr_5' where wr_id = '$wr_id' ";
sql_query($sql5);

$sql6 = " update $write_table set wr_6 = '$wr_6' where wr_id = '$wr_id' ";
sql_query($sql6);

$wr_7 = "$etc7_exp00|$etc7_exp01|$etc7_exp02|$etc7_exp03|$etc7_exp04|$etc7_exp05|$etc7_exp06|$etc7_exp07|$etc7_exp08|$etc7_exp09|$etc7_exp10|$etc7_exp11|$etc7_exp12|$etc7_exp13|$etc7_exp14|$etc7_exp15|$etc7_exp16"; 
$sql7 = " update $write_table set wr_7 = '$wr_7' where wr_id = '$wr_id' ";
sql_query($sql7);


$wr_8 = "$etc8_exp00|$etc8_exp01|$etc8_exp02|$etc8_exp03|$etc8_exp04|$etc8_exp05|$etc8_exp06|$etc8_exp07|$etc8_exp08|$etc8_exp09|$etc8_exp10|$etc8_exp11|$etc8_exp12|$etc8_exp13|$etc8_exp14|$etc8_exp15|$etc8_exp16|$etc8_exp17|$etc8_exp18|$etc8_exp19|$etc8_exp20|$etc8_exp21|$etc8_exp22|$etc8_exp23"; 
$sql8 = " update $write_table set wr_8 = '$wr_8' where wr_id = '$wr_id' ";
sql_query($sql8);


$wr_9 = "$etc9_exp00|$etc9_exp01|$etc9_exp02|$etc9_exp03|$etc9_exp04|$etc9_exp05|$etc9_exp06|$etc9_exp07|$etc9_exp08|$etc9_exp09|$etc9_exp10|$etc9_exp11|$etc9_exp12|$etc9_exp13|$etc9_exp14|$etc9_exp15|$etc9_exp16|$etc9_exp17|$etc9_exp18|$etc9_exp19|$etc9_exp20|$etc9_exp21|$etc9_exp22|$etc9_exp23|$etc9_exp24|$etc9_exp25|$etc9_exp26|$etc9_exp27|$etc9_exp28|$etc9_exp29|$etc9_exp30|$etc9_exp31|$etc9_exp32|$etc9_exp33|$etc9_exp34|$etc9_exp35|$etc9_exp36|$etc9_exp37|"; 
$sql9 = " update $write_table set wr_9 = '$wr_9' where wr_id = '$wr_id' ";
sql_query($sql9);


$sql10 = " update $write_table set wr_10 = '$wr_10' where wr_id = '$wr_id' ";
sql_query($sql10);


$sql11 = " update $write_table set wr_11 = '$wr_11' where wr_id = '$wr_id' ";
sql_query($sql11);

$sql12 = " update $write_table set wr_12 = '$wr_12' where wr_id = '$wr_id' ";
sql_query($sql12);


$wr_13 = "$etc13_exp00|$etc13_exp01|$etc13_exp02|$etc13_exp03|$etc13_exp04|$etc13_exp05|$etc13_exp06|$etc13_exp07|$etc13_exp08|$etc13_exp09|$etc13_exp10"; 
$sql13 = " update $write_table set wr_13 = '$wr_13' where wr_id = '$wr_id' ";
sql_query($sql13);


$sql14 = " update $write_table set wr_14 = '$wr_14' where wr_id = '$wr_id' ";
sql_query($sql14);

$sql15 = " update $write_table set wr_15 = '$wr_15' where wr_id = '$wr_id' ";
sql_query($sql15);

$sql16 = " update $write_table set wr_16 = '$wr_16' where wr_id = '$wr_id' ";
sql_query($sql16);

$sql17 = " update $write_table set wr_17 = '$wr_17' where wr_id = '$wr_id' ";
sql_query($sql17);

$sql18 = " update $write_table set wr_18 = '$wr_18' where wr_id = '$wr_id' ";
sql_query($sql18);

$sql19 = " update $write_table set wr_19 = '$wr_19' where wr_id = '$wr_id' ";
sql_query($sql19);

$sql20 = " update $write_table set wr_20 = '$wr_20' where wr_id = '$wr_id' ";
sql_query($sql20);


$sql21 = " update $write_table set wr_21 = '$wr_21' where wr_id = '$wr_id' ";
sql_query($sql21);


$wr_22 = "$etc22_exp00|$etc22_exp01|$etc22_exp02|$etc22_exp03|$etc22_exp04|$etc22_exp05|$etc22_exp06|$etc22_exp07|$etc22_exp08|$etc22_exp09|$etc22_exp10|$etc22_exp11|$etc22_exp12|$etc22_exp13|$etc22_exp14|$etc22_exp15|$etc22_exp16|$etc22_exp17|$etc22_exp18|$etc22_exp19|$etc22_exp20|$etc22_exp21|$etc22_exp22|$etc22_exp23|$etc22_exp24|$etc22_exp25|$etc22_exp26|$etc22_exp27|$etc22_exp28|$etc22_exp29|$etc22_exp30"; 
$sql22 = " update $write_table set wr_22 = '$wr_22' where wr_id = '$wr_id' ";
sql_query($sql22);


$sql23 = " update $write_table set wr_23 = '$wr_23' where wr_id = '$wr_id' ";
sql_query($sql23);

$sql24 = " update $write_table set wr_24 = '$wr_24' where wr_id = '$wr_id' ";
sql_query($sql24);


$sql25 = " update $write_table set wr_25 = '$wr_25' where wr_id = '$wr_id' ";
sql_query($sql25);





// 게시판 테이블에 신고 항목 자동 추가
if (is_null($write[wr_report])) {
    $sql = "alter table $write_table add wr_report tinyint default '0' not null";
    sql_query($sql, false);
}

// 게시판 테이블에 관련글 항목 자동 추가
if (is_null($write[wr_related])) {
    $sql = "alter table $write_table add wr_related varchar(255) default '' not null";
    sql_query($sql, false);
}




$data_path = $g4[path]."/data/file/$bo_table";
$thumb_path = $data_path.'/thumb';

if ($_FILES[bf_file][name][0])
{
    $row = sql_fetch(" select * from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '0' ");

    $file = $data_path .'/'. $row[bf_file];
    if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file)) {
        $size = getimagesize($file);
        if ($size[2] == 1)
            $src = imagecreatefromgif($file);
        else if ($size[2] == 2)
            $src = imagecreatefromjpeg($file);
        else if ($size[2] == 3)
            $src = imagecreatefrompng($file);
        else
            break;

        $rate = $thumb_width / $size[0];
        $height = (int)($size[1] * $rate);

        @unlink($thumb_path.'/'.$wr_id);
        // 계산된 높이가 설정된 높이보다 작다면
        if ($height < $thumb_height)
            $dst = imagecreatetruecolor($thumb_width, $height);
        else
            $dst = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $thumb_width, $height, $size[0], $size[1]);
        imagejpeg($dst, $thumb_path.'/'.$wr_id, $thumb_quality);
        chmod($thumb_path.'/'.$wr_id, 0606);
    }
}


if ($mark == 1){
function waterMark($fileInHD, $wmFile, $transparency = 65, $jpegQuality = 90, $margin = 5) { 
 $wmImg  = imageCreateFromGIF($wmFile); 
 $jpegImg = imageCreateFromJPEG($fileInHD); 
$wmX=imageSX($jpegImg) - imageSX($wmImg); 
$wmY=imageSY($jpegImg) - imageSY($wmImg); 
 imageCopyMerge($jpegImg, $wmImg, $wmX, $wmY, 0, 0, imageSX($wmImg), imageSY($wmImg), $transparency); 
 ImageJPEG($jpegImg, $fileInHD, $jpegQuality); 
} 
//##add060613 이미지합성함수 

$data_path = $g4[path]."/data/file/$bo_table"; 
$thumb_path = $data_path.'/thumb'; 

    $sql=" select * from $g4[board_file_table] where  bo_table = '$bo_table' and wr_id = '$wr_id' order by bf_no asc"; 
    $results = sql_query($sql); 
    for ($i=0; $row=sql_fetch_array($results); $i++)  { 
$file = $data_path .'/'. $row[bf_file]; 


if ($_FILES[bf_file][name][$i]){ 
waterMark($file,$board_skin_path."/img/watermark.gif");  // 요거 추가됨 윈본이미지우측하단에 로고를 붙이자 
} 


if ($i==0 && $_FILES[bf_file][name][0]){ 
    if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file))    { 
        $size = getimagesize($file); 
        if ($size[2] == 1) 
            $src = imagecreatefromgif($file); 
        else if ($size[2] == 2) 
            $src = imagecreatefromjpeg($file); 
        else if ($size[2] == 3) 
            $src = imagecreatefrompng($file); 

        $rate = $board[bo_1] / $size[0]; 
        $height = (int)($size[1] * $rate); 

        @unlink($thumb_path.'/'.$wr_id); 
        $dst = imagecreatetruecolor($board[bo_1], $height); 
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $board[bo_1], $height, $size[0], $size[1]); 
        imagepng($dst, $thumb_path.'/'.$wr_id, $board[bo_2]); 
        chmod($thumb_path.'/'.$wr_id, 0606); 
} 
} 
    }}

// 관련글 업데이트
if ($board[bo_use_related]) {
    sql_query("update $write_table set wr_related = '$wr_related' where wr_id = '$wr_id'");
}


//지업로더
if ($w == ''){
    $wr_id_code=abs(ip2long($_SERVER['REMOTE_ADDR']));
    if($wr_id_code >= 2147483647)
        $wr_id_code=substr($wr_id_code,-9);

    $sql = " update g4_board_file set wr_id = '$wr_id' where bo_table = '$bo_table' and wr_id = '$wr_id_code'";
    sql_query($sql);
}



?>