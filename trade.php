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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<style>



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
      <li class="active"><a href="#">Home</a></li>
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
      <li><a href="newAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>


<footer>
      <p> &copy; 2019 <a style="color:#0a93a6; text-decoration:none;" href="home.php"> Divyesh Patel, Gialani To, Mayur Dudhat, Bansari Jetani </a>| Privacy Policy | Terms of Use </p>
  </footer>




<div class="main">
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
if (mysqli_num_rows($t)== 0 || $t == null) {
                print "You do not have any exchanges.";
		
        }

?>

<form action='RabbitMQClient.php' target='_self'>
<div><button type='submit' name = 'type' value = 'Portfolio'>Go back to portfolio</button></div>
</form>
<form action="tradeform.php" target="_self">
<?php 
if (mysqli_num_rows($t)>0) {
                
		
        

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





}
?>





</form>
</div>

</body>
</html>
