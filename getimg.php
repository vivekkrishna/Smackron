<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("smackron") or die("unable to connect to database");
        $id=  addslashes($_REQUEST['id']);
        $image=mysql_query("SELECT * FROM user WHERE id=$id");
        $image=  mysql_fetch_assoc($image);
        $image= $image['img'];
        header("Content-type: image/jpeg");
        echo $image;
?>