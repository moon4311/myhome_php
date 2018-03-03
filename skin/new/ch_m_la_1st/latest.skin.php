<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
	<link rel="stylesheet" href="<?=$latest_skin_path?>/ch.latest.css" type="text/css">


	<div class="chance_la_1st" style="vertical-align: top;">
		<!-- <h3 class="chance_la_title"></h3> -->
		<div class="chance_la_1st_div">
			<span class="chance_la_1st_span_le"> <a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>"><span class="chance_la_1st_title"><?=$board['bo_subject']?></span></a></span>
			<span class="chance_la_1st_span_ri"><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>"><img src="<?=$latest_skin_path?>/img/bo_la_more.gif" border="0" alt="more"></a></span>
		</div>

		<ul class="chance_la_1st_line"></ul>

		<ul class="chance_la_1st_list">
		<? for ($i=0; $i<count($list); $i++) { ?>

			<li <? if ($i<count($list)-1) { // 마지막 라인 출력 안함 ?> style="border-bottom: dotted 1px #dadada;"<? } ?>>
				<span style="float: left;">
				<?

				echo "<img src='{$latest_skin_path}/img/bo_la_ico.gif'>&nbsp;&nbsp;";

				echo "<a href='{$list[$i]['href']}' title='{$list[$i]['subject']}'>";

				if ($list[$i]['is_notice'])
					echo "<strong><span style='font-family: tahoma,dotum; font-size: 12px; color: #595959;'>{$list[$i]['subject']}</span></strong>";
				else
					echo "<span style='font-family: tahoma,dotum; font-size: 12px; color: #595959;'>{$list[$i]['subject']}</span>";
				echo "</a>";

				?>
				</span>

				<span style="float: right;">
				<?

				echo "<span style='font-family: verdana; font-size: 11px; color: #595959;'>[ {$list[$i][datetime]} ]</span>";

				?>
				</span>
			</li>

		<? } ?>

		<? if (count($list) == 0) { ?>
			<li><span style='font-family: tahoma; font-size: 12px; color: #595959;'></span></li>
		<? } ?>
		</ul>
	</div>
