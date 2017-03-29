<?php
	
	include('parts/header.php');
	
	$user = new User();
	$user->set_id($current_user['user_id']); 

?>

<div class="content-wrapper">
	<section class="content-header" style="background: red; height: 50px;">
		<h1>Your Account</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-user"></i> Edit Account Details</li>
		</ol>
	</section>
	
	
	<div class="stretch-container">
		<div class="row">
			<div class="col-lg-8">
				<form action="app/add_label_process.php" method="post">
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title">Edit Account Details</h3>
						</div>
						<div class="box-body">
							<label>Email Address</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" class="form-control" placeholder="Email">
              				</div>
              				<br />
              				<label>Full Name</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="email" class="form-control" placeholder="Full Name">
              				</div>
              				<br />
              				<label>Job Title</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								<input type="email" class="form-control" placeholder="Job Title">
              				</div>
              				<br />
	              			<div class="form-group">
			                	<label>Time Zone</label>
			                	<script type="text/javascript">
									$(document).ready(function() {
										$(".timezone").select2();
									});
								</script>
								<select class="form-control timezone">
									<?php
										// Fab timezone script from https://gist.github.com/Xeoncross/1204255
										$regions = array(
										    'Africa' => DateTimeZone::AFRICA,
										    'America' => DateTimeZone::AMERICA,
										    'Antarctica' => DateTimeZone::ANTARCTICA,
										    'Asia' => DateTimeZone::ASIA,
										    'Atlantic' => DateTimeZone::ATLANTIC,
										    'Europe' => DateTimeZone::EUROPE,
										    'Indian' => DateTimeZone::INDIAN,
										    'Pacific' => DateTimeZone::PACIFIC
										);
										$timezones = array();
										foreach ($regions as $name => $mask)
										{
										    $zones = DateTimeZone::listIdentifiers($mask);
										    foreach($zones as $timezone)
										    {
												$time = new DateTime(NULL, new DateTimeZone($timezone));
												$ampm = $time->format('H') > 12 ? ' ('. $time->format('g:i a'). ')' : '';
												$timezones[$name][$timezone] = substr($timezone, strlen($name) + 1) . ' - ' . $time->format('H:i') . $ampm;
											}
										}
										foreach($timezones as $region => $list)
										{
											print '<optgroup label="' . $region . '">' . "\n";
											foreach($list as $timezone => $name)
											{
												print '<option name="' . $timezone . '">' . $name . '</option>' . "\n";
											}
											print '<optgroup>' . "\n";
										}
									?>
			                	</select>
	                		</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-warning pull-right">Change Details</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-4">
				<div class="alert alert-muted alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-info"></i> Tip!</h4>
					To change your password, sign out and use the 'forgot password' function on the login page.
				</div>
			</div>
		</div>
	</div>
	
<?php include('parts/footer.php'); ?>