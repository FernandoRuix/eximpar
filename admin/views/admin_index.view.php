<?php include 'admin-header.php' ?>

    <div class="main_container">
        <div class="sidebar">
            <div class="sidebar-top">
                <img src="" alt="">
            </div>
            <div class="sidebar-item">
                <a href="">
                    <i class="fa-solid fa-user"></i>
                    <span>Cuenta</span>
                </a>
            </div>
            <div class="sidebar-item current">
                <a href="<?php echo RUTA; ?>/admin/index.php">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Estadísticas</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="<?php echo RUTA; ?>/admin/consultas.php">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span>Consultas</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="<?php echo RUTA; ?>/admin/">
                    <i class="fa-solid fa-flask-vial"></i>
                    <span>Null</span>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="content__left">
                <div class="content__title">
                    <h1>PANEL DE CONTROL</h1>
                </div>
                <div class="actions_container">
                    <div class="actions_item">
                        <a href="<?php echo RUTA; ?>/admin/products-list.php">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>Productos</span>
                            </div>
                        </a>
                    </div>
                    <div class="actions_item">
                        <a href="<?php echo RUTA; ?>/admin/marcas-list.php">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>Marcas</span>
                            </div>
                        </a>
                    </div>
                    <div class="actions_item">
                        <a href="<?php echo RUTA; ?>/admin/categorias-list.php">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>Categorias</span>
                            </div>
                        </a>
                    </div>
                    <div class="actions_item">
                        <a href="<?php echo RUTA; ?>/admin/subcategorias-list.php">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>Subcategorias</span>
                            </div>
                        </a>
                    </div>
                    <div class="actions_item">
                        <a href="<?php echo RUTA; ?>/admin/admins-list.php">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>Administradores</span>
                            </div>
                        </a>
                    </div>
                    <div class="actions_item">
                        <a href="">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>_NULL</span>
                            </div>
                        </a>
                    </div>
                    <div class="actions_item">
                        <a href="<?php echo RUTA; ?>/admin/logout.php">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>Cerrar Sesión</span>
                            </div>
                        </a>
                    </div>
                    <div class="actions_item">
                        <a href="">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>_NULL</span>
                            </div>
                        </a>
                    </div>
                    <div class="actions_item">
                        <a href="">
                            <div class="actions_item__img">
                                <div class="actions_item__circle"></div>
                            </div>
                            <div class="actions_item__info">
                                <span>_NULL</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content__right">
                <div class="content__title">
                    <h4>Últimas Interacciones</h4>
                </div>
                <div class="content__right--list">
                    <ul>

                        <li><b>Solicitudes</b></li>
                        <?php foreach($solicitudes as $i) :?>
                        <li><a href="<?php echo RUTA; ?>/order-received.php?q=<?php echo $i['solicitudes_id'] ?>&key=<?php echo $i['soli_url_key'] ?>">
                            <i class="fa-solid fa-arrow-right"></i><?php echo $i['soli_nombre']." ".$i['soli_apellido']." [ ".substr($i['soli_date'], 0, 10)." ] " ?>
                        </a></li>
                        <?php endforeach ?>

                        <li><b>Consultas y/o Sugerencias</b></li>
                        <?php foreach($consultas as $i) :?>
                        <li><a href="<?php echo RUTA; ?>/admin/consultas.php" <?php echo ($i['con_estado'] == 'Concluido') ? 'style="color:#d4d4d4"' : ''; ?> >
                            <i class="fa-solid fa-arrow-right"></i><?php echo $i['con_nombre']." ".$i['con_apellido']." [ ".substr($i['con_fecha'], 0, 10)." ] " ?>
                        </a></li>
                        <?php endforeach ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>

<script src="<?php echo RUTA; ?>/js/functions.js"></script>
<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
</body>
</html>