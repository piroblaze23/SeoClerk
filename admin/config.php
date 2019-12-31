<?php
	@session_start();
	error_reporting(0);
	//unset($_SESSION['admin']);
	
	/*ini_set('display_errors', 1);
	error_reporting(E_ALL);*/
	
	define('THUMB_SIZE',64);
	define('MEDIUM_SIZE',128);
	define('LARGE_SIZE',256);

	define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');

	$settings = json_decode(file_get_contents('data/settings.txt'));
    $protocol = $settings->https == 'on' ? 'https://' : 'http://';
    
    //For Local
    if (strpos($_SERVER['DOCUMENT_ROOT'], 'wamp') !== false) {
        define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/myseostore/');
        define('SITE_URL', $protocol . $_SERVER['HTTP_HOST'] . '/myseostore/');
    }
    else {
        define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
        define('SITE_URL', $protocol . $_SERVER['HTTP_HOST'] . '/');
    }

	define('ADMIN_URL', SITE_URL . 'admin/');
	
	if (!isset($_SESSION['admin']) && $_SESSION['admin'] != 'true') {
		header("Location: ".SITE_URL."admin/login.php" );
		die();
	}
	
	ob_start();
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		include 'header.php';
	}
?>