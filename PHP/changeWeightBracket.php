<?php
 try { //exception thrown if something happens
                $dsn = "mysql:host=courses;dbname=z1813783";
                $pdo = new PDO($dsn, "z1813783", "1999Feb21");
        } catch (PDOexception $e) { //catch the exception
                echo "Connection to DB failed: " . $e->getMessage();
	}
echo $_POST['wChange'], $_POST['wValue'];
switch ($_POST['WType']) {
	case "minW":
		echo "min";
		$weightEdit = "UPDATE weight SET maxW=? WHERE minW=?;";
		$weightResult = $pdo->prepare($weightEdit);
		$weightResult->execute(array($_POST['wChange'], $_POST['wValue']));
		break;
	case "maxW":
		echo "max";
		$weightEdit = "UPDATE weight SET minW=? WHERE maxW=?;";
		$weightResult = $pdo->prepare($weightEdit);
		$weightResult->execute(array($_POST['wChange'], $_POST['wValue']));
		break;
	default:
		echo "somehing went wrong";
}
header("Refresh:5; url=/~z1813783/467admin.php");
?>
