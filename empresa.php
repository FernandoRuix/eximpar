<?php
session_start();
include 'admin/config.php';
include 'admin/functions.php'; 

$css1 = 'css/empresa.css';


$doc_title = "Eximpar";
include 'views/empresa.view.php';
?>