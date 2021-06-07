<?php
$itemname = $_GET['itemname'];
$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}
$sql="SELECT * FROM customers.itemslist where locate('$itemname',name)";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
    echo "<div class=\"item-content-bottom-img\" onClick=\"detail(this)\">";
    echo "<table>";
    echo "<tr><th>商品名</th><td class=\"name\">".$row['name']."</td></tr>";
    echo "<tr><th>数量</th><td>".$row['amount']."</td></tr>";
    echo "<tr><th>价格</th><td>".$row['price']."</td></tr>";
    echo "</table>";
    echo "</div>";
}

mysqli_close($con);
?>