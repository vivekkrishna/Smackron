<?php
session_start();
if($_SESSION['fullname']){
include 'init.php';
include 'template/header.php';
?>

<?php
//print_r(get_albums());
$albums=  get_albums();
if(empty($albums)){
    echo '<p>you dont have any albums</p>';
}else{
    foreach ($albums as $album){
        echo '<p><a href="view_album.php?album_id='.$album['id'].'">'.$album['name'].'</a>('. $album['count'].' images)<br/>
     '.$album['description'].'...<br/>
         <a href="edit_album.php?album_id='.$album['id'].'">Edit</a>/<a href="delete_album.php?album_id='.$album['id'].'">Delete</a>
</p>';
    } 
}
include 'template/footer.php';
}else{
    header('Location: index.php');
    exit();
}
?>