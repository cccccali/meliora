 <?php 
	$user = new user();
?>
<div class="row flex-items-xs-center m-x-1">
	<div class="col-lg-6 col-sm-9 col-xs-12">
		<div class="jumbotron row flex-items-xs-center m-t-3">
			<h1 class="text-xs-center display-4">Welcome, <?php echo($user->data()->student_id) ?></h1>
			<div class="row col-xs-12 m-t-1">
				<div class="col-sm-6 col-xs-12 text-xs-center">
					<a class="d-block" href="#">Update Address</a>
					<a class="d-block" href="#">Personal Information</a>
					<a class="d-block" href="#">View Holds</a>
				</div>
				<div class="col-sm-6 col-xs-12 text-xs-center">
					<a class="d-block" href="#">Course Registration</a>
					<a class="d-block" href="#">View Schedules</a>
				</div> 
			</div>
		</div>
	</div>
</div>