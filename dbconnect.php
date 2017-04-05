<?php
session_start();
$connection=mysql_connect("localhost", "root", "") or die("not able to connect to database");
    mysql_select_db("smackron") or die("could not find db");
    ?>