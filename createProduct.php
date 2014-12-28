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
	<title>Add Product</title>
	<link href="createProduct.css" rel="stylesheet">
	<!-- link href="css/2-col-portfolio.css" rel="stylesheet" -->
</head>
	<body>
	<?php 

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
			//$img  = $_POST['img'];			
			//echo "Done ".$subcategory;
			//echo $img ;
			//exit();
			// check validity
			
			
			//upload image
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["img"]["name"]);	
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			$img = $target_file;
			echo $img;
			// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["img"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["img"]["size"] > 1500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
			
			
			
			//////////////////////////////////////////
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
	     		<li id="home"><a href="StorePage.php">Store</a></li>

	  		</ul>
	  	</div>
	  	<div class="signupform">
		    <form class="sign-up" action="createProduct.php" method="POST"  enctype="multipart/form-data">
			    
				<h1 class="sign-up-title">Add new Product</h1>
			    <input type="text" name="item_name" class="sign-up-input" placeholder="Item name" pattern="[a-zA-Z 0-9]{3,255}"autofocus required>
			    <textarea class="sign-up-input" name="item_description" id="textarea" cols="25" rows="5" placeholder="Description" maxlength="80" pattern="[a-zA-Z 0-9]{3,255}" required></textarea >
			   
			    <input type="text" class="sign-up-input" name="quantity_in_stock" placeholder="Quantity in stock "pattern="[0-9]{1,11}"required>
			    <input type="text" class="sign-up-input" name="price" placeholder="Price " pattern="[0-9]{1,11}"required>
				
				Visible: <input type='radio'  name='visibility' value = '1' placeholder='Visible ' checked='checked' ><br>   
				Not Visible: <input type='radio'  name='visibility' value = '0' placeholder='Not Visible '><br><br>
			   

				<input type="file" class="sign-up-input" id="img"  name = "img"  required>
			    <input type="submit" name= 'sub' value="Add Product" class="sign-up-button">
			</form>
    	</div>
    </div>
    <!-- end of Wrap-->
  	</body>
</html>