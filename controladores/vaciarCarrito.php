<?php
session_start();
header("location: " . $SERVER['HTTP_REFERER'] . "");
unset($_SESSION['carrito']);
?>