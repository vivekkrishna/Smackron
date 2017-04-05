<?php

session_start(); // Must start session first thing 

if (!isset($_SESSION['uid'])) { 
print 'you are not logged in';
exit(); 
} 

//include_once "mysql.php";
@mysql_connect("localhost","root","") or die ("could not connect to mysql");
@mysql_select_db("smackron") or die ("no database");
if (isset($_SESSION['uid'])) { 
$id = $_SESSION['uid'];
$mid = $_GET['id'];
$time=time();
 }

$sql = mysql_query("SELECT * FROM user WHERE id='$mid'"); 
while($row = mysql_fetch_array($sql)){
$id = $row["id"];
$fullname = $row["fullname"];
$lastactivity = $row["lastactivity"];

if(time() > $lastactivity+10/*10 is the number of seconds user stay online without doing activity on the page you can always change it */){$onlineStats = "away";}//if the last time you did something on your page + 10 seconds is less than the current time. your onlinestats will equal away or you can change to offline
else if(time() < $lastactivity+10){$onlineStats = "online";}//if the last time you did something on your page + 10 seconds is greater than the current time. your onlinestats will equal online
}
?>
<?php print"$onlineStats";?>