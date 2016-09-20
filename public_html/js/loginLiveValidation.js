$(document).ready(function(){
	
	var ValidEmail = false;
	var ValidPassword = false;
 
	$('#log-email').blur(function(){

		var emailValue = $(this).val(); 

		var reg = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;

		$('#log-email-msg').empty(); 

		if( $(this).val().length === 0 ) {
			$("#log-email-msg").removeClass("success").addClass("error").append("<p>This is required</p>"); 
			$('#log-email').removeClass('input-error').addClass('input-error');
			ValidEmail = false;
			return;
		} else if (!$(this).val().match(emailPattern)) { 
			$("#log-email-msg").removeClass("success").addClass("error").append("<p>Email address is invalid</p>"); 
			$('#log-email').removeClass('input-error').addClass('input-error');  
			ValidEmail = false;
			return;
		}else{
			$('#log-email').removeClass('input-error').addClass('input-success');
		} 

		//prepearing ajax 
		var dataForServer = {
			email:emailValue
		} 

		$.ajax({
		
			type:'post',
			url: 'app/ajax/AjaxLoginValidation.php',
			data: dataForServer,
			success:function(dataFromServer){
				console.log(dataFromServer);
				if(dataFromServer === 'emailSuccess'){	
					$('#log-email').removeClass('input-error').addClass('input-success'); 
					ValidEmail = true; 
					return;
				} else {
					ValidEmail = false;
					return;			
				}
			},
			error: function(){
				console.log('Cannot Connect to Server');
			}
		}); 
	}); 


	$('#log-pwd').blur(function(){

		$('#log-pwd-msg').empty();

		var passwordValue = $(this).val();  
		var enterdEmailValue = $('#log-email').val();

		if( passwordValue.length === 0 ){ 
			
			$('#log-pwd-msg').removeClass('success').addClass('error'); 
			$('#log-pwd').removeClass('input-success').addClass('input-error'); 
			$('#log-pwd-msg').html('This feild is required'); 
			ValidPassword = false; 
			return;

		} else if(passwordValue.length < 8) { 
			
			$('#log-pwd').removeClass('input-success').addClass('input-error');	 
			$('#log-pwd-msg').removeClass('success').addClass('error');
			$('#log-pwd-msg').html('Password it too short');
			ValidPassword = false; 
			return;

		} else { 
			$('#log-pwd').removeClass('input-error').addClass('input-success');
		}

		//prepearing ajax 
		var dataForServer = {
			password:passwordValue, 
			entdEmail:enterdEmailValue
		} 

		$.ajax({
		
			type:'post',
			url: 'app/ajax/AjaxLoginValidation.php',
			data: dataForServer,
			success:function(dataFromServer){
				console.log(dataFromServer);
				if(dataFromServer === 'passwordSuccess'){
					ValidPassword = true; 
					return;
				} else {	 
					ValidPassword = false; 
					return;		
				}
			},
			error: function(){
				console.log('Cannot Connect to Server'); 
			}
		}); 


	}); 
	
	$('#login-btn').click(function(event){
	if ( ValidPassword === true && ValidEmail === true ) {
		return true;
	} else {	
		event.preventDefault(); 
		$('#login-message').removeClass('success').addClass('error');
		$('#login-message').html('Email address or Password is incorrect');
	} 
	});
});