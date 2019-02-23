<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

//session_start();
//include("myfunctions.php");
include ("account.php") ;


$db = mysqli_connect ( $hostname, $username, $password, $project );
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "<br>Successfully connected to MySQL.<br><br><br>";
mysqli_select_db( $db , $project );



$username = $_GET["username"];
$password = $_GET["password"];
$email = $_GET["email"];



$s = "insert into userTbl (user_name, password, email) values ('$username', '$password', '$email')";
	mysqli_query($db, $s) or die (mysqli_error($db));


?>



<script>


function formpage()
{
	window.location.href= 'login.php';
}

</script>


<br><input type = 'button' onclick = "formpage();" value ="BACK TO LOGIN PAGE">









