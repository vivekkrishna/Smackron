<?php
require_once 'cn.php';
require_once 'protect.php';
session_start();

$too_id = protect($_POST['to_id']);
$message = protect($_POST['message']);
$time = time();

$sql = 'INSERT INTO messages
	(from_id,
        to_id,
	 message_content,
	 message_time)
		VALUES
	(' . $_SESSION[uid] . ',
            ' . $too_id . ',
	 "' . $message . '",
	 ' . $time . ')';
$result = mysql_query($sql, $cn) or
	die(mysql_error($cn));
?>