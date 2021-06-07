<?php
session_start();
$salename = $_SESSION['salename'];

$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if (!$con) {
    die('Could not connect');
}
$sql="SELECT itemslist.* FROM customers.silist,customers.itemslist where salename='$salename' and itemslist.name=silist.itemname";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
    $name = $row['name'];
    $s = "select sum(amount) as amount_res, sum(tolprice) as price_res from customers.cilog where itemname='$name';";
    $res = mysqli_query($con,$s);
    echo "document.write('";
    echo "<div class=\"item-content-bottom-img\" onClick=\"modify(this)\">";
    echo "<table>";
    echo "<tr><th>商品名</th><td class=\"name\">".$row['name']."</td></tr>";
    echo "<tr><th>数量</th><td>".$row['amount']."</td></tr>";
    echo "<tr><th>价格</th><td>".$row['price']."</td></tr>";
    if($res != null && $res->num_rows>0){
        $r = mysqli_fetch_array($res);
        echo "<tr><th>售出总数</th><td>".$r['amount_res']."</td></tr>";
        echo "<tr><th>销售总额</th><td>".$r['price_res']."</td></tr>";
    } else {
        echo "<tr><th>售出总数</th><td>0</td></tr>";
        echo "<tr><th>销售总额</th><td>0</td></tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "');";
    // echo 'document.write("<p>Hi</p>");';
}

mysqli_close($con);
?>