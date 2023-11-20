<?php
session_start();

require 'admin/config.php';
require 'admin/functions.php';

//TMP
comprobarSession();


$css = 'about.css';

include 'views/about.view.php';