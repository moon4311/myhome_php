<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/plugin/board_group/lib.php");

// 메인 배너
$main_banner = array();

$main_banner[0][url] = "http://www.daum.net";
$main_banner[0][img] = "$mw_index_skin_main_path/img/daum.jpg";
$main_banner[0][tar] = "_blank";
$main_banner[1][url] = "http://www.naver.com";
$main_banner[1][img] = "$mw_index_skin_main_path/img/naver.jpg";
$main_banner[1][tar] = "_blank";
$main_banner[2][url] = "http://www.nate.com";
$main_banner[2][img] = "$mw_index_skin_main_path/img/nate.jpg";
$main_banner[2][tar] = "_blank";
$main_banner[3][url] = "http://www.yahoo.com";
$main_banner[3][img] = "$mw_index_skin_main_path/img/yahoo.jpg";
$main_banner[3][tar] = "_blank";
$main_banner[4][url] = "http://www.google.co.kr.com";
$main_banner[4][img] = "$mw_index_skin_main_path/img/google.jpg";
$main_banner[4][tar] = "_blank"; 
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style>
.image_list {overflow: hidden;position: relative;height: 150px; width: 600; border:1px solid #e1e1e1; cursor:pointer; clear:both;}
.image_list .images {position:absolute; display:none; }
ul, li {list-style:none; margin:0; padding:0; font-size:10pt; }
.ul_label {width:600px;cursor:pointer;border-bottom:1px solid #e1e1e1;}
.ul_label li {width:100px;float:left;border-right:1px solid #e1e1e1;padding:2px;}
.ul_label li.fir {border-left:1px solid #e1e1e1;}

.no_label {width:600px;cursor:pointer;}
.no_label li {width:30px;height:30px;float:left}


.ul_label li.labelOverClass {font-weight:bold;}
</style>
<script type="text/javascript">

<!--

/*function RollImage(json){
	this.current_img = 0;
	this.next_img = 1;

	this.list_area = e(json.list_area);
	this.image_list = this.list_area.getElementsByTagName("DIV");
	this.img_cnt = this.image_list.length-1;
	this.roll_time = json.roll_time;
	this.move_time = json.move_time;
	this.coord_x1 = 0;
	this.coord_x2 = this.list_area.offsetWidth;
	this.moveAt = json.moveAt;

	setRoll(this);
}
//이미지 롤링 기본 세팅하기
function setRoll(o){
	o.coord_x1 = 0;
	o.coord_x2 = o.list_area.offsetWidth;
	
	
	o.image_list[o.next_img].style.display = "block";
	o.image_list[o.next_img].style.left = o.coord_x2+"px";
	
	setTimeout(function(){imgMove(o)},o.roll_time);
}

//이미지를 움직이게 한다.
function imgMove(o){

	o.image_list[o.current_img].style.left = o.coord_x1 + "px";
	o.image_list[o.next_img].style.left = o.coord_x2 + "px";

	o.coord_x1 -= o.moveAt;
	o.coord_x2 -= o.moveAt;
	
	if(o.coord_x1 < (-1*o.list_area.offsetWidth) ) {
		o.current_img = o.next_img;
		o.next_img += 1;
		if(o.current_img == o.img_cnt) o.next_img = 0;
		clearTimeout(o.move_timer);
		o.roll_timer = setTimeout(function(){setRoll(o)},o.roll_time);
		return;
	}
	o.move_timer = setTimeout(function(){imgMove(o)},o.move_time);
}
*/

function RollImage(json){
	//이미지 롤링 설정값
	var config = {
		currentImg : 0,
		nextImg : 1,
		listArea : e(json.list_area),
		imageList : e(json.list_area).getElementsByTagName("DIV"),
		imgCnt : e(json.list_area).getElementsByTagName("DIV").length-1, //0부터 시작
		rollTime : json.roll_time,
		moveTime : json.move_time,
		coordX1 : 0,
		coordX2 : e(json.list_area).offsetWidth,
		coordY : e(json.list_area).offsetHeight,
		moveAt : json.moveAt,
		direction : json.direction,
		label : e(json.label),
		labelType : json.labelType
	};
	
	labelBind(config); //라벨(버튼) 바인드
	setRoll(config); //롤링 시작
	rollPause(config); //마우스 오버시 롤링 멈춤
	
	//이미지 롤링 기본 세팅하기
	function setRoll(c){
		c.coordX1 = 0;
		c.coordX2 = c.listArea.offsetWidth;
		c.coordY = c.listArea.offsetHeight;

		if(c.direction=="right" || c.direction=="down"){
			c.coordX2 = c.coordX2 * -1;
			c.coordY = c.coordY * -1;
		}
		
		c.imageList[c.nextImg].style.display = "block";
		setPosition(c);
		rollOver(c)
		//c.imageList[c.nextImg].style.left = c.coordX2+"px";
		
		c.rollTimer = setTimeout(function(){imgMove(c)},c.rollTime);
	};

	//이미지를 움직이게 한다.
	function imgMove(c){
		if(c.direction == "left" || c.direction == "right"){
			c.imageList[c.currentImg].style.left = c.coordX1 + "px";
			c.imageList[c.nextImg].style.left = c.coordX2 + "px";
		}else if(c.direction == "up" || c.direction == "down"){
			c.imageList[c.currentImg].style.top = c.coordX1 + "px";
			c.imageList[c.nextImg].style.top = c.coordY + "px";
		}
		//alert(c.imageList[c.nextImg].style.left);
		var moveAt = parseInt(c.moveAt);
		if (c.direction == "left"){
			c.coordX1 -= moveAt;
			c.coordX2 -= moveAt;
		}else if(c.direction == "right"){
			c.coordX1 += moveAt;
			c.coordX2 += moveAt;
		}else if(c.direction=="up"){
			c.coordX1 -= moveAt;
			c.coordY -= moveAt;
		}else if(c.direction=="down"){
			c.coordX1 += moveAt;
			c.coordY += moveAt;
		}
		
		//if(c.coordX1 < (-1*c.listArea.offsetWidth) ) {
		if( isNextImgRoll(c) ) {
			c.currentImg = c.nextImg;
			c.nextImg += 1;
			if(c.currentImg == c.imgCnt) c.nextImg = 0;
			clearTimeout(c.moveTimer);
			clearTimeout(c.rollTimer);
			setRoll(c);
			return;
		}
		c.moveTimer = setTimeout(function(){imgMove(c)},c.moveTime);
	};
	
	//다음 이미지 롤링 해야하는지 확인
	function isNextImgRoll(c){
		var d = c.direction;
		if(d=="left" && c.coordX2 < 0 ) return true;
		else if(d=="right" && c.coordX2 > 0) return true;
		else if(d=="up" && c.coordY < 0 ) return true;
		else if(d=="down" && c.coordY > 0) return true;

		return false
	};

	//롤링 방향에 따른 두번째 이미지 위치 좌표 설정
	function setPosition(c){
		var d = c.direction;
		if(d=="left") c.imageList[c.nextImg].style.left = c.listArea.offsetWidth+"px";
		else if(d=="right") c.imageList[c.nextImg].style.left = (-1 * c.listArea.offsetWidth) + "px";
		else if(d=="up") c.imageList[c.nextImg].style.top = c.listArea.offsetHeight + "px";
		else if(d=="down") c.imageList[c.nextImg].style.top = (-1 * c.listArea.offsetHeight) + "px";

		//alert(c.imageList[c.nextImg].style.left);
	};
	
	//onmouseover 시 움직임 멈춤
	function rollPause(c){
	//alert(c.listArea.onmouseover);
		c.listArea.onmouseover = function(){
			clearTimeout(c.rollTimer);
		}

		c.listArea.onmouseout = function(){
			//alert("c.listArea.onmouseout");
			setRoll(c);
		}
	};

	//라벨과 바인드
	function labelBind(c){
		if(c.label == null) return; //라벨을 사용하지 않으면 아래는 실행되지 않는다.
		var labels = c.label.getElementsByTagName(c.labelType);

		c.label.onmouseover = function(event){ //라벨영역에 마우스가 오면
			var evt = event || window.event;
			var t = evt.target || evt.srcElement;
			for(n in labels){ 
				if(labels[n] == t){
					//c.imageList[c.currentImg].style.display = "none";
					c.currentImg = parseInt(n);
					c.nextImg = parseInt(n)+1;
					if(c.currentImg == c.imgCnt) c.nextImg = 0;
					clearTimeout(c.rollTimer);
					viewImg(c);
					rollOver(c);
					break;
				}
			}
			//alert(event.srcElement)
		}
		
		c.label.onmouseout = function(event){
			var evt = event || window.event;
			var t = evt.target || evt.srcElement;
			for(n in labels){
				if(labels[n]==t){
					setRoll(c);
					break;
				}
			}
		}
	};

	//라벨 onmouseover 시 클래스 적용
	function rollOver(c){
		if(c.label == null) return;
		var els = c.label.getElementsByTagName(c.labelType);
		
		if(c.labelType == "img"){
			
			for(n in els){
				if(typeof els[n] == "object"){
					if(n == c.currentImg){
						els[n].src = els[n].getAttribute("oversrc");
					}else{
						els[n].src = els[n].getAttribute("outsrc");
					}
				}
			}
		}else{
			for(n in els){
				if(typeof els[n] == "object"){
					if(n == c.currentImg){
						var ocss = els[n].className;
						els[n].className = ocss+" "+els[n].getAttribute("overcss");
					}else{
						els[n].className = els[n].getAttribute("outcss");
					}
				}
			}
		}
	}

	//라벨에서 선택된 이미지 보이기
	function viewImg(c){
		//alert(c.currentImg);
		for(n=0; n<c.imgCnt+1; n++)	{
			c.imageList[n].style.display = "none";
		}
		
		c.imageList[c.currentImg].style.left = "0px";
		c.imageList[c.currentImg].style.top = "0px";
		c.imageList[c.currentImg].style.display = "block";
	};
}

function debug(t){
e("dis").innerHTML = t + "<br>";
}

//id값으로 객체 반환
function e(id){
	var o = document.getElementById(id);
	if(typeof o == undefined || o == null) { return null;}

	return o;
}
//-->
</script>
<!--위로 올라가는 배너 세팅 끝-->
<!--위로 올라가는 배너 -->
	    <script type="text/javascript">
    function mw_image_tab_over(n) {
        $(".tab_item").each(function () {
            $(this).css("display", "none");
        });
        $(".tab_menu").each(function () {
            $(this).css("font-weight", "normal");
            $(this).css("background", "none");
        });
        $("#tab_item"+n).css("display", "block");
        $("#tab_menu"+n).css("font-weight", "bold");
        $("#tab_menu"+n).css("background", "url(<?=$mw_index_skin_main_path?>/img/tab_image.png)");
    }
    mw_image_tab_over(1);
    </script>
<!--여기부터가 메인배너 이미지 갯수?-->
<table id="main" border=0 cellpadding=0 cellspacing=0>
<tr>
<td valign="top">
<div class="image_list" id="image_list_1" style=" margin-top:5; margin-right:0;">
	<div class="images" style="display:block"><a href='http://www.daum.net'><img src="<?=$main_banner[0][img]?>" id="main_banner_img0"></a></div>
	<div class="images"><a href='http://www.naver.com'><img src="<?=$main_banner[1][img]?>" id="main_banner_img1"></a></div>
	<div class="images"><a href='http://www.nate.com'><img src="<?=$main_banner[2][img]?>" id="main_banner_img2"></a></div>
	<div class="images"><a href='http://www.yahoo.com'><img src="<?=$main_banner[3][img]?>" id="main_banner_img3"></a></div>
	<div class="images"><a href='http://www.google.co.kr'><img src="<?=$main_banner[4][img]?>" id="main_banner_img4"></a></div>

</div>
<!--
<div class="image_list" id="image_list_2">
	<div class="images" style="display:block"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/google.jpg" /></div>
	<div class="images"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/daum.jpg" /></div>
	<div class="images"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/naver.jpg" /></div>
	<div class="images"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/nate.jpg" /></div>
	<div class="images"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/yahoo.jpg" /></div>
</div>
<ul class="ul_label" id="label_2">
	<li class="fir" overcss="labelOverClass" outcss="fir">구글<br />(google.co.kr)</li>
	<li overcss="labelOverClass" outcss="">다음<br />(daum.net)</li>
	<li overcss="labelOverClass" outcss="">네이버<br />(naver.com)</li>
	<li overcss="labelOverClass" outcss="">네이트<br />(nate.com)</li>
	<li overcss="labelOverClass" outcss="">야후<br />(kr.yahoo.com)</li>
</ul>

<p>&nbsp;</p>

<ul class="no_label" id="label_3">
	<li><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/1_on.jpg" oversrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/1_on.jpg" outsrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/1.jpg" /></li>
	<li><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/2.jpg" oversrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/2_on.jpg" outsrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/2.jpg" /></li>
	<li><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/3.jpg" oversrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/3_on.jpg" outsrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/3.jpg" /></li>
	<li><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/4.jpg" oversrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/4_on.jpg" outsrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/4.jpg" /></li>
	<li><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/5.jpg" oversrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/5_on.jpg" outsrc="http://cfs.tistory.com/custom/blog/68/684698/skin/images/5.jpg" /></li>
</ul>
<div class="image_list" id="image_list_3" width="200">
	<div class="images" style="display:block"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/google.jpg"/></div>
	<div class="images"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/daum.jpg"/></div>
	<div class="images"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/naver.jpg"/></div>
	<div class="images"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/nate.jpg" /></div>
	<div class="images"><img src="http://cfs.tistory.com/custom/blog/68/684698/skin/images/yahoo.jpg"/></div>
</div>
-->
<script type="text/javascript">
<!--
var j1 = {
	"list_area":"image_list_1",
	"moveAt":"50",
	"roll_time":"2000",
	"move_time":"100",
	"direction":"up",
	"label":"",
	labelType : ""
};
new RollImage(j1);
var j2 = {
	"list_area":"image_list_2",
	"moveAt":"100",
	"roll_time":"1000",
	"move_time":"100",
	"direction":"left",
	"label":"label_2",
	labelType : "li"
};
new RollImage(j2);
var j3 = {
	"list_area":"image_list_3",
	"moveAt":"100",
	"roll_time":"3000",
	"move_time":"100",
	"direction":"right",
	"label":"label_3",
	labelType : "img"
};
new RollImage(j3);
//oj1.setRoll();
//-->
</script>
<!--위로 올라가는 배너 끝-->

<!-- 중앙 컨텐츠 -->
<div class="latest-block" style=" margin-top:10; margin-bottom:5;" ><?=mw_latest_main("mw.index.main", "B31, B48", 13, 65, $mw[config][cf_index_cache])?></div>

<!--하단 배너 이미지 시작
    <div class="point_info">
        <div style="margin-left:5px;"><a href="http://www.suncheon.go.kr/kr/"><img src="<?=$mw_index_skin_main_path?>/img/bottom-banner4.jpg"></a></div>
        <div style="margin-left:10px;"><a href="www.scart.or.kr"><img src="<?=$mw_index_skin_main_path?>/img/bottom-banner8.jpg"></a></div>
		<div style="margin-left:10px;"><a href="www.scart.or.kr"><img src="<?=$mw_index_skin_main_path?>/img/bottom-banner12.jpg"></a></div>
		<div style="margin-left:10px;"><a href="www.scart.or.kr"><img src="<?=$mw_index_skin_main_path?>/img/bottom-banner16.jpg"></a></div>		
		</div>
                                 하단배너이미지끝-->

</td>
<td width="5"></td>
<td width="240" valign="top">
<!--아웃로그인 부분-->
<div><table width="240" bgcolor="#ffffff" onmouseover="this.style.backgroundColor='#b4b4b4'" onmouseout="this.style.backgroundColor='#ffffff'" bgcolor="#ffffff" border="0" style="margin-top:3px; margin-right:0; margin-bottom:3; margin-left:3;"><tr><td bgcolor="#f2f6f0">
<div style=" margin-top:-2; margin-left:-2; margin-right:-2; margin-bottom:-2;"><?=outlogin("mw.outlogin4")?> </div>
</td></tr></table></div>

<!-- 한줄 광고
<div class="main-ad" align="center" style="margin-top:5px; margin-left:7; margin-right:2;"><marquee direction="left"><b>오늘의 명언 : 꿈꾸지 않는 자에게는 절망도 없다.</b> -조지 버나드 쇼- </a></marquee></div>

<marquee direction="right">오른쪽으로 움직임 </marquee>
<marquee direction="left">왼쪽으로 움직임 </marquee>
<marquee behavior="alternate">좌우로 움직임 </marquee>
<marquee behavior="alternate" scrollamount="1000">좌우로 빠 르게 </marquee>
<marquee direction="up" scrolldelay="200">위로 올라감 </marquee>
<marquee direction="down" scrolldelay="200">아래로 내려감 </marquee>
<marquee behavior="alternate" direction="up">두개이상 적용 </marquee>
<marquee behavior=alternate width=200>@^.^@) 도리도리~~깍꿍! </marquee>
<marquee direction=up height=40 behavior=alternate>)점프!점 프!에구에구~힘뎌~@ </marquee> -->

<!-- 날짜와 최근글 올라오는 곳 
<div><table width="245" bgcolor="#ffffff" onmouseover="this.style.backgroundColor='#a1a1a1'" onmouseout="this.style.backgroundColor='#ffffff'" bgcolor="#ffffff" border="0" style="margin-top:5px; margin-right:0; margin-bottom:5; margin-left:5;"><tr><td bgcolor="#f2f6f0">
<div style=" margin-top:-2; margin-left:-2; margin-right:-2; margin-bottom:-2;" class="latest-block"><?=mw_latest("mw.news", "notice", 5, 46, 0, $mw[config][cf_index_cache])?></div>
</td></tr></table></div>   -->



<!--설문조사
    <div class="latest-block" style="margin-top:5px; margin-left:5;"><?=poll("mw.poll")?></div>  -->



<!-- 배너공간1-->
<table width="245" height="130"bgcolor="#cecece" onmouseover="this.style.backgroundColor='#b4b4b4'" onmouseout="this.style.backgroundColor='#cecece'" border="0" style="margin-top:0px; margin-right:0; margin-bottom:3; margin-left:3;"><tr><td bgcolor="#fcfcfc">

<div class="latest-block" align="center"> 배너 들어갈 곳</a></div>
</td></tr></table>



<div><!--포탈사이트, 금융사이트-->
<table width="245" bgcolor="#cecece" onmouseover="this.style.backgroundColor='#b4b4b4'" onmouseout="this.style.backgroundColor='#cecece'" border="0" style="margin-top:3px; margin-right:0; margin-bottom:3; margin-left:3;"><tr><td bgcolor="#fcfcfc"><div>
       <table><tr><td align="center" style="padding: 10px 0px 3px 3px;" rowspan="4"><font color="#6d789a"><b>PORTAL SITE</b></font></td></tr>
       <tr><td width="10"></td><td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#1ba51b'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
	   <div><a href="http://www.naver.com" target="_blank"><img alt="네이버" src="<?=$mw_index_skin_main_path?>/img/folder_03_01.png" border="0"></a></div></td><td width="3"></td>
       <td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#359aff'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.daum.net" target="_blank"><img alt="다음" src="<?=$mw_index_skin_main_path?>/img/folder_03_02.png" border="0"></a></div></td><td width="3"></td>
       <td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#fd798a'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.nate.com" target="_blank"><img alt="네이트" src="<?=$mw_index_skin_main_path?>/img/folder_03_03.png" border="0"></a></div></td>
</tr><tr height="2"></tr>
	   <tr><td width="10"></td><td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#0080ff'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.zum.com" target="_blank"><img alt="줌" src="<?=$mw_index_skin_main_path?>/img/folder_03_04.png" border="0"></a></div></td><td width="3"></td>
       <td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#ff8000'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.google.co.kr" target="_blank"><img alt="구글중" src="<?=$mw_index_skin_main_path?>/img/folder_03_05.png" border="0"></a></div></td><td width="3"></td>
       <td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#be7dff'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.joins.com" target="_blank"><img alt="조인스" src="<?=$mw_index_skin_main_path?>/img/folder_03_06.png" border="0"></a></div></td></tr><tr height="2"></tr>
	   </table></div></td></tr></table><!--포탈사이트 테이블 끝--></div>

<div><!--금융사이트 테이블-->
<table width="245" bgcolor="#cecece" onmouseover="this.style.backgroundColor='#b4b4b4'" onmouseout="this.style.backgroundColor='#cecece'" border="0" style="margin-top:3px; margin-right:0; margin-bottom:3; margin-left:3;"><tr><td bgcolor="#fcfcfc"><div>
       <table><tr><td style="padding: 10px 0px 3px 3px;" rowspan="4" align="center"><font color="#6d789a"><b>FINANCE SITE</b></font></td></tr>
       <tr><td width="10"></td><td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#1ba51b'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
	   <div><a href="http://www.hanabank.com" target="_blank"><img alt="하나은행" src="<?=$mw_index_skin_main_path?>/img/folder_02_02.png" border="0"></a></div></td><td width="3"></td>
       <td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#359aff'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="https://www.kbstar.com" target="_blank"><img alt="국민은행" src="<?=$mw_index_skin_main_path?>/img/folder_02_01.png" border="0"></a></div></td><td width="3"></td>
       <td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#fd798a'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.epostbank.co.kr" target="_blank"><img alt="우체국" src="<?=$mw_index_skin_main_path?>/img/folder_02_08.png" border="0"></a></div></td>
</tr><tr height="2"></tr>
	   <tr><td width="10"></td><td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#0080ff'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.ibk.co.kr" target="_blank"><img alt="기업은행" src="<?=$mw_index_skin_main_path?>/img/folder_02_04.png" border="0"></a></div></td><td width="3"></td>
       <td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#ff8000'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.nonghyup.com" target="_blank"><img alt="농협" src="<?=$mw_index_skin_main_path?>/img/folder_02_07.png" border="0"></a></div></td><td width="3"></td>
       <td style="background-color: rgb(240, 242, 246);" onmouseover="this.style.backgroundColor='#be7dff'" onmouseout="this.style.backgroundColor='#f0f2f6'" bgcolor="#f0f2f6" border="0">
       <div><a href="http://www.shinhan.com" target="_blank"><img alt="신한은행" src="<?=$mw_index_skin_main_path?>/img/folder_02_03.png" border="0"></a></div></td></tr><tr height="2"></tr>
	   </table></div></td></tr></table>
</div><!--포탈사이트, 금융사이트 끝-->

</td></tr><!--상단 좌 우 끝-->





<tr><td colspan="3">
<!--여기는 마우스 오버 스타일-->
    <style type="text/css">
    #mw_image_tab { border:1px solid #a8a8a8; border-bottom:0; margin:1 1 1 1; width:853; height:480px; }
    #mw_image_tab .tab_menupan { height:93px; font-family:dotum; background:url(<?=$mw_index_skin_main_path?>/img/tab_image_bg.jpg); }
    #mw_image_tab .tab_menupan .tab_title { display:inline; float:left; margin:15px 30px 0 15px; font-weight:bold; letter-spacing:1px; }
    #mw_image_tab .tab_menupan .tab_menu { display:inline; float:left; cursor:pointer; margin:2 0 0 30; width:100px; height:60px; text-align:center; letter-spacing:1px; font-size:12px; }
    #mw_image_tab .tab_menupan .tab_menu div { margin:3px 0 0 0; }
    #mw_image_tab .tab_item { border:10px; margin:1px 0 0 1px; display:none; }
    </style>
<!--아래에서 세번째줄 width height는 탭 뒤, 맨아래줄 tab 아래 내용들-->
 
 <!--네이버따라하기 준비중 -->  
<div id="mw_image_tab">
        <div class="tab_menupan">
<!--      <div class="tab_title"><img src="<?=$mw_index_skin_main_path?>/img/down.gif"></div> -->            
            <div id="tab_menu1" class="tab_menu" onmouseover="mw_image_tab_over(1)" ><div><img src="<?=$mw_index_skin_main_path?>/img/main_1.png"></div><div><font color="#bd0000">원룸정보</font></div></div>
            <div id="tab_menu2" class="tab_menu" onmouseover="mw_image_tab_over(2)"><div><img src="<?=$mw_index_skin_main_path?>/img/main_2.png"></div><div><font color="#ff8000">강의정보</font></div></div>
            <div id="tab_menu3" class="tab_menu" onmouseover="mw_image_tab_over(3)"><div><img src="<?=$mw_index_skin_main_path?>/img/main_5.png"></div><div><font color="#008000">생활정보</font></div></div>
			<div id="tab_menu4" class="tab_menu" onmouseover="mw_image_tab_over(4)"><div><img src="<?=$mw_index_skin_main_path?>/img/main_4.png"></div><div><font color="#0080ff">구인구직</font></div></div>
			<div id="tab_menu5" class="tab_menu" onmouseover="mw_image_tab_over(5)"><div><img src="<?=$mw_index_skin_main_path?>/img/main_3.png"></div><div><font color="#004080">매매정보</font></div></div>
			<div id="tab_menu6" class="tab_menu" onmouseover="mw_image_tab_over(6)"><div><img src="<?=$mw_index_skin_main_path?>/img/main_6.png"></div><div><font color="#8000ff">커뮤니티</font></div></div>
        </div>
<!--네이버 따라하기 준비중 게시판 4개
 width="270" style="background-color: rgb(208, 208, 208);" onmouseover="this.style.backgroundColor='#bd0000'" onmouseout="this.style.backgroundColor='#d0d0d0'" bgcolor="#d0d0d0" border="0"
 -->

    <div id="tab_item1" class="tab_item" style="center"><!--1번 원룸정보     B01, B02, B03, B04-->
	<table align="center">
	<tr><td bgcolor="#feef6b"width="250" rowspan="2" align="center"><b>일단은 그냥 빈자리</b></td>
	    <td width="150">
        <?=mw_latest("mw.index.bottom.img1", "B01",1, 32); ?></td>
		<td width="150" align="center" valign="middle">
        <?=mw_latest("mw.index.bottom.list1", "B01_1",2, 32); ?></td>
		<td width="150">
        <?=mw_latest("mw.index.bottom.img1", "B02",1, 32); ?></td>
		<td width="150">
		<table onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#d9d9d9'" bgcolor="#d9d9d9" border="0" width="160" height="180" ><tr><td align="center" bgcolor="#d7d7d7"> 준비중 ! </td></tr></table>	</td></tr>

	<tr><td width="150">
		<table onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#d9d9d9'" bgcolor="#d9d9d9" border="0" width="160" height="180" ><tr><td align="center" bgcolor="#d7d7d7"> 준비중 ! </td></tr></table>	</td>
		<td width="150">
        <?=mw_latest("mw.index.bottom.img1", "B03",1, 32); ?>	</td>
		<td width="150">	<table onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#d9d9d9'" bgcolor="#d9d9d9" border="0" width="160" height="180" ><tr><td align="center" bgcolor="#d7d7d7"> 준비중 ! </td></tr></table>	</td>
		<td width="150">
        <?=mw_latest("mw.index.bottom.img1", "B04",1, 32); ?>	</td></tr>
	</table></div>


	<div id="tab_item2" class="tab_item"><!--2번 강의정보                  B16, B18, B20, B22, B24, B26-->
	<table align="center">
	<tr height="2"></tr>
	<tr><td width="2"></td>
	    <td bgcolor="#b4b4b4" onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#b4b4b4'" border="0">
		    <table bgcolor="#ffffff"><tr><td width="180" height="22" align="center" bgcolor="#c1cdfd"><b>사회과학대학</b></td></tr>
              <tr><td><?=mw_latest("mw.board.group.list", "B16",7, 30); ?></td></tr></table></td>

        <td width="2"></td>
	    <td bgcolor="#b4b4b4" onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#b4b4b4'" border="0">
		    <table bgcolor="#ffffff"><tr><td width="180" height="22" align="center" bgcolor="#c1cdfd"><b>인문예술대학</b></td></tr>
             <tr><td><?=mw_latest("mw.board.group.list", "B18",7, 30); ?></td></tr></table></td>

	    <td width="2"></td>
		<td bgcolor="#b4b4b4" onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#b4b4b4'" border="0">
		     <table bgcolor="#ffffff"><tr><td width="180" height="22" align="center" bgcolor="#c1cdfd"><b>공과대학</b></td></tr>
             <tr><td><?=mw_latest("mw.board.group.list", "B20",7, 30); ?></td></tr></table></td>

	    <td width="2"></td>
		<td bgcolor="#b4b4b4" onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#b4b4b4'" border="0">
		     <table bgcolor="#ffffff"><tr><td width="180" height="22" align="center" bgcolor="#c1cdfd"><b>실용과목</b></td></tr>
             <tr><td height="157" align="center">준비중!!</td></tr></table></td>
	    <td width="2"></td>   </tr>

		<tr height="2"></tr>

	<tr><td width="2"></td>
	    <td bgcolor="#b4b4b4" onmouseover="this.style.backgroundColor='#808080'"        onmouseout="this.style.backgroundColor='#b4b4b4'" border="0">
		    <table bgcolor="#ffffff"><tr><td width="180" height="22" align="center" bgcolor="#c1cdfd"><b>사범대학</b></td></tr>
              <tr><td><?=mw_latest("mw.board.group.list", "B22",7, 26); ?></td></tr></table></td>

		<td width="2"></td>
		<td bgcolor="#b4b4b4" onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#b4b4b4'" border="0">
		     <table bgcolor="#ffffff"><tr><td width="180" height="22" align="center" bgcolor="#c1cdfd"><b>약학대학</b></td></tr>
               <tr><td><?=mw_latest("mw.board.group.list", "B24",7, 30); ?></td></tr></table></td>

		<td width="2"></td>
		<td bgcolor="#b4b4b4" onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#b4b4b4'" border="0">
		     <table bgcolor="#ffffff"><tr><td width="180" height="22" align="center" bgcolor="#c1cdfd"><b>생면산업과학대학</b></td></tr>
               <tr><td><?=mw_latest("mw.board.group.list", "B26",7, 30); ?></td></tr></table></td>

	    <td width="2"></td>
		<td bgcolor="#b4b4b4" onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#b4b4b4'" border="0">
		     <table bgcolor="#ffffff"><tr><td width="180" height="22" align="center" bgcolor="#c1cdfd"><b>교양과목</b></td></tr>
             <tr><td height="157" align="center"> 준비중 !! </td></tr></table></td>
	    <td width="2"></td>  </tr>
	</table>
	</div>

        <div id="tab_item3" class="tab_item"><!--3번 생활정보-->
<table align="center">

	<tr><td width="150"><!-- B05 관광/축제-->
        <?=mw_latest("mw.index.bottom.img1", "B05",1, 32); ?>	</td>
		
		<td width="150" height="100"><!-- B06 음식/숙박-->
        <?=mw_latest("mw.index.bottom.img1", "B06",1, 32); ?></td>
		<td rowspan="2"><!--B15 생활경제-->
		<table onmouseover="this.style.backgroundColor='#808080'" onmouseout="this.style.backgroundColor='#d9d9d9'" bgcolor="#d9d9d9" border="0"><tr><td bgcolor="#ffffff"><?=mw_latest("mw.board.group.list", "B15", 6, 50); ?></td></tr></table></td></tr>

	<tr><td width="150"><!-- B13 영화정보-->
        <?=mw_latest("mw.index.bottom.img1", "B13",1, 32); ?>	</td>
		<td width="150" height="100"><!-- B06 음식/숙박을 다른걸로 바꿔야됨-->
		<?=mw_latest("mw.index.bottom.img1", "B05",1, 32); ?> </td></tr>
	</table></div>






		<div id="tab_item4" class="tab_item"><!--4번 구인구직 B31, B33, B35, B37-->
		<table width ="100%">
<!--        <div><img src="<?=$mw_index_skin_main_path?>/img/top_name.png" border=0></div> 
		<tr><td colspan="2" ><?=mw_latest("OTS.latest.job", "B33", 4, 50); ?></td></tr>            -->
		<tr><td width ="50%"><?=mw_latest("mw.list", "B31", 3, 56); ?></td>
		<td width ="50%"><?=mw_latest("mw.list", "B33", 5, 56); ?></td>
		<tr><td width ="50%"><?=mw_latest("mw.list", "B35", 5, 56); ?></td>
		<td width ="50%"><?=mw_latest("mw.list", "B37", 5, 56); ?></tr></table>
		</div>


		<div id="tab_item5" class="tab_item"><!--5번 매매정보 B07 ~ B12 -->
		<?
    echo mw_board_group("매매정보", "<a href='$g4[bbs_path]/board.php?bo_table=B07'>매매정보 자세히 보기</a>", 5, array(
        "B07"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 60, "image_count" => 1),
		"B08"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 60, "image_count" => 1),
		"B09"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 60, "image_count" => 1),
		"B10"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 60, "image_count" => 1),
		"B11"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 60, "image_count" => 1),
		"B12"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 60, "image_count" => 1),
		 // image_count 1로 바꾸면 사진 생김
    ));
    ?>
