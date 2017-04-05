<?php
session_start();
$mail = $_POST['mail'];
$pw = $_POST['pw'];

if($mail&&$pw)
{
    $connection=mysql_connect("localhost", "root", "") or die("not able to connect to database");
    mysql_select_db("smackron") or die("could not find db");
    $query=mysql_query("select * from user where email='$mail'");
    $num_rows=mysql_num_rows($query);
    if($num_rows!=0)
    {
        while ($row = mysql_fetch_assoc($query)) {
            $dbuid=$row['id'];
            $dbmail=$row['email'];
            $dbpw=$row['password'];
//            $dbnickname=$row['nickname'];
            $dbfullname=$row['fullname'];
            $dbgender=$row['gender'];
            $dbcountry=$row['country'];
            $dbstate=$row['state'];
            $dbcitynearby=$row['citynearby'];
            $dbdateofbirth=$row['dateofbirth'];
            $dbheight=$row['height'];
            $dbweight=$row['weight'];
            $dboccupation=$row['occupation'];
            $dbmaritalstatus=$row['maritalstatus'];
            $dbcolor=$row['color'];
            $dbselect1=$row['select1'];
            $dbbelievegod=$row['believegod'];
            $dbselect2=$row['select2'];
            $dbwannabe=$row['wannabe'];
            $dblikemost=$row['likemost'];
            $dbifrich=$row['ifrich'];
            $dblifewannabe=$row['lifewannabe'];
            $dburdream=$row['urdream'];
            $dburhobby=$row['urhobby'];
            $dbfriendarray=$row['friend_array'];
            //$dbschooling=$row['schooling'];
            //$dbintermediate=$row['intermediate'];
            //$dbgraduation=$row['graduation'];
            //$dblanguages=$row['languagesknown'];
            //session_register('id'); 
        }
        if($dbmail==$mail&&$dbpw==$pw){
            //echo "u have successfully logged in . <a href='member.php'>click</a> here to enter the member page";
            $_SESSION['uid']=$dbuid;
            $_SESSION['email']=$dbmail;
//            $_SESSION['nickname']=$dbnickname;
            $_SESSION['fullname']=$dbfullname;
            
            $_SESSION['gender']=$dbgender;
            $_SESSION['country']=$dbcountry;
            $_SESSION['state']=$dbstate;
            $_SESSION['citynearby']=$dbcitynearby;
            $_SESSION['dateofbirth']=$dbdateofbirth;
            $_SESSION['height']=$dbheight;
            $_SESSION['weight']=$dbweight;
            $_SESSION['occupation']=$dboccupation;
            $_SESSION['maritalstatus']=$dbmaritalstatus;
            $_SESSION['color']=$dbcolor;
            $_SESSION['select1']=$dbselect1;
            $_SESSION['believegod']=$dbbelievegod;
            $_SESSION['select2']=$dbselect2;
            $_SESSION['wannabe']=$dbwannabe;
            $_SESSION['likemost']=$dblikemost;
            $_SESSION['ifrich']=$dbifrich;
            $_SESSION['lifewannabe']=$dblifewannabe;
            $_SESSION['urdream']=$dburdream;
            $_SESSION['urhobby']=$dburhobby;
            $_SESSION['friendarray']=$dbfriendarray;
            //$_SESSION['schooling']=$dbschooling;
            //$_SESSION['intermediate']=$dbintermediate;
            //$_SESSION['graduation']=$dbgraduation;
            //$_SESSION['languages']=$dblanguages;   
            $sql="UPDATE user SET 
        online='1'
        WHERE id= $_SESSION[uid]";
    mysql_query($sql);
    header('Location: member.php');
        }
        else{
            echo "incorrect password";
        }
    }
    else{
        echo "user does not exist";
    }
}
 else
{
    echo "enter username and password";
}
?>
