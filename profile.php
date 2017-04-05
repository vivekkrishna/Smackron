<?php
session_start();
if(!$_SESSION['fullname']){
    header('Location: index.php');
}include("dbconnect.php");
require_once 'activityupdate.php';
if(!isset($_SESSION['wipit'])){
        session_register('wipit');
    }
    $thisRandNum=  rand(999999999999999,99999999999999999999);
    $_SESSION['wipit']=  base64_encode($thisRandNum);
// Include the class files for auto making links out of full URLs and for Time Ago date formatting
include_once("wi_class_files/autoMakeLinks.php");
include_once ("wi_class_files/agoTimeFormat.php");
// Create the two objects before we can use them below in this script
$activeLinkObject = new autoActiveLink;
$myObject = new convertToAgo;
// ------- POST NEW BLAB TO DATABASE ---------
$blab_outout_msg = "";
if (isset($_POST['blab_field']) && $_POST['blab_field'] != "" && $_POST['blab_field'] != " "){
                // $wipi=$_POST['blabWipit'];
//	 	 $blab_field = $_POST['blab_field'];
//	 	 $blab_field = stripslashes($blab_field);
//	 	 $blab_field = strip_tags($blab_field);
//	 	 $blab_field = mysql_real_escape_string($blab_field);
//	 	 $blab_field = eregi_replace("'", "&#39;", $blab_field);
//	 	 $sql = mysql_query("INSERT INTO blabbing (mem_id, the_blab, blab_date) VALUES('$_SESSION[uid]','$blab_field', now())") or die (mysql_error());
//	 	 $blab_outout_msg = "your blab has been posted";
	 	 
}
// ------- END POST NEW BLAB TO DATABASE ---------
?>
<?php 
//if(isset($_SESSION['uid'])){
//$the_blab_form = ' ' . $blab_outout_msg . '
//          
//          <form action="profile.php" method="post" enctype="multipart/form-data" name="blab_from">
//          <textarea name="blab_field" rows="3" style="width:99%;"></textarea>
//	//<input name="blabWipit" type="hidden" value="' . $thisRandNum . '" />	  
//          <strong>Blab away ' . $_SESSION['fullname'] . '</strong> (220 char max) <input name="submit" type="submit" value="submit" />
//          </form>';}
?>
<?php
//$sql_blabs = mysql_query("SELECT id, mem_id, the_blab, blab_date FROM blabbing WHERE mem_id='$_SESSION[uid]' ORDER BY blab_date DESC LIMIT 30");
//
//$blabberDisplayList = ""; // Initialize the variable here
//
//while($row = mysql_fetch_array($sql_blabs)){
//	
//	$blabid = $row["id"];
//	$uid = $row["mem_id"];
//	$the_blab = $row["the_blab"];
//	$notokinarray = array("fag", "gay", "shit", "fuck", "stupid", "idiot", "asshole", "cunt", "douche");
//    $okinarray   = array("sorcerer", "grey", "shug", "farg", "smart", "awesome guy", "asshole", "cake", "dude");
//	$the_blab = str_replace($notokinarray, $okinarray, $the_blab);
//	$the_blab = ($activeLinkObject -> makeActiveLink($the_blab));
//	$blab_date = $row["blab_date"];
//	$convertedTime = ($myObject -> convert_datetime($blab_date));
//    $whenBlab = ($myObject -> makeAgo($convertedTime));
//    $blabberDisplayList .= '
//      			<table width=694px align="center" cellpadding="4" bgcolor="#FFFFFF">
//        <tr>
//          
//          <td  class="borbot" width=694px bgcolor="#FFFFFF" style="line-height:1.5em;" valign="top"><span class="textsize20" color="black">' . $whenBlab . '<br />
//          ' . $the_blab . '</td>
//        </tr><br/>
//      </table>';
//    }
?>
<html>
    <head>
        <script src="js/jQuery.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/default.css">
        <link rel="stylesheet" type="text/css" href="home.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
        <style type="text/css">
.infoBody{
                height: auto;
            }
        .interactionLinksDiv a {
   border:#B9B9B9 1px solid; padding:5px; color:#060; font-size:11px; background-image:url(images/bluebtn.png); text-decoration:none;
}
.interactionLinksDiv a:hover {
	border:#090 1px solid; padding:5px; color:#060; font-size:11px; background-image:url(images/hoverblue.png);
}
.interactContainers {
	padding:8px;
	background-color:#D2F0D3;
	border:#999 1px solid;
	display:none;
}
.righ{
    float: right;
}
</style>

<script type="text/javascript">
    var xmlhttp;

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
function visi(){
            document.getElementById("link").style.visibility="visible";
        }
        function invisi(){
            document.getElementById("link").style.visibility="hidden";
        }
