<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<h1>Payment Processing<h2>

</head>

<?php
	session_start();
 
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

$wholeP = 0;

	foreach($_SESSION["shopping_cart"] as $key => $value)
	{
		$weightget = "SELECT weight, price, description FROM csci467 WHERE number=?;";
		$weightResult = $pdo->prepare($weightget);
		$weightResult->execute(array($value['number']));
		$srow = $weightResult->fetch();
		
		$TotalW = $srow['weight']*$value['quantity'];
		$weightBracket = "SELECT cost FROM weight WHERE minW>' . $TotalW . ' AND maxW<= '. $TotalW .';";
		$weightBResult = $pdo->prepare($weightBracket);
		$weightBResult->execute(array($value['number']));
		$Total = $weightBResult->fetch();
		$TotalP = $srow['price']*$value['quantity'] + $Total['cost'];
        $wholeP = $wholeP + $TotalP;
		
		$dateOr = 'Current time: ' . date('Y-m-d-H-i-s');

		$submitOrder = "INSERT INTO orderHistory(partNum, oQuantity, partDesc, price, email, dateOr, status)
		VALUES
		(?, ?, ?, ?, ?, ?, ?);";
				$orderResult = $pdo->prepare($submitOrder);
				$orderResult->execute(array($value['number'],$value['quantity'],$srow['description'],$TotalP,$_POST['email'],$dateOr,'authroized'));
    }

$url = 'http://blitz.cs.niu.edu/CreditCard/';

$data = array(

        'vendor' => 'SomeVendor',

        'trans' => '907-987654321-296',

        'cc' => $_POST['ccNum'],

        'name' => $_POST['custName'], 

        'exp' => $_POST['expireDate'], 

        'amount' => $wholeP);


$options = array(

    'http' => array(

        'header' => array('Content-type: application/json', 'Accept: application/json'),

        'method' => 'POST',

        'content'=> json_encode($data)

    )

);


$context  = stream_context_create($options);

$result = file_get_contents($url, false, $context);

echo($result);

?>