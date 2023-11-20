<?php
include "../../admin/config.php";
include "../../admin/functions.php";

$db = conexion($db_config);
$administradores = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listAdministrators') {
	$administradores->list_administradores();
}
if(!empty($_POST['action']) && $_POST['action'] == 'status_change') {
	$administradores->status_change();
}

class Records{
    private $conn;
	public function __construct($db){
        $this->conn = $db;
    }	

    public function list_administradores(){

        if ($_POST['orderby'] == "default") {
            $sort = "id_prioridades DESC";
        } elseif ($_POST['orderby'] == "name_asc") {
            $sort = "adm_user ASC";
        } elseif ($_POST['orderby'] == "name_desc") {
            $sort = "adm_user DESC";
        }

        $sql = "SELECT * FROM administradores ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $allRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //CANIDAD TOTAL
        $sql = "SELECT * FROM administradores ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $administradores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuantity = count($administradores);

        $data = [$allRecords, $totalQuantity];
        echo json_encode($data);
    }

    public function status_change(){
        $sql = "SELECT * FROM administradores WHERE administradores_id = :adm_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["adm_id" => $_POST['adm_id']]);
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt[0]['adm_activo'] === 1) {
            $adm_stts = 0;
        } else {
            $adm_stts = 1;
        }

        $sql = "UPDATE administradores SET adm_activo = :estado WHERE administradores_id = :adm_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":adm_id" => $_POST['adm_id'],
            ":estado" => $adm_stts
        ]);
        echo true;
    }

}