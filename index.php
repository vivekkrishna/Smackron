<?php
session_start();
if($_SESSION['fullname']){
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <title>Smackron login page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body style="margin: 0">
        <div id="one">
            <img src="images/smackronfinal.jpg" style="padding: 25px;width: 150px;height: 70px"/>
        </div>
        <div id="two">
            <div id="twoone">
                <form action="login.php"method="post">
            <table id="login">
                <tr>
                    <td style="width: 50px">Email</td>
                    <td style="width: 300px"><input type="text"name="mail" style="width: 200px"/></td>
                    <td style="width: 50px"></td>
                    <td style="width: 50px">Password</td>
                    <td style="width: 300px"><input type="password"name="pw"/></td>
                
                    <td style="width: 500px"><input type="submit"value="ENTER THE WORLD OF YOUR UNIQUITY==>"style="margin: 30px"/></td>
                </tr>
            </table>
        </form>
            </div>
            <div id="twotwo" style="background-image: url(images/fpf_copy.jpg);"></div>
            <div id="twothree">hi</div>
        </div>
        <div id="three">hi</div>
        
    </body>
</html>
