$(function() {
	
	
	$('#newMessageSend').click(function() {
		var toe_id = $("#toowhom").html();
		var message = $("#newMessageContent").val();
		//alert(message);
		if (message == "" || message == "Enter your message here") {
			return false;
		}
		
		var dataString = 'toe_id=' + toe_id + '&message=' + message;
                alert(datastring);
		/*var urls = ["http://localhost:8082/smackron/send_message.php", "http://localhost:8082/smackron/display_messages.php"]

$.each(urls, function(index, value) {
   $.ajax({
      type: "POST",
      data: dataString,
      //dataType: "json",
      url: value + get_back + "",
      success: function() {
				document.newMessage.newMessageContent.value = "";
			}
   });
});*/
		$.ajax({
			type: "POST",
			url: "display_messages.php",
                        
			data: dataString,
			success: function() {
				document.newMessage.newMessageContent.value = "";
			}
		});
                	
	});
});