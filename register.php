<html>
    <body>
<?php
$fullname=$_POST[fullname];

$email=$_POST[email];
$password=$_POST[password];
$gender=$_POST[gender];
$country=$_POST[country];
$state=$_POST[state];
$city=$_POST[nearbycity];
$date=$_POST[day]."-".$_POST[month]."-".$_POST[year];
$height=$_POST[height];
$weight=$_POST[weight];
$occupation=$_POST[occupation];
$ms=$_POST[maritalstatus];
$color=$_POST[color];
$taste=$_POST[taste];
$god=$_POST[god];
$any=$_POST[any];
$wanna=$_POST[wanna];
$most=$_POST[most];
$rich=$_POST[rich];
$want=$_POST[want];
$dream=$_POST[dream];
$hobby=$_POST[hobby];
//$schooling=$_POST[schooling];
//$intermediate=$_POST[intermediate];
//$graduation=$_POST[graduation];
//$languages=$_POST[languagesknown];
$timeplans="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0";
$timeplanm="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0";
$timeplant="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0";
$timeplanw="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0";
$timeplanth="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0";
$timeplanf="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0";
$timeplansa="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0";
$conn=  mysql_connect("localhost", "root", "") or exit("unable to connect to database");
mysql_select_db("smackron");
$res=  mysql_query("insert into user(fullname,email,password,gender,country,state,citynearby,dateofbirth,height,weight,occupation,maritalstatus,color,select1,believegod,select2,wannabe,likemost,ifrich,lifewannabe,urdream,urhobby,timeplans,timeplanm,timeplant,timeplanw,timeplanth,timeplanf,timeplansa) values('$fullname','$email','$password','$gender','$country','$state','$city','$date','$height','$weight','$occupation','$ms','$color','$taste','$god','$any','$wanna','$most','$rich','$want','$dream','$hobby','$timeplans','$timeplanm','$timeplant','$timeplanw','$timeplanth','$timeplanf','$timeplansa')");
if($res)
{
    echo"u have successfully registered".mysql_affected_rows();
}
else{
    echo mysql_error();
}
mysql_close($conn);
?>
    </body>
</html>