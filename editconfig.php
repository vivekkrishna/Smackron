<?php

session_start();
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','smackron');

$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	
mysql_select_db(DBNAME,$conn);

/*Check for data from the browser*/

if(isset($_POST['rownum']))
{
	update_data($_POST['field'],$_POST['value'],$_POST['rownum']);
}

/*Retrieve records from db*/
function get_data()
{
	
	$sql = "select * from user where id=".$_SESSION[uid];
	
	$rs = mysql_query($sql);
	
	return $rs;
}
/*Update records in db*/
function update_data($field, $data, $rownum)
{

	
	$sql = "update user set ".$field." = '".$data."' where id = ".$rownum;
	
	mysql_query($sql) or die("Couldn't connect to db");
	
	$_SESSION[$field]=$data;
}

?>