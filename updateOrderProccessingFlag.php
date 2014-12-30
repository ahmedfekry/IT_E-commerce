<?php 
	// $data = $_GET['Data'];
	// $data = json_decode($data,true);
	$servername = "localhost";
	$dbname = "e_commerce";
	$password = "";
	$username = "root";

	$orderId = $_GET['orderId'];
	echo $orderId;
	echo $number;
	// echo "<script> alert('.$orderId.');</script>";
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if (!$conn) {
		die("Connection Field ".mysqli_connect_error());
	}
// '$data['numb']'
	$query =  "UPDATE order_processing SET  processed = '1'  WHERE id = '$orderId' ";

	// $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
	// $result = mysqli_query($conn, $query);
	if ( mysqli_query($conn, $query)) {
		echo "Purchased";
	}else{
		echo "Failed";
	}
 ?>