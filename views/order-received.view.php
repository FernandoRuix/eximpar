<?php include 'views/header.php'; ?>

    <div class="product_header">
        <a href="<?php echo RUTA; ?>/tienda.php">
            Productos > Enviado > 
        </a>
    </div>

    <div class="main-container">
        <div class="main-title">
            <h2>Solicitud de cotización recibida</h2>
            <span>Gracias, recibimos tu solicitud, y nos estaremos comunicando muy pronto!</span>
        </div>
        <div class="quest-data">
            <table>
                <thead>
                    <tr>
                        <th>NÚMERO DE COTIZACIÓN:</th>
                        <th>FECHA:</th>
                        <th>EMAIL:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $user_data[0]['solicitudes_id']; ?></td>
                        <td><?php echo $user_data[0]['soli_date']; ?></td>
                        <td><?php echo $user_data[0]['soli_correo']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cart-details">
            <div class="cart-details__title">
                <h4>Detalles de la cotización</h4>
            </div>
            <div class="final_cart_list">
                <?php foreach($user_data as $item){ ?>
                <div class="final-cart__item">
                    <?php echo $item['iteso_descripcion'] . " • " . $item['iteso_presen'] . " • " . $item['iteso_marca'] . " • x" . $item['iteso_cantidad']; ?>
                </div>
                <?php } ?>
            </div>
            <div class="final_cart_note">
                <p><span>NOTA: <?php echo $user_data[0]['soli_nota']; ?></span></p>
            </div>
            <div class="cart-details__title">
                <h4>Datos del Contacto</h4>
            </div>
            <div class="cart-details__body">
                <ul>
                    <li><?php echo $user_data[0]['soli_nombre'] . " " . $user_data[0]['soli_apellido']; ?></li>
                    <li><?php echo $user_data[0]['soli_empresa']; ?></li>
                    <li><?php echo $user_data[0]['soli_ciudad']; ?></li>
                    <li><?php echo $user_data[0]['soli_departamento']; ?></li>
                    <li><?php echo $user_data[0]['soli_telefono']; ?></li>
                    <li><?php echo $user_data[0]['soli_correo']; ?></li>
                </ul>
            </div>
        </div>
        
    </div>

<?php include'footer.php'?>

<script src="<?php echo RUTA; ?>/js/functions.js"></script>
</body>
</html>