$(document).ready(function(){
	
	var ValidEmail = false;
	var ValidPassword = false;

	//validate email  
	$('#log-email').blur(function(){

		var emailValue = $(this).val();

		$('#log-email-msg').empty(); 

		if( $(this).val().length === 0 ) {
			$("#log-email-msg").removeClass("success").addClass("error").append("<p>This is required</p>"); 
			$('#log-email').removeClass('input-error').addClass('input-error');
			ValidName = false;
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
					
					$('#log-email-msg').removeClass('success').addClass('error'); 
					$('#log-email').removeClass('input-success').addClass('input-error');
					$('#log-email-msg').html('Please enter a valid email');			
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
					
					$('#log-pwd-msg').removeClass('success').addClass('error'); 
					$('#log-pwd').removeClass('input-success').addClass('input-error');
					$('#log-pwd-msg').html('Password is incorrect');			
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
		 
	} 
	});
});