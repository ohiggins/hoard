<?php
	
/*******************************
	
	Process New Label
	app/add_label_process.php
	
********************************/

require_once('login_check.php');
include('functions.php');

// Initialise current user object
$user = new User();
$user->set_id($current_user['user_id']); 

// Double check the fields have data
if (!isset($_POST['title']) || trim($_POST['title']) == '') {
	die('Oops! You forgot to enter a title.');
}

if (!isset($_POST['colour']) || trim($_POST['colour']) == '') {
	die('Oops! You forgot to pick a colour.');
}

// Connect to database and insert entry
require_once('db.php');

$new_label_title = "'".$mysqli->escape_string(trim($_POST['title']))."'";
$new_label_colour = "'".$mysqli->escape_string(trim($_POST['colour']))."'";

$new_entry = $mysqli->query("INSERT INTO labels (label_name, label_hex) VALUES ($new_label_title, $new_label_colour)");
if (!$new_entry) {
	die('error creating new label: '.$mysqli->error);
}

// Redirect back to dashboard with success message
header('Location: /index.php?label_success');

?>


