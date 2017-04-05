window.onload=initall;
var xmlhttp;
function initall(){
  document.getElementById("likes").onchange = showsame;
}
function showsame(){
   var sel=this.options[this.selectedIndex].value;
   if(sel==""){
       document.getElementById("list").innerHTML="please select anything";
       return;
   }
   else if(sel=="same"){
   xmlhttp=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
mlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET","http://localhost:8082/smackron/gethint.php?q="+sel,true);
xmlhttp.send(null);
}
function statechanged(){
    //alert("Callback Method Called --"+xmlhttp.readystate);
if (xmlhttp.readyState==4)
{
//alert("Received Response--"+xmlhttp.responseText);
document.getElementById("list").innerHTML=xmlhttp.responseText;
}
}
}