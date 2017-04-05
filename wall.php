<script> $(document).ready(function(){	 $('.commentMark').elastic(); });	</script>

<?php

session_start();
include('newCon.php');
include('wall-functions.php');
$query=mysql_query("select * from user where id='$_SESSION[uid]'");
    $num_rows=mysql_num_rows($query);
    if($num_rows!=0)
    {
        while ($row = mysql_fetch_assoc($query)) {$friend_array=$row['friend_array'];
        }}
$show_comments_per_page = 2;

$user_id 	= $_SESSION['uid']; // it should be dynamic with current logged in ID
$logged_id = $_SESSION['uid'];

if(!$logged_id)
$logged_id = $_REQUEST['x'];

$next_records = 5;
$show_more_button = 0;

$logged_user_pic ='';

$memberPic = getUserImg($logged_id);

if(checkValues(@$_REQUEST['value']))
{
$user_id = $_REQUEST['x'];
$posted_on = $_REQUEST['p'];
$val = checkValues($_REQUEST['value']);

mysql_query("INSERT INTO facebook_posts (post,userid,date_created,posted_by) VALUES('".$val."','".$posted_on."','".strtotime(date("Y-m-d H:i:s"))."','".$user_id."')");

################
$lastID = mysql_insert_id();

############

$result = mysql_query("SELECT DISTINCT facebook_posts.p_id,facebook_posts.userid,facebook_posts.type,facebook_posts.title,facebook_posts.url,facebook_posts.description,facebook_posts.cur_image,facebook_posts.likes,facebook_posts.post_type,facebook_posts.posted_by,facebook_posts.post, UNIX_TIMESTAMP() - facebook_posts.date_created AS TimeSpent,facebook_posts.date_created FROM facebook_posts where facebook_posts.posted_by IN ($friend_array,$_SESSION[uid]) order by facebook_posts.p_id desc limit 1 ");

}
else if(checkValues(@$_REQUEST['image_url']))
{
$user_id = $_REQUEST['x'];
$posted_on = $_REQUEST['p'];

$image_url = checkValues($_REQUEST['image_url']);
$post = checkValues($_REQUEST['post']);

$uip = $_SERVER['REMOTE_ADDR'];

mysql_query("INSERT INTO facebook_posts (post,userid,date_created,posted_by,uip,cur_image,post_type) VALUES('".$post."','".$posted_on."','".strtotime(date("Y-m-d H:i:s"))."','".$user_id."','".$uip."','".$image_url."','2')"); // 2 = image only 

$result = mysql_query("SELECT DISTINCT facebook_posts.p_id,facebook_posts.uip,facebook_posts.userid,facebook_posts.post_type,facebook_posts.title,facebook_posts.url,facebook_posts.likes,facebook_posts.description,facebook_posts.cur_image,facebook_posts.post_type,facebook_posts.type,facebook_posts.posted_by,facebook_posts.post,facebook_posts.title,facebook_posts.url,facebook_posts.description,facebook_posts.cur_image,user.*, UNIX_TIMESTAMP() - facebook_posts.date_created AS TimeSpent,facebook_posts.date_created FROM facebook_posts,user where facebook_posts.userid=".$posted_on." and facebook_posts.posted_by=".$user_id." and user.id =facebook_posts.userid order by facebook_posts.p_id desc limit 1 ");
}
elseif(@$_REQUEST['show_more_post']) // more posting paging
{
$next_records = $_REQUEST['show_more_post'] + 10;
$posted_on = $_REQUEST['p'];

$result = mysql_query("SELECT DISTINCT facebook_posts.p_id,facebook_posts.uip,facebook_posts.userid,facebook_posts.post_type,facebook_posts.title,facebook_posts.url,facebook_posts.likes,facebook_posts.description,facebook_posts.cur_image,facebook_posts.post_type,facebook_posts.type,facebook_posts.posted_by,facebook_posts.post,facebook_posts.title,facebook_posts.url,facebook_posts.description,facebook_posts.cur_image, UNIX_TIMESTAMP() - facebook_posts.date_created AS TimeSpent,facebook_posts.likes,facebook_posts.date_created FROM facebook_posts where facebook_posts.posted_by IN ($friend_array,$_SESSION[uid]) order by facebook_posts.p_id desc limit ".$_REQUEST['show_more_post'].", 10");

$check_res = mysql_query("SELECT DISTINCT facebook_posts.p_id FROM facebook_posts,user where user.id = ".$posted_on." and user.id =facebook_posts.userid order by facebook_posts.p_id desc limit ".$next_records.", 10");

$show_more_button = 0; // button in the end

$check_result = @mysql_num_rows(@$check_res);
if(@$check_result > 0)
{
$show_more_button = 1;
}
}
else
{	
$show_more_button = 1;

$result = mysql_query("SELECT DISTINCT facebook_posts.p_id,facebook_posts.uip,facebook_posts.userid,facebook_posts.post_type,
    facebook_posts.title,facebook_posts.url,facebook_posts.likes,facebook_posts.description,facebook_posts.cur_image,
    facebook_posts.post_type,facebook_posts.type,facebook_posts.posted_by,facebook_posts.post,facebook_posts.title,
    facebook_posts.url,facebook_posts.description,facebook_posts.cur_image, 
    UNIX_TIMESTAMP() - facebook_posts.date_created AS TimeSpent,facebook_posts.date_created FROM facebook_posts
    where facebook_posts.posted_by IN ($friend_array,$_SESSION[uid]) order by facebook_posts.p_id desc limit 0,30");

}

while ($row = @mysql_fetch_array($result))
{
$result1 = mysql_query("SELECT * FROM user WHERE id='$row[posted_by]'");
while($row1 = mysql_fetch_assoc($result1)){
    $flag_already_liked = 0;
$nResult = mysql_query("SELECT * FROM facebook_likes_track WHERE member_id=".$user_id." AND post_id=".$row['p_id']);
if (mysql_num_rows($nResult))
{
$flag_already_liked = 1;
}

$comments = mysql_query("SELECT t1.*,t2.*,UNIX_TIMESTAMP() - t1.date_created AS CommentTimeSpent FROM facebook_posts_comments as t1,user as t2 where t1.post_id = ".$row['p_id']." AND t1.userid=t2.id order by t1.c_id desc limit ".$show_comments_per_page);

$comments_counts = mysql_query("SELECT t1.*,t2.fullname,t2.id FROM facebook_posts_comments as t1,user as t2 where t1.post_id = ".$row['p_id']." AND t1.userid=t2.id order by t1.c_id desc");

$number_of_comments = mysql_num_rows(@$comments_counts);

if($number_of_comments>0)
{
$m=1; $friends_list = array();
while ($rows = @mysql_fetch_array($comments_counts))
{
if( $m < $show_comments_per_page-1 ){ $m++; continue; }
else
{ 
$fname = $rows['fullname'];
if( !in_array($fname,$friends_list) )
array_push($friends_list, $fname );  $m++; 
}
if($m-$show_comments_per_page > 8)
break;
}

$namestring = implode(', ', $friends_list);
}

?>

<div>
<div class="friends_area" id="record-<?php  echo $row['p_id']?>">
<?php
if($row['userid'] == $row['posted_by'])
{
$memberPic = getUserImg($row['posted_by']);?>

<a href="javascript:;">
<img src="<?php echo $memberPic;?>" style="float:left; padding-right:9px;" width="50" height="50" border="0" alt="" />
</a>
<label style="float:left; width:390px;" class="name">
<b>
<a href="javascript:;">
<?php echo $row1['fullname'];?>	
</a>
</b>
<?php
}
else
{
$username_gets = mysql_query("SELECT * from user where id=".$row['posted_by']." order by id desc limit 1");
while ($names = @mysql_fetch_array($username_gets))
{
//$user_avatar_2 = $names['picture'];
$user_id_2 = $names['id'];
$fname_2 = $names['fullname'];
}
$wall_gets = mysql_query("SELECT * from user where id=".$row['userid']." order by id desc limit 1");
while ($name = @mysql_fetch_array($wall_gets))
{
//$user_avatar_2 = $names['picture'];
$user_id_3 = $name['id'];
$fname_3 = $name['fullname'];
}
$s_memberPic = getUserImg( $row['posted_by'] );?>

<a href="javascript:;">
<img src="<?php echo $s_memberPic;?>" style="float:left; padding-right:9px;" width="50" height="50" border="0" alt="" />
</a>
<label style="float:left; width:390px;" class="name">
<b>
<a href="javascript:;">
<?php echo $fname_2."  in  ".$fname_3; ?>
</a>
</b>
<?php
}?>

<br clear="all" /> 
<div class="name" style="text-align:justify;float:left;">
<em>
<?php  
$row['post'] = $row['post'];
$html ='';
if($row['post_type'] == 2) {

$html .= '<em>';

$pdata = $row['post'];

$html .= '<div class="attach_content2">'.$pdata.'<br />';

$img = $row["cur_image"];

$urls = 'media/'.$img;

$clickc = "onclick=\"showimgs('$urls');\"";

$html .= '<div class="atc_images2"> <a href="javascript:;" '.$clickc.'>';

if (file_exists("media/".$row['cur_image'])) 
{
	$html .= '<img src="media/'.$row["cur_image"].'" width="100" border="0" style="">';
}
 
$html .= '</a>';
$html .= '</div>';

$html .= '<br clear="all" />';
		
$html .= '</div>';

$html .= '</em>';
echo $html;
}
else 
{
$pdata = $row['post'];
echo clickable_link($pdata);
}?>
</em>
<br clear="all" />
<div style="height:10px;">
<span>

<?php  

$days = floor($row['TimeSpent'] / (60 * 60 * 24)); 
$remainder = $row['TimeSpent'] % (60 * 60 * 24);
$hours = floor($remainder / (60 * 60));
$remainder = $remainder % (60 * 60);
$minutes = floor($remainder / 60);
$seconds = $remainder % 60;

if($days > 0) {

//$oldLocale = setlocale(LC_TIME, 'pt_BR');
$row['date_created'] = strftime("%b %e %Y", $row['date_created']); 

echo $row['date_created'];
// setlocale(LC_TIME, $oldLocale);
} 
elseif($days == 0 && $hours == 0 && $minutes == 0)
echo "few seconds ago";		
elseif($hours)
echo $hours.' hours ago';
elseif($days == 0 && $hours == 0)
echo $minutes.' minutes ago';
else
echo "few seconds ago"; ?>
</span> 
&nbsp;<a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" class="showCommentBox">Comment</a> 

-&nbsp;<span id="like-panel-<?php  echo $row['p_id']?>">
<?php if (@$flag_already_liked == 0) {$e = 'cool';?>

<a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" onclick="javascript: likethis(<?php echo $logged_id?>,<?php  echo $row['p_id']?>,1);">Like</a>
<?php }else { $e = 'uncool';?>

<a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" onclick="javascript: likethis(<?php echo $logged_id?>,<?php  echo $row['p_id']?>,2);">Unlike</a>
<?php }?>
</span>
</div>
</div>	
</label>
<?php
if($row['userid'] == @$logged_id || $row['posted_by'] == @$logged_id){
?>
<a href="#" class="delete_p" style="color:#ff0000;"><img src="hide.png" border="0" /></a>
<?php
}?>

<br clear="all" /><br clear="all" />

<div class="showPpl" id="ppl_like_div_<?php  echo $row['p_id']?>" <?=((@$row['likes']) ? "" : 'style="display:none"')?>>

<!--<a class="t" href="javascript:;" onclick="alert('Sorry this feature is not available in this demo version.')">-->
    <a onmouseover="ShowContent('uniquename3'); return true;"
   onmouseout="HideContent('uniquename3'); return true;"
   href="javascript:ShowContent('uniquename3')">
<span id="like-stats-<?php  echo $row['p_id']?>"> <?php echo (($row['likes']) ? $row['likes'] : 0);?> 
people like this</span> </a>
<!--</a>-->
<span></span>
</div>
<div 
   id="uniquename3" 
   style="display:none; 
      position:absolute; 
      border-style: solid; 
      background-color: white; 
      padding: 5px;">
Content goes here.
</div>
<?php if($number_of_comments > $show_comments_per_page){?>

<div class="Vr yx clickOpen" id="collapsed_<?php  echo $row['p_id']?>" align="left"><span role="button" class="a-j ug Ss" tabindex="0"></span><div class="Ko"><span role="button" class="a-j zx" tabindex="0"><span class="Fw tx"><?php echo $number_of_comments?></span><span class="ux"> comments</span></span><span class="px"> &nbsp;-&nbsp; <span class="xo"><span class="uo"><?php echo @$namestring?>...</span></span></span></div></div>

<?php }?>

<div id="CommentPosted<?php  echo $row['p_id']?>">
<div id="loadComments<?php  echo $row['p_id']?>" style="display:none"></div>
<?php
$comment_num_row = mysql_num_rows(@$comments);
if($comment_num_row > 0)
{
//$comments = array_reverse(mysql_fetch_array($comments));
$allrows = array();
while ($rowed = mysql_fetch_array($comments)) {
$allrows[] = $rowed;
}
$allrows = array_reverse($allrows);	
//print_r($rows);
//while ($rows = array_reverse(mysql_fetch_array($comments)))
foreach($allrows as $rows)
{
$flag_already_liked_c = 0;
$nResult = mysql_query("SELECT * FROM facebook_likes_track WHERE member_id=".$user_id." AND comment_id=".$rows['c_id']);
if (mysql_num_rows($nResult))
{
$flag_already_liked_c = 1;
}

$comm_avatar = getUserImg($rows['userid']);

$days2 = floor($rows['CommentTimeSpent'] / (60 * 60 * 24));
$remainder = $rows['CommentTimeSpent'] % (60 * 60 * 24);
$hours = floor($remainder / (60 * 60));
$remainder = $remainder % (60 * 60);
$minutes = floor($remainder / 60);
$seconds = $remainder % 60;		?>



<div class="commentPanel" id="record-<?php  echo $rows['c_id'];?>" align="left">

<a href="javascript:;">
<img src="<?php echo $comm_avatar;?>" style="float:left; padding-right:9px;" width="40" height="40" border="0" alt="" />
</a>

<label class="name">
<b>
<a href="javascript:;">
<?php echo $rows['fullname'];?>
</a>
</b>
<div class="name" style="text-align:justify;float:left;">
<em>
<?php  

echo clickable_link($rows['comments']);?></em>
</div>
<br/>
<div style="width:350px;float:right;">
<div style="float:left; padding-top:3px;">
<span class="timeanddate">
<?php
if($days2 > 0) 
{
//$oldLocale = setlocale(LC_TIME, 'pt_BR');
$rows['date_created'] = strftime("%b %e %Y", $rows['date_created']); 

echo $rows['date_created'];
//setlocale(LC_TIME, $oldLocale);
} 
elseif($days2 == 0 && $hours == 0 && $minutes == 0)
 echo "few seconds ago";			
elseif($hours)
echo $hours.' hours ago';
elseif($days2 == 0 && $hours == 0)
echo $minutes.' minutes ago';
else
echo "few seconds ago";?>
</span>

<?php

if($row['userid'] == @$logged_id || $rows['userid'] == @$logged_id)
{?>
&nbsp;<a href="javascript:void(0)" id="CID-<?php  echo $rows['c_id'];?>" class="c_delete">Delete</a>
<?php
}?>
-
<span id="clike-panel-<?php  echo $rows['c_id']?>">
<?php if ($flag_already_liked_c == 0) {$e = 'cool';?>

<a href="javascript: void(0)" id="post_id<?php  echo $rows['c_id']?>" onclick="javascript: Clikethis(<?php echo $logged_id?>,<?php  echo $rows['c_id']?>,1,<?php  echo $rows['post_id']?>);">Like</a>
<?php }else {$e = 'uncool';?>

<a href="javascript: void(0)" id="post_id<?php  echo $rows['c_id']?>" onclick="javascript: Clikethis(<?php echo $logged_id?>,<?php  echo $rows['c_id']?>,2,<?php  echo $rows['post_id']?>);">Unlike</a>
<?php }?>
</span>
</div>
<div id="ppl_clike_div_<?php  echo $rows['c_id']?>" <?=(($rows['clikes']) ? 'style="float:left;padding-top:3px;"' : 'style="display:none;padding-top:3px;float:left;"')?>>
- <a class="t" href="javascript:;" onclick="alert('Sorry this feature is not available in this demo version.')">
<span id="clike-stats-<?php  echo $rows['c_id']?>"> <?php echo $rows['clikes'];?> people like this</span> 
</a></div>
<span></span>
</div>
<br clear="all" />
</label>
</div>
<?php
}?>				
<?php
}?>
</div>

<div class="commentBox" align="right" id="commentBox-<?php  echo $row['p_id'];?>" <?php echo (($comment_num_row) ? '' :'style="display:none"')?>>

<img src="<?php echo $memberPic;?>" style="float:left; padding-right:6px;" width="37" height="37" border="0" alt="" class="CommentImg" />
<input type="hidden" id="owner<?php  echo $row['p_id'];?>" value="<?php  echo $row['posted_by']?>" />
<label id="record-<?php  echo $row['p_id'];?>">
<textarea class="commentMark" id="commentMark-<?php  echo $row['p_id'];?>" onblur="if (this.value=='') this.value = 'Write a comment'" onfocus="if (this.value=='Write a comment') this.value = ''" onKeyPress="return SubmitComment(this,event)" wrap="hard" name="commentMark" style=" background-color:#fff; overflow: hidden;" cols="60">Write a comment</textarea>
</label>
<br clear="all" />
</div>
</div>
</div>   
<?php
}
}

if($show_more_button == 1){?>
<br clear="all" /><br clear="all" />
<div id="bottomMoreButton" >
<a id="more_<?php echo @$next_records?>" class="more_records" name="2" href="javascript: void(0)">More posts ...</a>
</div>
<?php
}?>
