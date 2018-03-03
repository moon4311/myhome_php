<?
include_once("./_common.php");
$g4['title'] = "";
include_once("./_head.php");
include_once("./config.php");


if (!$member[mb_id]) 
{
alert("회원만 이용할 수 있습니다. 회원이시라면 로그인 후 이용해 보십시오.", "/");        
}

if($today_cnt >= $today_max) {
		alert("오늘은 더이상 플레이 할 수 없습니다.", "/");    
}

if($member[mb_point] < $min_point)
{
alert("게임 이용에 필요한 포인트 {$min_point}이 없습니다.", "/");    
}


?>

<form name="input" method="post" action="./result.php">
<table width="100%">
    <tr>
        <td width="100%" colspan="2">

            <p>숫자 맞추기 게임에 오신 것을 환영합니다. 이곳에서는 아래 빈 칸에 1~5 까지 숫자를 지정해 컴퓨터가 생각한 숫자를 맞히는 게임 입니다. 준비가 되셧으면 확인 버튼을 눌러주세요! 행운을 빕니다!<br><br></p>
            <p><b><font color="black">성공 확률 : 1/625</font><font color="red"><br>실패시 포인트 : <?=$lose_point?>p</font></b><br><font color="#009900"><b>성공시 포인트 : <?=$win_point?>p</b></font><b><br><font color="black">오늘 플레이 한 횟수 : <?=$today_cnt?>회 / <?=$today_max?>회</font></b><br><br></p>
</td>
</tr>
</table>
  <form name="input" method="post" action="./result.php">
  <input type="hidden" name="check" value="checked">
        <table width="100%">
<tr>
				<td height="20" bgcolor="black" colspan="7">&nbsp;<font color="white"><b>컴퓨터의 카드</b></font></td>
				</tr>
				<tr>
				<td width="22%" height="90" align="center" bgcolor="#e1e4fd"><font size="4">?</font></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><font size="4">?</font></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><font size="4">?</font></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><font size="4">?</font></td>
				</tr>
				<tr>
				<td height="30" colspan="7"></td>
				</tr>
				<tr>
				<td height="20" bgcolor="black" colspan="7">&nbsp;<font color="white"><b>당신의 카드</b></font></td>
				</tr>
				<tr>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><input name="you1" style="width: 40px;" type="text" onkeydown="this.value=this.value.replace(/[^0-9]/g,'')" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" onblur="this.value=this.value.replace(/[^0-9]/g,'')"></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><input name="you2" style="width: 40px;" type="text" onkeydown="this.value=this.value.replace(/[^0-9]/g,'')" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" onblur="this.value=this.value.replace(/[^0-9]/g,'')"></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><input name="you3" style="width: 40px;" type="text" onkeydown="this.value=this.value.replace(/[^0-9]/g,'')" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" onblur="this.value=this.value.replace(/[^0-9]/g,'')"></td>
				<td width="4%" height="90" align="center" ></td>
				<td width="22%" height="90" align="center"  bgcolor="#e1e4fd"><input name="you4" style="width: 40px;" type="text" onkeydown="this.value=this.value.replace(/[^0-9]/g,'')" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" onblur="this.value=this.value.replace(/[^0-9]/g,'')"></td>
				</tr>
				<tr>
				<td height="50" align="center"  colspan="7"><input style="width: 400px;" type="submit" value="숫자맞추기 내기하기"></td>
</form>
</table>
<?
include_once("./_tail.php");
?>
