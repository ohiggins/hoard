<?php
	
	include('parts/header.php');
	
	$user = new User();
	$user->set_id($current_user['user_id']); 

?>

<link rel="stylesheet" href="assets/plugins/colorpicker/bootstrap-colorpicker.min.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background: red; height: 50px;">
      <h1>
        Manage Labels
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tags"></i> Home</a></li>
        <li class="active">Manage Labels</li>
      </ol>
    </section>


<div class="stretch-container">

<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#add" data-toggle="tab" aria-expanded="true">Add Label</a></li>
              <li class=""><a href="#manage" data-toggle="tab" aria-expanded="false">Manage Labels</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="add">
<form action="app/process/add_label_process.php" method="post">
<input name="snippet" type="hidden" value="<?php echo $_GET['id']; ?>" />
<p><label>Label Title:</label> <input tabindex="1" name="title" type="text" placeholder="test" /></p>
<p><label>Label Colour:</label> <input type="text" name ="colour" class="form-control my-colorpicker1 colorpicker-element"></p>
<p><input type="submit" value="add label" /></p>
</form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="manage">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
       
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>







</div>


	
<?php include('parts/footer.php'); ?>