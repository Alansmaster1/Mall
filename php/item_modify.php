<?php
$itemname = strval($_GET['name']);
$price = doubleval($_GET['price']);
$amount = intval($_GET['amount']);

$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql = "update customers.itemslist set price=$price,amount=$amount where name='$itemname'";
$result = mysqli_query($con,$sql);


mysqli_close($con);
?>