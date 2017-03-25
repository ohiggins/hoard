<?php

$login_required = true;
require_once('app/login_check.php');

session_start();
$_SESSION['userid'] = $current_user['user_id'];

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

<div id="register-prompt">
<h1>add snippet</h1>
<form action="app/add_process.php" method="post">
	
<p><label>Snippet Title:</label> <input tabindex="1" id="start-here" name="title" type="text" placeholder="test" /></p>
<p><input tabindex="5" type="submit" value="add snippet" /></p>
</form>
</div>
<?php include('parts/footer.php'); ?>