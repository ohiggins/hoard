<?php
	
	$database_host = 'localhost';
	$database_user = 'root';
	$database_pass = 'root';
	$database_name = 'hoard';
	
	$mysqli = new mysqli('localhost', 'root', 'root', 'hoard');
	
	if($mysqli->connect_errno > 0){
   		die('Unable to connect to database [' . $mysqli->connect_error . ']');
	}
	
	// Base URL must begin with HTTP and NOT have a trailing slash (eg. 'https://example.com')
	$baseurl = 'http://hoard.localhost:8888';
	
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
?>