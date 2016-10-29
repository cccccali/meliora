<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/includes/init.php';
	
	((new user())->logout());
	
	redirect::to(url('home'));
?>