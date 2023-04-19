<?php
error_reporting(E_ERROR | E_PARSE);
	$db_host	    = 'localhost';
	$db_user        = 'root';
	$db_password	= '';
	$db_name	    = 'cott_on';
	define('APP_URL', 'http://localhost/cott_on'); //http://cotton.svalleys.com
	$app_stage = 'Live';
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
