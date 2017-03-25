<?php

$login_required = true;
require_once('app/login_check.php');

session_start();
$_SESSION['userid'] = $current_user['user_id'];

?>

<?php include('parts/header.php'); ?>

<div id="register-prompt">
<h1>add snippet</h1>
<form action="app/add_process.php" method="post">
	
<p><label>Snippet Title:</label> <input tabindex="1" id="start-here" name="title" type="text" placeholder="test" /></p>
<p><input tabindex="5" type="submit" value="add snippet" /></p>
</form>

<?php include('parts/footer.php'); ?>