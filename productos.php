<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 

//TMP
comprobarSession();

$conexion = conexion($db_config);
if (!$conexion) {
    header('Location: error.php');
}

#MAIN_CATEGORY
$sql = "SELECT * FROM categorias";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

#SUB_CATEGORY
$sql = "SELECT * FROM subcategorias WHERE id_categorias = 1 AND subca_activo = 1";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$subcategorias_equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$sql = "SELECT * FROM subcategorias WHERE id_categorias = 2 AND subca_activo = 1";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$subcategorias_reactivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$sql = "SELECT * FROM subcategorias WHERE id_categorias = 3 AND subca_activo = 1";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$subcategorias_materiales = $stmt->fetchAll(PDO::FETCH_ASSOC);
$sql = "SELECT * FROM subcategorias WHERE id_categorias = 4 AND subca_activo = 1";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$subcategorias_software = $stmt->fetchAll(PDO::FETCH_ASSOC);


$subcategoria = 'quimica-clinica';
$css = 'productos.css';
$dtb_name = 'productos';
$filename = 'productos.php';

include 'views/productos.view.php';