window.onload=initall;
function initall(){
    document.getElementById("month").selectedindex = 0;
    document.getElementById("month").onchange = setdays;
}
function setdays(){
    
    var monthstr=this.options[this.selectedIndex].value;
    var monthdays = new Array(0,31,28,31,30,31,30,31,31,30,31,30,31);
    if(monthstr!=""){
        var themonth=parseInt(monthstr);
        document.getElementById("day").options.length = 0;
        for(var i=0;i<monthdays[themonth];i++)
        {
           document.getElementById("day").options[i] = new Option(i+1); 
        }
        for(var j=0;j<40;j++)
    { 
        document.getElementById("year").options[j] = new Option(j+1970);
    }
    }
}
function f1(str){
    if(str=="10"){
    
    }else{
    str1=str+1;
    document.getElementById("r"+str).style.display = "none";
    document.getElementById("r"+str1).style.display = "block";
document.getElementById("r"+str1).align = "center";

}
}
