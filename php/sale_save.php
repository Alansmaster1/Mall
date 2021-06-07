<?php
$salename = $_GET['name'];
session_start();
$_SESSION['salename'] = $salename;
?>