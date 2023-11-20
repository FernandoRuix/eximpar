<?php session_start();

require 'config.php';
require 'functions.php';
comprobarSession();
status_four();
$conexion = conexion($db_config);
if (!$conexion) {
    header('Location: ../error.php');
}

$css = 'main.css';
require 'views/admins-list.view.php';