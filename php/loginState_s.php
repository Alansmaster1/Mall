<?php
session_start();
if(isset($_SESSION["salename"])){
    echo "document.write('<a id=\"logout\" href=\"#\">退出登陆</a>');";
} else {
    echo "document.write('<a id=\"login\" href=\"login.html\">登陆</a>');";
}
?>