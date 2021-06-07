<?php
$salename = strval($_GET['q']);
$passwd = strval($_GET['p']);

session_start();

$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql="SELECT * FROM customers.saleslist WHERE name = '".$salename."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    if($row['name'] == $salename && $row['passwd'] == $passwd){
        //echo "<tr><th>CustomerID</th><td>" . $row['id'] . "</td></tr>";
        //echo "<tr><th>CompanyName</th><td>" . $row['name'] . "</td></tr>";
        $_SESSION["salename"] = $salename;
        echo $row['name'];
    }
}
mysqli_close($con);
?>