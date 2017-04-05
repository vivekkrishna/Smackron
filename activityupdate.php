<?php
session_start();
$connection=mysql_connect("localhost", "root", "") or die("not able to connect to database");
    mysql_select_db("smackron") or die("could not find db");
    if(!$_SESSION['fullname']){
    header('Location: index.php');
    //exit("do login");
}
$time=  time();
$id=$_SESSION['uid'];
mysql_query("UPDATE user SET lastactivity='$time' WHERE id='$id'");
?>