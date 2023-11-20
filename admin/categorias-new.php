<?php session_start();

require 'config.php';
require 'functions.php';
$conn = conexion($db_config);
comprobarSession();
if (!$conn) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo 		= $_POST['nombre'];
	$prioridad 		= $_POST['prioridad'];
	$dbtitulo 		= tituloToUrl($titulo);	

	$statement = $conn->prepare(
		'INSERT INTO categorias (
			cate_titulo,
			cate_dbtitulo,
			id_prioridades
		) 
		VALUES(
			:titulo,
			:dbtitulo,
			:prioridad
		)'
	);

	$statement->execute([
		':titulo' => $titulo,
		':dbtitulo' => $dbtitulo,
		':prioridad' => $prioridad
	]);

	$_SESSION["ALERT"] = ["MSG" => "Creado correctamente!", "BOOL" => true];
	header('Location: ' . RUTA . '/admin/categorias-list.php');
}

$sql = "SELECT * FROM prioridades";
$stmt = $conn->prepare($sql);
$stmt->execute();
$prioridades = $stmt->fetchAll(PDO::FETCH_ASSOC);

$css = 'main.css';
require 'views/categorias-new.view.php';