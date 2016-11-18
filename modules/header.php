<nav class="navbar navbar-light bg-faded navbar-fixed-top">
	<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
	&#9776;
	</button>
	<div class="collapse navbar-toggleable-xs" id="navbar">
		<a class="navbar-brand" href="../home">Better Registrar</a>
		<?php
			if($loggedin){ ?>
				<ul class="nav navbar-nav pull-xs-right">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Your Account</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="/updateAddress">Update Address</a>
							<a class="dropdown-item" href="/personalInfo">Personal Information</a>
							<a class="dropdown-item" href="/holds">View Holds</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Registration</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="/search">Course Registration</a>
							<a class="dropdown-item" href="/viewSchedule">View Schedules</a>
						</div>
					</li>
					<li class="nav-item">
						<button class="btn btn-primary" type="submit" onclick='location.href=<?php echo "\"".url("pages/logout.php")."\""; ?>;'>Logout</button>
					</li>
				</ul>
				<?php
			} 
		?>
	</div>
</nav>