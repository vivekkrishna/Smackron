<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
    <p>Choose a file:<br/><input type="file" name="image"/></p>
    <p><input type="submit" value="Upload"/></p>
</form><?php
session_start();
 $connection=mysql_connect("localhost", "root", "") or die("not able to connect to database");
    mysql_select_db("smackron") or die("could not find db");
function create_thumb($directory, $image, $destination) {
  $image_file = $image;
  $image = $directory.$image;
  if (file_exists($image)) {
    $source_size = getimagesize($image);
    if ($source_size !== false) {
      $thumb_width = 100;
      $thumb_height = 100;
      switch($source_size['mime']) {
        case 'image/jpeg':
             $source = imagecreatefromjpeg($image);
        break;
        case 'image/png':
             $source = imagecreatefrompng($image);
        break;
        case 'image/gif':
             $source = imagecreatefromgif($image);
        break;
      }
      $source_aspect = round(($source_size[0] / $source_size[1]), 1);
      $thumb_aspect = round(($thumb_width / $thumb_height), 1);
      if ($source_aspect < $thumb_aspect) {
        $new_size = array($thumb_width, ($thumb_width / $source_size[0]) * $source_size[1]);
        $source_pos = array(0, ($new_size[1] - $thumb_height) / 2);
      } else if ($source_aspect > $thumb_aspect) {
        $new_size = array(($thumb_width / $source_size[1]) * $source_size[0], $thumb_height);
        $source_pos = array(($new_size[0] - $thumb_width) / 2, 0);
      } else {
        $new_size = array($thumb_width, $thumb_height);
        $source_pos = array(0, 0);
      }
      if ($new_size[0] < 1) $new_size[0] = 1;
      if ($new_size[1] < 1) $new_size[1] = 1;
      $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
      imagecopyresampled($thumb, $source, 0, 0, $source_pos[0], $source_pos[1], $new_size[0], $new_size[1], $source_size[0], $source_size[1]);
      switch($source_size['mime']) {
        case 'image/jpeg':
             imagejpeg($thumb, $destination.$image_file);
        break;
        case 'image/png':
              imagepng($thumb, $destination.$image_file);
        break;
        case 'image/gif':
             imagegif($thumb, $destination.$image_file);
        break;
      }
    }
  }
}
        function upload_image($image_temp, $image_ext){
    //$album_id = (int)$album_id;
    mysql_query("UPDATE INTO `profpics` exten='.$image_ext.' WHERE user_id='.$_SESSION[uid].'");
    //for($i=0; $i<200; $i++){
    //$check_pic = 'uploads/' . $album_id . '/'.$i.'.jpg';
		    //if (!file_exists($check_pic)) { $image_id = $i; break;}}
    $image_id = mysql_insert_id();
    $image_file = "0".'.'.$image_ext;
    mkdir('profpics/'.$_SESSION['uid']);
     mkdir('profpics/thumbs/'.$_SESSION['uid']);
    move_uploaded_file($image_temp, 'profpics/'.$_SESSION['uid'].'/'.$image_file);
    
    create_thumb('profpics/'.$_SESSION['uid'].'/', $image_file, 'profpics/thumbs/'.$_SESSION['uid'].'/');
}
function get_images($album_id){
    $album_id = (int)$album_id;
    $images = array();
    $image_query = mysql_query("SELECT `image_id`, `album_id`, `timestamp`, `ext` FROM `images` WHERE `album_id`=$album_id AND `user_id`=".$_SESSION['uid']);
    while ($images_row = mysql_fetch_assoc($image_query)){
        $images[] = array(
          'id' => $images_row['image_id'],
          'album' => $images_row['album_id'],
            'timestamp' => $images_row['timestamp'],
            'ext' => $images_row['ext']
        );
    }
    return $images;
}
function image_check($image_id){
    $image_id = (int)$image_id;
    $query = mysql_query("SELECT COUNT(`image_id`) FROM `images` WHERE `image_id`=$image_id AND `user_id`=".$_SESSION['uid']);
    return (mysql_result($query, 0) == 0) ? false : true;
}
function delete_image($image_id){
    $image_id = (int)$image_id;
    
    $image_query = mysql_query("SELECT `album_id`, `ext` FROM `images` WHERE `image_id`=$image_id AND `user_id`=".$_SESSION['uid']);
    $image_result = mysql_fetch_assoc($image_query);
    
    $album_id = $image_result['album_id'];
    $image_ext = $image_result['ext'];
    
    unlink('uploads/'.$album_id.'/'.$image_id.'.'. $image_ext);
    unlink('uploads/thumbs/'.$album_id.'/'.$image_id.'.'. $image_ext);
    mysql_query("DELETE FROM `images` WHERE `image_id`=$image_id AND `user_id`=".$_SESSION['uid']);
}
?>
        <?php
if(isset($_FILES['image'])){
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    $image_ext = strtolower(end(explode('.', $image_name)));
    //$album_id = $_POST['album_id'];
    $errors = array();
    if(empty($image_name)){
        $errors[] = 'something is missing';
    }else{
        if(in_array($image_ext, $allowed_ext) === false){
            $errors[] = 'File type not allowed';
        }
        if($image_size > 2097152){
            $errors[] =  'maximum file size is 2 MB';
        }
    }
    if(!empty($errors)){
        foreach ($errors as $error) {
            echo $error.'<br/>';
        }
    }else{
        //upload the image
        upload_image($image_temp, $image_ext);
        header('Location: profile.php');
        exit();
    }
} 
?>
        
    </body>
</html>