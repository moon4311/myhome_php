function click_checkbox(object, name)
{
	var form = object.form;
	for(var i = 0, count = form.length; i < count; i++)
	{
		var element = form.elements[i];
		if(element.name == name)
		{
			element.checked = object.checked;
		}
	}
	return;
}

function validate_checkbox(form, name, message)
{
	for(var i = 0, count = form.length; i < count; i++)
	{
		var element = form.elements[i];
		if(element.name == name && element.checked == true)
		{
			if(message && window.confirm(message) == false)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}
	window.alert("체크박스를 선택해주세요.");
	return false;
}

function exe_command(id, name, command)
{
	var form = window.document.getElementById(id);
	var MESSAGE = new Array();
	MESSAGE["copy"] = "선택한 게시글을 복사하시겠습니까?";
	MESSAGE["delete"] = "선택한 게시글을 삭제하시겠습니까?";
	MESSAGE["move"] = "선택한 게시글을 이동하시겠습니까?";
	if(validate_checkbox(form, name, MESSAGE[command]) == false)
	{
		return false;
	}
	if(command == "delete")
	{
		form.action = "delete_all.php";
	}
	else
	{
		var popup = window.open("", "popup", "top=0, left=0, width=500, height=550, scrollbars=yes");
		form.sw.value = command;
		form.target = "popup";
		form.action = "move.php";
	}
	form.submit();
	return;
}