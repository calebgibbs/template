<?php 
session_start();
// include("../../index.php");

include("../../../config.inc.php");
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

$password = $_POST['password']; 

$id = $_SESSION['id']; 

$sql = "SELECT password FROM users WHERE id = $id"; 

$result = $dbc->query($sql); 

if(!$result) { 
	echo "something went wrong";
} elseif($result->num_rows == 1) { 
	$userData = $result->fetch_assoc(); 
	$passwordResult = password_verify( $password, $userData['password'] ); 
	if ($passwordResult == true) {
		echo "success"; 
	}else{ 
		echo "Fail";
	}
}
