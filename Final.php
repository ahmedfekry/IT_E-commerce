<?php 
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "e_commerce";
	$currency = "$";
	$customer = $_SESSION['customerId'];
	// $currency = "$";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}
	$query =  "UPDATE order_processing WHERE customer = '$customer'";

	$result = mysqli_query($conn, $query);


 ?>