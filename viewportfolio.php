<?php

session_start();
?>
 
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<style>
body {
  background-color: white;
}

table, th, td {
  text-align: center;
  padding: 8px;
  border: 1px solid blue;
  width: 100%; 
  border-collapse: collapse;
  overflow-x: scroll;
}

tr:nth-child(odd) {
  background-color: #fff1e0;
}

tr:hover {
  background-color: #ffd4cc;
}

.refreshed { 
  text-align: center; 
  font-size: 10pt 
}

.btn:hover {
  background-color: #f0d9a8; 
  color: red;
  border: 2px solid blue}
}

a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 35px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:active {
  background-color: gray;
}

#portfolio{
  margin: auto;
  overflow-x: auto;
}

h2 {
  text-align: center;
  font-family: serif;
  font-weight: bold;
}

h3 {
  font-size: 15px;
  text-align: right;
}

footer p {
   padding: 10.5px;
   margin: 0px;
   line-height: 100%;
}

footer{
   background-color: #424558;
   position: fixed;
   bottom: 0;
   left: 0;
   right: 0;
   height: 35px;
   text-align: center;
   color: #CCC;
}


</style>
</head>

<body>  


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="home.php">
     <img src="img/logo.png" alt="Logo" style="width:130px;"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Tools<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="graph.html">Historical Graphs</a></li>
          <li><a href="graph_curr.php">Currency Converter</a></li>
        </ul>
      </li>
      <li><a href="paypal.php">Payout</a></li>
      <li><a href="viewportfolio.php">My portfolio</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
      
    </ul>
  </div>
</nav>




  <footer>
      <p> &copy; 2019 <a style="color:#0a93a6; text-decoration:none;" href="home.php"> Divyesh Patel, Gialani To, Mayur Dudhat, Bansari Jetani </a>| Privacy Policy | Terms of Use </p>
  </footer>






<div id="topnav">
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

print "<h3>$OUT<h3>";



/*
//update the user's exchanges using the most recent rate 

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


*/





$userid = $_SESSION["userid"];
//display all the user's exchanges
$s2 = "select * from exchanges where userID = '$userid' and status='A' order by datetime asc";
$t = mysqli_query ( $db  , $s2)  or die (mysqli_error($db));

 if (mysqli_num_rows($t)== 0 || $t == null) {
                print "You do not have any exchanges.";
        }		
else{
			


print "<br><h2>PORTFOLIO</h2>";
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

}

?>



<button><a href ="trade.php">Trade</a></button>

<button><a href ="AddExchange.php">Add</a></button><br><br><br>









</div>
</body>
</html> 


