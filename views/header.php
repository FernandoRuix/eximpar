<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo RUTA; ?>/media/logoIcono.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXIMPAR SRL</title>
    <meta charset="UTF-8">
    <meta name="reply-to" content="info@eximpar.com.py">
    <meta name="language" content="ES">
    <meta name="keywords" content="laboratorio, paraguay, equipos, microscopio, reactivos, controles, eximpar, equipamiento">
    <meta name="subject" content="Venta de reactivos, equipos y materiales para laboratorio">
    <meta name="description" content="Empresa Paraguaya dedicada a la venta de reactivos, equipos y materiales">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">

    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/carousel.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/logoCarousel.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/<?php echo $css ?>" type='text/css'>
    <!--EXTERNAL-LINKS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo RUTA;?>/js/image_zoom.js"></script>
    

</head>
<body>
    <div class="datostopBG">
        <div class="datostop">
            <div class="datostop--cont">
                <div class="datostop--cont__direccion">
                    <div class="datostop--cont__direccion__cont">
                        <a href="https://goo.gl/maps/Vvhefq1UcEMd93zz9" target="_BLANK" class="datostop--cont__info__item datostop--cont__direccion__cont--text" id="text1">
                            <i class="fa-solid fa-location-dot" style="padding-right:5px;"></i>Paraguari, 942 casi Teniente Fariña, Asunción.</a>
                    </div>
                </div>
                <div class="datostop--cont__info">
                        <a href="mailto: info@eximpar.com" class="datostop--cont__info__item datostop--cont__direccion__cont--text" id="text2">
                            <i class="fa-solid fa-envelope" style="padding-right: 5px"></i>info@eximpar.com</a>
                        <a href="tel:021494022" class="datostop--cont__info__item datostop--cont__direccion__cont--text" id="text3">
                            <i class="fa-solid fa-phone" style="padding-right: 5px"></i>(021) 494 022</a>
                </div>
            </div>
        </div> <!-- INFOTOP -->
    </div>


    <header class="barra" id="barra">
        <div class="barra__cont">
                
            <nav class="navbar" id="primary_nav_wrap"> 
                <div class="barra__cont--center">
                    <a href="<?php echo RUTA; ?>"><img class="barra__logo" src="media/logo.png" alt=""></a>
                    <a href="<?php echo RUTA; ?>"><span class="barra__title">EXIMPAR S.R.L.</span></a>
                </div>
                <button type="button" class="mobile_Button" id="mobile_Button">
                    <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                </button>
                <span class="overlay" id="overlay"></span>
                <div class="menu" id="menu">

                    <!--INICIO NAV-->
                    <ul class="navList menu-block">
                        <li class="navList__item menu-item" id="index">
                            <a class="menu-link" href="<?php echo RUTA; ?>/index.php">INICIO
                            </a>
                        </li>
                        <li class="navList__item menu-item" id="about">
                            <a class="menu-link" href="<?php echo RUTA; ?>/about.php">ACERCA DE</a>
                        </li>
                        <li class="navList__item menu-item" id="productos">
                            <a class="menu-link" href="<?php echo RUTA; ?>/productos.php">PRODUCTOS</a>
                        </li>

                        <li class="navList__item menu-item" id="contacto">
                            <a class="menu-link" href="<?php echo RUTA; ?>/contacto.php">CONTACTANOS</a>
                        </li>

                        <?php if(isset($_SESSION['admin'])){ ?>
                        <li class="navList__item menu-item" id="panel">
                            <a class="menu-link" href="<?php echo RUTA; ?>/admin/">PANEL</a>
                        </li>
                        <?php } ?>


                        <li class="navList__item menu-item" id="list_link">
                            <a class="menu-link" href="https://wa.me/595981402523?text=Buenas,%20quisiera%20solicitar%20un%20presupuesto" target="_BLANK">ESCRIBENOS AL WHATSAPP</a>
                        </li>
                    </ul>
                    <!--FIN NAV-->

                </div>
            </nav>

        </div>  

        
    </header> <!-- BARRA -->