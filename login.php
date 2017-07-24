<?php

require_once('app/login_check.php');

if (isset($current_user) && isset($current_user['loggedin']) && $current_user['loggedin'] == true) {
	header('Location: /index.php');
	die();
}

?>
<html>
<head>
<title>login</title> 
</head>
<body id="login" onload="document.getElementById('start-here').focus()">

<div id="login-prompt">
<h1>login</h1>
<?php
if (isset($_GET['register_success'])) {
	?>
	<p><span class="registered">Oh, it looks like you registered. Log in now.</span></p>
	<?php
}
?>
<form action="login.php" method="post">
<p><input tabindex="1" id="start-here" name="e" type="email" placeholder="Email Address" /></p>
<p><input tabindex="2" name="p" type="password" placeholder="Password"/></p>
<p><input tabindex="3" type="submit" value="log in &raquo;" /></p>
</form>
</div>

</body>
</html>