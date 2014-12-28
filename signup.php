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

			
		}
 ?>

	
    <!--Wrap start -->
    <div class="wrap">
	    <div class="header">
	    	<ul class="wrap-top" id="nav">
	     		<li id="home"><a href="index.php" >Home</a></li>
	     		<li id="signup"><a href="signup.php">Sign Up</a></li>
	     		<li id="login"><a href="login.php">Login</a></li>
	  		</ul>
	  	</div>
	  	<div class="signupform">
		    <form class="sign-up"  name="signUpForm" action = "signup.php" method = "POST">
			    <h1 class="sign-up-title">Sign up</h1>
			    <input type="text" class="sign-up-input" placeholder="Your First Name" autofocus name = "fname" required >
			    <input type="text" class="sign-up-input" placeholder="Your Last Name" autofocus name = "lname" required>
				
				<input type="text" class="sign-up-input" placeholder="Billing Address" autofocus name = "bAddress" required>
				<input type="text" class="sign-up-input" placeholder="Billing City" autofocus name = "bCity" required>
				<input type="text" class="sign-up-input" placeholder="BillingState " autofocus name = "bState" required>
				<input type="text" class="sign-up-input" placeholder="Billing Zip" autofocus name = "bZip" required>
				
				<input type="text" class="sign-up-input" placeholder="Shipping  Address" autofocus name = "sAddress" required>
				<input type="text" class="sign-up-input" placeholder="Shipping  City" autofocus name = "sCity" required>
				<input type="text" class="sign-up-input" placeholder="Shipping State  " autofocus name = "sState" required>
				<input type="text" class="sign-up-input" placeholder="Shipping  Zip" autofocus name = "sZip" required>
				
				 <input type="text" class="sign-up-input" placeholder="Phone" autofocus name = "phone" required>
				<input type="email" class="sign-up-input" placeholder="Your email" autofocus name="mail" required>
			    <input type="password" class="sign-up-input" placeholder="Your password" name = "pass" required>
			    <input type="submit" value="Sign me up!" class="sign-up-button" name="sub">
			</form>
    	</div>
    </div>
    <!-- end of Wrap-->
  	</body>
</html>