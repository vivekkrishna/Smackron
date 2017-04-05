    <?php
session_start();
@require_once 'activityupdate.php';
include('core/init.php');
if($_GET["uid"]==$_SESSION['uid']){
    header('Location: profile.php');
     
}else{
$user_info = fetch_user_info($_GET["uid"]);
//print_r($user_info);
?>
    <?php
    if(!isset($_SESSION['wipit'])){
        session_register('wipit');
    }
    $thisRandNum=  rand(999999999999999,99999999999999999999);
    $_SESSION['wipit']=  base64_encode($thisRandNum);
    ?>
<html>
    <head><title><?php echo $user_info['username'];?>'s profile</title>
    <link rel="stylesheet" type="text/css" href="othersprof.css"/>
    <link rel="stylesheet" type="text/css" href="home.css"/>
    <link rel="stylesheet" type="text/css" href="css/default.css"/>
    <style type="text/css">
        .interactionLinksDiv a {
   border:#B9B9B9 1px solid; padding:5px; color:#060; font-size:11px; background-image:url(images/bluebtn.png); text-decoration:none;
}
.interactionLinksDiv a:hover {
	border:#090 1px solid; padding:5px; color:#060; font-size:11px; background-image:url(images/hoverblue.png);
}
.interactContainers {
	padding:8px;
	/*background-color:#D2F0D3;*/
        background-color: #e7e6d8;
	border:#999 1px solid;
	display:none;
}
#add_friend_loader {
	display:none;
}
#remove_friend_loader {
	display:none;
}

#friendTable td{
	font-size:9px;
}
#friendTable td a{
	color:#03C;
	text-decoration:none;
}
#view_all_friends {
	background-image:url(style/opaqueDark.png);
	width:auto;
	padding:2px;
	position:fixed;
	top:200px;
	display:none;
	z-index:100;
	margin-left:auto;
}
-->

    </style>
    <script src="js/jquery-1.4.2.js" type="text/javascript"></script>
    <script src="othersprof.js" type="text/javascript"></script>
    <script language="javascript" type="text/javascript">
        function showHint(str)
{
    if (str!="") {
			$('#txtHint').fadeIn(200);
		}
                else if(str==""){$('#txtHint').fadeOut(200);}
//alert("Function Called--"+str);
xmlhttp=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET","http://localhost:8082/smackron/topsearch.php?q="+str,true);
xmlhttp.send(null);
}

function stateChanged()
{
//alert("Callback Method Called --"+xmlhttp.readystate);
if (xmlhttp.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
}
// jQuery functionality for toggling member interaction containers
function toggleInteractContainers(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).slideDown(200);
		} else {
			$('#'+x).hide();
		}
		$('.interactContainers').hide();
}
//function for adding frnd two arguements
function addAsFriend(a,b){
    //alert("member with id: "+a+"is requesting frndship from member with id:"+b);
    var url="scripts_for_profile/request_as_friend.php";
    var thisRandNum = "<?php echo $thisRandNum;?>";
    $("#add_friend").text("pleasewait...").show();
	$.post(url,{ request: "requestFriendship", mem1: a, mem2: b, thisWipit: thisRandNum} ,function(data) {
	    $("#add_friend").html(data).show().fadeOut(12000);
    });	
}
// friend removal stuff
function removeAsFriend(a,b) {
    var url="scripts_for_profile/request_as_friend.php";
    var thisRandNum = "<?php echo $thisRandNum;?>";
	$("#remove_friend_loader").show();
	$.post(url,{ request: "removeFriendship", mem1: a, mem2: b, thisWipit: thisRandNum } ,function(data) {
	    $("#remove_friend").html(data).show().fadeOut(12000);
    });	
}
//end friend removal stuff
function toggleViewAllFriends(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).fadeIn(200);
		} else {
			$('#'+x).fadeOut(200);
		}
}
// Start Private Messaging stuff
$('#pmForm').submit(function(){$('input[type=submit]', this).attr('disabled', 'disabled');});
function sendPM () {
      var pmSubject = $("#pmSubject");
	  var pmTextArea = $("#pmTextArea");
	  var sendername = $("#pm_sender_name");
	  var senderid = $("#pm_sender_id");
	  var recName = $("#pm_rec_name");
	  var recID = $("#pm_rec_id");
	  var pm_wipit = $("#pmWipit");
	  var url = "scripts_for_profile/private_msg_parse.php";
      if (pmSubject.val() == "") {
           $("#interactionResults").html('<img src="images/round_error.png" alt="Error" width="31" height="30" /> &nbsp; Please type a subject.').show().fadeOut(6000);
      } else if (pmTextArea.val() == "") {
		   $("#interactionResults").html('<img src="images/round_error.png" alt="Error" width="31" height="30" /> &nbsp; Please type in your message.').show().fadeOut(6000);
      } else {
		   $("#pmFormProcessGif").show();
		   $.post(url,{ subject: pmSubject.val(), message: pmTextArea.val(), senderName: sendername.val(), senderID: senderid.val(), rcpntName: recName.val(), rcpntID: recID.val(), thisWipit: pm_wipit.val() } ,           
                   function(data) {
			   $('#private_message').slideUp("fast");
			   $("#interactionResults").html(data).show().fadeOut(10000);
			   document.pmForm.pmTextArea.value='';
			   document.pmForm.pmSubject.value='';
			   $("#pmFormProcessGif").hide();
           });
	  }
}
// End Private Messaging stuff
</script>
    </head>
    <?php
