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

$dataHold= DB::getInstance()->get("enrollments", array('student_id', '=', "{$user->data()->student_id}"));
	if($dataHold == true) {
      echo "Succeeded";
    } else {
      $dataHold= DB::getInstance();
      $temp = array();
      $temp['student_id'] = $user->data()->student_id;
      $temp['course_id'] = $_GET["crn"];
      $didSucceed = $dataHold->insert("enrollments", $temp);
      echo $didSucceed;
    }
?>