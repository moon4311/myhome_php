<?
if (!defined("_GNUBOARD_")) exit;

// 에디터 체크
function image_editor($path, $html, $mode)
{

    $k = "0";

    // POST 값을 받을 땐 변경 되기 때문에 다시 치환을.
    $html = str_replace("\\", "\"", $html);

    // geditor
    if ($path && $html) {

        preg_match_all("/\/data\/geditor\/(.*)\"/Uis", $html, $matches);
    
        for ($i=0; $i<count($matches[1]); $i++) {

            $url = $path."/data/geditor/".$matches[1][$i];

            if ($k <= '0' && preg_match("/\.(jp[e]?g|gif|png)$/i", $url) && file_exists($url)) {
    
                $k++;

                $img = $url;

                $file = substr($matches[1][$i], 5);
    
            } else {
    
                // pass
    
            }
    
        }

    }

    // smarteditor
    if (!$file) {

        preg_match_all("/\/data\/smarteditor\/(.*)\"/Uis", $html, $matches);
    
        for ($i=0; $i<count($matches[1]); $i++) {

            $url = $path."/data/smarteditor/".$matches[1][$i];

            if ($k <= '0' && preg_match("/\.(jp[e]?g|gif|png)$/i", $url) && file_exists($url)) {
    
                $k++;

                $img = $url;

                $file = substr($matches[1][$i], 11);
    
            } else {
    
                // pass
    
            }
    
        }

    }

    // cheditor4
    if (!$file) {

        preg_match_all("/\/data\/cheditor4\/(.*)\"/Uis", $html, $matches);
    
        for ($i=0; $i<count($matches[1]); $i++) {

            $url = $path."/data/cheditor4/".$matches[1][$i];

            if ($k <= '0' && preg_match("/\.(jp[e]?g|gif|png)$/i", $url) && file_exists($url)) {
    
                $k++;

                $img = $url;

                $file = substr($matches[1][$i], 5);
    
            } else {
    
                // pass
    
            }
    
        }

    }

    // cheditor
    if (!$file) {

        preg_match_all("/\/data\/cheditor\/(.*)\"/Uis", $html, $matches);
    
        for ($i=0; $i<count($matches[1]); $i++) {

            $url = $path."/data/cheditor/".$matches[1][$i];

            if ($k <= '0' && preg_match("/\.(jp[e]?g|gif|png)$/i", $url) && file_exists($url)) {
    
                $k++;

                $img = $url;

                $file = substr($matches[1][$i], 5);
    
            } else {
    
                // pass
    
            }
    
        }

    }

    // 있다면
    if ($file) {
    
        if ($mode == 'type') {
    
            if ($file) {
    
                $q = "1";
    
            } else {
    
                $q = "0";
            }
    
        }
    
        else if ($mode == 'file') {
    
            if ($file) {
    
                $q = $file;
    
            } else {
    
                $q = "";
            }
    
        } else {
    
            if ($file) {
    
                $q = $img;
    
            } else {
    
                $q = "";
    
            }
    
        }
    
        return $q;

    } else {
    // 없다면

        return;

    }

}

// 이미지 체크
function image_path($bo_table, $datetime, $file, $mode)
{

    global $g4;

    $file_path = $g4['path']."/data/file/".$bo_table."/".$file;
    $file_mode = "false";

    // 경로
    if ($mode == 'path') {

        return $file_path;

    } else {
    // 모드

        return $file_mode;

    }

}

// 이미지 저장
function image_save($source, $file, $mode=false)
{

    global $g4;

    // 저장 경로 지정
    $tmp_dir = $g4['path']."/data/tmp/board";

    // 디렉토리가 없다면 생성합니다. (퍼미션도 변경하구요.)
    @mkdir("$tmp_dir", 0707);
    @chmod("$tmp_dir", 0707);

    // 원본파일
    $source = get_text($source);

    // file type
    if (!preg_match("/\.(jp[e]?g|gif|png)$/i", $file)) {

        return false;

    }

    // 파일명 선언
    $tmp_filename = $file;

    // 쓰기파일
    $target = $tmp_dir . "/" . $tmp_filename;

    // 읽기, 쓰기
    $rf = @fopen($source, 'r');
    $wf = @fopen($target, 'w');

    // error reading or opening file
    if ($rf == false || $wf == false) {

        return false;

    }

    while (!feof($rf)) {

        // 'Download error: Cannot write to file ('.$target.')';
        if (fwrite($wf, fread($rf, 1024)) == false) {

            return false;

        }

    }

    @fclose($rf);
    @fclose($wf);
    @chmod($wf, 0606);

    // 파일 사이즈
    $tmp_size = @filesize($target);

    // 파일 정보
    $tmp_type = @getimagesize($target);

    // 이미지 파일이 있다면.
    if ($tmp_size && ($tmp_type[2] == '1' || $tmp_type[2] == '2' || $tmp_type[2] == '3')) {

        return $target;

    } else {
    // 삭제

        @unlink($target);

    }

}

