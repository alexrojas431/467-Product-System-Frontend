<html>
<head>
<title>Parts Co. Employee Page </title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
div.order {
  width: 100%;
  padding: 50px;
  text-align: center;
  background-color: blue;
  margin-top: 20px;
}

div.scroll {
 background-color: lightblue;
 width: 800px;
 height: 500px;
 overflow: scroll;
}
</style>

</head>
<h1>Employees Only Page </h1>
<body>
<h2>Warehouse Section </h2>
<h3>List of Orders: </h3>
<div class="scroll">

	 <?php
                require('displayOrders.php');

                #Establish database connection include functions.php file
                try
                {
                        $dsn = 'mysql:host=courses;dbname=z1853137';
                        $pdo = new PDO($dsn, 'z1853137', '1998Mar21');
                }
                catch(PDOException $e)
                {
                        echo 'Connection failed: '. $e->getMessage();
            }

                whole($pdo);

        ?>

</div>

	<button type="button">Print Shipping Label</button><br>

	<form method="post" action="/~z1860858/submitInvoice.php">
	<input type="text" name="OID">
	<button type="submit">Submit Invoice</button><br>
	</form>

	<button type="button">Print Packing List</button><br>

	<form method="post" action="/~z1860858/updateInvens.php">
	Quantity: <input type="text" name="OQ">
	Part Number: <input type="text" name="pNum">
	<button type="submit">Update Inventory</button><br>
	</form>

<script>
function showInfo() {
 var x = document.getElementById("orderDIV");
 if (x.style.display === "none") {
  x.style.display = "block";
  } else {
  x.style.display = "none";
  }
}
</script>

<h2>Receiving Desk<h2>
<h3>Receieved Products<h3>
	<form method="post" action="/~z1860858/updateInvenr.php">
	Quantity:
	<input type="text" name="OQ"><br>
	Part Number:
	<input type="text" name="pNum"><br>
	<button type="submit">Update Inventory</button>
	</form>

<h2>Administrator<h2>
<button type"button">Edit Shipping and Handling Fees</button>


</body>
</html>
