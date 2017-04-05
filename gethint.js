window.onload = initall;
function initall(){
    document.getElementById("gender").onchange = shortlist;
}
function shortlist(){
    if(this.value=="female"){
        var sl="$b[$i]=="+"this.value";
        alert(sl);
    }
}