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
		'UPDATE administradores SET
			adm_user	= :titulo,
			id_prioridades 		= :prioridad
		WHERE
			administradores_id = :dbquest
		'
	);
	$statement->execute([
		':titulo' => $titulo,
		':prioridad' => $prioridad,
		':dbquest' => $_POST['hidden_id']
	]);
	$_SESSION["ALERT"] = ["MSG" => "Actualizado correctamente!", "BOOL" => true];
	
	if(!empty($_POST['newpass']) && !empty($_POST['newpass_confirm'])){
		if ($_POST['newpass'] === $_POST['newpass_confirm']) {
			$param_password = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
			$statement = $conn->prepare(
				'UPDATE administradores SET
					adm_pass    = :pass
				WHERE
					administradores_id = :dbquest
				'
			);
			$statement->execute([
				':pass' => $param_password,
				':dbquest' => $_POST['hidden_id']
			]);
			$_SESSION["ALERT"] = ["MSG" => "Actualizado correctamente!", "BOOL" => true];
		} else {
			$_SESSION["ALERT"] = ["MSG" => "No se ha podido actualizar la contraseña: Las contraseñas no coinciden", "BOOL" => false];
		}
	}
	
	header('Location: ' . RUTA . '/admin/admins-list.php');
} elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
	$sql = "SELECT * FROM
		administradores A 
	LEFT JOIN
		prioridades B
	ON
		A.id_prioridades = B.prioridades_id
	WHERE 
		A.adm_user = :request
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

$css = 'main.css';
require 'views/admins-edit.view.php';