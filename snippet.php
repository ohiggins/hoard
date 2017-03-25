<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$login_required = true;
require_once('app/login_check.php');

?>

<?php include('parts/header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background: red; height: 50px;">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<!-- page protected by a login -->
<html>
<head>
<title>protected page test</title>
</head>
<body
<p>
<?php

if(!empty($_GET["id"])) {
	$id = htmlspecialchars($_GET["id"]);
} else {
	$id = false;
}

if ($id == true) {

	
include('app/db.php');
$snippets = mysqli_query($mysqli, "SELECT * FROM snippets WHERE snippet_id = '$id'");

echo "<table>";

if ($row_users = mysqli_fetch_array($snippets, MYSQLI_ASSOC)) {
    //output a row here
    echo "<tr><td>".(htmlentities($row_users['snippet_title']))."</td></tr>";
    echo "<tr><td>".(htmlentities($row_users['snippet_published']))."</td></tr>";
} else {
	echo 'Snippet not found';
}

echo "</table>";

} else {

	echo 'Please select a snippet ID.';
}
?>
</p>
</body>
</html>

<?php include('parts/footer.php'); ?>