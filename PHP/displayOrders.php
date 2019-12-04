
<?php

    #Displays info from orderHistory for the workers

    function whole($connection)
    {
        $sql = 'SELECT partNum, partDesc, email, price, status FROM orderHistory;';
            $query = $connection->query($sql);
        echo "<div class='scroll'>";
        while($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo "<div id='product'>";
                //echo "<span id='button'><input type='radio' name ='order'></span>";
                //echo "<input type='text' name='OQ'>";
		//echo "<input type='text' name='pNum'>";
		echo "<span id='desc'>Description: ". $result["partDesc"] ."</span>";
                echo "<span id='price'>Price: $". $result["price"] ."</span>";
                echo "<span id='num'>Part Number: ". $result["partNum"] ."</span>";
		echo "<span id='email'>User: ". $result["email"] ."</span>";
		//echo "<input type='submit' name='Update Inventory'>";
		echo "<span id='status'>Status: ".$result["status"] ."</span>"; 
            echo "</div>";
        }
        echo "</div>";
    }
?>


