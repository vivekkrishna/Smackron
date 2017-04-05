<?php

// change this to your path
$path = 'http://localhost/99points/wall/';

if(!function_exists('getUserImg')) {

		function getUserImg($user_id = ''){
		
			$username_get = mysql_query("SELECT picture,gender from member where member_id=".$user_id." order by member_id desc limit 1");
			while ($name = @mysql_fetch_array($username_get))
			{
				$picture = $name['picture'];
				$gender = $name['gender'];
			}
			
			$imageUser = 'pics/'.$picture;
		
			if (!file_exists($imageUser) || $picture=='')  
			{
				if($gender == 'm')
				$imageUser = 'pics/no-image-m.png';
				else
				$imageUser = 'pics/no-image-f.png';
			}
			
			return  $imageUser;
		}
	}
	?>