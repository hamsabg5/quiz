<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: quiz\clear_responses.php");

	}

?>