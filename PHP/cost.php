<?php
	try
	{ //exception thrown if something happens
		$dsn = "mysql:host=blitz.cs.niu.edu;dbname=csci467";
		$pdo = new PDO($dsn, "student", "student");
	}
	catch (PDOexception $e) { //catch the exception
		echo "Connection to DB failed: " . $e->getMessage();
	}
		$weightget = "SELECT weight, price, description FROM csci467 WHERE Number=?;";
		$weightResult = $pdo->prepare($weightget);
		$weightResult->execute(array($_POST['number']));
		$srow = $weightResult->fetch()
	
	try
	{ //exception thrown if something happens
			$dsn = "mysql:host=courses;dbname=z1813783";
			$pdo = new PDO($dsn, "z1813783", "1999Feb21");
	}
	catch (PDOexception $e) { //catch the exception
			echo "Connection to DB failed: " . $e->getMessage();
	}
		$TotalW = $srow['weight']*$_POST['oQuantity']
		$weightBracket = "SELECT cost FROM weight WHERE minW>' . $TotalW . ' AND maxW<= ' . srow["weight"] . ';";
		$weightBResult = $pdo->prepare($weightBracket);
		$weightBResult->execute(array($_POST['Number']));
		$Total = $weightBResult->fetch();
		$TotalP = $srow['price']*$_POST['oQuantity'] + $Total['cost'];
		
		$dateOr = 'Current time: ' . date('Y-m-d H:i:s') .;

		$submitOrder = "INSERT INTO orderHistory(partNum, oQuantity, partDesc, price, email, dateOr, status)
    VALUES
	(?, ?, ?, ?, ?, ?, ?);";
			$orderResult = $pdo->prepare($submitOrder);
			$orderResult->execute(array($_POST['number'],$_POST['oQuantity'],$srow['description'],$TotalP,$_POST['email'],dateOr,'authroized'));
?>