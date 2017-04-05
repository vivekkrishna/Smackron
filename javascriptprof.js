

$(document).ready(function(){	
	
	$.post("wallprof.php", {

	}, function(response){
		
		$('#loadpage').html(response).fadeIn(500);
	});
 	
	$('#uploadMedia').click(function(){
		
		$('#show_img_upload_div').show();
		$('.main_bar').hide();
									  
	});								  
});	