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

if(isset($_SESSION["index"])) {//_btn
	$request = array();
	$request['type'] = "login";
	$request['username'] = $_POST['username'];
	$request['password'] = $_POST['password'];
		$_SESSION["uname"] = $_POST['username']; 
		//$uname = $_POST['username'];
	$request['message'] = $msg;
	$response = $client->send_request($request); //response received from rmq server
	echo "client received response: ".PHP_EOL;
	//check to see if theres a response from rmq server
	if($response == 1) {
		//send to main web page???
		header("Location: home.php");
	}
	else{
		echo("response failure");
		//then send back to login maybe??
		header("Location: login.php");
	}
}
if(isset($_SESSION["registration"])){
	$request = array();
	$request['type'] = "registration";
	$request['username'] = $_POST['username'];
	$request['email'] = $_POST['email'];
	$request['password'] = $_POST['password'];
	$request['message'] = $msg;
	$response = $client->send_request($request);
	if ($response ==1){
		//then send back to registration???
		header("Location: register.php");
        } 
	header("Location:newAccount.php");
	
}
?>