</div>

		<div id="tab_item6" class="tab_item"><!--6번 커뮤니티 B48 ~ B53--><table width="100%"><tr><td><?
    echo mw_board_group("자유게시판", "<a href='$g4[bbs_path]/board.php?bo_table=B48'>자유게시판 자세히 보기</a>", 3, array(
		"B48"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 70, "image_count" => 0),
       	"B49"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 70, "image_count" => 0),
		"B50"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 70, "image_count" => 0),
			));
    ?></td></tr><tr><td>
<?
    echo mw_board_group("익명게시판", "<a href='$g4[bbs_path]/board.php?bo_table=B51'>익명게시판 자세히 보기</a>", 3, array(
       	"B51"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 70, "image_count" => 0),
		"B52"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 70, "image_count" => 0),
        "B53"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 70, "image_count" => 0),  // image_count 1로 바꾸면 사진 생김
    ));
    ?></td></tr></table></div>

</div>
 
    </div>



</td></tr>




</table><!-- main -->

<div style=" clear:both; border-top:3px solid #636870; background-color:#fafafa; border-bottom:1px solid #ebebeb; height:35px;">
    <div class="new-name"><a href="<?=$g4[bbs_path]?>/new.php">최근게시물</a> : </div>
    <div class="new-scroll"><!-- 최근게시물 --><?=mw_new("mw.index.scroll", 10, 50, 0)?></div> 

    <div style="float:right; width:250px;">
        <div style="margin:8px 0 0 0;"><a href="#"><img src="<?=$mw_index_skin_main_path?>/img/site-use.gif"></a></div>
    </div>
</div>

<style type="text/css">
.new-name { float:left; margin:10px 5px 0 10px; font-weight:bold; }
.new-name a { font-weight:bold; color:#666; font-size:11px; }
.new-scroll { float:left; height:25px; text-align:left; margin:6px 0 0 0; }
#mw-index-new-layer .item a { color:#666; font-size:11px; }
</style>

</div><!-- mw-index -->

<script type="text/javascript"> fsearch.stx.focus(); </script>