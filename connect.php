<?php
	//include("../connect.php");
	$server123 = "localhost";
	$us2345 = "root";
	$p2344 = '';
	$db234 = "mydb1";

	// Create connection
	$conn = new mysqli($server123 , $us2345 , $p2344 ,$db234 );

	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";

?>