<?php

function conexion($db_config){
    try {
        $dsn = "mysql:host=" . $db_config['host'] . ";dbname=" . $db_config['basedatos'];
        $pdo = new PDO($dsn, $db_config['usuario'], $db_config['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($pdo) {
            return $pdo;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    } finally {
        if ($pdo) {
            $pdo = null;
        }
    }
}

function tituloToUrl($text, string $divider = '-'){
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, $divider);
    $text = preg_replace('~-+~', $divider, $text);
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

function obtener_admins($conexion){
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM administradores");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

#PARA PAGINACION
function comprobarSession(){
    if(!isset($_SESSION['admin'])){
    //    header('Location: ' . RUTA."/under-construction.php");
    //    die();
    }
}

function sortcode_to_txt($code){
    if ($code === 'nD') {
        $txt[0] = 'titulo';
        $txt[1] = 'ASC';
    } elseif ($code === 'nU') {
        $txt[0] = 'titulo';
        $txt[1] = 'DESC';
    } elseif ($code === 'tD') {
        $txt[0] = 'subcategoria';
        $txt[1] = 'ASC';
    } elseif ($code === 'tU') {
        $txt[0] = 'subcategoria';
        $txt[1] = 'DESC';
    } elseif ($code === 'mD') {
        $txt[0] = 'marca';
        $txt[1] = 'ASC';
    } elseif ($code === 'mU') {
        $txt[0] = 'marca';
        $txt[1] = 'DESC';
    } 
    return $txt;
}

function status_four(){
    if($_SESSION['status'] < 4){
        header('Location: index.php');
    }
}
function status_three(){
    if($_SESSION['status'] < 3){
        header('Location: index.php');
    }
}
function status_two(){
    if($_SESSION['status'] < 2){
        header('Location: index.php');
    }
}




