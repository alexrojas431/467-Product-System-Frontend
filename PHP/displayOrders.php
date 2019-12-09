<?php



    #Displays info from orderHistory for the workers



    function whole($connection)

    {

        $sql = 'SELECT orderID, partNum, partDesc, email, price, status FROM orderHistory;';

            $query = $connection->query($sql);

        echo "<div class='scroll'>";

	echo "<table border=1 width='600'";

        while($result = $query->fetch(PDO::FETCH_ASSOC))

        {

            echo "<div id='product'>";

		echo "<tr>";

                echo "<td><span id='button'><input type='radio' name ='order'></span></td>";
                echo "<td><span id='orderID'>Order ID: ". $result["orderID"] ."</span></td>";

                echo "<td><span id='desc'>Description: ". $result["partDesc"] ."</span></td>";

                echo "<td><span id='price'>Price: $". $result["price"] ."</span></td>";

                echo "<td><span id='num'>Part Number: ". $result["partNum"] ."</span></td>";

		echo "<td><span id='email'>User: ". $result["email"] ."</span></td>";

		echo "<td><span id='status'>Status: ".$result["status"] ."</span></td>";

		echo "</tr>";

            echo "</div>";

        }

	echo "</table>";

        echo "</div>";

    }

?>