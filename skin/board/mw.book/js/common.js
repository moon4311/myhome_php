
function setSubSelect()
{
	setSubSelect("")
}

function setSubSelect(sub_value)
{
	var s_value = document.fwrite.wr_1.value
	for (i = document.fwrite.wr_2.options.length; i >= 0; i--) 
	{
		document.fwrite.wr_2.options[i] = null; 
	}
	if (s_value=="" && sub_value=="")
	{
		document.fwrite.wr_2.options[0] = new Option("지역선택")
		document.fwrite.wr_2.options[0].value=""
	}
	else if (s_value=="포항시 남구")
	{
	//	document.fwrite.wr_2.options[0] = new Option("지역선택")
	// document.fwrite.wr_2.options[0].value=""
		document.fwrite.wr_2.options[0] = new Option("이동")
		document.fwrite.wr_2.options[0].value="이동"
		document.fwrite.wr_2.options[1] = new Option("대잠동")
		document.fwrite.wr_2.options[1].value="대잠동"
		document.fwrite.wr_2.options[2] = new Option("청림동")
		document.fwrite.wr_2.options[2].value="청림동"
		document.fwrite.wr_2.options[3] = new Option("문덕리")
		document.fwrite.wr_2.options[3].value="문덕리"
		document.fwrite.wr_2.options[4] = new Option("오천읍")
		document.fwrite.wr_2.options[4].value="오천읍"
		document.fwrite.wr_2.options[5] = new Option("대도동")
		document.fwrite.wr_2.options[5].value="대도동"
		document.fwrite.wr_2.options[6] = new Option("송내동")
		document.fwrite.wr_2.options[6].value="송내동"
		document.fwrite.wr_2.options[7] = new Option("상도동")
		document.fwrite.wr_2.options[7].value="상도동"
		document.fwrite.wr_2.options[8] = new Option("장흥동")
		document.fwrite.wr_2.options[8].value="장흥동"
		document.fwrite.wr_2.options[9] = new Option("연일읍")
		document.fwrite.wr_2.options[9].value="연일읍"
		document.fwrite.wr_2.options[10] = new Option("송도동")
		document.fwrite.wr_2.options[10].value="송도동"
		document.fwrite.wr_2.options[11] = new Option("해도동")
		document.fwrite.wr_2.options[11].value="해도동"
		document.fwrite.wr_2.options[12] = new Option("효자동")
		document.fwrite.wr_2.options[12].value="효자동"
		document.fwrite.wr_2.options[13] = new Option("지곡동")
		document.fwrite.wr_2.options[13].value="지곡동"
		document.fwrite.wr_2.options[14] = new Option("동촌동")
		document.fwrite.wr_2.options[14].value="동촌동"
		document.fwrite.wr_2.options[15] = new Option("인덕동")
		document.fwrite.wr_2.options[15].value="인덕동"
		document.fwrite.wr_2.options[16] = new Option("일월동")
		document.fwrite.wr_2.options[16].value="일월동"
		document.fwrite.wr_2.options[17] = new Option("괴동동")
		document.fwrite.wr_2.options[17].value="괴동동"
		document.fwrite.wr_2.options[18] = new Option("호동")
		document.fwrite.wr_2.options[18].value="호동"
		document.fwrite.wr_2.options[19] = new Option("구룡포읍")
		document.fwrite.wr_2.options[19].value="구룡포읍"
		document.fwrite.wr_2.options[20] = new Option("유강리")
		document.fwrite.wr_2.options[20].value="유강리"
		document.fwrite.wr_2.options[21] = new Option("대송면")
		document.fwrite.wr_2.options[21].value="대송면"
		document.fwrite.wr_2.options[22] = new Option("동해면")
		document.fwrite.wr_2.options[22].value="동해면"
		document.fwrite.wr_2.options[23] = new Option("장기면")
		document.fwrite.wr_2.options[23].value="장기면"
		document.fwrite.wr_2.options[24] = new Option("호미곶면")
		document.fwrite.wr_2.options[24].value="호미곶면"
	}
	else if (s_value=="포항시 북구")
	{

		document.fwrite.wr_2.options[0] = new Option("장성동")
		document.fwrite.wr_2.options[0].value = "장성동"
		document.fwrite.wr_2.options[1] = new Option("양덕동")
		document.fwrite.wr_2.options[1].value = "양덕동"
		document.fwrite.wr_2.options[2] = new Option("죽도동")
		document.fwrite.wr_2.options[2].value = "죽도동"
		document.fwrite.wr_2.options[3] = new Option("남빈동")
		document.fwrite.wr_2.options[3].value = "남빈동"
		document.fwrite.wr_2.options[4] = new Option("대신동")
		document.fwrite.wr_2.options[4].value = "대신동"
		document.fwrite.wr_2.options[5] = new Option("대흥동")
		document.fwrite.wr_2.options[5].value = "대흥동"
		document.fwrite.wr_2.options[6] = new Option("덕산동")
		document.fwrite.wr_2.options[6].value = "덕산동"
		document.fwrite.wr_2.options[7] = new Option("덕수동")
		document.fwrite.wr_2.options[7].value = "덕수동"
		document.fwrite.wr_2.options[8] = new Option("동빈1가")
		document.fwrite.wr_2.options[8].value="동빈1가"
		document.fwrite.wr_2.options[9] = new Option("동빈2가")
		document.fwrite.wr_2.options[9].value="동빈2가"
		document.fwrite.wr_2.options[10] = new Option("두호동")
		document.fwrite.wr_2.options[10].value="두호동"
		document.fwrite.wr_2.options[11] = new Option("득량동")
		document.fwrite.wr_2.options[11].value="득량동"
		document.fwrite.wr_2.options[12] = new Option("상원동")
		document.fwrite.wr_2.options[12].value="상원동"
		document.fwrite.wr_2.options[13] = new Option("신흥동")
		document.fwrite.wr_2.options[13].value="신흥동"
		document.fwrite.wr_2.options[14] = new Option("여남동")
		document.fwrite.wr_2.options[14].value="여남동"
		document.fwrite.wr_2.options[15] = new Option("여천동")
		document.fwrite.wr_2.options[15].value="여천동"
		document.fwrite.wr_2.options[16] = new Option("용흥동")
		document.fwrite.wr_2.options[16].value="용흥동"
		document.fwrite.wr_2.options[17] = new Option("우현동")
		document.fwrite.wr_2.options[17].value="우현동"
		document.fwrite.wr_2.options[18] = new Option("중앙동")
		document.fwrite.wr_2.options[18].value="중앙동"
		document.fwrite.wr_2.options[19] = new Option("창포동")
		document.fwrite.wr_2.options[19].value="창포동"
		document.fwrite.wr_2.options[20] = new Option("학산동")
		document.fwrite.wr_2.options[20].value="학산동"
		document.fwrite.wr_2.options[21] = new Option("학잠동")
		document.fwrite.wr_2.options[21].value="학잠동"
		document.fwrite.wr_2.options[22] = new Option("항구동")
		document.fwrite.wr_2.options[22].value="항구동"
		document.fwrite.wr_2.options[23] = new Option("환호동")
		document.fwrite.wr_2.options[23].value="환호동"
		document.fwrite.wr_2.options[24] = new Option("흥해읍")
		document.fwrite.wr_2.options[24].value="흥해읍"
		document.fwrite.wr_2.options[25] = new Option("기계면")
		document.fwrite.wr_2.options[25].value="기계면"
		document.fwrite.wr_2.options[26] = new Option("기북면")
		document.fwrite.wr_2.options[26].value="기북면"
		document.fwrite.wr_2.options[27] = new Option("송라면")
		document.fwrite.wr_2.options[27].value="송라면"
		document.fwrite.wr_2.options[28] = new Option("신광면")
		document.fwrite.wr_2.options[28].value="신광면"
		document.fwrite.wr_2.options[29] = new Option("죽장면")
		document.fwrite.wr_2.options[29].value="죽장면"
		document.fwrite.wr_2.options[30] = new Option("청하면")
		document.fwrite.wr_2.options[30].value="청하면"
		
	}

	else if (s_value=="경주시")
	{

    	document.fwrite.wr_2.options[0] = new Option("감포읍")
		document.fwrite.wr_2.options[0].value = "감포읍"
		document.fwrite.wr_2.options[1] = new Option("강동면")
		document.fwrite.wr_2.options[1].value = "강동면"
		document.fwrite.wr_2.options[2] = new Option("건천읍")
		document.fwrite.wr_2.options[2].value = "건천읍"
		document.fwrite.wr_2.options[3] = new Option("광명동")
		document.fwrite.wr_2.options[3].value = "광명동"
		document.fwrite.wr_2.options[4] = new Option("교동")
		document.fwrite.wr_2.options[4].value = "교동"
		document.fwrite.wr_2.options[5] = new Option("구정동")
		document.fwrite.wr_2.options[5].value = "구정동"
		document.fwrite.wr_2.options[6] = new Option("구황동")
		document.fwrite.wr_2.options[6].value = "구황동"
		document.fwrite.wr_2.options[7] = new Option("남산동")
		document.fwrite.wr_2.options[7].value = "남산동"
		document.fwrite.wr_2.options[8] = new Option("내남면")
		document.fwrite.wr_2.options[8].value="내남면"
		document.fwrite.wr_2.options[9] = new Option("노동동")
		document.fwrite.wr_2.options[9].value="노동동"
		document.fwrite.wr_2.options[10] = new Option("노서동")
		document.fwrite.wr_2.options[10].value="노서동"
		document.fwrite.wr_2.options[11] = new Option("덕동")
		document.fwrite.wr_2.options[11].value="덕동"
		document.fwrite.wr_2.options[12] = new Option("도지동")
		document.fwrite.wr_2.options[12].value="도지동"
		document.fwrite.wr_2.options[13] = new Option("동방동")
		document.fwrite.wr_2.options[13].value="동방동"
		document.fwrite.wr_2.options[14] = new Option("동부동")
		document.fwrite.wr_2.options[14].value="동부동"
		document.fwrite.wr_2.options[15] = new Option("동천동")
		document.fwrite.wr_2.options[15].value="동천동"
		document.fwrite.wr_2.options[16] = new Option("마동")
		document.fwrite.wr_2.options[16].value="마동"
		document.fwrite.wr_2.options[17] = new Option("배동")
		document.fwrite.wr_2.options[17].value="배동"
		document.fwrite.wr_2.options[18] = new Option("배반동")
		document.fwrite.wr_2.options[18].value="배반동"
		document.fwrite.wr_2.options[19] = new Option("보문동")
		document.fwrite.wr_2.options[19].value="보문동"
		document.fwrite.wr_2.options[20] = new Option("북군동")
		document.fwrite.wr_2.options[20].value="북군동"
		document.fwrite.wr_2.options[21] = new Option("북부동")
		document.fwrite.wr_2.options[21].value="북부동"
		document.fwrite.wr_2.options[22] = new Option("사정동")
		document.fwrite.wr_2.options[22].value="사정동"
		document.fwrite.wr_2.options[23] = new Option("산내면")
		document.fwrite.wr_2.options[23].value="산내면"
		document.fwrite.wr_2.options[24] = new Option("서면")
		document.fwrite.wr_2.options[24].value="서면"
		document.fwrite.wr_2.options[25] = new Option("서부동")
		document.fwrite.wr_2.options[25].value="서부동"
		document.fwrite.wr_2.options[26] = new Option("서악동")
		document.fwrite.wr_2.options[26].value="서악동"
		document.fwrite.wr_2.options[27] = new Option("석장동")
		document.fwrite.wr_2.options[27].value="석장동"
		document.fwrite.wr_2.options[28] = new Option("성건동")
		document.fwrite.wr_2.options[28].value="성건동"
		document.fwrite.wr_2.options[29] = new Option("성동동")
		document.fwrite.wr_2.options[29].value="성동동"
		document.fwrite.wr_2.options[30] = new Option("손곡동")
		document.fwrite.wr_2.options[30].value="손곡동"
		document.fwrite.wr_2.options[31] = new Option("시동")
		document.fwrite.wr_2.options[31].value="시동"
		document.fwrite.wr_2.options[32] = new Option("시래동")
		document.fwrite.wr_2.options[32].value="시래동"
		document.fwrite.wr_2.options[33] = new Option("신평동")
		document.fwrite.wr_2.options[33].value="신평동"
		document.fwrite.wr_2.options[34] = new Option("안강읍")
		document.fwrite.wr_2.options[34].value="안강읍"
		document.fwrite.wr_2.options[35] = new Option("암곡동")
		document.fwrite.wr_2.options[35].value="암곡동"
		document.fwrite.wr_2.options[36] = new Option("양남면")
		document.fwrite.wr_2.options[36].value="양남면"
		document.fwrite.wr_2.options[37] = new Option("양북면")
		document.fwrite.wr_2.options[37].value="양북면"
		document.fwrite.wr_2.options[38] = new Option("외동읍")
		document.fwrite.wr_2.options[38].value="외동읍"
		document.fwrite.wr_2.options[39] = new Option("용강동")
		document.fwrite.wr_2.options[39].value="용강동"
		document.fwrite.wr_2.options[40] = new Option("율동")
		document.fwrite.wr_2.options[40].value="율동"
		document.fwrite.wr_2.options[41] = new Option("인왕동")
		document.fwrite.wr_2.options[41].value="인왕동"
		document.fwrite.wr_2.options[42] = new Option("조양동")
		document.fwrite.wr_2.options[42].value="조양동"
		document.fwrite.wr_2.options[43] = new Option("진현동")
		document.fwrite.wr_2.options[43].value="진현동"
		document.fwrite.wr_2.options[44] = new Option("천군동")
		document.fwrite.wr_2.options[44].value="천군동"
		document.fwrite.wr_2.options[45] = new Option("천북면")
		document.fwrite.wr_2.options[45].value="천북면"
		document.fwrite.wr_2.options[46] = new Option("충효동")
		document.fwrite.wr_2.options[46].value="충효동"
		document.fwrite.wr_2.options[47] = new Option("탑동")
		document.fwrite.wr_2.options[47].value="탑동"
		document.fwrite.wr_2.options[48] = new Option("평동")
		document.fwrite.wr_2.options[48].value="평동"
		document.fwrite.wr_2.options[49] = new Option("하동")
		document.fwrite.wr_2.options[49].value="하동"
		document.fwrite.wr_2.options[50] = new Option("현곡면")
		document.fwrite.wr_2.options[50].value="현곡면"
		document.fwrite.wr_2.options[51] = new Option("황남동")
		document.fwrite.wr_2.options[51].value="황남동"
		document.fwrite.wr_2.options[52] = new Option("황성동")
		document.fwrite.wr_2.options[52].value="황성동"
		document.fwrite.wr_2.options[53] = new Option("황오동")
		document.fwrite.wr_2.options[53].value="황오동"
		document.fwrite.wr_2.options[54] = new Option("황용동")
		document.fwrite.wr_2.options[54].value="황용동"
		document.fwrite.wr_2.options[55] = new Option("효현동")
		document.fwrite.wr_2.options[55].value="효현동"

	}
	else if (s_value=="영덕군")
	{
		document.fwrite.wr_2.options[0] = new Option("강구면")
		document.fwrite.wr_2.options[0].value = "강구면"
		document.fwrite.wr_2.options[1] = new Option("남정면")
		document.fwrite.wr_2.options[1].value = "남정면"
		document.fwrite.wr_2.options[2] = new Option("달산면")
		document.fwrite.wr_2.options[2].value = "달산면"
		document.fwrite.wr_2.options[3] = new Option("병곡면")
		document.fwrite.wr_2.options[3].value = "병곡면"
		document.fwrite.wr_2.options[4] = new Option("영덕읍")
		document.fwrite.wr_2.options[4].value = "영덕읍"
		document.fwrite.wr_2.options[5] = new Option("영해면")
		document.fwrite.wr_2.options[5].value = "영해면"
		document.fwrite.wr_2.options[6] = new Option("지품면")
		document.fwrite.wr_2.options[6].value = "지품면"
		document.fwrite.wr_2.options[7] = new Option("창수면")
		document.fwrite.wr_2.options[7].value = "창수면"
		document.fwrite.wr_2.options[8] = new Option("축산면")
		document.fwrite.wr_2.options[8].value = "축산면"
		
	}
	else if (s_value=="울릉군")
	{
		document.fwrite.wr_2.options[0] = new Option("북면")
		document.fwrite.wr_2.options[0].value = "북면"
		document.fwrite.wr_2.options[1] = new Option("서면")
		document.fwrite.wr_2.options[1].value = "서면"
		document.fwrite.wr_2.options[2] = new Option("울릉읍")
		document.fwrite.wr_2.options[2].value = "울릉읍"
		
	}
	else if (s_value=="울진군")
	{

		document.fwrite.wr_2.options[0] = new Option("근남면")
		document.fwrite.wr_2.options[0].value = "근남면"
		document.fwrite.wr_2.options[1] = new Option("기성면")
		document.fwrite.wr_2.options[1].value = "기성면"
		document.fwrite.wr_2.options[2] = new Option("북면")
		document.fwrite.wr_2.options[2].value = "북면"
		document.fwrite.wr_2.options[3] = new Option("서면")
		document.fwrite.wr_2.options[3].value = "서면"
		document.fwrite.wr_2.options[4] = new Option("온정면")
		document.fwrite.wr_2.options[4].value = "온정면"
		document.fwrite.wr_2.options[5] = new Option("울진읍")
		document.fwrite.wr_2.options[5].value = "울진읍"
		document.fwrite.wr_2.options[6] = new Option("원남면")
		document.fwrite.wr_2.options[6].value = "원남면"
		document.fwrite.wr_2.options[7] = new Option("죽변면")
		document.fwrite.wr_2.options[7].value = "죽변면"
		document.fwrite.wr_2.options[8] = new Option("평해읍")
		document.fwrite.wr_2.options[8].value = "평해읍"
		document.fwrite.wr_2.options[9] = new Option("후포면")
		document.fwrite.wr_2.options[9].value = "후포면"
	}
	else if (s_value=="영천시")
	{

		document.fwrite.wr_2.options[0] = new Option("고경면")
		document.fwrite.wr_2.options[0].value = "고경면"
		document.fwrite.wr_2.options[1] = new Option("과전동")
		document.fwrite.wr_2.options[1].value = "과전동"
		document.fwrite.wr_2.options[2] = new Option("괴연동")
		document.fwrite.wr_2.options[2].value = "괴연동"
		document.fwrite.wr_2.options[3] = new Option("교촌동")
		document.fwrite.wr_2.options[3].value = "교촌동"
		document.fwrite.wr_2.options[4] = new Option("금로동")
		document.fwrite.wr_2.options[4].value = "금로동"
		document.fwrite.wr_2.options[5] = new Option("금호읍")
		document.fwrite.wr_2.options[5].value = "금호읍"
		document.fwrite.wr_2.options[6] = new Option("녹전동")
		document.fwrite.wr_2.options[6].value = "녹전동"
		document.fwrite.wr_2.options[7] = new Option("대전동")
		document.fwrite.wr_2.options[7].value = "대전동"
		document.fwrite.wr_2.options[8] = new Option("대창면")
		document.fwrite.wr_2.options[8].value="대창면"
		document.fwrite.wr_2.options[9] = new Option("도남동")
		document.fwrite.wr_2.options[9].value="도남동"
		document.fwrite.wr_2.options[10] = new Option("도동")
		document.fwrite.wr_2.options[10].value="도동"
		document.fwrite.wr_2.options[11] = new Option("도림동")
		document.fwrite.wr_2.options[11].value="도림동"
		document.fwrite.wr_2.options[12] = new Option("망정동")
		document.fwrite.wr_2.options[12].value="망정동"
		document.fwrite.wr_2.options[13] = new Option("매산동")
		document.fwrite.wr_2.options[13].value="매산동"
		document.fwrite.wr_2.options[14] = new Option("문내동")
		document.fwrite.wr_2.options[14].value="문내동"
		document.fwrite.wr_2.options[15] = new Option("범어동")
		document.fwrite.wr_2.options[15].value="범어동"
		document.fwrite.wr_2.options[16] = new Option("본촌동")
		document.fwrite.wr_2.options[16].value="본촌동"
		document.fwrite.wr_2.options[17] = new Option("봉동")
		document.fwrite.wr_2.options[17].value="봉동"
		document.fwrite.wr_2.options[18] = new Option("북안면")
		document.fwrite.wr_2.options[18].value="북안면"
		document.fwrite.wr_2.options[19] = new Option("서산동")
		document.fwrite.wr_2.options[19].value="서산동"
		document.fwrite.wr_2.options[20] = new Option("신기동")
		document.fwrite.wr_2.options[20].value="신기동"
		document.fwrite.wr_2.options[21] = new Option("신녕면")
		document.fwrite.wr_2.options[21].value="신녕면"
		document.fwrite.wr_2.options[22] = new Option("쌍계동")
		document.fwrite.wr_2.options[22].value="쌍계동"
		document.fwrite.wr_2.options[23] = new Option("야사동")
		document.fwrite.wr_2.options[23].value="야사동"
		document.fwrite.wr_2.options[24] = new Option("언하동")
		document.fwrite.wr_2.options[24].value="언하동"
		document.fwrite.wr_2.options[25] = new Option("오미동")
		document.fwrite.wr_2.options[25].value="오미동"
		document.fwrite.wr_2.options[26] = new Option("오수동")
		document.fwrite.wr_2.options[26].value="오수동"
		document.fwrite.wr_2.options[27] = new Option("완산동")
		document.fwrite.wr_2.options[27].value="완산동"
		document.fwrite.wr_2.options[28] = new Option("임고면")
		document.fwrite.wr_2.options[28].value="임고면"
		document.fwrite.wr_2.options[29] = new Option("자양면")
		document.fwrite.wr_2.options[29].value="자양면"
		document.fwrite.wr_2.options[30] = new Option("작산동")
		document.fwrite.wr_2.options[30].value="작산동"
		document.fwrite.wr_2.options[31] = new Option("조교동")
		document.fwrite.wr_2.options[31].value="조교동"
		document.fwrite.wr_2.options[32] = new Option("창구동")
		document.fwrite.wr_2.options[32].value="창구동"
		document.fwrite.wr_2.options[33] = new Option("채신동")
		document.fwrite.wr_2.options[33].value="채신동"
		document.fwrite.wr_2.options[34] = new Option("청통면")
		document.fwrite.wr_2.options[34].value="청통면"
		document.fwrite.wr_2.options[35] = new Option("화남면")
		document.fwrite.wr_2.options[35].value="화남면"
		document.fwrite.wr_2.options[36] = new Option("화룡동")
		document.fwrite.wr_2.options[36].value="화룡동"
		document.fwrite.wr_2.options[37] = new Option("화북면")
		document.fwrite.wr_2.options[37].value="화북면"
		document.fwrite.wr_2.options[38] = new Option("화산면")
		document.fwrite.wr_2.options[38].value="화산면"
	}
	
}