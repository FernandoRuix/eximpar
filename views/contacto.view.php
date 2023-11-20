<?php include 'views/header.php'; ?>

<div class="header">
    <div class="header_title">
        <h4>Contacto</h4>
    </div>
    <div class="header-bottom">
        <span><a href="<?php echo RUTA?>">Inicio</a></span>
        <span><i class="fa-solid fa-arrow-right"></i></span>
        <span style="border-bottom: 3px solid #fff;">Contacto</span>
    </div>
</div>
<div class="square_container">
    <div class="square_margin">
        <div class="square">
            <div class="square_icon">
                <i class="fa-solid fa-phone"></i>
                <span>LLÁMANOS</span>
            </div>
            <div class="square_info">
                <div class="square_info__contact">
                    <span><strong>Asunción</strong></span><br>
                    <span>0981 402 523</span>
                </div>
                <div class="square_info__contact">
                    <span><strong>Encarnación</strong></span><br>
                    <span>0981 520 049</span>
                </div>
                <div class="square_info__contact">
                    <span><strong>Ciudad del Este</strong></span><br>
                    <span>0974 708 571</span>
                </div>
            </div>
        </div>
        <div class="square">
            <div class="square_icon">
                <i class="fa-brands fa-whatsapp"></i>
                <span>WHATSAPP</span>
            </div>
            <div class="square_info">
                <div class="square_info__contact">
                    <span><strong>¡Ahora más cerca de ti!</strong></span><br>
                    <span>0985 468 855</span>
                </div>
                <div class="square_info__link">
                    <a href="https://wa.me/595981402523" target="_BLANK"><i class="fa-brands fa-whatsapp"></i>Enviar Mensaje</a>
                </div>
            </div>
        </div>
        <div class="square">
            <div class="square_icon">
                <i class="fa-regular fa-envelope"></i>
                <span>ESCRIBENOS</span>
            </div>
            <div class="square_info">
                <div class="square_info__contact">
                    <span>info@eximpar.com.py</span>
                </div>
            </div>
        </div>
    </div>
    <div class="square_text">
        <span><i class="fa-solid fa-clock"></i>Lunes a Viernes de 08:00 AM a 06:00 PM<i class="fa-solid fa-clock"></i></span>
    </div>
</div>
<div class="contact_container">
    <div class="contact_title">
        <h4>QUEREMOS SABER DE TI</h4>
    </div>
    <div class="contact_subtitle">
        <span>Para cualquier comentario, sugerencia, duda o información ponemos a tu disposición el siguiente formulario de contacto. Nos pondremos en contacto contigo lo antes posible.</span>
    </div>
    <div class="contact_body">
        <div class="contact_form" id="contact_form">
            <div class="contact_form--item">
                <div class="contact_form-input">
                    <input type="text" placeholder="Nombre y Apellido*" id="input_name">
                </div>
                <span class="contact_form--alert">Este campo es requerido</span>
            </div>
            <div class="contact_form--item">
                <div class="contact_form-input">
                    <input type="text" placeholder="Localidad*" id="input_loca">
                </div>
                <span class="contact_form--alert">Este campo es requerido</span>
            </div>
            <div class="contact_form--item">
                <div class="contact_form-input">
                    <input type="text" placeholder="Correo Electrónico*" id="input_mail">
                </div>
                <span class="contact_form--alert">Este campo es requerido</span>
            </div>
            <div class="contact_form--item">
                <div class="contact_form-input">
                    <input type="text" placeholder="Teléfono*" id="input_tel">
                </div>
                <span class="contact_form--alert">Este campo es requerido</span>
            </div>
            <div class="contact_form--item">
                <div class="contact_form-input">
                    <input type="text" placeholder="Compañía (Empresa,Institución, etc.)" id="input_emp">
                </div>
                <span class="contact_form--alert">Este campo es requerido</span>
            </div>
            <div class="contact_form--item">
                <div class="contact_form-input">
                    <textarea name="" rows="10" placeholder="Dinos cómo podemos ayudarte..." id="input_details"></textarea>
                </div>
                <span class="contact_form--alert">Este campo es requerido</span>
            </div>
            <div class="contact_form--submit">
                <span id="send_button">Enviar</span>
            </div>
        </div>
        <div class="contact_map">
            <div class="map_triggers">
                <div data-frame-trigger="1" class="map_trigger map_trigger--active">
                    <span><i class="fa-solid fa-location-dot"></i>ASUNCIÓN</span>    
                </div>
                <div data-frame-trigger="2" class="map_trigger">
                    <span><i class="fa-solid fa-location-dot"></i>ENCARNACIÓN</span>    
                </div>
                <div data-frame-trigger="3" class="map_trigger">
                    <span><i class="fa-solid fa-location-dot"></i>CIUDAD DEL ESTE</span>    
                </div>
            </div>
            <div class="map_body">
                <div class="map_item">
                    <div data-frame-trigger="1" class="map_item--title">
                        <span>ASUNCIÓN</span>
                    </div>
                    <div data-frame-id="1" class="map_item--body map_item--active">
                        <iframe frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.4222399640335!2d-57.635834085495745!3d-25.290014033570333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945da71a1c50588d%3A0x734c72c007715f6d!2sEximpar%20S.R.L!5e0!3m2!1ses-419!2spy!4v1635182688103!5m2!1ses-419!2spy"><a href="http://www.gps.ie/">truck gps</a></iframe>
                    </div>
                </div>
                <div class="map_item">
                    <div data-frame-trigger="2" class="map_item--title">
                        <span>ENCARNACIÓN</span>
                    </div>
                    <div data-frame-id="2" class="map_item--body">
                        <iframe frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3544.4768374497507!2d-55.872898584946135!3d-27.329557182949824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x930abc7463ef7a19!2zMjfCsDE5JzQ2LjQiUyA1NcKwNTInMTQuNiJX!5e0!3m2!1ses!2spy!4v1642159915457!5m2!1ses!2spy"><a href="http://www.gps.ie/">truck gps</a></iframe>
                    </div>
                </div>
                <div class="map_item">
                    <div data-frame-trigger="3" class="map_item--title">
                        <span>CIUDAD DEL ESTE</span>
                    </div>
                    <div data-frame-id="3" class="map_item--body">
                        <iframe frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3601.0158330672552!2d-54.6614615849842!3d-25.504518483754175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2bc536898b5014ca!2zMjXCsDMwJzE2LjMiUyA1NMKwMzknMzMuNCJX!5e0!3m2!1ses!2spy!4v1642160019995!5m2!1ses!2spy"><a href="http://www.gps.ie/">truck gps</a></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo RUTA; ?>/js/contacto.ajax.js"></script>
<script src="<?php echo RUTA; ?>/js/functions.js"></script>

<?php include 'views/footer.php'; ?>
