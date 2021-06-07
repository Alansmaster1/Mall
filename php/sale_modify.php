<?php
$salename = strval($_GET['name']);
$passwd = strval($_GET['passwd']);

$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql = "update customers.saleslist set passwd='$passwd' where name='$salename'";
mysqli_query($con,$sql);


mysqli_close($con);
?>