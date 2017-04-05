<html>
    <head>
       <meta http-equiv="Refresh" content="2; URL=index.php"> 
    </head>
    <body>
<?php
session_start();
$connection=mysql_connect("localhost", "root", "") or die("not able to connect to database");
    mysql_select_db("smackron") or die("could not find db");
$sql="UPDATE user SET 
        online='0'
        WHERE id= $_SESSION[uid]";
    mysql_query($sql);
session_destroy();
header('Location: index.php');
//echo " u have successfully logged out";// .<a href='index.php'>click</a> here to return";
?>
    </body>
</html>