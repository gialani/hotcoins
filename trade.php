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
.refreshed{ text-align: center; font-size: 10pt }
#portfolio{
	margin: auto;
}
#portfolio tr{
	background-color: #ccc;
	
}
#portfolio tr:hover{
	background-color: #fff;
	
}
#portfolio th{
	background-color: #fff;
	
}
#portfolio button:hover{
	cursor: pointer;
}
#dialog p{
	color: #000000;
}
form {
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
<form action="tradeform.php" target="_self">
<?php
include("functions.php");
$db = connectDB();
$username = $_SESSION["username"];
$currbal= $_SESSION["currbal"];
$OUT = "";
$s = "select * from user where username = '$username'";
($t = mysqli_query ( $db  , $s))  or die (mysqli_error($db));
while ( $r = mysqli_fetch_array($t, MYSQLI_ASSOC))
	{
			$user = $r ["username"];
			$curr_bal = $r ["curr_bal"];
			$userid = $r["userid"];
			$OUT .= "<br> Hello, $user!<br>";
			$OUT .=  "Your current balance in USD: $$curr_bal<br>";
	}
print $OUT;
$s2 = "select * from exchanges where userID = '$userid' and status= 'A' order by datetime asc";
$t = mysqli_query ( $db  , $s2)  or die (mysqli_error($db));
print "<h2>YOUR EXCHANGES</h2>";
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
			  
			  print   "<td>$exchangeID</td>"  ;
			  print   "<td>$datetime</td>"  ;	
			  
			  print   "<td>$toCurr</td>"  ;
			  
			  print   "<td>$amount</td>"  ;
			print   "<td>$rate</td>"  ;
			  print   "<td>$initialUSD</td>"  ;
			print   "<td>$currentUSD</td>"  ;
			  
			print "<td><button type='submit' name = 'trade' value=$exchangeID>Trade</button></td>";
			  
			  print   "</tr>";	
		  
		  }	
  print "</table>";
$url = 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=JPY&apikey=PTGKM2RE1U6IAGUJ';
$data = file_get_contents($url);
$exchangerate = json_decode($data, true);
$lastupdate = "Last updated: " . $exchangerate['Realtime Currency Exchange Rate']['6. Last Refreshed']. '<br>';
print "<div class = 'refreshed'> $lastupdate </div>";
?>





</form>
</body>
</html>