function toggleInteractContainers(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).slideDown(200);
		} else {
			$('#'+x).hide();
		}
		$('.interactContainers').hide();
}
var thisRandNum = "<?php echo $thisRandNum; ?>";
var friendRequestURL = "scripts_for_profile/request_as_friend.php";
function acceptFriendRequest (x) {
	$.post(friendRequestURL,{ request: "acceptFriend", reqID: x, thisWipit: thisRandNum } ,function(data) {
            $("#req"+x).html(data).show();
    });
}
function denyFriendRequest (x) {
	$.post(friendRequestURL,{ request: "denyFriend", reqID: x, thisWipit: thisRandNum } ,function(data) {
           $("#req"+x).html(data).show();
    });
}
// End Friend adding and accepting stuff
// Friend removal stuff
function removeAsFriend(a,b) {
	$("#remove_friend_loader").show();
	$.post(friendRequestURL,{ request: "removeFriendship", mem1: a, mem2: b, thisWipit: thisRandNum } ,function(data) {
	    $("#remove_friend").html(data).show().fadeOut(12000);
    });	
}
// End Friend removal stuff
function toggleViewAllFriends(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).fadeIn(200);
		} else {
			$('#'+x).fadeOut(200);
		}
}

</script>
<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
    </head>
    <body class="profile"><div id="zero">
        <div id="one">
            <a href="logout.php"><img src="images/smackronfinal.jpg" width="100" height="50" margin="5px" align="right"/></a>  
<!--<span class="search">-->
 <!--</span>-->
 <span>
<ul id="sddm" class="current-menu-item">
	<li><a href="home.php">Home</a>
	</li>
	<li><a href="profile.php" class="profile">Profile</a>
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
        <div id="two">
         <?php
//function get_profpic(){
//    $images = array();
//    $image_query = mysql_query("SELECT `image_id`, `exten` FROM `profpics` WHERE `user_id`=".$_SESSION['uid']);
//    while ($images_row = mysql_fetch_assoc($image_query)){
//        $images[] = array(
//          'id' => $images_row['image_id'],
//            'exten' => $images_row['exten']
//        );
//    }
//    return $images;
//}
//$images = get_profpic();
         $query=mysql_query("select * from profpics where user_id='$_SESSION[uid]'");
    $num_rows=mysql_num_rows($query);
    if($num_rows!=0)
    {
        while ($row = mysql_fetch_assoc($query)) {
        $image_id=$row['image_id'];
            $exten=$row['exten'];
            }}
$check_pic = 'profpics/'. $_SESSION[uid] . '/0.'.$exten;
		    if (file_exists($check_pic)) {
echo '<img  onmouseover=visi() onmouseout=invisi() src="profpics/thumbs/'.$_SESSION[uid].'/0.'.$exten.'" width=196px height=auto/>';				
//$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="' . $check_pic . '" width="54px" border="1"/></a>';
		    } else {
echo '<img  onmouseover=visi() onmouseout=invisi() src="profpics/default/image01.jpg" width=196px height=auto/>';				
//$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="members/0/image01.jpg" width="54px" border="1"/></a> &nbsp;';
		    }
        
    //}
//}
    
                    //echo "<img  onmouseover=visi() onmouseout=invisi() src=getimg1.php?mail=$gmail width=192px height=auto>";

