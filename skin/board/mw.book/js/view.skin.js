function file_download(link, file)
{
    if(g4_download_point < 0 && window.confirm(g4_download_point + "점의 포인트가 차감됩니다. 다운로드를 진행하시겠습니까?") == false)
	{
		return false;
	}
	window.document.location.href = link;
	return;
}

window.onload = function()
{
	resizeBoardImage(g4_image_width);
}