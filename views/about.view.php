<?php include 'views/header.php'; ?>

    <section class="pageTitle">
        <div class="pageTitle--bg">
            <div class="pageTitle--container">
                <h5 class="pageTitle__one">CONOCE MAS</h5>
                <h2 class="pageTitle__two">ACERCA DE NOSOTROS</h2>                
            </div>
        </div>
        <div class="gotita"></div>
    </section>


    <section class="bloqueTexto">
        <div class="margenTexto">

            <div class="bloqueUno">
                <div class="WhoWeAre"> <!--PARTE IZQUIERDA-->
                    
                    <div class="whoTitulo">
                        <h5 class="whoTituloOne">QUIENES SOMOS</h5>
                        <h2 class="whoTituloTwo">
                            EXIMPAR<sup class="whoTituloSup">SRL</sup>
                        </h2>
                        <div class="whoTituloLine"></div>
                    </div>
                    <div class="whoParrafo">
                        <div class="whoParrafoImg" >
                            <a class="parrafoImgA" href="">
                                <img class="whoParrafoIm" src="<?php echo RUTA; ?>/media/logo.png" alt="">
                            </a>
                        </div>
                        <div class="whoParrafoText">
                            <p class="whoParrafoP">                                	
                                EXIMPAR S.R.L., desde 1982, somos una empresa encargada en la importación de equipos, insumos y reactivos para uso en Laboratorios. Representante exclusivo en Paraguay de HUMAN DIAGNOSTICS WORLDWIDE. Contamos con personales capacitados en aplicación, programación y reparación de nuestros productos; brindando la mejor atención y asesoría en sus consultas pre-ventas y post-ventas. Abarcamos todo el territorio nacional, con Casa Central en Asunción y sucursales en Ciudad del Este y Encarnación.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="ourProducts"> <!--PARTE DERECHA-->
                    <div class="ourTitulo">
                        <h5 class="tituloTres">ESTOS SON</h5>
                        <h2 class="tituloCuatro">NUESTROS SERVICIOS</h2>
                    </div>
                    <ul class="ourList">
                        <li>
                            <a id="prdc1" href="">
                                <i class="icon1" id="icons1"></i>
                                IMPORTACIÓN
                            </a>
                        </li>
                        <li>
                            <a id="prdc1" href="">
                                <i class="icon2" id="icons1"></i>
                                SERVICIO TÉCNICO
                            </a>
                        </li>
                        <li>
                            <a id="prdc1" href="">
                                <i class="icon2" id="icons1"></i>
                                SOFTWARE LABORATORIAL
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


 
            <div class="bloqueDos" style="display:inline-block"> <!---------------SECCION VISION MISION----------------->
                <div class="parteUno">
                    <img id="imgBloqTwo" src="<?php echo RUTA; ?>/media/misionIMG.png" alt="">
                    <p class="parrBloqTwo"><b>Nuestra Misión:</b> Ofrecer a los Laboratorios y Profesionales las mejores soluciones e innovaciones para su progreso y funcionamiento óptimo.</p>
                    <h4 class="misionV">VALORES EMPRESARIALES</h4>
                    <ul class="listIcon">
                        <div class="valoresdiv" id="id1">
                            <li>
                                <i class="flechita"></i>
                                Responsabilidad Empresarial.
                            </li>
                            <li>
                                <i class="flechita"></i>
                                Compromiso.
                            </li>
                            <li>
                                <i class="flechita"></i>
                                Rendimiento.
                            </li>
                        </div>
                        <div class="valoresdiv" id="id2">
                            <li>
                                <i class="flechita"></i>
                                Fiabilidad.
                            </li>
                            <li>
                                <i class="flechita"></i>
                                Entrega Oportuna.
                            </li>
                            <li>
                                <i class="flechita"></i>
                                Confianza.
                            </li>
                        </div>
                    </ul>
                </div>

                <div class="parteDos">
                    <img id="imgBloqTwo" src="<?php echo RUTA; ?>/media/visionIMG.png" alt="">
                    <p style="padding-top:10px;"><b>Nuestra Visión:</b> Ser el proveedor preferido de nuestros clientes por nuestra profesionalidad y calidad de nuestros productos y servicios. </p>
                </div>

                <div class="parteTres">
                    <div class="direcHolder">
                        <div class="direcImg">
                            <img id="imgBloqTwo" class="direc" src="<?php echo RUTA; ?>/media/casa_central.jpg" alt="">
                        </div>
                        <div class="direcTxt">
                            <h5 class="acheCinco">CASA CENTRAL</h5>
                            <div>
                                <p class="acheDirec">ASUNCIÓN, PARAGUAY</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
     
<?php include'footer.php'?>

<script src="<?php echo RUTA; ?>/js/stickyNav.js"></script>
<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
</body>
</html>