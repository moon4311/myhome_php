<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 버그신고 및 프로그램 개발문의 : kcho07@nate.com

  $game_mode = (int)$spr;
  if ($game_mode) {
    $game_mode = preg_match("/^[1-3]+$/", $game_mode) ? $game_mode : "";
  }

  $game_on = (int)$_POST[game_no];
  if ($game_on) {
    $game_on = preg_match("/^[1-3]+$/", $game_on) ? $game_on : "";
  }


  $today_max = 2000; // 하루에 게임가능 건수

  $min_point = 3000; // 회원이 설정값이상 보유하고 있어야 게임이 가능

  // 게임명
  $game_name = "가위바위보 묵찌빠 게임!!!!!!";

  $game_rand = rand(1,3); // 최소,최대의 숫자 - 수정금지

 //기본 게임모드를 지정
  $spr_gamemode = 1; // 1 고정포인트지정 모드 / 2 단일 랜덤 포인트 모드 / 3 쌍방 랜덤 포인트 모드

  // 넘어온 게임모드가 없으면 지정한 기본 모드를 할당한다.
  $sprgame_mode = $game_mode ? $game_mode : $spr_gamemode;

 //고정일때
 if ($sprgame_mode ==1) {
   $sprgame_modename ='고정 포인트';

   $game_point = 200; //이겼을 경우 받는 포인트
   $game_pointname = '200'; //이겼을 경우 받는 포인트설명

   $game_point_lose = 100; //졌을 경우 잃는 포인트
   $game_point_losename = '100'; //졌을 경우 잃는 포인트설명

   $game_point_bglose = 50; //비겼을 경우 차감포인트
   $game_point_bglosename = '50'; //비겼을 경우 잃는 포인트설명

 }
 else if ($sprgame_mode ==2) { //단일 랜덤일때

   $sprgame_modename ='단일 랜덤포인트';

   $game_point = rand(300,1000); //이겼을 경우 받는 포인트
   $game_pointname = '300~1,000'; //이겼을 경우 받는 포인트설명

   $game_point_lose = 300; //졌을 경우 잃는 포인트
   $game_point_losename = '300'; //졌을 경우 잃는 포인트설명

   $game_point_bglose = 100; //비겼을 경우 차감포인트
   $game_point_bglosename = '100'; //비겼을 경우 잃는 포인트설명

 }
 else if ($sprgame_mode ==3) { //쌍방 랜덤일때

   $sprgame_modename ='쌍방 랜덤포인트';

   $game_point = rand(300,2000); //이겼을 경우 받는 포인트
   $game_pointname = '300~2,000'; //이겼을 경우 받는 포인트설명

   $game_point_lose = rand(500,1000); //졌을 경우 잃는 포인트
   $game_point_losename = '500~1,000'; //졌을 경우 잃는 포인트설명

   $game_point_bglose = 200; //비겼을 경우 차감포인트
   $game_point_bglosename = '200'; //비겼을 경우 잃는 포인트설명

 }
 else {
    alert("게임모드가 없습니다.", $g4[path]);
 }



 if (!$is_member){
   alert("로그인후 이용하세요.", $g4[path]);
 }


 if ($member[mb_point]  < $min_point) {
   alert("보유하신 포인트(".number_format($member[mb_point]).")가 모자라 게임이 불가능 합니다.\\n\\n".number_format($min_point)." 이상 포인트를 모으신 후 다시 이용해주세요.", $g4[path]);
 }


$sql = " select count(*) as cnt from $g4[point_table]
          where po_rel_table = '@sprgame'
            and mb_id = '$member[mb_id]'
            and substring(po_rel_action,1,10) = '{$g4['time_ymd']}' ";
$row = sql_fetch($sql);
$today_cnt = $row[cnt];

if ($today_cnt > $today_max) {
    alert("하루에 게임은 ".$today_max."회만 가능합니다.", $g4[path]);
}

?>
