<?php
    function whole($connection, $connection2)
    {

        
        for($i = 1; $i < 150; $i++)
        {
            $sql = 'SELECT pictureURL, description, price, weight FROM parts WHERE number = ' . $i . ';';
            $query = $connection->query($sql);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            $sql2 = 'SELECT quantity FROM inventory WHERE partNum = ' . $i . ';';
            $query2 = $connection2->query($sql2);
            $result2 = $query2->fetch(PDO::FETCH_ASSOC);
            
            $test = $result['pictureURL'];
            
                if($test != '')
                {
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
?>