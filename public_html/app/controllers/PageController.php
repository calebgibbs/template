<?php

abstract class PageController {

	protected $title;
	protected $metaDesc;
	protected $dbc;
	protected $plates;
	protected $data = [];

	public function __construct() {
		$this->plates = new League\Plates\Engine('app/partials');
	}

	
	abstract public function buildHTML();

	public function mustBeLoggedIn() {

		if( !isset($_SESSION['id']) ) {
			header('Location: index.php?page=login');
		}

	}

	public function mustBeLoggedOut() {
		
		if( isset($_SESSION['id']) ) {
			header('Location: index.php?page=logout');
			die();
		}

	} 

	public function mustBeAdmin() { 

		if($_SESSION['privilege'] != 'admin') { 
			header('Location: index.php?page=error404');
		}
	}  

	public function protectedPage() { 
		if (isset($_SESSION['id'])) {
			if ($_SESSION['status'] == "not_active") {
				header('Location: index.php?page=account');
			}
		}
	}
}