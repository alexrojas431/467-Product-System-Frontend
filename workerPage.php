<html>
<head>
<title>Parts Co. Employee Page </title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#orderDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
</style>

</head>
<h1>Employees Only Page </h1>
<body> // onload="showInfo()">
<h2>Warehouse Section </h2>
<h3>List of Orders: </h3>
<input type="radio" onclick="showInfo()" name="order" value="orderOne"> Order 1<br>
<div id="orderDIV" style="display:none">Order Information Here</div>

<button onclick="showInfo()">Order 1</button> <br>
<div id="orderDIV" style="display:none">Other Order Information Here</div>

<input type="radio" onclick="showInfo()"  name="order" value="orderTwo"> Order 2<br>
<div id="orderDIV" style="display:none">Another Order's Information Here</div>

<input type="radio" name="order" value="orderThree"> Order 3<br>

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
<button type="button">Update Inventory</button>

<h2>Administrator<h2>
<button type"button">Edit Shipping and Handling Fees</button>


</body>
</html>
