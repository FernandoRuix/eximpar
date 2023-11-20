<?php

include "../admin/config.php";
include "../admin/functions.php";

$db = conexion($db_config);

$record = new Records($db);

class Records{
    private $conn;

	public function __construct($db){
        $this->conn = $db;
    }	

    public function enviar_formulario(){

        $form = json_decode($_POST['form'], true);
        $nombre = $form[0];
        $apellido = $form[1];
        $mail = $form[2];
        $tel = $form[3];
        $detalles = $form[4];
        $type = $_POST['type'];
        $empresa = $form[5];

        $sql = 'INSERT INTO consultas(con_nombre, con_apellido, con_mail, con_telefono, con_empresa, con_detalles, con_type) values(?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute([$nombre, $apellido, $mail, $tel, $empresa, $detalles, $type])){
            echo true;
        } else {
            echo false;
        }
    }
}


if(!empty($_POST['action']) && $_POST['action'] == 'send') {
	$record->enviar_formulario();
}













?>