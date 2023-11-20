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
	$descripcion 	= $_POST['descripcion'];
	$presentacion	= $_POST['presentacion'];
	$categoria 		= $_POST['categoria'];
	$subcategoria 	= $_POST['subcategoria'];
	$marca 			= $_POST['marca'];
	$prioridad 		= $_POST['prioridad'];
	$dbtitulo 		= tituloToUrl($titulo);
	$codigo 		= $_POST['codigo'];

	$thumb 			= $_FILES['thumb'];
	$pdf 			= $_FILES['pdf'];
	$saved_thumb 	= $_POST['saved_thumb'];
	$saved_pdf  	= $_POST['saved_pdf'];

	if (empty($thumb['name'])) {
		$thumb	= $saved_thumb;
	} else {
		$archivo_subido_img = '../' . $blog_config['carpeta_imagenes'] . $thumb['name'];
		move_uploaded_file($thumb['tmp_name'], $archivo_subido_img);
		$thumb = $thumb['name'];
	}
	if (empty($pdf['name'])){
		$pdf	= $saved_pdf;
	} else {
		$archivo_subido_pdf = '../' . $blog_config['carpeta_pdfs'] . $pdf['name'];
		move_uploaded_file($pdf['tmp_name'], $archivo_subido_pdf);
		$pdf = $pdf['name'];
	}


	$statement = $conn->prepare(
		'UPDATE productos SET
			prd_titulo 			= :titulo,
			prd_descripcion 	= :descripcion,
			prd_thumb 			= :thumb,
			prd_pdf 			= :pdf,
			prd_presentacion 	= :presentacion,
			id_categorias 		= :categoria,
			id_subcategorias 	= :subcategoria,
			id_marcas 			= :marca,
			id_prioridades 		= :prioridad,
			prd_dbtitulo 		= :dbtitulo,
			prd_codigo 			= :codigo
		WHERE
			productos_id = :dbquest
		'
	);

	$statement->execute([
		':titulo' => $titulo,
		':descripcion' => $descripcion,
		':thumb' => $thumb,
		':pdf' => $pdf,
		':presentacion' => $presentacion,
		':categoria' => $categoria,
		':subcategoria' => $subcategoria,
		':marca' => $marca,
		':prioridad' => $prioridad,
		':dbtitulo' => $dbtitulo,
		':codigo' => $codigo,
		':dbquest' => $_POST['hidden_id']
	]);
	
	$_SESSION["ALERT"] = ["MSG" => "Actualizado correctamente!", "BOOL" => true];
	
	header('Location: ' . RUTA . '/admin/products-list.php');
	
} elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
	$sql = "SELECT * FROM
		productos A 
	LEFT JOIN
		categorias B
	ON
		A.id_categorias = B.categorias_id
	LEFT JOIN
		subcategorias C
	ON
		A.id_subcategorias = C.subcategorias_id
	LEFT JOIN
		marcas D
	ON
		A.id_marcas = D.marcas_id
	LEFT JOIN
		prioridades E
	ON
		A.id_prioridades = E.prioridades_id
	WHERE 
		A.prd_dbtitulo = :request
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

$css = 'main.css';
require 'views/products-edit.view.php';