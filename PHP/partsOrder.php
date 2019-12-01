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

	<?php
		
		//Start a session to store cookies for the shopping cart
		//This allows the stored cookies to be used in other pages
		session_start();
		
		//This file will display every part into the webpage
		require('displayParts.php');
		
	?>

	<div id='shoppingCart'>
		shopping cart
		<?php echo $status; ?>
		<a href="./cartPage.php">
			<button> Finalize and pay for order </button>
		</a>
	</div>

</body>

</html>