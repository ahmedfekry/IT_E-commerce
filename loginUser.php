<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link href="login.css" rel="stylesheet">
	<!-- -->
</head>
	<body>
<?php
		if(session_id() == '' || !isset($_SESSION)) {
			// session isn't started
			session_start();						
		}
		
		if( isset($_POST['sub'])  )
		{		
			$email=$_POST['mail'];
			$password=$_POST['pass'];
			$conn = mysqli_connect("localhost", "root", "", "e_commerce");
			// Check connection
			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$sqlCommand = "SELECT  password, id FROM customer WHERE email = '$email' and password = '$password'";
			$result = mysqli_query($conn, $sqlCommand);

			if (mysqli_num_rows($result) > 0) 
			{
				// logged in and go to profile   
				$row = mysqli_fetch_assoc($result);
				$userID = $row["id"];
				$_SESSION["customerId"] = $userID;
			
					echo "Done"."<br>";
				
				header ("Location: HomeCustomer.php");
				exit();
			} 
			else 
			{	
					echo "Wrong email or password"."<br>";
			}

		}
	
 ?>

    <!--Wrap start -->
    <div class="wrap">
    	<!--header start -->
	    <div class="header">
	    	<ul class="wrap-top" id="nav">
	     		<li id="home"><a href="index.php" >Home</a></li>
	     		<li id="login"><a href="loginAdmin.php">Login As Admin</a></li>
	  		</ul>
	  	</div>

	  	<div class="signupform">
		    <form class="sign-up" action = "loginUser.php" name = "logInForm" method = "POST">
			    <h1 class="sign-up-title">Login</h1>
			    <input type="email" class="sign-up-input" placeholder="Your email" autofocus name = "mail" 	required  >
			    <input type="password" class="sign-up-input" placeholder="Your password" name="pass" required>
			    <br>
				
			    <input type="submit" value="login" class="sign-up-button" name = "sub" >	
				<br><br>
				<h4>Don't have account? </h4>
				<a href="signup.php" >Create New Account</a>

				
			</form>
    	</div>
    </div>
    <!-- end of Wrap-->
  	</body>
</html>