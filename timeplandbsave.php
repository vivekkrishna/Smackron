<?php
// Fill up array with names
session_start();
// Fill up array with names
include("dbconnect.php");
//@$con=  mysql_connect("localhost","root","");
//mysql_select_db('employee');
//$rs=  mysql_query("select * from emp");
$sa1=$_GET["sa1"];
$sa2=$_GET["sa2"];
$sa3=$_GET["sa3"];
$sa4=$_GET["sa4"];
$sa5=$_GET["sa5"];
$sa6=$_GET["sa6"];
$sa7=$_GET["sa7"];
$sa8=$_GET["sa8"];
$sa9=$_GET["sa9"];
$sa10=$_GET["sa10"];
$sa11=$_GET["sa11"];
$sa12=$_GET["sa12"];
$sp1=$_GET["sp1"];
$sp2=$_GET["sp2"];
$sp3=$_GET["sp3"];
$sp4=$_GET["sp4"];
$sp5=$_GET["sp5"];
$sp6=$_GET["sp6"];
$sp7=$_GET["sp7"];
$sp8=$_GET["sp8"];
$sp9=$_GET["sp9"];
$sp10=$_GET["sp10"];
$sp11=$_GET["sp11"];
$sp12=$_GET["sp12"];
$ma1=$_GET["ma1"];
$ma2=$_GET["ma2"];
$ma3=$_GET["ma3"];
$ma4=$_GET["ma4"];
$ma5=$_GET["ma5"];
$ma6=$_GET["ma6"];
$ma7=$_GET["ma7"];
$ma8=$_GET["ma8"];
$ma9=$_GET["ma9"];
$ma10=$_GET["ma10"];
$ma11=$_GET["ma11"];
$ma12=$_GET["ma12"];
$mp1=$_GET["mp1"];
$mp2=$_GET["mp2"];
$mp3=$_GET["mp3"];
$mp4=$_GET["mp4"];
$mp5=$_GET["mp5"];
$mp6=$_GET["mp6"];
$mp7=$_GET["mp7"];
$mp8=$_GET["mp8"];
$mp9=$_GET["mp9"];
$mp10=$_GET["mp10"];
$mp11=$_GET["mp11"];
$mp12=$_GET["mp12"];
$ta1=$_GET["ta1"];
$ta2=$_GET["ta2"];
$ta3=$_GET["ta3"];
$ta4=$_GET["ta4"];
$ta5=$_GET["ta5"];
$ta6=$_GET["ta6"];
$ta7=$_GET["ta7"];
$ta8=$_GET["ta8"];
$ta9=$_GET["ta9"];
$ta10=$_GET["ta10"];
$ta11=$_GET["ta11"];
$ta12=$_GET["ta12"];
$tp1=$_GET["tp1"];
$tp2=$_GET["tp2"];
$tp3=$_GET["tp3"];
$tp4=$_GET["tp4"];
$tp5=$_GET["tp5"];
$tp6=$_GET["tp6"];
$tp7=$_GET["tp7"];
$tp8=$_GET["tp8"];
$tp9=$_GET["tp9"];
$tp10=$_GET["tp10"];
$tp11=$_GET["tp11"];
$tp12=$_GET["tp12"];
$wa1=$_GET["wa1"];
$wa2=$_GET["wa2"];
$wa3=$_GET["wa3"];
$wa4=$_GET["wa4"];
$wa5=$_GET["wa5"];
$wa6=$_GET["wa6"];
$wa7=$_GET["wa7"];
$wa8=$_GET["wa8"];
$wa9=$_GET["wa9"];
$wa10=$_GET["wa10"];
$wa11=$_GET["wa11"];
$wa12=$_GET["wa12"];
$wp1=$_GET["wp1"];
$wp2=$_GET["wp2"];
$wp3=$_GET["wp3"];
$wp4=$_GET["wp4"];
$wp5=$_GET["wp5"];
$wp6=$_GET["wp6"];
$wp7=$_GET["wp7"];
$wp8=$_GET["wp8"];
$wp9=$_GET["wp9"];
$wp10=$_GET["wp10"];
$wp11=$_GET["wp11"];
$wp12=$_GET["wp12"];
$tha1=$_GET["tha1"];
$tha2=$_GET["tha2"];
$tha3=$_GET["tha3"];
$tha4=$_GET["tha4"];
$tha5=$_GET["tha5"];
$tha6=$_GET["tha6"];
$tha7=$_GET["tha7"];
$tha8=$_GET["tha8"];
$tha9=$_GET["tha9"];
$tha10=$_GET["tha10"];
$tha11=$_GET["tha11"];
$tha12=$_GET["tha12"];
$thp1=$_GET["thp1"];
$thp2=$_GET["thp2"];
$thp3=$_GET["thp3"];
$thp4=$_GET["thp4"];
$thp5=$_GET["thp5"];
$thp6=$_GET["thp6"];
$thp7=$_GET["thp7"];
$thp8=$_GET["thp8"];
$thp9=$_GET["thp9"];
$thp10=$_GET["thp10"];
$thp11=$_GET["thp11"];
$thp12=$_GET["thp12"];
$fa1=$_GET["fa1"];
$fa2=$_GET["fa2"];
$fa3=$_GET["fa3"];
$fa4=$_GET["fa4"];
$fa5=$_GET["fa5"];
$fa6=$_GET["fa6"];
$fa7=$_GET["fa7"];
$fa8=$_GET["fa8"];
$fa9=$_GET["fa9"];
$fa10=$_GET["fa10"];
$fa11=$_GET["fa11"];
$fa12=$_GET["fa12"];
$fp1=$_GET["fp1"];
$fp2=$_GET["fp2"];
$fp3=$_GET["fp3"];
$fp4=$_GET["fp4"];
$fp5=$_GET["fp5"];
$fp6=$_GET["fp6"];
$fp7=$_GET["fp7"];
$fp8=$_GET["fp8"];
$fp9=$_GET["fp9"];
$fp10=$_GET["fp10"];
$fp11=$_GET["fp11"];
$fp12=$_GET["fp12"];
$saa1=$_GET["saa1"];
$saa2=$_GET["saa2"];
$saa3=$_GET["saa3"];
$saa4=$_GET["saa4"];
$saa5=$_GET["saa5"];
$saa6=$_GET["saa6"];
$saa7=$_GET["saa7"];
$saa8=$_GET["saa8"];
$saa9=$_GET["saa9"];
$saa10=$_GET["saa10"];
$saa11=$_GET["saa11"];
$saa12=$_GET["saa12"];
$sap1=$_GET["sap1"];
$sap2=$_GET["sap2"];
$sap3=$_GET["sap3"];
$sap4=$_GET["sap4"];
$sap5=$_GET["sap5"];
$sap6=$_GET["sap6"];
$sap7=$_GET["sap7"];
$sap8=$_GET["sap8"];
$sap9=$_GET["sap9"];
$sap10=$_GET["sap10"];
$sap11=$_GET["sap11"];
$sap12=$_GET["sap12"];
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
	
    if($sa1 || $sa1=="0"){$s[0]=$sa1;}
        else if($sa2 || $sa2=="0"){$s[1]=$sa2;}
        else if($sa3 || $sa3=="0"){$s[2]=$sa3;}
        else if($sa4 || $sa4=="0"){$s[3]=$sa4;}
        else if($sa5 || $sa5=="0"){$s[4]=$sa5;}
        else if($sa6 || $sa6=="0"){$s[5]=$sa6;}
        else if($sa7 || $sa7=="0"){$s[6]=$sa7;}
        else if($sa8 || $sa8=="0"){$s[7]=$sa8;}
        else if($sa9 || $sa9=="0"){$s[8]=$sa9;}
        else if($sa10 || $sa10=="0"){$s[9]=$sa10;}
        else if($sa11 || $sa11=="0"){$s[10]=$sa11;}
        else if($sa12 || $sa12=="0"){$s[11]=$sa12;}
        else if($sp1 || $sp1=="0"){$s[12]=$sp1;}
        else if($sp2 || $sp2=="0"){$s[13]=$sp2;}
        else if($sp3 || $sp3=="0"){$s[14]=$sp3;}
        else if($sp4 || $sp4=="0"){$s[15]=$sp4;}
        else if($sp5 || $sp5=="0"){$s[16]=$sp5;}
        else if($sp6 || $sp6=="0"){$s[17]=$sp6;}
        else if($sp7 || $sp7=="0"){$s[18]=$sp7;}
        else if($sp8 || $sp8=="0"){$s[19]=$sp8;}
        else if($sp9 || $sp9=="0"){$s[20]=$sp9;}
        else if($sp10 || $sp10=="0"){$s[21]=$sp10;}
        else if($sp11 || $sp11=="0"){$s[22]=$sp11;}
        else if($sp12 || $sp12=="0"){$s[23]=$sp12;}
        else if($ma1 || $ma1=="0"){$m[0]=$ma1;}
        else if($ma2 || $ma2=="0"){$m[1]=$ma2;}
        else if($ma3 || $ma3=="0"){$m[2]=$ma3;}
        else if($ma4 || $ma4=="0"){$m[3]=$ma4;}
        else if($ma5 || $ma5=="0"){$m[4]=$ma5;}
        else if($ma6 || $ma6=="0"){$m[5]=$ma6;}
        else if($ma7 || $ma7=="0"){$m[6]=$ma7;}
        else if($ma8 || $ma8=="0"){$m[7]=$ma8;}
        else if($ma9 || $ma9=="0"){$m[8]=$ma9;}
        else if($ma10 || $ma10=="0"){$m[9]=$ma10;}
        else if($ma11 || $ma11=="0"){$m[10]=$ma11;}
        else if($ma12 || $ma12=="0"){$m[11]=$ma12;}
        else if($mp1 || $mp1=="0"){$m[12]=$mp1;}
        else if($mp2 || $mp2=="0"){$m[13]=$mp2;}
        else if($mp3 || $mp3=="0"){$m[14]=$mp3;}
        else if($mp4 || $mp4=="0"){$m[15]=$mp4;}
        else if($mp5 || $mp5=="0"){$m[16]=$mp5;}
        else if($mp6 || $mp6=="0"){$m[17]=$mp6;}
        else if($mp7 || $mp7=="0"){$m[18]=$mp7;}
        else if($mp8 || $mp8=="0"){$m[19]=$mp8;}
        else if($mp9 || $mp9=="0"){$m[20]=$mp9;}
        else if($mp10 || $mp10=="0"){$m[21]=$mp10;}
        else if($mp11 || $mp11=="0"){$m[22]=$mp11;}
        else if($mp12 || $mp12=="0"){$m[23]=$mp12;}
        else if($ta1 || $ta1=="0"){$t[0]=$ta1;}
        else if($ta2 || $ta2=="0"){$t[1]=$ta2;}
        else if($ta3 || $ta3=="0"){$t[2]=$ta3;}
        else if($ta4 || $ta4=="0"){$t[3]=$ta4;}
        else if($ta5 || $ta5=="0"){$t[4]=$ta5;}
        else if($ta6 || $ta6=="0"){$t[5]=$ta6;}
        else if($ta7 || $ta7=="0"){$t[6]=$ta7;}
        else if($ta8 || $ta8=="0"){$t[7]=$ta8;}
        else if($ta9 || $ta9=="0"){$t[8]=$ta9;}
        else if($ta10 || $ta10=="0"){$t[9]=$ta10;}
        else if($ta11 || $ta11=="0"){$t[10]=$ta11;}
        else if($ta12 || $ta12=="0"){$t[11]=$ta12;}
        else if($tp1 || $tp1=="0"){$t[12]=$tp1;}
        else if($tp2 || $tp2=="0"){$t[13]=$tp2;}
        else if($tp3 || $tp3=="0"){$t[14]=$tp3;}
        else if($tp4 || $tp4=="0"){$t[15]=$tp4;}
        else if($tp5 || $tp5=="0"){$t[16]=$tp5;}
        else if($tp6 || $tp6=="0"){$t[17]=$tp6;}
        else if($tp7 || $tp7=="0"){$t[18]=$tp7;}
        else if($tp8 || $tp8=="0"){$t[19]=$tp8;}
        else if($tp9 || $tp9=="0"){$t[20]=$tp9;}
        else if($tp10 || $tp10=="0"){$t[21]=$tp10;}
        else if($tp11 || $tp11=="0"){$t[22]=$tp11;}
        else if($tp12 || $tp12=="0"){$t[23]=$tp12;}
        else if($wa1 || $wa1=="0"){$w[0]=$wa1;}
        else if($wa2 || $wa2=="0"){$w[1]=$wa2;}
        else if($wa3 || $wa3=="0"){$w[2]=$wa3;}
        else if($wa4 || $wa4=="0"){$w[3]=$wa4;}
        else if($wa5 || $wa5=="0"){$w[4]=$wa5;}
        else if($wa6 || $wa6=="0"){$w[5]=$wa6;}
        else if($wa7 || $wa7=="0"){$w[6]=$wa7;}
        else if($wa8 || $wa8=="0"){$w[7]=$wa8;}
        else if($wa9 || $wa9=="0"){$w[8]=$wa9;}
        else if($wa10 || $wa10=="0"){$w[9]=$wa10;}
        else if($wa11 || $wa11=="0"){$w[10]=$wa11;}
        else if($wa12 || $wa12=="0"){$w[11]=$wa12;}
        else if($wp1 || $wp1=="0"){$w[12]=$wp1;}
        else if($wp2 || $wp2=="0"){$w[13]=$wp2;}
        else if($wp3 || $wp3=="0"){$w[14]=$wp3;}
        else if($wp4 || $wp4=="0"){$w[15]=$wp4;}
        else if($wp5 || $wp5=="0"){$w[16]=$wp5;}
        else if($wp6 || $wp6=="0"){$w[17]=$wp6;}
        else if($wp7 || $wp7=="0"){$w[18]=$wp7;}
        else if($wp8 || $wp8=="0"){$w[19]=$wp8;}
        else if($wp9 || $wp9=="0"){$w[20]=$wp9;}
        else if($wp10 || $wp10=="0"){$w[21]=$wp10;}
        else if($wp11 || $wp11=="0"){$w[22]=$wp11;}
        else if($wp12 || $wp12=="0"){$w[23]=$wp12;}
        else if($tha1 || $tha1=="0"){$th[0]=$tha1;}
        else if($tha2 || $tha2=="0"){$th[1]=$tha2;}
        else if($tha3 || $tha3=="0"){$th[2]=$tha3;}
        else if($tha4 || $tha4=="0"){$th[3]=$tha4;}
        else if($tha5 || $tha5=="0"){$th[4]=$tha5;}
        else if($tha6 || $tha6=="0"){$th[5]=$tha6;}
        else if($tha7 || $tha7=="0"){$th[6]=$tha7;}
        else if($tha8 || $tha8=="0"){$th[7]=$tha8;}
        else if($tha9 || $tha9=="0"){$th[8]=$tha9;}
        else if($tha10 || $tha10=="0"){$th[9]=$tha10;}
        else if($tha11 || $tha11=="0"){$th[10]=$tha11;}
        else if($tha12 || $tha12=="0"){$th[11]=$tha12;}
        else if($thp1 || $thp1=="0"){$th[12]=$thp1;}
        else if($thp2 || $thp2=="0"){$th[13]=$thp2;}
        else if($thp3 || $thp3=="0"){$th[14]=$thp3;}
        else if($thp4 || $thp4=="0"){$th[15]=$thp4;}
        else if($thp5 || $thp5=="0"){$th[16]=$thp5;}
        else if($thp6 || $thp6=="0"){$th[17]=$thp6;}
        else if($thp7 || $thp7=="0"){$th[18]=$thp7;}
        else if($thp8 || $thp8=="0"){$th[19]=$thp8;}
        else if($thp9 || $thp9=="0"){$th[20]=$thp9;}
        else if($thp10 || $thp10=="0"){$th[21]=$thp10;}
        else if($thp11 || $thp11=="0"){$th[22]=$thp11;}
        else if($thp12 || $thp12=="0"){$th[23]=$thp12;}
        else if($fa1 || $fa1=="0"){$f[0]=$fa1;}
        else if($fa2 || $fa2=="0"){$f[1]=$fa2;}
        else if($fa3 || $fa3=="0"){$f[2]=$fa3;}
        else if($fa4 || $fa4=="0"){$f[3]=$fa4;}
        else if($fa5 || $fa5=="0"){$f[4]=$fa5;}
        else if($fa6 || $fa6=="0"){$f[5]=$fa6;}
        else if($fa7 || $fa7=="0"){$f[6]=$fa7;}
        else if($fa8 || $fa8=="0"){$f[7]=$fa8;}
        else if($fa9 || $fa9=="0"){$f[8]=$fa9;}
        else if($fa10 || $fa10=="0"){$f[9]=$fa10;}
        else if($fa11 || $fa11=="0"){$f[10]=$fa11;}
        else if($fa12 || $fa12=="0"){$f[11]=$fa12;}
        else if($fp1 || $fp1=="0"){$f[12]=$fp1;}
        else if($fp2 || $fp2=="0"){$f[13]=$fp2;}
        else if($fp3 || $fp3=="0"){$f[14]=$fp3;}
        else if($fp4 || $fp4=="0"){$f[15]=$fp4;}
        else if($fp5 || $fp5=="0"){$f[16]=$fp5;}
        else if($fp6 || $fp6=="0"){$f[17]=$fp6;}
        else if($fp7 || $fp7=="0"){$f[18]=$fp7;}
        else if($fp8 || $fp8=="0"){$f[19]=$fp8;}
        else if($fp9 || $fp9=="0"){$f[20]=$fp9;}
        else if($fp10 || $fp10=="0"){$f[21]=$fp10;}
        else if($fp11 || $fp11=="0"){$f[22]=$fp11;}
        else if($fp12 || $fp12=="0"){$f[23]=$fp12;}
        else if($saa1 || $saa1=="0"){$sa[0]=$saa1;}
        else if($saa2 || $saa2=="0"){$sa[1]=$saa2;}
        else if($saa3 || $saa3=="0"){$sa[2]=$saa3;}
        else if($saa4 || $saa4=="0"){$sa[3]=$saa4;}
        else if($saa5 || $saa5=="0"){$sa[4]=$saa5;}
        else if($saa6 || $saa6=="0"){$sa[5]=$saa6;}
        else if($saa7 || $saa7=="0"){$sa[6]=$saa7;}
        else if($saa8 || $saa8=="0"){$sa[7]=$saa8;}
        else if($saa9 || $saa9=="0"){$sa[8]=$saa9;}
        else if($saa10 || $saa10=="0"){$sa[9]=$saa10;}
        else if($saa11 || $saa11=="0"){$sa[10]=$saa11;}
        else if($saa12 || $saa12=="0"){$sa[11]=$saa12;}
        else if($sap1 || $sap1=="0"){$sa[12]=$sap1;}
        else if($sap2 || $sap2=="0"){$sa[13]=$sap2;}
        else if($sap3 || $sap3=="0"){$sa[14]=$sap3;}
        else if($sap4 || $sap4=="0"){$sa[15]=$sap4;}
        else if($sap5 || $sap5=="0"){$sa[16]=$sap5;}
        else if($sap6 || $sap6=="0"){$sa[17]=$sap6;}
        else if($sap7 || $sap7=="0"){$sa[18]=$sap7;}
        else if($sap8 || $sap8=="0"){$sa[19]=$sap8;}
        else if($sap9 || $sap9=="0"){$sa[20]=$sap9;}
        else if($sap10 || $sap10=="0"){$sa[21]=$sap10;}
        else if($sap11 || $sap11=="0"){$sa[22]=$sap11;}
        else if($sap12 || $sap12=="0"){$sa[23]=$sap12;}
