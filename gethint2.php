<html>
    <head>
        <script type="text/javascript">
    var xmlhttp16;
    function shortList16(str16){
        //alert(str1);
        document.getElementById("result").style.visibility="hidden";
            xmlhttp16=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp16.onreadystatechange=stateChanged16;
xmlhttp16.open("GET","http://localhost:8082/smackron/gethint1.php?q16="+str16,true);
xmlhttp16.send(null);
    }
            var xmlhttp15;
    function shortList15(str15){
        //alert(str1);
        document.getElementById("result").style.visibility="hidden";
            xmlhttp15=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp15.onreadystatechange=stateChanged15;
xmlhttp15.open("GET","http://localhost:8082/smackron/gethint1.php?q15="+str15,true);
xmlhttp15.send(null);
    }
            var xmlhttp14;
    function shortList14(str14){
        //alert(str1);
        document.getElementById("result").style.visibility="hidden";
            xmlhttp14=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp14.onreadystatechange=stateChanged14;
xmlhttp14.open("GET","http://localhost:8082/smackron/gethint1.php?q14="+str14,true);
xmlhttp14.send(null);
    }
            var xmlhttp13;
    function shortList13(str13){
        //alert(str1);
        document.getElementById("result").style.visibility="hidden";
            xmlhttp13=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp13.onreadystatechange=stateChanged13;
xmlhttp13.open("GET","http://localhost:8082/smackron/gethint1.php?q13="+str13,true);
xmlhttp13.send(null);
    }
            var xmlhttp12;
    function shortList12(str12){
        //alert(str1);
        document.getElementById("result").style.visibility="hidden";
            xmlhttp12=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp12.onreadystatechange=stateChanged12;
xmlhttp12.open("GET","http://localhost:8082/smackron/gethint1.php?q12="+str12,true);
xmlhttp12.send(null);
    }
    var xmlhttp11;
    function shortList11(str11){
        //alert(str1);
        document.getElementById("result").style.visibility="hidden";
            xmlhttp11=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp11.onreadystatechange=stateChanged11;
xmlhttp11.open("GET","http://localhost:8082/smackron/gethint1.php?q11="+str11,true);
xmlhttp11.send(null);
    }
    
function stateChanged11(){
    if (xmlhttp11.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("res").innerHTML=xmlhttp11.responseText;
delete xmlhttp11;
xmlhttp11 = null;
}
}
function stateChanged12(){
    if (xmlhttp12.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("res").innerHTML=xmlhttp12.responseText;
delete xmlhttp12;
xmlhttp12 = null;
}
}
function stateChanged13(){
    if (xmlhttp13.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("res").innerHTML=xmlhttp13.responseText;
delete xmlhttp13;
xmlhttp13 = null;
}
}
function stateChanged14(){
    if (xmlhttp14.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("res").innerHTML=xmlhttp14.responseText;
delete xmlhttp14;
xmlhttp14 = null;
}
}
function stateChanged15(){
    if (xmlhttp15.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("res").innerHTML=xmlhttp15.responseText;
delete xmlhttp15;
xmlhttp15 = null;
}
}
function stateChanged16(){
    if (xmlhttp16.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("res").innerHTML=xmlhttp16.responseText;
delete xmlhttp16;
xmlhttp16 = null;
}
}
    
    </script>
    </head>
