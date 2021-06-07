<?php
$salename = strval($_GET['salename']);

$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql = "delete from customers.saleslist where name='$salename'";
mysqli_query($con,$sql);

mysqli_close($con);
?>