//        else if($sa1=="0"){$s[0]=$sa1;}
           $s=$s[0].",".$s[1].",".$s[2].",".$s[3].",".$s[4].",".$s[5].",".$s[6].",".$s[7].",".$s[8].",".$s[9].",".$s[10]
        .",".$s[11].",".$s[12].",".$s[13].",".$s[14].",".$s[15].",".$s[16].",".$s[17].",".$s[18].",".$s[19].",".$s[20].",".$s[21].",".$s[22]
        .",".$s[23];
           $m=$m[0].",".$m[1].",".$m[2].",".$m[3].",".$m[4].",".$m[5].",".$m[6].",".$m[7].",".$m[8].",".$m[9].",".$m[10]
        .",".$m[11].",".$m[12].",".$m[13].",".$m[14].",".$m[15].",".$m[16].",".$m[17].",".$m[18].",".$m[19].",".$m[20].",".$m[21].",".$m[22]
        .",".$m[23];
           $t=$t[0].",".$t[1].",".$t[2].",".$t[3].",".$t[4].",".$t[5].",".$t[6].",".$t[7].",".$t[8].",".$t[9].",".$t[10]
        .",".$t[11].",".$t[12].",".$t[13].",".$t[14].",".$t[15].",".$t[16].",".$t[17].",".$t[18].",".$t[19].",".$t[20].",".$t[21].",".$t[22]
        .",".$t[23];
           $w=$w[0].",".$w[1].",".$w[2].",".$w[3].",".$w[4].",".$w[5].",".$w[6].",".$w[7].",".$w[8].",".$w[9].",".$w[10]
        .",".$w[11].",".$w[12].",".$w[13].",".$w[14].",".$w[15].",".$w[16].",".$w[17].",".$w[18].",".$w[19].",".$w[20].",".$w[21].",".$w[22]
        .",".$w[23];
           $th=$th[0].",".$th[1].",".$th[2].",".$th[3].",".$th[4].",".$th[5].",".$th[6].",".$th[7].",".$th[8].",".$th[9].",".$th[10]
        .",".$th[11].",".$th[12].",".$th[13].",".$th[14].",".$th[15].",".$th[16].",".$th[17].",".$th[18].",".$th[19].",".$th[20].",".$th[21].",".$th[22]
        .",".$th[23];
           $f=$f[0].",".$f[1].",".$f[2].",".$f[3].",".$f[4].",".$f[5].",".$f[6].",".$f[7].",".$f[8].",".$f[9].",".$f[10]
        .",".$f[11].",".$f[12].",".$f[13].",".$f[14].",".$f[15].",".$f[16].",".$f[17].",".$f[18].",".$f[19].",".$f[20].",".$f[21].",".$f[22]
        .",".$f[23];
           $sa=$sa[0].",".$sa[1].",".$sa[2].",".$sa[3].",".$sa[4].",".$sa[5].",".$sa[6].",".$sa[7].",".$sa[8].",".$sa[9].",".$sa[10]
        .",".$sa[11].",".$sa[12].",".$sa[13].",".$sa[14].",".$sa[15].",".$sa[16].",".$sa[17].",".$sa[18].",".$sa[19].",".$sa[20].",".$sa[21].",".$sa[22]
        .",".$sa[23];
$UpdateTimeplan = mysql_query("UPDATE user SET timeplans='$s', timeplanm='$m', timeplant='$t', timeplanw='$w', timeplanth='$th', timeplanf='$f', timeplansa='$sa' WHERE id='$_SESSION[uid]'") or die (mysql_error());
           
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
?> 
