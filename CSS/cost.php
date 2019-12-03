<php
	try { //exception thrown if something happens
			$dsn = "mysql:host=blitz.cs.niu.edu;dbname=csci467";
			$pdo = new PDO($dsn, "student", "student");
		}catch (PDOexception $e) { //catch the exception
			echo "Connection to DB failed: " . $e->getMessage();
		}
			$weightget = "SELECT weight, price, description FROM csci467 WHERE Number=?;";
			$weightResult = $pdo->prepare($weightget);
			$weightResult->execute(array($_POST['number']));
			$srow = $weightResult->fetch()
		
	 try { //exception thrown if something happens
                $dsn = "mysql:host=courses;dbname=z1853137";
                $pdo = new PDO($dsn, "z1853137", "1998Mar21");
        }catch (PDOexception $e) { //catch the exception
                echo "Connection to DB failed: " . $e->getMessage();
		}
			$weightBracket = "SELECT cost FROM weight WHERE minW>' . srow["weight"] . ' AND maxW<= ' . srow["weight"] . ';";
			$weightBResult = $pdo->prepare($weightBracket);
			$weightBResult->execute(array($_POST['Number']));
			$Total = $weightBResult_>fetch();
			$TotalP = $srow['price'] + $Total['cost'];
			
			$dateOr = 'Current time: ' . date('Y-m-d H:i:s') .;
			try { //exception thrown if something happens
                $dsn = "mysql:host=courses;dbname=z1853137";
                $pdo = new PDO($dsn, "z1853137", "1998Mar21");
        }catch (PDOexception $e) { //catch the exception
                echo "Connection to DB failed: " . $e->getMessage();
		}
			$submitOrder = "INSERT INTO orderHistory(partNum, oQuantity, partDesc, price, email, dateOr, status)
    VALUES
	(?, ?, ?, ?, ?, ?, ?);
			$orderResult = $pdo->prepare($submitOrder);
			$orderResult->execute(array($_POST['number'],$_POST['oQuantity'],$srow['description'],$TotalP,$_POST['email'],dateOr,'authroized'));
?>