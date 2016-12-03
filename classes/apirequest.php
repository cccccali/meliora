<?php 
	$url = "http://www.skedgeur.com/api/courses/?q=" . htmlspecialchars($_GET["string"], ENT_QUOTES, 'UTF-8') . "&sections=1";
	$response = file_get_contents($url);
	$array = json_decode($response, true);
	
	$i = $_GET["index"];
	$title = $array['20171'][$i]['title'];
	$description = $array['20171'][$i]['description'];
	$dept = $array['20171'][$i]['dept'];
	$num = $array['20171'][$i]['num'];
	$sections = "";

	foreach ($array['20171'][$i]['sections'] as $section) {
		$sections = $sections . $section['days'] . " " .  $section['prettyTime'] . "\n";
	}

	$result = array($title, $description, $dept, $num, $sections);
	echo json_encode($result);
?>