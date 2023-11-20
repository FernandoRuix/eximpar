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


$doc_title = 'Detalle de Cotización';
$css1 = 'css/checkout.css';
include 'views/checkout.view.php';