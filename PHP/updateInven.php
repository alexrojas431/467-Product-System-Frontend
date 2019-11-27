<?php
 try { //exception thrown if something happens
                $dsn = "mysql:host=courses;dbname=z1853137";
                $pdo = new PDO($dsn, "z1853137", "1998Mar21");
        } catch (PDOexception $e) { //catch the exception
                echo "Connection to DB failed: " . $e->getMessage();
	}
	$subInv = "UPDATE inventory SET oQuantity=? WHERE partNum=?;";
	$subInvResult = $pdo->prepare($subInv);
	$subInvResult->execute(array($_POST['OQ'], $_POST['pNum']));
header("Refresh:5; url=/~z1853137/467admin.php");
?>
