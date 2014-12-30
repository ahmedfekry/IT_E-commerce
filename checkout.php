<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "e_commerce";
	$currency = "$";
	// $currency = "$";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}
	$query =  "SELECT * FROM order_processing WHERE customer = '1'";

	$result = mysqli_query($conn, $query);


	if ($result) {
		echo '<table border= "1" style="width:100%">';
		echo '<tr>
				<th>Transaction number</th>
    			<th>Item name</th>
    			<th>Item Description</th>		
    			<th>Category</th>		
    			<th>SubCategory</th>		
    			<th>Price</th>
    			<th>Quantity</th>
    			<th>Total Price</th>
    			<th>Update Or Remove</th>
  			</tr>';
		 while($obj = $result->fetch_object())
		    	{
		    		$query1 = "SELECT * FROM product WHERE id = '$obj->product'";
		    		$obj1 = mysqli_query($conn, $query1);
					$row = $obj1->fetch_object();
					echo "<form action = 'Final.php'>";
				    echo '<tr>
		      	    		<td>'.$row->item_name.'</td>
    						<td>'.$row->item_description.'</td>		
    						<td>'.$row->category.'</td>
  							<td>'.$row->subcategory.'</td>
  							<td>'.$currency.$row->price.'</td>
  							<td>'.$obj->quantity.'</td>
							<td>'.$obj->quantity*$row->price.'</td>
  							<td><div><button name = "update" type = "submit">Purchase</button>
  							</div></td>
  						</tr>';
		    		echo "</form>";

			    	}
			    	echo '</table>';
			    	echo "<button class='add_to_cart' ><a href = 'Final.php'> Purchase</a> </button>";
	}	

 ?>
 <script src="http://code.jquery.com/jquery-1.10.1.min.js" ></script>
<script>
$(document).ready(function(){
    $("form").on('submit',function(event){
    event.preventDefault();
        data = $(this).serialize();
        $.ajax({
        type: "GET",
        url: "updateOrderProccessingFlag.php",
        data: data
        }).done(function( msg ) {
        alert( "Data Saved: " + msg );
        });
    });

});
</script>

	</body>

</html>
      