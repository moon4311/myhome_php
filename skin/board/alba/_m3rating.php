<?
// m3rating ���� �ű�� ��� ver 1.10

/* �� �ѹ� ������ �ڵ� (m3rating ���̺��� �����Ǹ� ���켼��)*/
$sql = "CREATE TABLE IF NOT EXISTS `m3rating` (
  `gr_id` varchar(255) NOT NULL,
  `bo_table` varchar(255) NOT NULL,
  `wr_id` varchar(255) NOT NULL,
  `star_average` float NOT NULL,
  `star_data` text NOT NULL,
  `star_list` text NOT NULL
);";
sql_query($sql);
/* ������� �� �ѹ� ������ �ڵ� (m3rating ���̺��� �����Ǹ� ���켼��)*/


// ���� ���� ��������
$sql = "select star_average, star_data from `m3rating` where bo_table='$bo_table' AND wr_id='$wr_id'";
$rating = sql_fetch($sql);
if($rating) {
	$rating_count = sizeof(explode(",", $rating[star_data]));
	$rating_average = sprintf("%.1f", $rating[star_average]);
}
else {
	$rating_count = 0;
	$rating_average = "0.00";
}
?>
<style>
@import url("../../../webbus01.css");

#m3rate {border-collapse:collapse; margin:0; padding:0; border:0; display:inline;}
#m3rate img {margin:0; padding:0; border:0;}
</style>
<div id="m3rate"><span onMouseOut="m3rate_o()">
<?for($i=1;$i<=floor($rating_average);$i++) {?><img src="<?=$board_skin_path?>/img/s<?=$i%2?"1":"2"?>1.png" name="m3rate_img<?=$i?>" align="absmiddle" id="m3rate_img<?=$i?>" title="<?=$i?>" onClick="m3rate_c('<?=$i?>')" onMouseOver="m3rate_o('<?=$i?>')" /><?}?>
<?for($i=floor($rating_average)+1;$i<=10;$i++) {?><img src="<?=$board_skin_path?>/img/s<?=$i%2?"1":"2"?>0.png" name="m3rate_img<?=$i?>" align="absmiddle" id="m3rate_img<?=$i?>" title="<?=$i?>" onClick="m3rate_c('<?=$i?>')" onMouseOver="m3rate_o('<?=$i?>')" /><?}?></span> 
<span id="m3rate_comment"><font style="font-size:11pt; color:#222222;"><?=$rating_average?></font> <font style="font-size:11pt; color:#666666;">(<?=$rating_count?>��)</font></span><br />
<font style="font-size:11px; font-family:����, Verdana, Tahoma; color:#666666;">���� ���� Ŭ���ϸ� ������ �ֽǼ� �ֽ��ϴ�!</font>
</div>

<script type="text/javascript">
var m3rate_commentarr = Array('<font style="font-size:11pt; color:#222222;">1��</font><font style="font-size:11pt; color:#777777;">/10</font>', '<font style="font-size:11pt; color:#222222;">2��</font><font style="font-size:11pt; color:#777777;">/10</font>��', '<font style="font-size:11pt; color:#222222;">3��</font><font style="font-size:11pt; color:#777777;">/10</font>', '<font style="font-size:11pt; color:#222222;">4��</font><font style="font-size:11pt; color:#777777;">/10</font>', '<font style="font-size:11pt; color:#222222;">5��</font><font style="font-size:11pt; color:#777777;">/10</font>', '<font style="font-size:11pt; color:#222222;">6��</font><font style="font-size:11pt; color:#777777;">/10</font>', '<font style="font-size:11pt; color:#222222;">7��</font><font style="font-size:11pt; color:#777777;">/10</font>', '<font style="font-size:11pt; color:#222222;">8��</font><font style="font-size:11pt; color:#777777;">/10</font>', '<font style="font-size:11pt; color:#222222;">9��</font><font style="font-size:11pt; color:#777777;">/10</font>', '<font style="font-size:11pt; color:#222222;">10��</font><font style="font-size:11pt; color:#777777;">/10</font>');
var m3rate_commentdefault = '<font style="font-size:11pt; color:#222222;"><?=$rating_average?></font><font style="font-size:11pt; color:#777777;">/10</font> <font style="font-size:11pt; color:#555555;">(<?=$rating_count?>��)</font>';
var n = parseInt(<?=$rating_average?>);
function m3rate_o(r) {
	var r_int = parseInt(r);
	// ����
	if(!r) {
		for(i=1; i<=n; i++) {
			if(i%2) sr = '<?=$board_skin_path?>/img/s11.png';
			else sr = '<?=$board_skin_path?>/img/s21.png';
			document.getElementById('m3rate_img'+i).src = sr;
		}
		for(i=n+1; i<=10; i++) {
			if(i%2) sr = '<?=$board_skin_path?>/img/s10.png';
			else sr = '<?=$board_skin_path?>/img/s20.png';
			document.getElementById('m3rate_img'+i).src = sr;
		}
		document.getElementById('m3rate_comment').innerHTML = m3rate_commentdefault;
	}
	// �� �׷���
	else {
		for(i=1; i<=r_int; i++) {
			if(i%2) sr = '<?=$board_skin_path?>/img/s11.png';
			else sr = '<?=$board_skin_path?>/img/s21.png';
			document.getElementById('m3rate_img'+i).src = sr;
		}
		for(i=r_int+1; i<=10; i++) {
			if(i%2) sr = '<?=$board_skin_path?>/img/s10.png';
			else sr = '<?=$board_skin_path?>/img/s20.png';
			document.getElementById('m3rate_img'+i).src = sr;
		}
		document.getElementById('m3rate_comment').innerHTML = m3rate_commentarr[(r_int-1)];
	}
}
function m3rate_c(star) {
	jQuery.ajax({
	type: "POST",
	url: "<?=$board_skin_path?>/__m3rating_update.php",
	data: "gr_id=<?=$board[gr_id]?>&bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&star="+star,
	success: function(msg){
		alert( msg );
	}
	});
}
</script>
