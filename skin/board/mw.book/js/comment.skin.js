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

function check_comment(form)
{
	var pattern = /(^\s*)|(\s*$)/g;
    if(typeof(form.wr_name) != "undefined" && form.wr_name.value.replace(pattern, "") == "")
	{
		window.alert("이름을 입력해주세요.");
		form.wr_name.focus();
		return false;
	}
    if(typeof(form.wr_password) != "undefined" && form.wr_password.value.replace(pattern, "") == "")
	{
		window.alert("비밀번호를 입력해주세요.");
		form.wr_password.focus();
		return false;
	}
	if(typeof(form.wr_key) != "undefined" && hex_md5(form.wr_key.value) != md5_norobot_key)
	{
		window.alert("스팸방지 글자가 올바르지 않습니다.");
		form.wr_key.select();
		form.wr_key.focus();
		return false;
	}
	if(form.wr_content.value.replace(pattern, "") == "")
	{
		window.alert("코멘트를 입력해주세요.");
		form.wr_content.focus();
		return false;
	}
	if(char_min > 0 || char_max > 0)
	{
		check_byte("wr_content", "char_count");
		var cnt = parseInt(window.document.getElementById("char_count").innerHTML);
		if(char_min > 0 && char_min > cnt)
		{
			window.alert("코멘트는 " + char_min + "글자 이상만 가능합니다.");
			return false;
		}
		else if(char_max > 0 && char_max < cnt)
		{
			window.alert("코멘트는 " + char_max + "글자 이하만 가능합니다.");
			return false;
		}
	}
	var result = "";
	if(result = word_filter_check(form.wr_content.value))
	{
		window.alert("코멘트에는 [" + result + "]를 포함할 수 없습니다.");
		return false;
	}
    return true;
}

var save = "";
var html = window.document.getElementById("comment_write").innerHTML;
function comment_box(id, command)
{
	var element;
	if (id)
	{
		if(command == "c") element = "reply_" + id;
		else element = "edit_" + id;
	}
	else element = "comment_write";
	if(save != element)
	{
		if(save)
		{
			window.document.getElementById(save).style.display = "none";
			window.document.getElementById(save).innerHTML = "";
		}
		window.document.getElementById(element).style.display = "";
		window.document.getElementById(element).innerHTML = html;
		if(command == "cu")
		{
			document.getElementById("wr_content").value = document.getElementById("save_comment_" + id).value;
			if(typeof char_count != "undefined") check_byte("wr_content", "char_count");
			if(document.getElementById("secret_comment_" + id).value) document.getElementById("wr_secret").checked = true;
			else document.getElementById("wr_secret").checked = false;
		}
		document.getElementById("comment_id").value = id;
		document.getElementById("w").value = command;
		save = element;
	}
	if(command == "c" && !g4_is_member) imageClick();
	return;
}

function comment_delete(url)
{
	if(window.confirm("코멘트를 삭제하시겠습니까?") == true)
	{
		window.document.location.href = url;
	}
	return;
}

comment_box("", "c");