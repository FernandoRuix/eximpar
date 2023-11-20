<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 
comprobarSession();
$conexion = conexion($db_config);
if (!$conexion) {
    // header('Location: error.php');
}
$css = 'contacto.css';


include 'views/sugerencias.view.php';