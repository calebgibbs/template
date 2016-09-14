<?php

abstract class PageController {

	protected $title;
	protected $metaDesc;
	// protected $dbc;
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
}