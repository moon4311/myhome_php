<?php
$g4_path = '../../..';
include_once($g4_path . '/common.php');
if(!$board['bo_table'] || !$_GET['type']) goto_url($g4['path']);
set_session('ss_board_type', $_GET['type']);
goto_url($g4['bbs_path'] . '/board.php?bo_table=' . $board['bo_table']);
?>