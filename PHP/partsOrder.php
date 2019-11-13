<html>
<head>
<title>Parts Order Home Page </title>
<style>
/* Style sheet sets width of all images to 100%: */
img {
	width:128px;height:128px;
}
</style>
</head>

<body>
<form action="">
Search: <input type="text"name="search">
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

<h3>Product Name</h3>

<p>
<img src="https://content.speedwaymotors.com/ProductImages/91716_L_310b2a2b-778f-4c6c-8894-bb0690310e9d.jpg" style="float:left;">
Part Description
<button type="button">Add to Cart</button>
</p>

<br><br><br><br>

<h3>Product2 Name</h3>

<p>
<img src="https://mobileimages.lowes.com/product/converted/076812/076812095701.jpg?size=xl" style="float:left;">
Part2 Description
<button type="button">Add to Cart</button>
</p>
<?php
	require('displayParts.php')
?>
</body>
</html>
