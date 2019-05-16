#!/usr/bin/php

<?php
include ("functions.php");

//retrieves hourly rates from API
$url = "https://openexchangerates.org/api/latest.json?app_id=8854e667a35041f185f3efef9ee95d02&base=USD";
$data = file_get_contents($url);
$exchangedata = json_decode($data, true);
$rates= $exchangedata["rates"];

//convert UNIX epoch timestamp to local time
$timestamp = date('M/d/Y-H:i:s', $exchangedata["timestamp"] );



//Update rates table
$db = connectDB();

foreach($rates as $key => $value){
	$r = 0.00001 * (int)($value*100000);
	 
	($t = mysqli_query ( $db  , "update rates set ratePerUSD='$r', lastUpdated='$timestamp' where ISO = '$key'"))  or die (mysqli_error($db));
}


//Update exchanges table
($t = mysqli_query ( $db  , "select * from exchanges"))  or die (mysqli_error($db));
while ( $r = mysqli_fetch_array($t, MYSQLI_ASSOC)){
	
	$toCurr = $r["toCurr"];
	$currRate= $rates["$toCurr"];
	$a = $r["amount"];
	$currUSD = $a/$currRate;
	$xid = $r["exchangeid"];
	
	($q = mysqli_query ( $db  , "update exchanges set rate='$currRate', currentUSD='$currUSD' where exchangeid='$xid' and toCurr='$toCurr' and status='A'"))  or die (mysqli_error($db));
		
}




/*


				





*/
?>	


