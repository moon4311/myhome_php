<? 
include_once("./_common.php");
$g4['title'] = "";
include_once("./_head.php");
include_once("../box.php");
include_once("./config.php");

$sql = " select count(*) as cnt from $g4[point_table]
          where po_rel_table = '@pg'
            and mb_id = '$member[mb_id]'
            and substring(po_rel_action,1,10) = '{$g4['time_ymd']}'";
$row = sql_fetch($sql);
$today_cnt = $row[cnt];

$you1 = $_POST['you1'];
$you2 = $_POST['you2'];
$you3 = $_POST['you3'];
$you4 = $_POST['you4'];

$slot1 = rand(1,5); // 슬롯 1 1~5 까지 랜덤 발생
$slot2 = rand(1,5); // 슬롯 2 1~5 까지 랜덤 발생
$slot3 = rand(1,5); // 슬롯 3 1~5 까지 랜덤 발생
$slot4 = rand(1,5); // 슬롯 4 1~5 까지 랜덤 발생

if (!$member[mb_id]) 
{
    alert("회원만 이용하실 수 있습니다.");
	
		echo "<script> 
document.location.href='/'; 
</script>"; 
}

if($member[mb_point] < '9')
{
	echo("포인트 게임에 필요한 10포인트가 부족하여 게임을 진행 할 수 없습니다.");
	echo "<script> 
document.location.href='/plugin/games'; 
</script>"; 
}

if($_POST['check'] != "checked"){
    alert("정상적인 방법으로 게임을 이용해 주세요.");
	echo "<script>document.location.href='/plugin/games/'</script>"; 
}
?>
<table width="100%">
    <tr>
        <td width="100%"><?
			if ($you1 == $slot1 && $you2 == $slot2 && $you3 == $slot3 && $you4 == $you4) {
			
			echo("<font size='4' color='greed'>축하합니다! 승리 포인트로 {$win_point}p를 얻었습니다!</font>");
			insert_point($member[mb_id], $win_point, "숫자 맞추기 성공 $randpoint", "@pg4" , $member[mb_id] , $g4['time_ymdhis']);
				}

			else {

			echo("<font size='4' color='red'>이런, 실패 하였습니다. 참여 포인트 {$lose_point}이 감소 되었습니다.</font>");
			insert_point($member[mb_id], -$lose_point, "숫자 맞추기 참여", "@pg4" , $member[mb_id] , $g4['time_ymdhis']);
			}
			?></td>
    </tr>
</table>

<br>
<br>
<table width="100%">
    <tr>
        <td>
            <p align="center"><input type="submit" name="tryagain" value="다시 하기" onclick="location.href='/plugin/slot'"> &nbsp;&nbsp;<input type="submit" name="tryagain" value="그만 하기" onclick="location.href='/plugin/games'"> </p>
</td>
    </tr>
</table>

 <form name="input" method="post" action="./result.php">
        <table width="100%">
<tr>
				<td height="20" bgcolor="black" colspan="7">&nbsp;<font color="white"><b>컴퓨터의 카드</b></font></td>
				</tr>
				<tr>
				<td width="22%" height="90" align="center" bgcolor="#e1e4fd"><font size="4"><?echo("$slot1");?></font></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><font size="4"><?echo("$slot2");?></font></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><font size="4"><?echo("$slot3");?></font></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><font size="4"><?echo("$slot4");?></font></td>
				</tr>
				<tr>
				<td height="30" colspan="7"></td>
				</tr>
				<tr>
				<td height="20" bgcolor="black" colspan="7">&nbsp;<font color="white"><b>당신의 카드</b></font></td>
				</tr>
				<tr>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd">
				<?
				if ( $slot1 == $you1 ) 
				{
				echo("<font size='4' color='green'>$you1</font>");
				}
				if ( $slot1 != $you1 ) 
				{
				echo("<font size='4' color='red'>$you1</font>");
				}
				?>
		</td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd">
				<?
				if ( $slot2 == $you2 ) 
				{
				echo("<font size='4' color='green'>$you2</font>");
				}
				if ( $slot2 != $you2 ) 
				{
				echo("<font size='4' color='red'>$you1</font>");
				}
				?>

</td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd">
				<?
				if ( $slot3 == $you3 ) 
				{
				echo("<font size='4' color='green'>$you3</font>");
				}
				if ( $slot3 != $you3 ) 
				{
				echo("<font size='4' color='red'>$you3</font>");
				}
				?></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><?
				if ( $slot4 == $you4 ) 
				{
				echo("<font size='4' color='green'>$you4</font>");
				}
				if ( $slot4 != $you4 ) 
				{
				echo("<font size='4' color='red'>$you4</font>");
				}
				?></td>
				</tr>
</form>
</table>


<?
include_once("./_tail.php");
?>
