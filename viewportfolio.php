<?php

session_start();
?>
 
<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}

table, th, td {
  border: 1px solid black;
background-color: white;
}

.refreshed{ text-align: center; font-size: 10pt }
.btn{background-color: firebrick; color:white; }

a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 35px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: gray;
}

#portfolio{
	margin: auto;
}

#panel {
margin: 0 auto; 
width:80%;
  
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 12px;
}


</style>
</head>

<body>
<div id="panel">
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);



include ("functions.php") ;


$db = connectDB();




$username = $_SESSION["username"]; 	//$_GET["username"];
//$password = 'testpw123';		//$_GET["password"];


//display the username and current balance
$OUT = "";
$s = "select * from user where username = '$username'";
($t = mysqli_query ( $db  , $s))  or die (mysqli_error($db));

while ( $r = mysqli_fetch_array($t, MYSQLI_ASSOC))
	{
			
			$curr_bal = $r ["curr_bal"];
			$_SESSION["userid"] = $r["userid"];
			$_SESSION["currbal"] = $curr_bal;
			$OUT .= "<br> Hello, $username!";
			$OUT .=  "<br> Your current balance in USD: $$curr_bal.<br>";
	}

print $OUT;




//update the user's exchanges using the most recent rate from API
$userid = $_SESSION["userid"];
$s2 = "select * from exchanges where userID = '$userid' ";
$t = mysqli_query ( $db  , $s2)  or die (mysqli_error($db));

while ( $r = mysqli_fetch_array($t, MYSQLI_ASSOC))
	{
		$toCurr = $r ["toCurr"];
		$exchangeID= $r ["exchangeid"];
		$amount = $r["amount"];
		$exchangedata = "";
		//convert currency to USD
			while($exchangedata ==null || (!array_key_exists('Realtime Currency Exchange Rate', $exchangedata))){
	$url = "https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=$toCurr&to_currency=USD&apikey=PTGKM2RE1U6IAGUJ";
		$data = file_get_contents($url);
		$exchangedata = json_decode($data, true);	
		$rate = $exchangedata['Realtime Currency Exchange Rate']['5. Exchange Rate'];
			}	

		$currentUSD = $rate * $amount;
		$s3 = "update exchanges set currentUSD = '$currentUSD', rate ='$rate' where exchangeid = '$exchangeID'; ";
		mysqli_query ( $db  , $s3)  or die (mysqli_error($db));
		
}









//display all the user's exchanges
$s2 = "select * from exchanges where userID = '$userid' and status='A' order by datetime asc";
$t = mysqli_query ( $db  , $s2)  or die (mysqli_error($db));

 if (mysqli_num_rows($t)== 0 || $t == null) {
                print "You do not have any exchanges.";
        }		
else{
			


print "<h2>PORTFOLIO</h2>";
print "<table id='portfolio'>";

		
		print "<tr> <th>ExchangeID</th> <th>Datetime</th> <th>Type</th> <th>Amount</th> <th>Current Rate</th> <th>Initial USD</th> <th>Current Value in USD</th> </tr>"; 
  
		while( $w = mysqli_fetch_array($t, MYSQLI_ASSOC))
		  {
			  $toCurr = $w ["toCurr"];
			  $amount = $w ["amount"];
			  $datetime = $w ["datetime"];
			  $exchangeID = $w["exchangeid"];
			$rate = $w["rate"];
			$initialUSD = $w["initialUSD"];
			$currentUSD = $w["currentUSD"];
			  
			  print   "<tr>";
			  
			  print   "<td>";	
				  print   $exchangeID;
			  print   "</td>"  ;
			  print   "<td>";	
				  print  $datetime;
			  print   "</td>"  ;	
			  
			  print   "<td>";	
				  print   $toCurr;
			  print   "</td>"  ;
			  
			  print   "<td>";	
				  print   $amount;
			  print   "</td>"  ;

			print   "<td>";	
				  print   $rate;
			  print   "</td>"  ;

			  print   "<td>";	
				  print   $initialUSD;
			  print   "</td>"  ;

			print   "<td>";	
				  print   $currentUSD;
			  print   "</td>"  ;
			  
			  
			  print   "</tr>";	
		  
		  }	
  print "</table>";

/*
$url = 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=JPY&apikey=PTGKM2RE1U6IAGUJ';
$data = file_get_contents($url);
$exchangerate = json_decode($data, true);
*/
$lastupdate = "Last updated: " . $exchangedata['Realtime Currency Exchange Rate']['6. Last Refreshed']. '<br>';

print "<div class = 'refreshed'> $lastupdate </div>";
}
?>

<form class = "wrapper" action = "testRabbitMQClient.php" >

<button type="submit" class="btn" name="type" value="Trade">Trade</button>
</form>
<form action="addexchange.php" target="_self">
<button type="submit" class="btn" name="type" value="Add">Add Exchange</button>
</form>









</div>
</body>
</html> 


