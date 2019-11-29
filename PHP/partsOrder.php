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
	<h2>Search Form</h2>
	<form method = "POST" action = "http://students.cs.niu.edu/~z1853137/partSearch.php">
			Search By PartNum:
		<input type = "text" name = "searchInput"/>
		<input type = "submit" name = "submit" value = "Search!"/>
	</form>

	<div id='shoppingCart'>
		shopping cart
	</div>

	<?php
		require('displayParts.php');
		
	?>

</body>

</html>