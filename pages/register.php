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

$id = $_GET['id'];
$pass = $_GET['pass'];
$token = $_GET['token'];

// if(!token::check($token)){
//     header('HTTP/1.1 500 Internal Server Booboo');
//     header('Content-Type: application/json; charset=UTF-8');
//     die(json_encode(array('message' => 'token_failure', 'code' => 1)));
// }

if (is_null($id) || is_null($pass)) {
    header('HTTP/1.1 500 Internal Server Booboo');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => 'null_inputs', 'code' => 1)));
}

if (strlen($id) < 6 || strlen($pass) < 6) {
    header('HTTP/1.1 500 Internal Server Booboo');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => 'short_inputs', 'code' => 2)));
}

$user = new user();

$salt = hash::salt(32);

try{
    $user->create(array(
        'student_id' => $id,
        'password' => hash::make($pass, $salt),
        'salt' => $salt
    ));
    header('Content-Type: application/json');
    echo (json_encode(array('message' => 'success', 'code' => 1)));
}

catch(Exception $e){
    header('Content-Type: application/json');
    die(json_encode(array('message' => 'unknown_error')));
}


?>
