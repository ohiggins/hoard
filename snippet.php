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
if(!empty($_GET["id"])) {
?>


<?php
	


echo "<table>";

if ($row_snippets = mysqli_fetch_array($snippets, MYSQLI_ASSOC)) {
    //output a row here
    echo $snippet->get_title();
    echo $snippet->get_date();

echo "</table>";

} 
?>
	  </div>

 <div class="col-lg-8">
	<b>Snippet content:</b>
	<?php
		$row_entries = mysqli_query($mysqli, "SELECT * FROM snippets_entries WHERE snippet_id = '$id'");
		
		while ($entries = mysqli_fetch_array($row_entries, MYSQLI_ASSOC)) {
		    //output a row here
		    echo '<div id="editor-'. (htmlentities($entries['entry_id'])) . '">'.(htmlentities($entries['entry_content'])).'</div>';
		    ?>
		    <script>
			    var editor = ace.edit("editor-" + "<?php echo (htmlentities($entries['entry_id'])); ?>");
			    editor.setTheme("ace/theme/twilight");
			    editor.getSession().setMode("ace/mode/javascript");
			</script>
			<?php
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