<?php
include "../../admin/config.php";
include "../../admin/functions.php";

$db = conexion($db_config);
$productos = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listProducts') {
	$productos->list_productos();
}
if(!empty($_POST['action']) && $_POST['action'] == 'status_change') {
	$productos->status_change();
}

class Records{
    private $conn;
	public function __construct($db){
        $this->conn = $db;
    }	

    public function list_productos(){

        if ($_POST['orderby'] == "default") {
            $sort = "productos_id DESC";
        } elseif ($_POST['orderby'] == "name_asc") {
            $sort = "prd_titulo ASC";
        } elseif ($_POST['orderby'] == "name_desc") {
            $sort = "prd_titulo DESC";
        }

        $sql = "SELECT * FROM productos ";

        if(!empty($_POST["search"])){
            $sql .= 'WHERE (prd_titulo   LIKE "%'.$_POST["search"].'%" ';
            $sql .= 'OR prd_descripcion LIKE "%'.$_POST["search"].'%" ';
            $sql .= 'OR prd_codigo     LIKE "%'.$_POST["search"].'%") ';
        }

        $sql .= " ORDER BY ".$sort." LIMIT ".$_POST['length'];

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $allRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //CANIDAD TOTAL
        $sql = "SELECT * FROM productos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuantity = count($productos);

        $data = [$allRecords, $totalQuantity];
        echo json_encode($data);
    }

    public function status_change(){
        $sql = "SELECT * FROM productos WHERE productos_id = :prd_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["prd_id" => $_POST['prd_id']]);
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt[0]['prd_activo'] === '1') {
            $prd_stts = '0';
        } else {
            $prd_stts = '1';
        }

        $sql = "UPDATE productos SET prd_activo = :estado WHERE productos_id = :prd_id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":prd_id" => $_POST['prd_id'],
            ":estado" => $prd_stts
        ]);
        echo true;
    }

}