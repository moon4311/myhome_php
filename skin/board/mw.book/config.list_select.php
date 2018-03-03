<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="<?=$board_skin_path?>/img/box2_tl.gif" border="0" /></td>
    <td width="100%" background="<?=$board_skin_path?>/img/box2_tc.gif"></td>
    <td><img src="<?=$board_skin_path?>/img/box2_tr.gif" border="0" /></td>
  </tr>
  <tr>
    <td background="<?=$board_skin_path?>/img/box2_ml.gif"></td>
    <td style="PADDING:4 4 4 4" valign="top" bgcolor=#ffffff>

<!--/여기부터/-->

<SCRIPT language=JavaScript src="<?=$board_skin_path?>/js/common.js"></SCRIPT>

<script language="javascript">
<!--//-- 스킨용 : 여유필드 다중셀렉트창

	//-- 여유필드 중복셀렉트가 가능하게 해주는 함수
	//-- 수정작업시, 아래 함수와 함께 write.skin.php에 사용된 '여유필드(wr_?)이름과 셀렉트문'을 가져와 붙이면 바로적용가능
	//-- 단, 반드시 게시물리스트(list.skin.php)에 여유필드값이 게시물에 주어져야함.
	//-- 중복필드가 필요없는 경우 'document.fwrite.srch_type.value'삭제, 셀렉트문삭제, value값에서 필드명삭제
function onChangeKey2() { 

var pattern = new RegExp('[^가-힣a-zA-Z0-9]', 'i'); 
if (fwrite.stx.value) { 
if (pattern.exec(fwrite.stx.value) != null) { 
alert("'"+fwrite.stx.value + "'는 사용할수 없습니다. \n\n 올바르게 입력하세요 \n\n 특수문자,공백,한문,불가."); 
return; 
}
 else { 
fwrite.stx.focus(); 
} 
}

	var wr_1 = document.fwrite.wr_1.value;
	var wr_2 = document.fwrite.wr_2.value;
	var ca_name = document.fwrite.ca_name.value;
	var wr_16 = document.fwrite.wr_16.value;
	var stx2 = document.fwrite.stx.value;
	
	

	
	
		if (wr_1 == "" && wr_2 == "" && wr_16 == "" && ca_name == "" && stx2 == "") {
		alert("검색조건을 선택하세요!!");
		return false;
		}
		
	
		

		
		else {
			if (wr_1 == "" && wr_2 == "" && wr_16 == "" && ca_name == "" && stx2 != "")  {
				document.fwrite.stx.value = stx2;
			}
			else if ((wr_1 != "" )&& (wr_2 == "" || wr_16 == "" || ca_name == "" || stx2 == ""))  {
				document.fwrite.stx.value = wr_1 + " " + wr_2 + " " + ca_name + " " + wr_16 + " " + stx2;
			}
			else {
				document.fwrite.stx.value = wr_1 + "" + wr_2 + "" + ca_name + "" + wr_16 + ""  + stx2;
			}
				document.fwrite.submit();
		}
}


//-->  
</script>
<form name=fwrite method=get style="margin:0px;">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=sca value="<?=$sca?>">
<input type=hidden name=sfl value="wr_1||wr_2||ca_name||wr_16||wr_subject">


<SELECT class=box2  onchange=setSubSelect() name=wr_1 itemname='대분류' required> 
				<OPTION value="">지역선택</OPTION>
				<OPTION value="포항시 남구">포항시 남구</OPTION>
				<OPTION value="포항시 북구">포항시 북구</OPTION>	
	</SELECT> 
	
	<SELECT class=box2  name=wr_2 itemname='동리면선택'> 
		<OPTION value="" >동리면선택</OPTION>
	</SELECT>

	<SELECT class=box2  name=ca_name itemname='구분'> 
		<OPTION value="" >구분</OPTION>
		<OPTION value="원룸">원룸</OPTION> 
		<OPTION value="미니투룸" >미니투룸</OPTION>
		<OPTION value="정투룸" >정투룸</OPTION>
		<OPTION value="주인세대" >주인세대</OPTION>
		<OPTION value="원룸매매" >원룸매매</OPTION>		
		<OPTION value="상가아파트" >상가/아파트</OPTION>		
	</SELECT> 


	<SELECT class=box2  name=wr_16 itemname='평수'> 
		<OPTION value="" >평수</OPTION>
		    <option value='9'>9평</option>
			<option value='10'>10평</option>
			<option value='11'>11평</option>
		    <option value='12'>12평</option>
			<option value='13'>13평</option>
			<option value='14'>14평</option>
			<option value='15'>15평</option>
			<option value='16'>16평</option>
			<option value='17'>17평</option>
			<option value='18'>18평</option>
			<option value='19'>19평</option>
			<option value='20'>20평</option>
			<option value='21'>21평</option>
			<option value='22'>22평</option>
			<option value='23'>23평</option>
			<option value='24'>24평</option>
			<option value='25'>25평</option>
			<option value='26'>26평</option>
			<option value='27'>27평</option>
			<option value='28'>28평</option>
			<option value='29'>29평</option>
			<option value='30'>30평</option>
			<option value='31'>31평</option>
			<option value='32'>32평</option>
			<option value='33'>33평</option>
			<option value='34'>34평</option>
			<option value='35'>35평</option>
			<option value='36'>36평</option>
			<option value='37'>37평</option>
			<option value='38'>38평</option>
			<option value='39'>39평</option>
			<option value='40'>40평</option>
			<option value='41'>41평</option>
			<option value='42'>42평</option>
			<option value='43'>43평</option>
			<option value='44'>44평</option>
			<option value='45'>45평</option>
			<option value='46'>46평</option>
			<option value='47'>47평</option>
			<option value='48'>48평</option>
			<option value='49'>49평</option>
			<option value='50'>50평</option>

</SELECT>

<input type=text name=stx maxlength=30 size=30 class=input itemname="검색어"  value="">
<input type=image onClick="onChangeKey2();return false;" src="<?=$board_skin_path?>/img/search.gif" align=absmiddle border=0><input type=hidden name=sop value='and'><!--input type=hidden name=stx value=''-->
 
</form>
<?
// if ($wr_1 != "") { $stx = ""; }
?>


<!--/여기까지/-->

</td>
    <td background="<?=$board_skin_path?>/img/box2_mr.gif"></td>
  </tr>
  <tr>
    <td><img src="<?=$board_skin_path?>/img/box2_bl.gif" border="0" /></td>
    <td width="100%" background="<?=$board_skin_path?>/img/box2_bc.gif"></td>
    <td><img src="<?=$board_skin_path?>/img/box2_br.gif" border="0" /></td>
  </tr>
</table>