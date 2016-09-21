<?php 

class SettingsController extends PageController {  

	public function __construct($dbc) {
		parent::__construct();  
		$this->mustBeLoggedIn(); 
		$this->protectedPage();
		$this->dbc = $dbc;
		
		if (isset($_POST['register'])) {
			$this->registerAccount();
		}

		if (!isset($_SESSION['id'])) {	
			if (isset($_POST['login'])) {
				$this->processLogin();
			}
		}
	}

	public function buildHTML() {  
		$allData = $this->getAllUsers(); 
		$data = []; 
		$data['allUsers'] = $allData;
		$plates = new League\Plates\Engine('app/partials');
		if (isset($_SESSION['id'])) {
			echo $plates -> render('settings', $data);
		} else {
			header('Location: index.php');
		}		
	} 

	private function processLogin() { 

		$fileredEmail = $this->dbc->real_escape_string( $_POST['login-email'] ); 
			 
			$sql = "SELECT id, password, privilege, name, status
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
			$_SESSION['privilege'] = $userData['privilege']; 
			$_SESSION['name'] = $userData['name']; 
			$_SESSION['status'] = $userData['status']; 

			header('Location: index.php?page=settings'); 

			if ($_SESSION['status'] == 'active') {
				header('Location: index.php?page=settings');
			}else{ 
				header('Location: index.php?page=account');
			}

			} 
		}


	}   

	private function getAllUsers() { 
		$sql = "SELECT id, email, privilege, name, status 
				FROM users"; 
		$result = $this->dbc->query($sql);  
		$allData = $result->fetch_all(MYSQLI_ASSOC);  
		return $allData;
	} 

	private function registerAccount() { 
		$name = ucfirst($_POST['reg-name']);  
		$email = $_POST['conf-reg-email']; 
		$privilege = $_POST['reg-privilege'];  

		$fileredEmail = $this->dbc->real_escape_string( $email ); 
		$filteredName = $this->dbc->real_escape_string( $name );

		$password = "12345678";   

		$hash = password_hash($password, PASSWORD_BCRYPT); 

		$sql = "INSERT INTO users (privilege, name, email, password)
				VALUES ('$privilege', '$name', '$email', '$hash')"; 
		$this->dbc->query($sql); 

		header('Location: index.php?page=settings'); 
		die();

		

	} 

}