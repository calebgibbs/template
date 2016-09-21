<?php 

include("../../../config.inc.php");
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_POST['email'])) {
	
	$email = $_POST['email'];
	//Filter the username
	$email = $dbc->real_escape_string($email);

	//Prepare the Query
	$sql = "SELECT email FROM users WHERE email = '$email'";

	//Run the Query
	$result = $dbc->query($sql);

	if(!$result){
		echo "Something went wrong";
	} elseif($result->num_rows == 1){
		//Username is in use
		echo "emailSuccess";
	} else {
		
		echo "emailFail";
	} 
} 

if (isset($_POST['password'])) {
	$password = $_POST['password']; 
	$entdEmail = $_POST['entdEmail'];

	//filter email 
	$entdEmail = $dbc->real_escape_string($entdEmail); 

	$sql = "SELECT password 
			FROM users 
			Where email = '$entdEmail'"; 
	$result = $dbc->query($sql); 



	if(!$result){
		echo "Something went wrong";
	} elseif($result->num_rows == 1){
		$userData = $result->fetch_assoc(); 
		$passwordResult = password_verify( $password, $userData['password'] ); 
		if ($passwordResult == true) {
			echo "passwordSuccess";
		}
		
	} else {
		echo "passwordFail";
	}

}






