<?php
include "../../admin/config.php";
include "../../admin/functions.php";

$db = conexion($db_config);
$marcas = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listMarcas') {
	$marcas->list_marcas();
}
if(!empty($_POST['action']) && $_POST['action'] == 'status_change') {
	$marcas->status_change();
}

class Records{
    private $conn;
	public function __construct($db){
        $this->conn = $db;
    }	

    public function list_marcas(){

        if ($_POST['orderby'] == "default") {
            $sort = "id_prioridades DESC";
        } elseif ($_POST['orderby'] == "name_asc") {
            $sort = "mar_titulo ASC";
        } elseif ($_POST['orderby'] == "name_desc") {
            $sort = "mar_titulo DESC";
        }

        $sql = "SELECT * FROM marcas ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $allRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //CANIDAD TOTAL
        $sql = "SELECT * FROM marcas ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuantity = count($marcas);

        $data = [$allRecords, $totalQuantity];
        echo json_encode($data);
    }

    public function status_change(){
        $sql = "SELECT * FROM marcas WHERE marcas_id = :mar_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["mar_id" => $_POST['mar_id']]);
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt[0]['mar_activo'] === 1) {
            $mar_stts = 0;
        } else {
            $mar_stts = 1;
        }

        $sql = "UPDATE marcas SET mar_activo = :estado WHERE marcas_id = :mar_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":mar_id" => $_POST['mar_id'],
            ":estado" => $mar_stts
        ]);
        echo true;
    }

}