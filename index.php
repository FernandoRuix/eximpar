<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 

$css1 = 'css/index.css';
$css2 = '/js/splide-4.1.3/dist/css/splide.min.css';

$doc_title = "Eximpar";
include 'views/index.view.php';
?>