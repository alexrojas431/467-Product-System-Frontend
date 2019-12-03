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

<body onload="showInfo()">

   <a href="./navigation.php"> <button> Back to Home </button> </a>
   <br/>

	<form action="">
		Search: <input type="text" name="search">
		<input type="submit" value="Submit">
	</form>

	<h2>Search Form</h2>
	<form method = "POST" action = "http://students.cs.niu.edu/~z1860858/searchPart.php">
			Search By:
			<select name = "searchby">
				<option value= "partName" >Part Name</option>
				<option value= "partNum" >Part Number</option>
				<option value= "partWeight" >Part Weight</option>
				<option value= "placeholder" >placeholder</option>
			</select>
		<input type = "text" name = "searchInput"/>
		<input type = "submit" name = "search" value = "Search!"/>
		<input type = "reset" value = "Reset Search"/>

	</form>
<br>
	Sort By:
	<select name="sortby">
		<option value= "partName" >Part Name</option>
                <option value= "partNum" >Part Number</option>
                <option value= "partWeight" >Part Weight</option>
                <option value= "placeholder" >placeholder</option>
	</select>
	<button>Sort List</button>
<br><br>
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
