<?php
$salename = strval($_GET['salename']);
$passwd = strval($_GET['passwd']);

$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql_sale_insert = "insert into customers.saleslist value ('$salename','$passwd');";
mysqli_query($con,$sql_sale_insert);

mysqli_close($con);
?>