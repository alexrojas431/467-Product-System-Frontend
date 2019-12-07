<!DOCTYPE html>

<head>
	<title>Parts Order Home Page </title>
	
	<link rel="stylesheet" href="./partsOrder.css">
</head>

<body>

   <a href="./navigation.php"> <button> Back to Home </button> </a>
   <br/>

	<?php
	//Start a session to store cookies for the shopping cart
	//This allows the stored cookies to be used in other pages
		session_start();
		
	//This file will display every part into the webpage
		require('displayParts.php');
	?>

	<div id='shoppingCart'>
		Shopping Cart
		<br/>
		<?php
		// The status variable tells the user about whether the product was inserted into the cart
		echo $status;
		?>
		<br/>
		<a href="./cartPage.php">
			<button> Finalize and pay for order </button>
		</a>
	</div>

</body>

</html>
