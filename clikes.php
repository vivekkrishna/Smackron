<?php

include('newCon.php');
include('wall-functions.php');

$member_id = isset($_REQUEST['member_id']) && is_numeric($_REQUEST['member_id']) ? intval($_REQUEST['member_id']) : '';
$entry_id = isset($_REQUEST['post_id']) && is_numeric($_REQUEST['post_id']) ? intval($_REQUEST['post_id']) : '';

$likes = 0;
if(@$_REQUEST['action'] == 1)
{
$result = mysql_query("update facebook_posts_comments set clikes=clikes+1 where c_id= ".$entry_id);
$result = mysql_query("INSERT INTO facebook_likes_track (comment_id,member_id) VALUES('".$entry_id."','".$member_id."')");
$result = mysql_query("SELECT clikes FROM facebook_posts_comments where c_id = ".$entry_id." ");

if (mysql_num_rows($result) > 0)
{
while( $obj = @mysql_fetch_array($result) )
{
$likes 	= $obj['clikes'];
}
}

echo $likes;
}
else if(@$_REQUEST['action'] == 2)
{
$result = mysql_query("update facebook_posts_comments set clikes=clikes-1 where c_id= ".$entry_id);
$result = mysql_query("delete from facebook_likes_track where comment_id=".$entry_id." and member_id=".$member_id);
$result = mysql_query("SELECT clikes FROM facebook_posts_comments where c_id = ".$entry_id." ");

if (mysql_num_rows($result) > 0)
{
while( $obj = @mysql_fetch_array($result) )
{
$likes 	= $obj['clikes'];
}
}

echo $likes;
}


?>