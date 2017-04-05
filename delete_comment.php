<?php

	include('newCon.php');
	include('wall-functions.php');
	
	mysql_query("delete from facebook_posts_comments where c_id ='".$_REQUEST['c_id']."'");
	
?>