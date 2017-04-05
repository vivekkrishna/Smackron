
<link type="text/css" href="fb/stylesheet.css" rel="stylesheet">

<div class="imagecomments">
	
    <img src="<?php echo @$_REQUEST['uls']?>" width="520" alt="Loading..."/>
    <br />
    <span>	
        <a href="javascript: void(0)" >Comment</a> - <a href="javascript: void(0)" >Like</a>&nbsp;&nbsp;&nbsp;<span style="color:#063">This functionality is not available in this version.</span>
    </span>
    
    
    <div id="CommentPosted4">
     
     <div id="loadComments4" style="display:none"></div>
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
        <div class="commentPanel" align="left">
						
						<a href="javascript:;">
							<img src="pics/99points.jpg" style="float:left; padding-right:9px;" width="40" height="40" border="0" alt="">
						</a>
						
					   <label class="name">
                       <b>
                           <a href="javascript:;">
                            Rocking Demo                           </a>
                       </b>
	                  <div class="name" style="text-align:justify;float:left;">
                       <em>
					   Dance classes is starting..Don't forget to register this Spring 2011.Speacial student discount.</em>
						</div>
						<br>
                        <div style="width:350px;float:right;">
                        <div style="float:left; padding-top:3px;">
							<span class="timeanddate">
														</span>
														&nbsp;<a href="javascript:void(0)">Delete</a>
													-
						<span>
													
							<a href="javascript: void(0)" id="post_id9" >Like</a>
												</span>
						</div>
						<div id="ppl_clike_div_9" style="float:left;padding-top:3px;">
                             - <a class="t" href="javascript:;" >
                            <span > 1 person</span> 
                               </a></div>
                            <span></span>
                        </div>
						<br clear="all">
                    </label>
					</div>
					
    </div>
                                
    <div class="commentBox" align="right">
                    
        <img src="pics/99points-4.jpg" style="float:left; padding-right:9px;" width="40" height="40" border="0" alt="" class="CommentImg" />
       
        <label>
            <textarea class="commentMarkDemo"  onblur="if (this.value=='') this.value = 'Write a comment'" onfocus="if (this.value=='Write a comment') this.value = ''" onKeyPress="return SubmitComment(this,event)" wrap="hard" name="commentMark" style=" background-color:#fff; overflow: hidden;" cols="60">Write a comment</textarea>
        </label>
        <br clear="all" />
    </div>

</div>