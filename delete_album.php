<?php
session_start();
if($_SESSION['fullname']){
include 'init.php';

if(album_check($_GET['album_id']) === false){
    header('Location: albums.php');
    exit();
}

if(isset($_GET['album_id'])){
    $album_id = $_GET['album_id']; 
    delete_album($album_id);
    header('Location: albums.php');
    exit();
}

include 'template/header.php';
?>

<?php
include 'template/footer.php';
}else{
    header('Location: index.php');
    exit();
}
?>