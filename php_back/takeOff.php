<?php
$itemname = strval($_GET['itemname']);

$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql = "delete from customers.itemslist where name='$itemname'";
mysqli_query($con,$sql);

mysqli_close($con);
?>