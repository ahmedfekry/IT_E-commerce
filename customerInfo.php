<!DOCTYPE html>
<html>
<head>
	<title>Customer Information</title>
	<link href="customerInfo.css" rel="stylesheet">
	<!-- link href="css/2-col-portfolio.css" rel="stylesheet" -->
</head>
	<body>
	
    <!--Wrap start -->
    <div class="wrap">
	    <div class="header">
	    	<ul class="wrap-top" id="nav">
	     		
			<div class="wrap">
			<div id="header">
    		<!-- Here's all it takes to make this navigation bar. -->
   			<ul id="nav">

     			 <li id="login"><a href="logout.php">Logout</a></li>
  			 </ul>
            <!-- done. -->
    	</div>
	  		</ul>
	  	</div>
		
	  	<div class="signupform">
		    <form class="sign-up" action="customerInfo.php" method="POST">
			<h1 class="sign-up-title">Personal Information</h1>
			    <!-- insert el code beta3 el img-->
				<?php
					if(session_id() == '' || !isset($_SESSION)) {
						// session isn't started
						session_start();
						
					}
					
					if(!isset($_SESSION['custid']) && !isset( $_GET['id']) )
					{
						if(!isset($_SESSION['customerId']) && !isset($_SESSION['admin']))
						{
							echo "index";
							header ("Location: index.php");
						
						}
						else if(isset($_SESSION['customerId']))
						{
							echo "HomeCustomer";
							header ("Location: HomeCustomer.php");
							
						}
						else
						{
							echo "HomeAdmin	";
							header ("Location: HomeAdmin.php");
						}
						exit();
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
					
					// user is logged in
					
					// submit clicked
					if(isset($_SESSION['custid']))
					{
						$custid = $_SESSION['custid'];
						unset($_SESSION['custid']);
					}
					else
					{
						$custid = $_GET['id'];
						$_SESSION['custid'] = $custid;
					}

					// ***Update Code****
					if (isset($_POST['sub'])) 
					{
						//******** validate data //*******
						
						
						// update
						$first_name = $_POST['first_name'];
						$last_name= $_POST['last_name'];
						$billing_address = $_POST['billing_address'];
						$billing_city = $_POST['billing_city'];
						$billing_state = $_POST['billing_state'];
						$billing_zip = $_POST['billing_zip'];
						$shipping_address = $_POST['shipping_address'];
						$shipping_city = $_POST['shipping_city'];
						$shipping_state = $_POST['shipping_state'];
						$shipping_zip = $_POST['shipping_zip'];
						$phone = $_POST['phone'];
						$email = $_POST['email'];
						$password = $_POST['password'];
						
						// *********validate data here *******
						
						
						// update in db
						$sql = " update customer
						
						set 
							customer.first_name = '$first_name ', 
							customer.last_name = '$last_name ',
							customer.billing_address = '$billing_address ',
							customer.billing_city = '$billing_city ',
							customer.billing_state = '$billing_state ',
							customer.billing_zip = '$billing_zip ',
							customer.shipping_address = '$shipping_address ',
							customer.shipping_city = '$shipping_city ',
							customer.shipping_state = '$shipping_state ',
							customer.shipping_zip = '$shipping_zip ',
							customer.phone = '$phone ',
							customer.password = '$password '
							
							WHERE id = $custid ;"
							;
						$query =  mysqli_query($conn, $sql);
						$affected = $conn -> affected_rows;
						
						if ($affected == 1)
						{
							echo "Information Updated Successfully";
							
							exit();
						}
						echo "error happend";
						exit();
					}
					
					// ****display Code****
					///////// load info
					
					$sql = "SELECT * FROM customer WHERE id = '$custid' ";
					$query =  mysqli_query($conn, $sql);
					$row = $query->fetch_assoc();
						
					$access	= false;
					if(isset($_SESSION['admin']) )
					{
						$access = true;					
					}
					else if( isset($_SESSION['customerId']) )
					{
						if($_SESSION['customerId'] == $custid)
						{
							$access = true;		
						}
					}
					
					
					$first_name = $row['first_name'];
					$last_name= $row['last_name'];
					$billing_address = $row['billing_address'];
					$billing_city = $row['billing_city'];
					$billing_state = $row['billing_state'];
					$billing_zip = $row['billing_zip'];
					$shipping_address = $row['shipping_address'];
					$shipping_city = $row['shipping_city'];
					$shipping_state = $row['shipping_state'];
					$shipping_zip = $row['shipping_zip'];
					$phone = $row['phone'];
					$email = $row['email'];
					$password = $row['password'];
					?>
					<b>First Name:</b><input type="text" value = "<?php echo $first_name;?>" class="sign-up-input" placeholder="Your First Name" autofocus name = "first_name" pattern="[a-zA-Z]{3,255}" required >
					<b>Last Name:</b><input type="text" value = "<?php echo $last_name;?>"  class="sign-up-input" placeholder="Your Last Name" autofocus name = "last_name" pattern="[a-zA-Z]{3,255}" required>
				
					<b>billing_address:</b><input type="text"  value = "<?php echo $billing_address;?>" class="sign-up-input" placeholder="Billing Address" autofocus name = "billing_address" pattern="[a-zA-Z 0-9]{3,255}" required>
					<b>billing_city:</b><input type="text"  value = "<?php echo $billing_city;?>" class="sign-up-input" placeholder="Billing City" autofocus name = "billing_city" pattern="[a-zA-Z]{3,255}" required>
					<b>billing_state:</b><input type="text"  value = "<?php echo $billing_state;?>"  class="sign-up-input" placeholder="BillingState " autofocus name = "billing_state" pattern="[a-zA-Z]{3,255}" required>
					<b>billing_zip:</b><input type="text"  value = "<?php echo $billing_zip;?>" class="sign-up-input" placeholder="Billing Zip" autofocus name = "billing_zip" pattern="[0-9]{3,255}" required>
					
					<b>shipping_address:</b><input type="text"  value = "<?php echo $shipping_address;?>" class="sign-up-input" placeholder="Shipping  Address" autofocus name = "shipping_address" pattern="[a-zA-Z 0-9]{3,255}"required>
					<b>shipping_city:</b><input type="text"  value = "<?php echo $shipping_city;?>" class="sign-up-input" placeholder="Shipping  City" autofocus name = "shipping_city" pattern="[a-zA-Z]{3,255}" required>
					<b>shipping_state:</b><input type="text"  value = "<?php echo $shipping_state;?>" class="sign-up-input" placeholder="Shipping State  " autofocus name = "shipping_state" pattern="[a-zA-Z]{3,255}" required>
					<b>shipping_zip:</b><input type="text"  value = "<?php echo $shipping_zip;?>" class="sign-up-input" placeholder="Shipping  Zip" autofocus name = "shipping_zip" pattern="[0-9]{3,255}" required>
					
					<b>phone:</b><input type="text"  value = "<?php echo $phone;?>" class="sign-up-input" placeholder="Phone" autofocus name = "phone" pattern="[0-9]{3,255}" required>
					<input type="email"  value = "<?php echo $email;?>" class="sign-up-input" placeholder="Your email" autofocus name="email" required readonly = "readonly">
					<b>password:</b><input type="password"  value = "<?php echo $password;?>" class="sign-up-input" placeholder="Your password" name = "password" required>					
					
					<?php
					////////////////////
					
					if($access)
					{
						echo "	
							<br>
							<a href=\"deleteCustomer.php?id=$custid \">Delete Account</a>
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