?>
    <body>
        <div id="zero">
        <div id="one">
            <img src="images/smackronfinal.jpg" width="100" height="50" margin="5px" align="right"/>  
<!--<span class="search">-->
 <!--</span>-->
 <span>
<ul id="sddm" class="current-menu-item">
	<li><a href="home.php">Home</a>
	</li>
	<li><a href="profile.php">Profile</a>
	</li>
	<li><a href="planurtime.php">Timeplan</a>
	</li>
	<li><a href="member.php">makefrnds</a>
	</li>
</ul></span>
 <input type="text" id="searchbar" onkeyup="showHint(this.value)"/>
 <div id="txtHint" class="interactContainers">
        </div>  
        </div>
            <?php
        if($user_info === false){
            echo "this user does not exist";
        }
        else{
        ?>
        <div id="two">
            <div id="twoone">
                
<!--			<li style="height:60;"><a href="pm_inbox"><center>==>Inbox</center></a></li>
			<li style="height:60"><a href="pm_sentbox"><center>==>Sentbox</center></a></li>-->
                
                    <a href="pm_inbox"><div style="height:60;width: 196"><center>PROFILE</center></div></a>
                    <a href="pm_inbox"><div style="height:60;background-color: whitesmoke;width: 196"><center>TIMEPLAN</center></div></a>
               
            </div>
            <?php
            $check_pic = 'profpics/'. $user_info[id] . '/0.jpg';
		    if (file_exists($check_pic)) {
echo '<img  onmouseover=visi() onmouseout=invisi() src="profpics/thumbs/'. $user_info[id] .'/0.jpg" width=196px height=auto/>';				
//$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="' . $check_pic . '" width="54px" border="1"/></a>';
		    } else {
echo '<img  onmouseover=visi() onmouseout=invisi() src="profpics/default/image01.jpg" width=196px height=auto/>';				
//$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="members/0/image01.jpg" width="54px" border="1"/></a> &nbsp;';
		    }?>
            <?php
                    $query=mysql_query("select * from user where id='$user_info[id]'");
    $num_rows=mysql_num_rows($query);
    if($num_rows!=0)
    {
        while ($row = mysql_fetch_assoc($query)) {$friend_array=$row['friend_array'];
        }}
            
            $friendList="";
            if($friend_array!=""){
                // ASSEMBLE FRIEND LIST AND LINKS TO VIEW UP TO 6 ON PROFILE
	$friendArray = explode(",", $friend_array);
	$friendCount = count($friendArray);
    $friendArray6 = array_slice($friendArray, 0, 6);
	
                $friendList .= '<div class="infoHeader">' . $user_info['username'] . '\'s Friends (<a href="#" onclick="return false" onmousedown="javascript:toggleViewAllFriends(\'view_all_friends\');">' . $friendCount . '</a>)</div>';
    $i = 0; // create a varible that will tell us how many items we looped over 
	 $friendList .= '<div class="infoBody"><table id="friendTable" align="center" cellspacing="4"></tr>'; 
    foreach ($friendArray6 as $key => $value) { 
        $i++; // increment $i by one each loop pass 
		$check_pic = 'profpics/' . $value . '/0.jpg';
		    if (file_exists($check_pic)) {
				$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="' . $check_pic . '" width="54px" border="1"/></a>';
		    } else {
				$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="members/0/image01.jpg" width="54px" border="1"/></a> &nbsp;';
		    }
			$sqlName = mysql_query("SELECT fullname FROM user WHERE id='$value' LIMIT 1") or die ("Sorry we had a mysql error!");
		    while ($row = mysql_fetch_array($sqlName)) { $friendUserName = substr($row["fullname"],0,15); $friendFirstName = substr($row["fullname"],0,10);}
			if (!$friendUserName) {$friendUserName = $friendFirstName;} // If username is blank use the firstname... programming changes in v1.32 call for this
			if ($i % 6 == 4){
				$friendList .= '<tr><td><div style="width:auto; height:auto; overflow:hidden;" title="' . $friendUserName . '">
				<a href="othersprof.php?uid=' . $value . '">' . $frnd_pic . '</a>' . $friendUserName . '
				</div></td></tr>';  
			} else {
				$friendList .= '<tr><td><div style="width:auto; height:auto; overflow:hidden;" title="' . $friendUserName . '">
				<a href="othersprof.php?uid=' . $value . '">' . $frnd_pic . '</a>' . $friendUserName . '
				</div></td>'; 
			}
    } 
	 $friendList .= '</tr></table>
	 <div align="right"><a href="#" onclick="return false" onmousedown="javascript:toggleViewAllFriends(\'view_all_friends\');">view all</a></div>
	 </div>';
         // END ASSEMBLE FRIEND LIST... TO VIEW UP TO 6 ON PROFILE
	// ASSEMBLE FRIEND LIST AND LINKS TO VIEW ALL(50 for now until we paginate the array)
	$i = 0;
	$friendArray50 = array_slice($friendArray, 0, 50);
	$friendPopBoxList = '<table id="friendPopBoxTable" width="auto" align="center" cellpadding="6" cellspacing="0">';
	foreach ($friendArray50 as $key => $value) { 
        $i++; // increment $i by one each loop pass 
		$check_pic = 'members/' . $value . '/image01.jpg';
		    if (file_exists($check_pic)) {
				$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="' . $check_pic . '" width="54px" border="1"/></a>';
		    } else {
				$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="members/0/image01.jpg" width="54px" border="1"/></a> &nbsp;';
		    }
			$sqlName = mysql_query("SELECT fullname, country, state, citynearby FROM user WHERE id='$value' LIMIT 1") or die ("Sorry we had a mysql error!");
		    while ($row = mysql_fetch_array($sqlName)) { $funame = $row["fullname"]; $ffname = $row["fullname"]; $fcountry = $row["country"]; $fstate = $row["state"]; $fcity = $row["citynearby"]; }
			if (!$funame) {$funame = $ffname;} // If username is blank use the firstname... programming changes in v1.32 call for this
				if ($i % 2) {
					$friendPopBoxList .= '<tr bgcolor="#F4F4F4"><td width="auto" valign="top">
					<div style="width:auto; height:56px; overflow:hidden;" title="' . $funame . '">' . $frnd_pic . '</div></td>
				     <td width="auto" valign="top"><a href="othersprof.php?uid=' . $value . '">' . $funame . '</a><br /><font size="-2"><em>' . $fcity . '<br />' . $fstate . '<br />' . $fcountry . '</em></font></td>
				    </tr>';  
				} else {
				    $friendPopBoxList .= '<tr bgcolor="#E0E0E0"><td width="auto" valign="top">
					<div style="width:auto; height:56px; overflow:hidden;" title="' . $funame . '">' . $frnd_pic . '</div></td>
				     <td width="auto" valign="top"><a href="othersprof.php?uid=' . $value . '">' . $funame . '</a><br /><font size="-2"><em>' . $fcity . '<br />' . $fstate . '<br />' . $fcountry . '</em></font></td>
				    </tr>';  
				}
    } 
	$friendPopBoxList .= '</table>';
	// END ASSEMBLE FRIEND LIST AND LINKS TO VIEW ALL(50 for now until we paginate the array)
            }
            ?>
           <?php echo $friendList;?>
        </div>
        <div id="three">
            <div id="threeone">
                <?php echo $user_info['username'] ?>
                
        <?php
        // SQL Query the friend array for the logged in viewer of this profile if not the owner
	$sqlArray = mysql_query("SELECT friend_array FROM user WHERE id='" . $_SESSION[uid] ."' LIMIT 1"); 
	while($row=mysql_fetch_array($sqlArray)) { $iFriend_array = $row["friend_array"]; }
	 $iFriend_array = explode(",", $iFriend_array);
	if (in_array($user_info['id'], $iFriend_array)) { 
	    $friendLink = '<a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers(\'remove_friend\');">Remove Friend</a>';
	} else {
	    $friendLink = '<a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers(\'add_friend\');">Add as Friend</a>';	
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$interactionBox = '<div class="interactionLinksDiv">
		   ' . $friendLink . ' 
           <a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers(\'private_message\');">Message</a>
          </div>';
        //$interactionBox = '<div style="display:inline;border:#ccc ipx solid;padding:5px;background-color:#E4E4E4;color:#999;font-size:11px;"><a href="#">Add as Friend</a></div>';
        //$interactionBox = '<div class="interactionLinksDiv">
	//<a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers(\'add_friend\');">Add as Friend</a>
	//<a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers(\'private_message\');">Message</a>
	//</div>';
        echo $interactionBox;?></div>
            <div><div class="interactContainers" id="add_friend">
                
                <div align="right"><a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers('add_friend');">cancel</a> </div>
                Add <?php echo $user_info['username']; ?> as a friend? &nbsp;
                <a href="#" onclick="return false" onmousedown="javascript:addAsFriend(<?php echo $_SESSION['uid']; ?>, <?php echo $user_info['id']; ?>);">Yes</a>
                <span id="add_friend_loader"><img src="images/loading.gif" width="28" height="10" alt="Loading" /></span>
          </div>
            <!-- START DIV that serves as an interaction status and results container that only appears when we instruct it to -->
          <div id="interactionResults" style="font-size:15px; padding:10px;"></div>
          <!-- END DIV that serves as an interaction status and results container that only appears when we instruct it to -->
            <!--private messaging div start-->
          <div class="interactContainers" id="private_message">
          <form action="javascript:sendPM();" name="pmForm" id="pmForm" method="post">
<font size="+1">Sending Private Message to <strong><em><?php echo "$user_info[username]"; ?></em></strong></font><br /><br />
Subject:
<input name="pmSubject" id="pmSubject" type="text" maxlength="64" style="width:98%;" />
Message:
<textarea name="pmTextArea" id="pmTextArea" rows="8" style="width:98%;"></textarea>
  <input name="pm_sender_id" id="pm_sender_id" type="hidden" value="<?php echo $_SESSION['uid']; ?>" />
  <input name="pm_sender_name" id="pm_sender_name" type="hidden" value="<?php echo $_SESSION['fullname']; ?>" />
  <input name="pm_rec_id" id="pm_rec_id" type="hidden" value="<?php echo $user_info['id']; ?>" />
  <input name="pm_rec_name" id="pm_rec_name" type="hidden" value="<?php echo $user_info['username']; ?>" />
  <input name="pmWipit" id="pmWipit" type="hidden" value="<?php echo $thisRandNum; ?>" />
  <span id="PMStatus" style="color:#F00;"></span>
  <br /><input name="pmSubmit" type="submit" value="Submit" /> or <a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers('private_message');">Close</a>
<span id="pmFormProcessGif" style="display:none;"><img src="images/loading.gif" width="28" height="10" alt="Loading" /></span></form>
          </div>
            <!--private messaging div end-->
        <div class="interactContainers" id="remove_friend">
                <div align="right"><a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers('remove_friend');">cancel</a> </div>
                Remove <?php echo "$user_info[username]"; ?> from your friend list? &nbsp;
                <a href="#" onclick="return false" onmousedown="javascript:removeAsFriend(<?php echo $_SESSION['uid']; ?>, <?php echo $user_info['id']; ?>);">Yes</a>
                <span id="remove_friend_loader"><img src="images/loading.gif" width="28" height="10" alt="Loading" /></span>
          </div>
<!--            <div><li>username:<?php //echo $user_info['username'];?></li>
    <li>gender:<?php //echo $user_info['gender']?></li>
    <li>email:<?php //echo $user_info['email'];?></li>
    <li>location:<?php //echo $user_info['location'];?></li>
    <li>nickname:<?php //echo $user_info['nickname'];?></li>
     </div>-->
            <?php include("indexotherprofwall.php"); ?>
            </div></div>
        <div id="four">
            4<div id="view_all_friends" class="interactContainers">
              <div align="right" style="padding:6px; background-color:#FFF; border-bottom:#666 1px solid;">
                       <div style="display:inline; font-size:14px; font-weight:bold; margin-right:150px;">All Friends</div> 
                       <a href="#" onclick="return false" onmousedown="javascript:toggleViewAllFriends('view_all_friends');">close </a>
              </div>
              <div style="background-color:#FFF; height:auto; width: auto; overflow:auto;">
                   <?php echo $friendPopBoxList; ?>
              </div>
              <div style="padding:6px; background-color:#000; border-top:#666 1px solid; font-size:10px; color: #0F0;">
                       Temporary programming shows 50 maximum. Navigating through the full list is coming soon.
              </div>
         </div>
        </div>
        </div>
        <?php
        }}
    ?>
    </body>
</html>
    

                
            