<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 
$xd = '{"name":"John", "age":30, "car":null}';


comprobarSession();
$conn = conexion($db_config);
if (!$conn) {
    header('Location: error.php');
}

if(!isset($_GET['q']) || !isset($_GET['key'])){
    header('Location: index.php');
} else {
    $sql = 'SELECT * 
            FROM 
                items_solicitudes A 
            LEFT JOIN
                solicitudes B
            ON
                id_solicitudes = solicitudes_id
            WHERE 
                B.soli_url_key = :single_key 
            AND 
                A.id_solicitudes = :single_id
            ';
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ":single_key" => $_GET['key'],
        ":single_id" => $_GET['q']
    ]);
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($user_data)){
        
    } else {
        header('Location: index.php');
    }
}


$css = 'order-received.css';
include 'views/order-received.view.php';