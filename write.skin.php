<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($w == "") {
	$title_msg = "원룸 등록";
 } else if ($w == "u") {
	$title_msg = "원룸 수정";
 } else {
	$title_msg = "";
}

// TEXT 로 작성된 글 에디터로 수정할 때 한줄로 나오는 문제해결
$html = 0;
if (strstr($write['wr_option'], "html1")) $html = 1;
if (strstr($write['wr_option'], "html2")) $html = 2;

if ($html == 0 && $is_dhtml_editor) {
    $content = nl2br($content);
}

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}


$today = date('Y-m-d');
$timenum = date('is');
$today = explode("-",$today);

srand((double) microtime()*1000000);
$randnum=rand(101,999);

$etc7_exp=explode("|" , $write[wr_7]);
$etc7_exp00 = $etc7_exp[0];
$etc7_exp01 = $etc7_exp[1];
$etc7_exp02 = $etc7_exp[2];
$etc7_exp03 = $etc7_exp[3];
$etc7_exp04 = $etc7_exp[4];
$etc7_exp05 = $etc7_exp[5];
$etc7_exp06 = $etc7_exp[6];
$etc7_exp07 = $etc7_exp[7];
$etc7_exp08 = $etc7_exp[8];
$etc7_exp09 = $etc7_exp[9];
$etc7_exp10 = $etc7_exp[10];
$etc7_exp11 = $etc7_exp[11];
$etc7_exp12 = $etc7_exp[12];
$etc7_exp13 = $etc7_exp[13];
$etc7_exp14 = $etc7_exp[14];
$etc7_exp15 = $etc7_exp[15];
$etc7_exp16 = $etc7_exp[16];

$etc8_exp = explode("|",$write[wr_8]); 
$etc8_exp00  = $etc8_exp[0]; 
$etc8_exp01  = $etc8_exp[1]; 
$etc8_exp02  = $etc8_exp[2]; 
$etc8_exp03  = $etc8_exp[3]; 
$etc8_exp04  = $etc8_exp[4]; 
$etc8_exp05  = $etc8_exp[5]; 
$etc8_exp06  = $etc8_exp[6]; 
$etc8_exp07  = $etc8_exp[7]; 
$etc8_exp08  = $etc8_exp[8]; 
$etc8_exp09  = $etc8_exp[9]; 
$etc8_exp10  = $etc8_exp[10]; 
$etc8_exp11  = $etc8_exp[11]; 
$etc8_exp12  = $etc8_exp[12]; 
$etc8_exp13  = $etc8_exp[13]; 
$etc8_exp14  = $etc8_exp[14]; 
$etc8_exp15  = $etc8_exp[15]; 
$etc8_exp16  = $etc8_exp[16]; 
$etc8_exp17  = $etc8_exp[17]; 
$etc8_exp18  = $etc8_exp[18]; 
$etc8_exp19  = $etc8_exp[19]; 
$etc8_exp20  = $etc8_exp[20]; 
$etc8_exp21  = $etc8_exp[21]; 
$etc8_exp22  = $etc8_exp[22]; 
$etc8_exp23  = $etc8_exp[23]; 


$etc9_exp = explode("|",$write[wr_9]);
$etc9_exp00 = $etc9_exp[0];
$etc9_exp01 = $etc9_exp[1];
$etc9_exp02 = $etc9_exp[2];
$etc9_exp03 = $etc9_exp[3];
$etc9_exp04 = $etc9_exp[4];
$etc9_exp05 = $etc9_exp[5];
$etc9_exp06 = $etc9_exp[6];
$etc9_exp07 = $etc9_exp[7];
$etc9_exp08 = $etc9_exp[8];
$etc9_exp09 = $etc9_exp[9];
$etc9_exp10 = $etc9_exp[10];
$etc9_exp11 = $etc9_exp[11];
$etc9_exp12 = $etc9_exp[12];
$etc9_exp13 = $etc9_exp[13];
$etc9_exp14 = $etc9_exp[14];
$etc9_exp15 = $etc9_exp[15];
$etc9_exp16 = $etc9_exp[16];
$etc9_exp17 = $etc9_exp[17];
$etc9_exp18 = $etc9_exp[18];
$etc9_exp19 = $etc9_exp[19];
$etc9_exp20 = $etc9_exp[20];
$etc9_exp21 = $etc9_exp[21];
$etc9_exp22 = $etc9_exp[22];
$etc9_exp23 = $etc9_exp[23];
$etc9_exp24 = $etc9_exp[24];
$etc9_exp25 = $etc9_exp[25];
$etc9_exp26 = $etc9_exp[26];
$etc9_exp27 = $etc9_exp[27];
$etc9_exp28 = $etc9_exp[28];
$etc9_exp29 = $etc9_exp[29];
$etc9_exp30 = $etc9_exp[30];
$etc9_exp31 = $etc9_exp[31];
$etc9_exp32 = $etc9_exp[32];
$etc9_exp33 = $etc9_exp[33];
$etc9_exp34 = $etc9_exp[34];
$etc9_exp35 = $etc9_exp[35];
$etc9_exp36 = $etc9_exp[36];
$etc9_exp37 = $etc9_exp[37];


