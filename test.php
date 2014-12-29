<html>
<head>
	<title>Test</title>
	<script>
	
	function combo(thelist) {

    var idx = thelist.selectedIndex;
    var content = thelist.options[idx].innerHTML;

	
	var x = document.getElementById("sec").options.length;

	
	for(var i=0 ;i< x;i++)
	{
		var z = document.getElementById("sec");
		z.options.remove(0);
	}
	if(content == "lap")
	{
	
		var y = document.getElementById("sec");
		var c1 = document.createElement("option");
		c1.text = "toshipa";
		var c2 = document.createElement("option");
		c2.text = "hp";
		y.options.add(c1, 0);
		y.options.add(c2, 1);
	}
	else if(content == "camera")
	{
	
		var y = document.getElementById("sec");
		var c1 = document.createElement("option");
		c1.text = "sony";
		var c2 = document.createElement("option");
		c2.text = "canon";
		y.options.add(c1, 0);
		y.options.add(c2, 1);
	}
	else if(content == "mobile")
	{
		var y = document.getElementById("sec");
		var c1 = document.createElement("option");
		c1.text = "samsong";
		var c2 = document.createElement("option");
		c2.text = "nokia";
		y.options.add(c1, 0);
		y.options.add(c2, 1);
	}
	
}
	
	</script>
	<!-- link href="css/2-col-portfolio.css" rel="stylesheet" -->
</head>
	<body>
<?php
	
	function display($cat , $subcat)
	{
		if($cat == "lap-tops" && $subcat == "toshipa")
		{
			echo "
				<table style=\"width:30%\">
				 <tr>
				 <td> Category:</td>
				  <td>
				<select name=\"thelist\" id = \"thelist\" onChange=\"combo(this)\" style=\"width: 180px; height: 30px;\">
				  <option>lap</option>
				  <option>camera</option>
				  <option>mobile</option>
				</select>
				</td>
				</tr>

				 <tr>
				 <td> Subcategory:</td>
				  <td>
				<select name=\"sec\" id = \"sec\" style=\"width: 180px; height: 30px;\">
				  <option>toshipa</option>
				  <option>hp</option>

				</select>
				</td>
				</tr>
				</table>
			";
			
		}
		else 
	}
	
	
	
	
	
?>
<?php

?>		
  	</body>
</html>