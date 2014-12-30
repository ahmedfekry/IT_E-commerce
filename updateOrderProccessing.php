<?php 
	$servername = "localhost";
	$dbname = "e_commerce";
	$password = "";
	$username = "root";

	$orderId = $_GET['orderId'];
	$number = $_GET['numberOfProducts2'];
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if (!$conn) {
		die("Connection Field ".mysqli_connect_error());
	}
	$query =  "UPDATE order_processing SET quantity = '$number'  WHERE id = '$orderId' ";

	if ( mysqli_query($conn, $query)) {
		echo "updated".$orderId;
	}else{
		echo "Failed";
	}
 ?>