<?php session_start();

require 'config.php';
require 'functions.php';
$conexion = conexion($db_config);
comprobarSession();
if (!$conexion) {
    header('Location: ../error.php');
}
$css = 'main.css';
require 'views/consultas.view.php';