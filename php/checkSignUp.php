<?php
$name = strval($_GET['a']);
$passwd = strval($_GET['b']);
$mail = strval($_GET['c']);
$sex = strval($_GET['d']);

$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql = "INSERT INTO customers.customerslist(name,passwd,email,sex) VALUES ('".$name."','".$passwd."','".$mail."','".$sex."')";
$result = mysqli_query($con,$sql);

if($result == TRUE){
    echo "true";
} else {
    echo "false";
}

mysqli_close($con);
?>