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
$q1=$_GET["q1"];
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
mysql_close($con);
?> 
</body>
</html>
