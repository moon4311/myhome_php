<style type='text/css'>
/*-- ī�װ��� --*/
.cate  {font-family:Tahoma,����,arial; color:#666666; font-size:12px;}
a.cate:link, a.b_ca:visited, a.b_ca:active {font-family:Tahoma,����,arial; color:#666666; font-size:12px;}
a.cate:hover {font-family:Tahoma,����, arial; color:#FF6600; font-size:12px; text-decoration:underline;}
</style>

<? $cnt_bo_1 =  4; // ���ٴ� �з� ���� ?>

<? if (!$wr_id) {  ?>
<!-- �з� ����Ʈ �ڽ� ���� -->
<?
    $cnt = 1;
    $sql = " SELECT bo_category_list FROM $g4[board_table] WHERE bo_table = '$bo_table' ";
    $row = sql_fetch($sql);
    $arr = explode("|", $row[bo_category_list]); // �����ڰ� , �� �Ǿ� ����
    $str = "";
    $str .= "<tr>";
    for ($i=0; $i<count($arr); $i++) 
        if (trim($arr[$i]))  {
		$sql1 = " SELECT count(*) as cCount FROM $write_table WHERE ca_name = '$arr[$i]' and wr_is_comment = 0 ";
    		$row1 = sql_fetch($sql1);        	
            $str .= "<td><img src='{$board_skin_path}/img/ico_folder.gif' width='13' height='9'>&nbsp;<a class='cate'  href='./board.php?bo_table=$bo_table&sca=$arr[$i]&sop=&sst=wr_1&sod=desc&sfl=&stx=&page=1'>$arr[$i] ($row1[cCount])</a></td>";
		if ($cnt == $cnt_bo_1) { $cnt = 0; $str .= "</tr><tr>"; }
     	$cnt++;
    }
    
    $sql2 = " SELECT count(*) as cCount FROM $write_table WHERE wr_is_comment = 0 ";
    $row2 = sql_fetch($sql2);
    $total_count = $row2[cCount]
?>
<table width=100% cellspacing=0 cellpadding=0 style="border:1 solid #CCCCCC;">
<tr><td>

<table width=100% cellspacing=1 cellpadding=10 border=0 style="border:5 solid #E7E7E7;table-layout:fixed">
<col width=75></col>
<col width=20></col>
<col width=></col>

<tr bgcolor=white>
	<td width='' align='center'>
		<a class='cate' href='./board.php?bo_table=<?=$bo_table?>&sca=<?=$arr[$i]?>&sop=&sst=wr_1&sod=desc&sfl=&stx=&page=1'><img src='<?=$board_skin_path?>/img/all.gif' width='41' height='19' border=0></a><br>(<?=number_format($total_count)?>)
	</td>
	<td nowrap>&nbsp;</td>
	<td width='' style='word-break:break-all;'>
	<table border=0 cellspacing=0 cellpadding=0 width=100%>
	<span class="cate"><?=$str?></span>
	</table>
	</td>
</tr>
</table>

</td></tr></table>
<!-- �з� ����Ʈ �ڽ� �� -->
<? } ?>
