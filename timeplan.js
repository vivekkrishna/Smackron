
$(function() {
    for(var i=1;i<=12;i++){
    (function(index){
    $('#sa'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList1("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList1("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList1(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?sa"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
//    function stateChanged1(){
//    if (xmlhttp1.readyState==4)
//{
////alert("Received Response--"+xmlhttp.responseText);
//document.getElementById("two").innerHTML=xmlhttp1.responseText;
//delete xmlhttp1;
//xmlhttp1 = null;
//}
//}
for(var i=1;i<=12;i++){
    (function(index){
    $('#sp'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList2("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList2("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList2(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?sp"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
    for(var i=1;i<=12;i++){
    (function(index){
    $('#ma'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList3("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList3("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList3(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?ma"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
    for(var i=1;i<=12;i++){
    (function(index){
    $('#mp'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList4("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList4("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList4(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?mp"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#ta'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList5("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList5("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList5(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?ta"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#tp'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList6("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList6("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList6(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?tp"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#wa'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList7("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList7("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList7(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?wa"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#wp'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList8("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList8("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList8(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?wp"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#tha'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList9("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList9("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList9(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?tha"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#thp'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList10("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList10("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList10(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?thp"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#fa'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList11("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList11("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList11(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?fa"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#fp'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList12("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList12("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList12(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?fp"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#saa'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList13("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList13("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList13(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?saa"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }
for(var i=1;i<=12;i++){
    (function(index){
    $('#sap'+index).click(function(){
  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
    $(this).css("background-color", "green");
    //alert(index);
    shortList14("1",index);
  }
  else{ 
    $(this).css("background-color", "red");
    shortList14("0",index);
  }
})}(i))};

                    var xmlhttp1;
    function shortList14(str1,cell){
        //alert(cell);
            xmlhttp1=new XMLHttpRequest();
//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//xmlhttp1.onreadystatechange=stateChanged1;
xmlhttp1.open("GET","http://localhost:8082/smackron/timeplandbsave.php?sap"+cell+"="+str1,true);
xmlhttp1.send(null);
delete xmlhttp1;
xmlhttp1 = null;
    }

//for(var i=1;i<=12;i++){
//    $('#sp'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#ma'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#mp'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#ta'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#tp'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#wa'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#wp'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#tha'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#thp'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#fa'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#fp'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#saa'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};
//for(var i=1;i<=12;i++){
//    $('#sap'+i).click(function(){
//  if($(this).css("background-color") == "rgb(255, 0, 0)") { 
//    $(this).css("background-color", "green");
//  }
//  else{ 
//    $(this).css("background-color", "red");
//  }
//})};	
});