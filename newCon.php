<?php


$server = "localhost";
$login = "root";   
$pass = "";
$database = "smackron";

if(!($link=mysql_connect($server,$login,$pass)))
{
sprintf("internal error %d:%s\n", mysql_errno(),mysql_error());
}	

@mysql_select_db('smackron',$link);	

##########################
function checkValues($value)
{
//return $value;		
// Use this function on all those values where you want to check for both sql injection and cross site scripting
// Trim the value
$value = trim($value);
// Stripslashes
if (get_magic_quotes_gpc()) {
$value = stripslashes($value);
}
// Convert all &lt;, &gt; etc. to normal html and then strip these
$value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
// Strip HTML Tags
$value = strip_tags($value);

// Quote the value
$value = mysql_real_escape_string($value);
$value = htmlspecialchars ($value);
return $value;		
}	

function clickable_link($text = '')
{	
$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
$ret = ' ' . $text;
$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\" rel=\"no_follow\">\\2</a>", $ret);

$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
$ret = substr($ret, 1);
return $ret;
}
?>