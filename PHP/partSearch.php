<!DOCTYPE html>

<head>
	<title>Parts Order Home Page </title>
	<style>
		/* Style sheet sets width of all images to 100%: */
		img {
			width:128px;height:128px;
		}
	</style>
	<link rel="stylesheet" href="./partsOrder.css">
	<link href="./shoppingCart.css">
</head>
<body>
<?php
		require('displayParts.php');
		
		#Establish database connection include functions.php file
		try
		{
			$dsn = 'mysql:host=blitz.cs.niu.edu;port=3306;dbname=csci467';
			$username = 'student';
			$password = 'student';
			$connection = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e)
		{
			echo 'Connection failed: '. $e->getMessage();
		}
		
		//Connects to our own database

		try
		{
			$dsn = 'mysql:host=courses;dbname=z1813783';
			$username = 'z1813783';
			$password = '1999Feb21';
			$connection2 = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e)
		{
			echo 'Connection failed: '. $e->getMessage();
	    }
			for($i = 1; $i < 150; $i++)
			{
			if(i = $_POST['searchInput'] == i){
				$sql = 'SELECT pictureURL, description, price, weight FROM parts WHERE number = ' . $i . ';';
				$query = $connection->query($sql);
				$result = $query->fetch(PDO::FETCH_ASSOC);
            	$sql2 = 'SELECT quantity FROM inventory WHERE partNum = ' . $i . ';';
				$query2 = $connection2->query($sql2);
				$result2 = $query2->fetch(PDO::FETCH_ASSOC);
           
				$test = $result['pictureURL'];            
				if($test != ''){
					echo "<div class='product'>";
	
					echo "<img id='img' src='" . $result['pictureURL'] . "'>";
					echo "<span id='desc'>Description: " . $result["description"] ."</span>";
					echo "<span id='price'>Price: $" . $result["price"] ."</span>";
					echo "<span id='weight'>Weight: " . $result["weight"] ."</span>";
                        
					echo "<span id='quantity'>Quantity: " . $result2["quantity"] ."
						<button type='button'> Add to cart </button>
						</span>";
	
					echo "</div>";
					}
				}
			}
		}
       
	?>
	</body>
	</html>