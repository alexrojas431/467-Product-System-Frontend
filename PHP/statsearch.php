<html>
<body>
<?php
 try { //exception thrown if something happens
                $dsn = "mysql:host=courses;dbname=z1813783";
                $pdo = new PDO($dsn, "z1813783", "1999Feb21");
        } catch (PDOexception $e) { //catch the exception
                echo "Connection to DB failed: " . $e->getMessage();
	}
	//prints a table depending on it's status of shipped or authorized depending on the value passed throught the dropdown on the admin page
switch ($_POST['status']) {
	case "shipped":
	//searches shipped orders
		$prepared = $pdo->query('SELECT orderID, inventory.partNum, partDesc, price, pInfo.email, dateOr, status FROM orderHistory
			INNER JOIN inventory ON orderHistory.partNum = inventory.partNum
			INNER JOIN pInfo ON orderHistory.email = pInfo.email
			WHERE orderHistory.orderID AND status="shipped"');
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
		break;
	case "authorized":
	//searches authorized orders
		$prepared = $pdo->query('SELECT orderID, inventory.partNum, partDesc, price, pInfo.email, dateOr, status FROM orderHistory
			INNER JOIN inventory ON orderHistory.partNum = inventory.partNum
			INNER JOIN pInfo ON orderHistory.email = pInfo.email
			WHERE orderHistory.orderID AND status="authorized"');
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
		break;
	default:
		echo "somehing went wrong";
}
?>

<h1>return to admin page</h1>
	<form method="POST" action="/~z1813783/467admin.php">
		<input name="return" type="submit" value="return" />	
		</form>
</body>
</html>
