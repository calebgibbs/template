<?php 

session_start();

require 'vendor/autoload.php'; 
$plates = new League\Plates\Engine('app/partials'); 

require '../config.inc.php';
require 'app/controllers/PageController.php'; 

$page = isset($_GET['page']) ? $_GET['page'] : 'home';  
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

switch ($page) {
	case 'home':
		require 'app/controllers/HomeController.php'; 
		$controller = new HomeController($dbc);
	break; 

	case 'gallery': 
		require 'app/controllers/GalleryController.php'; 
		$controller = new GalleryController($dbc);	
	break; 

	case 'contact': 
		require 'app/controllers/ContactController.php'; 
		$controller = new ContactController($dbc);
	break; 

	case 'settings': 
		require 'app/controllers/SettingsController.php'; 
		$controller = new SettingsController($dbc);
	break; 

	case 'logout':
		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['password']); 
		unset($_SESSION['privilege']); 
		unset($_SESSION['name']);
		header('Location: index.php');
	break;  
	
	default:
		require 'app/controllers/Error404Controller.php'; 
		$controller = new Error404Controller();
	break;
} 

$controller -> buildHTML(); 








































