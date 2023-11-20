<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 

$conexion = conexion($db_config);
if (!$conexion) {
    header('Location: error.php');
}

$css = 'under-construction.css';


include 'views/under-construction.view.php';