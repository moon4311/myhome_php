<?
include_once("./_common.php");
include_once("$g4[path]/common/head.php");
?>
<?
if($mon == "win"){
insert_point($member[mb_id], $money, "게임 승리 포인트획득", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
goto_url("./game.php");
}
if($mon == "same"){
insert_point($member[mb_id], $money * (-1), "게임 종료 포인트획득", '@sprgame', $member[mb_id], $g4['time_ymdhis']);
goto_url("./game.php");
}
if($mon == "lose"){
if($member[mb_point] <= 0 ) {
insert_point($member['mb_id'], $member[mb_point] * (-1) + 100 ,  "최저 기본 포인트 제공", "", "");
}
goto_url("./game.php");
}
?>
<?
include_once("$g4[path]/common/tail.php");
?>
