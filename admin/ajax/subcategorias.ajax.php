<?php
include "../../admin/config.php";
include "../../admin/functions.php";

$db = conexion($db_config);
$subcategorias = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listSubCategories') {
	$subcategorias->list_subcategorias();
}
if(!empty($_POST['action']) && $_POST['action'] == 'status_change') {
	$subcategorias->status_change();
}

class Records{
    private $conn;
	public function __construct($db){
        $this->conn = $db;
    }	

    public function list_subcategorias(){

        if ($_POST['orderby'] == "default") {
            $sort = "id_prioridades DESC";
        } elseif ($_POST['orderby'] == "name_asc") {
            $sort = "subca_titulo ASC";
        } elseif ($_POST['orderby'] == "name_desc") {
            $sort = "subca_titulo DESC";
        }

        $sql = "SELECT * FROM subcategorias ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $allRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //CANIDAD TOTAL
        $sql = "SELECT * FROM subcategorias ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $subcategorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuantity = count($subcategorias);

        $data = [$allRecords, $totalQuantity];
        echo json_encode($data);
    }

    public function status_change(){
        $sql = "SELECT * FROM subcategorias WHERE subcategorias_id = :subca_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":subca_id" => $_POST['subca_id']]);
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt[0]['subca_activo'] === 1) {
            $subca_stts = 0;
        } else {
            $subca_stts = 1;
        }

        $sql = "UPDATE subcategorias SET subca_activo = :estado WHERE subcategorias_id = :subca_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":subca_id" => $_POST['subca_id'],
            ":estado" => $subca_stts
        ]);
        echo true;
    }

}