<?

if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

$mw_is_list = true;

include_once("$board_skin_path/mw.lib/mw.skin.basic.lib.php");

mw_bomb();

// �Ǹ����� & ��������
if ($mw_basic[cf_kcb_list] && !is_okname()) {
    check_okname();
} else {

// �������� �����
if (function_exists("mw_cash_is_membership")) {
    $is_membership = @mw_cash_is_membership($member[mb_id], $bo_table, "mp_list");
    if ($is_membership == "no")
        ;
    else if ($is_membership != "ok")
        mw_cash_alert_membership($is_membership);
        //alert("$is_membership ȸ���� �̿� �����մϴ�.");
}

// �����δ��� ���ε��� ����
// �Ϸ����� ������ ���� (���ۼ� �Ϸ���� ����..)
if ($mw_basic[cf_guploader]) {
    $gup_old = date("Y-m-d H:i:s", $g4[server_time] - 86400);
    $sql = "select * from $mw[guploader_table] where bf_datetime <= '$gup_old'";
    $qry = sql_query($sql, false);
    while ($row = sql_fetch_array($qry)) {
        @unlink("$g4[path]/data/guploader/$row[bf_file]");
    }
    sql_query("delete from $mw[guploader_table] where bf_datetime <= '$gup_old'", false);
}

// ī�װ���
$is_category = false;
if ($board[bo_use_category]) 
{
    $is_category = true;
    $category_location = "./board.php?bo_table=$bo_table&sca=";
    $category_option = mw_get_category_option($bo_table); // SELECT OPTION �±׷� �Ѱܹ���

    if ($mw_basic[cf_default_category] && !$sca) $sca = $mw_basic[cf_default_category];
}

// page ���� �ߺ� ����
$qstr = preg_replace("/(\&page=.*)/", "", $qstr);
$write_pages = get_paging($config[cf_write_pages], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page=");

// ����,���� �˻��� ������ ��ȣ ����
$prev_part_href = preg_replace("/(\&page=.*)/", "", $prev_part_href);
$next_part_href = preg_replace("/(\&page=.*)/", "", $next_part_href);

// 1:1 �Խ���
if ($mw_basic[cf_attribute] == "1:1" && !$is_admin) {
    require("$board_skin_path/mw.proc/mw.list.1n1.php");
}

// �͸� �Խ���
if ($mw_basic[cf_attribute] == "anonymous") {
    if (strstr($sfl, "mb_id") || strstr($sfl, "wr_name")) {
        alert("�͸��Խ��ǿ����� ���̵� �Ǵ� �̸����� �˻��Ͻ� �� �����ϴ�.");
    }
}

if ($mw_basic[cf_anonymous]) {
    if (strstr($sfl, "mb_id") || strstr($sfl, "wr_name")) {
        alert("�͸��ۼ��� ������ �Խ��ǿ����� ���̵� �Ǵ� �̸����� �˻��Ͻ� �� �����ϴ�.");
    }
}

// �����ư �׻� ���
if ($mw_basic[cf_write_button])
    $write_href = "./write.php?bo_table=$bo_table";

// �۾��� ��ư�� �з�����
if ($sca && $write_href)
    $write_href .= "&sca=".urlencode($sca);

// �۾��� ��ư ����
if ($write_href && $mw_basic[cf_write_notice]) {
    $write_href = "javascript:btn_write_notice('$write_href');";
}

// ��Ų������ư
$config_href = "javascript:mw_config()";

// ���ÿɼ����� ���� ����ġ�Ⱑ ���������� ����
$colspan = 5;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;
if ($mw_basic[cf_reward]) $colspan+=3;
if ($mw_basic[cf_contents_shop]) $colspan++;
if ($mw_basic[cf_type] == "thumb") $colspan++;
if ($mw_basic[cf_type] == "gall") $colspan = $board[bo_gallery_cols];
if ($mw_basic[cf_attribute] == "qna") $colspan += 2;

// ��� ����
if ($mw_basic[cf_list_shuffle]) { // �������� ���� ó��
    $tmp_notice = array();
    $tmp_list = array();
    for ($i=0, $m=sizeof($list); $i<$m; $i++) {
        if ($list[$i][is_notice])
            $tmp_notice[] = $list[$i];
        else
            $tmp_list[] = $list[$i];
    }
    shuffle($tmp_list);
    $list = array_merge($tmp_notice, $tmp_list);
}

$list_count = sizeof($list);

$list_id = array();
for ($i=0; $i<$list_count; $i++) { $list_id[] = $list[$i][wr_id]; }

// ���� ������ ǥ�ÿ�
$vote_id = array();
if ($mw_basic[cf_vote] && $list_count) {
    $sql = "select wr_id, vt_id from $mw[vote_table] where bo_table = '$bo_table' and wr_id in (".implode(',', $list_id).")";
    $qry = sql_query($sql);
    while ($row = sql_fetch_array($qry)) {
        $vote_id[] = $row[wr_id];
        // �߸��� ���� db ����
        $row2 = sql_fetch("select count(*) as cnt from $mw[vote_item_table] where vt_id = '$row[vt_id]'");
        if (!$row2[cnt])
            sql_query("delete from $mw[vote_table] where vt_id = '$row[vt_id]'");
    }
}

// ���� ������ ǥ�ÿ�
$quiz_id = array();
if ($mw_basic[cf_quiz] && $mw_quiz && $list_count) {
    $sql = "select wr_id, qz_id from $mw_quiz[quiz_table] where bo_table = '$bo_table' and wr_id in (".implode(',', $list_id).")";
    $qry = sql_query($sql, false);
    while ($row = sql_fetch_array($qry)) {
        $quiz_id[] = $row[wr_id];
    }
}

// ���� ������ ǥ�ÿ�
$bomb_id = array();
if ($mw_basic[cf_bomb_level] && $list_count) {
    $sql = "select wr_id from $mw[bomb_table] where bo_table = '$bo_table' and wr_id in (".implode(',', $list_id).")";
    $qry = sql_query($sql, false);
    while ($row = sql_fetch_array($qry)) {
        $bomb_id[] = $row[wr_id];
    }
}

$new_time = date("Y-m-d H:i:s", $g4[server_time] - ($board[bo_new] * 3600));
$row = sql_fetch(" select count(*) as cnt from $write_table where wr_is_comment = 0 and wr_datetime >= '$new_time' ");
$new_count = $row[cnt];

// ���ÿɼ����� ���� ����ġ�Ⱑ ���������� ����
$colspan = 5;

//if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// ������ ���ٷ� ǥ�õǴ� ��� �� �ڵ带 ����� ������.
// <nobr style='display:block; overflow:hidden; width:000px;'>����</nobr>
?>
<? if ($mw_basic[cf_type] == "desc" || $mw_basic[cf_type] == "thumb") { // �����, ��������ϰ�� ���� ���� ?>
<style type="text/css">
#mw_basic .mw_basic_list_subject a { font-size:13px; font-weight:bold; }
</style>
<? } ?>

<link rel="stylesheet" href="<?=$board_skin_path?>/style.common.css?<?=filemtime("$board_skin_path/style.common.css")?>" type="text/css">
<? if ($mw_basic[cf_social_commerce]) { ?>
    <? if ($mw_basic[cf_type] == 'gall') { ?>
    <link rel="stylesheet" href="<?=$social_commerce_path?>/style-gall.css" type="text/css">
    <? } else { ?>
    <link rel="stylesheet" href="<?=$social_commerce_path?>/style.css" type="text/css">
    <? } ?>
<? } ?>

<!--
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
-->
<link type="text/css" href="<?=$board_skin_path?>/mw.js/ui-lightness/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?=$board_skin_path?>/mw.js/jquery-ui-1.8.19.custom.min.js"></script>
<? if (!$wr_id) { ?>
<script type="text/javascript" src="<?=$board_skin_path?>/mw.js/tooltip.js"></script>
<? } ?>

<style>
.board_top { clear:both; }

.board_list { clear:both; width:100%; table-layout:fixed; margin:5px 0 0 0; }
.board_list th { font-weight:bold; font-size:12px; } 
.board_list th { background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; } 
.board_list th { white-space:nowrap; height:34px; overflow:hidden; text-align:center; } 
.board_list th { border-top:1px solid #ddd; border-bottom:1px solid #ddd; } 

.board_list tr.bg0 { background-color:#fafafa; } 
.board_list tr.bg1 { background-color:#ffffff; } 

.board_list td { padding:.5em; }
.board_list td { border-bottom:1px solid #ddd; border-top:1px solid #ddd; }
.board_list td.left {color:#999999; text-align:center; border-bottom:1px solid #ddd; border-top:1px solid #ddd;border-left:1px solid #ddd;  } 
.board_list td.right { font:normal 11px tahoma; color:#BABABA; text-align:center; border-bottom:1px solid #ddd; border-top:1px solid #ddd;border-right:1px solid #ddd;  } 
.board_list td.num { color:#999999; text-align:center; }
.board_list td.checkbox { text-align:center; }
.board_list td.subject { overflow:hidden; }
.board_list td.name { padding:0 0 0 10px; }
.board_list td.datetime { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.hit { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.good { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.nogood { font:normal 11px tahoma; color:#BABABA; text-align:center; }

.board_list .notice { font-weight:normal; }
.board_list .current { font:bold 11px tahoma; color:#E15916; }
.board_list .comment { font-family:Tahoma; font-size:10px; color:#EE5A00; }

.board_button { clear:both; margin:10px 0 0 0; }

.board_page { clear:both; text-align:center; margin:3px 0 0 0; }
.board_page a:link { color:#777; }

.board_search { text-align:center; margin:10px 0 0 0; }
.board_search .stx { height:21px; border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8; }
</style>

<!-- �Խ��� ��� ���� -->
<table width="<?=$bo_table_width?>" align="center" cellpadding="0" cellspacing="0"><tr><td id=mw_basic>

<?  if ($mw_basic['cf_include_head'] && file_exists($mw_basic['cf_include_head']) && strstr($mw_basic[cf_include_head_page], '/l/'))
    include_once($mw_basic[cf_include_head]); ?>

<? include_once("$board_skin_path/mw.proc/mw.list.hot.skin.php"); ?>
    <!-- �з� ����Ʈ �ڽ�, �Խù� ���, ������ȭ�� ��ũ -->
	<div class="board_top">
        <div style="float:left;">
            <?php echo MC::category_search_form($sca);?>
        </div>
        <div style="float:right;">

			<img src="<?=$board_skin_path?>/img/icon_total.gif" align="absmiddle" border='0'>
            <span style="color:#888888; font-weight:bold;">Total <?=number_format($total_count)?></span>
            <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border='0' align="absmiddle"></a><?}?>
            <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif" border='0' title="������" align="absmiddle"></a><?}?>
        </div>
    </div>

    <!-- ���� -->
    <form name="fboardlist" method="post">
    <input type='hidden' name='bo_table' value='<?=$bo_table?>'>
    <input type='hidden' name='sfl'  value='<?=$sfl?>'>
    <input type='hidden' name='stx'  value='<?=$stx?>'>
    <input type='hidden' name='spt'  value='<?=$spt?>'>
    <input type='hidden' name='page' value='<?=$page?>'>
    <input type='hidden' name='sw'   value=''>

    <table cellspacing="0" cellpadding="0" class="board_list">
    <col width="50" />
    <? if ($is_checkbox) { ?><col width="40" /><? } ?>
    <col />
    <col width="110" />
    <col width="40" />
    <col width="50" />
    <? if ($is_good) { ?><col width="40" /><? } ?>
    <? if ($is_nogood) { ?><col width="40" /><? } ?>
    <tr>
        <th>��ȣ</th>
        <? if ($is_checkbox) { ?><th><input onclick="if (this.checked) all_checked(true); else all_checked(false);" type="checkbox"></th><?}?>
        <th>��&nbsp;&nbsp;&nbsp;��</th>
        <th>������Ȳ</th>
        <th><?=subject_sort_link('wr_datetime', $qstr2, 1)?>��¥</a></th>
        <th><?=subject_sort_link('wr_hit', $qstr2, 1)?>��ȸ</a></th>
        <? if ($is_good) { ?><th><?=subject_sort_link('wr_good', $qstr2, 1)?>��õ</a></th><?}?>
        <? if ($is_nogood) { ?><th><?=subject_sort_link('wr_nogood', $qstr2, 1)?>����õ</a></th><?}?>
    </tr>
</table>

    <? 
    for ($i=0; $i<count($list); $i++) { 
        $bg = $i%2 ? 0 : 1;
    ?>
<table cellspacing="0" cellpadding="0" class="board_list">
 <col width="50" />
    <? if ($is_checkbox) { ?><col width="40" /><? } ?>
    <col />
    <col width="110" />
    <col width="40" />
    <col width="50" />
    <? if ($is_good) { ?><col width="40" /><? } ?>
    <? if ($is_nogood) { ?><col width="40" /><? } ?>
   <tr class="bg<?=$bg?>"> 
        <td class="left">
            <? 
            if ($list[$i][is_notice]) // �������� 
                echo "<b>����</b>";
            else if ($wr_id == $list[$i][wr_id]) // ������ġ
                echo "<span class='current'>{$list[$i][num]}</span>";
            else
                echo $list[$i][num];
            ?>
        </td>
        <? if ($is_checkbox) { ?><td class="checkbox"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
        <td class="subject">
		<?
			$ex1_filed = explode("|",$list[$i][wr_1]); 
			$ext1_00  = $ex1_filed[0];
			$ext1_01  = $ex1_filed[1];
			$ext1_02  = $ex1_filed[2];
			$ext1_03  = $ex1_filed[3];
			$ext1_04  = $ex1_filed[4];
			$ext1_05  = $ex1_filed[5];
			$ext1_06  = $ex1_filed[6];
			$ext1_07  = $ex1_filed[7];
			$ext1_08  = $ex1_filed[8];
			$ext1_09  = $ex1_filed[9];
			$ext1_10  = $ex1_filed[10];
			$ext1_11  = $ex1_filed[11];
			$ext1_12  = $ex1_filed[12];
			$ext1_13  = $ex1_filed[13];
			$ext1_14  = $ex1_filed[14];
			$ext1_15  = $ex1_filed[15];
			$ext1_16  = $ex1_filed[16];
			$ext1_17  = $ex1_filed[17];
			$ext1_18  = $ex1_filed[18];
			$ext1_19  = $ex1_filed[19];
			$ext1_20  = $ex1_filed[20];

			$ex2_filed = explode("|",$list[$i][wr_2]); 
			$ext2_00  = $ex2_filed[0]; //�����
			$ext2_01  = $ex2_filed[1]; //�����
			$ext2_02  = $ex2_filed[2]; //�����
			$ext2_03  = $ex2_filed[3]; //�����
			$ext2_04  = $ex2_filed[4];
			$ext2_05  = $ex2_filed[5];
			$ext2_06  = $ex2_filed[6];
			$ext2_07  = $ex2_filed[7];
			$ext2_08  = $ex2_filed[8];
			$ext2_09  = $ex2_filed[9];
			$ext2_10  = $ex2_filed[10];
			$ext2_11  = $ex2_filed[11];
			$ext2_12  = $ex2_filed[12];
			$ext2_13  = $ex2_filed[13];
			$ext2_14  = $ex2_filed[14];
			$ext2_15  = $ex2_filed[15];
			$ext2_16  = $ex2_filed[16];
			$ext2_17  = $ex2_filed[17];
			$ext2_18  = $ex2_filed[18];
			$ext2_19  = $ex2_filed[19]; //�����
		?>
            <? 
            echo $nobr_begin;
            echo $list[$i][reply];
            echo $list[$i][icon_reply];
            //if ($is_category && $list[$i][ca_name]) { 
               // echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
            //}

            if ($list[$i][is_notice])
                echo "<a href='{$list[$i][href]}'><span class='notice'>{$list[$i][subject]}</span></a>";
            else
				echo "<a href='{$list[$i][href]}'><b>[{$ext2_18}]</b></a>&nbsp";
                echo "<a href='{$list[$i][href]}'>{$list[$i][subject]}</a>";

            if ($list[$i][comment_cnt]) 
                echo " <a href=\"{$list[$i][comment_href]}\"><span class='comment'>{$list[$i][comment_cnt]}</span></a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            echo " " . $list[$i][icon_new];
            //echo " " . $list[$i][icon_file];
            //echo " " . $list[$i][icon_link];
            echo " " . $list[$i][icon_hot];
            echo " " . $list[$i][icon_secret];
            echo $nobr_end;
            ?>
			<br> <? echo "<font color=#797979>";
						echo	join('>', MC::getNowCategories($list[$i]['ca_name']));
						echo "</font>";
						?>
        </td>
        <td align="center">
			<? 
				if ($list[$i][wr_5]){ // �Ⱓ���� 
					// ����ð�
					$current_time = date("Y-m-d",time()); //���ó�¥��� 
					$notice_time  = $list[$i][wr_5];
					
					$last_time =  intval((strtotime($notice_time)-strtotime($current_time)) / 86400); // ������ ��¥��
					
					}
					//���� ���� -  �̸�, ����ǥ��
					if($last_time >= 0){ 
						echo "<img src={$board_skin_path}/img/icon_ing.gif border=0>";
						}
						else if($last_time < 0){
							echo "<img src={$board_skin_path}/img/icon_end.gif border=0>";
						}
			?>
		
		</td>
        <td class="datetime"><?=$list[$i][datetime2]?></td>
        <td class="right"><?=$list[$i][wr_hit]?></td>
        <? if ($is_good) { ?><td class="good"><?=$list[$i][wr_good]?></td><? } ?>
        <? if ($is_nogood) { ?><td class="nogood"><?=$list[$i][wr_nogood]?></td><? } ?>
    </tr>
	 </table>
    </form>
    <? } // end for ?>

    <? if (count($list) == 0) { echo "<table width=100%> <tr><td colspan='$colspan' height=100 align=center>�Խù��� �����ϴ�.</td></tr></table>"; } ?>

   

    <div class="board_button">
        <div style="float:left;">
        <? if ($list_href) { ?>
        <a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/btn_list.gif" align="absmiddle" border='0'></a>
        <? } ?>
        <? if ($is_checkbox) { ?>
        <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" align="absmiddle" border='0'></a>
        <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/btn_select_copy.gif" align="absmiddle" border='0'></a>
        <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/btn_select_move.gif" align="absmiddle" border='0'></a>
        <? } ?>
        </div>

        <div style="float:right;">
        <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border='0'></a><? } ?>
        </div>
    </div>

    <!-- ������ -->
    <div class="board_page">
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/page_search_prev.gif' border='0' align=absmiddle title='�����˻�'></a>"; } ?>
        <?
        // �⺻���� �Ѿ���� �������� �Ʒ��� ���� ��ȯ�Ͽ� �̹����ε� ����� �� �ֽ��ϴ�.
        //echo $write_pages;
        $write_pages = str_replace("ó��", "<img src='$board_skin_path/img/page_begin.gif' border='0' align='absmiddle' title='ó��'>", $write_pages);
        $write_pages = str_replace("����", "<img src='$board_skin_path/img/page_prev.gif' border='0' align='absmiddle' title='����'>", $write_pages);
        $write_pages = str_replace("����", "<img src='$board_skin_path/img/page_next.gif' border='0' align='absmiddle' title='����'>", $write_pages);
        $write_pages = str_replace("�ǳ�", "<img src='$board_skin_path/img/page_end.gif' border='0' align='absmiddle' title='�ǳ�'>", $write_pages);
        //$write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "$1", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><span style=\"color:#4D6185; font-size:12px; text-decoration:underline;\">$1</span></b>", $write_pages);
        ?>
        <?=$write_pages?>
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/page_search_next.gif' border='0' align=absmiddle title='�����˻�'></a>"; } ?>
    </div>

    <!-- �˻� -->
    <div class="board_search">
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?=$bo_table?>">
        <input type="hidden" name="sca"      value="<?=$sca?>">
        <select name="sfl">
            <option value="wr_subject">����</option>
            <option value="wr_content">����</option>
            <option value="wr_subject||wr_content">����+����</option>
            <option value="mb_id,1">ȸ�����̵�</option>
            <option value="mb_id,0">ȸ�����̵�(��)</option>
            <option value="wr_name,1">�۾���</option>
            <option value="wr_name,0">�۾���(��)</option>
        </select>
        <input name="stx" class="stx" maxlength="15" itemname="�˻���" required value='<?=stripslashes($stx)?>'>
        <input type="image" src="<?=$board_skin_path?>/img/btn_search.gif" border='0' align="absmiddle">
        <input type="radio" name="sop" value="and">and
        <input type="radio" name="sop" value="or">or
        </form>
    </div>

</td></tr></table>

<script type="text/javascript">
if ('<?=$sca?>') document.fcategory.sca.value = '<?=$sca?>';
if ('<?=$stx?>') {
    document.fsearch.sfl.value = '<?=$sfl?>';

    if ('<?=$sop?>' == 'and') 
        document.fsearch.sop[0].checked = true;

    if ('<?=$sop?>' == 'or')
        document.fsearch.sop[1].checked = true;
} else {
    document.fsearch.sop[0].checked = true;
}
</script>

<? if ($is_checkbox) { ?>
<script type="text/javascript">
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str) {
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "�� �Խù��� �ϳ� �̻� �����ϼ���.");
        return false;
    }
    return true;
}

// ������ �Խù� ����
function select_delete() {
    var f = document.fboardlist;

    str = "����";
    if (!check_confirm(str))
        return;

    if (!confirm("������ �Խù��� ���� "+str+" �Ͻðڽ��ϱ�?\n\n�ѹ� "+str+"�� �ڷ�� ������ �� �����ϴ�"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// ������ �Խù� ���� �� �̵�
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "����";
    else
        str = "�̵�";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- �Խ��� ��� �� -->