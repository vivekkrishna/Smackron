<html>
    <a href="planurtime.php">planurtime</a>
            <a href="profile.php">profile</a>
            <a href="edit_profile.php">editprofile</a>
            <a href="user_list.php">users</a>
            <a href="member.php">findfrnds</a>
            <a href="logout.php">logout</a>
</html>
<?php
include('core/init.php');
?>
<html>
    <body>
        <div>
            <?php
            foreach (fetch_users() as $user){
                ?>
            <p>
                <a href="othersprof.php?uid=<?php echo $user['id'];?>"><?php echo $user['username'];?></a>
                
            </p>
            <?php
            }
            ?>
        </div>
    </body>
</html>
