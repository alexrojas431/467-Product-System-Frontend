<html>
<head>
<title>Admin Page</title>
<h1>Admin Interface</h1>
</head>
<body>
   <a href="./navigation.php"> <button> Back to Home </button> </a>
   <br/>
<?php




	try { //exception thrown if something happens
		$dsn = "mysql:host=courses;dbname=z1813783";
		$pdo = new PDO($dsn, "z1813783", "1999Feb21");
	} catch (PDOexception $e) { //catch the exception
		echo "Connection to DB failed: " . $e->getMessage();
	}
	//prints weight bracket table with related costs
		$prepared = $pdo->query('SELECT * FROM weight');
	        echo "<table id='Weightbrackets' border='1'>
		<tr>
		<th>min weight</th>
		<th>max weight</th>
		<th>Cost</th></tr>";

		while ($srow = $prepared->fetch()){
			extract($srow);
			echo "<tr>
			<td>{$minW}</td>
			<td>{$maxW}</td>
			<td>{$cost}</td></tr>";
}
//prints table with all the orders.
$prepared = $pdo->query('SELECT orderID, inventory.partNum, partDesc, price, pInfo.email, dateOr, status FROM orderHistory
			INNER JOIN inventory ON orderHistory.partNum = inventory.partNum
			INNER JOIN pInfo ON orderHistory.email = pInfo.email
			WHERE orderHistory.orderID');
	        echo "<table id='Weightbrackets' border='1'>
		<tr>
		<th>orderID</th>
		<th>part number</th>
		<th>part Description</th>
		<th>price</th>
		<th>email</th>
		<th>date processed</th>
		<th>shippment status</th></tr>";

		while ($srow = $prepared->fetch()){
			extract($srow);
			echo "<tr>
			<td>{$orderID}</td>
			<td>{$partNum}</td>
			<td>{$partDesc}</td>
			<td>{$price}</td>
			<td>{$email}</td>
			<td>{$dateOr}</td>
			<td>{$status}</td></tr>";
}
?>

<body>
	<h3>Change shipping and handling fees based on lower or upper weight limit</h3>
	<h3>Enter the weight bound in the left opening and the cost in the right</h3>
	<form method="POST" action="/~z1813783/changeWeight.php">
		<select name="WType">	
			<option value="minW">minW</option>
			<option value="maxW">maxW</option>	
		</select>
		<input type="text" name="wValue"/>	
		<input type="text" name="cost"/>
		<input name="bracketchange" type="submit" />	
		</form>
</body>
<body>
	<h3>Change the weight brackets</h3>
	<h3>Enter in the weight value either min or max opposite of the one you want changed</h3>
	<form method="POST" action="/~z1813783/changeWeightBracket.php">
		<select name="WType">	
			<option value="minW">minW</option>
			<option value="maxW">maxW</option>	
		</select>
		<input type="text" name="wValue"/>	
		<input type="text" name="wChange"/>
		<input name="bracketchange" type="submit" />	
		</form>
</body>
<body>
	<h1>Search orders</h1>
	<form id="dateR" name="dateSearch" method="POST" action="/~z1813783/dateSearch.php" >
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
<tr>
  <td colspan="2"><strong>Search by Date</strong></td>
</tr>
<tr>
  <td>earliest date</td>
  <td><input name="datemin" type="text" id="datemin"></td>
</tr>
<tr>
  <td>latest date</td>
  <td><input name="datemax" type="text" id="datemax"></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input name="SubmitBtn" type="submit" id="SubmitBtn" value="Submit"></td>
</tr>
</table>
</form>
</body>
<body>
	<form id="priceR" name="priceSearch" method="POST" action="/~z1813783/priceSearch.php" >
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
<tr>
  <td colspan="2"><strong>Search by price</strong></td>
</tr>
<tr>
  <td>price min</td>
  <td><input name="pricemin" type="text" id="pricemin"></td>
</tr>
<tr>
  <td>price max</td>
  <td><input name="pricemax" type="text" id="pricemax"></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input name="SubmitBtn" type="submit" id="SubmitBtn" value="Submit"></td>
</tr>
</table>
</form>
</body>
<body>
	<h1>Search by status</h1>
	<form method="POST" action="/~z1813783/statsearch.php">
		<select name="status">	
			<option value="authorized">authorized</option>
			<option value="shipped">shipped</option>	
		</select>
		<input name="statSearch" type="submit" />	
		</form>
</body>
</html>

