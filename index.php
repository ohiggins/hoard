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
	<div class="chooser" style="height: calc(100vh - 135px); overflow-y: scroll; overflow-x: hidden; position: relative;">
    <ul class="nav nav-tabs tabs-left">
	    <?php
		    $i = 0;
			while ($row_users = mysqli_fetch_array($snippets, MYSQLI_ASSOC)) {
			    //output a row here
			    echo "<li " . ($i == 0 ? "class='active'" : "") . "><a href='#snippet-" . $row_users['snippet_id'] . "' onclick='getSummary(" . $row_users['snippet_id'] .")'>" . (htmlentities($row_users['snippet_title'])) . "<br />date</a></li>";
			    if($i == 0) { $startingid = $row_users['snippet_id']; } 
			    $i = $i + 1;
			    
			}
		?>
    </ul>
</div>
</div>

<div class="col-xs-9">
    <div class="tab-content scrolly">
		<div class="test">LOADING</div>
    </div>
</div>

<script>
	
	
	
$( document ).ready(function() {
   $.ajax({

     type: "GET",
     url: 'snippet_container.php',
     data: "id=" + <?php echo $startingid; ?>, // appears as $_GET['id'] @ your backend side
     success: function(data) {
           // data is ur summary
          $('.test').html(data);
     }

   });
   
   $('.chooser').perfectScrollbar({ wheelPropagation: true, });
   $('.scrolly').perfectScrollbar({ wheelPropagation: true, });
   
  });

function getSummary(id)
{
$('.test').html('Loading...');
   $.ajax({

     type: "GET",
     url: 'snippet_container.php',
     data: "id=" + id, // appears as $_GET['id'] @ your backend side
     success: function(data) {
           // data is ur summary
          $('.test').html(data);
     }

   });

}
</script>


<?php include('parts/footer.php'); ?>