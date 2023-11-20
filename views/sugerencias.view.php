<?php include 'views/header.php'; ?>
    
    <section class="formulario">
        <div class="formContenedor" style="padding-top: 2rem;">
            <div class="formIzqui">

                <h3 class="formTitu">ESCRIBENOS UNA SUGERENCIA!</h3>
                <div class="contactForm" id="ctForm">
                    
                    <div class="form-group">
                        <div class="form-group__a">
                            <label for="input_name" class="form_label">Nombre (opcional)</label>
                            <input type="text" class="form-control" id="input_name" autocomplete="off">
                        </div>
                        <div class="form-group__b">
                            <label for="input_lastname" class="form_label">Apellido (opcional)</label>
                            <input type="text" class="form-control" id="input_lastname" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group__a">
                            <label for="input_mail" class="form_label">E-mail (opcional)</label>
                            <input type="email" class="form-control" id="input_mail" autocomplete="off">
                        </div>
                        <div class="form-group__b">
                            <label for="input_tel" class="form_label">telefono (opcional)</label>
                            <input type="text" class="form-control" id="input_tel" autocomplete="off">
                        </div>
                    </div>

                    
                    <div class="midForm">
                        <div class="midMargen">
                            <label for="input_details" class="form_label">detalles / comentarios *</label>
                            <textarea id="input_details" class="form-control" autocomplete="off"></textarea>
                        </div>
                    </div>


                    <div class="bottomForm">
                        <div class="bottomMargen">
                            <button id="send_button">ENVIAR</button>
                        </div>
                    </div>
                </div>

            </div>


            <div class="formDere">
                <h3 class="tituUno">SUCURSALES</h3>
                <div class="datosMargen nonePointer">


                    <div class="datosDireccion" id="datos1">
                        <div id="imgHolder">
                            <img src="media/ubiIcon1.png" alt="">
                        </div>
                        <div id="datosTxt">
                            <b>Asunción</b></br>
                            Paraguari Nº 942, c/Teniente Fariña.                            
                        </div>
                    </div>

                    <div class="datosMail" id="datos1">
                        <div id="imgHolder">
                            <img src="media/mailIcon1.png" alt="">
                        </div>
                        <div id="datosTxt">
                            <b>Ciudad del Este</b></br>
                            Blas Garay, c/Pampa Grande 
                        </div>
                    </div>

                    <div class="datosNumero" id="datos1">
                        <div id="imgHolder">
                            <img src="media/telIcon1.png" alt="">
                        </div>
                        <div id="datosTxt">
                            <b>Encarnación</b></br>
                            25 de mayo Nº 158 c/Antequera
                        </div>
                    </div>
                </div>
                <!--REDES SOCIALES-->
                <h3 class="tituUno">REDES SOCIALES</h3>
                <div class="datosMargen">


                    <div class="datosDireccion" id="datos1">
                        <div id="imgHolder">
                            <img src="media/ubiIcon1.png" alt="">
                        </div>
                        <div id="datosTxt">
                            <a href="https://www.facebook.com/eximpar/" target="_BLANK">
                                <b>FACEBOOK</b></br>
                                www.facebook.com/eximpar/
                            </a>
                        </div>
                    </div>

                    <div class="datosMail" id="datos1">
                        <div id="imgHolder">
                            <img src="media/mailIcon1.png" alt="">
                        </div>
                        <div id="datosTxt">
                            <a href="https://www.instagram.com/eximparpy/" target="_BLANK">
                                <b>INSTAGRAM</b></br>
                                www.instagram.com/eximparpy/ 
                            </a>
                        </div>
                    </div>

                    <div class="datosNumero" id="datos1">
                        <div id="imgHolder">
                            <img src="media/telIcon1.png" alt="">
                        </div>
                        <div id="datosTxt">
                            <a href="https://www.linkedin.com/company/eximpar-py/" target="_BLANK">
                                <b>LINKEDIN</b></br>
                                www.linkedin.com/company/eximpar-py/
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

<?php include'footer.php'?>
    
<script src="<?php echo RUTA; ?>/ajax/sugerencias.ajax.js"></script>
<script src="<?php echo RUTA; ?>/js/stickyNav.js"></script>
<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
</body>
</html>