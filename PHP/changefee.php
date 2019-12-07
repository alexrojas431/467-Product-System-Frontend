<?php
//changed the hanlding fee with the specified fee type but this is old and now unused.
 try { //exception thrown if something happens
                $dsn = "mysql:host=courses;dbname=z1813783";
                $pdo = new PDO($dsn, "z1813783", "1999Feb21");
        } catch (PDOexception $e) { //catch the exception
                echo "Connection to DB failed: " . $e->getMessage();
	}
echo $_POST['fee'];
$handlingEdit = "UPDATE handling SET fee = ? WHERE feetype = ?;";
$handlingResult = $pdo->prepare($handlingEdit);
$handlingexec = $handlingResult->execute(array($_POST['fee'], 1));

header("Refresh:5; url=/~z1813783/467admin.php");
?>
