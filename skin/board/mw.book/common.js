
function setSubSelect()
{
	setSubSelect("")
}

function setSubSelect(sub_value)
{
	var s_value = document.fwrite.ca_name.value
	for (i = document.fwrite.wr_17.options.length; i >= 0; i--) 
	{
		document.fwrite.wr_17.options[i] = null; 
	}
	if (s_value=="" && sub_value=="")
	{
		document.fwrite.wr_17.options[0] = new Option("등록위치")
		document.fwrite.wr_17.options[0].value=""
	}
	else if (s_value=="카고트럭")
	{
		document.fwrite.wr_17.options[0] = new Option("5톤이하")
		document.fwrite.wr_17.options[0].value="5톤이하"
		document.fwrite.wr_17.options[1] = new Option("8톤이상")
		document.fwrite.wr_17.options[1].value="8톤이상"
		document.fwrite.wr_17.options[2] = new Option("철근운송차")
		document.fwrite.wr_17.options[2].value="철근운송차"
		document.fwrite.wr_17.options[3] = new Option("고철운반차")
		document.fwrite.wr_17.options[3].value="고철운반차"
		document.fwrite.wr_17.options[4] = new Option("활어차")
		document.fwrite.wr_17.options[4].value="활어차"
		document.fwrite.wr_17.options[5] = new Option("돼지운반차")
		document.fwrite.wr_17.options[5].value="돼지운반차"

	}
	else if (s_value=="추레라")
	{
		document.fwrite.wr_17.options[0] = new Option("트렉터")
		document.fwrite.wr_17.options[0].value = "트렉터"
		document.fwrite.wr_17.options[1] = new Option("트레일러")
		document.fwrite.wr_17.options[1].value = "트레일러"
		document.fwrite.wr_17.options[2] = new Option("로우베드")
		document.fwrite.wr_17.options[2].value = "로우베드"
		document.fwrite.wr_17.options[3] = new Option("릴리리")
		document.fwrite.wr_17.options[3].value = "릴리리"
		document.fwrite.wr_17.options[4] = new Option("BCT벌크")
		document.fwrite.wr_17.options[4].value = "BCT벌크"
		document.fwrite.wr_17.options[5] = new Option("추레라/덤프")
		document.fwrite.wr_17.options[5].value = "추레라/덤프"
		document.fwrite.wr_17.options[6] = new Option("탱크로리")
		document.fwrite.wr_17.options[6].value = "탱크로리"
		document.fwrite.wr_17.options[7] = new Option("폴카")
		document.fwrite.wr_17.options[7].value = "폴카"
		document.fwrite.wr_17.options[8] = new Option("평판샤시")
		document.fwrite.wr_17.options[8].value="평판샤시"
		document.fwrite.wr_17.options[9] = new Option("콘테이너샤시")
		document.fwrite.wr_17.options[9].value="콘테이너샤시"

	}

	else if (s_value=="트레일러")
	{
		document.fwrite.wr_17.options[0] = new Option("트렉터")
		document.fwrite.wr_17.options[0].value = "트렉터"
		document.fwrite.wr_17.options[1] = new Option("트레일러")
		document.fwrite.wr_17.options[1].value = "트레일러"
		document.fwrite.wr_17.options[2] = new Option("로우베드")
		document.fwrite.wr_17.options[2].value = "로우베드"
		document.fwrite.wr_17.options[3] = new Option("릴리리")
		document.fwrite.wr_17.options[3].value = "릴리리"
		document.fwrite.wr_17.options[4] = new Option("BCT벌크")
		document.fwrite.wr_17.options[4].value = "BCT벌크"
		document.fwrite.wr_17.options[5] = new Option("추레라/덤프")
		document.fwrite.wr_17.options[5].value = "추레라/덤프"
		document.fwrite.wr_17.options[6] = new Option("탱크로리")
		document.fwrite.wr_17.options[6].value = "탱크로리"
		document.fwrite.wr_17.options[7] = new Option("폴카")
		document.fwrite.wr_17.options[7].value = "폴카"
		document.fwrite.wr_17.options[8] = new Option("평판샤시")
		document.fwrite.wr_17.options[8].value="평판샤시"
		document.fwrite.wr_17.options[9] = new Option("콘테이너샤시")
		document.fwrite.wr_17.options[9].value="콘테이너샤시"

	}

	else if (s_value=="암롤/압축/진개차")
	{
		document.fwrite.wr_17.options[0] = new Option("암롤")
		document.fwrite.wr_17.options[0].value = "암롤"
		document.fwrite.wr_17.options[1] = new Option("압축")
		document.fwrite.wr_17.options[1].value = "압축"
		document.fwrite.wr_17.options[2] = new Option("진개덤프")
		document.fwrite.wr_17.options[2].value = "진개덤프"
		document.fwrite.wr_17.options[3] = new Option("압착")
		document.fwrite.wr_17.options[3].value = "압착"
		
	}
	else if (s_value=="미니추레라")
	{
		document.fwrite.wr_17.options[0] = new Option("미니추레라")
		document.fwrite.wr_17.options[0].value = "미니추레라"
		document.fwrite.wr_17.options[1] = new Option("크레인겸용")
		document.fwrite.wr_17.options[1].value = "크레인겸용"

		
	}
	else if (s_value=="렉카/셀프로더")
	{
		document.fwrite.wr_17.options[0] = new Option("렉카")
		document.fwrite.wr_17.options[0].value = "렉카"
		document.fwrite.wr_17.options[1] = new Option("셀프로더")
		document.fwrite.wr_17.options[1].value = "셀프로더"
		document.fwrite.wr_17.options[2] = new Option("언더리프트")
		document.fwrite.wr_17.options[2].value = "언더리프트"

	}
	else if (s_value=="윙바디/탑/사다리차")
	{
		document.fwrite.wr_17.options[0] = new Option("윙바디")
		document.fwrite.wr_17.options[0].value = "윙바디"
		document.fwrite.wr_17.options[1] = new Option("내장탑")
		document.fwrite.wr_17.options[1].value = "내장탑"
		document.fwrite.wr_17.options[2] = new Option("익스탑")
		document.fwrite.wr_17.options[2].value = "익스탑"
		document.fwrite.wr_17.options[3] = new Option("냉동차")
		document.fwrite.wr_17.options[3].value = "냉동차"
		document.fwrite.wr_17.options[4] = new Option("보냉탑")
		document.fwrite.wr_17.options[4].value = "보냉탑"
		document.fwrite.wr_17.options[5] = new Option("사다리차")
		document.fwrite.wr_17.options[5].value = "사다리차"

	}
	else if (s_value=="카고크레인/바가지차")
	{
		document.fwrite.wr_17.options[0] = new Option("카고크레인")
		document.fwrite.wr_17.options[0].value = "카고크레인"
		document.fwrite.wr_17.options[1] = new Option("바가지차")
		document.fwrite.wr_17.options[1].value = "바가지차"
		document.fwrite.wr_17.options[2] = new Option("집게차")
		document.fwrite.wr_17.options[2].value = "집게차"
		document.fwrite.wr_17.options[3] = new Option("고소작업차")
		document.fwrite.wr_17.options[3].value = "고소작업차"
		document.fwrite.wr_17.options[4] = new Option("오가크레인")
		document.fwrite.wr_17.options[4].value = "오가크레인"
	}
	else if (s_value=="탱크로리/홈노리")
	{
		document.fwrite.wr_17.options[0] = new Option("탱크로리")
		document.fwrite.wr_17.options[0].value="탱크로리"
		document.fwrite.wr_17.options[1] = new Option("홈노리")
		document.fwrite.wr_17.options[1].value="홈노리"
		document.fwrite.wr_17.options[2] = new Option("살수차")
		document.fwrite.wr_17.options[2].value="살수차"
		document.fwrite.wr_17.options[3] = new Option("LPG탱크")
		document.fwrite.wr_17.options[3].value="LPG탱크"
		document.fwrite.wr_17.options[4] = new Option("물차")
		document.fwrite.wr_17.options[4].value="물차"
		document.fwrite.wr_17.options[5] = new Option("바큐롬리")
		document.fwrite.wr_17.options[5].value="바큐롬리"
		
	}
	else if (s_value=="덤프/중기/건설기계")
	{
		document.fwrite.wr_17.options[0] = new Option("덤프")
		document.fwrite.wr_17.options[0].value = "덤프"
		document.fwrite.wr_17.options[1] = new Option("레이콘")
		document.fwrite.wr_17.options[1].value = "레이콘"
		document.fwrite.wr_17.options[2] = new Option("펌프카")
		document.fwrite.wr_17.options[2].value = "펌프카"
		document.fwrite.wr_17.options[3] = new Option("지게차")
		document.fwrite.wr_17.options[3].value = "지게차"
		document.fwrite.wr_17.options[4] = new Option("굴삭기")
		document.fwrite.wr_17.options[4].value = "굴삭기"
		document.fwrite.wr_17.options[5] = new Option("기중기")
		document.fwrite.wr_17.options[5].value="기중기"
		document.fwrite.wr_17.options[6] = new Option("로우더")
		document.fwrite.wr_17.options[6].value="로우더"
		document.fwrite.wr_17.options[7] = new Option("하이랜더")
		document.fwrite.wr_17.options[7].value="하이랜더"
		document.fwrite.wr_17.options[8] = new Option("불더우저")
		document.fwrite.wr_17.options[8].value="불더우저"
		document.fwrite.wr_17.options[9] = new Option("제설차")
		document.fwrite.wr_17.options[9].value="제설차"
		document.fwrite.wr_17.options[10] = new Option("공기압축기")
		document.fwrite.wr_17.options[10].value="공기압축기"
		document.fwrite.wr_17.options[11] = new Option("발전기")
		document.fwrite.wr_17.options[11].value="발전기"
		document.fwrite.wr_17.options[12] = new Option("그레이더")
		document.fwrite.wr_17.options[12].value="그레이더"
		document.fwrite.wr_17.options[13] = new Option("향타기")
		document.fwrite.wr_17.options[13].value="향타기"
		document.fwrite.wr_17.options[14] = new Option("크락샤")
		document.fwrite.wr_17.options[14].value="크락샤"
		document.fwrite.wr_17.options[15] = new Option("배차플랜드")
		document.fwrite.wr_17.options[15].value="배차플랜드"
		document.fwrite.wr_17.options[16] = new Option("스키드로더")
		document.fwrite.wr_17.options[16].value="스키드로더"
		document.fwrite.wr_17.options[17] = new Option("드릴")
		document.fwrite.wr_17.options[17].value="드릴"
		document.fwrite.wr_17.options[18] = new Option("로라")
		document.fwrite.wr_17.options[18].value="로라"
		document.fwrite.wr_17.options[19] = new Option("포장장비")
		document.fwrite.wr_17.options[19].value="포장장비"
		document.fwrite.wr_17.options[20] = new Option("기타")
		document.fwrite.wr_17.options[20].value="기타"

	}
	else if (s_value=="특수/희귀/버스")
	{
		document.fwrite.wr_17.options[0] = new Option("버스/승합")
		document.fwrite.wr_17.options[0].value="버스/승합"
		document.fwrite.wr_17.options[1] = new Option("카캐리어")
		document.fwrite.wr_17.options[1].value="카캐리어"
		document.fwrite.wr_17.options[2] = new Option("BBC벌크")
		document.fwrite.wr_17.options[2].value="BBC벌크"
		document.fwrite.wr_17.options[3] = new Option("진공흡입차")
		document.fwrite.wr_17.options[3].value="진공흡입차"
		document.fwrite.wr_17.options[4] = new Option("노면청소차")
		document.fwrite.wr_17.options[4].value="노면청소차"
		document.fwrite.wr_17.options[5] = new Option("음식물차")
		document.fwrite.wr_17.options[5].value="음식물차"
		document.fwrite.wr_17.options[6] = new Option("곡물차")
		document.fwrite.wr_17.options[6].value="곡물차"
		document.fwrite.wr_17.options[7] = new Option("사료차")
		document.fwrite.wr_17.options[7].value="사료차"
		document.fwrite.wr_17.options[8] = new Option("소방차")
		document.fwrite.wr_17.options[8].value="소방차"
		document.fwrite.wr_17.options[9] = new Option("구급차")
		document.fwrite.wr_17.options[9].value="구급차"
		document.fwrite.wr_17.options[10] = new Option("농약살포차")
		document.fwrite.wr_17.options[10].value="농약살포차"
		document.fwrite.wr_17.options[11] = new Option("이동관고차")
		document.fwrite.wr_17.options[11].value="이동관고차"
		document.fwrite.wr_17.options[12] = new Option("이동무대차")
		document.fwrite.wr_17.options[12].value="이동무대차"
		document.fwrite.wr_17.options[13] = new Option("이동목욕차")
		document.fwrite.wr_17.options[13].value="이동목욕차"
		document.fwrite.wr_17.options[14] = new Option("방송중계차")
		document.fwrite.wr_17.options[14].value="방송중계차"
		document.fwrite.wr_17.options[15] = new Option("캠핑카")
		document.fwrite.wr_17.options[15].value="캠핑카"
		document.fwrite.wr_17.options[16] = new Option("희귀차량")
		document.fwrite.wr_17.options[16].value = "희귀차량"
		document.fwrite.wr_17.options[17] = new Option("특수차")
		document.fwrite.wr_17.options[17].value = "특수차"
	}
}