window.onload = initAll;

function initAll() {
	var allLinks = document.getElementsByTagName("a");
	
	for (var i=0; i<allLinks.length; i++) {
		if (allLinks[i].className.indexOf("menuLink") > -1) {
			allLinks[i].onclick = toggleMenu;
		}
	}
}

function toggleMenu() {
	var startMenu = this.href.lastIndexOf("/")+1;
	var stopMenu = this.href.lastIndexOf(".");
	var thisMenuName = this.href.substring(startMenu,stopMenu);

	var thisMenu = document.getElementById(thisMenuName).style;
	if (thisMenu.display == "none")  {
		thisMenu.display = "block";
	}
	else {
		thisMenu.display = "none";
	}

	return false;
}
$(document).ready(function(){
    //initial
    $("#three").html('<center><img src="images/spinner.gif" alt="Wait"/></center>');
    $('#three').load('indexhomewall.php');
    //handle menu links
    $('#two ul#menu1 li a').click(function(){
        var page = $(this).attr('href');
        $("#three").html('<center><img src="images/spinner.gif" alt="Wait"/></center>');
        $('#three').load(''+ page + '.php');
        return false;
    })
    $('#two ul#menu2 li a').click(function(){
        var page = $(this).attr('href');
        $('#three').load(''+ page + '.php');
        return false;
    })
})