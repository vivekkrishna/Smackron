<?php
@include("dbconnect.php");
@require_once 'activityupdate.php';
?>
<?php
session_start();
if(!$_SESSION['fullname']){
    header('Location: index.php');
    //exit("do login");
}?>
<html>
    <head>
        <!--<link rel="stylesheet" type="text/css" href="home.css"/>-->
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
xmlhttp.open("GET","topsearch.php?q="+str,true);
xmlhttp.send(null);
}

function stateChanged()
{
//alert("Callback Method Called --"+xmlhttp.readystate);
if (xmlhttp.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
}
</script>
        <link rel="stylesheet" type="text/css" href="member.css"/>
        <style type="text/css">
        .interactContainers {
	padding:8px;
	background-color:#D2F0D3;
	border:#999 1px solid;
	display:none;
        
}
        </style>
        <script type="text/javascript">
                        var xmlhttp6;
    function shortList6(str6){
        //alert(str1);
            xmlhttp6=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp6.onreadystatechange=stateChanged6;
xmlhttp6.open("GET","gethint.php?q6="+str6,true);
xmlhttp6.send(null);
    }
            var xmlhttp5;
    function shortList5(str5){
        //alert(str1);
            xmlhttp5=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp5.onreadystatechange=stateChanged5;
xmlhttp5.open("GET","gethint.php?q5="+str5,true);
xmlhttp5.send(null);
    }
            var xmlhttp4;
    function shortList4(str4){
        //alert(str1);
            xmlhttp4=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp4.onreadystatechange=stateChanged4;
xmlhttp4.open("GET","gethint.php?q4="+str4,true);
xmlhttp4.send(null);
    }
            var xmlhttp3;
    function shortList3(str3){
        //alert(str1);
            xmlhttp3=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp3.onreadystatechange=stateChanged3;
xmlhttp3.open("GET","gethint.php?q3="+str3,true);
xmlhttp3.send(null);
    }
            var xmlhttp2;
    function shortList2(str2){
        //alert(str1);
            xmlhttp2=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp2.onreadystatechange=stateChanged2;
xmlhttp2.open("GET","gethint.php?q2="+str2,true);
xmlhttp2.send(null);
    }
    var xmlhttp1;
    function shortList1(str1){
        //alert(str1);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","gethint.php?q1="+str1,true);
xmlhttp1.send(null);
    }
    var xmlhttp;
function viewHint(str)
{
  if(str=="same"){
       toggleInteractContainers('headtable');
       toggleInteractContainers('same');
//alert("Function Called--"+str);
//document.getElementById("headtable").style.visibility="visible";
//document.getElementById("same").style.visibility="visible";
//document.getElementById("select").style.visibility="hidden";
xmlhttp=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp.onreadystatechange=stateChanged0;
xmlhttp.open("GET","gethint.php?q="+str,true);
xmlhttp.send(null);
}
if(str=="select"){
    toggleInteractContainers('select');
    //document.getElementById("headtable").style.visibility="hidden";
    //document.getElementById("same").style.visibility="hidden";
    //document.getElementById("select").style.visibility="visible";
    
}
}

function stateChanged0()
{
//alert("Callback Method Called --"+xmlhttp.readystate);
if (xmlhttp.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("same").innerHTML=xmlhttp.responseText;

delete xmlhttp;
xmlhttp = null;
}
}
function stateChanged1(){
    if (xmlhttp1.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("same").innerHTML=xmlhttp1.responseText;
delete xmlhttp1;
xmlhttp1 = null;
}
}
function stateChanged2(){
    if (xmlhttp2.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("same").innerHTML=xmlhttp2.responseText;
delete xmlhttp2;
xmlhttp2 = null;
}
}
function stateChanged3(){
    if (xmlhttp3.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("same").innerHTML=xmlhttp3.responseText;
delete xmlhttp3;
xmlhttp3 = null;
}
}
function stateChanged4(){
    if (xmlhttp4.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("same").innerHTML=xmlhttp4.responseText;
delete xmlhttp4;
xmlhttp4 = null;
}
}
function stateChanged5(){
    if (xmlhttp5.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("same").innerHTML=xmlhttp5.responseText;
delete xmlhttp5;
xmlhttp5 = null;
}
}
function stateChanged6(){
    if (xmlhttp6.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("same").innerHTML=xmlhttp6.responseText;
delete xmlhttp6;
xmlhttp6 = null;
}
}
function toggleInteractContainers(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).slideDown(200);
		} else {
			$('#'+x).hide();
		}
		$('.interactContainers').hide();
}
</script>
<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
    </head>
    <body class="member"><div id="zero">
          <!--<a href="logout.php">logout</a>-->
        <div id="one">
          <a href="logout.php"><img src="images/smackronfinal.jpg" width="100" height="50" margin="5px" align="right"/></a>  
