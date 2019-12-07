<html>

<head>

 <title>Shopping Cart</title>
	
 <link rel="stylesheet" href="./cartPage.css">

</head>

<body>

<h1>Cart</h1>

<br>

<?php
//  This file will allow the user to remove an item and add quantity to their cart
//  Aside from displaying the information about each item (weight, individual price, total price)
//  It will also calculate the total weight and total price of the cart

session_start();
    
// The status variable tells the user about the removal of a product
$status="";

//  If the remove button is clicked on this loop will go through each item in the shopping cart until it matches the part selected.
//    This is done through matching the part number in the remove button and part number in the shopping cart
//  Once done, the item will be removed from the cart and a notice will be given to the user
//  If the item removed was the final item in the cart then the cart will be deleted from session storage.
//    The user will be notified of this change; can be found near the end of the file
//    The total price and total weight will be recalculated

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
 
//  Very similar logic to the remove loop above
//  If the quantity button is clicked on this loop will go through each item in the shopping cart until it matches the part selected.
//    This is done through matching the part number in the quantity button and part number in the shopping cart
//  Once done, the quantity wil be change both visually and in the cart
//    The total price and total weight (for both the item and overall) will be recalculated

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['number'] === $_POST["part"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
  }
}
?>

<div class="cart">
<?php
  if(isset($_SESSION["shopping_cart"])){
  // Declare total variables to be used at the end
      $total_uprice = 0;
      $total_uweight = 0;
?> 
<table class="table">
<tbody>
<tr>
  <td>Item</td>
  <td>Item Description</td>
  <td>Quantity</td>
  <td>Unit Price</td>
  <td>Total U. Price</td>
  <td>Unit Weight</td>
  <td>Total U. Weight</td>
</tr>

<?php 

//  Showing each item info inside the cart
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

  <td align="center">
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
<?php

//  Calculate the totals for the items

?>
  <td align="center"><?php echo "$".$product["price"]; ?></td>

  <td align="center"><?php echo "$".$product["price"]*$product["quantity"]; ?></td>

  <td align="center"><?php echo $product["weight"]."g"; ?></td>

  <td align="center"><?php echo $product["weight"]*$product["quantity"]."g"; ?></td>

</tr>

<?php
//  Calculate the totals for the whole cart, later displaying them for the user
  $total_uprice += ($product["price"]*$product["quantity"]);
  $total_uweight += ($product["weight"]*$product["quantity"]);
  }
?>

<tr>
  <td colspan="5" align="right">
    <strong>Item's Total: <?php echo "$".$total_uprice; ?></strong>
  </td>
  
  <td colspan="5" align="right">
    <strong>Total Weight: <?php echo $total_uweight."g"; ?></strong>
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

<div class="buttonG">
  <a href="./partsOrder.php">
    <button> Continue Shopping </button>
  </a>

  <a href="./purchasePage.php">
    <button> Proceed to Purchase </button>
  </a>
</div>

</body>

</html>