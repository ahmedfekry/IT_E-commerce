<?php

	session_start();
	if(!isset($_SESSION['customerId']) ) {
		 header ("Location: index.php"); 
		 exit();
	}

?>
<!DOCTYPE html>
<html>
<link href="HomeCustomer.css" rel="stylesheet" type="text/css">
<title>Home</title>
  <body>
    <div class="footer">
    <ul id="nav">

           <li id="login"><a href="logout.php">Logout</a></li>
         </ul>
  </div>
  <!--the main-->
  <div class="main">
        <div class="nav1">
        <ul>
            <li><a href="#">Page 1</a></li>
              <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
            <li><a href="#">Page 4</a></li>
            <li><a href="#">Page 5</a></li>
            <li><a href="#">Page 6</a></li>
          </ul>

</div>
  <!--the end of the main-->
	<br>
  <div class="footer">
	   <p>&copy 2014 SAAAM. All Rights Reserved.</p>
  </div>
  
  
  </body>
</html>