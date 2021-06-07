<?php
session_start();

if(!(isset($_SESSION['username'])&&isset($_SESSION['itemname']))){
    echo "Not login.";
    return;
}

$username = $_SESSION['username'];
$itemname = $_SESSION['itemname'];

$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if ($con->connect_error) {
    die('Could not connect');
}

$sql_item_query = "select * from customers.itemslist where name='$itemname';";

$result_item_query = $con->query($sql_item_query);
$price=0.0;
$amount=0;
if($result_item_query->num_rows>0){
    $row = mysqli_fetch_array($result_item_query);
    $price = $row['price'];
    $amount = $row['amount'];
} else {
    echo "Item not found.";
    return;
}

if($amount <= 0){
    echo "Sale out.";
    return;
}

$after_amount = $amount-1;
$sql_item_update = "update customers.itemslist set amount=$after_amount where name='$itemname';";

$sql_ci_query = "select * from customers.cilist where username='$username' and itemname='$itemname';";
$result_ci_query = $con->query($sql_ci_query);
$tol_amount;
$tol_price;

if($result_ci_query->num_rows>0){
    $row = mysqli_fetch_array($result_ci_query);
    $tol_amount = $row['tolamount'] + 1;
    $tol_price = $row['tolprice'] + $price;
    //echo $tol_amount;
    $sql_ci_update = "update customers.cilist set tolamount=$tol_amount,tolprice=$tol_price where username='$username' and itemname='$itemname';";
    $result_ci_update = $con->query($sql_ci_update);
    if($result_ci_update === TRUE){
        $con->query($sql_item_update);
        echo "Update";
        return;
    } else {
        echo "Update fail";
        return;
    }
} else {
    $sql_ci_insert = "insert into customers.cilist value ('$username','$itemname',1,$price)";
    $result_ci_insert = $con->query($sql_ci_insert);
    if($result_ci_insert === TRUE){
        $con->query($sql_item_update);
        echo "Insert";
        return;
    } else {
        echo "Insert fail";
        return;
    }
}

mysqli_close($con);
?>