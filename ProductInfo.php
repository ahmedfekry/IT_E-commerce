<!DOCTYPE html>
<html>
<head>
	<title>Product Information</title>
	<link href="ProductInfo.css" rel="stylesheet">
	<!-- link href="css/2-col-portfolio.css" rel="stylesheet" -->
</head>
	<body>
	
    <!--Wrap start -->
    <div class="wrap">
	    <div class="header">
	    	<ul class="wrap-top" id="nav">
	     		<li id="home"><a href="Home.php">Home</a></li>

	  		</ul>
	  	</div>
	  	<div class="signupform">
		    <form class="sign-up" action="ProductInfo.php" method="POST">
			    <!-- insert el code beta3 el img-->
				<?php
					
					//include("Controllers.php");
					if ( (! isset($_GET['id']) ) && (!isset($_POST['sub']) )) 
					{
						//header ("Location: Home.php");
						echo "error";
						exit();
					}
					if(session_id() == '' || !isset($_SESSION)) {
						// session isn't started
						session_start();
						
					}
					

					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "e_commerce";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					
					if(isset($_SESSION['productid']))
					{
						$productid = $_SESSION['productid'];
						unset($_SESSION['productid']);
					}
					else
						$productid = $_GET['id'];
					
					
					// Update Code
					if (isset($_POST['sub'])) 
					{
						//******** validate data //*******
						
						
						$item_name = $_POST['item_name'];
						$item_description = $_POST['item_description'];
						$quantity_in_stock = $_POST['quantity_in_stock'];
						$visibility = $_POST['visibility'];
						$price = $_POST['price'];
						$price = $price - 0;


						
						
						$sql = " update product
						
						set product.item_name = '$item_name ' ,
						 product.item_description = '$item_description ' ,
						 product.quantity_in_stock = '$quantity_in_stock ' ,
						 product.Visible= '$visibility ' ,
						 product.price = '$price'

							WHERE id = $productid ;"
							;
						$query =  mysqli_query($conn, $sql);
						$affected = $conn -> affected_rows;
						if ($affected == 1)
						{
							//echo "dddddddd";
							header ("Location: StorePage.php");
							exit();
						}
						echo "errrrrrrrrrrrror";
						exit();
					}
					
					// display Code
					///////////////////////////////////////// load info
					$productid = $_GET['id'];
					$sql = "SELECT * FROM product WHERE id = '$productid' ";
					$query =  mysqli_query($conn, $sql);
					$row = $query->fetch_assoc();
						
					$access	= false;
					if(isset($_SESSION['admin']))
					{
						$access = true;					
						$_SESSION['productid'] = $row['id'];
					}
					
					$item_name = $row['item_name'];
					$item_description = $row['item_description'];
					$quantity_in_stock = $row['quantity_in_stock'];
					$visibility = $row['visible'];
					$price = $row['price'];
					$price = $price - 0;
					$img  = $row['picture'];
					$category = $row['category'];	
					$subcategory = $row['subcategory'];
					
					
					echo "<img src=\"$img\" height=\"400px\" width=\"600px\" name = \"imge\">					
					<h3>Item name: <input type=\"text\" value=\"$item_name\" name=\"item_name\" class=\"sign-up-input\" required></h3>
					<h3>item_description: <textarea value = \"$item_description\" class=\"sign-up-input\" name=\"item_description\" id=\"textarea\" cols=\"50\" rows=\"30\" maxlength=\"80\" required>".$item_description."</textarea></h3>
					<h3>quantity_in_stock: <input type=\"text\" value=\"$quantity_in_stock\" name=\"quantity_in_stock\" class=\"sign-up-input\" required ></h3>
					";
					if($visibility == 1)
					{
						echo "
						Visible: <input type='radio'  name='visibility' value = '1' placeholder='Visible ' checked='checked' ><br>   
						Not Visible: <input type='radio'  name='visibility' value = '0' placeholder='Not Visible '><br><br>
						";
					}
					else
					{
						echo "
						Visible: <input type='radio'  name='visibility' value = '1' placeholder='Visible '  ><br>   
						Not Visible: <input type='radio'  name='visibility' value = '0' placeholder='Not Visible ' checked='checked'><br><br>
						";
					}
					
					echo "
					<h3>price: <input type=\"text\" value = \"$price\" class=\"signk-up-input\" name=\"price\" required></h3>
					<h3>category: <input type=\"text\" value=\"$category\" name=\"category\" class=\"sign-up-input\" required readonly='readonly'></h3>
					<h3>subcategory: <input type=\"text\" value = \"$subcategory \" name=\"subcategory\" class=\"sign-up-input\" required readonly='readonly'></h3>					
					";
					if($access)
					{
						echo "	
							<br>
							<a href=\"deleteProduct.php?id=$productid \">Delete</a>
							<input type=\"submit\" name='sub' value=\"Update\" class=\"sign-up-button\">"
								;
					}
								
				?>
				
			   
			    
				
			</form>
    	</div>
    </div>
    <!-- end of Wrap-->
  	</body>
</html>