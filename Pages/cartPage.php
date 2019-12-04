<html>

<head>

 <title>Shopping Cart</title>

</head>

<body>

<h1>Cart</h1>

Receive image and other product info from when directed to this page

<br>

<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
  if(!empty($_SESSION["shopping_cart"])) {
      foreach($_SESSION["shopping_cart"] as $key => $value) {

        if($_POST["part"] == $value["number"]){
          unset($_SESSION["shopping_cart"][$key]);

          $status = "<div class='box' style='color:red;'>
          Product is removed from your cart!</div>";
        }
        if(empty($_SESSION["shopping_cart"]))
          unset($_SESSION["shopping_cart"]);
        } 
    }
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['number'] === $_POST["part"]){
        $value['quantity'] = $_POST["quantity"];
        echo $value;
        break; // Stop the loop after we've found the product
    }
  }
}
?>

<div class="cart">
<?php
  if(isset($_SESSION["shopping_cart"])){
      $total_price = 0;
?> 
<table class="table">
<tbody>
<tr>
  <td>Item</td>
  <td>Item Description</td>
  <td>Quantity</td>
  <td>Unit Price</td>
  <td>Items Total</td>
</tr>

<?php 
  foreach ($_SESSION["shopping_cart"] as $product){
?>

<tr>

  <td>
    <img src='<?php echo $product["image"]; ?>' width="100%" height="100%" />
  </td>

  <td><?php echo $product["description"]; ?><br />
    <form method='post' action=''>
    <input type='hidden' name='part' value="<?php echo $product["number"]; ?>" />
    <input type='hidden' name='action' value="remove" />
    <button type='submit' class='remove'>Remove Item</button>
    </form>
  </td>

  <td>
    <form method='post' action=''>

    <input type='hidden' name='part' value="<?php echo $product["number"]; ?>" />
    <input type='hidden' name='action' value="change" />
    <select name='quantity' class='quantity' onChange="this.form.submit()">

    <option <?php if($product["quantity"]==1) echo "selected";?>
    value="1">1</option>
    <option <?php if($product["quantity"]==2) echo "selected";?>
    value="2">2</option>
    <option <?php if($product["quantity"]==3) echo "selected";?>
    value="3">3</option>
    <option <?php if($product["quantity"]==4) echo "selected";?>
    value="4">4</option>
    <option <?php if($product["quantity"]==5) echo "selected";?>
    value="5">5</option>

    </select>
    </form>
  </td>

  <td><?php echo "$".$product["price"]; ?></td>

  <td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>

</tr>

<?php
  $total_price += ($product["price"]*$product["quantity"]);
  }
?>

<tr>
  <td colspan="5" align="right">
    <strong>Total: <?php echo "$".$total_price; ?></strong>
  </td>

</tr>

</tbody>
</table> 

<?php
  }
  else{
  echo "<h3>Your cart is empty!</h3>";
  }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
  <?php echo $status; ?>
</div>

<a href="./partsOrder.php">
  <button> Continue Shopping </button>
</a>

<a href="./purchasePage.php">
  <button> Proceed to Purchase </button>
</a>

</body>

</html>