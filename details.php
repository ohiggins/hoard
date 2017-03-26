<?php
	
/*******************************

Edit Snippet Details
details.php

********************************/

include('parts/header.php');

if(!empty($_GET["id"])) {
	$id = htmlspecialchars($_GET["id"]);
} else {
	$id = false;
}

$user = new User();
$user->set_id($current_user['user_id']); 

$snippet = new Snippet();
$snippet->set_id($id); 

?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background: red; height: 50px;">
      <h1>
        Edit Entry
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


<div class="stretch-container">
<?php
if($id and $snippet->get_title()) {
if($snippet->get_author() == $user->get_id()) {
?>

<div id="register-prompt">
<h1>edit snippet entry</h1>
<form action="app/details_process.php" method="post">
<input name="snippetid" type="hidden" value="<?php echo $snippet->get_id(); ?>" />
<p><label>Snippet Title:</label> <input tabindex="1" name="title" value="<?php echo htmlspecialchars($snippet->get_title()); ?>" type="text" placeholder="test" /></p>
<p><label>Snippet Description:</label> <textarea name="description" type="text"><?php echo htmlspecialchars($snippet->get_description()); ?></textarea></p>
<p><label>Snippet Visibility:</label>
	<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="visibility" tabindex="-1" aria-hidden="true">
                  <option value="0" selected="selected">Only Me</option>
                  <option value="1">Team</option>
                  <option value="2">Public</option>
                </select>
                </p>
                
             <p><label>Snippet Labels:</label>
                	    <?php
	                	    include('app/db.php');
							$labels = mysqli_query($mysqli, "SELECT * FROM labels");
							if ($labels AND $labels->num_rows !== 0) {
							while ($row_labels = mysqli_fetch_array($labels, MYSQLI_ASSOC)) {
								echo "<input type='checkbox' name='label-" . $row_labels['label_id'] . "'>" . $row_labels['label_name'] . $row_labels['label_hex'];
							} } else {
								echo 'Please add a label!';
							}
							
						?>

<p><input type="submit" value="add snippet" /></p>
</form>

<form action="app/delete_entry_process.php" method="post">
	<input name="entryid" type="hidden" value="<?php echo $_GET['id']; ?>" />
	<input type="submit" value="delete snippet!!!!!!!" /></p>
</form>

</div>
<?php
} else {
	echo '
		<div class="callout callout-danger">
        <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Permission denied.</h4>
        <p>You can\'t edit a snippet you don\'t own!</p>
        </div>';
	}
	} 
	else {
	echo '
		<div class="callout callout-danger">
        <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Snippet not found!</h4>
        <p>It may have been deleted by the author.</p>
        </div>';
	}
	?>
</div>
	
<?php include('parts/footer.php'); ?>