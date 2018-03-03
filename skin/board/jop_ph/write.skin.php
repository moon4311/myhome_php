<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include "$g4[path]/skin/multi_category/lib.php";

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}
?>

<?
$ex1_filed = explode("|",$write[wr_1]); 
$ext1_00  = $ex1_filed[0];
$ext1_01  = $ex1_filed[1];
$ext1_02  = $ex1_filed[2];
$ext1_03  = $ex1_filed[3];
$ext1_04  = $ex1_filed[4];
$ext1_05  = $ex1_filed[5];
$ext1_06  = $ex1_filed[6];
$ext1_07  = $ex1_filed[7];
$ext1_08  = $ex1_filed[8];
$ext1_09  = $ex1_filed[9];
$ext1_10  = $ex1_filed[10];
$ext1_11  = $ex1_filed[11];
$ext1_12  = $ex1_filed[12];
$ext1_13  = $ex1_filed[13];
$ext1_14  = $ex1_filed[14];
$ext1_15  = $ex1_filed[15];
$ext1_16  = $ex1_filed[16];
$ext1_17  = $ex1_filed[17];
$ext1_18  = $ex1_filed[18];
$ext1_19  = $ex1_filed[19];
$ext1_20  = $ex1_filed[20];

$ex2_filed = explode("|",$write[wr_2]); 
$ext2_00  = $ex2_filed[0]; //비었음
$ext2_01  = $ex2_filed[1]; //비었음
$ext2_02  = $ex2_filed[2]; //비었음
$ext2_03  = $ex2_filed[3]; //비었음
$ext2_04  = $ex2_filed[4];
$ext2_05  = $ex2_filed[5];
$ext2_06  = $ex2_filed[6];
$ext2_07  = $ex2_filed[7];
$ext2_08  = $ex2_filed[8];
$ext2_09  = $ex2_filed[9];
$ext2_10  = $ex2_filed[10];
$ext2_11  = $ex2_filed[11];
$ext2_12  = $ex2_filed[12];
$ext2_13  = $ex2_filed[13];
$ext2_14  = $ex2_filed[14];
$ext2_15  = $ex2_filed[15];
$ext2_16  = $ex2_filed[16];
$ext2_17  = $ex2_filed[17];
$ext2_18  = $ex2_filed[18];
$ext2_19  = $ex2_filed[19]; //비었음

$ex3_filed = explode("|",$write[wr_3]); 
$ext3_00  = $ex3_filed[0];
$ext3_01  = $ex3_filed[1];
$ext3_02  = $ex3_filed[2]; 
$ext3_03  = $ex3_filed[3]; 
$ext3_04  = $ex3_filed[4];
$ext3_05  = $ex3_filed[5];
$ext3_06  = $ex3_filed[6];
$ext3_07  = $ex3_filed[7];
$ext3_08  = $ex3_filed[8];
$ext3_09  = $ex3_filed[9];

//wr_3  지도
//wr_4  프리미엄 등록기간
//wr_5  모집 마감일
//wr_6  스페셜 등록기간
//wr_7  lib에서 wr_6
//wr_8  최신글에 멀티카테고리 표시하기
//wr_9  lib에서 wr_4
//wr_10
?>
<!-- [참고] 옵션필드 --//-->
<div style="height:14px; line-height:1px; font-size:1px;">&nbsp;</div>

