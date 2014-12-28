<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
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
			$user=$_POST['userName'];
			$password=$_POST['pass'];
			$conn = mysqli_connect("localhost", "root", "", "e_commerce");
			// Check connection
			if (!$conn) 
			{
				
				die("Connection failed: " . mysqli_connect_error());
			}
			
			//$query=mysql_query("select * from admin where user_name='$user' and password='$password'",$conn);
			$sqlCommand = "SELECT password, user_name, id FROM admin WHERE user_name='$user' and password='$password'";
			$result = mysqli_query($conn, $sqlCommand);
			
			//$numOfRows=mysql_num_rows($query);
			if (mysqli_num_rows($result) > 0) 
			{
				$row = mysqli_fetch_assoc($result);
				$user = $row["user"];
				$password = $row["password"];
				$id = $row["id"];
				
				$_SESSION["admin"] = $id;
					echo "Done"."<br>";	
				header ("Location: HomeAdmin.php");
				exit();
			}
			else
				{
					echo "invalid email or password";
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
		    <form class="sign-up" action = "loginAdmin.php" name = "logInForm" method = "POST">
			    <h1 class="sign-up-title">Login</h1>
				<input type="text" class="sign-up-input" placeholder="User name" autofocus name = "userName" pattern="[a-zA-Z]{3,255}" required>
			    <input type="password" class="sign-up-input" placeholder="Your password" name="pass" required>
			   
			    <br>
			    <input type="submit" value="login" class="sign-up-button" name = "sub" >	
				
			</form>
    	</div>
    </div>
    <!-- end of Wrap-->
  	</body>
</html>