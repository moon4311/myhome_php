<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="13" height="29" valign="middle" background="http://www.styledb.com/img/navi.gif"><img src="http://www.styledb.com/img/home_icon.gif" span style="position:relative; top:0.1em; margin:0 0 0 3px; ">&nbsp;</td>
    <td background="http://www.styledb.com/img/navi.gif"><? if($bo_table){ 
$sql5 = "select a.gr_id, a.gr_subject, b.bo_table, b.bo_subject from  
      $g4[group_table] as a left join $g4[board_table] as b  
      on b.gr_id = a.gr_id  
      where b.bo_table = '$bo_table'  
      order by a.gr_id"; 
$theday5 = sql_fetch($sql5); 
   //echo "HOME</a> > "; //홈
if($theday5[bo_subject] != '') {  
   echo "$theday5[gr_subject] > "; //그룹
   //echo "$mw_mmenus[$i][mm_name] > "; //서브메뉴
   echo "<b>$theday5[bo_subject]<b> "; //게시판
   }  
//if($wr_id) {  
//   echo "<a href='$g4[path]/bbs/board.php?bo_table=$board[bo_table]&wr_id=$theday7[wr_id]'>글번호: $write[wr_subject]</a> "; //게시판 글  
//   }
} else {
   echo "<a href='$g4[path]'> &nbsp; HOME</a> > "; //그룹
   echo "<a href='$urlencode'> {$g4[title]}</a> > "; //일반페이지
}
?></td>
  </tr>
</table>
<br>

