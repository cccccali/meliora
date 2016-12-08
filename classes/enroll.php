<?php
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
    require_once '../classes/'.$class.'.php';
});

$user = new user();

$enrollments = DB::getInstance()->get("enrollments", array('student_id', '=', "123456"));
 if($enrollments->count()){
	 echo $enrollments->first()->course_id;
 } else {
 }
