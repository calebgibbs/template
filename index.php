<?php 

session_start();

require 'vendor/autoload.php'; 
$plates = new League\Plates\Engine('app/partials'); 

require 'app/controllers/PageController.php'; 

$page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

switch ($page) {
	case 'home':
		require 'app/controllers/HomeController.php'; 
		$controller = new HomeController();
	break; 

	case 'gallery': 
		require 'app/controllers/GalleryController.php'; 
		$controller = new GalleryController();	
	break; 

	case 'contact': 
		require 'app/controllers/ContactController.php'; 
		$controller = new ContactController();
	break;
	
	default:
		echo "page not found";
	break;
} 

$controller -> buildHTML(); 








































