#!/usr/bin/php 
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
session_start();

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}


if($_GET["type"] == "Update"){
	$request['type'] = $_GET["type"];
	$request['username'] = $_SESSION["username"];
	$request['exchangeid'] = $_SESSION["exchangeid"];
	$request['currbal'] = $_SESSION["newbal"];
}else{


$request = array();
$request['type'] = $_GET["type"];
$request['username'] = $_GET["username"];
$request['password'] = $_GET["password"];
$request['email'] = $_GET["email"];
$request['message'] = $msg;
}

$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
//echo $argv[0]." END".PHP_EOL;
//file_put_contents("errorlog.txt", $response, FILE_APPEND);
echo "<br>Return code: ";
$returnCode = $response["returnCode"];

if($returnCode == 1){
	$_SESSION["username"] = $request['username'];
	header('Location: viewportfolio.php');
	exit();
	
}

if($returnCode == 3){
	
	header('Location: trade.php');
	exit();
	
}

if($returnCode == 6){
	
	header('Location: viewportfolio.php');
	exit();
	
}









