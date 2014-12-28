 <?php
	session_start();
	if(!isset($_SESSION['admin']) ) {
		 header ("Location: index.php"); 
		 exit();
	}
	$customerID = $_GET['id']	;
	

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "e_commerce";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	$sql = "delete  FROM customer WHERE id = '$customerID' ";
	$query =  mysqli_query($conn, $sql);

	header ("Location: StorePage.php");

?>