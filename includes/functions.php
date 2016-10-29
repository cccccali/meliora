<?php
	function escape($string){
		return htmlentities($string, ENT_QUOTES, 'UTF-8');
	}
	
	function url($extension){
		return str_replace("index.php", "", "http://$_SERVER[HTTP_HOST]/".$extension);
	}
?>