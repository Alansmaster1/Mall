<?php
session_start();
unset($_SESSION['managername']);
session_destroy();
?>