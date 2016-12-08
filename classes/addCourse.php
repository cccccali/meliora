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

$id = $_GET["id"];
$temp = $_GET["crn"];
$dataHold= DB::getInstance()->query("SELECT * FROM enrollments WHERE student_id = {$id} AND course_id = {$temp} LIMIT 10");//"enrollments", array('student_id', '=', "{$user->data()->student_id}"));
	if($dataHold->count()>0) {
      echo "Succeeded";
  } else {
    $dataHold= DB::getInstance();
    //$temp = array();
    //$temp['student_id'] = $user->data()->student_id;
    //$temp['course_id'] = $_GET["crn"];
    $didSucceed = $dataHold->query("INSERT INTO enrollments VALUES ('".$id."','".$temp."')");//`{$user->data()->student_id}`, `hello`)");
    echo "SELECT * FROM enrollments WHERE student_id = {$id} AND course_id = {$temp} LIMIT 10";
  }
?>