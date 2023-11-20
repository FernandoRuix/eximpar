<?php
include "../../admin/config.php";
include "../../admin/functions.php";

$db = conexion($db_config);
$categorias = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listCategories') {
	$categorias->list_categorias();
}
if(!empty($_POST['action']) && $_POST['action'] == 'status_change') {
	$categorias->status_change();
}

class Records{
    private $conn;
	public function __construct($db){
        $this->conn = $db;
    }	

    public function list_categorias(){

        if ($_POST['orderby'] == "default") {
            $sort = "id_prioridades DESC";
        } elseif ($_POST['orderby'] == "name_asc") {
            $sort = "cate_titulo ASC";
        } elseif ($_POST['orderby'] == "name_desc") {
            $sort = "cate_titulo DESC";
        }

        $sql = "SELECT * FROM categorias ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $allRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //CANIDAD TOTAL
        $sql = "SELECT * FROM categorias ORDER BY ".$sort." LIMIT ".$_POST['length'];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuantity = count($categorias);

        $data = [$allRecords, $totalQuantity];
        echo json_encode($data);
    }

    public function status_change(){
        $sql = "SELECT * FROM categorias WHERE categorias_id = :cate_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":cate_id" => $_POST['cate_id']]);
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt[0]['cate_activo'] === 1) {
            $cate_stts = 0;
        } else {
            $cate_stts = 1;
        }

        $sql = "UPDATE categorias SET cate_activo = :estado WHERE categorias_id = :cate_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":cate_id" => $_POST['cate_id'],
            ":estado" => $cate_stts
        ]);
        echo true;
    }

}