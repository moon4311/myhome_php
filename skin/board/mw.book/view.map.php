<?php
$_x = $view['wr_16'];   //지도 x좌표
$_y = $view['wr_17'];   //지도 y좌표
$_w=796;                //지도창 넓이
$_h=448;                //지도창 높이

$nmkey="키값";  
    // https://dev.naver.com/openapi/register ==> 네이버홈피에서 사용자url의 키값을 발급받아 적어시면됩니다.
    // 키값이 입력되어야 지도가 나타납니다.


$add = $view['wr_10'];        //지도좌표 자동으로 찿을 주소
$oneroom = $view[wr_subject];    //지도 마크지점에 나타낼 풍선말(지점)
$sub = $view[wr_4];    //지도 마크지점에 나타낼 풍선말(지점)

if(!$_x || !$_y) {
   if($add != null) {             
      $out = "GET /api/geocode.php?key=".urlencode($nmkey)."&coord=tm128&query=".urlencode($add);
      $fp = fsockopen("openapi.map.naver.com", 80);
  
      $mapbody = "";
      $mxp = 0;
      $myp = 0;
  
      if (!$fp) {
          echo "정확한 주소를 입력하세요<br />\n";
      } else {
          $out .= " HTTP/1.1\r\n";
          $out .= "Host: openapi.map.naver.com\r\r\n";
          $out .= "Connection: Close\r\n\r\n";

          $rel = fwrite($fp, $out);
          while (!feof($fp)) {
                $mapbody .= fgets($fp, 128)."*";
          }

          fclose($fp);
          $mp=explode("*", $mapbody);
          $mxp=trim($mp[13]);
          $myp=trim($mp[14]);
          $_x1=explode("<x>", $mxp);
          $_x2=explode("</x>", $_x1[1]);
          $_x=$_x2[0];
          $_y1=explode("<y>", $myp);
          $_y2=explode("</y>", $_y1[1]);
          $_y=$_y2[0];
      }
   }
}
   if(!$_x || !$_y) { 
       $_x = 309947;
       $_y = 552093; 
       echo "<div style='font-size:20px; font-weight:normal; font-family:돋움; color:red; line-height:140%;'><b>주소와 지도좌표가 정확하지 않습니다. 확인후 좌표를 입력하세요</b></div>";
   }
?>

<SCRIPT type="text/javascript" src="http://openapi.map.naver.com/js/naverMap.naver?key=<?=$nmkey?>"></SCRIPT>

<div id='mapContainer' style='width:<?=$_w?>px; height:<?=$_h?>px; border:#ffcccb solid 0px;'></div>

<SCRIPT LANGUAGE="JavaScript">
<!--
	var oMap = new NMap(document.getElementById('mapContainer'),<?=$_w?>,<?=$_h?>);
	oMap.setCenterAndZoom(new NPoint(<?=$_x?>,<?=$_y?>),1);

	var zoom =new NZoomControl();
	zoom.setAlign("right");
	zoom.setValign("top");
	oMap.addControl(zoom);

        var mark = new NMark(NPoint(<?=$_x?>,<?=$_y?>), new NIcon('<?=$board_skin_path?>/img/pin.png',new NSize(28,37),new NSize(28,37)));
        oMap.addOverlay(mark);

        var infowinn = new NInfoWindow();
        infowinn.set(NPoint(<?=$_x?>,<?=$_y?>), '<div style="font-size:20px; font-weight:normal; font-family:돋움; color:#fbf5e4; line-height:140%; margin-top:10px; padding:8px; background-color:#000000; border:#fbf5e4 solid 1px;"><b><?=$sub?></b></div>');
        oMap.addOverlay(infowinn);
        infowinn.showWindow();

        var infowin = new NInfoWindow();
        NEvent.addListener(mark, "mouseover", function(pos) {
            infowin.set(pos, '<div style="font-size:20px; font-weight:normal; font-family:돋움; color:#6e532e; line-height:140%; margin-top:10px; padding:8px; background-color:#f8f8f8; border:#c2b19a solid 1px;"><b><?=$oneroom?></b></div>');
            infowin.showWindow()
        });
        NEvent.addListener(mark, "mouseout", function() {
            infowin.hideWindow();
        });
        oMap.addOverlay(infowin);

//-->
</SCRIPT>

