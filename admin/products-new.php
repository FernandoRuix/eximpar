<?php session_start();

require 'config.php';
require 'functions.php';
$conn = conexion($db_config);
comprobarSession();
status_three();
if (!$conn) {
    header('Location: ../error.php');
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo 		= $_POST['nombre'];
	$descripcion 	= $_POST['descripcion'];
	$thumb 			= $_FILES['thumb']['tmp_name'];
	$pdf 			= $_FILES['pdf']['tmp_name'];
	$presentacion	= $_POST['presentacion'];
	$categoria 		= $_POST['categoria'];
	$subcategoria 	= $_POST['subcategoria'];
	$marca 			= $_POST['marca'];
	$prioridad 		= $_POST['prioridad'];
	$dbtitulo 		= tituloToUrl($titulo);
	$codigo 		= $_POST['codigo'];
	

	$archivo_subido_img = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
	$archivo_subido_pdf = '../' . $blog_config['carpeta_pdfs'] . $_FILES['pdf']['name'];

	move_uploaded_file($thumb, $archivo_subido_img);
	move_uploaded_file($pdf, $archivo_subido_pdf);

	$statement = $conn->prepare(
		'INSERT INTO productos (
			prd_titulo,
			prd_descripcion,
			prd_thumb,
			prd_pdf,
			prd_presentacion,
			id_categorias,
			id_subcategorias,
			id_marcas,
			id_prioridades,
			prd_dbtitulo,
			prd_codigo
		) 
		VALUES(
			:titulo,
			:descripcion,
			:thumb,
			:pdf,
			:presentacion,
			:categoria,
			:subcategoria,
			:marca,
			:prioridad,
			:dbtitulo,
			:codigo
		)'
	);

	$statement->execute([
		':titulo' => $titulo,
		':descripcion' => $descripcion,
		':thumb' => $_FILES['thumb']['name'],
		':pdf' => $_FILES['pdf']['name'],
		':presentacion' => $presentacion,
		':categoria' => $categoria,
		':subcategoria' => $subcategoria,
		':marca' => $marca,
		':prioridad' => $prioridad,
		':dbtitulo' => $dbtitulo,
		':codigo' => $codigo
	]);

	$_SESSION["ALERT"] = ["MSG" => "Creado correctamente!", "BOOL" => true];
	header('Location: ' . RUTA . '/admin/products-list.php');
}

//SELECT OPTIONS
$sql = "SELECT * FROM categorias WHERE cate_activo = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM subcategorias WHERE subca_activo = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$subcategorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM marcas WHERE mar_activo = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM prioridades";
$stmt = $conn->prepare($sql);
$stmt->execute();
$prioridades = $stmt->fetchAll(PDO::FETCH_ASSOC);

$doc_title = "DOCUMENTO-TITLE";
$css1 = 'css/admin.css';
require 'views/products-new.view.php';