<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<h1>Payment Processing<h2>

</head>

<?php

$url = 'http://blitz.cs.niu.edu/CreditCard/';

$data = array(

        'vendor' => 'SomeVendor',

        'trans' => '907-987654321-296',

        'cc' => $_POST['ccNum'],

        'name' => $_POST['custName'], 

        'exp' => $_POST['expireDate'], 

        'amount' => $TotalP);


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