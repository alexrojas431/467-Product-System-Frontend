<html>

<head>

<title>Parts Co. Employee Page </title>



<meta name="viewport" content="width=device-width, initial-scale=1">

<style>



div.scroll {

 background-color: lightblue;

 width: 700px;

 height: 400px;

 overflow: scroll;

}

</style>



</head>

<h1>Employees Only Page </h1>

<body>

   <a href="./navigation.php"> <button> Back to Home </button> </a>
<h2>Warehouse Section </h2>

<h3>List of Orders: </h3>

<div class="scroll">



	 <?php

                require('displayOrders.php');



                #Establish database connection include functions.php file

                try

                {

                        $dsn = 'mysql:host=courses;dbname=z1813783';

                        $pdo = new PDO($dsn, 'z1813783', '1999Feb21');

                }

                catch(PDOException $e)

                {

                        echo 'Connection failed: '. $e->getMessage();

            }



                whole($pdo);



        ?>



</div>

	<br>

	Enter Order ID: <input type="text" name="OID"><br>

	<button type="button" onclick="alert('Printing Shipping Label')">Print Shipping Label</button><br><br>



	<form method="post" action="/~z1813783/submitInvoice.php">

	Enter Order ID: <input type="text" name="OID"><br>

	<button type="submit" onclick="alert('Sending E-mail Confirmation to Customer')")>Submit Invoice</button><br><br>

	</form>



	Enter Order ID: <input type="text" name="OID"><br>

	<button type="button" onclick="alert('Printing Packing List')">Print Packing List</button><br><br>



	<form method="post" action="/~z1813783/updateInvens.php">

	Quantity: <input type="text" name="OQ"><br>

	Part Number: <input type="text" name="pNum"><br>

	<button type="submit">Update Inventory</button><br><br>

	</form>



<script type="text/javascript">

function printLabel() {

 window.alert("Printing Order Label");

}



funtion printList() {

 alert("Printing Packing List");

}



</script>



<h2>Receiving Desk</h2>

Receieved Products

	<form method="post" action="/~z1813783/updateInvenr.php">

	Quantity:

	<input type="text" name="OQ"><br>

	Part Number:

	<input type="text" name="pNum"><br>

	<button type="submit">Update Inventory</button>

	</form>



<h2>Administrator<h2>

<form action="/~z1813783/467admin.php">

<button type="submit">Edit Shipping and Handling Fees</button>

</form>



</body>

</html>