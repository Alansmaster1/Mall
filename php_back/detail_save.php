<?php
$itemname = $_GET['name'];
session_start();

$_SESSION['itemname'] = $itemname;

?>