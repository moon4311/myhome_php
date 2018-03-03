<?php

if(defined('_GNUBOARD_') == false) exit('개별페이지 접근불가');


$g4[guploader_table]    = $g4[table_prefix]."g4_guploader";
@mkdir("{$g4['path']}/data/file/{$board['bo_table']}/thumb", 0707);
@chmod("{$g4['path']}/data/file/{$board['bo_table']}/thumb", 0707);

$DEFAULT = "{$board_skin_path}/list.skin.php";
//if(is_file($DEFAULT) == false) $DEFAULT = $board_skin_path . '/list.skin.php';
if(is_file($DEFAULT) == false) $DEFAULT = $board_skin_path . '/list.all.skin.php';
/*썸네일부분 리스트에서 직접수정
list($thumb_width, $thumb_height) = preg_split('/[^0-9]/', $board['bo_2']);
if((int)$thumb_width < 1) $thumb_width = 100;
if((int)$thumb_height < 1) $thumb_height = 75;

list($thumb_width, $thumb_height) = preg_split('/[^0-9]/', $board['bo_3']);
if((int)$thumb_width < 1) $thumb_width = 100;
if((int)$thumb_height < 1) $thumb_height = 75;

if((int)$board['bo_4'] < 1) $list_content = 200;
else $list_content = $board['bo_4'];
*/
function selected($array, $select = null)
{
	$return = null;
	foreach($array as $value)
	{
		$option = explode(':', $value . ':' . $value);
		if($option['1'] == $select)
		{
			$return .= "<option value=\"{$option['1']}\" selected=\"selected\">{$option['0']}</option>";
		}
		else
		{
			$return .= "<option value=\"{$option['1']}\">{$option['0']}</option>";
		}
	}
	return $return;
}

function convert($str)
{
	$str = preg_replace('/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i', '<script type="text/javascript">doc_write(obj_movie("$1://$2.$3"));</script>', $str);
	$str = preg_replace('/\[\<a\s.*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(swf)\".*\<\/a\>\]/i', '<script type="text/javascript">doc_write(flash_movie("$1://$2.$3"));</script>', $str);
	$str = preg_replace('/\[\<a\s*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(gif|png|jpg|jpeg|bmp)\"\s*[^\>]*\>[^\s]*\<\/a\>\]/i', '<img id=\"target_resize_image[]\" src=\"$1://$2.$3\" onclick=\"image_window(this);\" alt=\"0\" />', $str);
	return $str;
}

function content($string, $byte = 0, $suffix = '...')
{
	$return = strip_tags($string);
	$return = preg_replace('/(\&nbsp\;)/i', ' ', $return);
	$return = preg_replace('/\<br?.*\>/i', ' ', $return);
	$return = preg_replace('/[\t\r?\n]/', ' ', $return);
	$return = preg_replace('/[\s]{2,}/', ' ', $return);
	$return = trim($return);
	$return = cut_str($return, $byte, $suffix);
	return $return;
}

function thumbnail($exist, $creat, $width, $height, $fail = null)
{
	if(is_file($exist) == true && in_array(strtolower(end(explode('.', $exist))), array('gif', 'jpg', 'jpeg', 'png')) == true)
	{
		if(file_exists($creat) == false)
		{
			list($img['width'], $img['height'], $img['type']) = getimagesize($exist);
			if($img['width'] > $width || $img['height'] > $height)
			{
				if($img['width'] > $img['height'])
				{
					$dst['width'] = $width;
					$dst['height'] = ceil(($width / $img['width']) * $img['height']);
				}
				else if($img['height'] > $img['width'])
				{
					$dst['width'] = ceil(($height / $img['height']) * $img['width']);
					$dst['height'] = $height;
				}
				else
				{
					$dst['width'] = $width;
					$dst['height'] = $height;
				}
			}
			else
			{
				$dst['width'] = $img['width'];
				$dst['height'] = $img['height'];
			}
			$dst['width'] = $width;
			$dst['height'] = $height;
			if($width > $dst['width'])
			{
				$dst['x'] = ceil(($width - $dst['width']) / 2);
			}
			else
			{
				$dst['x'] = 0;
			}
			if($height > $dst['height'])
			{
				$dst['y'] = ceil(($height - $dst['height']) / 2);
			}
			else
			{
				$dst['y'] = 0;
			}
			switch($img['type'])
			{
				case '1' : 
					$src['image'] = imagecreatefromgif($exist);
					$dst['image'] = imagecreate($width, $height);
					break;
				case '2' : 
					$src['image'] = imagecreatefromjpeg($exist);
					$dst['image'] = imagecreatetruecolor($width, $height);
					break;
				case '3' : 
					$src['image'] = imagecreatefrompng($exist);
					$dst['image'] = imagecreatetruecolor($width, $height);
					break;
			}
			$src['width'] = imagesx($src['image']);
			$src['height'] = imagesy($src['image']);
			$dst['color'] = imagecolorallocate($dst['image'], 255, 255, 255);
			imagefilledrectangle($dst['image'], 0, 0, $width, $height, $dst['color']);
			imagecopyresampled($dst['image'], $src['image'], $dst['x'], $dst['y'], 0, 0, $dst['width'], $dst['height'], $src['width'], $src['height']);
			switch($img['type'])
			{
				case '1' : 
					imagegif($dst['image'], $creat);
					break;
				case '2' : 
					imagejpeg($dst['image'], $creat, 100);
					break;
				case '3' : 
					imagepng($dst['image'], $creat, 100);
					break;
			}
			imagedestroy($src['image']);
			imagedestroy($dst['image']);
		}
		$return = "<img src=\"{$creat}\" alt=\"\" />";
	}
	else
	{
		$return = $fail;
	}
	return $return;
}



