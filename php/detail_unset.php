<?php
session_start();
$itemname = $_SESSION['itemname'];

class Item{
    public $name;
    public $amount;
    public $price;
}

$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql="SELECT * FROM customers.itemslist where name='".$itemname."'";
$result = mysqli_query($con,$sql);

if($result) {
    while($row = mysqli_fetch_array($result)) {
        $item = new Item();
        $item->name = $row['name'];
        $item->amount = $row['amount'];
        $item->price = $row['price'];
        $data[] = $item;
    }
    $json = json_encode($data,JSON_UNESCAPED_UNICODE);
    echo $json;
} else {
    echo "查询失败了,老铁";
}

mysqli_close($con);
?>