$(document).ready(function(){
	var adminPwdPriv = false;  
	var deleteAccount = false;
	$('.admin-pwd').blur(function(){
		var admPwdValue = $(this).val();  
		$('.changePrive-msg').empty();

		if (admPwdValue.length === 0) {
			$('.changePrive-msg').removeClass('sucess').addClass('error'); 
			$('.admin-pwd').removeClass('input-success').addClass('input-error');
			$('.changePrive-msg').html('This feild is required'); 
			adminPwdPriv = false; 
			return;
		} else { 
			$('.admin-pwd').removeClass('input-error').addClass('input-success');	
		} 

		var dataForServer = {
			password:admPwdValue
		} 

		$.ajax({
			type:'post', 
			url:'app/ajax/checkPassword.php', 
			data: dataForServer, 
			success:function(dataFromServer){ 
				
				if(dataFromServer === 'success'){	
					$('.changePrive-msg').removeClass('error').addClass('success'); 
					$('.admin-pwd').removeClass('input-error').addClass('input-success'); 
					adminPwdPriv = true; 
					return;	
				} else {	 	 
					$('.admin-pwd').removeClass('input-success').addClass('input-error');
					adminPwdPriv = false; 
					return;			
				}
			}, 
			error:function(){ 
				adminPwdPriv = false; 
				return;
			}
		}); 
	}); 


	$('.deleteOption').blur(function(){
		$('.delete-message').empty();   
		var delValue = $(this).val();
		if(delValue == "no") { 
			$('.delete-message').removeClass('success').addClass('error'); 
			$('.delete-message').html('<p>You have chosen to not delete this account</p>'); 
			$('.deleteOption').removeClass('input-success').addClass('input-error');
			deleteAccount = false; 
			return;
		} else {
			$('.deleteOption').removeClass('input-error').addClass('input-success');	 
			deleteAccount = true; 
			return;
		}

	});

	$('.changePrivilegeBtn').click(function(event){
		if ( adminPwdPriv === true ) {
			return true;
		} else { 
			event.preventDefault(); 
			$('.changePrive-msg').removeClass('success').addClass('error');
			$('.changePrive-msg').html('password is not correct');
		}
	}); 

	$('.delete-button').click(function(event){
		if ( adminPwdPriv === true && deleteAccount === true ) {
			return true;
		} else { 
			event.preventDefault(); 
			$('.del-frm-msg').removeClass('success').addClass('error');
			$('.del-frm-msg').html('You have not filled out the from correctly');
		}
	});
})