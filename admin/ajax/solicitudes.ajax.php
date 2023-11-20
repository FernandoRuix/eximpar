<?php
include "../../admin/config.php";
include "../../admin/functions.php";

$db = conexion($db_config);
$consultas = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listConsultas') {
	$consultas->list_consultas();
}
if(!empty($_POST['action']) && $_POST['action'] == 'status_change') {
	$consultas->status_change();
}

class Records{
    private $conn;
	public function __construct($db){
        $this->conn = $db;
    }	

    public function list_consultas(){

        if ($_POST['orderby'] == "default") {
            $sort = "soli_date DESC";
        } elseif ($_POST['orderby'] == "name_asc") {
            $sort = "soli_nombre ASC";
        } elseif ($_POST['orderby'] == "name_desc") {
            $sort = "soli_nombre DESC";
        }

        $sql = "SELECT * FROM solicitudes ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $allRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //CANIDAD TOTAL
        $sql = "SELECT * FROM solicitudes ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuantity = count($consultas);

        $data = [$allRecords, $totalQuantity];
        echo json_encode($data);
    }

    public function status_change(){
        $sql = "SELECT * FROM solicitudes WHERE consultas_id = :consultas_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["consultas_id" => $_POST['consultas_id']]);
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt[0]['soli_estado'] === 'Pendiente') {
            $soli_stts = 'Concluido';
        } else {
            $soli_stts = 'Pendiente';
        }

        $sql = "UPDATE consultas SET soli_estado = :estado WHERE consultas_id = :consultas_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":consultas_id" => $_POST['consultas_id'],
            ":estado" => $soli_stts
        ]);
        echo true;
    }

}