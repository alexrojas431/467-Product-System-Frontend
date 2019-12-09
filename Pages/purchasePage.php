<html>
<head>
    <title>Purchasing Details</title>
</head>

<body>
<?php

//  This file displays the form for the user to fill out
//  The logic for the credit card authorization is found in the Verifacation.php

?>
<h1>Purchasing Info</h1>

<br>
<form method="POST" action="/~z1813783/Verifacation.php">
First Name:
<input type="text" name="fName"><br>
<br/>

Last Name:
<input type="text" name="lName"><br>
<br/>

Address:
<input type="text" name="addr"><br>
<br/>

Email address:
<input type="text" name="email"><br>
<br/>

Credit Card Number:
<input type="text" name="ccNum"><br>
<br/>

Expiration Date:
<input type="text" name="expireDate"><br>
<br/>

CVV:
<input type="text" name="cvv"><br>

<br/>

<input type="submit" name="submitBtn"Complete Purchase>
</form>


<a href="./cartPage.php">
    <button type="button">Go Back to cart</button>
</a>
</body>
</html>

