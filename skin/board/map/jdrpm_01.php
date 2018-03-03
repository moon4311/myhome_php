<table align="center" cellpadding="5" cellspacing="0" width="98%">
<tr><td>
<a href="mapex.php" target="mapwindow">[전체]</a> <a href="mapex_list2.php?sc=포항시 남구">[남구]</a> <a href="mapex_list3.php?sc=포항시 북구">[북구]</a></td></tr>
<tr><td>

<table align="center" cellpadding="0" cellspacing="0" width="100%">
<?
//$whereA = "where wr_20 = '' and wr_19='$SC' by wr_subject asc";

//$queryA="select * from g4_write_roadmap $whereA";

//$whereA = "where wr_20 = '' and wr_19='$SC' by wr_subject asc";

$queryA="select * from g4_write_roadmap where wr_20 = '1' order by wr_subject asc  ";
$resultA=mysql_query($queryA);
$totalA=mysql_num_rows($resultA);


$numberA=$totalA-0;
for($iA=0;$iA<$totalA;$iA++) {
	mysql_data_seek($resultA,$iA);

$rowA=mysql_fetch_array($resultA);

$etc7_exp=explode("|" , $rowA[wr_7]);
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

$etc8_exp = explode("|",$rowA[wr_8]); 
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


$etc13_exp=explode("|" , $rowA[wr_13]);
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

$wr_idA=stripslashes($rowA["wr_id"]);
$ca_nameA=stripslashes($rowA["ca_name"]);
$wr_subjectA=stripslashes($rowA["wr_subject"]);
$wr_contentA=stripslashes($rowA["wr_content"]);
$wr_link1A=stripslashes($rowA["wr_link1"]);
$wr_4A=stripslashes($rowA["wr_4"]);

$wr_4AA = cut_str($wr_4A,"38","..."); // 태그 제거 
?>				
<tr>
<td align="left"><a href="mapex.php?vm=pr&wr_id=<?=$wr_idA?>&map_query=<?=$rowA[wr_10]?>" target="mapwindow"><?=$wr_4AA?></a></td>
<td align="left"></td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#f1f1f1"></td></tr>

<?
	$numberA--;
}

?>
</table>

</td></tr>
</table>
<p align="center">&nbsp;</p>

