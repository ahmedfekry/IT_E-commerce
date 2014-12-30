<!DOCTYPE html>
<html>
<head>
	<title>Store Page</title>
	<link href="StorePage.css" rel="stylesheet">
	<link rel="stylesheet" href="untitled.css">
	<link rel="stylesheet" href="stylesheets/bootstrap.min.css">

	<link rel="stylesheet" href="bootstrap/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/bootstrap-checkbox.css">

	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/application.css.scss">
	<link rel="stylesheet" href="stylesheets/animate.css">
	<link rel="stylesheet" href="stylesheets/bootstrap-glyphicons.css">
	<link rel="stylesheet" href="stylesheets/carousel.css">
	<link rel="stylesheet" href="stylesheets/onebyone.css">
	<link rel="stylesheet" href="stylesheets/sticky-footer.css">
	<link rel="stylesheet" href="select/bootstrap-select.css">
	<link rel="stylesheet" href="select/bootstrap-select.min.css">
	<link rel="stylesheet" href="select/bootstrap-select.css.map">




</head>
	<body>
    <!-- -->
    <div class="wrap">
    	<div id="header">
    		<!-- Here's all it takes to make this navigation bar. -->
   			<ul id="nav">
  		
     			 <li id="login"><a href="logOut.php">Logout</a></li>
   				 <li id="login"><a href="homepage.php">Home Page</a></li>
  			 </ul>
            <!-- done. -->
    	</div>

	 <section class="header-section">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <span class="fancy-yellow" style="color:#65B0DD;font-size:50px;margin:100px 0px 0px 250px;">Orders</span>
            </div>
          </div>
        </div>
      </section>
<?php 
	// echo "string";
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
	$query =  "SELECT * FROM order_processing WHERE customer = '1' ";

	$result = mysqli_query($conn, $query);


	if ($result) {
echo '<div id="main">
      <div class="row">
        <div class="col-sm-12">
            <div id="content">
              <section class="shopping-cart">
                <div class="table-responsive">
                    <fieldset>
                      <table class="table table-bordered">
                        <tbody>';
		echo '<tr>
				<th><span class="fancy-blue" style="font-size:16px">Item name</span></th>
    			<th><span class="fancy-blue" style="font-size:16px">Item Description</span></th>		
    			<th><span class="fancy-blue" style="font-size:16px">Category</span></th>		
    			<th><span class="fancy-blue" style="font-size:16px; width: 200px;">SubCategory</span></th>		
    			<th><span class="fancy-blue" style="font-size:16px;">Price</span></th>
    			<th><span class="fancy-blue" style="font-size:16px;">Quantity</span></th>
    			<th><span class="fancy-blue" style="font-size:16px;">Total Price</span></th>

    		</tr>';
		 while($obj = $result->fetch_object())
		    	{

		    		$query1 = "SELECT * FROM product WHERE id = '$obj->product'";
		    		$obj1 = mysqli_query($conn, $query1);
					$row = $obj1->fetch_object();
					echo "<form>";
				    echo '<tr>
		      	    		<td class="col-md-6">
                              <span style="font-size:16px" class="fancy-blue">'.$row->item_name.'</span>
                             </td>
                            <td class="col-md-4">
                              <span style="font-size:16px" class="fancy-blue">'.$row->item_description.'</span>
                             </td>
                            <td class="col-md-4">
                              <span style="font-size:16px" class="fancy-blue">'.$row->category.'</span>
                             </td>
                            <td class="col-md-6" >
                              <span style="font-size:16px" class="fancy-blue">'.$row->subcategory.'</span>
                             </td>
                             <td class="col-md-6" style = "width: 5000px;">
                              <span style="font-size:16px" class="fancy-blue">'.$currency.$row->price.'</span>
                             </td>
  				             <td class="col-md-6" style = "width: 20px;">
                              <span style="font-size:16px" class="fancy-blue">'.$obj->quantity.'</span>
                             </td>
  				             <td class="col-md-6" style = "width: 20px;">
                              <span style="font-size:16px" class="fancy-blue">'.$currency.$row->price*$obj->quantity.'</span>
                             </td> 				             
  				             </tr>';
		    		echo "</form>";

			    	}
			    	echo '</tbody>
                      </table>
                    </fieldset>
                </div>
              </section>
            </div>
          </div>
      </div>
  </div>';
			    	// echo "";
	}	

 ?>
		 <!-- <pre><a href=""><span class="chevron2 left"></span></a>  <a href=""><span class="chevron2 right"></span></a></pre> -->
<div class="col-sm-8 col-xs-6">
	<button class='add_to_cart' style="width:50%; position:relative;left: 450px;"><a href = 'Final.php'>purchase</a> </button>      
</div>

</div>

	</body>

</html>