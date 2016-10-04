<nav class="navbar navbar-light bg-faded">
	<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
	&#9776;
	</button>
	<div class="collapse navbar-toggleable-xs" id="navbar">
		<a class="navbar-brand" href="#">Better Registrar</a>
		<ul class="nav navbar-nav pull-xs-right">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Your Account</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="#">Update Address</a>
					<a class="dropdown-item" href="#">Personal Information</a>
					<a class="dropdown-item" href="#">View Holds</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Registration</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="#">Course Registration</a>
					<a class="dropdown-item" href="#">View Schedules</a>
				</div>
			</li>
			<?php
				if($loggedin){
					echo('<li class="nav-item">
									<button class="btn btn-primary" type="submit">Logout</button>
								</li>');
				}
			?>
		</ul>
	</div>
</nav>