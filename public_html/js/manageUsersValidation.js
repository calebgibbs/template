$(document).ready(function(){
	var adminPwdPriv = false; 
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
					$('.changePrive-msg').html('password is correct'); 
					adminPwdPriv = true; 
					return;	
				} else {	 	 
					$('.admin-pwd').removeClass('input-success').addClass('input-error');
					adminPwdPriv = false; 
					return;			
				}
			}, 
			error:function(){ 
				console.log('cannot connect to server');
				adminPwdPriv = false; 
				return;
			}
		}); 
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
})