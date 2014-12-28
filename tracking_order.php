 <?php
	session_start();
	if(!isset($_SESSION['customerId']) ) {
		 header ("Location: index.php"); 
		 exit();
	}
	
	 
?>
<!DOCTYPE html>
<html>
<head>

	<title>Tracking Order</title>
	<link href="tracking_order.css" rel="stylesheet">
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
					<li><a href="HomeCustomer.php">Home</a></li>
    				<li><a href="">Setting</a></li>
  				</ul>
			</nav>
			<!-- Projects Row -->
	        <div class="rows">
				
				<h2>  <a href="">  Track Order </a> </h2>
				
				<form action="tracking_order.php" method="post">
				<label>Transaction ID: </label><input type="text" name="id" required pattern = "[0-9]{1,}"><br><br>
				<input type="submit" value="track" name = 'sub' style="width: 120px; height: 30px;">
				</form>
				
				<?php
					if(isset($_POST['sub']))
					{
						$ID=$_POST['id'];
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "e_commerce";
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}
						if(!is_numeric($ID))
						{
							echo " Enter a valid Transaction number ";
							exit();
						}
						$cid = $_SESSION['customerId'] ;
						$query="SELECT *FROM order_processing
						WHERE id=$ID  and processed=1 and customer = $cid" ;
						$result=mysqli_query($conn,$query);
						if(mysqli_num_rows($result) == 0)
						{
							echo "wrong transaction id";
							exit();
						}
						
						echo"<table class=\"footable\">
						<thead>
						<tr>
						<th>Transaction number</th>
						<th>Transaction date</th>
						<th>Shipping company</th>
						<th>Tracking number</th>
						<th>Shipping Date</th>
						</tr>
						</thead>
						<tbody class=\"elements\">
						";
						while ($row = mysqli_fetch_array($result)) {
							echo "
							<tr>
							<td> " .$row['id']."	</td>
							<td> " .$row['date']." 	</td>
							<td> " .$row['shipping_company']." 	</td>
							<td> " .$row['tracking_number']." </td>
							<td> " .$row['date_shipped']." </td>
							</tr>
							 ";
						}
						echo "</tbody></table>";		
					}
				?>
  				<pre><a href=""><span class="chevron2 left"></span></a>  <a href=""><span class="chevron2 right"></span></a></pre>
			</div>
    	</div>
    	<div class="footer">
    	</div>
    </div>
    <!-- -->
  	</body>
</html>