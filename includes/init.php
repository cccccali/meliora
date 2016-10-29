<?php
	session_start();

	$GLOBALS['config'] = array(
		'mysql' => array(
			'host' => 'dallas113.arvixeshared.com',
			'username' => 'badmedia_reg',
			'password' => 'me1iora',
			'db' => 'badmedia_registrar'
		),
		'remember' => array(
			'cookie_name' => 'hash',
			'cookie_expiry' => 604800
		),
		'session' => array(
			'session_name' => 'user',
			'token_name' => 'token'
		)
	);

	spl_autoload_register(function($class){
		require_once $_SERVER['DOCUMENT_ROOT'].'/classes/'.$class.'.php';
	});

	require_once $_SERVER['DOCUMENT_ROOT']."/includes/functions.php";
	
	$user;
	if(cookie::exists(config::get('remember/cookie_name')) && !session::exists(config::get('session/session_name'))){
		$hash = cookie::get(config::get('remember/cookie_name'));
		$hashCheck = DB::getInstance()->get('user_session', array('hash', '=', $hash));

		if($hashCheck->count()){
			$user = new user($hashCheck->first()->user_id);
			$user->login();
		}
	}

	
	$loggedin = false;

	if(session::exists(config::get('session/session_name'))){
		$loggedin = true;
	}

	$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$last = explode("/", $str)[1];

	if(!$last==""){
  		$page_name = $last;
	}
	else{
		$page_name = "home";
	}

?>
