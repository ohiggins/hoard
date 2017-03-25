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



<?php

	
include('app/db.php');
$snippets = mysqli_query($mysqli, "SELECT * FROM snippets");

$user = new User();
$user->set_id($current_user['user_id']); 


?>


<div class="col-xs-3" style="padding: 0;">
	<div style="height: calc(100vh - 150px); overflow-y: scroll; overflow-x: hidden;">
    <ul class="nav nav-tabs tabs-left">
	    <?php
		    $i = 0;
			while ($row_users = mysqli_fetch_array($snippets, MYSQLI_ASSOC)) {
			    //output a row here
			    echo "<li " . ($i == 0 ? "class='active'" : "") . "><a href='#snippet-".$row_users['snippet_id']."' data-toggle='tab'>".(htmlentities($row_users['snippet_title']))."<br />date</a></li>";
			    $i = $i + 1;
			}
		?>
    </ul>
</div>
</div>

<div class="col-xs-9">
    <div class="tab-content">
       <?php
	       	mysqli_data_seek( $snippets, 0 );
	       	$i = 0;
			while ($row_users = mysqli_fetch_array($snippets, MYSQLI_ASSOC)) {
			    echo "<div class='tab-pane ". ($i == 0 ? "active" : "") . "' id='snippet-".$row_users['snippet_id']."'><a href='/snippet.php?id=".$row_users['snippet_id']."'>".(htmlentities($row_users['snippet_title']))."</a></div>";
			    $i = $i + 1;
			}
		?>
    </div>
</div>


<?php include('parts/footer.php'); ?>