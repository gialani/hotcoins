#!/usr/bin/php
<?php
//require_once __DIR__.'vendor/autoload.php';

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//include ("account.php");


function doLogin($username,$password)
{
	include ("account.php");

		
	// connect to database
	ini_set('display_errors','On');
	error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
	$db= mysqli_connect ($hostname,$dbusername,$dbpw,$project);
	if (mysqli_connect_errno())
	{
		echo ("Failed To Connect To MySQL:" .mysqli_connect_error());
		exit();
	}
	echo ("Successfully Connected to MySQL.<br><br><br>");
	mysqli_select_db($db,$project);


	//check if user exists
	$user_check_query = "SELECT * FROM testTable  WHERE username='$username' and password = '$password' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);

	if (mysqli_num_rows($result) > 0) {
     		echo ("<br>User logged in.");
		return true;
	}else {
		echo ("<br>Unsuccessful login.");
		return false;
	}		

}



function doRegistration($username, $email, $password) {
	include('account.php');

        // connect to database
        ini_set('display_errors','On');
        error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
        $db= mysqli_connect ($hostname,$dbusername,$dbpw,$project);
        if (mysqli_connect_errno())
        {
                echo ("Failed To Connect To MySQL:" .mysqli_connect_error());
                exit();
        }
        echo ("Successfully Connected to MySQL.<br><br><br>");
	mysqli_select_db($db,$project);
	
	//check if username or email  already exists
	$s = "SELECT * FROM testTable  WHERE username='$username' or email= '$email';";
	$result = mysqli_query($db, $s);

        if (mysqli_num_rows($result) > 0) {
                echo ("<br>Failed to create user because user already exists.");
                return false;
        }


	//add new user
	$s = "insert into testTable (username, email, password) values ('$username', '$email', '$password')";
        mysqli_query($db, $s) or die (mysqli_error($db));

	if ($s == true) 
	{
		echo "New user created successfully.";
		return true;
	}
	else
	{
		echo "Failed to create new user.";
		return false;
	}





}




function requestProcessor($request)
{
	$result = "";
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "Login":
	    if(doLogin($request['username'],$request['password'])){
		    
		    $result = array("returnCode" => '1', 'message'=>"Login successful.");
	    }

	    else{
		   
		    $result = array("returnCode" => '0', 'message'=>"Wrong credentials.");
	    }
	    break;

    case "Signup":
	    if (doRegistration($request['username'], $request['email'], $request['password'])){
		    $result = array("returnCode" => '1', 'message' => "User created.");
	    }
	    else{
		    $result = array("returnCode" => '0', 'message' => "Signup failed.");
	    }
	    break;


   // case "validate_session":
     // return doValidate($request['sessionId']);
  }

  return $result;


}


$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>

