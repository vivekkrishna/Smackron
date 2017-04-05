<?php

session_start();
 // Must be already set
echo $_SESSION['fullname'];
require_once 'activityupdate.php';
?>
<br/>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd" >

<html>
<head>
<title>Sample Chat Application</title>
<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
}
</style>

<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />
[if gte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]
<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <script type="text/javascript">
//load check.php in the <span id="online"></span> and refresh every 1 second
$(document).ready(function(){
   $("#main_container").load('autoonlinerefres.php');
   setInterval(function(){
  $("#main_container").load('autoonlinerefres.php');
   },1000);//
});
</script>
<div id="main_container">

<!--<a href="javascript:void(0)" onclick="javascript:chatWith('janedoe')">Chat With Jane Doe</a><br/>
<a href="javascript:void(0)" onclick="javascript:chatWith('babydoe')">Chat With Baby Doe</a>-->
<!-- YOUR BODY HERE -->

</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>

</body>
</html>