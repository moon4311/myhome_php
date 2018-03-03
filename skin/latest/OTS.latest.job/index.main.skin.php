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
<div class="image_list" id="image_list_1">
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




<!--여기는 마우스 오버 스타일-->
    <style type="text/css">
    #mw_image_tab { border:1px solid #e1e1e1; border-bottom:0; margin:5 0 0 0; height:500px; }
    #mw_image_tab .tab_menupan { height:79px; font-family:dotum; background:url(<?=$mw_index_skin_main_path?>/img/tab_image_bg.jpg); }
    #mw_image_tab .tab_menupan .tab_title { display:inline; float:left; margin:15px 30px 0 15px; font-weight:bold; letter-spacing:-1px; }
    #mw_image_tab .tab_menupan .tab_menu { display:inline; float:left; cursor:pointer; margin:5; width:80px; height:70px; text-align:center; letter-spacing:-1px; font-size:12px; }
    #mw_image_tab .tab_menupan .tab_menu div { margin:27px 0 0 0; }
    #mw_image_tab .tab_item { margin:1px 0 0 1px; display:none; }
    </style>
<!--아래에서 세번째줄 width height는 탭 뒤, 맨아래줄 tab 아래 내용들-->
 
 <!--네이버따라하기 준비중 -->  
    <div id="mw_image_tab">
        <div class="tab_menupan">
<!--      <div class="tab_title"><img src="<?=$mw_index_skin_main_path?>/img/down.gif"></div> -->            
            <div id="tab_menu1" class="tab_menu" onmouseover="mw_image_tab_over(1)"><div>원룸정보</div></div>
            <div id="tab_menu2" class="tab_menu" onmouseover="mw_image_tab_over(2)"><div>강의정보</div></div>
            <div id="tab_menu3" class="tab_menu" onmouseover="mw_image_tab_over(3)"><div>생활정보</div></div>
			<div id="tab_menu4" class="tab_menu" onmouseover="mw_image_tab_over(4)"><div>구인구직</div></div>
			<div id="tab_menu5" class="tab_menu" onmouseover="mw_image_tab_over(5)"><div>관광정보</div></div>
			<div id="tab_menu6" class="tab_menu" onmouseover="mw_image_tab_over(6)"><div>커뮤니티</div></div>
        </div>
<!--네이버 따라하기 준비중 게시판 4개-->



    <div id="tab_item1" class="tab_item" style="center"><!--1번 원룸정보     B01, B02, B03, B04-->
	<table width="100%">
	<tr><td class="new-scroll"><?=mw_latest("mw.board.group.image", "B01", 1, 50); ?></td>
	<td><?=mw_latest("mw.board.group.image", "B02", 1, 50); ?></td></tr>
	<tr><td><?=mw_latest("mw.board.group.image", "B03", 1, 50); ?></td>
	<td><?=mw_latest("mw.board.group.image", "B04", 1, 50); ?></td></tr>
	<tr align="right"> <td colspan="2"><a href ="http://workfans.oranc.co.kr/bbs/board.php?bo_table=B03 ">더보기</a></td></tr>
	</table></div>


	<div id="tab_item2" class="tab_item"><!--2번 강의정보                  B16, B18, B20, B22, B24, B26-->
	<table width="100%" cellpadding="0" cellspacing="5" height="144">
    <tr><td width="457" height="25" background=<?=$mw_index_skin_main_path?>/img/tab_bottom_bg.jpg><p align="center" style="line-height:100%; margin-top:5; margin-bottom:0;"><a href='bbs/board.php?bo_table=B16'>사회과학대학</a></p></td>
        <td width="457" height="25" background=<?=$mw_index_skin_main_path?>/img/tab_bottom_bg.jpg><p align="center" style="line-height:100%; margin-top:5; margin-bottom:0;"><a href='bbs/board.php?bo_table=B18'>인문예술대학</a></p></td>
        <td width="457" height="25" background=<?=$mw_index_skin_main_path?>/img/tab_bottom_bg.jpg><p align="center" style="line-height:100%; margin-top:5; margin-bottom:0;"><a href='bbs/board.php?bo_table=B20'>공과대학</a></p></td></tr>

    <tr><td width="457" height="50"><p style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.board.group.list", "B16", 6, 30); ?></p></td>
        <td width="457" height="50"><p style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.board.group.list", "B18", 6, 30); ?></p></td>
        <td width="457" height="50"><p style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.board.group.list", "B20", 6, 30); ?></p></td></tr>

	<tr><td width="457" height="25" background=<?=$mw_index_skin_main_path?>/img/tab_bottom_bg.jpg><p align="center" style="line-height:100%; margin-top:5; margin-bottom:0; "><a href='bbs/board.php?bo_table=B22'>사범대학</a></p></td>
        <td width="457" height="25" background=<?=$mw_index_skin_main_path?>/img/tab_bottom_bg.jpg><p align="center" style="line-height:100%; margin-top:5; margin-bottom:0;"><a href='bbs/board.php?bo_table=B24'>약학대학</a></p></td>
        <td width="457" height="25" background=<?=$mw_index_skin_main_path?>/img/tab_bottom_bg.jpg><p align="center" style="line-height:100%; margin-top:5; margin-bottom:0;"><a href='bbs/board.php?bo_table=B26'>생명산업과학대학</a></p></td></tr>

	<tr><td width="457" height="50"><p style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.board.group.list", "B22", 6, 30); ?></p></td>
        <td width="457" height="50"><p style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.board.group.list", "B24", 6, 30); ?></p></td>
        <td width="457" height="50"><p style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.board.group.list", "B26", 6, 30); ?></p></td>
    </tr></table>
	</div>


        <div id="tab_item3" class="tab_item"><!--3번 생활정보-->
