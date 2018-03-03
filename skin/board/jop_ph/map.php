<?
// ������ ��
$map_width = 630;

// ������ ����
$map_height = 400;

// ������ ���� 1~11 ������ �ڿ���. 1�� ����� ���� ������ Ȯ��
$map_zoom = 2;

// ���̹� ����api Ű��
$map_key = "key=eb27c940e5e3dccae9d52965065541f4" ;

// ���� ���� �ּ�
$address = substr($view[wr_3], 8); // 3�� ���� �ʵ忡 ���� �Ǿ� �ִ� �ּ��� �����ȣ�� ����
$adrress1 = str_replace("|","",$address); // | �±� ����
$map_query = str_replace(" ","%20",$adrress1); // 3�� ���� �ʵ忡 ���� �Ǿ� �ִ� �ּ��� ������ �����Ͽ� ������ ����

// ������� �ּ� �˻� xml �Ľ�
$pquery = $map_key. "&query=". $map_query;
    $fp = fsockopen ("maps.naver.com", 80, $errno, $errstr, 30); 
    if (!$fp) { 
        echo "$errstr ($errno)"; 
    } else { 
        fputs($fp, "GET /api/geocode.php?"); 
        fputs($fp, $pquery); 
        fputs($fp, " HTTP/1.1\r\n"); 
        fputs($fp, "Host: maps.naver.com\r\n"); 
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
<SCRIPT LANGUAGE="JavaScript" src="http://maps.naver.com/js/naverMap.naver?key=eb27c940e5e3dccae9d52965065541f4"></SCRIPT>
<!-- ���̹� ���� Ű �� �� -->


<table width="605" cellpadding="0" cellspacing="3" bgcolor="f4f4f4" >
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
	var icon = new NIcon("<?=$board_skin_path?>/img/map_icon.gif", new NSize(50,50)); // ������������ ������ ����ð�(������ ��ġ�� ǥ�õǴ� �������Դϴ�) �̹��� �ּ� �� ũ�⸦ �������ּ���
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