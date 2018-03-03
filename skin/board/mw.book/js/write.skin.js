function imageClick()
{
	var url = g4_path + "/" + g4_bbs + "/kcaptcha_session.php";
	var para = "";
	var myAjax = new Ajax.Request(
		url, 
		{
			method : "post", 
			asynchronous : true,
			parameters : para, 
			onComplete : imageClickResult
		}
	);
}

function imageClickResult(req)
{
	var result = req.responseText;
	var img = window.document.createElement("IMG");
	img.setAttribute("src", g4_path + "/" + g4_bbs + "/kcaptcha_image.php?t=" + (new Date).getTime());
	document.getElementById("kcaptcha_image").src = img.getAttribute("src");
	md5_norobot_key = result;
}

function auto_br(obj)
{
	if(obj.checked == true)
	{
		if(window.confirm("자동줄바꿈을 사용하시겠습니까?") == true) obj.value = "html2";
		else obj.value = "html1";
	}
	else obj.value = "";
	return;
}

function check_write(form)
{
	var result = "";
	if(result = word_filter_check(form.wr_subject.value))
	{
		window.alert("제목에는 [" + result + "]를 포함할 수 없습니다.");
		return false;
	}
	if(g4_is_dhtml_editor) window.document.getElementById("tx_" + g4_is_dhtml_editor).value = ed_wr_content.outputBodyHTML();
	if(window.document.getElementById("tx_wr_content") != "undefined" && !ed_wr_content.outputBodyText())
	{
		window.alert("내용을 입력해주세요.");
		ed_wr_content.returnFalse();
		return false;
	}
	if(window.document.getElementById("char_count") != "undefined" && (char_min > 0 || char_max > 0))
	{
		var cnt = parseInt(window.document.getElementById("char_count").innerHTML);
		if(char_min > 0 && char_min > cnt)
		{
			window.alert("내용은 " + char_min + "글자 이상만 가능합니다.");
			return false;
		}
		else if(char_max > 0 && char_max < cnt)
		{
			window.alert("내용은 " + char_max + "글자 이하만 가능합니다.");
			return false;
		}
	}
	var result = "";
	if(result = word_filter_check(form.wr_content.value))
	{
		window.alert("내용에는 [" + result + "]를 포함할 수 없습니다.");
		return false;
	}
	if(typeof(form.wr_key) != "undefined" && hex_md5(form.wr_key.value) != md5_norobot_key)
	{
		window.alert("스팸방지 글자가 올바르지 않습니다.");
		form.wr_key.select();
		form.wr_key.focus();
		return false;
	}
	window.document.getElementById("save").style.display = "none";
	window.document.getElementById("wait").style.display = "";
	return true;
}

function wait()
{
	window.alert("글을 저장하고 있습니다. 잠시만 기다려주세요.");
	return;
}

if(g4_is_admin && g4_is_category)
{
	var element = window.document.getElementById("ca_name");
	element.options.length += 1;
	element.options[element.options.length - 1].value = "공지";
	element.options[element.options.length - 1].text = "공지";
}

if(!g4_is_member) Event.observe(window, "load", imageClick);