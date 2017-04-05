<?php


include('newCon.php');
include('wall-functions.php');

$user_id = $_REQUEST['x'];

if(!@$user_id)
$user_id = $_REQUEST['x'];

if($_REQUEST['pid'])
{
// Wall counter update
$pid = $_REQUEST['pid'];

$post_owner_id = 0;

$nResulto = mysql_query("SELECT * FROM facebook_posts WHERE p_id=".$pid." and posted_by = ".$user_id." limit 1");
if (mysql_num_rows($nResulto))
{
$post_owner_id = 1;
}

$result = mysql_query("SELECT t1.*,t2.*, 
UNIX_TIMESTAMP() - t1.date_created AS CommentTimeSpent FROM facebook_posts_comments as t1,user as t2 where t1.post_id = ".$pid." AND t1.c_id <= (SELECT * FROM (SELECT c_id FROM facebook_posts_comments WHERE post_id = ".$pid." ORDER BY c_id DESC LIMIT 2,1) tmp) AND t1.userid=t2.id order by t1.c_id asc");
}

while ($rows = mysql_fetch_array($result))
{
$flag_already_liked_c = 0;
$nResult = mysql_query("SELECT * FROM facebook_likes_track WHERE member_id=".$user_id." AND comment_id=".$rows['c_id']);
if (mysql_num_rows($nResult))
{
$flag_already_liked_c = 1;
}

$days2 = floor($rows['CommentTimeSpent'] / (60 * 60 * 24));
$remainder = $rows['CommentTimeSpent'] % (60 * 60 * 24);
$hours = floor($remainder / (60 * 60));
$remainder = $remainder % (60 * 60);
$minutes = floor($remainder / 60);
$seconds = $remainder % 60;	
$member_avatar = getUserImg($rows['userid']);?>

<div class="commentPanel" id="record-<?php  echo $rows['c_id'];?>" align="left">

<a href="#">
<img src="<?php echo $member_avatar;?>" style="float:left; padding-right:9px;" width="40" height="40" border="0" alt="" />
</a>
<label class="name">
<b>
<a href="#">
<?php echo $rows['fullname'];?>
</a>
</b>
<div class="name" style="text-align:justify;float:left;">
<em>
<?php  
$rows['comments'] =  ($rows['comments']);
echo clickable_link($rows['comments']);?>
</em>
</div>
<br />
<div style="width:350px;float:right;">
<div style="float:left; padding-top:3px;">
<span class="timeanddate">
<?php
if($days2 > 0)
{
// $oldLocale = setlocale(LC_TIME, 'pt_BR');
$rows['date_created'] = strftime("%b %e %Y", $rows['date_created']); 
// $rows['date_created'] = utf_convert ($rows['date_created']);
echo $rows['date_created'];
//setlocale(LC_TIME, $oldLocale);
}
elseif($days2 == 0 && $hours == 0 && $minutes == 0)
echo "few seconds ago";		
elseif($days2 == 0 && $hours == 0)
echo $minutes.' minutes ago';
else
echo "few seconds ago";		
?>
</span>
<?php
//echo $rows['userid'] .'--'. $user_id;
if( $rows['userid'] == $user_id || $post_owner_id == 1){?>

&nbsp;<a href="#" id="CID-<?php  echo $rows['c_id'];?>" class="c_delete">Delete</a> - 
<?php
}?>
<span id="clike-panel-<?php  echo $rows['c_id']?>">
<?php if (@$flag_already_liked_c == 0) {?>

<a href="javascript: void(0)" id="post_id<?php  echo $rows['c_id']?>" onclick="javascript: Clikethis(<?php echo $user_id?>,<?php  echo $rows['c_id']?>,1,<?php  echo $rows['post_id']?>);">Like</a>
<?php }else {?>

<a href="javascript: void(0)" id="post_id<?php  echo $rows['c_id']?>" onclick="javascript: Clikethis(<?php echo $user_id?>,<?php  echo $rows['c_id']?>,2,<?php  echo $rows['post_id']?>);">Unlike</a>
<?php }?>
</span>
</div>
<div id="ppl_clike_div_<?php  echo $rows['c_id']?>" <?=(($rows['clikes']) ? 'style="float:left;padding-top:3px;"' : 'style="display:none;padding-top:3px;float:left;"')?>>
- <a class="t" href="javascript:;" onclick="alert('Sorry this feature is not available in this demo version.')">
<span id="clike-stats-<?php  echo $rows['c_id']?>"> <?php echo $rows['clikes'];?> people like this
</span> 
</a>
</div>
<br clear="all" />
</div>
</label>
<br clear="all" />
</div>

<?php
}?>	




