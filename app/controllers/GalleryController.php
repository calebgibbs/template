<?php 

class GalleryController extends PageController {  

	public function __construct() {
		parent::__construct();
	}

	public function buildHTML() {  

		$plates = new League\Plates\Engine('app/partials');
		echo $plates -> render('gallery');
	}

}