
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo RUTA; ?>/media/icon.ico" />
    <title><?php echo $doc_title; ?></title>

    <!--CSS-->
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/header.css">
    <?php if (isset($css1)) : ?>
    <link rel="stylesheet" href="<?php echo RUTA; ?>/<?php echo $css1; ?>">
    <?php endif; ?>
    <?php if (isset($css1)) : ?>
    <link rel="stylesheet" href="<?php echo RUTA; ?>/<?php echo $css2; ?>">
    <?php endif; ?>

    <!--EXTERNAL-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!--
        font-family: 'Raleway', sans-serif;
        font-family: 'Roboto', sans-serif;
        font-family: 'Source Sans Pro', sans-serif;
    -->
</head>
<body style="overflow:hidden;">
    <div class="overnav">
        <div class="overnav-body">
            <div class="overnav-item">
                <span><a href="https://wa.me/595981402523" target="_BLANK">+595 981 402523</a></span>
            </div>
            <div class="overnav-item">
                <span><a href="Tel: 022-297-501">021 297 501</a></span>
            </div>
            <div class="overnav-item">
                <span>Lunes a Viernes de 08:00 a 18:00 hrs.</span>
            </div>
            <div class="overnav-item" style="border: none;">
                <span><a href="https://www.instagram.com/eximparpy/" target="_BLANK"><i class="fa-brands fa-instagram"></i></a></span>
                <span><a href="https://www.facebook.com/eximpar" target="_BLANK"><i class="fa-brands fa-facebook"></i></a></span>
                <span><a href="https://wa.me/595981402523"><i class="fa-brands fa-whatsapp"></i></a></span>
                <span><a href="mailto:info@eximpar.com.py"><i class="fa-regular fa-envelope"></i></a></span>
            </div>
        </div>
    </div>
    <div class="navigation">
        <nav>
            <div class="nav-logo">
                <a href="">
                    <img src="<?php echo RUTA; ?>/media/nav-logo2.png" alt="logo">
                    <span>EXIMPAR<sup>SRL</sup></span>
                </a>
            </div>
            <div class="nav-list">
                <ul>
                    <li><a href="<?php echo RUTA?>">Inicio</a></li>
                    <li><a href="<?php echo RUTA?>/empresa.php">Empresa</a></li>
                    <li><a href="<?php echo RUTA?>/productos.php">Productos</a></li>
                    <li><a href="<?php echo RUTA?>/contacto.php">Contacto</a></li>
                    <li><a href="https://wa.me/595981402523" target="_BLANK">Whatsapp</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div id="loader"></div>