<?php 

class SettingsController extends PageController {  

	public function __construct($dbc) {
		parent::__construct();  

		$this->dbc = $dbc;

		if (!isset($_SESSION['id'])) {
			
			if (isset($_POST['login'])) {
				$this->processLogin();
			}

		}
		

	}

	public function buildHTML() {  
		$plates = new League\Plates\Engine('app/partials');
		if (isset($_SESSION['id'])) {
			echo $plates -> render('settings');
		} else {
			header('Location: index.php');
		}		
	} 

	private function processLogin() { 

		$fileredEmail = $this->dbc->real_escape_string( $_POST['login-email'] ); 
			 
			$sql = "SELECT id, password 
					FROM users
					WHERE 
						email = '$fileredEmail'"; 
			 
			$result = $this->dbc->query($sql); 

		if( $result->num_rows == 1 ) {
			$userData = $result->fetch_assoc();  
			$passwordResult = password_verify( $_POST['log-password'], $userData['password'] ); 
				 
			if($passwordResult == true) { 
					
			$_SESSION['id'] = $userData['id']; 
			$_SESSION['email'] = $userData['email']; 

			header('Location: index.php');

			} 
		}


	} 
}