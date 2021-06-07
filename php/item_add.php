<?php
session_start();
$salename = $_SESSION['salename'];
$itemname = strval($_GET['itemname']);
$price = doubleval($_GET['price']);
$amount = intval($_GET['amount']);

$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql_item_insert = "insert into customers.itemslist value ('$itemname',$amount,$price);";
$sql_si_insert = "insert into customers.silist value ('$salename','$itemname');";
mysqli_query($con,$sql_item_insert);
mysqli_query($con,$sql_si_insert);


mysqli_close($con);
?>