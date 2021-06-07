<?php
session_start();
$managername = $_SESSION['managername'];

$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if (!$con) {
    die('Could not connect');
}
$sql="SELECT * FROM customers.saleslist";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
    echo "document.write('";
    echo "<div class=\"item-content-bottom-img\" onClick=\"modify(this)\">";
    echo "<table>";
    echo "<tr><th>销售员</th><td class=\"name\">".$row['name']."</td></tr>";
    echo "<tr><th>口令</th><td>".$row['passwd']."</td></tr>";
    echo "</table>";
    echo "</div>";
    echo "');";
}

mysqli_close($con);
?>