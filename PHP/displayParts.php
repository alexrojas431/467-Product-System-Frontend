<?php

    #Displays info from legacy database as store page for customer

    function whole($connection)
    {
        $sql = 'SELECT pictureURL, description, price, weight FROM parts;';
	    $query = $connection->query($sql);
	echo "<div class='scroll'>";
        while($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo "<div id='product'>";
                echo "<img id='prodImg' src='" . $result['pictureURL'] . "'>";
                echo "<span id='desc'>Description: ". $result["description"] ."</span>";
                echo "<span id='price'>Price: $". $result["price"] ."</span>";
                echo "<span id='weight'>Weight: ". $result["weight"] ."</span>";
                echo "<button type='button'>Add to Cart</button>";
            echo "</div>";
        }
	echo "</div>";
    }
?>