<style type="text/css">
.write_head {height:30px; text-align:center; color:#8492A0;}
.field { border:1px solid #ccc; }
.write_fl {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:left;}
.write_flb {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:left;font-weight:bold;}
.write_r {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:right;}
.write_rb {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:right;font-weight:bold;}
.write_fc {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;}
.write_fcb {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;font-weight:bold;}
.write_c {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;}
.write_cb {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;font-weight:bold;}
</style>

<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>

<form name="fwrite" method="post" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null> 
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">

<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>


<div style="border:1px solid #ddd; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
<div style="font-weight:bold; font-size:14px; margin:7px 0 0 10px;">:: <?=$title_msg?> ::</div>
</div>
<div style="height:3px; background:url(<?=$board_skin_path?>/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<colgroup width=90>
<colgroup width=''>
<tr><td colspan="2" style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; height:3px;"></td></tr>
<? if ($is_name) { ?>
<tr>
    <td class=write_head>이 름</td>
    <td><input class='ed' maxlength=20 size=15 name=wr_name itemname="이름" required value="<?=$name?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr>
    <td class=write_head>패스워드</td>
    <td><input class='ed' type=password maxlength=20 size=15 name=wr_password itemname="패스워드" <?=$password_required?>></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr>
    <td class=write_head>이메일</td>
    <td><input class='ed' maxlength=100 size=50 name=wr_email email itemname="이메일" value="<?=$email?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_homepage) { ?>
<tr>
    <td class=write_head>홈페이지</td>
    <td><input class='ed' size=50 name=wr_homepage itemname="홈페이지" value="<?=$homepage?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? 
$option = "";
$option_hidden = "";
if ($is_notice || $is_html || $is_secret || $is_mail) { 
    $option = "";
    if ($is_notice) { 
        $option .= "<input type=checkbox name=notice value='1' $notice_checked>공지&nbsp;";
    }

    if ($is_html) {
        if ($is_dhtml_editor) {
            $option_hidden .= "<input type=hidden value='html1' name='html'>";
        } else {
            $option .= "<input onclick='html_auto_br(this);' type=checkbox value='$html_value' name='html' $html_checked><span class=w_title>html</span>&nbsp;";
        }
    }

    if ($is_secret) {
        if ($is_admin || $is_secret==1) {
            $option .= "<input type=checkbox value='secret' name='secret' $secret_checked><span class=w_title>비밀글</span>&nbsp;";
        } else {
            $option_hidden .= "<input type=hidden value='secret' name='secret'>";
        }
    }
    
    if ($is_mail) {
        $option .= "<input type=checkbox value='mail' name='mail' $recv_email_checked>답변메일받기&nbsp;";
    }
}

echo $option_hidden;
if ($option) {
?>
<tr>
    <td class=write_head>옵 션</td>
    <td align=left><?=$option?></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr><td colspan="2">
<br>
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		
		<table width="100%" cellpadding="0" cellspacing="1">
		    <tr><td width="20%" class=write_cb>구인제목</td>
				  <td width="80%" class=write_fl><input class='ed' style="width:100%;" name=wr_subject id="wr_subject" itemname="제목" required value="<?=$subject?>"></td></tr>
		</table>
</td></tr></table>
</td></tr>


<? if ($is_category) { ?>
<tr><td colspan=2>
<br>
***기본분류
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		
		<table width="100%" cellpadding="0" cellspacing="1">
		    <tr><td width="20%" class=write_cb>기본분류</td>
				  <td width="80%" class=write_fc>
				 &nbsp;(시/도)  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (구/군) &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (과목) &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (분류)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  (성별) <br>
			<?php echo MC::write_input_select($write['ca_name']);?>

			</td></tr>
		</table>
</td></tr></table>
</tr></td>
<? } ?>

<tr><td colspan=2>
<br>
***학원정보
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		
		<table width="100%" cellpadding="0" cellspacing="1">
		    <tr><td width="20%" class=write_cb>학원명</td>
				  <td colspan="3" class=write_fl><INPUT class=ed style="width:220;" name='ext2_18' id='ext2_18' value="<?=$ext2_18?>" maxlength='70'  itemname="회사명" required></td></tr>
			<tr><td width="20%" class=write_cb>설립일 </td>
				  <td width="30%" class=write_fl><INPUT class=ed style="width:150;" name='ext1_00' id='ext1_00' value="<?=$ext1_00?>" onkeydown='onlyNumber(this);' maxlength='70'  itemname="설립연도" > &nbsp;년</td>
			     <td width="20%" class=write_cb>전화번호</td>
				 <td width="30%" class=write_fl>
				 <SELECT name='ext1_05' class='ed' required itemname='전화번호'>
						<option value='02' <? if($ext1_05 == "02") echo "selected"; ?>>02</option>
						<option value='031' <? if($ext1_05 == "031") echo "selected"; ?>>031</option>
						<option value='032' <? if($ext1_05 == "032") echo "selected"; ?>>032</option>
						<option value='033' <? if($ext1_05 == "033") echo "selected"; ?>>033</option>
						<option value='041' <? if($ext1_05 == "041") echo "selected"; ?>>041</option>
						<option value='042' <? if($ext1_05 == "042") echo "selected"; ?>>042</option>
						<option value='043' <? if($ext1_05 == "043") echo "selected"; ?>>043</option>
						<option value='051' <? if($ext1_05 == "051") echo "selected"; ?>>051</option>
						<option value='052' <? if($ext1_05 == "052") echo "selected"; ?>>052</option>
						<option value='053' <? if($ext1_05 == "053") echo "selected"; ?>>053</option>
						<option value='054' <? if($ext1_05 == "054") echo "selected"; ?>>054</option>
						<option value='055' <? if($ext1_05 == "055") echo "selected"; ?>>055</option>
						<option value='061' <? if($ext1_05 == "061") echo "selected"; ?>>061</option>
						<option value='062' <? if($ext1_05 == "062") echo "selected"; ?>>062</option>
						<option value='063' <? if($ext1_05 == "063") echo "selected"; ?>>063</option>
						<option value='064' <? if($ext1_05 == "064") echo "selected"; ?>>064</option>
					  </select> - 
					  <input name='ext1_06' class=ed value='<?=$ext1_06?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='일반전화 두번째자리' class=input>  - 
					  <input name='ext1_07' class=ed value='<?=$ext1_07?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='일반전화 세번째자리' class=input>
				 </td></tr>
			<tr><td class=write_cb>직원수</td>
			      <td class=write_fl>
				  <select class=box name='ext1_01'  required itemname='직원수'>
                      <option value='5명이하' <? if($ext1_01 == "5명이하")	echo "selected"; ?>>5명이하</option>
					  <option value='6-10명이하' <? if($ext1_01 == "6-10명이하")	echo "selected"; ?>>6-10명이하</option>
					  <option value='11-15명이하' <? if($ext1_01 == "11-15명이하")	echo "selected"; ?>>11-15명이하</option>
					  <option value='16-20명이하' <? if($ext1_01 == "16-20명이하")	echo "selected"; ?>>16-20명이하</option>
					  <option value='21-25명이하' <? if($ext1_01 == "21-25명이하")	echo "selected"; ?>>21-25명이하</option>
					  <option value='26-30명이하' <? if($ext1_01 == "26-30명이하")	echo "selected"; ?>>26-30명이하</option>
					  <option value='31명이상' <? if($ext1_01 == "31명이상")	echo "selected"; ?>>31명이상</option>
			</select>
				  </td>
			      <td class=write_cb>원생수</td>
				  <td class=write_fl>
				  <select class=box name='ext1_02'  required itemname='원생수'>
                      <option value='40명이하' <? if($ext1_02 == "4명이하")	echo "selected"; ?>>40명이하</option>
					  <option value='41-80명이하' <? if($ext1_02 == "41-80명이하")	echo "selected"; ?>>41-80명이하</option>
					  <option value='81-120명이하' <? if($ext1_02 == "81-120명이하")	echo "selected"; ?>>81-120명이하</option>
					  <option value='121-150명이하' <? if($ext1_02 == "121-150명이하")	echo "selected"; ?>>121-150명이하</option>
					  <option value='151-180명이하' <? if($ext1_02 == "151-180명이하")	echo "selected"; ?>>151-180명이하</option>
					  <option value='181-200명이하' <? if($ext1_02 == "181-200명이하")	echo "selected"; ?>>181-200명이하</option>
					  <option value='201명이상' <? if($ext1_02 == "201명이상")	echo "selected"; ?>>201명이상</option>
			</select>
				  </td></tr>
			<tr><td class=write_cb>주소</td>
			      <td class=write_fl colspan="3">
				  <input class=ed type=text name='ext3_00' value='<?=$ext3_00?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 앞자리'>
					  - 
					  <input class=ed type=text name='ext3_01' value='<?=$ext3_01?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 뒷자리'>
					  &nbsp;<a href="javascript:;" onclick="win_zip('fwrite', 'ext3_00', 'ext3_01', 'ext3_02', 'ext3_03');"><img  src="<?=$board_skin_path?>/img/icon_addr.gif" height=19 width=85 align='absmiddle' border=0></a>
						<br>
					  <input class=ed type=text name='ext3_02' value='<?=$ext3_02?>' size=60 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='주소'>

					  <input class=ed  type=text name='ext3_03'  value='<?=$ext3_03?>' size=30 <?=$config[cf_req_addr]?'required':'';?> itemname='상세주소'>
						&nbsp;<font color=#999999>(상세주소)</font>
				  
				  </td></tr>
			<tr> <td class=write_cb>홈페이지</td>
			       <td class=write_fl colspan="3">
				    <input type='text' class='ed' size=25 name='wr_link1' itemname='링크' value='<?=$write["wr_link1"]?>'>
			  </td></tr>
		</table>

</td></tr></table>
</td></tr>

<tr><td colspan=2>
<br>
***모집요강
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>수강대상</td>
				  <td width="20%" class=write_cb>모집인원</td>
				  <td width="20%" class=write_cb>학력</td>
				  <td width="20%" class=write_cb>경력</td>
				  <td width="20%" class=write_cb>나이</td></tr>
			<!--수강대상-->
			<tr><td class=write_fc>
				<select name="ext1_09" required itemname='수강대상'>
					<option value="">선택하세요</option>
					<option value="초등부" <? if($ext1_09 == "초등부")	 echo "selected"; ?>>초등부</option>
					<option value="중등부" <? if($ext1_09 == "중등부")	 echo "selected"; ?>>중등부</option>
					<option value="고등부" <? if($ext1_09 == "고등부")	 echo "selected"; ?>>고등부</option>
					<option value="초중등부" <? if($ext1_09 == "초중등부")	 echo "selected"; ?>>초중등부</option>
					<option value="중고등부" <? if($ext1_09 == "중고등부")	 echo "selected"; ?>>중고등부</option>
					<option value="초중고" <? if($ext1_09 == "초중고")	 echo "selected"; ?>>초중고</option>
					<option value="성인반" <? if($ext1_09 == "성인반")	 echo "selected"; ?>>성인반</option>
					<option value="기타" <? if($ext1_09 == "기타")	 echo "selected"; ?>>기타</option>
			   </select>	
				</td>
				  <!--모집인원-->
				  <td class=write_fc><input name='ext1_10' class=ed value='<?=$ext1_10?>' type='text' size='10' maxlength='7' onKeyDown='onlyNumber(this);' required itemname='모집인원'>&nbsp;명</td>
				  <!--학력-->
				  <td class=write_fc>
				  <select name="ext1_12" required itemname='경력'>
						<option value="">선택하세요</option>
						<option value="무관" <? if($ext1_12 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="전문대졸" <? if($ext1_12 == "전문대졸")	 echo "selected"; ?>>전문대졸</option>
						<option value="대졸" <? if($ext1_12 == "대졸")	 echo "selected"; ?>>대졸</option>
						<option value="대학원졸" <? if($ext1_12 == "대학원졸")	 echo "selected"; ?>>대학원졸</option>
				</select>
				  </td>
				  <!--경력-->
				  <td class=write_fc>
				  <select name="ext1_11" required itemname='경력'>
						<option value="">선택하세요</option>
						<option value="무관" <? if($ext1_11 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="1년이상" <? if($ext1_11 == "1년이상") echo "selected"; ?>>1년이상</option>
						<option value="2년이상" <? if($ext1_11 == "2년이상") echo "selected"; ?>>2년이상</option>
						<option value="3년이상" <? if($ext1_11 == "3년이상") echo "selected"; ?>>3년이상</option>
						<option value="4년이상" <? if($ext1_11 == "4년이상") echo "selected"; ?>>4년이상</option>
						<option value="5년이상" <? if($ext1_11 == "5년이상") echo "selected"; ?>>5년이상</option>
						<option value="6년이상" <? if($ext1_11 == "6년이상") echo "selected"; ?>>6년이상</option>
						<option value="7년이상" <? if($ext1_11 == "7년이상") echo "selected"; ?>>7년이상</option>
						<option value="8년이상" <? if($ext1_11 == "8년이상") echo "selected"; ?>>8년이상</option>
						<option value="9년이상" <? if($ext1_11 == "9년이상") echo "selected"; ?>>9년이상</option>
						<option value="10년이상" <? if($ext1_11 == "10년이상") echo "selected"; ?>>10년이상</option>
						</select>
				</td>
				  
				  <!--나이-->
				  <td class=write_fc>
					<SELECT name='ext1_13' class='ed' required itemname='나이'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='무관' <? if($ext1_13 == "무관") echo "selected"; ?>>무관</option>
						<option value='23세 이하' <? if($ext1_13 == "23세 이하") echo "selected"; ?>>23세 이하</option>
						<option value='24세 이하' <? if($ext1_13 == "24세 이하") echo "selected"; ?>>24세 이하</option>
						<option value='25세 이하' <? if($ext1_13 == "25세 이하") echo "selected"; ?>>25세 이하</option>
						<option value='26세 이하' <? if($ext1_13 == "26세 이하") echo "selected"; ?>>26세 이하</option>
						<option value='27세 이하' <? if($ext1_13 == "27세 이하") echo "selected"; ?>>27세 이하</option>
						<option value='28세 이하' <? if($ext1_13 == "28세 이하") echo "selected"; ?>>28세 이하</option>
						<option value='29세 이하' <? if($ext1_13 == "29세 이하") echo "selected"; ?>>29세 이하</option>
						<option value='30세 이하' <? if($ext1_13 == "30세 이하") echo "selected"; ?>>30세 이하</option>
						<option value='31세 이하' <? if($ext1_13 == "31세 이하") echo "selected"; ?>>31세 이하</option>
						<option value='32세 이하' <? if($ext1_13 == "32세 이하") echo "selected"; ?>>32세 이하</option>
						<option value='33세 이하' <? if($ext1_13 == "33세 이하") echo "selected"; ?>>33세 이하</option>
						<option value='34세 이하' <? if($ext1_13 == "34세 이하") echo "selected"; ?>>34세 이하</option>
						<option value='35세 이하' <? if($ext1_13 == "35세 이하") echo "selected"; ?>>35세 이하</option>
						<option value='36세 이하' <? if($ext1_13 == "36세 이하") echo "selected"; ?>>36세 이하</option>
						<option value='37세 이하' <? if($ext1_13 == "37세 이하") echo "selected"; ?>>37세 이하</option>
						<option value='38세 이하' <? if($ext1_13 == "38세 이하") echo "selected"; ?>>38세 이하</option>
						<option value='39세 이하' <? if($ext1_13 == "39세 이하") echo "selected"; ?>>39세 이하</option>
						<option value='40세 이하' <? if($ext1_13 == "40세 이하") echo "selected"; ?>>40세 이하</option>
						<option value='41세 이하' <? if($ext1_13 == "41세 이하") echo "selected"; ?>>41세 이하</option>
						<option value='42세 이하' <? if($ext1_13 == "42세 이하") echo "selected"; ?>>42세 이하</option>
						<option value='43세 이하' <? if($ext1_13 == "43세 이하") echo "selected"; ?>>43세 이하</option>
						<option value='44세 이하' <? if($ext1_13 == "44세 이하") echo "selected"; ?>>44세 이하</option>
						<option value='45세 이하' <? if($ext1_13 == "45세 이하") echo "selected"; ?>>45세 이하</option>
						<option value='46세 이하' <? if($ext1_13 == "46세 이하") echo "selected"; ?>>46세 이하</option>
						<option value='47세 이하' <? if($ext1_13 == "47세 이하") echo "selected"; ?>>47세 이하</option>
						<option value='48세 이하' <? if($ext1_13 == "48세 이하") echo "selected"; ?>>48세 이하</option>
						<option value='49세 이하' <? if($ext1_13 == "49세 이하") echo "selected"; ?>>49세 이하</option>
						<option value='50세 이하' <? if($ext1_13 == "50세 이하") echo "selected"; ?>>50세 이하</option>
						<option value='51세 이하' <? if($ext1_13 == "51세 이하") echo "selected"; ?>>51세 이하</option>
						<option value='52세 이하' <? if($ext1_13 == "52세 이하") echo "selected"; ?>>52세 이하</option>
						<option value='53세 이하' <? if($ext1_13 == "53세 이하") echo "selected"; ?>>53세 이하</option>
						<option value='54세 이하' <? if($ext1_13 == "54세 이하") echo "selected"; ?>>54세 이하</option>
						<option value='55세 이하' <? if($ext1_13 == "55세 이하") echo "selected"; ?>>55세 이하</option>
					 </SELECT>
		  
				  
				  </td>				  
			</tr></table>
</td></tr></table>

<br>
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>수업일수</td>
				  <td width="80%" class=write_fl>
				  <SELECT name='ext2_15' class='ed' required itemname='수업일수'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='주 1일' <? if($ext2_15 == "주 1일") echo "selected"; ?>>주 1일</option>
						<option value='주 2일' <? if($ext2_15 == "주 2일") echo "selected"; ?>>주 2일</option>
						<option value='주 3일' <? if($ext2_15 == "주 3일") echo "selected"; ?>>주 3일</option>
						<option value='주 4일' <? if($ext2_15 == "주 4일") echo "selected"; ?>>주 4일</option>
						<option value='주 5일' <? if($ext2_15 == "주 5일") echo "selected"; ?>>주 5일</option>
						<option value='주 6일' <? if($ext2_15 == "주 6일") echo "selected"; ?>>주 6일</option>
						<option value='주 7일' <? if($ext2_15 == "주 7일") echo "selected"; ?>>주 7일</option>
					</SELECT>
				  </td></tr>
			<tr><td class=write_cb>주당수업시간</td>
				  <td class=write_fl><INPUT class=ed style="width:80;" name='ext2_16' id='ext2_16' value="<?=$ext2_16?>" maxlength='70'  itemname="수업시간"> &nbsp;시간/주</td></tr>
		</table>
</td></tr></table>
</td></tr>


<tr><td colspan="2">
<br>
***제출서류/전형방법/급여사항
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>제출서류</td>
				  <td width="80%" class=write_fl>
				  <INPUT class=ed style="width:98%;" name='ext1_03' id='ext1_03' value="<?=$ext1_03?>" maxlength='70'  itemname="제출서류" required></td></tr>
			<tr><td class=write_cb>시강유무</td>
				  <td class=write_fl>
				  
		  <INPUT type=radio name='ext1_04' required VALUE="시강있음" <? if($ext1_04 == "시강 있음")  echo "checked"; ?> checked>시강 있음 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <INPUT type=radio name='ext1_04' required VALUE="시강없음" <? if($ext1_04 == "시강 없음")  echo "checked"; ?> >시강 없음
				  </td></tr>
		  <tr><td class=write_cb>급여사항</td>
				  <td class=write_fl>
				  최소 &nbsp;<INPUT class=ed style="width:80;text-align:right;" name='ext1_14' id='ext1_14' value="<?=$ext1_14?>" maxlength='70' onkeydown='onlyNumber(this);'  itemname="최소급여"> &nbsp;만원 &nbsp;&nbsp;&nbsp;&nbsp;
						  최대 &nbsp;<INPUT class=ed style="width:80;text-align:right;" name='ext1_15' id='ext1_15' value="<?=$ext1_15?>" maxlength='70' onkeydown='onlyNumber(this);'  itemname="최대급여">&nbsp;만원&nbsp;&nbsp;&nbsp;&nbsp;
			    <INPUT type=radio name='ext1_08' VALUE="협의후결정" <? if($ext1_08 == "협의후결정")  echo "checked"; ?>>협의후결정
				  </td></tr>
		<tr><td class=write_cb>퇴직금</td>
				  <td class=write_fl>
				  <INPUT type=radio name='ext1_16' required  VALUE="유" <? if($ext1_16 == "유")  echo "checked"; ?> >유 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<INPUT type=radio name='ext1_16' required  VALUE="무" <? if($ext1_16 == "무")  echo "checked"; ?> >무
				  </td></tr>
        <tr><td class=write_cb>마감일</td>
				  <td class=write_fl>
				  <input id="date" name='wr_5' maxlength="20" class=ed style="width:120;text-align:right;" required  value="<?=$write[wr_5]?>" maxlength='20'  itemname="달력1" />&nbsp;
                         <button height="10" onclick="win_calendar('date', document.getElementById('date').value, '-')"> 선택
				  </td></tr>
	  </table>
</td></tr></table>

</td></tr>

<tr><td colspan="2">
<br>
***접수방법
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>접수방법</td>
				  <td width="80%" class=write_fl>
				    <input type=checkbox name="ext1_17" value="온라인 지원" <? if($ext1_17 == "온라인 지원")	 echo "checked"; ?>> 온라인 지원
				    <input type=checkbox name="ext1_18" value="이메일 지원" <? if($ext1_18 == "이메일 지원")	 echo "checked"; ?>> 이메일 지원
				    <input type=checkbox name="ext1_19" value="직접방문" <? if($ext1_19 == "직접방문")	 echo "checked"; ?>> 직접방문
				    <input type=checkbox name="ext1_20" value="전화문의" <? if($ext1_20 == "전화문의")	 echo "checked"; ?>> 전화문의
	                 &nbsp;&nbsp;기타&nbsp;:&nbsp;<INPUT class=ed style="width:200;text-align:right;" name='ext2_09' value="<?=$ext2_09?>" maxlength='40'  itemname="기타지원방법"><br>
	<FONT color=#BF7878>※ 온라인 지원선택시 지원사이트, 이메일지원시 담당자 이메일을 필히 써 주십시오.</font>
				  </td></tr>
			<tr><td class=write_cb>담당자</td>
				  <td class=write_fl>
				  <INPUT class=ed style="width:120;text-align:right;" name='ext2_04' id='ext2_04' value="<?=$ext2_04?>" maxlength='70' itemname="담당자" required>
				  </td></tr>
			<tr><td class=write_cb>연락처</td>
				  <td class=write_fl>
				  <SELECT name='ext2_05' class='ed' required itemname='핸폰'>
		<option value=''>선택</option>
        <option value='010' <? if($ext2_05 == "010") echo "selected"; ?>>010</option>
        <option value='011' <? if($ext2_05 == "011") echo "selected"; ?>>011</option>
        <option value='016' <? if($ext2_05 == "016") echo "selected"; ?>>016</option>
        <option value='019' <? if($ext2_05 == "019") echo "selected"; ?>>019</option>
      </select> - 
      <input name='ext2_06' class=ed value='<?=$ext2_06?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='일반전화 두번째자리' class=input>  - 
      <input name='ext2_07' class=ed value='<?=$ext2_07?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='일반전화 세번째자리' class=input>
	  </td></tr>
	  <tr><td class=write_cb>담당자 이메일</td>
	 <td class=write_fl><input class='ed' maxlength=100 size=50 name=ext2_08 itemname="메일" value="<?=$ext2_08?>"></td>
	 </tr>
			<tr><td class=write_cb>인근교통</td>
				  <td class=write_fl><INPUT class=ed style="width:98%;" name='ext2_17' id='ext2_17' value="<?=$ext2_17?>" maxlength='100'  itemname="인근교통"></td></tr>
		</table>
</td></tr></table>
</td></tr>

<? if ($w == "") { ?>
<tr><td colspan="2">
<br>
***광고노출(수정이 안되므로 신중히 선택하십시오.)<br>****현재 <?=$member[mb_id]?>님의 포인트는  <font color=#FF0000><?=$member[mb_point]?></font>점입니다.
<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>스페셜등록</td>
				  <td width="30%" class=write_fl>
				  <input name='wr_6' type="radio" value="-1" <? if ($write['wr_6'] == '-1') echo'checked';?> checked>등록안함<br>
				  <input name='wr_6' type="radio" value="1" <? if ($write['wr_6'] == '1') echo'checked';?>>1일&nbsp;(100포인트 차감)<br>
				  <input name='wr_6' type="radio" value="2" <? if ($write['wr_6'] == '2') echo'checked';?>>2일&nbsp;(200포인트 차감)<br>
				  <input name='wr_6' type="radio" value="3" <? if ($write['wr_6'] == '3') echo'checked';?>>3일&nbsp;(300포인트 차감)<br>
				   <input name='wr_6' type="radio" value="4" <? if ($write['wr_6'] == '4') echo'checked';?>>4일&nbsp;(400포인트 차감)
				  </td>
				  <td width="50%" class=write_fc><img src="<?=$board_skin_path?>/img/sample_1.jpg"><br> 메인페이지 상단에 노출됩니다.</td>
			</tr></table>
</td></tr></table>
<br>

<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	<tr><td>
		<table width="100%" cellpadding="0" cellspacing="1">
			<tr><td width="20%" class=write_cb>프리미엄등록</td>
				  <td width="30%" class=write_fl>
				  <input name='wr_4' type="radio" value="-1" <? if ($write['wr_4'] == '-1') echo'checked';?> checked>등록안함<br>
				  <input name='wr_4' type="radio" value="1" <? if ($write['wr_4'] == '1') echo'checked';?>>1일&nbsp;(10포인트 차감)<br>
				  <input name='wr_4' type="radio" value="2" <? if ($write['wr_4'] == '2') echo'checked';?>>2일&nbsp;(20포인트 차감)<br>
				  <input name='wr_4' type="radio" value="3" <? if ($write['wr_4'] == '3') echo'checked';?>>3일&nbsp;(30포인트 차감)<br>
				   <input name='wr_4' type="radio" value="4" <? if ($write['wr_4'] == '4') echo'checked';?>>4일&nbsp;(40포인트 차감)
				  </td>
				  <td width="50%" class=write_fc><img src="<?=$board_skin_path?>/img/sample_2.jpg"><br> 메인페이지 하단에 노출됩니다.</td>
			</tr></table>
</td></tr></table>
</td></tr>
<br>
<?}?>

<tr><td colspan="2"><br>***세부내용<br></td></tr>

<tr>
    <td class='write_head' style='padding:5 0 5 10;' colspan='2'>
	
        <? if ($is_dhtml_editor) { ?>
            <?=cheditor2('wr_content', $content);?>
        <? } else { ?>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif"></span></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>글자<?}?></td>
        </tr>
        </table>
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="내용" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
    </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#dddddd></td></tr>

<? if ($is_link) { ?>
<? for ($i=2; $i<=$g4[link_count]; $i++) { ?>
<tr>
    <td class=write_head>링크 #<?=$i?></td>
    <td><input type='text' class='ed' size=50 name='wr_link<?=$i?>' itemname='링크 #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>
<? } ?>

<? if ($is_file) { ?>
<tr>
    <td class=write_head>
        <table cellpadding=0 cellspacing=0>
        <tr>
            <td class=write_head style="padding-top:10px; line-height:20px;">
                학원로고등록<br> 
                <span onclick="add_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_add.gif"></span> 
                <span onclick="del_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_minus.gif"></span>
            </td>
        </tr>
        </table>
    </td>
    <td style='padding:5 0 5 0;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script type="text/javascript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("이 게시판은 "+upload_count+"개 까지만 파일 업로드가 가능합니다.");
                return;
            }

            var objTbl;
            var objRow;
            var objCell;
            if (document.getElementById)
                objTbl = document.getElementById("variableFiles");
            else
                objTbl = document.all["variableFiles"];

            objRow = objTbl.insertRow(objTbl.rows.length);
            objCell = objRow.insertCell(0);

            objCell.innerHTML = "<input type='file' class='ed' name='bf_file[]' title='파일 용량 <?=$upload_max_filesize?> 이하만 업로드 가능'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class='ed' size=50 name='bf_content[]' title='업로드 이미지 파일에 해당 되는 내용을 입력하세요.'>";
                <? } ?>
                ;
            }

            flen++;
        }

        <?=$file_script; //수정시에 필요한 스크립트?>

        function del_file()
        {
            // file_length 이하로는 필드가 삭제되지 않아야 합니다.
            var file_length = <?=(int)$file_length?>;
            var objTbl = document.getElementById("variableFiles");
            if (objTbl.rows.length - 1 > file_length)
            {
                objTbl.deleteRow(objTbl.rows.length - 1);
                flen--;
            }
        }
        </script>
		이미지 사이즈는 120 x 50 이 적당합니다.
		</td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_trackback) { ?>
<tr>
    <td class=write_head>트랙백주소</td>
    <td><input class='ed' size=50 name=wr_trackback itemname="트랙백" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">핑 보냄<? } ?></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_guest) { ?>
<tr>
    <td class=write_head><img id='kcaptcha_image' /></td>
    <td><input class='ed' type=input size=10 name=wr_key itemname="자동등록방지" required>&nbsp;&nbsp;왼쪽의 글자를 입력하세요.</td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="100%" align="center" valign="top" style="padding-top:30px;">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
</tr>
</table>

</td></tr></table>
</form>
<script>
function onlyNumber(objtext1){
var inText = objtext1.value;
var ret;

for (var i = 0; i < inText.length; i++) {
ret = inText.charCodeAt(i);
if (!((ret > 47) && (ret < 58))) {
alert("숫자만을 입력하세요");
objtext1.value = "";
objtext1.focus();
return false;
}
}
if (objtext1.value.length==6) {
document.form1.RNI_idnum2.focus() ;
}
return true;
}
</script>
<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
<?
// 관리자라면 분류 선택에 '공지' 옵션을 추가함
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
       // document.fwrite.ca_name.options.length += 1;
        //document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '공지';
        //document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '공지';
    }";
} 
?>

with (document.fwrite) 
{
    if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();

    if (typeof(ca_name) != "undefined")
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj) 
{
    if (obj.checked) {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_submit(f) 
{
    /*
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("제목에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }
    */

    if (document.getElementById('char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(document.getElementById('char_count').innerHTML);
            if (char_min > 0 && char_min > cnt) {
                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                return false;
            } 
            else if (char_max > 0 && char_max < cnt) {
                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                return false;
            }
        }
    }

    if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('내용을 입력하십시오.'); 
            ed_wr_content.returnFalse();
            return false;
        }
    }

    <?
    if ($is_dhtml_editor) echo cheditor3('wr_content');
    ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: "<?=$board_skin_path?>/ajax.filter.php",
        type: "POST",
        data: {
            "subject": f.wr_subject.value,
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (subject) {
        alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        if (typeof(ed_wr_content) != "undefined") 
            ed_wr_content.returnFalse();
        else 
            f.wr_content.focus();
        return false;
    }

    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';";
    else
        echo "f.action = './write_update.php';";
    ?>
    
    return true;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>
