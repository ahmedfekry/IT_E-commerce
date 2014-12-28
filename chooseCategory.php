<!DOCTYPE html>
<html>
<head>
	<title>Product Category</title>
	<link href="chooseCategory_2.css" rel="stylesheet">
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
		    <form class="sign-up" action="chooseCategory_2.php" method="POST">
			    <h1 class="sign-up-title">Choose Category and Subcategory</h1><br>
			    <h3>Choose category</h3>
			    <input type="submit" name= 'lap' value="Laptop" class="sign-up-button"><br>
				<?php
					if(isset($_POST['lap']))
					{
						echo "
							 <ul class=\"drop-menu\">
								<a href=\"createProduct.php?id=1\" target=\"_self\" ><li>Toshipa</li></a>
								<a href=\"createProduct.php?id=2\" target=\"_self\" ><li>HP</li></a>
							</ul>
						
						";
					
					}
				?>
				
				<input type="submit" name= 'camera' value="Camera" class="sign-up-button"><br>
				<?php 
					if(isset($_POST['camera']))
					{
						echo "
							 <ul class=\"drop-menu\">
								<a href=\"createProduct.php?id=3\" target=\"_self\" ><li>Sony</li></a>
								<a href=\"createProduct.php?id=4\" target=\"_self\" ><li>Canon</li></a>
							</ul>
						
						";
					
					}
				?>
				
				<input type="submit" name= 'mobile' value="Mobile" class="sign-up-button"><br>
				 <?php
					if(isset($_POST['mobile']))
					{
						echo "
							 <ul class=\"drop-menu\">
								<a href=\"createProduct.php?id=5\" target=\"_self\" ><li>Samsong</li></a>
								<a href=\"createProduct.php?id=6\" target=\"_self\" ><li>Nokia</li></a>
							</ul>
						
						";
					}
				 ?>	
				
			
			 
			</form>
			
			
    	</div>
    </div>
    <!-- end of Wrap-->
  	</body>
</html>