<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 
comprobarSession();
$conexion = conexion($db_config);
if (!$conexion) {
    // header('Location: error.php');
}
$dtb_name = 'productos';

$css = 'contacto.css';

include 'views/contacto.view.php';