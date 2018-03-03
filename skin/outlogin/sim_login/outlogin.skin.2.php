<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<!-- 로그인 후 외부로그인 시작 -->
<table width="380" height="27" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="380" height="11"><span class='member'><strong><?=$nick?></strong></span>님 환영합니다.</td>
    </tr>
    <tr>
        <td width="380" height="11">
            <p><a href="javascript:win_memo();"><FONT color="#ff8871;"><B>쪽지 (<?=$memo_not_read?>)</B></FONT></a></p>
        </td>
    </tr>
    <tr>
        <td width="380" height="19"><? if ($is_admin == "super" || $is_auth) { ?><a href="<?=$g4['admin_path']?>/">관리자</a><? } ?> | <a href="javascript:win_point();"><font color="#737373">포인트 :<?=$point?>점</font></a> | <a href="<?=$g4['bbs_path']?>/member_confirm.php?url=register_form.php">정보수정</a></td>
    </tr>
    <tr>
        <td width="380" height="19"><a href="<?=$g4['bbs_path']?>/logout.php"><img src="<?=$g4['bbs_path']?>/logout.php" width="60" height="22"></a>&nbsp;<a href="javascript:win_scrap();"><img src="<?=$board_skin_path?>/img/scarp_btn.jpg" width="116" height="22"></a></td>
    </tr>
</table>

<script type="text/javascript">
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave() 
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?")) 
            location.href = "<?=$g4['bbs_path']?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- 로그인 후 외부로그인 끝 -->