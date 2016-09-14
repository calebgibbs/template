$(document).ready(function(){ 
	$('#name').blur(validateName); 
	$('#phone').blur(validatePhone); 
	$('#email').blur(validateEmail) 
	$('#message').blur(validateMessage);
});  

var namePattern = new RegExp("^[a-zA-Z.' -]{2,50}$");  
var phonePattern = new RegExp("^[0-9+() ]{5,15}$"); 
var emailPattern = new RegExp("^[a-zA-Z0-9._'@]{7,50}$");

function validateName(){ 

	var nameValue = $(this).val(); 

	if( nameValue.length === 0){
		
		$('#name-error').removeClass('success').addClass('error');
		$('#name-error').html('This feild is required');
		return;

	} else if( ! namePattern.test(nameValue) ) {
		
		$('#name-error').removeClass('success').addClass('error');
		$('#name-error').html('Please enter a valid name');
		return;	

	}else{ 	
		$('#name-error').html('');
		return;	
	}
} 

function validatePhone() { 

	var phoneValue = $(this).val(); 

	if( phoneValue.length === 0){
		
		$('#phone-error').removeClass('success').addClass('error');
		$('#phone-error').html('This feild is required');
		return;

	} else if( ! phonePattern.test(phoneValue) ) {
		
		$('#phone-error').removeClass('success').addClass('error');
		$('#phone-error').html('Please enter a valid phone number');
		return;	

	}else{ 	
		$('#phone-error').html('');
		return;	
	}
} 

function validateEmail() { 

	var emailValue = $(this).val(); 

	if( emailValue.length === 0){
		
		$('#email-error').removeClass('success').addClass('error');
		$('#email-error').html('This feild is required');
		return;

	} else if( ! emailPattern.test(emailValue) ) {
		
		$('#email-error').removeClass('success').addClass('error');
		$('#email-error').html('Please enter a valid email address');
		return;	

	}else{ 	
		$('#email-error').html('');
		return;	
	}
}

function validateMessage() { 

	var messageValue = $(this).val(); 

	if( messageValue.length === 0){
		
		$('#message-error').removeClass('success').addClass('error');
		$('#message-error').html('This feild is required');
		return;

	} else { 
		$('#message-error').html('');
	}
}















