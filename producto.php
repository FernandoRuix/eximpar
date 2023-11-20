<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 

comprobarSession();

$conn = conexion($db_config);
if (!$conn) {
    header('Location: error.php');
}
if (!isset($_GET['p'])) {
    header('Location: tienda.php');
}

//TMP$cart_items = json_decode(stripslashes($_COOKIE['shopping_cart']), true);

$sql = "SELECT
            *
        FROM 
            productos A
        LEFT JOIN
            categorias B
        ON
            id_categorias = categorias_id
        LEFT JOIN
            subcategorias C
        ON
            id_subcategorias = subcategorias_id
        LEFT JOIN
            marcas D
        ON
            id_marcas = marcas_id
        WHERE
            prd_dbtitulo = :request
        ";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':request'=>$_GET['p']
]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($data)){
    header('Location: error.php');
}

$css = 'producto.css';
$filename = 'tienda.php';

include 'views/producto.view.php';