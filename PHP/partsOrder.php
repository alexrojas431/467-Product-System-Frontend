<!DOCTYPE html>

<head>
	<title>Parts Order Home Page </title>
	<style>
		/* Style sheet sets width of all images to 100%: */
		img {
			width:128px;height:128px;
		}
	</style>
	<link rel="stylesheet" href="./partsOrder.css">
	<link href="./shoppingCart.css">
</head>

<body>
	<form action="">
		Search: <input type="text" name="search">
		<input type="submit" value="Submit">
	</form>

	<h2>Search Form</h2>
	<form method = "POST" action = "http://students.cs.niu.edu/~z1860858/songSearch.php">
			Search By:
			<select name = "searchby">
				<option value= "partName" >Part Name</option>
				<option value= "partNum" >Part Number</option>
				<option value= "partWeight" >Part Weight</option>
				<option value= "placeholder" >placeholder</option>
			</select>
		<input type = "text" name = "searchInput"/>
		<input type = "submit" name = "submit" value = "Search!"/>

	<br/><br/>
		<input type = "reset" value = "Reset Search"/>
	</form>

	<div id='shoppingCart'>
		shopping cart
	</div>

	<?php
		require('displayParts.php');
		
		#Establish database connection include functions.php file
		try
		{
			$dsn = 'mysql:host=blitz.cs.niu.edu;port=3306;dbname=csci467';
			$username = 'student';
			$password = 'student';
			$pdo = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e)
		{
			echo 'Connection failed: '. $e->getMessage();
		}
		
		//Connects to our own database

		try
		{
			$dsn = 'mysql:host=courses;dbname=z1813783';
			$username = 'z1813783';
			$password = '1999Feb21';
			$pdo2 = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e)
		{
			echo 'Connection failed: '. $e->getMessage();
	    }
		whole($pdo, $pdo2);
       
	?>

</body>

</html>