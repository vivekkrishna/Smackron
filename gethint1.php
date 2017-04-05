<html>
    <head>
        <script type="text/javascript">
    
    
    </script>
    </head>
<?php
session_start();
$q11=$_GET["q11"];
$q12=$_GET["q12"];
$q13=$_GET["q13"];
$q14=$_GET["q14"];
$q15=$_GET["q15"];
$q16=$_GET["q16"];

if($q11 || $q12 || $q13 || $q14 || $q15 || $q16){
    
// Fill up array with names
@$con=  mysql_connect("localhost","root","");
//mysql_select_db('employee');
//$rs=  mysql_query("select * from emp");
$_SESSION['num']=$_SESSION['num']+1;
if($_SESSION[num]==1){
    $_SESSION['r11']=1;$_SESSION['r12']=1;$_SESSION['r13']=1;$_SESSION['r14']=1;$_SESSION['r15']=1;$_SESSION['r16']=1;
}
$x11=$_SESSION['r11'];$x12=$_SESSION['r12'];$x13=$_SESSION['r13'];$x14=$_SESSION['r14'];$x15=$_SESSION['r15'];$x16=$_SESSION['r16'];
$h=0;
if($q12){
    if($q12=="any"){
        $x12=1;
    }else{
        $x12="country"."="."'".$q12."'";
    } 
}
else if($q11){
    if($q11=="any"){
        $x11=1;
    }else{
        $x11="gender"."="."'".$q11."'";
    }
}
else if($q13){
    if($q13=="any"){
        $x13=1;
    }else{
        $x13="state"."="."'".$q13."'";
    }
    }
else if($q14){
    if($q14=="any"){
        $x14=1;
    }else{
        $x14="citynearby"."="."'".$q14."'";
    }
}
else if($q15){
    if($q15=="any"){
        $x15=1;
    }else{
        $x15="height"."="."'".$q15."'";
    }
}
else if($q16){
    if($q16=="any"){
        $x16=1;
    }else{
        $x16="weight"."="."'".$q16."'";
    }
}
else{
    $x1=1;$h=1;
}if($h==1){$x11=1;$x12=1;$x13=1;$x14=1;$x15=1;$x16=1;}
$x1=$x11." "."&&"." ".$x12." "."&&"." ".$x13." "."&&"." ".$x14." "."&&"." ".$x15." "."&&"." ".$x16;
$_SESSION['r11']=$x11;
$_SESSION['r12']=$x12;
$_SESSION['r13']=$x13;
$_SESSION['r14']=$x14;
$_SESSION['r15']=$x15;
$_SESSION['r16']=$x16;


$rs1=  mysql_db_query("smackron","select * from user where select1='$_SESSION[optselect1]' && color='$_SESSION[optcolor]' && believegod='$_SESSION[optbelievegod]' && select2='$_SESSION[optselect2]' && wannabe='$_SESSION[optwannabe]' && likemost='$_SESSION[optlikemost]' && ifrich='$_SESSION[optifrich]' && lifewannabe='$_SESSION[optlifewannabe]' && urdream='$_SESSION[opturdream]' && urhobby='$_SESSION[opturhobby]' && $x1");
@mysql_data_seek($rs1,4);
while($row=  @mysql_fetch_row($rs1))
{
    //echo"<tr>";
    //echo"<td>".$row[0]."</td>";
     $a[]=$row[1];
     $b[]=$row[4];
     $c[]=$row[5];
     $d[]=$row[6];
     $e[]=$row[7];
     $f[]=$row[9];
     $g[]=$row[10];
    //echo"<td>".$row[2]."</td>";
    //echo"</tr>";
}
//get the q parameter from URL


//lookup all hints from array if length of q>0
if($q11 || $q12 || $q13 || $q14 || $q15 || $q16){
    //echo "<table id=headtable1><tr><th width=150px>name</th><th width=50px>gender<br/><select name=gender id=gender onchange=shortList11(this.value)><option value=any>any</option><option value=male>male</option><option value=female>female</option></select></th><th width=100px>country<br/><select name=country id=country onchange=shortList12(this.value)><option value=any>any</option><option value=india>india</option><option value=america>america</option></select></th><th width=150px>state<br/><select name=state id=state onchange=shortList13(this.value)><option value=any>any</option><option value=andhra pradesh>andhra pradesh</option><option value=florida>florida</option></select></th><th width=150px>nearbycity<br/><select name=nearbycity id=nearbycity onchange=shortList14(this.value)><option value=any>any</option><option value=tirupati>tirupati</option><option value=florida>florida</option></select></th><th width=70px>height<br/><select name=height id=height onchange=shortList15(this.value)><option value=any>any</option><option value=6.0>6.0</option></select></th><th width=70px>weight<br/><select name=weight id=weight onchange=shortList16(this.value)><option value=any>any</option><option value=70-75>70-75</option><option value=75-80>75-80</option></select></th><th width=150px>set relationship</th></tr></table>";
     $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (1)
      {
      if ($hint=="")
        {
        $hint="<table><tr><td width=150px align=center>".$a[$i]."</td><td width=50px align=center>".$b[$i]."</td><td width=100px align=center>".$c[$i]."</td><td width=150px align=center>".$d[$i]."</td><td width=150px align=center>".$e[$i]."</td><td width=70px align=center>".$f[$i]."</td><td width=70px align=center>".$g[$i]."</td><td width=150px align=center>".a."</td></tr></table>";
        }
      else
        {
        $hint=$hint." <br/> <table><tr><td width=150px align=center>".$a[$i]."</td><td width=50px align=center>".$b[$i]."</td><td width=100px align=center>".$c[$i]."</td><td width=150px align=center>".$d[$i]."</td><td width=150px align=center>".$e[$i]."</td><td width=70px align=center>".$f[$i]."</td><td width=70px align=center>".$g[$i]."</td><td width=150px align=center>". a."</td></tr></table>";
        }
      }
    }
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
@mysql_free_result($rs1);
mysql_close($con);

}
?>
        