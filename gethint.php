<html>
<head>    
</head>
<body>
<?php
// Fill up array with names
session_start();
// Fill up array with names
@$con=  mysql_connect("localhost","root","");
//mysql_select_db('employee');
//$rs=  mysql_query("select * from emp");
$q=$_GET["q"];
$q1=$_GET["q1"];
$q2=$_GET["q2"];
$q3=$_GET["q3"];
$q4=$_GET["q4"];
$q5=$_GET["q5"];
$q6=$_GET["q6"];
$x1=$_SESSION['r1'];$x2=$_SESSION['r2'];$x3=$_SESSION['r3'];$x4=$_SESSION['r4'];$x5=$_SESSION['r5'];$x6=$_SESSION['r6'];
$h=0;
if($q2){
    if($q2=="any"){
        $x2=1;
    }else{
        $x2="country"."="."'".$q2."'";
    } 
}
else if($q1){
    if($q1=="any"){
        $x1=1;
    }else{
        $x1="gender"."="."'".$q1."'";
    }
}
else if($q3){
    if($q3=="any"){
        $x3=1;
    }else{
        $x3="state"."="."'".$q3."'";
    }
    }
else if($q4){
    if($q4=="any"){
        $x4=1;
    }else{
        $x4="citynearby"."="."'".$q4."'";
    }
}
else if($q5){
    if($q5=="any"){
        $x5=1;
    }else{
        $x5="height"."="."'".$q5."'";
    }
}
else if($q6){
    if($q6=="any"){
        $x6=1;
    }else{
        $x6="weight"."="."'".$q6."'";
    }
}
else{
    $x=1;$h=1;
}if($h==1){$x1=1;$x2=1;$x3=1;$x4=1;$x5=1;$x6=1;}
$x=$x1." "."&&"." ".$x2." "."&&"." ".$x3." "."&&"." ".$x4." "."&&"." ".$x5." "."&&"." ".$x6;
$_SESSION['r1']=$x1;
$_SESSION['r2']=$x2;
$_SESSION['r3']=$x3;
$_SESSION['r4']=$x4;
$_SESSION['r5']=$x5;
$_SESSION['r6']=$x6;
$rs=  mysql_db_query("smackron","select * from user where select1='$_SESSION[select1]' && color='$_SESSION[color]' && believegod='$_SESSION[believegod]' && select2='$_SESSION[select2]' && wannabe='$_SESSION[wannabe]' && color='$_SESSION[color]' && likemost='$_SESSION[likemost]' && ifrich='$_SESSION[ifrich]' && lifewannabe='$_SESSION[lifewannabe]' && urdream='$_SESSION[urdream]' && urhobby='$_SESSION[urhobby]' && $x Limit 30");
//var_dump($rs);
//echo"no of fields=".  mysql_num_fields($rs)."<br>";
//echo "no of columns=".  mysql_num_rows($rs)."<br>";
//$row=  mysql_fetch_array($rs);
//$row=  mysql_fetch_array($rs,MYSQL_NUM);
//$row=  mysql_fetch_array($rs,MYSQL_ASSOC);
//$row=  mysql_fetch_array($rs,MYSQL_BOTH);
//$row=  mysql_fetch_row($rs);
//$row=  mysql_fetch_assoc($rs);
//print_r($row);
//$row=  mysql_fetch_object($rs);
//echo $row->empno."--".$row->ename."--".$row->sal;
//echo "<table border=1 align=center width=55% style=font-family: verdana;font-size:22px>";
//echo"<caption>employee details</caption>";
//echo "<tr><th>emp no</th><th>emp name</th><th>salary</th></tr>";
@mysql_data_seek($rs,4);
while($row=  @mysql_fetch_row($rs))
{
    //echo"<tr>";
    //echo"<td>".$row[0]."</td>";
    $id[]=$row[0];
     $a[]=$row[1];
     $b[]=$row[4];
     $c[]=$row[5];
     $d[]=$row[6];
     $e[]=$row[7];
     $f[]=$row[9];
     $g[]=$row[10];
     $m[]=$row[2];
     //$h[]=$row[25];
    //echo"<td>".$row[2]."</td>";
    //echo"</tr>";
}
//get the q parameter from URL
if($q || $q1 || $q2 || $q3 || $q4 || $q5 || $q6){
    if(1){
//lookup all hints from array if length of q>0
if ($q=="same" || $q1 || $q2 || $q3 || $q4 || $q5 || $q6)
  {
    $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (1)
      {
        echo "<table><tr>";
      if ($hint=="")
        {
     $hint="<table><tr><td width=150px align=center>"."<a href=othersprof.php?uid=$id[$i]>$a[$i].<br>.<img src=profpics/$id[$i]/0.jpg width=50px height=auto></a>"."<br/>"."</td><td width=50px align=center>".$b[$i]."</td><td width=100px align=center>".$c[$i]."</td><td width=150px align=center>".$d[$i]."</td><td width=150px align=center>".$e[$i]."</td><td width=70px align=center>".$f[$i]."</td><td width=70px align=center>".$g[$i]."</td><td width=150px align=center>".a."</td></tr></table>";
        }
      else
        {
        $hint=$hint." <br/> <table><tr><td width=150px align=center>"."<a href=othersprof.php?uid=$id[$i]>$a[$i].<br>.<img src=profpics/$id[$i]/0.jpg width=50px height=auto></a>"."<br/>"."</td><td width=50px align=center>".$b[$i]."</td><td width=100px align=center>".$c[$i]."</td><td width=150px align=center>".$d[$i]."</td><td width=150px align=center>".$e[$i]."</td><td width=70px align=center>".$f[$i]."</td><td width=70px align=center>".$g[$i]."</td><td width=150px align=center>". a."</td></tr></table>";
        }
        echo "</tr>";
      }
    }echo "</table>";
  }
  
// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="no matches found";
  }
