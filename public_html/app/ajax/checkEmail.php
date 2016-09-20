<?php 
include("../../../config.inc.php");
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

$email = $_POST['email']; 

$email = $dbc->real_escape_string($email); 

$sql = "SELECT email FROM users WHERE email = '$email'";

$result = $dbc->query($sql); 

if(!$result){
	echo "Something went wrong";
} elseif($result->num_rows == 1){
	//Username is in use
	echo "inUse";
} else {
	//No results
	//Username was not found
	echo "notInUse";
}















