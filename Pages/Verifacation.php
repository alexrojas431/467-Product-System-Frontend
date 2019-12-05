<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<h1>Payment Processing<h2>

</head>

<?php
function getRdmStr($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
}

$url = 'http://blitz.cs.niu.edu/CreditCard/';

$data = array(

        'vendor' => getRdmStr(10),

        'trans' =>  getRdmStr(10),

        'cc' => $_POST['ccNum'],

        'name' => $_POST['custName'], 

        'exp' => $_POST['expireDate'], 

        'amount' => 123);


$options = array(

    'http' => array(

        'header' => array('Content-type: application/json', 'Accept: application/json'),

        'method' => 'POST',

        'content'=> json_encode($data)

    )

);


$context  = stream_context_create($options);

$result = file_get_contents($url, false, $context);

echo($result);

?>