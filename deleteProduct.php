<?php
$adID = $_GET['id']	;
//echo $adID;

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "SAMA";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	$sql = "delete  FROM ad WHERE id = '$adID' ";
	$query =  mysqli_query($conn, $sql);

	header ("Location: profile.php");

?>