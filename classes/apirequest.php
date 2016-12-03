<?php 
	$url = "http://www.skedgeur.com/api/courses/?q=" . htmlspecialchars($_GET["string"], ENT_QUOTES, 'UTF-8') . "&sections=1";
	$response = file_get_contents($url);
	$array = json_decode($response, true);
	
	$i = $_GET["index"];
	$title = $array['20171'][$i]['title'];
	$description = $array['20171'][$i]['description'];
	$dept = $array['20171'][$i]['dept'];
	$num = $array['20171'][$i]['num'];
	$days = $array['20171'][$i]['sections'][0]['days'] . " " .  $array['20171'][$i]['sections'][0]['prettyTime'];
	$result = array($title, $description, $dept, $num, $days);
	echo json_encode($result);
?>