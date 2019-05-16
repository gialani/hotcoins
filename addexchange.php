<?php
session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
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

a:link, a:visited {
  color: white;
  padding: 14px 35px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:active {
  background-color: gray;
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

h1   {color: blue;}

#inputbox{text-align: center;}

.refreshed{ text-align: center; font-size: 10pt }
table, th, td {
  border: 1px solid black;
background-color: white;
}

#dialog p{
	color: #000000;
}

.main {
margin: 0 auto; 
width:80%;
  
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 12px;
}
.menu{
width: 75px;

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
          <li><a href="">Historical Graphs</a></li>
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
    


<body>
<div class="main">
<?php
/*
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
*/

$username = $_SESSION["username"];
$currbal= $_SESSION["currbal"];

print "<br>Hello, $username!<br>";
print "Your current balance in USD: $$currbal<br>";
?>

<form action="viewportfolio.php" target="_self">
<div><button type="submit">Go back to portfolio</button></div>
</form>





<form action="RabbitMQClient.php" target="_self">



Enter amount in USD:
<input id='inputbox' name= amount type='text' ></input>
<br>Pick currency to exchange to:


<select id="menu">
<?php
$url = "https://openexchangerates.org/api/currencies.json";
$data = file_get_contents($url);
$currencies = json_decode($data, true);
$ISO=(array_keys($currencies));




foreach($ISO as $value){ 
	echo '<option   value ="' . $value .'"> ' . $value . '</option>';
}
?>
</select>


<button type="submit" style= "width: 75px;" name='type' value='Add'>Buy</button><br><br><br><br>



</form>

</div>
<br><br><br>
</body>
</html>
