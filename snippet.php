<?php
	include('parts/header.php');
	
	if(!empty($_GET["id"])) {
		$id = htmlspecialchars($_GET["id"]);
	} else {
		$id = false;
	}
	$snippet = new Snippet();
	$snippet->set_id($id); 
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


<?php

    echo $snippet->get_title();
    echo $snippet->get_date();
 
?>
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
				echo 'No entries found!';
			}
	?>
	
	
	
</div>
 <div class="col-lg-4">
	 options
 </div>
	</div>
  
   <?php 
	 } else {
	echo '</div></div>';
	echo 'Snippet not found';
}
	 ?>
  
</div>


<!-- Ace Editor -->



<?php include('parts/footer.php'); ?>