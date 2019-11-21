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
<body> // onload="showInfo()">
<h2>Warehouse Section </h2>
<h3>List of Orders: </h3>
<div class="scroll">
 <input type="radio" onclick="showInfo()" name="order" value="orderOne"> Order 1<br>
 <div class="order" id="orderDIV" style="display:none">Order Information Here</div>

 <button onclick="showInfo()">Order 1</button> <br>
 <div class="order" id="orderDIV" style="display:none">Other Order Information Here</div>

 <input type="radio" onclick="showInfo()"  name="order" value="orderTwo"> Order 2<br>
 <div class="order" id="orderDIV" style="display:none">Another Order's Information Here</div>

 <input type="radio" name="order" value="orderThree"> Order 3<br>

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

	<button type="button">Print Shipping Label</button>
	<button type="button">Submit Invoice</button>
	<button type="button">Print Packing List</button>
	<button type="button">Update Inventory</button>

<ul>
  <li>Part2 <button type="button">Print Shipping Label</button> </li>
</ul>

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
Part Name:
<input type="text" name="partName"><br>
Part ID:
<input type="text" name="partID"><br>
Quantity:
<input type="text" name="qty"><br>
<button type="button">Update Inventory</button>

<h2>Administrator<h2>
<button type"button">Edit Shipping and Handling Fees</button>


</body>
</html>