$etc13_exp=explode("|" , $write[wr_12]);
$etc13_exp00 = $etc13_exp[0];
$etc13_exp01 = $etc13_exp[1];
$etc13_exp02 = $etc13_exp[2];
$etc13_exp03 = $etc13_exp[3];
$etc13_exp04 = $etc13_exp[4];
$etc13_exp05 = $etc13_exp[5];
$etc13_exp06 = $etc13_exp[6];
$etc13_exp07 = $etc13_exp[7];
$etc13_exp08 = $etc13_exp[8];
$etc13_exp09 = $etc13_exp[9];
$etc13_exp10 = $etc13_exp[10];


$etc22_exp = explode("|",$write[wr_22]);
$etc22_exp00 = $etc22_exp[0];
$etc22_exp01 = $etc22_exp[1];
$etc22_exp02 = $etc22_exp[2];
$etc22_exp03 = $etc22_exp[3];
$etc22_exp04 = $etc22_exp[4];
$etc22_exp05 = $etc22_exp[5];
$etc22_exp06 = $etc22_exp[6];
$etc22_exp07 = $etc22_exp[7];
$etc22_exp08 = $etc22_exp[8];
$etc22_exp09 = $etc22_exp[9];
$etc22_exp10 = $etc22_exp[10];
$etc22_exp11 = $etc22_exp[11];
$etc22_exp12 = $etc22_exp[12];
$etc22_exp13 = $etc22_exp[13];
$etc22_exp14 = $etc22_exp[14];
$etc22_exp15 = $etc22_exp[15];
$etc22_exp16 = $etc22_exp[16];
$etc22_exp17 = $etc22_exp[17];
$etc22_exp18 = $etc22_exp[18];
$etc22_exp19 = $etc22_exp[19];
$etc22_exp20 = $etc22_exp[20];
$etc22_exp21 = $etc22_exp[21];
$etc22_exp22 = $etc22_exp[22];
$etc22_exp23 = $etc22_exp[23];
$etc22_exp24 = $etc22_exp[24];
$etc22_exp25 = $etc22_exp[25];
$etc22_exp26 = $etc22_exp[26];
$etc22_exp27 = $etc22_exp[27];
$etc22_exp28 = $etc22_exp[28];
$etc22_exp29 = $etc22_exp[29];
$etc22_exp30 = $etc22_exp[30];


