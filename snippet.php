<?php
	include('parts/header.php');
	
	if(!empty($_GET["id"])) {
		$id = htmlspecialchars($_GET["id"]);
	} else {
		$id = false;
	}
	$snippet = new Snippet();
	$snippet->set_id($id); 
	
	$author = new User();
	$authorid = $snippet->get_author();
	$author->set_id($authorid);
?>

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

<script src="/assets/ace/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

<div class="stretch-container">
  <div class="row">
	  <div class="col-lg-12">

<?php
if($id and $snippet->get_title()) {
?>



    <h2><?php echo $snippet->get_title(); ?></h2>

 
	  </div>

 <div class="col-lg-8">
	
	<?php
		$row_entries = mysqli_query($mysqli, "SELECT * FROM snippets_entries WHERE snippet_id = '$id'");
		if ($row_entries AND $row_entries->num_rows !== 0) {
		while ($entries = mysqli_fetch_array($row_entries, MYSQLI_ASSOC)) {
			
				$id = $entries['entry_id'];
				$entry = new Entry();
				$entry->set_id($id); 

		    echo '<div id="editor-' . $entry->get_id() . '">' . $entry->get_content() . '</div>';
		    ?>
		    <script>
			    var editor = ace.edit("editor-" + "<?php echo $entry->get_id(); ?>");
			    editor.setTheme("ace/theme/twilight");
			    editor.getSession().setMode("ace/mode/javascript");
			</script>
				
				<?php }
					} else {
				echo '<div class="callout callout-warning"><h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> No entries found!</h4><p>Try adding a code entry to this snippet.</p></div>';
			}
	?>
	
	
	
</div>
 <div class="col-lg-4">
	 <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo $author->get_gravatar(); ?>g" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php $author->get_name(); ?></h3>
              <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Projects</a></li>
                <li><a href="#">Tasks</a></li>
                <li><a href="#">Completed Projects</a></li>
                <li><a href="#">Followers</a></li>
              </ul>
            </div>
          </div>
 </div>
	</div>
  
<?php 
	} 
	else {
	echo '</div></div>
		<div class="callout callout-danger">
        <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Snippet not found!</h4>
        <p>It may have been deleted by the author.</p>
        </div>';
	}
	?>
  
</div>



<?php include('parts/footer.php'); ?>