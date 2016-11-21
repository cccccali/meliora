<?php 
	$url = "http://www.skedgeur.com/api/courses/?q=" . htmlspecialchars($_GET["string"]);
	$response = file_get_contents($url);
	$array = json_decode($response, true);
	
	$i = $_GET["index"];

	$title = $array['20171'][$i]['title'];
	$description = $array['20171'][$i]['description'];
	$dept = $array['20171'][$i]['dept'];
	$num = $array['20171'][$i]['num'];
	$result = $title . ' – ' . $description . ' – ' . $dept . $num;

	echo $result;
?>