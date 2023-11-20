<?php
session_start();

require 'admin/config.php';
require 'admin/functions.php';

//TMP
comprobarSession();


$css = 'index.css';

include 'views/index.view.php';