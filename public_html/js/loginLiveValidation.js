$(document).ready(function(){
	
	var ValidEmail = false;
	var ValidPassword = false;

	//validate email  
	$('#log-email').blur(function(){

		var emailValue = $(this).val();

		$('#log-email-msg').empty(); 

		if( $(this).val().length === 0 ) {
			$("#log-email-msg").removeClass("success").addClass("error").append("<p>This is required</p>");
			ValidName = false;
			return;
		}else{
			$("#log-email-msg").removeClass("error").addClass("success").append("<p>Good to go</p>");
		} 

		//prepearing ajax 
		var dataForServer = {
			email:emailValue
		} 

		$.ajax({
		//we are sending secure data so this time we will be using post
		type:'post',
		url: 'app/controllers/AjaxLoginValidation.php',
		data: dataForServer,
		success:function(dataFromServer){
			console.log(dataFromServer);
			if(dataFromServer === 'success'){
				//The username is avaliable
				$('#username-message').removeClass('error').addClass('success');
				$('#username-message').html('This username is avaliable');
			} else {
				//The username is Unavaliable
				$('#username-message').removeClass('success').addClass('error');
				$('#username-message').html('This username is unavaliable');			
			}
		},
		error: function(){
			console.log('Cannot Connect to Server');
		}
	});


 	});
		
	
})