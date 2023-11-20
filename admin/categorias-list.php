<?php session_start();

require 'config.php';
require 'functions.php';
$conexion = conexion($db_config);
comprobarSession();
if (!$conexion) {
    header('Location: ../error.php');
}

$doc_title = "DOCUMENTO-TITLE";
$css1 = 'css/admin.css';
require 'views/categorias-list.view.php';