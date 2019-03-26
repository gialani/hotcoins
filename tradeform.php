<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
body {background-color: powderblue;}
h1   {color: blue;}
table, th, td {
  border: 1px solid black;
background-color: white;
}


form {
margin: 0 auto; 
width: 80%;
  
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 12px;
}

</style>
</head>











<body>

<form action="testRabbitMQClient.php">
<?php

include ("functions.php");

$xid =$_GET['trade'];
$_SESSION["exchangeid"]= $xid;

$db = connectDB();




$OUT = "";
$s = "select * from exchanges where exchangeid='$xid' ";
($t = mysqli_query ( $db  , $s))  or die (mysqli_error($db));

print "<h2>CONFIRM</h2>";
print "<table id='portfolio'>";
		
		print "<tr> <th>ExchangeID</th> <th>Datetime</th> <th>Type</th> <th>Amount</th> <th>Current Rate</th> <th>Initial USD</th> <th>Current Value in USD</th> </tr>"; 
  
		while( $w = mysqli_fetch_array($t, MYSQLI_ASSOC))
		  {
			$userid = $w["userid"];
			  $toCurr = $w ["toCurr"];
			  $amount = $w ["amount"];
			  $datetime = $w ["datetime"];
			  $exchangeID = $w["exchangeid"];
			$rate = $w["rate"];
			$initialUSD = $w["initialUSD"];
			$currentUSD = $w["currentUSD"];
			  
			  print   "<tr>";
			  
			  print   "<td> $exchangeID</td>"  ;
			  print   "<td> $datetime</td>"  ;	
			  
			  print   "<td> $toCurr</td>"  ;
			  
			  print   "<td> $amount</td>"  ;

			print   "<td> $rate</td>"  ;

			  print   "<td>$initialUSD</td>"  ;

			print   "<td>$currentUSD</td>"  ;
			  
			
			  
			  print   "</tr>";	
		  
		  }	
  print "</table>";

$s = "select * from user where userid = '$userid'";
($t = mysqli_query ( $db  , $s))  or die (mysqli_error($db));

while ( $r = mysqli_fetch_array($t, MYSQLI_ASSOC))
	{
			$currbal= $r["curr_bal"];
			$newbal = $currbal + $currentUSD;
		
	}



$result = $currentUSD -$initialUSD;
$absVal = abs($result);

if( $result <0){
	print "You will lose $$absVal :( ";
}else{
	print "You will make $$result!";
}
print "<br>The exchange fee is \$1.99.<br>";
print "<br>Your new balance in USD will be: $$newbal.<br>";

$_SESSION["newbal"]= $newbal;
?>

<br><button type='submit' name= 'type' value = 'Update'>EXCHANGE AND GET USD</button>




</form>
</body>
</html>