<table width="100%">
    <tr><td width ="46%">
            <p align="center" style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.board.group.image", "B11", 1, 50); ?></p>
        </td>
        <td width ="54%" colspan="2">
            <p align="left" style="line-height:100%; margin-top:0; margin-bottom:0;"> <?=mw_latest("mw.board.group.list", "B15", 6, 60); ?></p>
        </td>
    </tr>
	<tr><td width ="46%">
	        <p align="center" style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.board.group.image", "B13", 1, 50); ?></p>
        </td>
        <td width ="27%">
            <p align="center" style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.index.tab.image", "B06", 1, 20); ?></p>
        </td>
        <td width ="27%">
            <p align="center" style="line-height:100%; margin-top:0; margin-bottom:0;"><?=mw_latest("mw.index.tab.image", "B15", 1, 20); ?></p>
        </td>
	</tr></table></div>


		<div id="tab_item4" class="tab_item"><!--4번 구인구직-->
		<table width ="100%">
		<tr><td colspan="2"><?=mw_latest("OTS.latest.job", "B33", 3, 50); ?></td></tr>
		<tr><td width ="50%"><?=mw_latest("mw.list", "B31", 3, 50); ?></td>
		<td width ="50%"><?=mw_latest("mw.list", "B32", 5, 50); ?></td>
		<tr><td width ="50%"><?=mw_latest("mw.list", "B35", 5, 50); ?></td>
		<td width ="50%"><?=mw_latest("mw.list", "B37", 5, 50); ?></tr></table>
		
<!--		<?
    echo mw_board_group("구인구직", "<a href='$g4[bbs_path]/board.php?bo_table=B31'>구인구직 자세히 보기</a>", 3, array(
        "B31"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 80, "image_count" => 0),
		"B32"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 80, "image_count" => 0),
		"B33"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 80, "image_count" => 0),
		"B35"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 80, "image_count" => 0),
       	"B37"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 80, "image_count" => 0), // image_count 1로 바꾸면 사진 생김
    ));
    ?>--></div>


		<div id="tab_item5" class="tab_item"><!--5번 관광정보-->
    <table width="100%"><tr><td><?=mw_latest("mw.board.group.image", "B05", 1, "0"); ?></td><td><?=mw_latest("mw.list", "B05", 1, 80); ?></td></tr>
	<tr><td><?=mw_latest("basic", "B06", 1, 80); ?></td><td><?=mw_latest("mw.board.group.image", "B06", 1, "0"); ?></td></tr></table>
</div>

		<div id="tab_item6" class="tab_item"><!--6번 커뮤니티--><table width="100%"><tr><td><?
    echo mw_board_group("자유게시판", "<a href='$g4[bbs_path]/board.php?bo_table=B48'>자유게시판 자세히 보기</a>", 3, array(
		"B48"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 50, "image_count" => 0),
       	"B49"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 50, "image_count" => 0),
		"B50"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 50, "image_count" => 0),
			));
    ?></td></tr><tr><td>
<?
    echo mw_board_group("익명게시판", "<a href='$g4[bbs_path]/board.php?bo_table=B51'>익명게시판 자세히 보기</a>", 3, array(
       	"B51"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 50, "image_count" => 0),
		"B52"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 50, "image_count" => 0),
        "B53"   => array("skin" => "mw.board.group.list",       "rows" => 6, "length" => 50, "image_count" => 0),  // image_count 1로 바꾸면 사진 생김
    ));
    ?></td></tr></table></div>

</div>
 
    </div>
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
<td width="250" valign="top">
<!--아웃로그인 부분-->
    <?=outlogin("mw.outlogin4")?>


<!--다운 준비중 위의 배너공간(하이퍼링크 미정)-->
    <div class="latest-block"><a href="http://www.miwit.com/" target="_blank"><img src="<?=$mw_index_skin_main_path?>/img/rb2.png" id=mbr border=0></a></div>

<!-- 날짜와 최근글 올라오는 곳-->
    <div class="latest-block"><?=mw_latest("mw.news", "notice", 5, 40, 0, $mw[config][cf_index_cache])?></div>

</td>
</tr>
</table><!-- main -->
<div style="background-color:rgb(250,250,250); border-top-width:3px; border-bottom-width:1px; border-top-color:rgb(99,104,112); border-bottom-color:rgb(235,235,235); border-top-style:solid; border-bottom-style:solid; height:35px; clear:both;">
    <div class="new-name"><a href="<?=$g4[bbs_path]?>/new.php">최근게시물</a> : </div>
    <div class="new-scroll"><!-- 최근게시물 --><?=mw_new("mw.index.scroll", 10, 50, 0)?></div> 

    <div style="width:250px; float:right;">
        <div style="margin-top:8px; margin-right:0; margin-bottom:0; margin-left:0;"><a href="#"><img src="<?=$mw_index_skin_main_path?>/img/site-use.gif"></a></div>
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