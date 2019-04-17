#!/usr/bin/php
<?php
function connectDB(){
	ini_set('display_errors','On');
	error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
	$db= mysqli_connect ('127.0.0.1','testuser','12345678','hotcoins');
	if (mysqli_connect_errno())
	{
		echo ("Failed To Connect To MySQL:" .mysqli_connect_error());
		exit();
	}
	//echo ("Successfully Connected to MySQL.<br><br><br>");
	mysqli_select_db($db,'hotcoins');
	return $db;
}


?>
