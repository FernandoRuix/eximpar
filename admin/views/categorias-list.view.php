<?php include '../views/header.php' ?>

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
            <div class="sidebar-item">
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
            <?php if (isset($_SESSION["ALERT"])) { ?>
                <div id="alert_box">
                    <?php 
                        if ($_SESSION["ALERT"]["BOOL"] == true) {
                            echo "<div class='alert_true'>";
                        } else { 
                            echo "<div class='alert_false'>";
                        }
                        echo $_SESSION["ALERT"]["MSG"];
                        unset($_SESSION["ALERT"]);
                        echo "</div>";
                    ?>
                </div>
            <?php } ?>

            <div class="table-container">
                <div class="table-header">
                    <div class="table-header__left">
                        <h4>Categorias</h4>
                    </div>
                    <div class="table-header__right">
                        <div class="products-filter">
                            <span id="total_items">Mostrando 00 de 00 categorias</span>
                            <div class="drop_hov">
                                <span class="button_length">20 POR PÁGINA</span>
                                <div class="sub_drop sub_length">
                                    <a href="" class="sort--length active" data-length="20"><div><i class="fa-regular fa-circle-check"></i>20 POR PÁGINA</div></a>
                                    <a href="" class="sort--length" data-length="30"><div><i class="fa-regular fa-circle"></i>30 POR PÁGINA</div></a>
                                    <a href="" class="sort--length" data-length="40"><div><i class="fa-regular fa-circle"></i>40 POR PÁGINA</div></a>
                                </div>
                            </div>
                            <div class="drop_hov">
                                <span class="button_orderby">ORDENAR: PREDETERMINADO</span>
                                <div class="sub_drop sub_orderby">
                                    <a href="" class="sort--orderby active" data-orderby="default"><div><i class="fa-regular fa-circle-check"></i>ORDENAR: PREDETERMINADO</div></a>
                                    <a href="" class="sort--orderby" data-orderby="name_asc"><div><i class="fa-regular fa-circle"></i>ORDENAR: NOMBRE A - Z</div></a>
                                    <a href="" class="sort--orderby" data-orderby="name_desc"><div><i class="fa-regular fa-circle"></i>ORDENAR: NOMBRE Z - A</div></a>
                                </div>
                            </div>
                            <div class="remove_filters"><i class="fa-solid fa-trash-can"></i>BORRAR FILTROS</div>
                        </div>
                        <a href="<?php echo RUTA; ?>/admin/categorias-new.php" class="button_new">Añadir Categoria</a>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th class="fst_clm tbl_clm tbl_head">ID</th>
                            <th class="scd_clm tbl_clm tbl_head">NOMBRE</th>
                            <th class="fve_clm tbl_clm tbl_head">ESTADO</th>
                            <th class="six_clm tbl_clm tbl_head">ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fst_clm tbl_clm tbl_body">00</td>
                            <td class="scd_clm tbl_clm tbl_body">Item</td>
                            <td class="fve_clm tbl_clm tbl_body">?????</td>
                            <td class="six_clm tbl_clm tbl_body">
                                <a href="">Editar</a>
                                <a href="">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
<script src="<?php echo RUTA; ?>/js/functions.js"></script>
<script src="<?php echo RUTA; ?>/admin/ajax/categorias.ajax.js"></script>
<script src="<?php echo RUTA; ?>/js/tienda.dropdown-filter.js"></script>
</body>
</html>