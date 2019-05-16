#!/usr/bin/php
<?php
session_start();
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

include ("functions.php");


function doLogin($username,$password)
{
	
	//check if user exists
	$db = connectDB();
	$user_check_query = "SELECT * FROM user  WHERE username='$username' and password = '$password' LIMIT 1";
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
	
	//check if username or email  already exists
	$db = connectDB();
	$s = "SELECT * FROM user  WHERE username='$username' or email= '$email';";
	$result = mysqli_query($db, $s);

        if (mysqli_num_rows($result) > 0) {
                echo ("<br>Failed to create user because user already exists.");
                return false;
        }


	//add new user
	$s = "insert into user (username, email, password, curr_bal) values ('$username', '$email', '$password', '100.00')";
        mysqli_query($db, $s) or die (mysqli_error($db));

	if ($s == true) 
	{
		echo "New user created successfully.";			//displayed to developer
		return true;		
	}
	else
	{
		echo "Failed to create new user.";
		return false;
	}





}

function removeExchange($username, $exchangeid, $currbal)
{
	
	
	$db = connectDB();
	//remove exchange 

	$q= "update exchanges set status='I' where exchangeid='$exchangeid'";
 	mysqli_query($db, $q) or die (mysqli_error($db));

	//update current balance if remove was successful

	if ($q == true) 
	{
		$t= "update user set curr_bal='$currbal' where username='$username'";
 		mysqli_query($db, $t) or die (mysqli_error($db));
		if($t== true){return true;	}else{ return false;}	
	}
	else
	{
		
		return false;
	}

}




function addExchange($request){

	$db = connectDB();
		
$userid=$request['userid'];
$toCurr = $request['toCurr'];
$amt = $request['toCurrAmt'];	
$initialUSD = $request['USD'];
$rate = $request['rate'];


$q= "insert into exchanges (userid, toCurr, amount, initialUSD, currentUSD, rate, status) values('$userid', '$toCurr', '$amt', '$initialUSD', '$initialUSD', '$rate', 'A')";

	mysqli_query($db, $q) or die (mysqli_error($db));

	//update current balance if add was successful

	if ($q == true) 
	{
		$currbal= $request['currbal'];
		$currbal = $currbal- $request['USD'];
		$t= "update user set curr_bal='$currbal' where userid='$userid'";
		mysqli_query($db, $t) or die (mysqli_error($db));
		if($t== true){return true;	}else{ return false;}	
	}
	else
	{
		
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

		    //displayed to user
		    $result = array("returnCode" => "1", 'message'=>"Login successful.----");			
			
	    }

	    else{
		   //displayed to user
		    $result = array("returnCode" => "0", 'message'=>"Wrong credentials.-----");			
	    }
	    break;

    case "Signup":
	    if (doRegistration($request['username'], $request['email'], $request['password'])){
		    $result = array("returnCode" => "1", 'message' => "User created.-------");
	    }
	    else{
		    $result = array("returnCode" => "0", 'message' => "Signup failed.------");
	    }
	    break;

	case "Trade":
		$result = array("returnCode" => "3");
		break;
	case "Portfolio":
		$result = array("returnCode" => "4");
		break;
	case "Add":
		if(addExchange($request)){
			$result = array("returnCode" => "4", 'message'=> 'Exchange added');}
		 else{
		    $result = array("returnCode" => '3', 'message' => "Exchange was not added.-------");
	   	 }
		break;

	case "tradeCurrency":
		if (removeExchange($request['username'], $request['exchangeid'], $request['currbal'])){
		    $result = array("returnCode" => '4', 'message' => "Account updated.------");
	    }
	    else{
		    $result = array("returnCode" => '3', 'message' => "Account was not updated.-------");
	    }
	    break;


  
  }

  return $result;


}


$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();

?>
