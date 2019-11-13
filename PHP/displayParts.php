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
            whole($pdo);
            function whole($connection)
            {
                $sql = 'SELECT * FROM parts;';
	            $query = $connection->query($sql);

            	echo '<p>';
            	echo '<table>';
            	echo '<thead>';
            	echo '<th> number </th>';
            	echo '<th> description </th>';
            	echo '<th> price </th>';
            	echo '<th> weight </th>';
            	echo '<th> pictureURL </th>';
            	echo '</thead>';

            	echo '<tbody>';
            	while($result = $query->fetch(PDO::FETCH_ASSOC))
            	{
            		echo '<tr>';
            		echo '<td> ' . $result['number'] . ' </td>';
            		echo '<td> ' . $result['description'] . ' </td>';
            		echo '<td> ' . $result['price'] . ' </td>';
            		echo '<td> ' . $result['weight'] . ' </td>';
            		echo '<td> ' . $result['pictureURL'] . ' </td>';
            		echo '</tr>';
            	}

            	echo '</tbody>';
            	echo '</table>';
            	echo '</p>';
            }
?>