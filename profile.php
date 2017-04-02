<?php
	
/*******************************
	
	Snippet Single View
	snippet.php
	
********************************/
	
include('parts/header.php');
	
if(!empty($_GET["id"])) {
	$id = htmlspecialchars($_GET["id"]);
} else {
	$id = false;
}
	
$author = new User();
$author->set_id($id);

?>

<div class="content-wrapper">
	
	<section class="content-header" style="background: red; height: 50px;">
	<h1><?php echo $author->get_name(); ?>'s Profile</h1>
	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-code" aria-hidden="true"></i> <?php echo $author->get_name(); ?></a></li>
	</ol>
	</section>

	<div class="stretch-container">
		<div class="row">
			<div class="col-lg-12">
				
			<?php
				if($id and $author->get_name()) {
			?>

			</div>
			
			<div class="col-lg-4">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-yellow">
						<div class="widget-user-image">
							<img class="img-circle" src="<?php echo $author->get_gravatar(); ?>g" alt="User Avatar">
            			</div>
						<h3 class="widget-user-username"><?php echo $author->get_name(); ?></h3>
						<h5 class="widget-user-desc">Lead Developer</h5>
            		</div>
            		
					<div class="box-footer no-padding">
						<ul class="nav nav-stacked">
							<li><a href="/details.php?id=">Edit Snippet</a></li>
							<li><a href="/entry.php?id=">Add Entry</a></li>
						</ul>
            		</div>
        		</div>
        		
        		<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Collapsable</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
              The body of the box
            </div>
            <!-- /.box-body -->
          </div>
   			</div>

			<div class="col-lg-8">
					
			    <h2><?php echo $author->get_name(); ?></h2>
			    <p><?php echo $author->get_name(); ?></p>
			    <hr>
	
	
			</div>

			
		</div>
  
		<?php 
			} else {
				echo '</div></div>
					<div class="callout callout-danger">
			        <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Snippet not found!</h4>
			        <p>It may have been deleted by the author.</p>
			        </div>';
			}
			?>
	</div>
	
<?php include('parts/footer.php'); ?>