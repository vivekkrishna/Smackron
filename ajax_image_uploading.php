<?php

include('newCon.php');

$path = "media/";

$valid_formats_img = array("jpg", "jpeg", "gif");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['current_image']['name'];
$size = $_FILES['current_image']['size'];

if(strlen($name))
{
list($txt, $ext) = explode(".", $name);

if(in_array($ext, $valid_formats_img))
{
if($size<(1024*1024))
{
$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
$tmp = $_FILES['current_image']['tmp_name'];

if(move_uploaded_file($tmp, $path.$actual_image_name))
{
	echo "<input type='hidden' id='ajax_image_url' value='".$actual_image_name."'>";
	echo "<img src='media/".$actual_image_name."'  class='showthumb' width='150'>";
}
else
	echo "Please try again.";
}
else
echo "Sorry, maximum file size should be 1MB";					
}
else
echo "Invalid format, try again";	
}
else
echo "Please select an image.";

exit;
}
?>