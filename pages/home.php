<h1>this is the home</h1>
<?php 
$user = new user();
if($user->isLoggedIn()){ 
	echo ("welcome, "+$user->data()->student_id);
}
?>