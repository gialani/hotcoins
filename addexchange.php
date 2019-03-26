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
table, th, td {
  border: 1px solid black;
background-color: white;
}

#inputbox{
	text-align: center;
}

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

?>

<form action="viewportfolio.php" target="_self">
<div><button type="submit">Go back to portfolio</button></div>
</form>





<form action="testRabbitMQClient.php" target="_self">



Enter amount in USD:
<input id='inputbox' type='text' ></input>
<br>Pick currency to exchange to:


<select id="menu">
<?php
$url = "https://openexchangerates.org/api/currencies.json";
$data = file_get_contents($url);
$currencies = json_decode($data, true);
$ISO=(array_keys($currencies));




foreach($ISO as $value){ 
	echo '<option  value ="' . $value .'"> ' . $value . '</option>';
}
?>
</select>


<button type="submit" style= "width: 75px;" name='type' value='Buy'>Buy</button>





</form>
</div>

</body>
</html>
