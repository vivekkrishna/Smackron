<?php

include('newCon.php');
include('wall-functions.php');

$member_id = isset($_REQUEST['member_id']) && is_numeric($_REQUEST['member_id']) ? intval($_REQUEST['member_id']) : '';
$entry_id = isset($_REQUEST['post_id']) && is_numeric($_REQUEST['post_id']) ? intval($_REQUEST['post_id']) : '';

if(!function_exists('getAvatar')) {

function getAvatar($user_id = ''){

$username_get = mysql_query("SELECT picture from member where member_id=".$user_id." order by member_id desc limit 1");
while ($name = @mysql_fetch_array($username_get))
{
$picture = $name['picture'];
}

$user_avatar = 'pics/'.$picture;

return  $user_avatar;
}
}

$likes = 0;
if(@$_REQUEST['action'] == 1)
{
$result = mysql_query("update facebook_posts set likes=likes+1 where p_id= ".$entry_id);


$result = mysql_query("INSERT INTO facebook_likes_track (post_id,member_id) VALUES('".$entry_id."','".$member_id."')");

$result = mysql_query("SELECT * FROM facebook_posts where p_id = ".$entry_id." ");
if (mysql_num_rows($result) > 0)
{
while( $obj = @mysql_fetch_array($result) )
{
$likes 	= $obj['likes'];
}
}

echo $likes;
}
else if(@$_REQUEST['action'] == 2)
{
$result = mysql_query("update facebook_posts set likes=likes-1 where p_id= ".$entry_id);
$result = mysql_query("delete from facebook_likes_track where post_id=".$entry_id." and member_id=".$member_id);

$result = mysql_query("SELECT * FROM facebook_posts where p_id = ".$entry_id." ");
if (mysql_num_rows($result) > 0)
{
while( $obj = @mysql_fetch_array($result) )
{
$likes 	= $obj['likes'];
}
}

echo $likes;
}


?>