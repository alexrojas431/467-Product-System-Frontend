<?php
 try { //exception thrown if something happens
                $dsn = "mysql:host=courses;dbname=z1813783";
                $pdo = new PDO($dsn, "z1813783", "1999Feb21");
        } catch (PDOexception $e) { //catch the exception
                echo "Connection to DB failed: " . $e->getMessage();
	}
//based on the switch value it changes the handling cost based on min or max wieght that was entered.	
switch ($_POST['WType']) {
	case "minW":
		//searches based on minW
		$weightEdit = "UPDATE weight SET cost=? WHERE minW=?;";
		$weightResult = $pdo->prepare($weightEdit);
		$weightResult->execute(array($_POST['cost'], $_POST['wValue']));
		break;
	case "maxW":
		//searches based on maxW
		$weightEdit = "UPDATE weight SET cost =? WHERE maxW=?;";
		$weightResult = $pdo->prepare($weightEdit);
		$weightResult->execute(array($_POST['cost'], $_POST['wValue']));
		break;
	default:
		echo "somehing went wrong";
}
header("Refresh:1; url=/~z1813783/467admin.php");
?>
