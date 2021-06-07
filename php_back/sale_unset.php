<?php
session_start();
$salename = $_SESSION['salename'];

class Sale{
    public $name;
    public $passwd;
}

$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql="SELECT * FROM customers.saleslist where name='$salename'";
$result = mysqli_query($con,$sql);

if($result->num_rows>0) {
    while($row = mysqli_fetch_array($result)) {
        $sale = new Sale();
        $sale->name = $row['name'];
        $sale->passwd = $row['passwd'];
        $data[] = $sale;
    }
    $json = json_encode($data,JSON_UNESCAPED_UNICODE);
    echo $json;
} else {
    echo "";
}

mysqli_close($con);
?>