<?php

function auth ($user, $pass){
	global $db;
	
	//$s = "select * from A where user = '$user' and pass = '$pass'";
	$s = "select * from User where Username = '$user' and Password = '$pass'";
	$output = "<br>SQL statement is: $s<br>";
	$q = mysqli_query($db, $s) or die (mysqli_error($db));
	/*
	($t = mysqli_query($db, $s)) or die (mysqli_error($db));
	*/
	$num = mysqli_num_rows($q);

	if ($num == 0) {
	return false ; 
	}
	return true;

}

function getdata ($name) {
	global $db;
	
	$temp = $_GET[$name];
	/*
	$temp = mysqli_real_escape_string ($db, $temp);
	*/
	$user = mysqli_real_escape_string($db, $temp);
 
 //echo "<br> $name is: $temp";
 
	return $temp;
}	

	
function buying ( $user, $amnt,$service, &$output  ){

global $db ;

$s2 = "update User SET Current_bal = Current_bal + '$amnt' where  Username = '$user'";
$output .= "<br>SQL statement for update table User is : <br>$s2<br>";
($t2 = mysqli_query($db, $s2)) or die (mysqli_error($db));
$output .="<br> Current balance changed after buying currency into  User  table "; 

  $s = "select * from User where Username = '$user' " ;
	//interact with database to get the results
	$t = mysqli_query($db, $s)  or die ( mysqli_error( $db )) ;
	//number of rows
	$rows = mysqli_num_rows($t);
	
	//While Loop
	while ( $r = mysqli_fetch_array ( $t, MYSQLI_ASSOC) ) {
		
		$user1 = $r["Username"];
		$pass = $r[ "Password" ];
		$current = $r["Current_bal"];
		$output .= "<br>The user is $user1 " ;
		$output .= "The password is $pass " ;
		$output .="The current balance is $current " ;
	}
echo $output;

echo '<a href="trade.html">Back to trade page</a>';
   } 


function selling($user, $amnt,$service,  &$output)
{
	
	global $db;
	$s2   =  "select * from  User where Username = '$user' " ;
	$t5 = mysqli_query( $db,  $s2 )  or die( mysqli_error($db) );
  
	$r2 = mysqli_fetch_array($t5,MYSQLI_ASSOC);
	$current_balance = $r2["Current_bal"];
   
	if ($amnt > $current_balance)
    { 
      echo "<br> Amount is > Balance<br>";
      return;
    }
  

   $s4 = "update User set Current_bal = Current_bal - '$amnt' where Username = '$user'";
    $output .= "<br> SQL statement for Selling currency changing current balance is:<br> $s4";
 	 $t4 = mysqli_query( $db,  $s4 )  or die( mysqli_error($db) );
     $output .="<br><br> Current balance changed after Selling into User table "; 
     
     $s = "select * from User where username = '$user' " ;
	//interact with database to get the results
	$t = mysqli_query($db, $s)  or die ( mysqli_error( $db )) ;
	//number of rows
	$rows = mysqli_num_rows($t);
	
	//While Loop
	while ( $r = mysqli_fetch_array ( $t, MYSQLI_ASSOC) ) {
		
		$user1 = $r["Username"];
		$pass = $r[ "Password" ];
		$current = $r["Current_bal"];
		$output .= "<br>The user is $user1 " ;
		$output .= "The password is $pass " ;
		$output .="The current balance is $current " ;
		//$output .= "The recent transaction is $recent_trans <br>";
	}
	
echo $output;
echo '<a href="trade.html">Back to trade page</a>';
   } 

?>