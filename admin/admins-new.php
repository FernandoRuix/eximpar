<?php session_start();

require 'config.php';
require 'functions.php';
$conn = conexion($db_config);
comprobarSession();
if (!$conn) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario 		= $_POST['nombre'];
	$pass  = $_POST['pass'];
	$pass_confirm  = $_POST['pass_confirm'];
	$prioridad = $_POST['prioridad'];

	if ($_POST['pass'] === $_POST['pass_confirm']) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$statement = $conn->prepare(
			'INSERT INTO administradores (
				adm_user,
				adm_pass,
				id_prioridades
			) 
			VALUES(
				:user,
				:pass,
				:prioridad
			)'
		);
		$statement->execute([
			':user' => $usuario,
			':pass' => $pass,
			':prioridad' => $prioridad
		]);

		$_SESSION["ALERT"] = ["MSG" => "Creado correctamente!", "BOOL" => true];
	} else{
		$_SESSION["ALERT"] = ["MSG" => "Error al crear: Las contraseñas no coinciden", "BOOL" => false];
	}

	header('Location: ' . RUTA . '/admin/admins-list.php');
}

$sql = "SELECT * FROM prioridades";
$stmt = $conn->prepare($sql);
$stmt->execute();
$prioridades = $stmt->fetchAll(PDO::FETCH_ASSOC);

$css = 'main.css';
require 'views/admins-new.view.php';