// 관련글 얻기.. 080429, curlychoi
function related($related, $count, $field="wr_id, wr_subject, wr_content")
{
    global $bo_table, $write_table, $g4, $wr_id;

    if (!trim($related)) return;

    $sql_where = "";
    $related = explode(",", $related);
    foreach ($related as $rel) {
        $rel = trim($rel);
        if ($rel) {
            $rel = addslashes($rel);
            if ($sql_where) {
                $sql_where .= " or ";
            }
            $sql_where .= " (instr(wr_subject, '$rel') or instr(wr_content, '$rel')) ";
        }
    }
    $sql_where .= " and wr_id <> '$wr_id' ";
    $sql = "select $field from $write_table where wr_is_comment = 0 and ($sql_where) order by wr_num ";
    $qry = sql_query($sql);

    $list = array();
    $i = 0;
    while ($row = sql_fetch_array($qry)) {
        $list[] = $row;
        if (++$i >= $count) {
            break;
        }
    }
    return $list;
}

  if ($board[bo_hotlist]) { 
switch ($board[bo_hotlist]) {
    case "1": $hot_start = ""; $hot_title = "실시간"; break;
    case "2": $hot_start = date("Y-m-d H:i:s", $g4[server_time]-60*60*24*7); $hot_title = "주간"; break;
    case "3": $hot_start = date("Y-m-d H:i:s", $g4[server_time]-60*60*24*30); $hot_title = "월간"; break;
    case "4": $hot_start = date("Y-m-d H:i:s", $g4[server_time]-60*60*24); $hot_title = "일간"; break;
}
$sql_between = 1;
if ($board[bo_hotlist] > 1) {
    $sql_between = " wr_datetime between '$hot_start' and '$g4[time_ymdhis]' ";
}
$sql = "select * 
          from $write_table 
         where wr_is_comment = 0 
           and $sql_between
         order by wr_{$board[bo_hotlist_basis]} desc 
         limit 10";
$qry = sql_query($sql);
}

// syntax highlight 
function _preg_callback($m)
        {
            $str = str_replace(array("<br/>", "&nbsp;"), array("\n", " "), $m[1]);
            return "<pre class='brush:php;'>$str</pre>";
        }

if (!$board[bo_report_id])
    $board[bo_report_id] = "webmaster,";

// 코멘트 첨부된 파일을 얻는다. (배열로 반환)
function get_comment_file($bo_table, $wr_id)
{
    global $g4, $g4, $qstr;

    $file["count"] = 0;
    $sql = " select * from $g4[comment_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' order by bf_no ";
    $result = sql_query($sql);
    while ($row = sql_fetch_array($result))
    {
        $no = $row[bf_no];
        $file[$no][href] = "./download.php?bo_table=$bo_table&wr_id=$wr_id&no=$no" . $qstr;
        $file[$no][download] = $row[bf_download];
        // 4.00.11 - 파일 path 추가
        $file[$no][path] = "$g4[path]/data/file/$bo_table";
        //$file[$no][size] = get_filesize("{$file[$no][path]}/$row[bf_file]");
        $file[$no][size] = get_filesize($row[bf_filesize]);
        //$file[$no][datetime] = date("Y-m-d H:i:s", @filemtime("$g4[path]/data/file/$bo_table/$row[bf_file]"));
        $file[$no][datetime] = $row[bf_datetime];
        $file[$no][source] = $row[bf_source];
        $file[$no][bf_content] = $row[bf_content];
        $file[$no][content] = get_text($row[bf_content]);
        //$file[$no][view] = view_file_link($row[bf_file], $file[$no][content]);
        $file[$no][view] = view_file_link($row[bf_file], $row[bf_width], $row[bf_height], $file[$no][content]);
        $file[$no][file] = $row[bf_file];
        // prosper 님 제안
        //$file[$no][imgsize] = @getimagesize("{$file[$no][path]}/$row[bf_file]");
        $file[$no][image_width] = $row[bf_width] ? $row[bf_width] : 640;
        $file[$no][image_height] = $row[bf_height] ? $row[bf_height] : 480;
        $file[$no][image_type] = $row[bf_type];
        $file["count"]++;
    }

    return $file;
}
?>