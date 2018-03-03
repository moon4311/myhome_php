<?
$g4_path = ".."; // common.php 의 상대 경로
include_once("$g4_path/common.php");

//설정 로드
include_once("./setup.php");

$g4['title'] = $game_name;
include_once("./_head.php");

//토큰 키를 생성
$ckey1 = date("ymd");
$ckey2 = $member['mb_point'];
$ckey3 = $member['mb_id'];
$tokenkey = substr(md5($ckey1.$ckey2.$ckey3.$sprgame_mode),0,12);
?>
<link rel="stylesheet" href="style.css" type="text/css">

<div class='str_er'>&nbsp;</div>
<div class='str_ersub'>
<input type='button' class='str_btn<?=($sprgame_mode==1)?'ok':''?>' value='고정포인트게임' onclick="document.location.href='<?=$_SERVER[PHP_SELF]?>?spr=1';" style="cursor:pointer;" />
<input type='button' class='str_btn<?=($sprgame_mode==2)?'ok':''?>' value='단일랜덤포인트게임' onclick="document.location.href='<?=$_SERVER[PHP_SELF]?>?spr=2';" style="cursor:pointer;" />
<input type='button' class='str_btn<?=($sprgame_mode==3)?'ok':''?>' value='쌍방랜덤포인트게임' onclick="document.location.href='<?=$_SERVER[PHP_SELF]?>?spr=3';" style="cursor:pointer;" />
<input type='button' class='str_btn' value='게임그만할래~' onclick="document.location.href='<?=$g4[path]?>';" style="cursor:pointer;" />
</div>
<div class='str_er'>&nbsp;</div>

<div class='str_top'>
<img src='./img/btn_notice.gif' border='0' align='absmiddle'> 이게임은 회원님의 포인트와 연동되는 게임이며 보유중인 포인트의 파산시 본인의 책임 입니다.<br />
이 게임은 <?=number_format($min_point)?> 포인트이상 회원님이 보유하고 있어야 하며
1일 <?=number_format($today_max)?> 회 까지만 가능합니다.<br />
위의 게임종류를 선택한 후에 아래의 원하는 아이콘을 클릭하시면 해당게임이 진행됩니다.<br />
</div>

<div class='str_er'>&nbsp;</div>

<div class='str_con'>

<img src="./img/1_on.png" onMouseOver="this.src='./img/1_off.png';" onMouseOut="this.src='./img/1_on.png';" style="border:1px solid #dddddd; cursor:pointer;" hspace="6" alt="가위" onClick="strpost_update(1);">
<img src="./img/2_on.png" onMouseOver="this.src='./img/2_off.png';" onMouseOut="this.src='./img/2_on.png';" style="border:1px solid #dddddd; cursor:pointer;" hspace="6" alt="바위" onClick="strpost_update(2);">
<img src="./img/3_on.png" onMouseOver="this.src='./img/3_off.png';" onMouseOut="this.src='./img/3_on.png';" style="border:1px solid #dddddd; cursor:pointer;" hspace="6" alt="보" onClick="strpost_update(3);">
</div>

<div class='str_er'>&nbsp;</div>

<div class='str_bt'>
  <? if ($sprgame_mode ==1) { ?>
   현재 <b><?=$sprgame_modename?> 게임모드</b></font> 입니다. 게임진행시 포인트 "획득, 차감" 방식은 아래와 같습니다.<br /><br />
   게임에서 이길경우  <font color="#006600"><?=$game_pointname?></font> 획득하고 / 패배시 <font color="#006600"><?=$game_point_losename?></font> 차감 /  비길경우 <font color="#006600"><?=$game_point_bglosename?></font> 포인트가 차감 됩니다.<br />
  <? } ?>
  <? if ($sprgame_mode ==2) { ?>
  현재 <b><?=$sprgame_modename?> 게임모드</b></font> 입니다. 게임진행시 포인트 "획득, 차감" 방식은 아래와 같습니다.<br /><br />
  게임에서 이길경우  <font color="#006600"><?=$game_pointname?></font> 획득하고 / 패배시 <font color="#006600"><?=$game_point_losename?></font> 차감 /  비길경우 <font color="#006600"><?=$game_point_bglosename?></font> 포인트가 차감 됩니다.<br />
  <? } ?>

  <? if ($sprgame_mode ==3) { ?>
  현재 <b><?=$sprgame_modename?> 게임모드</b></font> 입니다. 게임진행시 "포인트 획득, 차감" 방식은 아래와 같습니다.<br /><br />
  게임에서 이길경우  <font color="#006600"><?=$game_pointname?></font> 획득하고 / 패배시 <font color="#006600"><?=$game_point_losename?></font> 차감 /  비길경우 <font color="#006600"><?=$game_point_bglosename?></font> 포인트가 차감 됩니다.<br />
  <? } ?>
  <br />
   <?=$member['mb_nick']?> 님은 현재 <?=number_format($member[mb_point])?></font> 포인트를 보유 중이며
   오늘게임 <?=number_format($today_max)?> 회중 / <b><?=$today_cnt?></b></font> 회를 진행하였습니다.
   <br /><br />
   <font color="#006600">※공익광고 :  지나친 게임은 파산 및 건강을 해치거나 이혼을 당할수도 있으므로 적당히 하세요!!!</font>

</div>

<div class='str_er'>&nbsp;</div>

<script>
// POST 방식으로 넘겨줌
function strpost_update(val)
{
	var f = document.strfpost;
	var action_url = 'game_on.php';

        f.game_no.value = val;
		f.action = action_url;
		f.submit();
}
</script>

<form name='strfpost' method='post'>
 <input type='hidden' name='tokenkey' value='<?=$tokenkey?>'>
 <input type='hidden' name='spr' value='<?=$sprgame_mode?>'>
 <input type='hidden' name='game_no'>
</form>


<?
include_once("./_tail.php");
?>