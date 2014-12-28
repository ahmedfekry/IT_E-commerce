<?php

session_start();
	/*if(!isset($_SESSION['admin']) ) {
		 header ("Location: index.php"); 
		 exit();
	}
	*/

?>
<!DOCTYPE html>
<html>
<link href="HomeAdmin.css" rel="stylesheet" type="text/css">
<title>Home</title>
  <body>
    <div class="footer">
    <ul id="nav">

           <li id="login"><a href="logOutAdmin.php">Logout</a></li>
         </ul>
  </div>
  <!--the main-->
  <div class="main">
        <div class="nav1">
        <ul>
            <li><a href="StorePage.php">Store Page</a></li>
              <li><a href="customerAccountsPage.php">Customer Accounts Page</a></li>
            <li><a href="">Shipping Page</a></li>

          </ul>

</div>
  <!--the end of the main-->
	<br>
  <div class="footer">
	   <p>&copy 2014 SAAAM. All Rights Reserved.</p>
  </div>
  
  
  </body>
</html>