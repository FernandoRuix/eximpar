<?php include 'views/header.php'; ?>

    <div class="product_header">
        <a href="<?php echo RUTA; ?>/productos.php">
            <?php echo $data[0]['mar_titulo']?> > <?php echo $data[0]['cate_titulo']?> > <?php echo $data[0]['subca_titulo']?> > 
        </a>
    </div>

    <div class="product_container">
        <div class="product_info">
            <div class="info_title">
                <h1>
                    <?php 
                        echo $data[0]['prd_titulo'];
                        if (!empty($data[0]['prd_presentacion'])) {
                            echo " • ".$data[0]['prd_presentacion'];
                        }
                        if (!empty($data[0]['mar_titulo'])) {
                            echo " • ".$data[0]['mar_titulo'];
                        }
                        if (!empty($data[0]['subca_titulo'])) {
                            echo " • ".$data[0]['subca_titulo'];
                        }
                    ?>
                </h1>
            </div>
            <div class="info_data">
                <?php echo $data[0]['prd_descripcion']?>
            </div>
            <div class="info_code">
                <b><span>CÓDIGO: <?php echo $data[0]['prd_codigo']?></span></b>
            </div>
            <div class="info_btns">
                <input type="hidden" value="<?php echo $data[0]['productos_id']?>" id="product_id">
                <input type="text" value="1" id="product_quantity">
                <button id="cotizar_button">Cotizar</button>
                <a href="<?php echo RUTA; ?>/pdf/<?php echo $data[0]['prd_pdf']?>" target="_BLANK">Adjunto</a>
            </div>
        </div>
        <div class="product_img">
            <div id="img_container">
                <img src="<?php echo RUTA;?>/images/<?php echo $data[0]['prd_thumb']?>" alt="">
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

<script src="<?php echo RUTA; ?>/ajax/cart.ajax.js"></script>
<script src="<?php echo RUTA; ?>/js/functions.js"></script>
<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
<script src="<?php echo RUTA; ?>/js/image_zoom.js"></script>
<script src="<?php echo RUTA; ?>/js/stickyNav.js"></script>
</body>
</html>