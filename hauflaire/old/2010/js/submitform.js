$(document).ready(function(){
	$("#submit").click(function(){					   				   
		$(".error").hide();
		var hasError = false;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				
		var messageVal = $("#name").val();
		if(messageVal == '') {
			$("#name").after('<span class="error">Please eter your name</span>');
			hasError = true;
		}
		
		var emailFromVal = $("#emailFrom").val();
		if(emailFromVal == '') {
			$("#emailFrom").after('<span class="error">Please enter your email</span>');
			hasError = true;
		} else if(!emailReg.test(emailFromVal)) {	
			$("#emailFrom").after('<span class="error">Please enter a valid email</span>');
			hasError = true;
		}
		
		var messageVal = $("#message").val();
		if(messageVal == '') {
			$("#message").after('<span class="error">Please enter a message</span>');
			hasError = true;
		}
			
			$.post("sendEmail.php",
   				{ emailFrom: emailFromVal, name: nameVal, message: messageVal },
   					function(data){
						$("#sendEmail").slideUp("normal", function() {				   
							
							$("#sendEmail").before('<h1>Success</h1><p>Your email was sent.</p>');											
						});
   					}
				 );
		}
		
		return false;
	});						   
});