<?php
include_once("./_common.php");
include_once("./config.php");

// �ְ�����ڸ� ���� �����ϰ�
if ($is_admin !== "super")
    die;

$sql = "
        CREATE TABLE IF NOT EXISTS `$taja_table` (
          `no` int(11) NOT NULL AUTO_INCREMENT,
          `mb_id` varchar(255) NOT NULL,
          `taja_point` int(11) NOT NULL,
          `taja_datetime` datetime NOT NULL,
          PRIMARY KEY (`no`)
        )";
sql_query($sql);
?>