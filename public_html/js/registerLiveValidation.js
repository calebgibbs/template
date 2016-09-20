$(document).ready(function(){
	
	var validName = false;
	var validEmail = false; 
	var validConfirmEmail = false; 
	var validPrivilege = false; 

	$('#reg-name').blur(function(){
		var nameValue = $(this).val();
		$('#reg-name-msg').empty(); 

		if(nameValue.length === 0){ 
			$('#reg-name-msg').removeClass('success').addClass('Error'); 
			$('#reg-name').removeClass('input-success').addClass('input-error'); 
			$('#reg-name-msg').html('This Feild is Required'); 
			validName = false; 
			return;
		}else if (!nameValue.match(namePattern)){
			$('#reg-name-msg').removeClass('success').addClass('Error'); 
			$('#reg-name').removeClass('input-success').addClass('input-error'); 
			$('#reg-name-msg').html('Please enter a valid name'); 
			validName = false; 
			return;	
		}else if(nameValue.length > 10){ 
			$('#reg-name-msg').removeClass('success').addClass('Error'); 
			$('#reg-name').removeClass('input-success').addClass('input-error'); 
			$('#reg-name-msg').html('Name cannot be more than 50 Characters'); 
			validName = false; 
			return;
		} else { 
			$('#reg-name').removeClass('input-error').addClass('input-success');  
			validName = true; 
			return;	
		}
	}); 

	$('#reg-email').blur(function(){
		var emailValue = $(this).val(); 
		$('#reg-email-msg').empty(); 

		if (emailValue.length === 0){
			$('#reg-email-msg').removeClass('success').addClass('error'); 
			$('#reg-email').removeClass('input-success').addClass('input-error');
			$('#reg-email-msg').html('This Feild is Required'); 
			validEmail = false; 
			return;
		} else if(!$(this).val().match(emailPattern)) { 
			$('#reg-email-msg').removeClass('success').addClass('error'); 
			$('#reg-email').removeClass('input-success').addClass('input-error');
			$('#reg-email-msg').html('Please enter a valid email address'); 
			validEmail = false; 
			return;
		} else { 
			$('#reg-email').removeClass('input-error').addClass('input-success'); 
		} 

		var dataForServer = {
			email:emailValue
		} 

		$.ajax({
			type:'post', 
			url:'app/ajax/checkEmail.php', 
			data: dataForServer, 
			success:function(dataFromServer){ 
				
				if(dataFromServer === 'inUse'){
					$('#reg-email-msg').removeClass('success').addClass('error'); 
					$('#reg-email').removeClass('input-success').addClass('input-error');
					$('#reg-email-msg').html('This email address is in use'); 
					validEmail = false; 
					return;	
				} else {	 
					validEmail = true; 
					return;			
				}
			}, 
			error:function(){ 
				console.log('cannot connect to server');
			}
		});
	}); 

	$('#conf-reg-email').blur(function(){ 
		
		var match = $('#reg-email').val();
		var confEmailValue = $(this).val(); 
		$('#conf-reg-email-msg').empty(); 

		if(confEmailValue.length === 0){ 
			$('#conf-reg-email-msg').removeClass('success').addClass('error'); 
			$('#conf-reg-email').removeClass('input-success').addClass('input-error');
			$('#conf-reg-email-msg').html('This Feild is Required'); 
			validConfirmEmail = false; 
			return;	
		}else if(!confEmailValue.match(match)){ 
			$('#conf-reg-email-msg').removeClass('success').addClass('error'); 
			$('#conf-reg-email').removeClass('input-success').addClass('input-error');
			$('#conf-reg-email-msg').html('Email feilds do not match'); 
			validConfirmEmail = false; 
			return;	
		} else { 
			$('#conf-reg-email').removeClass('input-error').addClass('input-success'); 
			validConfirmEmail = true; 
			return;	
		}
	}); 

	$('#reg-privilege').blur(function(){
		var value = $('#reg-privilege').val();  
		$('#reg-privilege-msg').empty();
		if (value == "notSelected") { 
			$('#reg-privilege-msg').removeClass('success').addClass('error'); 
			$('#reg-privilege').removeClass('input-success').addClass('input-error');
			$('#reg-privilege-msg').html('Please select a privilege for this user'); 
			validPrivilege = false; 
			return;	
		} else { 
			$('#reg-privilege').removeClass('input-error').addClass('input-success'); 
			validPrivilege = true; 
			return;
		}
	}); 

	$('#reg-btn').click(function(event){
	if ( validName === true && validEmail === true && validConfirmEmail === true && validPrivilege === true) {
		return true;
	} else {	
		event.preventDefault();  
		$('#reg-message').removeClass('success').addClass('error');
		$('#reg-message').html('You have not filled out all the feilds corectly');
	} 
	});
});