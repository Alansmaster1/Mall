<?php
session_start();
$username = $_SESSION['username'];

$cost = $_GET['sum'];

$con = mysqli_connect('localhost','root',',aA712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql_user_query = "select money,email from customers.customerslist where name='$username';";
$result = mysqli_query($con,$sql_user_query);
if($result != null && $result->num_rows > 0){
    $row = mysqli_fetch_array($result);
    $money = $row['money'];
    $email = $row['email'];
    if($money >= $cost){
        $sql_money_update = "update customers.customerslist set money=money-$cost where name='$username';";
        mysqli_query($con,$sql_money_update);
        

        //mail($email,"陋室商城通知","您的商品已支付,本店拒绝发货");
        echo "支付成功";
        $sql_ci_query = "select * from customers.cilist where username='$username'";
        $result_ci_query = $con->query($sql_ci_query);
        if($result_ci_query->num_rows >0){
            $dateObj = new DateTime();
            $date = $dateObj->format('Y-m-d H:m:s');
            while($row = mysqli_fetch_array($result_ci_query)){
                $itemname = $row['itemname'];
                $tolprice = $row['tolprice'];
                $tolamount = $row['tolamount'];
                $sql = "insert into customers.cilog(username,itemname,tolprice,amount,date) value ('$username','$itemname',$tolprice,$tolamount,'$date');";
                $con->query($sql);
            }
        }

        $sql_ci_delete = "delete from customers.cilist where username='$username';";
        mysqli_query($con,$sql_ci_delete);

    } else {
        echo "余额不足";
    }
} else {
    echo "查询错误";
}

mysqli_close($con);
?>