<?php
session_start();
if(!isset($_SESSION['username'])){
    return;
}
$username = $_SESSION['username'];
$con = mysqli_connect('localhost','root','712939','customers',3306);
if ($con->connect_error) {
    die('Could not connect');
}
$sql = "select * from customers.cilist where username='$username';";
$result = mysqli_query($con,$sql);
$sum = 0;
if($result->num_rows>0){
    while($row = mysqli_fetch_array($result)){
        echo "document.write('";
        echo "<div class=\"add-info-intro\">";
        echo "<p class=\"name\">".$row['itemname']."</p>";
        echo "<p class=\"item-price-title\">总 价<span class=\"item-price item-price-total\">".$row['tolprice']."</span></p>";
        echo "<p class=\"item-amount-title item-price-title\">数 量<span class=\"item-price item-amount\">".$row['tolamount']."</span></p>";
        echo "<button class=\"btn-car btn-car-to-detail\" onClick=\"detail(this)\">查看<span class=\"name\">".$row['itemname']."</span></button>";
        echo "<button class=\"btn-car btn-car-to-detail\" onClick=\"cancelItem(this)\">放弃购买<span class=\"name\">".$row['itemname']."</span></button>";
        echo "</div>";
        echo "');";
        // echo 'document.write("<p>Hi</p>");';
        $sum = $sum + $row['tolprice'];
    }
    echo "document.write('";
    echo "<div class=\"car-btn-row\"><button class=\"btn-car btn-car-to-pay\" onClick=\"pay(this)\">结算  <span id=\"sum\">$sum</button></div>";
    echo "');";
}

mysqli_close($con);
?>