<?php include 'views/header.php'; ?>
    <div class="product_header">
        <a href="<?php echo RUTA; ?>/productos.php">
            Productos > Finalizar Cotización > 
        </a>
    </div>

    <div class="main-container">
        <div class="main-title">
            <h2>Finalizar Cotización</h2>
        </div>
        <div class="main-form">
            <form action="" method="POST" id="user_data_form">
                <div class="main-form_pri">
                    <div class="main-form__title">
                        <h4>Detalles</h4>
                    </div>
                    <div class="main-form__half">
                        <div class="main-form__item">
                            <label for="user_name">Nombre<i class="fa-solid fa-asterisk"></i></label>
                            <span class="form-input"><input type="text" name="user_name" id="user_name" maxlength="255"></span>
                        </div>
                        <div class="main-form__item">
                            <label for="user_lastname">Apellido<i class="fa-solid fa-asterisk"></i></label>
                            <span class="form-input"><input type="text" name="user_lastname" id="user_lastname" maxlength="255"></span>
                        </div>
                    </div>
                    <div class="main-form__item">
                        <label for="user_compname">Nombre de la empresa (opcional)</label>
                        <span class="form-input"><input type="text" name="user_compname" id="user_compname" maxlength="255"></span>
                    </div>
                    <div class="main-form__item">
                        <label for="user_ciudad">Ciudad<i class="fa-solid fa-asterisk"></i></label>
                        <span class="form-input"><input type="text" name="user_ciudad" id="user_ciudad" maxlength="255"></span>
                    </div>
                    <div class="main-form__item">
                        <label for="user_dep">Departamento<i class="fa-solid fa-asterisk"></i></label>
                        <span class="form-input"><input type="text" name="user_dep" id="user_dep" maxlength="255"></span>
                    </div>
                    <div class="main-form__item">
                        <label for="user_tel">Teléfono<i class="fa-solid fa-asterisk"></i></label>
                        <span class="form-input"><input type="text" name="user_tel" id="user_tel" maxlength="255"></span>
                    </div>
                    <div class="main-form__item">
                        <label for="user_mail">Correo Electrónico<i class="fa-solid fa-asterisk"></i></label>
                        <span class="form-input"><input type="text" name="user_mail" id="user_mail" maxlength="255"></span>
                    </div>
                </div>
                <div class="main-form_sec">
                    <div class="main-form__title">
                        <h4>Información Adicional</h4>
                    </div>
                    <div class="main-form__item">
                        <label for="user_extrainfo">Notas de la cotización (opcional)</label>
                        <span class="form-input"><textarea name="user_extrainfo" id="user_extrainfo" cols="30" rows="10" placeholder="Notas sobre tu cotización, información adicional etc."></textarea></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="final-cart active">
            <div class="final-cart__title">
                <h4>Tu Cotización</h4>
            </div>
            <div id="final_cart_list"></div>
            <div class="final-cart__button">
                <button type="submit" id="user_data_submit">Solicitar Cotización</button>
            </div>
        </div>
    </div>

<?php include'footer.php'?>

<script src="<?php echo RUTA; ?>/js/cart.ajax.js"></script>
<script src="<?php echo RUTA; ?>/js/functions.js"></script>
</body>
</html>