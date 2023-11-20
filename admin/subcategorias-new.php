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
	$categoria 		= $_POST['categoria'];
	$dbtitulo 		= tituloToUrl($titulo);	

	$statement = $conn->prepare(
		'INSERT INTO subcategorias (
			subca_titulo,
			subca_dbtitulo,
			id_categorias,
			id_prioridades
		) 
		VALUES(
			:titulo,
			:dbtitulo,
			:categoria,
			:prioridad
		)'
	);

	$statement->execute([
		':titulo' => $titulo,
		':dbtitulo' => $dbtitulo,
		':categoria' => $categoria,
		':prioridad' => $prioridad
	]);

	$_SESSION["ALERT"] = ["MSG" => "Creado correctamente!", "BOOL" => true];
	header('Location: ' . RUTA . '/admin/subcategorias-list.php');
}

$sql = "SELECT * FROM prioridades";
$stmt = $conn->prepare($sql);
$stmt->execute();
$prioridades = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categorias";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

$css = 'main.css';
require 'views/subcategorias-new.view.php';