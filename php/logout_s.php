<?php
session_start();
unset($_SESSION['salename']);
session_destroy();
?>