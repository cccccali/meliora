<?php
	require_once "includes/init.php";
	$user = new user();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registrar - <?php echo ucfirst($page_name); ?></title>
		<link rel="stylesheet" type="text/css" href="/stylesheets/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/stylesheets/sweetalert.css"/>
		<link rel="stylesheet" type="text/css" href="/stylesheets/meliora.css"/>
		<link rel="stylesheet" type="text/css" href="/stylesheets/calendar.css"/>
		<script type="text/javascript" src="/scripts/jquery.js"></script>
		<script type="text/javascript" src="/scripts/bootstrap.js"></script>
		<script type="text/javascript" src="/scripts/autohidingnavbar.js"></script>
		<script type="text/javascript" src="/scripts/sweetalert.js"></script>
		<script type="text/javascript" src="/scripts/pretty-calendar.js"></script>
		<script type="text/javascript" src="/scripts/jquery.md5.js"></script>
  		<script src="/scripts/countries.js"></script>

	</head>
	<body <?php echo ($page_name === "login"|| !$user->isLoggedIn()) ? "class='background'" : "" ?>> <!--Added by emily/kelly--> 
		<?php include("modules/header.php"); ?>
		<div class="container-fluid m-t-3">
			<?php 
				if(!$user->isLoggedIn()){
    				require_once("pages/login.php"); 
				} 
				else {
					require_once("pages/".$page_name.".php"); 
				}
			?>
		</div>
	  	<footer> 
	  	    <div class="col-md-12">
      			<hr>
    		</div>
    		<div class="col-md-5">
      			<p> &copy; Meliorats, CSC 210</p>
    		</div> 
  		</footer>
	</body>
</html>
