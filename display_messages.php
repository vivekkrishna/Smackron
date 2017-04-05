<?php
require_once 'cn.php';
require_once 'protect.php';
session_start();
include('core/init.php');
$fiveMinutesAgo = time() - 600;
$toI_id = protect($_POST['toe_id']);
$sql = 'SELECT
	from_id, to_id, message_content, message_time
		FROM
	messages
		WHERE
	message_time > ' . $fiveMinutesAgo . ' AND
            
            to_id = ' . $_SESSION[uid] . ' OR
              message_time > ' . $fiveMinutesAgo . ' AND
              
             from_id = ' . $_SESSION[uid] . ' 
		ORDER BY
	message_time';
$result = mysql_query($sql, $cn) or
	die(mysql_error($cn));
	
while ($row = mysql_fetch_assoc($result)) {
	$hoursAndMinutes = date('g:ia', $row['message_time']);
	$user_info = fetch_user_info($row['from_id']);
	echo '<p><strong>' . $user_info['username']  .  '</strong>: <em>(' . $hoursAndMinutes . ')</em> ' . $row['message_content'] . '</p>';
}
?>