<!--<span class="search">-->
 <!--</span>-->
 <span>
<ul id="sddm" class="current-menu-item">
	<li><a href="home.php">Home</a>
	</li>
	<li><a href="profile.php">Profile</a>
	</li>
	<li><a href="planurtime.php">Timeplan</a>
	</li>
	<li><a href="member.php" class="member">Makefrnds</a>
	</li>
</ul></span>
 <input type="text" id="searchbar" onkeyup="showHint(this.value)"/>
 <div id="txtHint" class="interactContainers">
        </div>
        </div>
        <div id="two">
            2<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>haa
        </div>
        <div id="three">
            
            <form>
now find frnds who is having
<select name="likes" id="likes" onchange="viewHint(this.value)">
<option style="text-align:center">select</option>"
<option value="same" style="text-align:center">same likes and tastes as u</option>
<option value="select" style="text-align:center">u select ur frnd's likes and tastes</option>
</select><br/>


<table class="interactContainers" id="headtable"style="background-color: #FFF;height: auto;overflow: auto;">
        <tr>
            <th width="150px">name</th>
            <th width="50px">gender<br/>
                <select name="gender" id="gender" onchange="shortList1(this.value)">
                    <option value="any">any</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </th>
            <th width="100px">country<br/>
                <select name="country" id="country" onchange="shortList2(this.value)">
                    <option value="any">any</option>
                    <option value="india">india</option>
                    <option value="america">america</option>
                </select></th>
            <th width="150px">state<br/>
                <select name="state" id="state" onchange="shortList3(this.value)">
                    <option value="any" style="text-align:center">any</option>
                    <option value="andhra pradesh">andhra pradesh</option>
                    <option value="florida">florida</option>
                </select></th>
            <th width="150px">nearbycity<br/>
                <select name="nearbycity" id="nearbycity" onchange="shortList4(this.value)">
                    <option value="any">any</option>
                    <option value="tirupati">tirupati</option>
                    <option value="florida">florida</option>
                </select></th>
            <th width="70px">height<br/>
                <select name="height" id="height" onchange="shortList5(this.value)">
                    <option value="any">any</option>
                    <option value="6.0">6.0</option>
                </select></th>
            <th width="70px">weight<br/>
                <select name="weight" id="weight" onchange="shortList6(this.value)">
                    <option value="any">any</option>
                    <option value="70-75">70-75</option>
                    <option value="75-80">75-80</option>
                </select></th>
            <th width="150px">set relationship</th></tr></table>
<div class="interactContainers" id="same"style="background-color: #FFF;height: auto;overflow: auto;">
    
</div>
<!--<a href='gethint.php'>gethint</a><br>-->