?>
<style type="text/css">
.write_head { padding:5px 0 5px 20px; height:30px; background-color:#F9F9F9; width:130px; font-weight:bold; color:#000; font-family:dotum; line-height:15px; }
.write_main { padding:5px 0 5px 10px; }
.write_size { color:#999999; font-size:11px; font-weight:normal; margin-left:10px; }

.smfont777 { font-size:10pt; color:#336699; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont788 { font-size:10pt; color:#ff6600; font-weight:bold; font-family:맑은 고딕, 돋움;}
.smfont799 { font-size:10pt; color:#009966; font-weight:bold; font-family:맑은 고딕, 돋움;}
</style>
<script type="text/javascript">

if (document.getElementById){
document.write('<style type="text/css">\n')
document.write('.content_box{display:none;}\n')
document.write('</style>\n')
}

</script>


<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>
<script>
var _skin_path = "<?=$board_skin_path?>";
</script>
<script type="text/javascript" src="<?=$board_skin_path?>/ajax_form.jquery.js"></script>



<form name="fwrite" method="post" onsubmit="return fwrite_check(this);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null> 
<input type=hidden name=w        value="<?=$w?>">

<input type=hidden name=bo_table id="reg_bo_table" value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">
<input type=hidden name=etc8_exp00 value="<?=$member[mb_nick]?>"> 
<input type=hidden name=etc8_exp01 value="<?=$member[mb_id]?>"> 
<input type=hidden name=etc8_exp02 value="<?=$member[mb_name]?>"> 
<input type=hidden name=etc8_exp03 value="<?=$member[mb_hp]?>"> 
<input type=hidden name=etc8_exp04 value="<?=$member[mb_tel]?>"> 
<input type=hidden name=etc8_exp05 value="<?=$member[mb_addr1]?>">
<input type=hidden name=etc8_exp06 value="<?=$member[mb_addr1]?>">
<input type=hidden name=etc8_exp07 value="<?=$member[mb_email]?>">
<input type=hidden name=wr_5 value="<?=$timenum?><?=$randnum?>">
<input type=hidden name=wr_subject_enabled    value="" id="wr_subject_enabled">
<? if ($w == 'u') {?>
<input type=hidden name=chk_wr_subject id=chk_wr_subject value="<?=$subject?>">
<?}?>

<? 
$option = "";
$option_hidden = "";
if ($is_html) { 
    $option = "";

    if ($is_html) {
        if ($is_dhtml_editor) {
            $option_hidden .= "<input type=hidden value='html1' name='html'>";
        } else {
            $option .= "<input onclick='html_auto_br(this);' type=checkbox value='$html_value' name='html' $html_checked><span class=w_title>html</span>&nbsp;";
        }
    }
    
  
}

echo $option_hidden;
if ($option) {
?>

<?//=$option?>

<? } ?>

<table width="770" align=center cellpadding=0 cellspacing=0><tr><td>

<table width="770" border="0" cellspacing="0" cellpadding="0">
<colgroup width=80>
<colgroup width=''>
<tr><td colspan=2 height=2 bgcolor="#0A7299"></td></tr>
<tr><td style='padding-left:20px' colspan=2 height=38 bgcolor="#FBFBFB" align=center><strong><?=$title_msg?></strong>&nbsp;&nbsp;&nbsp;<!--a href="./board.php?bo_table=<?=$bo_table?>&page=<?=$page?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a--></td></tr>
<tr><td colspan="2" style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; height:3px;"></td></tr>


<? if ($is_admin) { ?> 

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>



<? } ?>



<!------ // 시작 // -------->

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class=write_head style="height:20px;">&middot; 건물명(원룸명)</td>
    <td class=write_main bgcolor="#ffffff">



<input class='ed' style="width:50%;" style="ime-mode:active" required name=wr_subject id="reg_wr_subject" itemname="원룸명" required value="<?=$write[wr_subject]?>" <? if ($w=='' || $w == 'u') { echo "onblur='reg_wr_subject_check();'"; } ?>>  <span id='msg_wr_subject'></span>
     
    </td>
</tr>


<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class=write_head style="height:20px;">&middot; 제목</td>
    <td class=write_main bgcolor="#ffffff">

 <input class=ed style="width:60%;" name=wr_4 itemname="제목" value="<?=$write[wr_4]?>" style="ime-mode:active" required>
 <div class=write_size style="line-height:25px;">예)북부해수욕장 두호대원맨션부근 40인치 벽걸이TV</div>
     
    </td>
</tr>



<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class=write_head style="height:60px;">&middot; 위치(지도)</td>
    <td class=write_main bgcolor="#ffffff">
 <table width="100%" align=center cellpadding=0 cellspacing=0>
 
	             <tr> 
           
            <td height="25"> <input class=ed type=text name='etc8_exp11' value='<?=$etc8_exp11?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 앞자리'>
              - 
              <input class=ed type=text name='etc8_exp12' value='<?=$etc8_exp12?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 뒷자리'> 
              &nbsp;<a href="javascript:;" onclick="win_zip('fwrite', 'etc8_exp11', 'etc8_exp12', 'etc8_exp13', 'etc8_exp14');"><img  src="<?=$board_skin_path?>/img/icon_addr.gif" height=19 width=85 align='absmiddle' border=0></a> 			
            </td>
          </tr>
          <tr> 
          
            <td height="25"> <input class=ed type=text name='etc8_exp13' value='<?=$etc8_exp13?>' size=60 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='주소' required> 
            </td>
          </tr>
          <tr> 
          
            <td height="25" colspan="2"> <input class=ed  type=text name='etc8_exp14'  value='<?=$etc8_exp14?>' size=60 <?=$config[cf_req_addr]?'required':'';?> itemname='상세주소' required> 
              &nbsp;<font color=#999999>(상세주소)</font> </td>
          </tr>							

                                    
							
 
 </table>

     
    </td>
</tr>


<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class=write_head style="height:60px;">&middot; 거래구분</td>
    <td class=write_main bgcolor="#ffffff">
 <table width="100%" align=center cellpadding=0 cellspacing=0>
 

										  <tr>
	<td height="30"><img src='<?=$board_skin_path?>/img/dot_write_01.gif'> 매물형태 </td>
	<td colspan="3">
	<input type="checkbox" name="etc7_exp02" value="월세(임대)" <?if($etc7_exp[2] == '월세(임대)'):?> checked<?endif;?> checked>월세(임대)
    <input type="checkbox" name="etc7_exp01" value="전세" <?if($etc7_exp[1] == '전세'):?> checked<?endif;?>>전세
	<!--input type="checkbox" name="etc7_exp00" value="매매" <?if($etc7_exp[0] == '매매'):?> checked<?endif;?>>매매--></td></tr>
<tr>
    <td colspan="4" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>

<tr>
	<td height="30"><img src='<?=$board_skin_path?>/img/dot_write_01.gif'> 월세가 </td>
	<td colspan="3">보증금
<input type="text" name="etc7_exp06" size="7" class='simpleform' value="<?=$etc7_exp[6]?>">
만원, 월세
<input type="text" name="etc7_exp07" size="7" class='simpleform' value="<?=$etc7_exp[7]?>">
만원 </td>
</tr>

<tr>
    <td colspan="4" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
		
<tr>
	<td height="30"><img src='<?=$board_skin_path?>/img/dot_write_01.gif'> 전세가 </td>
	<td colspan="3">전세금
<input type="text" name="etc7_exp05" size="7" class='simpleform' value="<?=$etc7_exp[5]?>">
만원</td>
</tr>

		                                 
	

 </table>

     
    </td>
</tr>



<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class=write_head style="height:60px;">&middot; 상세정보</td>
    <td class=write_main bgcolor="#ffffff">
	
	
	

       <table width="100%" cellspacing="2" bgcolor="#FFFFFF">
          <tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" align="center">
                <tr>
                  <td bgcolor="ffffff"><table width="100%">

                      <tr>
                        <td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'>면적</td>
                        <td>
						<table width=100% cellspacing=0 cellpadding=0>
<tr>
   <td colspan="2" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
                      <tr>
                        <td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'>준공년도</td>
                       <td height="30" colspan="3">
		<input class=m_text type=text id=etc7_exp15 name='etc7_exp15' size=8 maxlength=8 numeric itemname='준공년도' value="<?=$etc7_exp15?>">예)20120503
	
	</td>
                      </tr>

<tr>
   <td colspan="2" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
                      <tr>
                        <td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'>월관리비</td>
                        <td> <input name=etc7_exp16 value="<?=$etc7_exp16?>" style=width:10% itemname="월관리비" class="ed" numeric style="ime-mode:active" required> 만원</td>
                      </tr>

<tr>
   <td colspan="2" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
                      <tr>
                        <td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'>방/욕실</td>
                        <td> 방 <input name=etc13_exp02 value="<?=$etc13_exp02?>" style=width:10% itemname="방" class="input" numeric>개 
              / 욕실 <input name=etc13_exp03 value="<?=$etc13_exp03?>" style=width:10% itemname="욕실" class="input" numeric>개</td>
                      </tr>
				
<tr>
   <td colspan="2" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
                      <tr>
                        <td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'>층정보</td>
                        <td>전체<input name=etc13_exp04 value="<?=$etc13_exp04?>" style=width:10% itemname="전체층" class="input" style="ime-mode:active">층
              <b>중</b>
              <input name=etc13_exp05 value="<?=$etc13_exp05?>" style=width:10% itemname="몇층" class="input" numeric>층</td>
                      </tr>

	

                  </table></td>
                </tr>
            </table></td>
          </tr>
</table>

<!--//-->
    </td>
</tr>


<?$etc9_exp=explode("|" , $write[wr_9])?>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class=write_head style="height:60px;">&middot; 시설정보</td>
    <td class=write_main bgcolor="ffffff" style="PADDING:4 4 4 4" valign="top">

<table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr bgcolor="#FFFFFF">
				  <td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'><b>가전</b></td>
                  <td><input type=checkbox name="etc9_exp00" value="냉장고" <?if($etc9_exp[0]):?> checked<?endif;?> checked>
                    냉장고</td>
                  <td><input type=checkbox name="etc9_exp01" value="에어콘" <?if($etc9_exp[1]):?> checked<?endif;?> checked>
                    에어콘</td>
                  <td> <input type=checkbox name="etc9_exp02" value="TV" <?if($etc9_exp[2]):?> checked<?endif;?> checked>
                   TV</td>
                  <td><input type=checkbox name="etc9_exp03" value="전자렌지" <?if($etc9_exp[3]):?> checked<?endif;?>>
                   전자렌지</td>
					<td><input type=checkbox name="etc9_exp04" value="세탁기" <?if($etc9_exp[4]):?> checked<?endif;?> checked>
                    세탁기</td>
                  <td><input type=checkbox name="etc9_exp05" value="정수기" <?if($etc9_exp[5]):?> checked<?endif;?>>
                    정수기</td>
                </tr>
				<tr>
   <td colspan="7" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
                <tr bgcolor="#FFFFFF"> 
                  <td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'><b>가구</b></td>
                  <td><input type=checkbox name="etc9_exp06" value="붙박이장" <?if($etc9_exp[6]):?> checked<?endif;?> checked>
                    붙박이장</td>
                  <td><input type=checkbox name="etc9_exp07" value="옷장" <?if($etc9_exp[7]):?> checked<?endif;?>>
                    옷장</td>
					<td><input type=checkbox name="etc9_exp08" value="책상" <?if($etc9_exp[8]):?> checked<?endif;?>>
                    책상</td>
                  <td><input type=checkbox name="etc9_exp09" value="의자" <?if($etc9_exp[9]):?> checked<?endif;?>>
                   의자</td>
                  <td> <input type=checkbox name="etc9_exp10" value="침대" <?if($etc9_exp[10]):?> checked<?endif;?>>
                    침대</td>
                  <td><input type=checkbox name="etc9_exp11" value="식탁" <?if($etc9_exp[11]):?> checked<?endif;?>>
                    식탁</td>
                </tr>    
				<tr>
   <td colspan="7" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
                <tr bgcolor="#FFFFFF">
				<td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'><b>주방/욕실</b></td>
                  <td><input type=checkbox name="etc9_exp12" value="씽크대" <?if($etc9_exp[12]):?> checked<?endif;?> checked>
                   씽크대</td>
                  <td> <input type=checkbox name="etc9_exp13" value="가스렌지" <?if($etc9_exp[13]):?> checked<?endif;?> checked>
                    가스렌지</td>
                  <td><input type=checkbox name="etc9_exp14" value="비대" <?if($etc9_exp[14]):?> checked<?endif;?>>
                    비대</td>
                  <td><input type=checkbox name="etc9_exp15" value="샤워부스" <?if($etc9_exp[15]):?> checked<?endif;?>>
                    샤워부스</td>
					 <td> <input type=checkbox name="etc9_exp16" value="전기렌지" <?if($etc9_exp[16]):?> checked<?endif;?>>
                    전기렌지</td>
                  <td> <input type=checkbox name="etc9_exp17" value="인덕션" <?if($etc9_exp[17]):?> checked<?endif;?>>
                    인덕션</td>
                </tr>
				<tr>
   <td colspan="7" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
                <tr bgcolor="#FFFFFF">
				<td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'><b>보안</b></td>
                  <td><input type=checkbox name="etc9_exp18" value="CCTV" <?if($etc9_exp[18]):?> checked<?endif;?> checked>
                    CCTV</td>
                  <td><input type=checkbox name="etc9_exp19" value="인터폰" <?if($etc9_exp[19]):?> checked<?endif;?>>
                    인터폰</td>
					<td> <input type=checkbox name="etc9_exp20" value="번호키" <?if($etc9_exp[20]):?> checked<?endif;?> checked>
                    번호키</td>
                  <td> <input type=checkbox name="etc9_exp21" value="카드키" <?if($etc9_exp[21]):?> checked<?endif;?>>
                   카드키</td>
                  <td> <input type=checkbox name="etc9_exp22" value="비디오폰" <?if($etc9_exp[22]):?> checked<?endif;?>>
                    비디오폰</td>
                  <td><input type=checkbox name="etc9_exp23" value="경비원" <?if($etc9_exp[23]):?> checked<?endif;?>>
                    경비원</td>
                </tr>
				<tr>
   <td colspan="7" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
                   <tr bgcolor="#FFFFFF">
				   <td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'><b>기타</b></td>
                  <td><input type=checkbox name="etc9_exp24" value="도시가스" <?if($etc9_exp[24]):?> checked<?endif;?> checked>
                    도시가스</td>
                  <td><input type=checkbox name="etc9_exp25" value="베란다" <?if($etc9_exp[25]):?> checked<?endif;?> checked>
                    베란다</td>
					<td> <input type=checkbox name="etc9_exp26" value="주차시설" <?if($etc9_exp[26]):?> checked<?endif;?> checked>
                    주차시설</td>
                  <td> <input type=checkbox name="etc9_exp27" value="승강기" <?if($etc9_exp[27]):?> checked<?endif;?>>
                    승강기</td>
                  <td> <input type=checkbox name="etc9_exp28" value="화재경보기" <?if($etc9_exp[28]):?> checked<?endif;?> checked>
                   화재경보기</td>
                  <td><input type=checkbox name="etc9_exp29" value="심야전기" <?if($etc9_exp[29]):?> checked<?endif;?>>
                   심야전기</td>
                </tr>
				<tr>
   <td colspan="7" background="<?=$board_skin_path?>/img/line_dot04.gif" height="1"></td>
</tr>
				<tr bgcolor="#FFFFFF">
				<td><img src='<?=$board_skin_path?>/img/dot_write_01.gif'><b>주변시설</b></td>
                  <td><input type=checkbox name="etc9_exp30" value="할인마트" <?if($etc9_exp[30]):?> checked<?endif;?> checked>
                    할인마트</td>
                  <td><input type=checkbox name="etc9_exp31" value="스포츠센터" <?if($etc9_exp[31]):?> checked<?endif;?>>
                    스포츠센터</td>
					<td> <input type=checkbox name="etc9_exp32" value="병원" <?if($etc9_exp[32]):?> checked<?endif;?>>
                    병원</td>
                  <td> <input type=checkbox name="etc9_exp33" value="백화점" <?if($etc9_exp[33]):?> checked<?endif;?>>
                    백화점</td>
                  <td> <input type=checkbox name="etc9_exp34" value="공원" <?if($etc9_exp[34]):?> checked<?endif;?>>
                   공원</td>
                  <td><input type=checkbox name="etc9_exp35" value="교육시설" <?if($etc9_exp[35]):?> checked<?endif;?>>
                    교육시설</td>
                </tr>
              </table>

     
    </td>
</tr>


<!--//-->







<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class=write_head>&middot; 추가내용</td>
    <td class=write_main bgcolor="#ffffff" style='padding:5px;'>
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
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=2 itemname="내용" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
        </td>
</tr>


<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>



<? if ($is_file) { ?>
<tr>
    <td class=write_head>&middot; 대표이미지 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
	<input class=ed type="file" name='bf_file[0]'> 
	<?if($file[0][href]){ echo "<input type='checkbox' name='bf_file_del[0]' value='1'><a href='{$file[0][href]}'>{$file[0][source]}({$file[0][size]})</a> 파일 삭제"; } ?>



    </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지1 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
         <input class=ed type="file" name='bf_file[1]'> 
              <?if($file[1][href]){ echo "<input type='checkbox' name='bf_file_del[1]' value='1'><a href='{$file[1][href]}'>{$file[1][source]}({$file[1][size]})</a> 파일 삭제"; } ?>
 
    </td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지2 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
          <input class=ed type="file" name='bf_file[2]'> 
              <?if($file[2][href]){ echo "<input type='checkbox' name='bf_file_del[2]' value='1'><a href='{$file[2][href]}'>{$file[2][source]}({$file[2][size]})</a> 파일 삭제"; } ?>

    </td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지3 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
        <input class=ed type="file" name='bf_file[3]'> 
              <?if($file[3][href]){ echo "<input type='checkbox' name='bf_file_del[3]' value='1'><a href='{$file[3][href]}'>{$file[3][source]}({$file[3][size]})</a> 파일 삭제"; } ?>

    </td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지4 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
         <input class=ed type="file" name='bf_file[4]'> 
              <?if($file[4][href]){ echo "<input type='checkbox' name='bf_file_del[4]' value='1'><a href='{$file[4][href]}'>{$file[4][source]}({$file[4][size]})</a> 파일 삭제"; } ?>

    </td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지5 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
        <input class=ed type="file" name='bf_file[5]'> 
              <?if($file[5][href]){ echo "<input type='checkbox' name='bf_file_del[5]' value='1'><a href='{$file[5][href]}'>{$file[5][source]}({$file[5][size]})</a> 파일 삭제"; } ?>

    </td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지6 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
         <input class=ed type="file" name='bf_file[6]'> 
              <?if($file[6][href]){ echo "<input type='checkbox' name='bf_file_del[6]' value='1'><a href='{$file[6][href]}'>{$file[6][source]}({$file[6][size]})</a> 파일 삭제"; } ?>

    </td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지7 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
         <input class=ed type="file" name='bf_file[7]'> 
              <?if($file[7][href]){ echo "<input type='checkbox' name='bf_file_del[7]' value='1'><a href='{$file[7][href]}'>{$file[7][source]}({$file[7][size]})</a> 파일 삭제"; } ?>

    </td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지8 <div class=write_size>size </div> </td>
    <td class=write_main bgcolor="#ffffff">
         <input class=ed type="file" name='bf_file[8]'> 
              <?if($file[8][href]){ echo "<input type='checkbox' name='bf_file_del[8]' value='1'><a href='{$file[8][href]}'>{$file[8][source]}({$file[8][size]})</a> 파일 삭제"; } ?>

    </td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>&middot; 부가 이미지9 <div class=write_size>size</div> </td>
    <td class=write_main bgcolor="#ffffff">
         <input class=ed type="file" name='bf_file[9]'> 
              <?if($file[9][href]){ echo "<input type='checkbox' name='bf_file_del[9]' value='1'><a href='{$file[9][href]}'>{$file[9][source]}({$file[9][size]})</a> 파일 삭제"; } ?>




    </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<? } ?>



<? if ($is_guest) { ?>
<tr>
    <td class=write_head><img id='kcaptcha_image'/></td>
    <td><input class='ed' type=input size=10 name=wr_key itemname="자동등록방지" required>&nbsp;&nbsp;왼쪽의 글자를 입력하세요.</td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="100%" align="center" valign="top" style="padding-top:30px;">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>&page=<?=$page?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
</tr>
</table>
</td></tr></table>
</form>

<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
var f = document.fwrite;
var mb_point = "<?=$member[mb_point]?>";
var write_point = "<?=$board[bo_4]?>";
var wr_id = "<?=$write[wr_id]?>";

function Get_Point(obj) {
	f.need_point.value = number_format(String(parseInt(obj.value) * parseInt(write_point)));
	result_mb_point = parseInt(mb_point) - (parseInt(obj.value) * parseInt(write_point));

	if (result_mb_point >= 0)
		success_check = "(<span style='color:blue; font-weight:bold; '>등록가능</span>) 등록 후 " + String(parseFloat(result_mb_point)) + " p";
	else
		success_check = "(<span style='color:red; font-weight:bold; '>등록불가능</span>) " + String(parseFloat(result_mb_point)) + " 포인트가 부족함니다";

	if (obj.value == 0) {
		document.getElementById("sum_td").innerHTML = "";
	} else {

		document.getElementById("sum_td").innerHTML =
			number_format(String(obj.value)) + " 일 x " +
			number_format(String(write_point)) + " p = " +
			f.need_point.value + " p " + success_check;
	}
} 


with (document.fwrite) {
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


function html_auto_br(obj) {
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


function fwrite_check(f)
{


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


function confirmMap() {
	var temp = encodeURI(document.getElementById('ext5_13').value);
	var lo = "<?=$g4[bbs_path]?>/confirm_map.php?address="+temp;
	window.open(lo,'cate','scrollbars=yes,width=670, height=1000');
}

</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>