else
  {
  $response=$hint;
  }
}}
//output the response
echo $response;
@mysql_free_result($rs);
mysql_close($con);
?> 
    <?php
// Fill up array with names
//session_start();
// Fill up array with names
/*@$con=  mysql_connect("localhost","root","");
//mysql_select_db('employee');
//$rs=  mysql_query("select * from emp");
    

if($q1){
if($q1=="any"){
    $x=1;
}else{
$x="gender"."="."'".$q1."'";}
$rs=  mysql_db_query("smackron","select * from user where select1='$_SESSION[select1]' && color='$_SESSION[color]' && believegod='$_SESSION[believegod]' && select2='$_SESSION[select2]' && wannabe='$_SESSION[wannabe]' && color='$_SESSION[color]' && likemost='$_SESSION[likemost]' && ifrich='$_SESSION[ifrich]' && lifewannabe='$_SESSION[lifewannabe]' && urdream='$_SESSION[urdream]' && urhobby='$_SESSION[urhobby]' && $x");
//var_dump($rs);
//echo"no of fields=".  mysql_num_fields($rs)."<br>";
//echo "no of columns=".  mysql_num_rows($rs)."<br>";
//$row=  mysql_fetch_array($rs);
//$row=  mysql_fetch_array($rs,MYSQL_NUM);
//$row=  mysql_fetch_array($rs,MYSQL_ASSOC);
//$row=  mysql_fetch_array($rs,MYSQL_BOTH);
//$row=  mysql_fetch_row($rs);
//$row=  mysql_fetch_assoc($rs);
//print_r($row);
//$row=  mysql_fetch_object($rs);
//echo $row->empno."--".$row->ename."--".$row->sal;
//echo "<table border=1 align=center width=55% style=font-family: verdana;font-size:22px>";
//echo"<caption>employee details</caption>";
//echo "<tr><th>emp no</th><th>emp name</th><th>salary</th></tr>";
@mysql_data_seek($rs,4);
while($row=  @mysql_fetch_row($rs))
{
    //echo"<tr>";
    //echo"<td>".$row[0]."</td>";
     $a[]=$row[1];
     $b[]=$row[5];
     $c[]=$row[6];
     $d[]=$row[7];
     $e[]=$row[8];
     $f[]=$row[10];
     $g[]=$row[11];
    //echo"<td>".$row[2]."</td>";
    //echo"</tr>";
}
//get the q parameter from URL


//lookup all hints from array if length of q>0
if ($q1)
  {
    $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (1)
      {
        echo "<table><tr>";
      if ($hint=="")
        {
     $hint="<table><tr><td width=150px align=center>".$a[$i]."</td><td width=50px align=center>".$b[$i]."</td><td width=100px align=center>".$c[$i]."</td><td width=150px align=center>".$d[$i]."</td><td width=150px align=center>".$e[$i]."</td><td width=70px align=center>".$f[$i]."</td><td width=70px align=center>".$g[$i]."</td><td width=150px align=center>".a."</td></tr></table>";
        }
      else
        {
        $hint=$hint." <br/> <table><tr><td width=150px align=center>".$a[$i]."</td><td width=50px align=center>".$b[$i]."</td><td width=100px align=center>".$c[$i]."</td><td width=150px align=center>".$d[$i]."</td><td width=150px align=center>".$e[$i]."</td><td width=70px align=center>".$f[$i]."</td><td width=70px align=center>".$g[$i]."</td><td width=150px align=center>". a."</td></tr></table>";
        }
        echo "</tr>";
      }
    }echo "</table>";
  }
  
// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="no matches found";
  }
else
  {
  $response=$hint;
  }
//output the response
echo $response;
@mysql_free_result($rs);
mysql_close($con);}*/
?> 
</body>
</html>
