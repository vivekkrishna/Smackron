<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="editstyle.css" />
<script src="js/jquery.js" type="text/javascript"></script>

<script>

	$(document).ready(function(){
									
									
									
		$('td.edit').click(function(){
							 
							   			
							            $('.ajax').html($('.ajax input').val());
							            $('.ajax').removeClass('ajax');
										
										$(this).addClass('ajax');
								  		$(this).html('<input id="editbox" size="'+$(this).text().length+'" type="text" value="' + $(this).text() + '">');
										
										$('#editbox').focus();
								        
								  }
						 
						 
						 
						 
						 );
					  
		$('td.edit').keydown(function(event){
									  
									  
									 arr = $(this).attr('class').split( " " );
									 
									 
									 if(event.which == 13)
									 { 
								  		
								  		$.ajax({    type: "POST",
											        url:"editconfig.php",
													data: "value="+$('.ajax input').val()+"&rownum="+arr[2]+"&field="+arr[1],
													success: function(data){
														 $('.ajax').html($('.ajax input').val());
							                             $('.ajax').removeClass('ajax');
													}});
									 }
								  
								  }
						 
						 
						 
						 
						 );
		
		
		$('#editbox').live('blur',function(){

									 $('.ajax').html($('.ajax input').val());
							         $('.ajax').removeClass('ajax');
									});
									
		
	
	});


</script>


</head>

<body>



<table cellpadding="5"> 

<!--<tr class="heading" bgcolor="#ccc">
	
    <th>Name</th>
    <th>Email</th>
    <th>Country</th>
    <th>state </th>
    <th>citynearby</th>
    <th>date of birth</th>
    <th>height</th>
    <th>weight</th>
    <th>occupation</th>
    <th>Marital status</th>
</tr>-->


<?php

    include('editconfig.php');
	
	$resultdata = get_data();
	
	while($rows = mysql_fetch_array($resultdata))
	{	
            echo '<tr><td class="edit fullname '.$rows["id"].'">'.$rows["fullname"].'</td></tr>';
            echo '<tr>
    	
        <td class="edit email '.$rows["id"].'">'.$rows["email"].'</td>
        <td class="edit country '.$rows["id"].'">'.$rows["country"].'</td>
            <td class="edit state '.$rows["id"].'">'.$rows["state"].'</td>
                <td class="edit citynearby '.$rows["id"].'">'.$rows["citynearby"].'</td>
                    <td class="edit dateofbirth '.$rows["id"].'">'.$rows["dateofbirth"].'</td>
                        <td class="edit height '.$rows["id"].'">'.$rows["height"].'</td>
                            <td class="edit weight '.$rows["id"].'">'.$rows["weight"].'</td>
                                <td class="edit occupation '.$rows["id"].'">'.$rows["occupation"].'</td>
                                    <td class="edit maritalstatus '.$rows["id"].'">'.$rows["maritalstatus"].'</td>
                                        
        </tr>';?>
<!--                <tr class="heading" bgcolor="#ccc">
	
    <th>Color</th>
    <th>sweet or hot</th>
    <th>Believegod</th>
    <th>fav.foodtype </th>
    <th>wannabe</th>
    <th>likemost</th>
    <th>ifrich</th>
    <th>life wanna be</th>
    <th>ur dream</th>
    <th>ur hobby</th>
</tr>-->
    <?php
                
		echo '<tr>
    	<td class="edit color '.$rows["id"].'">'.$rows["color"].'</td>
        <td class="edit select1 '.$rows["id"].'">'.$rows["select1"].'</td>
        <td class="edit believegod '.$rows["id"].'">'.$rows["believegod"].'</td>
            <td class="edit select2 '.$rows["id"].'">'.$rows["select2"].'</td>
                <td class="edit wannabe '.$rows["id"].'">'.$rows["wannabe"].'</td>
                    <td class="edit likemost '.$rows["id"].'">'.$rows["likemost"].'</td>
                        <td class="edit ifrich '.$rows["id"].'">'.$rows["ifrich"].'</td>
                            <td class="edit lifewannabe '.$rows["id"].'">'.$rows["lifewannabe"].'</td>
                                <td class="edit urdream '.$rows["id"].'">'.$rows["urdream"].'</td>
                                    <td class="edit urhobby '.$rows["id"].'">'.$rows["urhobby"].'</td>
                                        
        </tr>';
	}
?>


</table>



</body>
</html>
