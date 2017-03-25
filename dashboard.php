<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$login_required = true;
require_once('app/login_check.php');

?>

<?php include('parts/header.php'); ?>

<!-- page protected by a login -->
<html>
<head>
<title>protected page test</title>
</head>
<body
<p>
<?php
	
	
include('app/db.php');
$snippets = mysqli_query($mysqli, "SELECT * FROM snippets");

echo "<table>";

while ($row_users = mysqli_fetch_array($snippets, MYSQLI_ASSOC)) {
    //output a row here
    echo "<tr><td>".($row_users['snippet_title'])."</td></tr>";
}

echo "</table>";
?>
</p>
<p>This page is protected by a login!</p>
<p><a href="logout.php">Log out</a></p>
</body>
</html>

<?php include('parts/footer.php'); ?>