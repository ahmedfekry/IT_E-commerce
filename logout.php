 <?php
	if(session_id() == '' || !isset($_SESSION)) {
		// session isn't started
		session_start();						
	}
	header ("Location: index.php");
	session_destroy();

 ?>