// 썸네일 생성
function image_thumb($imgWidth, $imgHeight, $imgSource, $imgThumb='', $iscut=false)
{

    if (!$imgThumb) {

        $imgThumb = $imgSource;

    }

    $size = getimagesize($imgSource);

    if ($size[2] == 1) {

        $source = imagecreatefromgif($imgSource);

    }

    else if ($size[2] == 2) {

        $source = imagecreatefromjpeg($imgSource);

    }

    else if ($size[2] == 3) {

        $source = imagecreatefrompng($imgSource);

    } else {

        continue;

    }

    $rate = $imgWidth / $size[0];
    $height = (int)($size[1] * $rate);

    if ($height < $imgHeight) {

        $target = @imagecreatetruecolor($imgWidth, $height);

    } else {

        $target = @imagecreatetruecolor($imgWidth, $imgHeight);

    }

    @imagecopyresampled($target, $source, 0, 0, 0, 0, $imgWidth, $height, $size[0], $size[1]);
    @imagejpeg($target, $imgThumb, 100);
    @chmod($imgThumb, 0606); // 추후 삭제를 위하여 파일모드 변경

}

// 파일 확장자
function image_filetype($source)
{

    // .으로 배열처리
    $file = explode('.', $source); // test.jpg.bmp.gif

    // 마지막 배열 구하기
    $file = array_pop($file); // -> gif

    // 확장자 체크
    if (preg_match("/(jpg)/i", $file)) {

        $filetype = "jpg";

    }

    else if (preg_match("/(jpeg)/i", $file)) {

        $filetype = "jpeg";

    }

    else if (preg_match("/(gif)/i", $file)) {

        $filetype = "gif";

    }

    else if (preg_match("/(png)/i", $file)) {

        $filetype = "png";

    }

    else if (preg_match("/(bmp)/i", $file)) {

        $filetype = "bmp";

    } else {

        //return true;
        $filetype = "jpg";

    }

    // .jpg 형식으로 출력.
    return ".".$filetype;

}

// 이미지 뷰 (이미지, 플래쉬, 동영상)
function image_view($datetime, $file, $width, $height, $bo_table, $bo_image_width)
{

    global $g4;
    static $ids;

    if (!$file) {

        return;

    }

    $ids++;

    // 파일의 폭이 게시판설정의 이미지폭 보다 크다면 게시판설정 폭으로 맞추고 비율에 따라 높이를 계산
    if ($width > $bo_image_width && $bo_image_width) {

        $rate = $bo_image_width / $width;
        $width = $bo_image_width;
        $height = (int)($height * $rate);

    }

    // 폭이 있는 경우 폭과 높이의 속성을 주고, 없으면 자동 계산되도록 코드를 만들지 않는다.
    if ($width) {

        $attr = " width='$width' height='$height' ";

    } else {

        $attr = "";

    }

    // 원본
    $source = image_path($bo_table, $datetime, $file, "path");

    if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file)) {

        return "<img src='{$source}' name='target_resize_image[]' onclick='image_window(this);' style='cursor:pointer;'>";

    }

    else if (preg_match("/\.(swf)$/i", $file)) {

        return "<script>doc_write(flash_movie('{$source}', '_g4_{$ids}', '$width', '$height', 'transparent'));</script>";

    }

    else if (preg_match("/\.(wmv|mp3|wma)$/i", $file)) {

        //return "<embed src='$g4[path]/data/file/$board[bo_table]/$file' $attr></embed>";
        return "<script>doc_write(obj_movie('".image_path($bo_table, $datetime, $file, "path")."', '_g4_{$ids}', '$width', '$height'));</script>";

    } else {

        return;

    }

}
?>