<?php
session_start();
if(isset ($_POST['color'])){
    $optcolor=$_POST['color'];
    $optselect1=$_POST['taste'];
    $optbelievegod=$_POST['god'];
    $optselect2=$_POST['any'];
    $optwannabe=$_POST['wanna'];
    $optlikemost=$_POST['most'];
    $optifrich=$_POST['rich'];
    $optlifewannabe=$_POST['want'];
    $opturdream=$_POST['dream'];
    $opturhobby=$_POST['hobby'];
    $_SESSION['optcolor']=$optcolor;
    $_SESSION['optselect1']=$optselect1;
    $_SESSION['optbelievegod']=$optbelievegod;
    $_SESSION['optselect2']=$optselect2;
    $_SESSION['optwannabe']=$optwannabe;
    $_SESSION['optlikemost']=$optlikemost;
    $_SESSION['optifrich']=$optifrich;
    $_SESSION['optlifewannabe']=$optlifewannabe;
    $_SESSION['opturdream']=$opturdream;
    $_SESSION['opturhobby']=$opturhobby;
    $_SESSION['num']=0;
// Fill up array with names
@$con=  mysql_connect("localhost","root","");
$rs2=  mysql_db_query("smackron","select * from user where select1='$optselect1' && color='$optcolor' && believegod='$optbelievegod' && select2='$optselect2' && wannabe='$optwannabe' && likemost='$optlikemost' && ifrich='$optifrich' && lifewannabe='$optlifewannabe' && urdream='$opturdream' && urhobby='$opturhobby' Limit 30");
@mysql_data_seek($rs2,4);
while($row=  mysql_fetch_row($rs2))
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
     $m[]=$row[2];
    //echo"<td>".$row[2]."</td>";
    //echo"</tr>";
}
?>
<table id="headtable1">
        <tr>
            <th width="150px">name</th>
            <th width="50px">gender<br/>
                <select name="gender" id="gender" onchange="shortList11(this.value)">
                    <option value="any">any</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </th>
            <th width="100px">country<br/>
                <select name="country" id="country" onchange="shortList12(this.value)">
                    <option value="any">any</option>
                    <option value="india">india</option>
                    <option value="america">america</option>
                </select></th>
            <th width="150px">state<br/>
                <select name="state" id="state" onchange="shortList13(this.value)">
                    <option value="any">any</option>
                    <option value="andhra pradesh">andhra pradesh</option>
                    <option value="florida">florida</option>
                </select></th>
            <th width="150px">nearbycity<br/>
                <select name="nearbycity" id="nearbycity" onchange="shortList14(this.value)">
                    <option value="any">any</option>
                    <option value="tirupati">tirupati</option>
                    <option value="florida">florida</option>
                </select></th>
            <th width="70px">height<br/>
                <select name="height" id="height" onchange="shortList15(this.value)">
                    <option value="any">any</option>
                    <option value="6.0">6.0</option>
                </select></th>
            <th width="70px">weight<br/>
                <select name="weight" id="weight" onchange="shortList16(this.value)">
                    <option value="any">any</option>
                    <option value="70-75">70-75</option>
                    <option value="75-80">75-80</option>
                </select></th>
            <th width="150px">set relationship</th></tr></table>
    
    <?php
    echo "<div id=res></div>";
    echo "<div id=result>";
    $hint="";
    for($i=0; $i<count($a); $i++)
    {
    if (1)
      {
      if ($hint=="")
        {
        $hint="<table><tr><td width=150px align=center>".$a[$i]."<br/>"."<img src=getimg1.php?mail=$m[$i] width=100px height=100px>"."</td><td width=50px align=center>".$b[$i]."</td><td width=100px align=center>".$c[$i]."</td><td width=150px align=center>".$d[$i]."</td><td width=150px align=center>".$e[$i]."</td><td width=70px align=center>".$f[$i]."</td><td width=70px align=center>".$g[$i]."</td><td width=150px align=center>".a."</td></tr></table>";
        }
      else
        {
        $hint=$hint." <br/> <table><tr><td width=150px align=center>".$a[$i]."<br/>"."<img src=getimg1.php?mail=$m[$i] width=100px height=100px>"."</td><td width=50px align=center>".$b[$i]."</td><td width=100px align=center>".$c[$i]."</td><td width=150px align=center>".$d[$i]."</td><td width=150px align=center>".$e[$i]."</td><td width=70px align=center>".$f[$i]."</td><td width=70px align=center>".$g[$i]."</td><td width=150px align=center>". a."</td></tr></table>";
        }
      }
    }
    echo $hint;
    echo "</div>";
    mysql_free_result($rs2);
mysql_close($con);
}
?>
    
</html>