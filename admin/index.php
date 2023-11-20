<?php session_start();

require 'config.php';
require 'functions.php';
$conexion = conexion($db_config);
if (!$conexion) {
    header('Location: ../error.php');
}

$sql = "SELECT * FROM consultas ORDER BY con_fecha DESC LIMIT 6";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM solicitudes ORDER BY soli_date DESC LIMIT 6";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$solicitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$doc_title = "DOCUMENTO-TITLE";
$css1 = 'css/admin.css';
require 'views/admin_index.view.php';