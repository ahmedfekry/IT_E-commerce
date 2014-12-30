
<?php 
if ($_GET) {
	// $customer = 1;
	$product = $_GET['productId'];
	$quantity = $_GET['numberOfProducts'];
	// echo "<script type='text/javascript'>alert('Done');</script>";
	// echo $quantity;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "e_commerce";
	$customer = $_SESSION['customerId'];
	// $currency = "$";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}
	$query =  "INSERT INTO `order_processing`  (quantity, processed, shipped, customer,product)
			VALUES ('$quantity', '0', '0','$customer','$product')";

	$result = mysqli_query($conn, $query);

	if ($result) {
		// echo "<script type='text/javascript'>alert('Done');</script>";
		echo "product selected";
	}else{
		echo "Error: " . $result . "<br>" . $conn->error;
	}
}
 ?>