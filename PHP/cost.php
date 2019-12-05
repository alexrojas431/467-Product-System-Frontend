<?php
	try
	{ //exception thrown if something happens
		$dsn = "mysql:host=blitz.cs.niu.edu;dbname=csci467";
		$pdo = new PDO($dsn, "student", "student");
	}
	catch (PDOexception $e) { //catch the exception
		echo "Connection to DB failed: " . $e->getMessage();
	}

	try
	{ //exception thrown if something happens
			$dsn = "mysql:host=courses;dbname=z1813783";
			$pdo = new PDO($dsn, "z1813783", "1999Feb21");
	}
	catch (PDOexception $e) { //catch the exception
			echo "Connection to DB failed: " . $e->getMessage();
	}

	foreach($_SESSION["shopping_cart"] as $key => $value)
	{
		$weightget = "SELECT weight, price, description FROM csci467 WHERE number=?;";
		$weightResult = $pdo->prepare($weightget);
		$weightResult->execute(array($value['number']));
		$srow = $weightResult->fetch();
		
		$TotalW = $srow['weight']*$value['quantity'];
		$weightBracket = "SELECT cost FROM weight WHERE minW>' . $TotalW . ' AND maxW<= '. $TotalW .';";
		$weightBResult = $pdo->prepare($weightBracket);
		$weightBResult->execute(array($value['Number']));
		$Total = $weightBResult->fetch();
		$TotalP = $srow['price']*$value['quantity'] + $Total['cost'];
		
		$dateOr = 'Current time: ' . date('Y-m-d H:i:s');

		$submitOrder = "INSERT INTO orderHistory(partNum, oQuantity, partDesc, price, email, dateOr, status)
		VALUES
		(?, ?, ?, ?, ?, ?, ?);";
				$orderResult = $pdo->prepare($submitOrder);
				$orderResult->execute(array($_POST['number'],$value['quantity'],$srow['description'],$TotalP,$_POST['email'],dateOr,'authroized'));
	}
?>