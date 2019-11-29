<?php
		
		#Establish database connection include functions.php file
		try
		{
			$dsn = 'mysql:host=blitz.cs.niu.edu;port=3306;dbname=csci467';
			$username = 'student';
			$password = 'student';
			$pdo = new PDO($dsn, $username, $password);
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
			$pdo2 = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e)
		{
			echo 'Connection failed: '. $e->getMessage();
		}
    // Display every part into the store page
        
    for($i = 1; $i < 150; $i++)
    {
        $sql = 'SELECT number, pictureURL, description, price, weight FROM parts WHERE number = ' . $i . ';';
        $query = $pdo->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        $sql2 = 'SELECT quantity FROM inventory WHERE partNum = ' . $i . ';';
        $query2 = $pdo2->query($sql2);
        $result2 = $query2->fetch(PDO::FETCH_ASSOC);
        
        $test = $result['pictureURL'];
        
            if($test != '')
            {
                echo "<div class='product'>";

                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='code' value='".$result['number']."'/>";

                    echo "<img id='img' src='" . $result['pictureURL'] . "'>";
                    echo "<span id='desc'>Description: " . $result["description"] ."</span>";
                    echo "<span id='price'>Price: $" . $result["price"] ."</span>";
                    echo "<span id='weight'>Weight: " . $result["weight"] ."</span>";
                    
                    echo "<span id='quantity'>Quantity: " . $result2["quantity"] ."</span>";
                    echo "<div id='buttons'> <button type='submit' class='buy'> Add to cart </input> </div>";
                    echo "</form>";

                echo "</div>";

                $cartArray = array(
                    $result["number"]=>array(
                        'number'=>$result["number"],
                        'price'=>$result["price"],
                        'quantity'=>1,
                        'image'=>$result["pictureURL"])
                    );
            }
        }

        $status="";
        if (isset($_POST['code']) && $_POST['code']!="")
        {
            
            if(empty($_SESSION["shopping_cart"]))
            {
                $_SESSION["shopping_cart"] = $cartArray;
                $status = "<div class='box'>Product is added to your cart!</div>";
            }
            else
            {
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                if(in_array($code,$array_keys))
                {
                    $status = "<div class='box' style='color:red;'>
                    Product is already added to your cart!</div>"; 
                }
                
                else
                {
                    $_SESSION["shopping_cart"] = array_merge(
                    $_SESSION["shopping_cart"],
                    $cartArray
                    );
                    $status = "<div class='box'>Product is added to your cart!</div>";
                }         
            }
        }

?>