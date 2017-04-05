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