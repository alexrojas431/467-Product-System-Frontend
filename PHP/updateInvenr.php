<?php
//it adds the specified number to the proper item in the inventory table
 try { //exception thrown if something happens

                $dsn = "mysql:host=courses;dbname=z1813783";

                $pdo = new PDO($dsn, "z1813783", "1999Feb21");

        } catch (PDOexception $e) { //catch the exception

                echo "Connection to DB failed: " . $e->getMessage();

	}

	$subInv = "UPDATE inventory SET quantity= quantity + ? WHERE partNum=?;";

	$subInvResult = $pdo->prepare($subInv);

	$subInvResult->execute(array($_POST['OQ'], $_POST['pNum']));

header("Refresh:1; url=/~z1813783/workerPage.php");

?>