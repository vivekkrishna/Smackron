<?php
session_start();
if($_SESSION['fullname']){
include 'init.php';
include 'template/header.php';
if(image_check($_GET['image_id']) === false){
    header('Location: albums.php');
    exit();
}

if(isset($_GET['image_id']) || empty($_GET['image_id'])){
    delete_image($_GET['image_id']);
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit();
}
?>

<?php
include 'template/footer.php';
}else{
    header('Location: index.php');
    exit();
}
?>