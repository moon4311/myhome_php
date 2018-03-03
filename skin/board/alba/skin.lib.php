<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

function get_nc_category_option($bo_table, $sca="")
{
    global $g4, $board;
    
    $arr    = explode("|", $board[bo_category_list]);
    $arr1   = explode("|", $board[bo_10]);
    $key    = array_search($sca, $arr);
    $cate   = explode("^", $arr1[$key]);
    
    for ($i=0; $i<count($cate); $i++) {
        if (trim($cate[$i])) {
            $str .= "<option value='$cate[$i]'>$cate[$i]</option>\n";
        }
    }
    
    return $str;
}
?>
