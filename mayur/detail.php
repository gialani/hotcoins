<?php


error_reporting(E_ERROR | E_WARNING| E_PARSE | E_NOTICE);
ini_set('display_errors',1);

//include ("account.php");
include ("function.php");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
or die('Error selecting MYSQL database: '. mysql_error());
*/

 //$user = getdata("user");
 //$pass = getdata("pass");
 //$amnt = getdata("amnt");  
// $num = getdata("number");

$user = 'mayurpatel';
 $pass = '1234';
 $amnt = getdata("amnt");  
 $num = getdata("number");
 $service = $_GET["choice"];


if ($service == "W")
{
 selling( $user , $amnt,$service, $out  );
 
}else if ($service == "D")
{
buying( $user , $amnt, $service, $out );
}else if($service == "0")
{
  echo ("Please go back on main page and select services");
  exit;
}

echo "<br>******************************************************************************************************<br><br>";


mysqli_close($db);
exit ("<br>Interaction completed successfully. <br><br>");

?>