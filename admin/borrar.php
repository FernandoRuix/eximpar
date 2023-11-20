<?php session_start();

require 'config.php';
require '../functions.php';

comprobarSession();

$conexion = conexion($db_config);
if(!$conexion){
	// header('Location: ../error.php');
}

$id = limpiarDatos($_GET['id']);
$dtb_name = limpiarDatos($_GET['dtb_name']);
$filename = limpiarDatos($_GET['filename']);


// Comprobamos que exista un ID
if (!$id) {
	echo 'Hola :)';
}

$statement = $conexion->prepare("DELETE FROM $dtb_name WHERE id = $id");
$statement->execute();

header('Location: ' . RUTA . '/admin/' . $filename);

?>