<?php
session_start();
$username = $_SESSION['username'];

$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}
$dateObj = new DateTime();
$date = $dateObj->format('Y-m-d H:i:s');
$ip=$_SERVER["REMOTE_ADDR"];
$sql_log = "insert into customers.customerslog(name,state,ip_addr,date) value('$username','logout','$ip','$date');";
mysqli_query($con,$sql_log);
mysqli_close($con);

unset($_SESSION['username']);
session_destroy();
?>