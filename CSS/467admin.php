<html>
<head>
<title>Admin Page</title>
<h1>Admin Interface</h1>
<body>
<?php




	try { //exception thrown if something happens
		$dsn = "mysql:host=courses;dbname=z1853137";
		$pdo = new PDO($dsn, "z1853137", "1998Mar21");
	} catch (PDOexception $e) { //catch the exception
		echo "Connection to DB failed: " . $e->getMessage();
	}
		$prepared = $pdo->query('SELECT minW, maxW, cost FROM weight');
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
$prepared = $pdo->query('SELECT fee, feetype FROM handling');
	        echo "<table id='handling' border='1'>
		<tr>
		<th>handling fee</th>
		<th>fee num</tr>";

		while ($srow = $prepared->fetch()){
			extract($srow);
			echo "<tr><td><input type='handling' name= 'fee' value= {$fee}></td>
			<td>{$feetype}</td></tr>";
}
$prepared = $pdo->query('SELECT orderID, inventory.partNum, partDesc, price, pInfo.email FROM orderHistory
			INNER JOIN inventory ON orderHistory.partNum = inventory.partNum
			INNER JOIN pInfo ON orderHistory.email = pInfo.email
			WHERE orderHistory.orderID');
	        echo "<table id='Weightbrackets' border='1'>
		<tr>
		<th>orderID</th>
		<th>part number</th>
		<th>part Description</th>
		<th>price</th>
		<th>email</th></tr>";

		while ($srow = $prepared->fetch()){
			extract($srow);
			echo "<tr>
			<td>{$orderID}</td>
			<td>{$partNum}</td>
			<td>{$partDesc}</td>
			<td>{$price}</td>
			<td>{$email}</td></tr>";
}
?>

</body></form>
<body>
	<h1>Change the weight bracket fee add in weight value then fee amount</h1>
	<form method="POST" action="/~z1853137/changeWeight.php">
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
	<h1>Change the handling fee</h1>
	<form method="POST" action="/~z1853137/changefee.php">		
		<input type="text" name="fee"/>
		<input name="feechange" type="submit" />	
		</form>
</body>
<body>
	<h1>Search orders</h1>
	<form id="dateR" name="dateSearch" method="POST" action="/~z1853137/dateSearch.php" >
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
</body>
<body>
	<form id="priceR" name="priceSearch" method="POST" action="/~z1853137/priceSearch.php" >
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
</body>
<body>
	<h1>Search by status</h1>
	<form method="POST" action="/~z1853137/status.php">
		<select name="search">	
			<option value="shipped">shipped</option>
			<option value="authorized">authorized</option>	
		</select>	
		<input name="bracketchange" type="submit" />	
		</form>
</body>
</body>
</html>

