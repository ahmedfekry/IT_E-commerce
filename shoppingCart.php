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
				<th><span class="fancy-blue" style="font-size:16px">Transaction number</span></th>
    			<th><span class="fancy-blue" style="font-size:16px">Item name</span></th>
    			<th><span class="fancy-blue" style="font-size:16px">Item Description</span></th>		
    			<th><span class="fancy-blue" style="font-size:16px">Category</span></th>		
    			<th><span class="fancy-blue" style="font-size:16px">SubCategory</span></th>		
    			<th><span class="fancy-blue" style="font-size:16px">Price</span></th>
    			<th><span class="fancy-blue" style="font-size:16px">Number</span></th>
    			<th><span class="fancy-blue" style="font-size:16px">Update Or Remove</span></th>
  			</tr>';
		 while($obj = $result->fetch_object())
		    	{

		    		$query1 = "SELECT * FROM product WHERE id = '$obj->product'";
		    		$obj1 = mysqli_query($conn, $query1);
					$row = $obj1->fetch_object();
					echo "<form>";
				    echo '<tr>
		      	    		<td class="col-md-2" ><span style="font-size:16px" class="fancy-blue"><input type="hidden" name = "orderId" value = '.$obj->id.'></input>'.$obj->id.'</spen></td>
    						<td class="col-md-2">
                              <span style="font-size:16px" class="fancy-blue">'.$row->item_name.'</span>
                             </td>
                            <td class="col-md-2">
                              <span style="font-size:16px" class="fancy-blue">'.$row->item_description.'</span>
                             </td>
                            <td class="col-md-2">
                              <span style="font-size:16px" class="fancy-blue">'.$row->category.'</span>
                             </td>
                            <td class="col-md-2">
                              <span style="font-size:16px" class="fancy-blue">'.$row->subcategory.'</span>
                             </td>
                             <td class="col-md-2">
                              <span style="font-size:16px" class="fancy-blue">'.$currency.$row->price.'</span>
                             </td>
  							 <td class="col-md-2">
                              <span style="font-size:16px" class="fancy-blue"><input name ="numberOfProducts2" type ="number" value = '.$obj->quantity.' name="numberOfProducts" min = "1" max = '.$row->quantity_in_stock.' /></span>
                             </td>
  							<td class="col-md-2">
                              <span style="font-size:16px" class="fancy-blue"><div>
                              <div class="col-sm-8 col-xs-6">
                              <button type="submit"  name="update" class="classAndDocsFormSubmit" value = "update" >update</button>
  								</div><div class="col-sm-8 col-xs-6">
  									 <button type="submit"  name="remove" class="classAndDocsFormSubmit" value = "remove" >remove</button>
  									</div>
  							</div></span>
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
	<button class='add_to_cart' style="width:50%; position:relative;left: 450px;"><a href = 'checkout.php'> Checkout</a> </button>      
</div>

</div>

<script src="http://code.jquery.com/jquery-1.10.1.min.js" ></script>
<script>
$(document).ready(function(){
	var buttonpressed;
    $('.classAndDocsFormSubmit').click(function() { 
    	buttonpressed = $(this).attr('name') 
	})
    $("form").submit(function(event){
    // alert(buttonpressed);
    event.preventDefault();
 		data = $(this).serialize();
        var url = null;
        if (buttonpressed == 'update') {
        	url = 'updateOrderProccessing.php';
	        $.ajax({
		        type: "GET",
		        url: url,
		        data: data
	        }).done(function( msg ) {
	        	alert( "Data : " + msg );
	        });
        }else{
        	url = 'removeOrderProccessing.php';
        	$.ajax({
		        type: "GET",
		        url: url,
		        data: data
	        }).done(function( msg ) {
	        	alert( "Data : " + msg );
	        });
        	
        };
    });
   	

});
</script>
	</body>

</html>