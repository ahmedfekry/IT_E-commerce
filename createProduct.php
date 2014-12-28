<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link href="createProduct.css" rel="stylesheet">
	<!-- link href="css/2-col-portfolio.css" rel="stylesheet" -->
</head>
	<body>
	<?php 
	session_start();
	if(!isset($_GET['id']) && !isset($_SESSION['cat']) )
	{
		echo "You are not logged in";
		// return home
		exit();
	}
	if(isset($_GET['id']))
	{
		if($_GET['id'] ==1)
		{
			$_SESSION['cat']= "lap";
			$_SESSION['subcat']= "toshipa";
		}
		else if($_GET['id'] ==2)
		{
			$_SESSION['cat']= "lap";
			$_SESSION['subcat']= "hp";
		}
		else if($_GET['id'] ==3)
		{
			$_SESSION['cat']= "camera";
			$_SESSION['subcat']= "sony";
		}
		else if($_GET['id'] ==4)
		{
			$_SESSION['cat']= "camera";
			$_SESSION['subcat']= "canon";
		}
		else if($_GET['id'] ==5)
		{
			$_SESSION['cat']= "mobile";
			$_SESSION['subcat']= "samsong";
		}
		else if($_GET['id'] ==6)
		{
			$_SESSION['cat']= "mobile";
			$_SESSION['subcat']= "nokia";
		}
	}

////////////////////////////////////////	
		if (isset($_POST['sub'])) 
		{
			$category = $_SESSION['cat'];
			$subcategory  = $_SESSION['subcat'];
			unset($_SESSION['cat']);
			unset($_SESSION['subcat']);
			
			$item_name = $_POST['item_name'];
			$item_description = $_POST['item_description'];
			$quantity_in_stock = $_POST['quantity_in_stock'];
			$visibility = $_POST['visibility'];
			$price = $_POST['price'];
			$price = $price - 0;
			$img  = $_POST['imge'];			
			//echo "Done ".$subcategory;
			
			// check validity
			
			
			////////////////////
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "e_commerce";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			 
			$sql = "INSERT INTO product (	item_name,item_description,quantity_in_stock,visible,price,category,subcategory, picture)
					VALUES ('$item_name','$item_description', '$quantity_in_stock','$visibility','$price','$category','$subcategory', '$img')";
			$result = mysqli_query($conn, $sql);

			$affected = $conn -> affected_rows;
			if ($affected == 1) {
				
				header ("Location: chooseCategory.php");
				echo "Product created successfully";
				exit();
			}
			else{
				//header ("Location: chooseCategory.php");
				echo "Error happend during saving  ".mysql_error();
				exit();
			}
			
		} 
		
			


 ?>
    <!--Wrap start -->
    <div class="wrap">
	    <div class="header">
	    	<ul class="wrap-top" id="nav">
	     		<li id="home"><a href="Home.php">Home</a></li>

	  		</ul>
	  	</div>
	  	<div class="signupform">
		    <form class="sign-up" action="createProduct.php" method="POST">
			    
				<h1 class="sign-up-title">Add new Product</h1>
			    <input type="text" name="item_name" class="sign-up-input" placeholder="Item name" autofocus required>
			    <textarea class="sign-up-input" name="item_description" id="textarea" cols="25" rows="5" placeholder="Description" maxlength="80" required></textarea >
			   
			    <input type="text" class="sign-up-input" name="quantity_in_stock" placeholder="Quantity in stock "required>
			    <input type="text" class="sign-up-input" name="price" placeholder="Price " required>
				
				Visible: <input type='radio'  name='visibility' value = '1' placeholder='Visible ' checked='checked' ><br>   
				Not Visible: <input type='radio'  name='visibility' value = '0' placeholder='Not Visible '><br><br>
			   

				<input type="file" class="sign-up-input" id="upload" accept="image/*" name = "imge" required>
			    <input type="submit" name= 'sub' value="Add Product" class="sign-up-button">
			</form>
    	</div>
    </div>
    <!-- end of Wrap-->
  	</body>
</html>