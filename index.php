<?php
	require_once "includes/init.php";
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
		<script type="text/javascript" src="/scripts/jquery.js"></script>
		<script type="text/javascript" src="/scripts/bootstrap.js"></script>
		<script type="text/javascript" src="/scripts/autohidingnavbar.js"></script>
		<script type="text/javascript" src="/scripts/sweetalert.js"></script>
		<script type="text/javascript" src="/scripts/jquery.md5.js"></script>
	</head>
	<body>
		<?php include("modules/header.php"); ?>
		<div class="container-fluid m-t-3">
			<?php require_once("pages/".$page_name.".php"); ?>
		</div>
	</body>
</html>