?>
        <div id="link" onmouseover=visi() onmouseout="invisi()" style="visibility: hidden"><a href="imgupload.php">change pic</a></div><br/>
        <?php
                    $query=mysql_query("select * from user where id='$_SESSION[uid]'");
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
    $friendArray6 = array_slice($friendArray, 0, 15);
	
                $friendList .= '<div class="infoHeader">' . $_SESSION['fullname'] . '\'s Friends (<a href="#" onclick="return false" onmousedown="javascript:toggleViewAllFriends(\'view_all_friends\');">' . $friendCount . '</a>)</div>';
    $i = 0; // create a varible that will tell us how many items we looped over 
	 $friendList .= '<div class="infoBody"><table id="friendTable" align="center" cellspacing="4"></tr>'; 
    foreach ($friendArray6 as $key => $value) { 
        $i++; // increment $i by one each loop pass 
		$check_pic = 'profpics/' . $value . '/0.jpg';
		    if (file_exists($check_pic)) {
				$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="' . $check_pic . '" width="54px" border="1"/></a>';
		    } else {
				$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="profpics/default/image01.jpg" width="54px" border="1"/></a> &nbsp;';
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
	$friendPopBoxList = '<table id="friendPopBoxTable" width="100%" align="center" cellpadding="6" cellspacing="0">';
	foreach ($friendArray50 as $key => $value) { 
        $i++; // increment $i by one each loop pass 
		$check_pic = 'profpics/' . $value . '/0.jpg';
		    if (file_exists($check_pic)) {
				$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="' . $check_pic . '" width="54px" border="1"/></a>';
		    } else {
				$frnd_pic = '<a href="othersprof.php?uid=' . $value . '"><img src="profpics/default/image01.jpg" width="54px" border="1"/></a> &nbsp;';
		    }
			$sqlName = mysql_query("SELECT fullname, country, state, citynearby FROM user WHERE id='$value' LIMIT 1") or die ("Sorry we had a mysql error!");
		    while ($row = mysql_fetch_array($sqlName)) { $funame = $row["fullname"]; $ffname = $row["fullname"]; $fcountry = $row["country"]; $fstate = $row["state"]; $fcity = $row["citynearby"]; }
			if (!$funame) {$funame = $ffname;} // If username is blank use the firstname... programming changes in v1.32 call for this
				if ($i % 2) {
					$friendPopBoxList .= '<tr bgcolor="#F4F4F4"><td width="14%" valign="top">
					<div style="width:56px; height:56px; overflow:hidden;" title="' . $funame . '">' . $frnd_pic . '</div></td>
				     <td width="86%" valign="top"><a href="othersprof.php?uid=' . $value . '">' . $funame . '</a><br /><font size="-2"><em>' . $fcity . '<br />' . $fstate . '<br />' . $fcountry . '</em></font></td>
				    </tr>';  
				} else {
				    $friendPopBoxList .= '<tr bgcolor="#E0E0E0"><td width="14%" valign="top">
					<div style="width:56px; height:56px; overflow:hidden;" title="' . $funame . '">' . $frnd_pic . '</div></td>
				     <td width="86%" valign="top"><a href="othersprof.php?uid=' . $value . '">' . $funame . '</a><br /><font size="-2"><em>' . $fcity . '<br />' . $fstate . '<br />' . $fcountry . '</em></font></td>
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
            
<!--            <h2 style="color:#999;font-family: verdana;font-style: bold"><?php //echo $_SESSION['fullname']; ?></h2>-->
            <?php include("editindex.php"); ?>
            <?php           
            $interactionBox = '<br /><div class="interactionLinksDiv">
           <a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers(\'friend_requests\');">FRIEND REQUESTS</a>
          </div><br />';
                  echo $interactionBox;
                  ?>
            <div class="interactContainers" id="friend_requests"style="background-color: #FFF;height: auto;overflow: auto;width: auto">
            <h1>THE FOLLOWING ARE REQUESTING YOU AS FRIENDS</h1>
            <?php
            $id=$_SESSION['uid'];
            
            $sql = "SELECT * FROM friends_requests WHERE mem2='$id' ORDER BY id ASC LIMIT 50";
	$query = mysql_query($sql) or die ("Sorry we had a mysql error!");
	$num_rows = mysql_num_rows($query); 
	if ($num_rows < 1) {
		echo 'You have no Friend Requests at this time.';
	} else {
        while ($row = mysql_fetch_array($query)) { 
		    $requestID = $row["id"];
		    $mem1 = $row["mem1"];
	        $sqlName = mysql_query("SELECT fullname FROM user WHERE id='$mem1' LIMIT 1") or die ("Sorry we had a mysql error!");
		    while ($row = mysql_fetch_array($sqlName)) { $requesterUserName = $row["fullname"]; }
		    ///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
		    $check_pic = 'members/' . $mem1 . '/image01.jpg';
		    if (file_exists($check_pic)) {
				$lil_pic = '<a href="othersprof.php?id=' . $mem1 . '"><img src="' . $check_pic . '" width="50px" border="0"/></a>';
		    } else {
				$lil_pic = '<a href="othersprof.php?id=' . $mem1 . '"><img src="members/0/image01.jpg" width="50px" border="0"/></a>';
		    }
		    echo	'<hr />
<table width="100%" cellpadding="5"><tr><td width="17%" align="left"><div style="overflow:hidden; height:auto;"> ' . $lil_pic . '</div></td>
                        <td width="83%"><a href="profile.php?id=' . $mem1 . '">' . $requesterUserName . '</a> wants to be your Friend!<br /><br />
					    <span id="req' . $requestID . '">
					    <a href="#" onclick="return false" onmousedown="javascript:acceptFriendRequest(' . $requestID . ');" >Accept</a>
					    &nbsp; &nbsp; OR &nbsp; &nbsp;
					    <a href="#" onclick="return false" onmousedown="javascript:denyFriendRequest(' . $requestID . ');" >Deny</a>
					    </span></td>
                        </tr>
                       </table>';
        }	 
	}
            ?>
        </div>
            <div style="width:auto; height:auto;overflow: auto; overflow-x:hidden;" >
                
            </div>
            <?php include("indexprofwall.php"); ?>
<!--            <div style="width:auto; height:auto;overflow: auto; overflow-x:hidden;" >
             <?php //echo $the_blab_form; ?>
          
            <div>
              <?php //print "$blabberDisplayList"; ?>
             
            </div>
        </div>-->
        </div>
        <div id="four">
            <div id="fourone" style="padding: 10px;">
                <?php 

	$resultdata=  get_data();
	while($rows = mysql_fetch_array($resultdata))
	{	
            echo '<table><tr><td class="edit line '.$rows["id"].'">'.$rows["line"].'</td></tr><table>';
          
	}?>
            </div>
        </div>
        </div>
        
    </body>
</html>