</form>
            <div class="interactContainers" id="select" style="background-color: #FFF;height: auto;overflow: auto;">
            <form name="f_one" action="gethint2.php" method="post">
            <table>
                <tr>
                    <td colspan="3" align="center">u select ur frnds likes and interests</td>
                </tr>
                <tr>
                    <td>color u like</td>
                    <td>
                        <select name="color">
                            <option value="white">white</option>
                            <option value="black">black</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>select anyone</td>
                    <td>
                        <input type="radio" name="taste" value="sweet">sweet</input></td><td>
                        <input type="radio" name="taste" value="hot">hot</input></td><td>
                        <input type="radio" name="taste" value="both">both</input>
                    </td>
                </tr>
                <tr>
                    <td>believe in god</td>
                    <td>
                       <input type="radio" name="god" value="yes">yes</input></td><td>
                        <input type="radio" name="god" value="no">no</input> 
                    </td>
                </tr>
                <tr>
                    <td>select anyone</td>
                    <td>
                        <input type="radio" name="any" value="fruits">fruits</input></td><td>
                        <input type="radio" name="any" value="chocolates">chocolates</input></td><td>
                        <input type="radio" name="any" value="sweet">sweet</input></td><td></tr><tr><td></td><td>
                        <input type="radio" name="any" value="fastfoods">fast foods</input></td><td>
                        <input type="radio" name="any" value="ice creams">ice creams</input>
                    </td>
                </tr>
                <tr>
                    <td>u wanna be</td>
                    <td>
                        <input type="radio" name="wanna" value="simple,smart">simple n smart</input></td><td>
                        <input type="radio" name="wanna" value="stylish,rocking">stylish n rocking</input>
                    </td>
                </tr>
                <tr>
                    <td>one u like most</td>
                    <td><input type="radio" name="most" value="parent">parent</input></td>
                    <td><input type="radio" name="most" value="broorsis">brother r sister</input></td>
                    <td><input type="radio" name="most" value="friend">friend</input></td></tr><tr><td></td>
                    <td><input type="radio" name="most" value="lover">lover</input></td>
                    <td><input type="radio" name="most" value="lifepartner">life partner</input></td>
                </tr>
                <tr>
                    <td>if u r rich</td>
                    <td><input type="radio" name="rich" value="socialservice">social service</input></td>
                    <td><input type="radio" name="rich" value="enjoy self">enjoy self</input></td>
                    <td><input type="radio" name="rich" value="more rich">become more rich</input></td>
                </tr>
                <tr>
                    <td>u life wanna be</td>
                    <td><input type="radio" name="want" value="simple n happy">simple and happy</input></td>
                    <td><input type="radio" name="want" value="historical n legendary">historical and legendary</input></td>
                </tr>
                <tr>
                    <td>ur dream</td>
                    <td>
                        <select name="dream">
                            <option value="engineer">engineer</option>
                            <option value="business man">business man</option>
                            <option value="doctor">doctor</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ur favourite hobby</td>
                    <td>
                        <select name="hobby">
                            <option value="singing">singing</option>
                            <option value="dancing">dancing</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <!--<td colspan="3"align="center">
                        <input type="button" value="click" name="click" onclick="Ajax.init('f_one','http://localhost:8082/smackron/gethint1.php')" />
                    </td>-->
                    <td colspan="3" align="center"><input type="submit" value="submit"></td>
                </tr>
            </table>
        </form>
            <!--<script>
            var Ajax = {
                
                url: null,
                content: null,
                name: null,
                init: function(name,url){
                    var form= null;
                    if(form = document[name]){
                        
                        var ele=form.elements;
                        var content= "";
                        var flag= false;
                        for(var i=ele.length-1; i>=0 ;i--){
                            if(flag){
                                content+= "&";
                            }
                            if(ele[i].type==="checkbox" || ele[i].type==="radio"){
                                if(ele[i].checked){
                                    content+= ele[i].name + "=" + ele[i].value;
                                    flag= true;
                                }
                            }
                            else{
                                content+= ele[i].name + "=" + ele[i].value;
                                    flag= true;
                            }
                        }
                        Ajax.content= content;
                        Ajax.url= url;
                        Ajax.sendForm();
                        Ajax.name= name;
                    }
                    else{
                        alert("can't find the form with name "+name+"");
                    }
                },
                sendForm: function(){
                    if(this.content){
                        var xmlhttp= null;
                        try{
                            xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                        }catch(e){
                            try{
                                xmlhttp= new XMLHttpRequest;
                            }catch(e){
                                alert("no support for ajax");
                            }
                        }
                        if(xmlhttp){
                            xmlhttp.open("GET", this.url+"?"+this.content, true);
                            xmlhttp.onreadystatechange= function(){
                                if(xmlhttp.readyState== 4){                                     
                                    document.write(xmlhttp.responseText);
                                    this.content= null;
                                    this.url= null;
                                    document[this.name].parentNode.removeChild(document[this.name]);
                                }
                            }
                            xmlhttp.send(null);
                        }
                    }
                }
            }
        </script>-->
        </div>
        </div>
       <!-- <div id="four">
            4
        </div>-->
        </div>
    </body>
    
</html>