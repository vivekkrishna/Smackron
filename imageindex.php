<?php
session_start();
if($_SESSION['fullname']){
    include 'init.php';
include 'template/header.php';
echo 'Welcome, now start to <a href="create_album.php">create albums</a> and <a href="upload_image.php">Upload images</a>';
//echo '<img src="images/landing.png" alt="Register a free account today" />';

include 'template/footer.php';
}else{
    exit('do login');
}
?>