<?php
	//Connect to Database
	$db_host = 'localhost';
	$db_name = 'store';
	$db_user = 'root';
	$db_pass = '';
	
	// Create mysli Object
	$mysqli = new mysqli($db_host, 	$db_user, $db_pass, $db_name);

	// Error Handler
	if(mysqli_connect_errno()){
		echo 'This Connection Failed '.mysqli_connect_error();
		die();
	}

	// if ($mysqli->connect_error) {
	//     die("Connection failed: " . $mysqli->connect_error);
	// } 
	// echo "Connected successfully";