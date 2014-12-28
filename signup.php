<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link href="signup.css" rel="stylesheet">
	<!-- link href="css/2-col-portfolio.css" rel="stylesheet" -->
</head>
	<body>
	
<?php
		
		
		if( isset($_POST['sub']))
		{	
			// sign up code 
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
			
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$_POST['mail'];
			$phon=$_POST['phone'];
		
			$pass=$_POST['pass'];

			$bAddress=$_POST['bAddress'];
			$bCity=$_POST['bCity'];
			$bState=$_POST['bState'];
			$bZip=$_POST['bZip'];

			$sAddress=$_POST['sAddress'];
			$sCity=$_POST['sCity'];
			$sState=$_POST['sState'];
			$sZip=$_POST['sZip'];
			
			
			$sql = "select id from customer where email = '$email'" 	;
			$query =  mysqli_query($conn, $sql);
			$affected = $conn -> affected_rows;
			
			if ($affected == 1)
			{
				echo "This email already has account <br> if you have a problem contact the admin <br>";
				exit();
			}
			
			echo $phon ;
			//exit();	
				$sql="INSERT INTO customer(first_name,last_name,billing_address,billing_city,billing_state,billing_zip,
				  shipping_address,shipping_city,shipping_state,shipping_zip, phone ,email,password) 
				VALUES('$fname','$lname','$bAddress','$bCity','$bState','$bZip',
				'$sAddress','$sCity','$sState','$sZip','$phon','$email','$pass')
				";
				
			$query =  mysqli_query($conn, $sql);
			$affected = $conn -> affected_rows;
			
			if ($affected == 1)
			{
				echo "Account created successfully <br>";
				
				$sql = "select id from customer where email = '$email'" 	;
				$query =  mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($query);
				$userID = $row["id"];
				$_SESSION["customerId"] = $userID;
				header ("Location: HomeCustomer.php");
				exit();
			}
			else 
				echo "Failed";
			
		}
					
						
		
 ?>

	
    <!--Wrap start -->
    <div class="wrap">
	    <div class="header">
	    	<ul class="wrap-top" id="nav">
	     		<li id="home"><a href="index.php" >Home</a></li>
	     		<li id="signup"><a href="signup.php">Sign Up</a></li>
	     		<li id="login"><a href="loginUser.php">Login</a></li>
	  		</ul>
	  	</div> 
	  	<div class="signupform">
		    <form class="sign-up"  name="signUpForm" action = "signup.php" method = "POST">
			    <h1 class="sign-up-title">Sign up</h1>
			   <input type="text" class="sign-up-input" placeholder="Your First Name" autofocus name = "fname" pattern="[a-zA-Z ]{3,255}" required >
			    <input type="text" class="sign-up-input" placeholder="Your Last Name" autofocus name = "lname" pattern="[a-zA-Z]{3,255}" required>
				
				<input type="text" class="sign-up-input" placeholder="Billing Address" autofocus name = "bAddress" pattern="[a-zA-Z_. 0-9]{3,255}" required>
				<input type="text" class="sign-up-input" placeholder="Billing City" autofocus name = "bCity" pattern="[a-zA-Z_.]{3,255}" required>
				<input type="text" class="sign-up-input" placeholder="BillingState " autofocus name = "bState" pattern="[a-zA-Z_.]{3,255}"required>
				<input type="text" class="sign-up-input" placeholder="Billing Zip" autofocus name = "bZip" pattern="[0-9+]{2,255}"required>
				
				<input type="text" class="sign-up-input" placeholder="Shipping  Address" autofocus name = "sAddress" pattern="[a-zA-Z_. 0-9]{3,255}" required>
				<input type="text" class="sign-up-input" placeholder="Shipping  City" autofocus name = "sCity" pattern="[a-zA-Z_.]{3,255}"required>
				<input type="text" class="sign-up-input" placeholder="Shipping State  " autofocus name = "sState" pattern="[a-zA-Z_.]{3,255}" required>
				<input type="text" class="sign-up-input" placeholder="Shipping  Zip" autofocus name = "sZip" pattern="[0-9+]{2,255}" required>
				
				 <input type="text" class="sign-up-input" placeholder="Phone" autofocus name = "phone" required pattern="[0-9]{3,255}" >
				<input type="email" class="sign-up-input" placeholder="Your email" autofocus name="mail" required>
			    <input type="password" class="sign-up-input" placeholder="Your password" name = "pass" required>
			    <input type="submit" value="Sign me up!" class="sign-up-button" name="sub">
			</form>
    	</div>
    </div>
    <!-- end of Wrap-->
  	</body>
</html>