<?
$g4_path = ".."; // common.php 의 상대 경로
include_once("$g4_path/common.php");

header("Expires: Mon 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d, M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//설정 로드
include_once("./setup.php");

$g4['title'] = $game_name;
include_once("./_head.php");

 if (!$sprgame_mode) {
  alert("게임모드가 없습니다.", $g4[path]);
 }

 if (!$game_on) {
  alert("게임 값이 없습니다.", $g4[path]);
 }


//토큰 키를 재생성후 넘어온 토큰과 비교함
$ckey1 = date("ymd");
$ckey2 = $member['mb_point'];
$ckey3 = $member['mb_id'];
$stokenkey = substr(md5($ckey1.$ckey2.$ckey3.$sprgame_mode),0,12);

$gametokenkey = $_POST['tokenkey'];

if (!$gametokenkey) {
 alert("정상적인 방법으로 게임을 진행하세요.", $g4[path]);
}

if ($stokenkey !=$gametokenkey) {
 alert("정상적인 방법으로 게임을 진행하세요.", $g4[path]);
}


 if ($game_on == $game_rand) {

 $strgame_vsname = "<b><font size='3' color='#4BACC6'>아쉽게 비겼습니다.  수수료 ".number_format($game_point_bglose)." 포인트 차감! 다시한번 도전장을...</font></b>";
 $strgame_vsmy = "off";
 $strgame_vscom = "off";

 // 비겼을경우 수수료 포인트차감
 insert_point($member[mb_id], $game_point_bglose * (-1), "게임비김 수수료 포인트차감", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
}


if ($game_on =='1' && $game_rand =='2') {

 $strgame_vsname = "<b><font size='3' color='#ff0000'>이런 내가 지다니ㅠㅠ... ".number_format($game_point_lose)." 포인트 차감!!!</font></b>";
 $strgame_vsmy = "off";
 $strgame_vscom = "on";

 // 패배
 insert_point($member[mb_id], $game_point_lose * (-1), "게임 패배 포인트차감", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
}

 if ($game_on =='1' && $game_rand =='3') {

 $strgame_vsname = "<b><font size='3' color='#0070C0'>앗싸!! 나의 승리다. ".number_format($game_point)." 포인트 획득!!!</font></b>";
 $strgame_vsmy = "on";
 $strgame_vscom = "off";

 //게임승
 insert_point($member[mb_id], $game_point, "게임 승리 포인트획득", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
}


if ($game_on =='2' && $game_rand =='3') {

 $strgame_vsname = "<b><font size='3' color='#ff0000'>이런 내가 지다니ㅠㅠ...<b> ".number_format($game_point_lose)." 포인트 차감!!!</font></b>";
 $strgame_vsmy = "off";
 $strgame_vscom = "on";

 // 패배
 insert_point($member[mb_id], $game_point_lose * (-1), "게임 패배 포인트차감", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
}

 if ($game_on =='2' && $game_rand =='1') {

 $strgame_vsname = "<b><font size='3' color='#0070C0'>앗싸!! 나의 승리다. ".number_format($game_point)." 포인트 획득!!!</font></b>";
 $strgame_vsmy = "on";
 $strgame_vscom = "off";

 //게임승
 insert_point($member[mb_id], $game_point, "게임 승리 포인트획득", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
}


if ($game_on =='3' && $game_rand =='1') {

 $strgame_vsname = "<b><font size='3' color='#ff0000'>이런 내가 지다니ㅠㅠ...<b> ".number_format($game_point_lose)." 포인트 차감!!!</font></b>";
 $strgame_vsmy = "off";
 $strgame_vscom = "on";

 // 패배
 insert_point($member[mb_id], $game_point_lose * (-1), "게임 패배 포인트차감", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
}

 if ($game_on =='3' && $game_rand =='2') {

 $strgame_vsname = "<b><font size='3' color='#0070C0'>앗싸!! 나의 승리다. ".number_format($game_point)." 포인트 획득!!!</font></b>";
 $strgame_vsmy = "on";
 $strgame_vscom = "off";

 //게임승
 insert_point($member[mb_id], $game_point, "게임 승리 포인트획득", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
}

?>
<link rel="stylesheet" href="style.css" type="text/css">
<div class='str_er'>&nbsp;</div>
<div class='str_ersub'>
<input type='button' class='str_btn<?=($sprgame_mode==1)?'ok':''?>' value='고정포인트게임' />
<input type='button' class='str_btn<?=($sprgame_mode==2)?'ok':''?>' value='단일랜덤포인트게임' />
<input type='button' class='str_btn<?=($sprgame_mode==3)?'ok':''?>' value='쌍방랜덤포인트게임' />
<input type='button' class='str_btn' value='게임그만할래~' onclick="document.location.href='<?=$g4[path]?>';" style="cursor:pointer;" />
</div>
<div class='str_er'>&nbsp;</div>

<div class='str_topon'>
<img src='./img/btn_notice.gif' border='0' align='absmiddle'> 이게임은 회원님의 포인트와 연동되는 게임이며 보유중인 포인트의 파산시 본인의 책임 입니다.<br />
<div id="choonDiv" style="clear:both; width:650px; height:30px; padding:5px 5px 5px 5px; text-align:center;"></div>
<script language='javascript'>

  function Timer() {
   setTimeout("locateKap()",5000);
  }

  function locateKap(){

   location.replace("./game.php?spr=<?=$sprgame_mode?>");
  }

  cnt = 5; // 카운트다운 시간 초단위로 표시
  function countdown() {
   if(cnt == 0){
          // 시간이 0일경우
         locateKap();
   }else {
         // 시간이 남았을 경우 카운트다운을 지속한다.
        document.all.choonDiv.innerHTML ="<font size='4' color='red'><b>" + cnt + " </b></font> 초 후에 게임시작 페이지로 이동이 됩니다.";
        setTimeout("countdown()",1000);
  cnt--;
   }
  }

$(document).ready(function() {
  Timer();
});
countdown();
</script>
</div>

<div class='str_er'>&nbsp;</div>

<div style='clear:both;'>
<div style="float:left; margin-left:40px;"><input type='button' class='str_btn' value='  <?=$member[mb_nick]?>님  '></div>
<div style="float:right; margin-right:30px;"><input type='button' class='str_btn' value='  컴퓨터딜러  '></div>
</div>

<div class='str_er'>&nbsp;</div>

<div class='str_con'>
<img src="./img/<?=$game_on?>_<?=$strgame_vsmy?>.png" style="border:1px solid #dddddd;" hspace="5">
<img src='./img/vspr.png' border='0' hspace="15">
<img src="./img/<?=$game_rand?>_<?=$strgame_vscom?>.png" style="border:1px solid #dddddd;" hspace="5">
</div>

<div class='str_er'>&nbsp;</div>

<div class='str_bton'>
  <?=$strgame_vsname?>
 <br /><br />
 <input type=button class='str_btnok' value='            누가 이기나 끝까지 가보장!!         ' onclick="document.location.href='./game.php?spr=<?=$sprgame_mode?>';" style="cursor:pointer;" />
 <input type=button class='str_btn' value=' 일하러 GO ~ ' onclick="document.location.href='<?=$g4['path']?>';" style="cursor:pointer;" />
</div>
<div class='str_er'>&nbsp;</div>
<div class='str_er'>&nbsp;</div>

<?
include_once("./_tail.php");
?>
