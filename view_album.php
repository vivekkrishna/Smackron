<html>
    <head>
        <script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
    </head>
</html>
<?php
session_start();
if($_SESSION['fullname']){
include 'init.php';
if(!isset($_GET['album_id']) || empty($_GET['album_id']) || album_check($_GET['album_id']) === false){
    header('Location: albums.php');
    exit();
}

include 'template/header.php';
$album_id = $_GET['album_id'];
$album_data = album_data($album_id,'name','description');

echo '<h3>'.$album_data['name'].'</h3><p>'.$album_data['description'].'</p>';


$images = get_images($album_id);
if(empty($images)){
    echo 'There are no images in this album';
}else{
    foreach ($images as $image) {
        echo '<a href="uploads/'.$image['album'].'/'.$image['id'].'.'.$image['ext'].'" rel="lightbox['.$image['album'].']"><img src="uploads/thumbs/'.$image['album'].'/'. $image['id'].'.'.$image['ext'].'" title="Uploaded '.date('D M Y / h:i', $image['timestamp']).'"/></a>[<a href="delete_image.php?image_id='.$image['id'].'">X</a>] ';
    }
}

include 'template/footer.php';
}else{
    header('Location: index.php');
    exit();
}
?>