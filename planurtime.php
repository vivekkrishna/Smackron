
<?php
session_start();
if(!$_SESSION['fullname']){
    header('Location: index.php');
    //exit("do login");
}?>
<?php
include("dbconnect.php");
$query=mysql_query("select * from user where id='$_SESSION[uid]'");
    $num_rows=mysql_num_rows($query);
    if($num_rows!=0)
    {
        while ($row = mysql_fetch_assoc($query)) {
            $timeplans=$row['timeplans'];
            $timeplanm=$row['timeplanm'];
            $timeplant=$row['timeplant'];
            $timeplanw=$row['timeplanw'];
            $timeplanth=$row['timeplanth'];
            $timeplanf=$row['timeplanf'];
            $timeplansa=$row['timeplansa'];
        }}
                // ASSEMBLE FRIEND LIST AND LINKS TO VIEW UP TO 6 ON PROFILE
	$tps = explode(",", $timeplans);
    $s = array_slice($tps, 0, 24);
    $tpm = explode(",", $timeplanm);
    $m = array_slice($tpm, 0, 24);
    $tpt = explode(",", $timeplant);
    $t = array_slice($tpt, 0, 24);
    $tpw = explode(",", $timeplanw);
    $w = array_slice($tpw, 0, 24);
    $tpth = explode(",", $timeplanth);
    $th = array_slice($tpth, 0, 24);
    $tpf = explode(",", $timeplanf);
    $f = array_slice($tpf, 0, 24);
    $tpsa = explode(",", $timeplansa);
    $sa = array_slice($tpsa, 0, 24);

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="planurtime.css"/>
        <link rel="stylesheet" type="text/css" href="css/default.css">
        <style type="text/css">
            #txtHint{
    margin: auto;
    position: absolute;
    z-index: 1;
    top: 30px;
    width: 333px;
    right: 200px;  
}
.interactContainers {
	padding:8px;
	background-color:#D2F0D3;
	border:#999 1px solid;
	display:none;
}
</style>
<script type="text/javascript">
    var xmlhttp;
function showHint(str)
{
if (str!="") {
			$('#txtHint').fadeIn(200);
		}
                else if(str==""){$('#txtHint').fadeOut(200);}     

//alert("Function Called--"+str);
xmlhttp=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET","http://localhost:8082/smackron/topsearch.php?q="+str,true);
xmlhttp.send(null);
}
function stateChanged()
{
//alert("Callback Method Called --"+xmlhttp.readystate);
if (xmlhttp.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
delete xmlhttp;
xmlhttp = null;
}
}
var xmlhttp1;
function colorChange(str)
{
    //alert(str);
    //alert("Function Called--"+str);
xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp1.onreadystatechange=stateChanged;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplanajax.php?q="+str,true);
xmlhttp1.send(null);
}
function stateChanged1()
{
//alert("Callback Method Called --"+xmlhttp.readystate);
if (xmlhttp1.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("sa1").innerHTML=xmlhttp1.responseText;
delete xmlhttp1;
xmlhttp1 = null;
}
}
</script>
<script src="js/jQuery.js" type="text/javascript"></script>
    </head>
    <body class="timeplan"><div id="zero">
        <div id="one">
          <a href="logout.php"><img src="images/smackronfinal.jpg" width="100" height="50" margin="5px" align="right"/>  </a>
<!--<span class="search">-->
 <!--</span>-->
 <span>
<ul id="sddm" class="current-menu-item">
	<li><a href="home.php">Home</a>
	</li>
	<li><a href="profile.php">Profile</a>
	</li>
	<li><a href="planurtime.php" class="timeplan">Timeplan</a>
	</li>
	<li><a href="member.php">makefrnds</a>
	</li>
