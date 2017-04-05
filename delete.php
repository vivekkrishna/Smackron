<?php

	include('newCon.php');
	mysql_query("delete from facebook_posts where p_id ='".$_REQUEST['id']."'");
	mysql_query("delete from facebook_posts_comments where post_id ='".$_REQUEST['id']."'");
	
	
?>