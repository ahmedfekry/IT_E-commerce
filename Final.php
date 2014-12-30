 <!DOCTYPE html>
<html>
<head>
	<title>Store Page</title>
	<link href="StorePage.css" rel="stylesheet">
	<link rel="stylesheet" href="untitled.css">

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
					<li><a href="homepage.php">Home</a></li>
                    <li><a href="shoppingCart.php" target="_self" >Shopping Cart</a></li>
					<div id="menu">
					    <ul id="nav2">
					        <!-- <li><a href="#" target="_self" >Main Item 1</a></li> -->
					        <li><a href="homepage.php" target="_self" name="selected">select category</a>
					            <ul>
					                <li><a href="homepage.php" >All products</a></li>
					                <li><a href="laptop.php"  >lap-tops</a>
					                    <ul>
					                        <li><a href="toshipa.php"  >toshipa</a>
					                        <li><a href="hp.php"  >hp</a>
					                    </ul>
					                </li>
					                <li><a href="camera.php"  >Camera</a>
					                    <ul>
					                        <li><a href="sony.php"  >sony</a>
					                        <li><a href="canon.php"  >canon</a>
					                    </ul>
					                </li>
					                <li><a href="mobile.php"  >mobile</a>
					                    <ul>
					                        <li><a href="samsung.php" >samsung</a>
					                        <li><a href="nokia.php"  >nokia</a>
					                    </ul>
					                <!-- </li>
					                <li><a href="others.php"  >others</a>
					                    
					                </li> -->
					            </ul>
					        </li>
					    </ul>
					</div>

  				</ul>
			</nav>
			<!-- Projects Row -->
	        <div class="rows">
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
	$query =  "UPDATE order_processing SET processed = '1'  WHERE customer = '$customer'";

	$result = mysqli_query($conn, $query);
	if ($result) {
		echo("Thanks");
	}
 ?>
		
  			</div>
    	</div>
    </div>
  	</body>
</html>