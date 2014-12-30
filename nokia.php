<html>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="untitled.css">

	<head>
		<!-- Ahmed -->
	</head>
	
	<body>

	<form action="homepage.php" method="POST" >
		<div id="menu">
    <ul id="nav">
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
<div>
	<a href="shoppingCart.php"> <img src="shopping2.jpg" width="50px" height="50px" alt="MISSING JPG"> </a>
</div>
	</form>
	<br>
	<?php 
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "e_commerce";
				$currency = "$";
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
			
				$query = "SELECT * FROM product WHERE category = 'mobile' subcategory = 'samsung' ORDER BY id ASC";
			
				$result = mysqli_query($conn, $query);

				// echo "string";
if ($result) {
					// echo "string";
			        while($obj = $result->fetch_object())
		    	    {
				      	echo '<div class="product">'; 
		      	      	echo '<form >';
		        	    // echo '<div class="product-thumb"><img src="images/'.$obj->item_name.'"></div>';
		            	echo '<div class="product-content"><h3>'.$obj->item_name.'</h3>';
		            	// echo '<div class="product-content" ><h3 name = "productId">'.$obj->id.'</h3>';
				      	echo '<input type="hidden" name="productId" value="'.$obj->id.'" />';
		            	echo '<div class="product-content"><h5>'.$obj->item_description.'</h3>';
		            	echo '<div class="product-desc">'.$obj->category.'</div>';
		            	echo '<div class="product-desc">'.$obj->subcategory.'</div>';
		            	echo '<div class="product-info">Price '.$currency.$obj->price.' <button class="add_to_cart" type="submit">Add To Cart</button></div>';
		           	 	echo '</div>';
		            	echo '<input type ="number" value = "1" name="numberOfProducts" min = "1" max = '.$obj->quantity_in_stock.' />';
		            	echo '</form>';
		            	echo '</div>';
		            	echo "--------------------------------------------------------------------------";
		      	        	
			    	}
		    
			}

?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js" ></script>
<script>
$(document).ready(function(){
    $("form").on('submit',function(event){
    event.preventDefault();
        // alert("Hello");
        data = $(this).serialize();

        $.ajax({
        type: "GET",
        url: "createOrderProccessing.php",
        data: data
        }).done(function( msg ) {
        alert( "Data Saved: " + msg );
        });
    });
});
</script>
	</body>

</html>
      