 <?php
	session_start();
	if(!isset($_SESSION['admin']) ) {
		 header ("Location: index.php"); 
		 exit();
	}
	
	if(isset($_POST['sub']))
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "e_commerce";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$shipping_company = $_POST['shipping_company'];
		$tracking_number = $_POST['tracking_number'];
		$id = $_POST['id'];
		
		
		$sql = "update order_processing
						
				set order_processing.shipped = '1',
					order_processing.date_shipped = Now(),
					order_processing.shipping_company = '$shipping_company',
					order_processing.tracking_number = '$tracking_number'
				where  order_processing.id = $id ;		
		
		";    
		$result = mysqli_query($conn, $sql);
		
		$affected = $conn -> affected_rows;
		
		if ($affected == 0) {
			echo "Error happend";
			exit();
		}
		else
			echo "Done";
		header("Location: ShippingPage.php");
		
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shiping Orders</title>
	<link href="ShippingPage.css" rel="stylesheet">
	<!-- link href="css/2-col-portfolio.css" rel="stylesheet" -->
</head>
	<body>
    <!-- -->
    <div class="wrap">
    	<div id="header">
    		<!-- Here's all it takes to make this navigation bar. -->
   			<ul id="nav">

     			 <li id="login"><a href="logout.php">Logout</a></li>
  			 </ul>
            <!-- done. -->
    	</div>
	    <div class="main">
		    <nav class="nav1">
 				<ul>
					<li><a href="HomeAdmin.php">Home</a></li>
    				<li><a href="">Setting</a></li>
  				</ul>
			</nav>
			<!-- Projects Row -->
	        <div class="rows">
				
				<h2>  <a href="">  Orders need to be shiped  </a>          </h2>
				
				<table class="footable">
				<thead>
					<tr>
						<th>Order ID</th>
						<th>User ID</th>
						<th>Product ID</th>
						<th>Quantity</th>
						<th>Transaction Date</th>
						<th>Shipping Company</th>
						<th>Tracking Number</th>
						<th>	</th>
					</tr>
				</thead>
				<tbody class="elements">
				<?php
					
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "e_commerce";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					
					
					$sql = "SELECT *FROM order_processing
						WHERE shipped=0 and processed=1";    
					$result = mysqli_query($conn, $sql);
					
					$affected = $conn -> affected_rows;
					
					if ($affected == 0) {
						echo "There are no Orders need to be shipped";
						exit();
					}

					while($row = $result->fetch_assoc())
					{
						$i= $row['id'];
						echo " 	
							<tr>
							<form action=\"ShippingPage.php\" method=\"post\">
							<td> <input type=\"text\" name=\"id\"  value = '$i' required readonly = 'readonly' size= '5'> </td>
							<td>".$row['customer']."</td> 
							<td>".$row['product']."</td>
							<td>".$row['quantity']."</td>
							<td>".$row['date']."</td>
							
							<td> <input type=\"text\" name=\"shipping_company\"  required  style=\"width:100%\"> </td>
							<td> <input type=\"text\" name=\"tracking_number\"  required style=\"width:100%\"> </td>
							<td> <input type=\"submit\" value=\"Ship\" name = 'sub' style=\"width: 90px; height: 30px;\"> </td>
							</form>
							</tr>
							
						 ";
					}
					
				?>
				 </tbody>
				</table>
				
  				<pre><a href=""><span class="chevron2 left"></span></a>  <a href=""><span class="chevron2 right"></span></a></pre>
			</div>
    	</div>
    	<div class="footer">
    	</div>
    </div>
    <!-- -->
  	</body>
</html>