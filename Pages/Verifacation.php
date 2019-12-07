<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<h1>Payment Processing<h2>

</head>

<?php

//  This file will hold the payment authorization response. 
//  Once done it will submit the relevant information into the database
//  Such as personal info given by the user
//  As well as the order information for each seperate part
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
// Calculate the price of the whole cart
	$wholeP = 0;

//  case check if all fields have been filled out
	if($_POST["email"] == '' || $_POST["email"] == null ||
		$_POST["ccNum"] == '' ||  $_POST["ccNum"] == null ||
		$_POST["fName"] == '' ||  $_POST["fName"] == null ||
		$_POST["lName"] == '' ||  $_POST["lName"] == null ||
		$_POST["expireDate"] == '' ||  $_POST["expireDate"] == null ||
		$_POST["cvv"] == '' ||  $_POST["cvv"] == null
		)
	{
		echo "<div id='warning'> Please fill out all fields on the form </div>";
	}
	else{

//  Go through the cart and caculate the shipping and handling fees based on weight, as well as the adding to the wholeP
		foreach($_SESSION["shopping_cart"] as $key => $value)
		{
			
			$TotalW = $value['weight']*$value['quantity'];
			$weightBracket = "SELECT cost FROM weight WHERE minW>" . $TotalW . " AND maxW<= ". $TotalW .";";
			$weightBResult = $pdo->prepare($weightBracket);
			$weightBResult->execute(array($value['number']));
			$Total = $weightBResult->fetch();
			$TotalP = $value['price']*$value['quantity'] + $Total['cost'];
			$wholeP = $wholeP + $TotalP;
			
			//$dateOr = 'Current time: ' . date('Y-m-d H:i:s');

//  Submit into the personal info table in the database
			$submitInfo = "INSERT INTO pInfo(email, fName, lName, creditCard, addr)
			VALUES
			(?, ?, ?, ?, ?);";
			$orderInfo = $pdo->prepare($submitInfo);
			$orderInfo->execute(array($_POST['email'],$_POST['fName'],$_POST['lName'],$_POST["ccNum"],$_POST['addr']));
			
//  Submit into the orderHistory table in the database
			$submitOrder = "INSERT INTO orderHistory(partNum, oQuantity, partDesc, price, email, dateOr, status)
			VALUES
			(?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?);";
			
			$orderResult = $pdo->prepare($submitOrder);
			$orderResult->execute(array($value['number'],$value['quantity'],$value['description'],$TotalP,$_POST['email'],'authorized'));
			
		}

//  Make a random string for the transaction ID and vendor ID
	function getRdmStr($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = ''; 
	
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		} 
	
		return $randomString; 
	}

//  Using the example from the website for the credit card authorization system
//  Using the variables from the filled out form and the wholeP to submit into the system
//  It will then print out the message given from the system

	$url = 'http://blitz.cs.niu.edu/CreditCard/';

	$data = array(

			'vendor' => getRdmStr(10),

			'trans' =>  getRdmStr(10),

			'cc' => $_POST['ccNum'],

			'name' => $_POST["fName"] . " " . $_POST['lName'], 

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

	}

?>
<br/>
<a href="./purchasePage.php">
    <button type="button">Go Back to purchase page</button>
</a>