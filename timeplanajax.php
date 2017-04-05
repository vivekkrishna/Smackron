
<?php
session_start();
// Fill up array with names
@$con=  mysql_connect("localhost","root","");


//get the q parameter from URL
$q=$_GET["q"];
//$x=strtolower($q);
//$field=fullname;
//$rs=  mysql_db_query("smackron","select * from user where lower($field) like '%$x%' Limit 30");
//lookup all hints from array if length of q>0
//@mysql_data_seek($rs,0);
//while($row=  @mysql_fetch_row($rs))
//{
    //echo"<tr>";
    //echo"<td>".$row[0]."</td>";
    
     //$a[]="$row[1]";
     
     //$h[]=$row[25];
    //echo"<td>".$row[2]."</td>";
    //echo"</tr>";
//}
/*if (strlen($q) > 0)
  {
  $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {
        $hint=$a[$i];
        }
      else
        {
        $hint=$hint." , ".$a[$i];
        }
      }
    }
  }*/
if (strlen($q) > 0)
  {
  $hint="";
  for($i=0; $i<count($a); $i++)
    { 
      if ($hint=="")
        {
        $hint=$a[$i];
        }
      else
        {
        $hint=$hint." <br/> ".$a[$i];
        }
    }
  }
// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?> 

