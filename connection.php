<?php


	$connection = new mysqli("182.50.133.83", "attendance_dev", "attendance@123","attendance_development", "3306");			
	if ($connection->connect_error)
	{
		die("Connection failed: " . $connection->connect_error);
		header("Location: signin.php"); // Redirecting To Home Page
	}
	
?>