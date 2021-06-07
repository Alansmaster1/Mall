<?php
$username = strval($_GET['q']);
$passwd = strval($_GET['p']);

session_start();

$con = mysqli_connect('localhost','root','712939','customers',3306);
if (!$con) {
    die('Could not connect');
}

$sql="SELECT * FROM customers.customerslist WHERE name = '".$username."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    if($row['name'] == $username && $row['passwd'] == $passwd){
        //echo "<tr><th>CustomerID</th><td>" . $row['id'] . "</td></tr>";
        //echo "<tr><th>CompanyName</th><td>" . $row['name'] . "</td></tr>";
        $_SESSION["username"] = $username;
        $dateObj = new DateTime();
        $date = $dateObj->format('Y-m-d H:i:s');
        $ip=$_SERVER["REMOTE_ADDR"];
        $sql_log = "insert into customers.customerslog(name,state,ip_addr,date) value('$username','login','$ip','$date');";
        mysqli_query($con,$sql_log);
        echo $row['name'];
    }
}
mysqli_close($con);
?>