</ul></span>
 <input type="text" id="searchbar" onkeyup="showHint(this.value)"/>
 <div id="txtHint" class="interactContainers">
        </div>
        </div>
        <div id="two">
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>
        <div id="three">
            
            <!--<table align="center" width="60%" bgcolor="white" style="font-family: verdana;font-size: 20px;color: black">
            <caption style="color: black">do tick the free times of your week below and save,so that you can plan ur free time by the help of smackron</caption>
            <tr><td></td><td></td><td></td><td>12</td><td>-</td><td>1</td><td>-</td><td>2</td><td>-</td><td>3</td><td>-</td><td>4</td><td>-</td><td>5</td><td>-</td><td>6</td><td>-</td><td>7</td><td>-</td><td>8</td><td>-</td><td>9</td><td>-</td><td>10</td><td>-</td><td>11</td><td>-</td><td>12</td></tr>
            <tr><th rowspan="2">SUN</th><td></td><td>am</td><td></td><td><input type="checkbox" value="sun12a1"></td><td></td><td><input type="checkbox" value="sun1a2"></td><td></td><td><input type="checkbox" value="sun2a3"></td><td></td><td><input type="checkbox" value="sun3a4"></td><td></td><td><input type="checkbox" value="sun4a5"></td><td></td><td><input type="checkbox" value="sun5a6"></td><td></td><td><input type="checkbox" value="sun6a7"></td><td></td><td><input type="checkbox" value="sun7a8"></td><td></td><td><input type="checkbox" value="sun8a9"></td><td></td><td><input type="checkbox" value="sun9a10"></td><td></td><td><input type="checkbox" value="sun10a11"></td><td></td><td><input type="checkbox" value="sun11a12"></td><td></td></tr>
            <tr><td></td><td>pm</td><td></td><td><input type="checkbox" value="sun12p1"></td><td></td><td><input type="checkbox" value="sun1p2"></td><td></td><td><input type="checkbox" value="sun2p3"></td><td></td><td><input type="checkbox" value="sun3p4"></td><td></td><td><input type="checkbox" value="sun4p5"></td><td></td><td><input type="checkbox" value="sun5p6"></td><td></td><td><input type="checkbox" value="sun6p7"></td><td></td><td><input type="checkbox" value="sun7p8"></td><td></td><td><input type="checkbox" value="sun8p9"></td><td></td><td><input type="checkbox" value="sun9p10"></td><td></td><td><input type="checkbox" value="sun10p11"></td><td></td><td><input type="checkbox" value="sun11p12"></td><td></td></tr>
            <tr><th rowspan="2">MON</th><td></td><td>am</td><td></td><td><input type="checkbox" value="mon12a1"></td><td></td><td><input type="checkbox" value="mon1a2"></td><td></td><td><input type="checkbox" value="mon2a3"></td><td></td><td><input type="checkbox" value="mon3a4"></td><td></td><td><input type="checkbox" value="mon4a5"></td><td></td><td><input type="checkbox" value="mon5a6"></td><td></td><td><input type="checkbox" value="mon6a7"></td><td></td><td><input type="checkbox" value="mon7a8"></td><td></td><td><input type="checkbox" value="mon8a9"></td><td></td><td><input type="checkbox" value="mon9a10"></td><td></td><td><input type="checkbox" value="mon10a11"></td><td></td><td><input type="checkbox" value="mon11a12"></td><td></td></tr>
            <tr><td></td><td>pm</td><td></td><td><input type="checkbox" value="mon12p1"></td><td></td><td><input type="checkbox" value="mon1p2"></td><td></td><td><input type="checkbox" value="mon2p3"></td><td></td><td><input type="checkbox" value="mon3p4"></td><td></td><td><input type="checkbox" value="mon4p5"></td><td></td><td><input type="checkbox" value="mon5p6"></td><td></td><td><input type="checkbox" value="mon6p7"></td><td></td><td><input type="checkbox" value="mon7p8"></td><td></td><td><input type="checkbox" value="mon8p9"></td><td></td><td><input type="checkbox" value="mon9p10"></td><td></td><td><input type="checkbox" value="mon10p11"></td><td></td><td><input type="checkbox" value="mon11p12"></td><td></td></tr>
            <tr><th rowspan="2">TUE</th><td></td><td>am</td><td></td><td><input type="checkbox" value="sun12a1"></td><td></td><td><input type="checkbox" value="sun1a2"></td><td></td><td><input type="checkbox" value="sun2a3"></td><td></td><td><input type="checkbox" value="sun3a4"></td><td></td><td><input type="checkbox" value="sun4a5"></td><td></td><td><input type="checkbox" value="sun5a6"></td><td></td><td><input type="checkbox" value="sun6a7"></td><td></td><td><input type="checkbox" value="sun7a8"></td><td></td><td><input type="checkbox" value="sun8a9"></td><td></td><td><input type="checkbox" value="sun9a10"></td><td></td><td><input type="checkbox" value="sun10a11"></td><td></td><td><input type="checkbox" value="sun11a12"></td><td></td></tr>
            <tr><td></td><td>pm</td><td></td><td><input type="checkbox" value="sun12p1"></td><td></td><td><input type="checkbox" value="sun1p2"></td><td></td><td><input type="checkbox" value="sun2p3"></td><td></td><td><input type="checkbox" value="sun3p4"></td><td></td><td><input type="checkbox" value="sun4p5"></td><td></td><td><input type="checkbox" value="sun5p6"></td><td></td><td><input type="checkbox" value="sun6p7"></td><td></td><td><input type="checkbox" value="sun7p8"></td><td></td><td><input type="checkbox" value="sun8p9"></td><td></td><td><input type="checkbox" value="sun9p10"></td><td></td><td><input type="checkbox" value="sun10p11"></td><td></td><td><input type="checkbox" value="sun11p12"></td><td></td></tr>
            <tr><th rowspan="2">WED</th><td></td><td>am</td><td></td><td><input type="checkbox" value="sun12a1"></td><td></td><td><input type="checkbox" value="sun1a2"></td><td></td><td><input type="checkbox" value="sun2a3"></td><td></td><td><input type="checkbox" value="sun3a4"></td><td></td><td><input type="checkbox" value="sun4a5"></td><td></td><td><input type="checkbox" value="sun5a6"></td><td></td><td><input type="checkbox" value="sun6a7"></td><td></td><td><input type="checkbox" value="sun7a8"></td><td></td><td><input type="checkbox" value="sun8a9"></td><td></td><td><input type="checkbox" value="sun9a10"></td><td></td><td><input type="checkbox" value="sun10a11"></td><td></td><td><input type="checkbox" value="sun11a12"></td><td></td></tr>
            <tr><td></td><td>pm</td><td></td><td><input type="checkbox" value="sun12p1"></td><td></td><td><input type="checkbox" value="sun1p2"></td><td></td><td><input type="checkbox" value="sun2p3"></td><td></td><td><input type="checkbox" value="sun3p4"></td><td></td><td><input type="checkbox" value="sun4p5"></td><td></td><td><input type="checkbox" value="sun5p6"></td><td></td><td><input type="checkbox" value="sun6p7"></td><td></td><td><input type="checkbox" value="sun7p8"></td><td></td><td><input type="checkbox" value="sun8p9"></td><td></td><td><input type="checkbox" value="sun9p10"></td><td></td><td><input type="checkbox" value="sun10p11"></td><td></td><td><input type="checkbox" value="sun11p12"></td><td></td></tr>
            <tr><th rowspan="2">THU</th><td></td><td>am</td><td></td><td><input type="checkbox" value="sun12a1"></td><td></td><td><input type="checkbox" value="sun1a2"></td><td></td><td><input type="checkbox" value="sun2a3"></td><td></td><td><input type="checkbox" value="sun3a4"></td><td></td><td><input type="checkbox" value="sun4a5"></td><td></td><td><input type="checkbox" value="sun5a6"></td><td></td><td><input type="checkbox" value="sun6a7"></td><td></td><td><input type="checkbox" value="sun7a8"></td><td></td><td><input type="checkbox" value="sun8a9"></td><td></td><td><input type="checkbox" value="sun9a10"></td><td></td><td><input type="checkbox" value="sun10a11"></td><td></td><td><input type="checkbox" value="sun11a12"></td><td></td></tr>
            <tr><td></td><td>pm</td><td></td><td><input type="checkbox" value="sun12p1"></td><td></td><td><input type="checkbox" value="sun1p2"></td><td></td><td><input type="checkbox" value="sun2p3"></td><td></td><td><input type="checkbox" value="sun3p4"></td><td></td><td><input type="checkbox" value="sun4p5"></td><td></td><td><input type="checkbox" value="sun5p6"></td><td></td><td><input type="checkbox" value="sun6p7"></td><td></td><td><input type="checkbox" value="sun7p8"></td><td></td><td><input type="checkbox" value="sun8p9"></td><td></td><td><input type="checkbox" value="sun9p10"></td><td></td><td><input type="checkbox" value="sun10p11"></td><td></td><td><input type="checkbox" value="sun11p12"></td><td></td></tr>
            <tr><th rowspan="2">FRI</th><td></td><td>am</td><td></td><td><input type="checkbox" value="sun12a1"></td><td></td><td><input type="checkbox" value="sun1a2"></td><td></td><td><input type="checkbox" value="sun2a3"></td><td></td><td><input type="checkbox" value="sun3a4"></td><td></td><td><input type="checkbox" value="sun4a5"></td><td></td><td><input type="checkbox" value="sun5a6"></td><td></td><td><input type="checkbox" value="sun6a7"></td><td></td><td><input type="checkbox" value="sun7a8"></td><td></td><td><input type="checkbox" value="sun8a9"></td><td></td><td><input type="checkbox" value="sun9a10"></td><td></td><td><input type="checkbox" value="sun10a11"></td><td></td><td><input type="checkbox" value="sun11a12"></td><td></td></tr>
            <tr><td></td><td>pm</td><td></td><td><input type="checkbox" value="sun12p1"></td><td></td><td><input type="checkbox" value="sun1p2"></td><td></td><td><input type="checkbox" value="sun2p3"></td><td></td><td><input type="checkbox" value="sun3p4"></td><td></td><td><input type="checkbox" value="sun4p5"></td><td></td><td><input type="checkbox" value="sun5p6"></td><td></td><td><input type="checkbox" value="sun6p7"></td><td></td><td><input type="checkbox" value="sun7p8"></td><td></td><td><input type="checkbox" value="sun8p9"></td><td></td><td><input type="checkbox" value="sun9p10"></td><td></td><td><input type="checkbox" value="sun10p11"></td><td></td><td><input type="checkbox" value="sun11p12"></td><td></td></tr>
            <tr><th rowspan="2">SAT</th><td></td><td>am</td><td></td><td><input type="checkbox" value="sun12a1"></td><td></td><td><input type="checkbox" value="sun1a2"></td><td></td><td><input type="checkbox" value="sun2a3"></td><td></td><td><input type="checkbox" value="sun3a4"></td><td></td><td><input type="checkbox" value="sun4a5"></td><td></td><td><input type="checkbox" value="sun5a6"></td><td></td><td><input type="checkbox" value="sun6a7"></td><td></td><td><input type="checkbox" value="sun7a8"></td><td></td><td><input type="checkbox" value="sun8a9"></td><td></td><td><input type="checkbox" value="sun9a10"></td><td></td><td><input type="checkbox" value="sun10a11"></td><td></td><td><input type="checkbox" value="sun11a12"></td><td></td></tr>
            <tr><td></td><td>pm</td><td></td><td><input type="checkbox" value="sun12p1"></td><td></td><td><input type="checkbox" value="sun1p2"></td><td></td><td><input type="checkbox" value="sun2p3"></td><td></td><td><input type="checkbox" value="sun3p4"></td><td></td><td><input type="checkbox" value="sun4p5"></td><td></td><td><input type="checkbox" value="sun5p6"></td><td></td><td><input type="checkbox" value="sun6p7"></td><td></td><td><input type="checkbox" value="sun7p8"></td><td></td><td><input type="checkbox" value="sun8p9"></td><td></td><td><input type="checkbox" value="sun9p10"></td><td></td><td><input type="checkbox" value="sun10p11"></td><td></td><td><input type="checkbox" value="sun11p12"></td><td></td></tr>
            <tr><td colspan="6" ></td><td colspan="3"><input type="button" value="SAVE"></input></td></tr>
        </table> -->  <?php
        if($s[0]=="1"){$sa1="green";}
        else if($s[0]=="0"){$sa1="red";}
        else if($s[0]=="2"){$sa1="blue";}
        if($s['1']=="1"){$sa2="green";}
        else if($s['1']=="0"){$sa2="red";}
        else if($s['1']=="2"){$sa2="blue";}
        if($s['2']=="1"){$sa3="green";}
        else if($s['2']=="0"){$sa3="red";}
        else if($s['2']=="2"){$sa3="blue";}
        if($s['3']=="1"){$sa4="green";}
        else if($s['3']=="0"){$sa4="red";}
        else if($s['3']=="2"){$sa4="blue";}
        if($s['4']=="1"){$sa5="green";}
        else if($s['4']=="0"){$sa5="red";}
        else if($s['4']=="2"){$sa5="blue";}
        if($s['5']=="1"){$sa6="green";}
        else if($s['5']=="0"){$sa6="red";}
        else if($s['5']=="2"){$sa6="blue";}
        if($s['6']=="1"){$sa7="green";}
        else if($s['6']=="0"){$sa7="red";}
        else if($s['6']=="2"){$sa7="blue";}
        if($s['7']=="1"){$sa8="green";}
        else if($s['7']=="0"){$sa8="red";}
        else if($s['7']=="2"){$sa8="blue";}
        if($s['8']=="1"){$sa9="green";}
        else if($s['8']=="0"){$sa9="red";}
        else if($s['8']=="2"){$sa9="blue";}
        if($s['9']=="1"){$sa10="green";}
        else if($s['9']=="0"){$sa10="red";}
        else if($s['9']=="2"){$sa10="blue";}
        if($s['10']=="1"){$sa11="green";}
        else if($s['10']=="0"){$sa11="red";}
        else if($s['10']=="2"){$sa11="blue";}
        if($s['11']=="1"){$sa12="green";}
        else if($s['11']=="0"){$sa12="red";}
        else if($s['11']=="2"){$sa12="blue";}
        if($s[12]=="1"){$sp1="green";}
        else if($s[12]=="0"){$sp1="red";}
        else if($s[12]=="2"){$sp1="blue";}
        if($s['13']=="1"){$sp2="green";}
        else if($s['13']=="0"){$sp2="red";}
        else if($s['13']=="2"){$sp2="blue";}
        if($s['14']=="1"){$sp3="green";}
        else if($s['14']=="0"){$sp3="red";}
        else if($s['14']=="2"){$sp3="blue";}
        if($s['15']=="1"){$sp4="green";}
        else if($s['15']=="0"){$sp4="red";}
        else if($s['15']=="2"){$sp4="blue";}
        if($s['16']=="1"){$sp5="green";}
        else if($s['16']=="0"){$sp5="red";}
        else if($s['16']=="2"){$sp5="blue";}
        if($s['17']=="1"){$sp6="green";}
        else if($s['17']=="0"){$sp6="red";}
        else if($s['17']=="2"){$sp6="blue";}
        if($s['18']=="1"){$sp7="green";}
        else if($s['18']=="0"){$sp7="red";}
        else if($s['18']=="2"){$sp7="blue";}
        if($s['19']=="1"){$sp8="green";}
        else if($s['19']=="0"){$sp8="red";}
        else if($s['19']=="2"){$sp8="blue";}
        if($s['20']=="1"){$sp9="green";}
        else if($s['20']=="0"){$sp9="red";}
        else if($s['20']=="2"){$sp9="blue";}
        if($s['21']=="1"){$sp10="green";}
        else if($s['21']=="0"){$sp10="red";}
        else if($s['21']=="2"){$sp10="blue";}
        if($s['22']=="1"){$sp11="green";}
        else if($s['22']=="0"){$sp11="red";}
        else if($s['22']=="2"){$sp11="blue";}
        if($s['23']=="1"){$sp12="green";}
        else if($s['23']=="0"){$sp12="red";}
        else if($s['23']=="2"){$sp12="blue";}
        if($m[0]=="1"){$ma1="green";}
        else if($m[0]=="0"){$ma1="red";}
        else if($m[0]=="2"){$ma1="blue";}
        if($m['1']=="1"){$ma2="green";}
        else if($m['1']=="0"){$ma2="red";}
        else if($m['1']=="2"){$ma2="blue";}
        if($m['2']=="1"){$ma3="green";}
        else if($m['2']=="0"){$ma3="red";}
        else if($m['2']=="2"){$ma3="blue";}
        if($m['3']=="1"){$ma4="green";}
        else if($m['3']=="0"){$ma4="red";}
        else if($m['3']=="2"){$ma4="blue";}
        if($m['4']=="1"){$ma5="green";}
        else if($m['4']=="0"){$ma5="red";}
        else if($m['4']=="2"){$ma5="blue";}
        if($m['5']=="1"){$ma6="green";}
        else if($m['5']=="0"){$ma6="red";}
        else if($m['5']=="2"){$ma6="blue";}
        if($m['6']=="1"){$ma7="green";}
        else if($m['6']=="0"){$ma7="red";}
        else if($m['6']=="2"){$ma7="blue";}
        if($m['7']=="1"){$ma8="green";}
        else if($m['7']=="0"){$ma8="red";}
        else if($m['7']=="2"){$ma8="blue";}
        if($m['8']=="1"){$ma9="green";}
        else if($m['8']=="0"){$ma9="red";}
        else if($m['8']=="2"){$ma9="blue";}
        if($m['9']=="1"){$ma10="green";}
        else if($m['9']=="0"){$ma10="red";}
        else if($m['9']=="2"){$ma10="blue";}
        if($m['10']=="1"){$ma11="green";}
        else if($m['10']=="0"){$ma11="red";}
        else if($m['10']=="2"){$ma11="blue";}
        if($m['11']=="1"){$ma12="green";}
        else if($m['11']=="0"){$ma12="red";}
        else if($m['11']=="2"){$ma12="blue";}
        if($m[12]=="1"){$mp1="green";}
        else if($m[12]=="0"){$mp1="red";}
        else if($m[12]=="2"){$mp1="blue";}
        if($m['13']=="1"){$mp2="green";}
        else if($m['13']=="0"){$mp2="red";}
        else if($m['13']=="2"){$mp2="blue";}
        if($m['14']=="1"){$mp3="green";}
        else if($m['14']=="0"){$mp3="red";}
        else if($m['14']=="2"){$mp3="blue";}
        if($m['15']=="1"){$mp4="green";}
        else if($m['15']=="0"){$mp4="red";}
        else if($m['15']=="2"){$mp4="blue";}
        if($m['16']=="1"){$mp5="green";}
        else if($m['16']=="0"){$mp5="red";}
        else if($m['16']=="2"){$mp5="blue";}
        if($m['17']=="1"){$mp6="green";}
        else if($m['17']=="0"){$mp6="red";}
        else if($m['17']=="2"){$mp6="blue";}
        if($m['18']=="1"){$mp7="green";}
        else if($m['18']=="0"){$mp7="red";}
        else if($m['18']=="2"){$mp7="blue";}
        if($m['19']=="1"){$mp8="green";}
        else if($m['19']=="0"){$mp8="red";}
        else if($m['19']=="2"){$mp8="blue";}
        if($m['20']=="1"){$mp9="green";}
        else if($m['20']=="0"){$mp9="red";}
        else if($m['20']=="2"){$mp9="blue";}
        if($m['21']=="1"){$mp10="green";}
        else if($m['21']=="0"){$mp10="red";}
        else if($m['21']=="2"){$mp10="blue";}
        if($m['22']=="1"){$mp11="green";}
        else if($m['22']=="0"){$mp11="red";}
        else if($m['22']=="2"){$mp11="blue";}
        if($m['23']=="1"){$mp12="green";}
        else if($m['23']=="0"){$mp12="red";}
        else if($m['23']=="2"){$mp12="blue";}
        if($t[0]=="1"){$ta1="green";}
        else if($t[0]=="0"){$ta1="red";}
        else if($t[0]=="2"){$ta1="blue";}
        if($t['1']=="1"){$ta2="green";}
        else if($t['1']=="0"){$ta2="red";}
        else if($t['1']=="2"){$ta2="blue";}
        if($t['2']=="1"){$ta3="green";}
        else if($t['2']=="0"){$ta3="red";}
        else if($t['2']=="2"){$ta3="blue";}
        if($t['3']=="1"){$ta4="green";}
        else if($t['3']=="0"){$ta4="red";}
        else if($t['3']=="2"){$ta4="blue";}
        if($t['4']=="1"){$ta5="green";}
        else if($t['4']=="0"){$ta5="red";}
        else if($t['4']=="2"){$ta5="blue";}
        if($t['5']=="1"){$ta6="green";}
        else if($t['5']=="0"){$ta6="red";}
        else if($t['5']=="2"){$ta6="blue";}
        if($t['6']=="1"){$ta7="green";}
        else if($t['6']=="0"){$ta7="red";}
        else if($t['6']=="2"){$ta7="blue";}
        if($t['7']=="1"){$ta8="green";}
        else if($t['7']=="0"){$ta8="red";}
        else if($t['7']=="2"){$ta8="blue";}
        if($t['8']=="1"){$ta9="green";}
        else if($t['8']=="0"){$ta9="red";}
        else if($t['8']=="2"){$ta9="blue";}
        if($t['9']=="1"){$ta10="green";}
        else if($t['9']=="0"){$ta10="red";}
        else if($t['9']=="2"){$ta10="blue";}
        if($t['10']=="1"){$ta11="green";}
        else if($t['10']=="0"){$ta11="red";}
        else if($t['10']=="2"){$ta11="blue";}
        if($t['11']=="1"){$ta12="green";}
        else if($t['11']=="0"){$ta12="red";}
        else if($t['11']=="2"){$ta12="blue";}
        if($t[12]=="1"){$tp1="green";}
        else if($t[12]=="0"){$tp1="red";}
        else if($t[12]=="2"){$tp1="blue";}
        if($t['13']=="1"){$tp2="green";}
        else if($t['13']=="0"){$tp2="red";}
        else if($t['13']=="2"){$tp2="blue";}
        if($t['14']=="1"){$tp3="green";}
        else if($t['14']=="0"){$tp3="red";}
        else if($t['14']=="2"){$tp3="blue";}
        if($t['15']=="1"){$tp4="green";}
        else if($t['15']=="0"){$tp4="red";}
        else if($t['15']=="2"){$tp4="blue";}
        if($t['16']=="1"){$tp5="green";}
        else if($t['16']=="0"){$tp5="red";}
        else if($t['16']=="2"){$tp5="blue";}
        if($t['17']=="1"){$tp6="green";}
        else if($t['17']=="0"){$tp6="red";}
        else if($t['17']=="2"){$tp6="blue";}
        if($t['18']=="1"){$tp7="green";}
        else if($t['18']=="0"){$tp7="red";}
        else if($t['18']=="2"){$tp7="blue";}
        if($t['19']=="1"){$tp8="green";}
        else if($t['19']=="0"){$tp8="red";}
        else if($t['19']=="2"){$tp8="blue";}
        if($t['20']=="1"){$tp9="green";}
        else if($t['20']=="0"){$tp9="red";}
        else if($t['20']=="2"){$tp9="blue";}
        if($t['21']=="1"){$tp10="green";}
        else if($t['21']=="0"){$tp10="red";}
        else if($t['21']=="2"){$tp10="blue";}
        if($t['22']=="1"){$tp11="green";}
        else if($t['22']=="0"){$tp11="red";}
        else if($t['22']=="2"){$tp11="blue";}
        if($t['23']=="1"){$tp12="green";}
        else if($t['23']=="0"){$tp12="red";}
        else if($t['23']=="2"){$tp12="blue";}
        if($w[0]=="1"){$wa1="green";}
        else if($w[0]=="0"){$wa1="red";}
        else if($w[0]=="2"){$wa1="blue";}
        if($w['1']=="1"){$wa2="green";}
        else if($w['1']=="0"){$wa2="red";}
        else if($w['1']=="2"){$wa2="blue";}
        if($w['2']=="1"){$wa3="green";}
        else if($w['2']=="0"){$wa3="red";}
        else if($w['2']=="2"){$wa3="blue";}
        if($w['3']=="1"){$wa4="green";}
        else if($w['3']=="0"){$wa4="red";}
        else if($w['3']=="2"){$wa4="blue";}
        if($w['4']=="1"){$wa5="green";}
        else if($w['4']=="0"){$wa5="red";}
        else if($w['4']=="2"){$wa5="blue";}
        if($w['5']=="1"){$wa6="green";}
        else if($w['5']=="0"){$wa6="red";}
        else if($w['5']=="2"){$wa6="blue";}
        if($w['6']=="1"){$wa7="green";}
        else if($w['6']=="0"){$wa7="red";}
        else if($w['6']=="2"){$wa7="blue";}
        if($w['7']=="1"){$wa8="green";}
        else if($w['7']=="0"){$wa8="red";}
        else if($w['7']=="2"){$wa8="blue";}
        if($w['8']=="1"){$wa9="green";}
        else if($w['8']=="0"){$wa9="red";}
        else if($w['8']=="2"){$wa9="blue";}
        if($w['9']=="1"){$wa10="green";}
        else if($w['9']=="0"){$wa10="red";}
        else if($w['9']=="2"){$wa10="blue";}
        if($w['10']=="1"){$wa11="green";}
        else if($w['10']=="0"){$wa11="red";}
        else if($w['10']=="2"){$wa11="blue";}
        if($w['11']=="1"){$wa12="green";}
        else if($w['11']=="0"){$wa12="red";}
        else if($w['11']=="2"){$wa12="blue";}
        if($w[12]=="1"){$wp1="green";}
        else if($w[12]=="0"){$wp1="red";}
        else if($w[12]=="2"){$wp1="blue";}
        if($w['13']=="1"){$wp2="green";}
        else if($w['13']=="0"){$wp2="red";}
        else if($w['13']=="2"){$wp2="blue";}
        if($w['14']=="1"){$wp3="green";}
        else if($w['14']=="0"){$wp3="red";}
        else if($w['14']=="2"){$wp3="blue";}
        if($w['15']=="1"){$wp4="green";}
        else if($w['15']=="0"){$wp4="red";}
        else if($w['15']=="2"){$wp4="blue";}
        if($w['16']=="1"){$wp5="green";}
        else if($w['16']=="0"){$wp5="red";}
        else if($w['16']=="2"){$wp5="blue";}
        if($w['17']=="1"){$wp6="green";}
        else if($w['17']=="0"){$wp6="red";}
        else if($w['17']=="2"){$wp6="blue";}
        if($w['18']=="1"){$wp7="green";}
        else if($w['18']=="0"){$wp7="red";}
        else if($w['18']=="2"){$wp7="blue";}
        if($w['19']=="1"){$wp8="green";}
        else if($w['19']=="0"){$wp8="red";}
        else if($w['19']=="2"){$wp8="blue";}
        if($w['20']=="1"){$wp9="green";}
        else if($w['20']=="0"){$wp9="red";}
        else if($w['20']=="2"){$wp9="blue";}
        if($w['21']=="1"){$wp10="green";}
        else if($w['21']=="0"){$wp10="red";}
        else if($w['21']=="2"){$wp10="blue";}
        if($w['22']=="1"){$wp11="green";}
        else if($w['22']=="0"){$wp11="red";}
        else if($w['22']=="2"){$wp11="blue";}
        if($w['23']=="1"){$wp12="green";}
        else if($w['23']=="0"){$wp12="red";}
        else if($w['23']=="2"){$wp12="blue";}
        if($th[0]=="1"){$tha1="green";}
        else if($th[0]=="0"){$tha1="red";}
        else if($th[0]=="2"){$tha1="blue";}
        if($th['1']=="1"){$tha2="green";}
        else if($th['1']=="0"){$tha2="red";}
        else if($th['1']=="2"){$tha2="blue";}
        if($th['2']=="1"){$tha3="green";}
        else if($th['2']=="0"){$tha3="red";}
        else if($th['2']=="2"){$tha3="blue";}
        if($th['3']=="1"){$tha4="green";}
        else if($th['3']=="0"){$tha4="red";}
        else if($th['3']=="2"){$tha4="blue";}
        if($th['4']=="1"){$tha5="green";}
        else if($th['4']=="0"){$tha5="red";}
        else if($th['4']=="2"){$tha5="blue";}
        if($th['5']=="1"){$tha6="green";}
        else if($th['5']=="0"){$tha6="red";}
        else if($th['5']=="2"){$tha6="blue";}
        if($th['6']=="1"){$tha7="green";}
        else if($th['6']=="0"){$tha7="red";}
        else if($th['6']=="2"){$tha7="blue";}
        if($th['7']=="1"){$tha8="green";}
        else if($th['7']=="0"){$tha8="red";}
        else if($th['7']=="2"){$tha8="blue";}
        if($th['8']=="1"){$tha9="green";}
        else if($th['8']=="0"){$tha9="red";}
        else if($th['8']=="2"){$tha9="blue";}
        if($th['9']=="1"){$tha10="green";}
        else if($th['9']=="0"){$tha10="red";}
        else if($th['9']=="2"){$tha10="blue";}
        if($th['10']=="1"){$tha11="green";}
        else if($th['10']=="0"){$tha11="red";}
        else if($th['10']=="2"){$tha11="blue";}
        if($th['11']=="1"){$tha12="green";}
        else if($th['11']=="0"){$tha12="red";}
        else if($th['11']=="2"){$tha12="blue";}
        if($th[12]=="1"){$thp1="green";}
        else if($th[12]=="0"){$thp1="red";}
        else if($th[12]=="2"){$thp1="blue";}
        if($th['13']=="1"){$thp2="green";}
        else if($th['13']=="0"){$thp2="red";}
        else if($th['13']=="2"){$thp2="blue";}
        if($th['14']=="1"){$thp3="green";}
        else if($th['14']=="0"){$thp3="red";}
        else if($th['14']=="2"){$thp3="blue";}
        if($th['15']=="1"){$thp4="green";}
        else if($th['15']=="0"){$thp4="red";}
        else if($th['15']=="2"){$thp4="blue";}
        if($th['16']=="1"){$thp5="green";}
        else if($th['16']=="0"){$thp5="red";}
        else if($th['16']=="2"){$thp5="blue";}
        if($th['17']=="1"){$thp6="green";}
        else if($th['17']=="0"){$thp6="red";}
        else if($th['17']=="2"){$thp6="blue";}
        if($th['18']=="1"){$thp7="green";}
        else if($th['18']=="0"){$thp7="red";}
        else if($th['18']=="2"){$thp7="blue";}
        if($th['19']=="1"){$thp8="green";}
        else if($th['19']=="0"){$thp8="red";}
        else if($th['19']=="2"){$thp8="blue";}
        if($th['20']=="1"){$thp9="green";}
        else if($th['20']=="0"){$thp9="red";}
        else if($th['20']=="2"){$thp9="blue";}
        if($th['21']=="1"){$thp10="green";}
        else if($th['21']=="0"){$thp10="red";}
        else if($th['21']=="2"){$thp10="blue";}
        if($th['22']=="1"){$thp11="green";}
        else if($th['22']=="0"){$thp11="red";}
        else if($th['22']=="2"){$thp11="blue";}
        if($th['23']=="1"){$thp12="green";}
        else if($th['23']=="0"){$thp12="red";}
        else if($th['23']=="2"){$thp12="blue";}
        if($f[0]=="1"){$fa1="green";}
        else if($f[0]=="0"){$fa1="red";}
        else if($f[0]=="2"){$fa1="blue";}
        if($f['1']=="1"){$fa2="green";}
        else if($f['1']=="0"){$fa2="red";}
        else if($f['1']=="2"){$fa2="blue";}
        if($f['2']=="1"){$fa3="green";}
        else if($f['2']=="0"){$fa3="red";}
        else if($f['2']=="2"){$fa3="blue";}
        if($f['3']=="1"){$fa4="green";}
        else if($f['3']=="0"){$fa4="red";}
        else if($f['3']=="2"){$fa4="blue";}
        if($f['4']=="1"){$fa5="green";}
        else if($f['4']=="0"){$fa5="red";}
        else if($f['4']=="2"){$fa5="blue";}
        if($f['5']=="1"){$fa6="green";}
        else if($f['5']=="0"){$fa6="red";}
        else if($f['5']=="2"){$fa6="blue";}
        if($f['6']=="1"){$fa7="green";}
        else if($f['6']=="0"){$fa7="red";}
        else if($f['6']=="2"){$fa7="blue";}
        if($f['7']=="1"){$fa8="green";}
        else if($f['7']=="0"){$fa8="red";}
        else if($f['7']=="2"){$fa8="blue";}
        if($f['8']=="1"){$fa9="green";}
        else if($f['8']=="0"){$fa9="red";}
        else if($f['8']=="2"){$fa9="blue";}
        if($f['9']=="1"){$fa10="green";}
        else if($f['9']=="0"){$fa10="red";}
        else if($f['9']=="2"){$fa10="blue";}
        if($f['10']=="1"){$fa11="green";}
        else if($f['10']=="0"){$fa11="red";}
        else if($f['10']=="2"){$fa11="blue";}
        if($f['11']=="1"){$fa12="green";}
        else if($f['11']=="0"){$fa12="red";}
        else if($f['11']=="2"){$fa12="blue";}
        if($f[12]=="1"){$fp1="green";}
        else if($f[12]=="0"){$fp1="red";}
        else if($f[12]=="2"){$fp1="blue";}
        if($f['13']=="1"){$fp2="green";}
        else if($f['13']=="0"){$fp2="red";}
        else if($f['13']=="2"){$fp2="blue";}
        if($f['14']=="1"){$fp3="green";}
        else if($f['14']=="0"){$fp3="red";}
        else if($f['14']=="2"){$fp3="blue";}
        if($f['15']=="1"){$fp4="green";}
        else if($f['15']=="0"){$fp4="red";}
        else if($f['15']=="2"){$fp4="blue";}
        if($f['16']=="1"){$fp5="green";}
        else if($f['16']=="0"){$fp5="red";}
        else if($f['16']=="2"){$fp5="blue";}
        if($f['17']=="1"){$fp6="green";}
        else if($f['17']=="0"){$fp6="red";}
        else if($f['17']=="2"){$fp6="blue";}
        if($f['18']=="1"){$fp7="green";}
        else if($f['18']=="0"){$fp7="red";}
        else if($f['18']=="2"){$fp7="blue";}
        if($f['19']=="1"){$fp8="green";}
        else if($f['19']=="0"){$fp8="red";}
        else if($f['19']=="2"){$fp8="blue";}
        if($f['20']=="1"){$fp9="green";}
        else if($f['20']=="0"){$fp9="red";}
        else if($f['20']=="2"){$fp9="blue";}
        if($f['21']=="1"){$fp10="green";}
        else if($f['21']=="0"){$fp10="red";}
        else if($f['21']=="2"){$fp10="blue";}
        if($f['22']=="1"){$fp11="green";}
        else if($f['22']=="0"){$fp11="red";}
        else if($f['22']=="2"){$fp11="blue";}
        if($f['23']=="1"){$fp12="green";}
        else if($f['23']=="0"){$fp12="red";}
        else if($f['23']=="2"){$fp12="blue";}
        if($sa[0]=="1"){$saa1="green";}
        else if($sa[0]=="0"){$saa1="red";}
        else if($sa[0]=="2"){$saa1="blue";}
        if($sa['1']=="1"){$saa2="green";}
        else if($sa['1']=="0"){$saa2="red";}
        else if($sa['1']=="2"){$saa2="blue";}
        if($sa['2']=="1"){$saa3="green";}
        else if($sa['2']=="0"){$saa3="red";}
        else if($sa['2']=="2"){$saa3="blue";}
        if($sa['3']=="1"){$saa4="green";}
        else if($sa['3']=="0"){$saa4="red";}
        else if($sa['3']=="2"){$saa4="blue";}
        if($sa['4']=="1"){$saa5="green";}
        else if($sa['4']=="0"){$saa5="red";}
        else if($sa['4']=="2"){$saa5="blue";}
        if($sa['5']=="1"){$saa6="green";}
        else if($sa['5']=="0"){$saa6="red";}
        else if($sa['5']=="2"){$saa6="blue";}
        if($sa['6']=="1"){$saa7="green";}
        else if($sa['6']=="0"){$saa7="red";}
        else if($sa['6']=="2"){$saa7="blue";}
        if($sa['7']=="1"){$saa8="green";}
        else if($sa['7']=="0"){$saa8="red";}
        else if($sa['7']=="2"){$saa8="blue";}
        if($sa['8']=="1"){$saa9="green";}
        else if($sa['8']=="0"){$saa9="red";}
        else if($sa['8']=="2"){$saa9="blue";}
        if($sa['9']=="1"){$saa10="green";}
        else if($sa['9']=="0"){$saa10="red";}
        else if($sa['9']=="2"){$saa10="blue";}
        if($sa['10']=="1"){$saa11="green";}
        else if($sa['10']=="0"){$saa11="red";}
        else if($sa['10']=="2"){$saa11="blue";}
        if($sa['11']=="1"){$saa12="green";}
        else if($sa['11']=="0"){$saa12="red";}
        else if($sa['11']=="2"){$saa12="blue";}
        if($sa[12]=="1"){$sap1="green";}
        else if($sa[12]=="0"){$sap1="red";}
        else if($sa[12]=="2"){$sap1="blue";}
        if($sa['13']=="1"){$sap2="green";}
        else if($sa['13']=="0"){$sap2="red";}
        else if($sa['13']=="2"){$sap2="blue";}
        if($sa['14']=="1"){$sap3="green";}
        else if($sa['14']=="0"){$sap3="red";}
        else if($sa['14']=="2"){$sap3="blue";}
        if($sa['15']=="1"){$sap4="green";}
        else if($sa['15']=="0"){$sap4="red";}
        else if($sa['15']=="2"){$sap4="blue";}
        if($sa['16']=="1"){$sap5="green";}
        else if($sa['16']=="0"){$sap5="red";}
        else if($sa['16']=="2"){$sap5="blue";}
        if($sa['17']=="1"){$sap6="green";}
        else if($sa['17']=="0"){$sap6="red";}
        else if($sa['17']=="2"){$sap6="blue";}
        if($sa['18']=="1"){$sap7="green";}
        else if($sa['18']=="0"){$sap7="red";}
        else if($sa['18']=="2"){$sap7="blue";}
        if($sa['19']=="1"){$sap8="green";}
        else if($sa['19']=="0"){$sap8="red";}
        else if($sa['19']=="2"){$sap8="blue";}
        if($sa['20']=="1"){$sap9="green";}
        else if($sa['20']=="0"){$sap9="red";}
        else if($sa['20']=="2"){$sap9="blue";}
        if($sa['21']=="1"){$sap10="green";}
        else if($sa['21']=="0"){$sap10="red";}
        else if($sa['21']=="2"){$sap10="blue";}
        if($sa['22']=="1"){$sap11="green";}
        else if($sa['22']=="0"){$sap11="red";}
        else if($sa['22']=="2"){$sap11="blue";}
        if($sa['23']=="1"){$sap12="green";}
        else if($sa['23']=="0"){$sap12="red";}
        else if($sa['23']=="2"){$sap12="blue";}
        
        ?>
            <table align="center" bgcolor="white" style="font-family: verdana;font-size: 15px;color: black">
            <caption style="color: black">CLICK ON BELOW BOXES TO SAVE UR FREETIME, SMACKRON WILL HELP U TO UTILISE UR FREETIME</caption>
            <tr height="30"><td></td><td></td><td></td><td>1</td><td width="50" align="center"><span class="lef">2</span>-</td><td>1</td><td width="50" align="center">-</td><td>2</td><td width="50" align="center">-</td><td>3</td><td width="50" align="center">-</td><td>4</td><td width="50" align="center">-</td><td>5</td><td width="50" align="center">-</td><td>6</td><td width="50" align="center">-</td><td>7</td><td width="50" align="center">-</td><td>8</td><td width="50" align="center">-</td><td>9</td><td width="50" align="center">-<span class="righ">1</span></td><td>0</td><td width="50" align="center">-<span class="righ">1</span></td><td>1</td><td width="50" align="center">-<span class="righ">1</span></td><td>2</td></tr>
            <tr height="30"><th rowspan="2">SUN</th><td></td><td>am</td><td></td><td style="background-color: <?php echo $sa1; ?>" id="sa1"></td><td></td><td style="background-color: <?php echo $sa2; ?>"  id="sa2"></td><td></td><td style="background-color: <?php echo $sa3; ?>"  id="sa3"></td><td></td><td style="background-color: <?php echo $sa4; ?>"  id="sa4"></td><td></td><td style="background-color: <?php echo $sa5; ?>"  id="sa5"></td><td></td><td style="background-color: <?php echo $sa6; ?>"  id="sa6"></td><td></td><td style="background-color: <?php echo $sa7; ?>"  id="sa7"></td><td></td><td style="background-color: <?php echo $sa8; ?>"  id="sa8"></td><td></td><td style="background-color: <?php echo $sa9; ?>"  id="sa9"></td><td></td><td style="background-color: <?php echo $sa10; ?>"  id="sa10"></td><td></td><td style="background-color: <?php echo $sa11; ?>"  id="sa11"></td><td></td><td style="background-color: <?php echo $sa12; ?>"  id="sa12"></td><td></td></tr>
            <tr height="30" style="background-color: lightgray"><td></td><td>pm</td><td></td><td style="background-color: <?php echo $sp1; ?>" id="sp1"></td><td></td><td style="background-color: <?php echo $sp2; ?>"  id="sp2"></td><td></td><td style="background-color: <?php echo $sp3; ?>"  id="sp3"></td><td></td><td style="background-color: <?php echo $sp4; ?>"  id="sp4"></td><td></td><td style="background-color: <?php echo $sp5; ?>"  id="sp5"></td><td></td><td style="background-color: <?php echo $sp6; ?>"  id="sp6"></td><td></td><td style="background-color: <?php echo $sp7; ?>"  id="sp7"></td><td></td><td style="background-color: <?php echo $sp8; ?>"  id="sp8"></td><td></td><td style="background-color: <?php echo $sp9; ?>"  id="sp9"></td><td></td><td style="background-color: <?php echo $sp10; ?>"  id="sp10"></td><td></td><td style="background-color: <?php echo $sp11; ?>"  id="sp11"></td><td></td><td style="background-color: <?php echo $sp12; ?>"  id="sp12"></td><td></td></tr>            
            <tr height="30"><th rowspan="2">MON</th><td></td><td>am</td><td></td><td style="background-color: <?php echo $ma1; ?>" id="ma1"></td><td></td><td style="background-color: <?php echo $ma2; ?>"  id="ma2"></td><td></td><td style="background-color: <?php echo $ma3; ?>"  id="ma3"></td><td></td><td style="background-color: <?php echo $ma4; ?>"  id="ma4"></td><td></td><td style="background-color: <?php echo $ma5; ?>"  id="ma5"></td><td></td><td style="background-color: <?php echo $ma6; ?>"  id="ma6"></td><td></td><td style="background-color: <?php echo $ma7; ?>"  id="ma7"></td><td></td><td style="background-color: <?php echo $ma8; ?>"  id="ma8"></td><td></td><td style="background-color: <?php echo $ma9; ?>"  id="ma9"></td><td></td><td style="background-color: <?php echo $ma10; ?>"  id="ma10"></td><td></td><td style="background-color: <?php echo $ma11; ?>"  id="ma11"></td><td></td><td style="background-color: <?php echo $ma12; ?>"  id="ma12"></td><td></td></tr>
            <tr height="30" style="background-color: lightgray"><td></td><td>pm</td><td></td><td style="background-color: <?php echo $mp1; ?>" id="mp1"></td><td></td><td style="background-color: <?php echo $mp2; ?>"  id="mp2"></td><td></td><td style="background-color: <?php echo $mp3; ?>"  id="mp3"></td><td></td><td style="background-color: <?php echo $mp4; ?>"  id="mp4"></td><td></td><td style="background-color: <?php echo $mp5; ?>"  id="mp5"></td><td></td><td style="background-color: <?php echo $mp6; ?>"  id="mp6"></td><td></td><td style="background-color: <?php echo $mp7; ?>"  id="mp7"></td><td></td><td style="background-color: <?php echo $mp8; ?>"  id="mp8"></td><td></td><td style="background-color: <?php echo $mp9; ?>"  id="mp9"></td><td></td><td style="background-color: <?php echo $mp10; ?>"  id="mp10"></td><td></td><td style="background-color: <?php echo $mp11; ?>"  id="mp11"></td><td></td><td style="background-color: <?php echo $mp12; ?>"  id="mp12"></td><td></td></tr>            
            <tr height="30"><th rowspan="2">TUE</th><td></td><td>am</td><td></td><td style="background-color: <?php echo $ta1; ?>" id="ta1"></td><td></td><td style="background-color: <?php echo $ta2; ?>"  id="ta2"></td><td></td><td style="background-color: <?php echo $ta3; ?>"  id="ta3"></td><td></td><td style="background-color: <?php echo $ta4; ?>"  id="ta4"></td><td></td><td style="background-color: <?php echo $ta5; ?>"  id="ta5"></td><td></td><td style="background-color: <?php echo $ta6; ?>"  id="ta6"></td><td></td><td style="background-color: <?php echo $ta7; ?>"  id="ta7"></td><td></td><td style="background-color: <?php echo $ta8; ?>"  id="ta8"></td><td></td><td style="background-color: <?php echo $ta9; ?>"  id="ta9"></td><td></td><td style="background-color: <?php echo $ta10; ?>"  id="ta10"></td><td></td><td style="background-color: <?php echo $ta11; ?>"  id="ta11"></td><td></td><td style="background-color: <?php echo $ta12; ?>"  id="ta12"></td><td></td></tr>
            <tr height="30" style="background-color: lightgray"><td></td><td>pm</td><td></td><td style="background-color: <?php echo $tp1; ?>" id="tp1"></td><td></td><td style="background-color: <?php echo $tp2; ?>"  id="tp2"></td><td></td><td style="background-color: <?php echo $tp3; ?>"  id="tp3"></td><td></td><td style="background-color: <?php echo $tp4; ?>"  id="tp4"></td><td></td><td style="background-color: <?php echo $tp5; ?>"  id="tp5"></td><td></td><td style="background-color: <?php echo $tp6; ?>"  id="tp6"></td><td></td><td style="background-color: <?php echo $tp7; ?>"  id="tp7"></td><td></td><td style="background-color: <?php echo $tp8; ?>"  id="tp8"></td><td></td><td style="background-color: <?php echo $tp9; ?>"  id="tp9"></td><td></td><td style="background-color: <?php echo $tp10; ?>"  id="tp10"></td><td></td><td style="background-color: <?php echo $tp11; ?>"  id="tp11"></td><td></td><td style="background-color: <?php echo $tp12; ?>"  id="tp12"></td><td></td></tr>            
            <tr height="30"><th rowspan="2">WED</th><td></td><td>am</td><td></td><td style="background-color: <?php echo $wa1; ?>" id="wa1"></td><td></td><td style="background-color: <?php echo $wa2; ?>"  id="wa2"></td><td></td><td style="background-color: <?php echo $wa3; ?>"  id="wa3"></td><td></td><td style="background-color: <?php echo $wa4; ?>"  id="wa4"></td><td></td><td style="background-color: <?php echo $wa5; ?>"  id="wa5"></td><td></td><td style="background-color: <?php echo $wa6; ?>"  id="wa6"></td><td></td><td style="background-color: <?php echo $wa7; ?>"  id="wa7"></td><td></td><td style="background-color: <?php echo $wa8; ?>"  id="wa8"></td><td></td><td style="background-color: <?php echo $wa9; ?>"  id="wa9"></td><td></td><td style="background-color: <?php echo $wa10; ?>"  id="wa10"></td><td></td><td style="background-color: <?php echo $wa11; ?>"  id="wa11"></td><td></td><td style="background-color: <?php echo $wa12; ?>"  id="wa12"></td><td></td></tr>
            <tr height="30" style="background-color: lightgray"><td></td><td>pm</td><td></td><td style="background-color: <?php echo $wp1; ?>" id="wp1"></td><td></td><td style="background-color: <?php echo $wp2; ?>"  id="wp2"></td><td></td><td style="background-color: <?php echo $wp3; ?>"  id="wp3"></td><td></td><td style="background-color: <?php echo $wp4; ?>"  id="wp4"></td><td></td><td style="background-color: <?php echo $wp5; ?>"  id="wp5"></td><td></td><td style="background-color: <?php echo $wp6; ?>"  id="wp6"></td><td></td><td style="background-color: <?php echo $wp7; ?>"  id="wp7"></td><td></td><td style="background-color: <?php echo $wp8; ?>"  id="wp8"></td><td></td><td style="background-color: <?php echo $wp9; ?>"  id="wp9"></td><td></td><td style="background-color: <?php echo $wp10; ?>"  id="wp10"></td><td></td><td style="background-color: <?php echo $wp11; ?>"  id="wp11"></td><td></td><td style="background-color: <?php echo $wp12; ?>"  id="wp12"></td><td></td></tr>            
            <tr height="30"><th rowspan="2">THU</th><td></td><td>am</td><td></td><td style="background-color: <?php echo $tha1; ?>" id="tha1"></td><td></td><td style="background-color: <?php echo $tha2; ?>"  id="tha2"></td><td></td><td style="background-color: <?php echo $tha3; ?>"  id="tha3"></td><td></td><td style="background-color: <?php echo $tha4; ?>"  id="tha4"></td><td></td><td style="background-color: <?php echo $tha5; ?>"  id="tha5"></td><td></td><td style="background-color: <?php echo $tha6; ?>"  id="tha6"></td><td></td><td style="background-color: <?php echo $tha7; ?>"  id="tha7"></td><td></td><td style="background-color: <?php echo $tha8; ?>"  id="tha8"></td><td></td><td style="background-color: <?php echo $tha9; ?>"  id="tha9"></td><td></td><td style="background-color: <?php echo $tha10; ?>"  id="tha10"></td><td></td><td style="background-color: <?php echo $tha11; ?>"  id="tha11"></td><td></td><td style="background-color: <?php echo $tha12; ?>"  id="tha12"></td><td></td></tr>
            <tr height="30" style="background-color: lightgray"><td></td><td>pm</td><td></td><td style="background-color: <?php echo $thp1; ?>" id="thp1"></td><td></td><td style="background-color: <?php echo $thp2; ?>"  id="thp2"></td><td></td><td style="background-color: <?php echo $thp3; ?>"  id="thp3"></td><td></td><td style="background-color: <?php echo $thp4; ?>"  id="thp4"></td><td></td><td style="background-color: <?php echo $thp5; ?>"  id="thp5"></td><td></td><td style="background-color: <?php echo $thp6; ?>"  id="thp6"></td><td></td><td style="background-color: <?php echo $thp7; ?>"  id="thp7"></td><td></td><td style="background-color: <?php echo $thp8; ?>"  id="thp8"></td><td></td><td style="background-color: <?php echo $thp9; ?>"  id="thp9"></td><td></td><td style="background-color: <?php echo $thp10; ?>"  id="thp10"></td><td></td><td style="background-color: <?php echo $thp11; ?>"  id="thp11"></td><td></td><td style="background-color: <?php echo $thp12; ?>"  id="thp12"></td><td></td></tr>            
            <tr height="30"><th rowspan="2">FRI</th><td></td><td>am</td><td></td><td style="background-color: <?php echo $fa1; ?>" id="fa1"></td><td></td><td style="background-color: <?php echo $fa2; ?>"  id="fa2"></td><td></td><td style="background-color: <?php echo $fa3; ?>"  id="fa3"></td><td></td><td style="background-color: <?php echo $fa4; ?>"  id="fa4"></td><td></td><td style="background-color: <?php echo $fa5; ?>"  id="fa5"></td><td></td><td style="background-color: <?php echo $fa6; ?>"  id="fa6"></td><td></td><td style="background-color: <?php echo $fa7; ?>"  id="fa7"></td><td></td><td style="background-color: <?php echo $fa8; ?>"  id="fa8"></td><td></td><td style="background-color: <?php echo $fa9; ?>"  id="fa9"></td><td></td><td style="background-color: <?php echo $fa10; ?>"  id="fa10"></td><td></td><td style="background-color: <?php echo $fa11; ?>"  id="fa11"></td><td></td><td style="background-color: <?php echo $fa12; ?>"  id="fa12"></td><td></td></tr>
            <tr height="30" style="background-color: lightgray"><td></td><td>pm</td><td></td><td style="background-color: <?php echo $fp1; ?>" id="fp1"></td><td></td><td style="background-color: <?php echo $fp2; ?>"  id="fp2"></td><td></td><td style="background-color: <?php echo $fp3; ?>"  id="fp3"></td><td></td><td style="background-color: <?php echo $fp4; ?>"  id="fp4"></td><td></td><td style="background-color: <?php echo $fp5; ?>"  id="fp5"></td><td></td><td style="background-color: <?php echo $fp6; ?>"  id="fp6"></td><td></td><td style="background-color: <?php echo $fp7; ?>"  id="fp7"></td><td></td><td style="background-color: <?php echo $fp8; ?>"  id="fp8"></td><td></td><td style="background-color: <?php echo $fp9; ?>"  id="fp9"></td><td></td><td style="background-color: <?php echo $fp10; ?>"  id="fp10"></td><td></td><td style="background-color: <?php echo $fp11; ?>"  id="fp11"></td><td></td><td style="background-color: <?php echo $fp12; ?>"  id="fp12"></td><td></td></tr>            
            <tr height="30"><th rowspan="2">SAT</th><td></td><td>am</td><td></td><td style="background-color: <?php echo $saa1; ?>" id="saa1"></td><td></td><td style="background-color: <?php echo $saa2; ?>"  id="saa2"></td><td></td><td style="background-color: <?php echo $saa3; ?>"  id="saa3"></td><td></td><td style="background-color: <?php echo $saa4; ?>"  id="saa4"></td><td></td><td style="background-color: <?php echo $saa5; ?>"  id="saa5"></td><td></td><td style="background-color: <?php echo $saa6; ?>"  id="saa6"></td><td></td><td style="background-color: <?php echo $saa7; ?>"  id="saa7"></td><td></td><td style="background-color: <?php echo $saa8; ?>"  id="saa8"></td><td></td><td style="background-color: <?php echo $saa9; ?>"  id="saa9"></td><td></td><td style="background-color: <?php echo $saa10; ?>"  id="saa10"></td><td></td><td style="background-color: <?php echo $saa11; ?>"  id="saa11"></td><td></td><td style="background-color: <?php echo $saa12; ?>"  id="saa12"></td><td></td></tr>
            <tr height="30" style="background-color: lightgray"><td></td><td>pm</td><td></td><td style="background-color: <?php echo $sap1; ?>" id="sap1"></td><td></td><td style="background-color: <?php echo $sap2; ?>"  id="sap2"></td><td></td><td style="background-color: <?php echo $sap3; ?>"  id="sap3"></td><td></td><td style="background-color: <?php echo $sap4; ?>"  id="sap4"></td><td></td><td style="background-color: <?php echo $sap5; ?>"  id="sap5"></td><td></td><td style="background-color: <?php echo $sap6; ?>"  id="sap6"></td><td></td><td style="background-color: <?php echo $sap7; ?>"  id="sap7"></td><td></td><td style="background-color: <?php echo $sap8; ?>"  id="sap8"></td><td></td><td style="background-color: <?php echo $sap9; ?>"  id="sap9"></td><td></td><td style="background-color: <?php echo $sap10; ?>"  id="sap10"></td><td></td><td style="background-color: <?php echo $sap11; ?>"  id="sap11"></td><td></td><td style="background-color: <?php echo $sap12; ?>"  id="sap12"></td><td></td></tr>            
<!--            <tr><td colspan="6" ></td><td colspan="3"><input type="button" value="SAVE"></input></td></tr>-->
        </table>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            done
        </div>
        </div>
        <script src="timeplan.js" type="text/javascript"></script>
    </body>
</html>

