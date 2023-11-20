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
		'UPDATE subcategorias SET
			subca_titulo 		= :titulo,
			subca_dbtitulo   	= :dbtitulo,
			id_prioridades 		= :prioridad
		WHERE
			subcategorias_id = :dbquest
		'
	);

	$statement->execute([
		':titulo' => $titulo,
		':dbtitulo' => $dbtitulo,
		':prioridad' => $prioridad,
		':dbquest' => $_POST['hidden_id']
	]);
	$_SESSION["ALERT"] = ["MSG" => "Actualizado correctamente!", "BOOL" => true];
	
	header('Location: ' . RUTA . '/admin/subcategorias-list.php');
	
} elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
	$sql = "SELECT * FROM
		subcategorias A 
	LEFT JOIN
		prioridades B
	ON
		A.id_prioridades = B.prioridades_id
	LEFT JOIN
		categorias c
	ON
		A.id_categorias = C.categorias_id
	
	WHERE 
		A.subca_dbtitulo = :request
	";
	$stmt = $conn->prepare($sql);
	$stmt->execute([
		":request" => $_GET['q']
	]);
	$single = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else{
	header('Location: ' . RUTA . '/admin/products-list.php');
}

//SELECT OPTIONS
$sql = "SELECT * FROM prioridades";
$stmt = $conn->prepare($sql);
$stmt->execute();
$prioridades = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categorias WHERE cate_activo = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

$css = 'main.css';
require 'views/subcategorias-edit.view.php';