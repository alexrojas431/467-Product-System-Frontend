<?php
    
// This file is called in the partsOrder.php file (The main shopping page)
// Displays all parts into the page using the info from our own database and legacy database
// The items are stored in an array, later stored in session storage
// The session storage is where every file afterwards will use to get shopping cart information
// Specifically, the cartPage and Verifacation.php files use this
//      Session storage is used as opposed to having a table in the database so to not mess up the database

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
        
    echo "<div id='shop'>";
    
// Go through every part in the databases and output html
    for($i = 1; $i < 150; $i++)
    {
    //Legacy database
        $sql = 'SELECT number, pictureURL, description, price, weight FROM parts WHERE number = ' . $i . ';';
        $query = $pdo->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
    //Our own database
        $sql2 = 'SELECT quantity FROM inventory WHERE partNum = ' . $i . ';';
        $query2 = $pdo2->query($sql2);
        $result2 = $query2->fetch(PDO::FETCH_ASSOC);
        
    // Checks that the row exists
        $test = $result['pictureURL'];
        
    // Outputs the html
        if($test != '')
        {
            echo "<div class='product'>";

                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='part' value='".$result['number']."'/>";

                echo "<img id='img' src='" . $result['pictureURL'] . "'>";
                echo "<span id='desc'>Description: " . $result["description"] ."</span>";
                echo "<span id='price'>Price: $" . $result["price"] ."</span>";
                echo "<span id='weight'>Weight: " . $result["weight"] ."</span>";
                
                echo "<span id='quantity'>Quantity: " . $result2["quantity"] ."</span>";
                echo "<div id='buttons'> <button type='submit' id='buy'> Add to cart </button> </div>";
                echo "</form>";
            echo "</div>";
        }
       
    }
    
    echo "</div>";

// Message on whether the user decided to buy part
    $status="";
    
// Checks that the particular part was submitted into the cart
    if (isset($_POST['part']) && $_POST['part']!="")
    {

        $part = $_POST["part"];
        //Legacy database
        $sql = 'SELECT number, pictureURL, description, price, weight FROM parts WHERE number ="'. $part .'";';
        $query = $pdo->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
    //Our own database
        $sql2 = 'SELECT quantity FROM inventory WHERE partNum ="'. $part .'";';
        $query2 = $pdo2->query($sql2);
        $result2 = $query2->fetch(PDO::FETCH_ASSOC);
        
    // Also put every part into an array for session storage

        $cartArray = array(
            $result["number"]=>array(
                'number'=>$result["number"],
                'description'=>$result["description"],
                'price'=>$result["price"],
                'weight'=>$result["weight"],
                'quantity'=>1,
                'image'=>$result["pictureURL"]
                )
        );

    // Make the session storage if none is there
    // Assign the array into the session storage
        if(empty($_SESSION["shopping_cart"]))
        {
            $_SESSION["shopping_cart"] = $cartArray;
            $status = "<div class='box'>Product is added to your cart!</div>";
        }
      
        else
        {
            $array_keys = array_keys($_SESSION["shopping_cart"]);

    // Check if an item has already been added
    // Print depending on whether or not the part was found within the array
            if(in_array($_POST["part"],$array_keys))
            {
                $status = "<div class='box' style='color:red;'>
                Product is already added to your cart!</div>"; 
            }
            
            else
            {
                $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
                $status = "<div class='box'>Product is added to your cart!</div>";
            }         
        }
    }

?>