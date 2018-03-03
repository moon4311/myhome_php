<?
// ������ ��
$map_width = 550;

// ������ ����
$map_height = 280;

// ������ ���� 1~11 ������ �ڿ���. 1�� ����� ���� ������ Ȯ��
$map_zoom = 2;

// ���̹� ����api Ű��
$map_key = "key=5806829e51f370f6a4cc03941f93d5f9" ;

// ���� ���� �ּ�
$address = substr($view[wr_3], 8); // 3�� ���� �ʵ忡 ���� �Ǿ� �ִ� �ּ��� �����ȣ�� ����
$adrress1 = str_replace("|","",$address); // | �±� ����
$map_query = str_replace(" ","%20",$adrress1); // 3�� ���� �ʵ忡 ���� �Ǿ� �ִ� �ּ��� ������ �����Ͽ� ������ ����

// euc-kr�� ��ȯ 
$map_cquery =iconv("utf-8","euc-kr","$map_query");   

// ������� �ּ� �˻� xml �Ľ�
$pquery = $map_key. "&query=". $map_query;
    $fp = fsockopen ("map.naver.com", 80, $errno, $errstr, 30); 
    if (!$fp) { 
        echo "$errstr ($errno)"; 
    } else { 
        fputs($fp, "GET /api/geocode.php?"); 
        fputs($fp, $pquery); 
        fputs($fp, " HTTP/1.1\r\n"); 
        fputs($fp, "Host: map.naver.com\r\n"); 
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
// ������� �ּ� �˻� xml �Ľ�


// ������� ��ǥ�� ������ ���
$map_x_point_1=explode("<x>", $mapbody); 
$map_x_point_2=explode("</x>", $map_x_point_1[1]); 
$map_x_point=$map_x_point_2[0]; 

$map_y_point_1=explode("<y>", $mapbody); 
$map_y_point_2=explode("</y>", $map_y_point_1[1]); 
$map_y_point=$map_y_point_2[0]; 
// ������� ��ǥ�� ������ ���


?>


<!-- ���̹� ���� Ű �� -->
<SCRIPT LANGUAGE="JavaScript" src="http://map.naver.com/js/naverMap.naver?key=5806829e51f370f6a4cc03941f93d5f9"></SCRIPT>
<!-- ���̹� ���� Ű �� �� -->


<table width="550" cellpadding="0" cellspacing="3" bgcolor="f4f4f4" >
	<tr>
		<td bgcolor="ffffff">
			<table width="100%" cellpadding="0" cellspacing="1" bgcolor="cccccc" >
				<tr>
					<td height="1" bgcolor="61AAC4">
					</td>
				</tr>
				<tr>
					<td bgcolor="ffffff">
						<table width="100%" cellpadding="3" cellspacing="1" bgcolor="eeeeee" >
							<tr bgcolor="ffffff">
								<td>
<!-- ���� ��� -->
<div id='mapContainer'></div> 
<!-- ���� ��� �� -->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<SCRIPT LANGUAGE="JavaScript">
<!--
	var x_point = <? echo $map_x_point; ?>;
	var y_point = <? echo $map_y_point; ?>;
	var icon = new NIcon("<?=$board_skin_path?>/img/map_icon.gif", new NSize(22,22)); // ������������ ������ ����ð�(������ ��ġ�� ǥ�õǴ� �������Դϴ�) �̹��� �ּ� �� ũ�⸦ �������ּ���
	var loc_Point = new NPoint(x_point,y_point);  // ����Ʈ ǥ��
	var map_mark = new NMark(loc_Point, icon ); // ������ ������ ǥ��
	var mapObj = new NMap(document.getElementById('mapContainer'),<? echo $map_width; ?>,<? echo $map_height; ?>); // ����â
	var infowin = new NInfoWindow();
	var zoom = new NZoomControl();
	var zoomlevel = <? echo $map_zoom; ?>

	mapObj.addOverlay(map_mark); // ������ ��ũǥ��
	mapObj.setCenterAndZoom(loc_Point,zoomlevel); // ���� �߾�
	mapObj.addOverlay(infowin);
	zoom.setAlign("left"); // �� ���� ��ư ���ʿ� ��ġ
	zoom.setValign("bottom"); // �� ���� ��ư �Ʒ��� ��ġ
	// mapObj.enableWheelZoom();  ���� �ȿ��� �ٷ� �� ���� �����ϰ� �Ϸ��� �ּ��� Ǯ���ּ���
	mapObj.addControl(zoom);
//-->
</SCRIPT>