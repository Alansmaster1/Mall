<?php
$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if (!$con) {
    die('Could not connect');
}
$sql="SELECT * FROM customers.itemslist";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
    echo "document.write('";
    echo "<div class=\"item-content-bottom-img\" onClick=\"detail(this)\">";
    echo "<table>";
    echo "<tr><th>商品名</th><td class=\"name\">".$row['name']."</td></tr>";
    echo "<tr><th>数量</th><td>".$row['amount']."</td></tr>";
    echo "<tr><th>价格</th><td>".$row['price']."</td></tr>";
    echo "</table>";
    echo "</div>";
    echo "');";
    // echo 'document.write("<p>Hi</p>");';
}

mysqli_close($con);
?>