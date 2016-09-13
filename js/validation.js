$(document).ready(function(){ 
	$('#name').blur(validateName);
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
	} else if( namePattern.test(nameValue.value) ) {
		$('#name-error').removeClass('success').addClass('error');
		$('#name-error').html('Please enter a valid name');
		return;	
	}else{ 
		$('#name-error').removeClass('error').addClass('success');
		$('#name-error').html('Good to go!');	
	}
}