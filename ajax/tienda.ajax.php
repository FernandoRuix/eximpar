<?php

include "../admin/config.php";
include "../admin/functions.php";

$db = conexion($db_config);

$record = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->list_records();
}

class Records{
    private $conn;
	public function __construct($db){
        $this->conn = $db;
    }	

    public function list_records(){
        if ($_POST['orderby'] == "popular") {
            $sort = "A.id_prioridades DESC, B.id_prioridades DESC, D.id_prioridades DESC, C.id_prioridades DESC, A.prd_titulo ASC";
        } elseif ($_POST['orderby'] == "name_asc") {
            $sort = "A.prd_titulo ASC";
        } elseif ($_POST['orderby'] == "name_desc") {
            $sort = "A.prd_titulo DESC";
        }
        $mainCat = json_decode($_POST["mainfilter"], true);
        $secCat = json_decode($_POST['secondaryfilter'], true);
        $search = $_POST['search'];

        $query = "SELECT * FROM productos A ";
        $query .= "LEFT JOIN categorias     B ON A.id_categorias = B.categorias_id ";
        $query .= "LEFT JOIN subcategorias  C ON A.id_subcategorias = C.subcategorias_id ";
        $query .= "LEFT JOIN marcas         D ON A.id_marcas = D.marcas_id ";
        $query .= "LEFT JOIN prioridades    E ON A.id_prioridades = E.prioridades_id ";
        
        $query .= "WHERE A.prd_activo = 1 ";
        
        $bandera = "N";
        if ($mainCat[0] != "false") {
            $bandera = "S";
            $query .= "AND (B.cate_titulo = 'Equipos' ";
        }
        if ($mainCat[1] != "false") {
            ($bandera != "S" ? $conector = "AND (" : $conector = "OR ");
            $bandera = "S";
            $query .= $conector."B.cate_titulo = 'Reactivos' ";
        }
        if ($mainCat[2] != "false") {
            ($bandera != "S" ? $conector = "AND (" : $conector = "OR ");
            $bandera = "S";
            $query .= $conector."B.cate_titulo = 'Materiales' ";
        }
        if ($mainCat[3] != "false") {
            ($bandera != "S" ? $conector = "AND (" : $conector = "OR ");
            $bandera = "S";
            $query .= $conector."B.cate_titulo = 'Software' ";
        }
        if ($bandera != "N") {
            $query .= ")";
        }
        
        if ($secCat != false){
            $flag = false;
            foreach ($secCat as $tmp){
                ($flag != true ? $conector = "AND (" : $conector = "OR ");
                $flag = true;
                $query .= $conector."subca_titulo = '".$tmp."' ";
            }
            $query .= ') ';
        }

        if(!empty($search)){
           $query .= 'AND (prd_titulo   LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR B.cate_titulo  LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR prd_descripcion LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR D.mar_titulo   LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR prd_codigo     LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR C.subca_titulo LIKE "%'.$_POST["search"].'%") ';	
        }

        $query .= "ORDER BY ".$sort;

        if (isset($_POST['currentpage'])) {
            $page = $_POST['currentpage'];
        } else {
            $page = 1;
        }
        $inicio = ($page > 1) ? ($page * $_POST['length'] - $_POST['length']) : 0 ;
        
        $query .= " LIMIT ".$inicio.", ".$_POST['length'];

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $allRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);



        //QUANTITY
        $query = "SELECT * FROM productos A ";
        $query .= "LEFT JOIN categorias     B ON A.id_categorias = B.categorias_id ";
        $query .= "LEFT JOIN subcategorias  C ON A.id_subcategorias = C.subcategorias_id ";
        $query .= "LEFT JOIN marcas         D ON A.id_marcas = D.marcas_id ";
        $query .= "LEFT JOIN prioridades    E ON A.id_prioridades = E.prioridades_id ";
        
        $query .= "WHERE A.prd_activo = 1 ";
        
        $bandera = "N";
        if ($mainCat[0] != "false") {
            $bandera = "S";
            $query .= "AND (B.cate_titulo = 'Equipos' ";
        }
        if ($mainCat[1] != "false") {
            ($bandera != "S" ? $conector = "AND (" : $conector = "OR ");
            $bandera = "S";
            $query .= $conector."B.cate_titulo = 'Reactivos' ";
        }
        if ($mainCat[2] != "false") {
            ($bandera != "S" ? $conector = "AND (" : $conector = "OR ");
            $bandera = "S";
            $query .= $conector."B.cate_titulo = 'Materiales' ";
        }
        if ($mainCat[3] != "false") {
            ($bandera != "S" ? $conector = "AND (" : $conector = "OR ");
            $bandera = "S";
            $query .= $conector."B.cate_titulo = 'Software' ";
        }
        if ($bandera != "N") {
            $query .= ")";
        }
        
        if ($secCat != false){
            $flag = false;
            foreach ($secCat as $tmp){
                ($flag != true ? $conector = "AND (" : $conector = "OR ");
                $flag = true;
                $query .= $conector."subca_titulo = '".$tmp."' ";
            }
            $query .= ') ';
        }

        if(!empty($search)){
           $query .= 'AND (prd_titulo   LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR B.cate_titulo  LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR prd_descripcion LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR D.mar_titulo   LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR prd_codigo     LIKE "%'.$_POST["search"].'%" ';
           $query .= 'OR C.subca_titulo LIKE "%'.$_POST["search"].'%") ';	
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total = $stmt->fetchAll();
        $totalQuantity = count($total);

        $data = [$allRecords, $totalQuantity];
        echo json_encode($data);
        
    }

}