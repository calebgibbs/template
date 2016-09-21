<?php 

class AccountController extends PageController {  

	public function __construct($dbc) {
		parent::__construct();  
		$this->mustBeLoggedIn();
		$this->dbc = $dbc; 
		if ($_SESSION['status'] == "not_active") {
			if (isset($_POST['activate'])) {
				$this->activateAccount();
			}
		}
	}


	public function buildHTML() {  
		$plates = new League\Plates\Engine('app/partials');
		echo $plates -> render('account');			
	}  

	private function activateAccount() { 

		$newPassword = $_POST['new-pwd']; 
		$confPassword = $_POST['conf-pwd']; 
		$id = $_SESSION['id']; 

		$sql = "SELECT id, password, status 
				FROM users 
				WHERE id = $id"; 
		$result = $this->dbc->query($sql);   

		$totalErrors = 0; 

		if (strlen($newPassword) < 8) {
			$totalErrors++;
		}elseif ($newPassword != $confPassword) {
			$totalErrors++;
		} elseif ($confPassword == "12345678") {
			$totalErrors++;
		} 

		if ($totalErrors == 0) {
			$hash = password_hash($confPassword, PASSWORD_BCRYPT);  
			$sql = "UPDATE users 
					SET password = '$hash', 
						status = 'active'
					WHERE id = $id"; 
			$this->dbc->query( $sql ); 

			$_SESSION['password'] = $hash; 
			$_SESSION['status'] = "active";
		}

	}



}