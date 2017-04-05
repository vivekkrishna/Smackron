<?php
session_start();
@mysql_connect("localhost","root","") or die ("could not connect to mysql");
@mysql_select_db("smackron") or die ("no database");
       $query=mysql_query("select * from user where id='$_SESSION[uid]'");
    $num_rows=mysql_num_rows($query);
    if($num_rows!=0)
    {
        while ($row = mysql_fetch_assoc($query)) {$friend_array=$row['friend_array'];
        }}
            
            $friendList="";
            if($friend_array!=""){
                // ASSEMBLE FRIEND LIST AND LINKS TO VIEW UP TO 6 ON PROFILE
	$friendArray = explode(",", $friend_array);
	$friendCount = count($friendArray);
    $friendArray10 = array_slice($friendArray, 0, 10);
	
                
    $i = 0; // create a varible that will tell us how many items we looped over 
	 $friendList .= '<div class="infoBody"><table id="friendTable" align="center" cellspacing="4"></tr>'; 
    foreach ($friendArray10 as $key => $value) { 
        $i++; // increment $i by one each loop pass 
        ?>
		<!--<script type="text/javascript">
//load check.php in the <span id="online"></span> and refresh every 1 second
$(document).ready(function(){
   $("#online<?php //echo $i;?>").load('check.php?id=<?php// print"$value";?>');
   setInterval(function(){
  $("#online<?php// echo $i;?>").load('check.php?id=<?php// print"$value";?>');
   },1000);//
});
</script>--><?php
//$onoff = "<span id=online$i></span>";

//$onoff= '<span id=online$i></span>';
//echo $onoff;

			$sqlName = mysql_query("SELECT fullname, lastactivity FROM user WHERE id='$value' LIMIT 1") or die ("Sorry we had a mysql error!");
		    while ($row = mysql_fetch_array($sqlName)) { $lastactivity = $row["lastactivity"]; $friendUserName = str_replace( ' ', '', $row["fullname"] );}
			if(time() < $lastactivity+100){
                        // If username is blank use the firstname... programming changes in v1.32 call for this
                    ?><a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $friendUserName; ?>')"><?php echo $friendUserName; ?></a><br/><?php
    }}
	 
	 
	 
         }
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>