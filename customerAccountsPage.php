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
	<title>Customer Accounts</title>
	<link href="customerAccountsPage.css" rel="stylesheet">
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
				
				<h2>  <a href="">  All Customers </a>          </h2>
				
				<table class="footable">
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>e-mail</th>
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
					
					
					$sql = "select id, first_name, last_name, email   from customer";    // query
					$result = mysqli_query($conn, $sql);
					
					$affected = $conn -> affected_rows;
					
					if ($affected == 0) {
						echo "There are no Customers";
						exit();
					}

					while($row = $result->fetch_assoc())
					{
						$i= $row['id'];
						echo " 	
							<tr><td>".$i."</td><td>".$row['first_name']."</td>	 <td>".$row['last_name']."</td>	 <td> <a href=\"customerInfo.php?id=$i\" target=\"_blank\">" .$row['email']."  </a> </td>	</tr>
							
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