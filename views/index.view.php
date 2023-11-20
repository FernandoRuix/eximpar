<?php include 'views/header.php'; ?>

    <div class="main_home">
        <img src="<?php echo RUTA; ?>/media/main_bg.png" class="main_home--max">
        <img src="<?php echo RUTA; ?>/media/mainbg_mob.png" class="main_home--min">
    </div>
    

    <div class="marcasSlide">
        <div class="marcas__title">
            <h3 class="marcas__title__title">PRINCIPALES MARCAS</h3>
        </div>
        <div id="listaMarcas">
            <div class="listaMarcas--container">
            <ul id="animation_marcas" class="">
                <li><img src="<?php echo RUTA; ?>/media/LogosBrands/HERMLE.png" alt="Logo Hermle"></li>
                <li><img src="<?php echo RUTA; ?>/media/LogosBrands/KACIL.png" alt="Logo Kacil"></li>
                <li><img src="<?php echo RUTA; ?>/media/LogosBrands/ZEISS.png" alt="Logo Zeiss"></li>
                <li><img src="<?php echo RUTA; ?>/media/LogosBrands/JULABO.png" alt="Logo Julabo"></li>
                <li><img src="<?php echo RUTA; ?>/media/LogosBrands/BEILI.png" alt="Logo Beili"></li>
                <li><img src="<?php echo RUTA; ?>/media/LogosBrands/ESCHWEILER.png" alt="Logo Eschweiler"></li>
                <li><img src="<?php echo RUTA; ?>/media/LogosBrands/HUMAN.png" alt="Logo Human"></li>
                <li><img src="<?php echo RUTA; ?>/media/LogosBrands/MYR.png" alt="Logo Myr"></li>
            </ul>
            </div>
        </div>
    </div>

    <div class="textSection">
        <div class="textSection--padd">
            <div class="textSection--cont">
                <div class="textSection--margin">

                    <div class="textSection__left animate_right" id="uno">
                        <div class="textSection__left--margin">
                            <h3 class="textSection__left__title">Una Amplia Gama de Equipos y Productos de Alta Calidad</h3>
                            <div class="textSection__left__parragr">
                                <p class="textSection__left__parragr__text">
                                    Nuestra empresa posee un enfoque de abastecimiento y suministro de productos de marcas de la más alta calidad y el mejor valor, brindando precisamente lo que necesita, exactamente cuando lo necesita.
                                </p>
                            </div>
                            <a class="textSection__left__button" href="<?php echo RUTA; ?>/productos.php">
                                <span>VER MAS</span>
                            </a>
                        </div>
                    </div>

                    <div class="textSection_right animate_left" id="uno">
                        <img class="imgSlider" src="<?php echo RUTA; ?>/media/hexaDos.png" alt="">
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="textSection">
        <div class="textSection--padd" id="bd1">
            <div class="textSection--cont">
                <div class="textSection--margin" id="bd1">

                    <div class="textSection__left animate_right" id="dos">
                        <div class="textSection__left--margin">
                                <img class="imgSlider" src="<?php echo RUTA; ?>/media/hexaUno.PNG" alt="">
                        </div>
                    </div>

                    <div class="textSection_right animate_left" id="dos">
                        <h3 class="textSection__left__title">Un Equipo de Profesionales del Sector Laboratorial Altamente Capacitados Para su Mejor Atención</h3>
                        <div class="textSection__left__parragr">
                            <p class="textSection__left__parragr__text">
                                Ellos lo ayudarán a seleccionar los equipos y productos adecuados para optimizar su flujo de trabajo y simplificar la vida cotidiana en diversas disciplinas cientificas.
                            </p>
                        </div>
                        <a class="textSection__left__button" href="<?php echo RUTA; ?>/about.php">
                            <span>VER MAS</span>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="bgColor2">
        <div class="dataSection">
            <div class="dataSection--display">     
                <div class="dataSection--container">

                    <!-- #BeginEditable "contenido" -->  
                    <div class="dataSection--container--bg">
                        <div class="dataSection__box">
                            <i class="dataSection__box__productos"></i><br>
                            <b>PRODUCTOS</b>
                            <p>
                                Ofrecemos productos que sean fáciles de utilizar, de alta calidad y precisión.<br>
                                Nuestros instrumentos y reactivos analíticos son utilizados en laboratorios clínicos a lo largo de todo el país.<br>
                                Estos son de última generación facilitando al usuario el manejo y calidad de pruebas.
                            </p>
                        </div>
                        <div class="dataSection__box">
                            <i class="dataSection__box__servicios"></i><br>
                            <b>SERVICIOS</b>
                            <p>
                                Brindamos servicio técnico oficial especializado con asesoramiento a todo el país.<br>
                                Contamos con un servicio de atención al cliente que facilita el éxito en el proceso de compra de principio a fin. 
                            </p>
                        </div>
                        <div class="dataSection__box">
                            <i class="dataSection__box__proveedores"></i><br>
                            <b>PROVEEDORES</b>
                            <p>
                                Trabajamos en conjunto con proveedores nacionales e internacionales que nos permiten brindar una solución integral acorde a la necesidad del cliente.<br>
                                
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php include'footer.php'?>

<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
<script src="<?php echo RUTA; ?>/js/stickyNav.js"></script>
<script src="<?php echo RUTA; ?>/js/animations.js"></script>
<script src="<?php echo RUTA; ?>/js/animationsLeft.js"></script>
<script src="<?php echo RUTA; ?>/js/animationsRight.js"></script>
<script  src="<?php echo RUTA; ?>/js/logoCarousel.js"></script>
</body>
</html>