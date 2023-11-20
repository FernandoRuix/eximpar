<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 
$xd = '{"name":"John", "age":30, "car":null}';

comprobarSession();
$conexion = conexion($db_config);
if (!$conexion) {
    header('Location: error.php');
}


if ($_COOKIE["shopping_cart"] == '[]') {
    header('Location: productos.php');
}


$css = 'checkout.css';
include 'views/checkout.view.php';