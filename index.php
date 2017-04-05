<?php include('parts/header.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background: red; height: 50px;">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>



<?php
	
include('app/db.php');
$user = new User();
$user->set_id($current_user['user_id']); 
$userid = $user->get_id();
$snippets = mysqli_query($mysqli, "SELECT * FROM snippets WHERE snippet_author = $userid OR snippet_visibility != 0 LIMIT 20 OFFSET 0");
?>


<div class="col-xs-3" style="padding: 0;">
	<div class="chooser" style="height: calc(100vh - 135px); overflow-x: hidden;">
    <ul class="nav nav-tabs tabs-left" style="min-height: 100%;">
	    <div class="chooser-label"><strong>MY SNIPPETS</strong> / ALL SNIPPETS <span class="pull-right">MOST RECENT <i class="fa fa-caret-down" aria-hidden="true"></i></span></div>
	    <?php
		    $i = 0;
			while ($row_snippets = mysqli_fetch_array($snippets, MYSQLI_ASSOC)) {
				$snippet = new Snippet();
				$snippet->set_id($row_snippets['snippet_id']);
				$author2 = new User();
				$author2->set_id($snippet->get_author()); 
		?>
				<li  <?php if ($i == 0) { echo 'class="active"'; } ?> onclick='getSummary(<?php echo $snippet->get_id(); ?>)'>
					<a href="#snippet-<?php echo $snippet->get_id(); ?>" data-toggle="tab">
						<img src="<?php echo $author2->get_gravatar(); ?>" class="avatar">
						<span class="title"><?php echo $snippet->get_title(); ?></span><br /> 
						<span class="meta">Posted <?php echo $snippet->get_date(); ?> by <?php echo $author2->get_name(); ?></span>
									    <div class="chooser-labels">
				    <?php 
						foreach($snippet->get_labels() as $labels) { 
							$label = new Label();
							$labelid = $labels['label_id'];
							$label->set_id($labelid);
							echo '<span style="background-color: ' . $label->get_hex() . '">' . $label->get_name() . '</span>';
						}
					?>
			    </div>
						 
					</a>
				</li>
		<?
			    if ($i == 0) { $startingid = $snippet->get_id(); }
			    $i = $i + 1;
			}
		?>
    </ul>
</div>
</div>

<div class="col-xs-9">
    <div class="tab-content scrolly">
		<div class="test"></div>
    </div>
</div>


<?php if (strpos($_SERVER['REQUEST_URI'], "delete_success") !== false){ ?>
  <!-- Modal -->
  <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Snippet Deleted</h4>
        </div>
        <div class="modal-body">
          <p>Your snippet was deleted succesfully.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <script type="text/javascript">
    $(window).load(function(){
        $('#deleted').modal('show');
    });
</script>

<?php } ?>


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
$('.test').html('<div class="overlay"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>');
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