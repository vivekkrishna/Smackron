<?php
$cn = mysql_connect('localhost', 'root', '') or
	die('Unable to connect to server');
mysql_select_db('smackron', $cn) or
	die(mysql_error($cn));
?>