<?php include 'views/header.php'; ?>
    <div class="tienda-container">
        <div class="tienda-nav__container">
            <div class="tienda-nav">
                <div class="nav-span">
                    <span>BUSCAR POR NOMBRE, MARCA O ESPECIALIDAD.</span>
                </div>
                <form class="nav-input">
                    <div class="nav-input__input">
                        <input type="text" id="search_input" placeholder="Buscar productos..." autocomplete="OFF">
                    </div>
                    <div class="nav-input__button">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="tienda-main__container">
            <div class="tienda-title">
                <h2>Productos</h2>
            </div>
            <div class="tienda__main">
                <div class="filter">
                    <div class="tiendaFilter closed">
                        <a class="drp" id="drp">
                            <div class="">FILTRAR</div>
                            <span><i class="fa-solid fa-chevron-down"></i></span>
                        </a>
                        <ul class="filter-menu">

                            <?php if($categorias[0]['cate_activo'] == 1): ?>
                            <li class="filter_li">
                                <a class="sort--mainfilter" id="sort_equ" href=""><i class="fa-regular fa-square"></i>EQUIPOS</a>
                                <i class="fa-solid fa-chevron-up"></i>
                            </li>
                            <div class="sub_filter">
                                <ul class="closed sub_filter--ul">
                                    <?php foreach($subcategorias_equipos as $i): ?>
                                        <li><a class="sort--secfilt" data-secfilter="<?php echo $i['subca_titulo'] ?>">
                                            <i class="fa-regular fa-square"></i><?php echo $i['subca_titulo'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <?php if($categorias[1]['cate_activo'] == 1): ?>
                            <li class="filter_li"><a class="sort--mainfilter" id="sort_rea" href=""><i class="fa-regular fa-square"></i>REACTIVOS</a>
                            <i class="fa-solid fa-chevron-up"></i></li>
                            <div class="sub_filter">
                                <ul class="closed sub_filter--ul">
                                    <?php foreach($subcategorias_reactivos as $i): ?>
                                        <li><a class="sort--secfilt" data-secfilter="<?php echo $i['subca_titulo'] ?>">
                                            <i class="fa-regular fa-square"></i><?php echo $i['subca_titulo'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <?php if($categorias[2]['cate_activo'] == 1): ?>
                            <li class="filter_li"><a class="sort--mainfilter" id="sort_mat" href=""><i class="fa-regular fa-square"></i>MATERIALES</a>
                            <i class="fa-solid fa-chevron-up"></i></li>
                            <div class="sub_filter">
                                <ul class="closed sub_filter--ul">
                                    <?php foreach($subcategorias_materiales as $i): ?>
                                        <li><a class="sort--secfilt" data-secfilter="<?php echo $i['subca_titulo'] ?>">
                                            <i class="fa-regular fa-square"></i><?php echo $i['subca_titulo'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <?php if($categorias[3]['cate_activo'] == 1): ?>
                            <li class="filter_li"><a class="sort--mainfilter" id="sort_sof" href=""><i class="fa-regular fa-square"></i>SOFTWARE</a></li>    
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
                <div class="products">
                    <div class="products-filter">
                        <span id="total_items">Mostrando 00 de 00 productos</span>
                        <div class="drop_hov">
                            <span class="button_length">30 POR PÁGINA</span>
                            <div class="sub_drop sub_length">
                                <a href="" class="sort--length active" data-length="30"><div><i class="fa-regular fa-circle-check"></i>30 POR PÁGINA</div></a>
                                <a href="" class="sort--length" data-length="50"><div><i class="fa-regular fa-circle"></i>50 POR PÁGINA</div></a>
                                <a href="" class="sort--length" data-length="70"><div><i class="fa-regular fa-circle"></i>70 POR PÁGINA</div></a>
                            </div>
                        </div>
                        <div class="drop_hov">
                            <span class="button_orderby">ORDENAR: POPULARIDAD</span>
                            <div class="sub_drop sub_orderby">
                                <a href="" class="sort--orderby active" data-orderby="popular"><div><i class="fa-regular fa-circle-check"></i>ORDENAR: POPULARIDAD</div></a>
                                <a href="" class="sort--orderby" data-orderby="name_asc"><div><i class="fa-regular fa-circle"></i>ORDENAR: NOMBRE A - Z</div></a>
                                <a href="" class="sort--orderby" data-orderby="name_desc"><div><i class="fa-regular fa-circle"></i>ORDENAR: NOMBRE Z - A</div></a>
                            </div>
                        </div>
                        <div class="remove_filters"><i class="fa-solid fa-trash-can"></i>BORRAR FILTROS</div>
                    </div>
                    <div class="products-order">
                        <button id="switch_sort">
                            <div>PRODUCTOS</div>
                            <div class="switch_icons">
                                <i class="fa-solid fa-sort fa-sort-sec"></i>
                                <i class="fa-solid fa-sort fa-sort-main"></i>
                            </div>
                        </button>
                    </div>
                    <div class="products-list" id="products"></div>
                    <div id="pagination"></div>
                </div>
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

<script src="<?php echo RUTA; ?>/js/functions.js"></script>
<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
<script src="<?php echo RUTA; ?>/js/tienda.dropdown-filter.js"></script>
<script src="<?php echo RUTA; ?>/ajax/tienda.ajax.js"></script>
<script src="<?php echo RUTA; ?>/ajax/cart.ajax.js"></script>
<script src="<?php echo RUTA; ?>/js/stickyNav.js"></script>
</body>
</html>