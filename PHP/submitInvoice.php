<?php
//just changes the specified order from authorized to shipped
 try { //exception thrown if something happens
                $dsn = "mysql:host=courses;dbname=z1813783";
                $pdo = new PDO($dsn, "z1813783", "1999Feb21");
        } catch (PDOexception $e) { //catch the exception
                echo "Connection to DB failed: " . $e->getMessage();
	}
	$subInv = "UPDATE orderHistory SET status='shipped' WHERE orderID=?;";
	$subInvResult = $pdo->prepare($subInv);
	$subInvResult->execute(array($_POST['OID']));
header("Refresh:1; url=/~z1813783/workerPage.php");
?>
