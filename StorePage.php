 <?php
	session_start();
	if(!isset($_SESSION['admin']) ) {
		 header ("Location: index.php"); 
		 exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Store Page</title>
	<link href="StorePage.css" rel="stylesheet">
	<!-- link href="css/2-col-portfolio.css" rel="stylesheet" -->
</head>
	<body>
    <!-- -->
    <div class="wrap">
    	<div id="header">
    		<!-- Here's all it takes to make this navigation bar. -->
   			<ul id="nav">
     			 <li id="login"><a href="logOut.php">Logout</a></li>
  			 </ul>
            <!-- done. -->
    	</div>
	    <div class="main">
		    <nav class="nav1">
 				<ul>
					<li><a href="HomeAdmin.php">Home</a></li>
   				    <li><a href="chooseCategory.php">Add new Product</a></li>
    				<li><a href="">Setting</a></li>
  				</ul>
			</nav>
			<!-- Projects Row -->
	        <div class="rows">
				
				<h2>
	                    <a href="">  All Products </a>
	                </h2>
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
					
					
					$sql = "select * from product";    // query
					$result = mysqli_query($conn, $sql);
					
					
					$affected = $conn -> affected_rows;
					
					if ($affected == 0) {
						echo "There are no products";
						exit();
					}
					echo "<ul>";
					while($row = $result->fetch_assoc())
					{
						
						$img = $row['picture'];
						$i= $row['id'];
						echo " 	
							<li>	
							<a href=\"ProductInfo.php?id=$i\" target=\"_blank\"><img src=\"$img\" class=\"pic1\" width=\"200px\" height=\"200px\"/></a>
								<p style = \"text-align: -webkit-center;\"><a href=\"\" title=\"read more\"> Name: ".$row["item_name"]."<br>Quantity: ".$row["quantity_in_stock"]."<br>Price: ".$row["price"]."<br>Category: ".$row["category"]."</a></p>
							</li>
						 ";
					}
					echo "</ul>";
					
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