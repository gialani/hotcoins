<?php
// this database is used for testing
$hostname = "localhost" ; 			
$username = "testUser" ;
$project  = "testdb" ;
$password = "12345678" ;


$db= mysqli_connect ($hostname,$username,$password,$project);
if (mysqli_connect_errno())
{
echo "Failed To Connect To MySQL:" .mysqli_connect_error();
exit();
}
print "Successfully Connected to MySQL.<br><br><br>";
mysqli_select_db($db,$project);


//this will be used for actual database for our project
//$hostname = "localhost";
//$username =  "dbadmin";
//$project = "paepoq";
//$password = "admin";

?>
