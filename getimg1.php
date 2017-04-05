<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("smackron") or die("unable to connect to database");
        $mail1=  addslashes($_REQUEST['mail']);
        $image=mysql_query("SELECT * FROM user WHERE email='$mail1'");
        $image=  mysql_fetch_assoc($image);
        $image= $image['img'];
        header("Content-type: image/jpeg");
        echo $image;
?>