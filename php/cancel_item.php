<?php
session_start();
if(!isset($_SESSION['username'])){
    return;
}
$username = $_SESSION['username'];
$itemname = $_GET['itemname'];
$con = mysqli_connect('localhost','root','712939','customers',3306);
if ($con->connect_error) {
    die('Could not connect');
}
$amount = 0;
$sql_ci_query = "select tolamount from customers.cilist where username='$username' and itemname='$itemname';";
$sql_ci_delete = "delete from customers.cilist where username='$username' and itemname='$itemname';";

$result_ci_query = mysqli_query($con,$sql_ci_query);
if($result_ci_query->num_rows>0){
    $row = mysqli_fetch_array($result_ci_query);
    $amount = $row['tolamount'];
    $sql_item_update = "update customers.itemslist set amount=amount+$amount where name='$itemname'";
    $con->query($sql_item_update);
    $con->query($sql_ci_delete);
}



mysqli_close($con);

?>