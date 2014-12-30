<?php 
	$servername = "localhost";
	$dbname = "e_commerce";
	$password = "";
	$username = "root";

	$orderId = $_GET['orderId'];

	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if (!$conn) {
		die("Connection Field ".mysqli_connect_error());
	}

	$query =  "DELETE FROM order_processing WHERE id = '$orderId' ";

	if ( mysqli_query($conn, $query)) {
		echo "Deleted".$orderId;
	}else{
		 echo "Error deleting record: " . mysqli_error($conn);
	}

 ?>