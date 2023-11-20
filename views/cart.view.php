<?php include 'views/header.php'; ?>

    <div class="product_header">
        <a href="<?php echo RUTA; ?>/productos.php">
            Productos > Detalle de Cotización > 
        </a>
    </div>
    <div class="main_container">
        <div class="main_title">
            <h2>Detalle de Cotización</h2>
        </div>
        <div class="main_products">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>PRODUCTO</th>
                        <td>CANTIDAD</td>
                    </tr>
                </thead>
                <tbody id="main_cart_body" class="main_cart_body"> </tbody>
            </table>
            <div id="null_alert"></div>
        </div>
        <div class="main_buttons">
            <div class="back_button">
                <a href="<?php echo RUTA; ?>/productos.php"><i class="fa-solid fa-chevron-left"></i>Seleccionar más productos</a>
            </div>
            <div id="cart_proceed">
                <a href="" class="cart_href" id="update_cart"><div>ACTUALIZAR COTIZACIÓN</div></a>
                <a href="<?php echo RUTA; ?>/checkout.php" class="cart_href"><div>SOLICITAR COTIZACIÓN</div></a>
            </div>
        </div>
    </div>


    <div class="cart_button">
        <div> 
            <img src="<?php echo RUTA; ?>/media/cart_icon.png" alt="">
        </div>
        <div class="cart_quantity"></div>
    </div>

    <div class="cartbg"></div>

    <div class="cart" id="cart">
        <div class="cart-header">
            <span>Productos</span>
            <span class="close-cart"><i class="fa-solid fa-xmark"></i></span>
        </div>
        <div id="cart-body"></div>
        <div class="cart-footer">
            <a href="<?php echo RUTA; ?>/cart.php">Ver Detalles</a>
            <a class="close-cart" href="">Cerrar</a>
        </div>
    </div>

<?php include'footer.php'?>

<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
<script src="<?php echo RUTA; ?>/ajax/cart.ajax.js"></script>
<script src="<?php echo RUTA; ?>/js/functions.js"></script>
<script src="<?php echo RUTA; ?>/js/stickyNav.js"></script>
</body>
</html>