 <html>
	 <body>
	 <?php  $name ="Book"; ?>
	 	<form action="try.php" method="post">
		<input type="text" value=<?php echo $name?> name = 'book'><br>
		<input type="submit" value="Books" name = 'books'><br>
		<input type="submit" value="Cameras" name = 'camera'>

</form>

	<table>
				<tr><td>ID</td><td>First Name</td>	 <td>Last Name</td>	 <td>e-mail</td>	</tr>
				<tr>			</tr>
				<tr>			</tr>
				<tr>			</tr>
				
				
				</table>
				
Subcategories:<br>


		
			
 <?php
	
	if(isset($_POST['books']))
	{
	echo "
		 <ul>
			<li><a href=\"try.php?id=1\" target=\"_self\" >Historcal</a></li>
			<li><a href=\"try.php?id=2\" target=\"_self\" >ٍSience</a></li>
		</ul>
		
	";
	echo $_POST['book'];
	exit();
	}
	if(isset($_POST['camera']))
	echo "
		 <ul>
			<li><a href=\"try.php?id=2\" target=\"_self\" >Sony</a></li>
			
		</ul>
	
	";
	exit();
 ?>
 
 


 	</body>
</html>