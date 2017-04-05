<?php
include("dbconnect.php");
session_start();
if(!$_SESSION['fullname']){
    header('Location: index.php');
    //exit("do login");
}require_once 'activityupdate.php';
// Include the class files for auto making links out of full URLs and for Time Ago date formatting
include_once("wi_class_files/autoMakeLinks.php");
include_once ("wi_class_files/agoTimeFormat.php");
// Create the two objects before we can use them below in this script
$activeLinkObject = new autoActiveLink;
$myObject = new convertToAgo;
?>
<html>
    <head>
<!--        <script type="text/javascript">
//load check.php in the <span id="online"></span> and refresh every 1 second
$(document).ready(function(){
   $("#main_container").load('autoonlinerefres.php');
   setInterval(function(){
  $("#main_container").load('autoonlinerefres.php');
   },1000);//
});
</script>-->
<!--        <link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->
<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->
<script type="text/javascript" src="js1/jquery.js"></script>
<!--        <script src="js/mouseoverpopup.js" type="text/javascript"></script>-->
        <script src="js/jQuery.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/default.css">
        <link rel="stylesheet" type="text/css" href="home.css"/>
<!--        <link rel="stylesheet" type="text/css" href="css/main.css"/>-->

        <style type="text/css">

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

<script type="text/javascript" src="home.js">
	</script>
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
xmlhttp.open("GET","topsearch.php?q="+str,true);
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
function toggleInteractContainers(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).slideDown(200);
		} else {
			$('#'+x).hide();
		}
		$('.interactContainers').hide();
}
function toggleViewAllFriends(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).fadeIn(200);
		} else {
			$('#'+x).fadeOut(200);
		}
}

</script>
    </head>
    <body class="home">
        
        <div id="zero">
        <div id="one">
            <a href="logout.php"><img src="images/smackronfinal.jpg" width="100" height="50" margin="5px" align="right"/>  </a>
<!--<span class="search">-->
 <!--</span>-->
 <span>
<ul id="sddm" class="current-menu-item">
	<li><a href="home.php" class="home">Home</a>
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
        <div id="two">
            <div class="sidemenus">
                <a href="menu1.html" class="menuLink">Messages</a>
		<ul class="menu" id="menu1">
			<li>==><a href="pm_inbox">Inbox</a></li>
			<li>==><a href="pm_sentbox">Sentbox</a></li>
		</ul>
	</div>
	<div class="sidemenus">
		<a href="menu2.html" class="menuLink">Ur Albums</a>
		<ul class="menu" id="menu2">
			<li>==><a href="albums">ur albums</a></li>
		</ul>
	</div>
<!--	<div class="sidemenus">
		<a href="menu3.html" class="menuLink">Histories</a>
		<ul class="menu" id="menu3">
			<li><a href="pg8.html">Henry IV, Part 1</a></li>
			<li><a href="pg9.html">Henry IV, Part 2</a></li>
		</ul>
	</div>-->
            <?php
	//include("homenav.php");
?>
<div>
    <?php
    
    $rs=  mysql_db_query("smackron","select * from user where select1='$_SESSION[select1]' && color='$_SESSION[color]' && believegod='$_SESSION[believegod]' && select2='$_SESSION[select2]' && wannabe='$_SESSION[wannabe]' && color='$_SESSION[color]' && likemost='$_SESSION[likemost]' && ifrich='$_SESSION[ifrich]' && lifewannabe='$_SESSION[lifewannabe]' && urdream='$_SESSION[urdream]' && urhobby='$_SESSION[urhobby]' order by id desc Limit 30");
    @mysql_data_seek($rs,4);$j=0;
    
while($row=  @mysql_fetch_row($rs))
{
    
    //echo"<tr>";
    //echo"<td>".$row[0]."</td>";
    $b[]=$row[0];
     $a[]=$row[1];
     
     $d[]=$row[5];
     $e[]=$row[6];
//     $f[]=$row[9];
//     $g[]=$row[10];
//     $m[]=$row[2];
     //$h[]=$row[25];
    //echo"<td>".$row[2]."</td>";
    //echo"</tr>";
     $j=$j+1;
}
$hint="";
    for($i=0; $i<count($a); $i++)
    {
    if (1)
      {
        echo "<table><tr>";
      if ($hint=="")
        {
     $hint="<table><tr><td colspan=2 align=center>"."<a href=othersprof.php?uid=$b[$i]>$a[$i]</a></td></tr><tr><td width=75px><img src=profpics/$id[$i]/0.jpg width=50px height=auto></td><td width=120px align=center>".$d[$i]."<br/>".$e[$i]."</td></tr></table>";
        }
      else
        {
        $hint=$hint." <br/> <table><tr><td colspan=2  align=center>"."<a href=othersprof.php?uid=$b[$i]>$a[$i]</a></td></tr><tr><td width=75px><img src=profpics/$id[$i]/0.jpg width=50px height=auto></td><td width=120px align=center>".$d[$i]."<br/>".$e[$i]."</td></tr></table>";
        }
        echo "</tr>";
      }
    }echo "</table>";
    if ($hint == "")
  {
  $response="no matches found";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
@mysql_free_result($rs);
    ?>
    
</div>
        </div>
        <div id="three">
            
            
             <?php
            if($_GET['page']=="inbox"){
    include("pm_inbox.php");
}
else if($_GET['page']=="sentbox"){
    include("pm_sentbox.php");
}
else if($_GET['page']=="imageindex"){
    include("imageindex.php");
}
?>
            
        </div>
            
        <div id="four">
            
            <a><div></div></a>
        </div>
        </div>
<!--        <div id="main_container"></div>-->
        <script src="js/jQuery.js" type="text/javascript"></script>
        <script type="text/javascript" src="home.js"/>
        
        <script type="text/javascript" src="js1/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
    </body>
</html>

