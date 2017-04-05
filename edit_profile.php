<html>
    <a href="planurtime.php">planurtime</a>
            <a href="profile.php">profile</a>
            <a href="edit_profile.php"></a>
            <a href="user_list.php">users</a>
            <a href="member.php">findfrnds</a>
            <a href="logout.php">logout</a>
</html>
<?php
include('core/init.php');
if(isset($_POST['email'],$_POST['location'])){
    $errors=array();
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) === false){
        $errors[]='the email address u entered is not valid';
    }
    if(preg_match('#^[a-z0-9 ]+$#i', $_POST['location']) === 0){
        $errors[]='ur location must only contain a-z,0-9,spaces';
    }
    if(empty($errors)){
        set_profile_info($_POST['email'],$_POST['location']);
    }
    $user_info=  array(
      'email'    => htmlentities($_POST['email']),
      
      'location' => htmlentities($_POST['location'])
    );
}
else{
$user_info = fetch_user_info($_SESSION['uid']);}
?>
<html>
    <div>
        <?php
        if(isset($errors) === false){
            echo 'click update to edit ur profile';
        }
        else if(empty ($errors)){
            echo 'ur profile has been updated';
        }
        else{
            echo '<ul><li>'. implode('</li><li>',$errors).'</li></ul>';
        }
        ?>
    </div>
    <form action=""method="post">
        <div>
            <label for="email">email:</label>
            <input type="text" name="email" id="email" value="<?php echo $user_info['email'];?>"/>
        </div>
    <div>
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" value="<?php echo $user_info['location'];?>"/>
        </div>
<!--    <div>
            <label for="nickname">nickname:</label>
            <textarea name="nickname" id="nickname" rows="1" cols="50" ><?php echo strip_tags($user_info['nickname']);?></textarea>
        </div>-->
    <div>
            <input type="submit" value="Update"/>
        </div>
    
    </form>
</html>
