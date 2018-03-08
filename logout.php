<?php 
	include 'mid.php';
	session_start();
	if (session_destroy()) {
		$owner = "";
		header("Location:Homepage.php");
	}
?>