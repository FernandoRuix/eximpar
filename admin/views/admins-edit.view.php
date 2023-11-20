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
            <div class="table-container">
                <div class="table-header">
                    <div class="table-header__left">
                        <h4>Crear Producto</h4>
                    </div>
                    <div class="table-header__right">
                        <a href="<?php echo RUTA; ?>/admin/administradores-list.php" class="button_new">Lista de Administradores</a>
                    </div>
                </div>
                <div class="form-container">

                    <form enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="form">

                        <input type="hidden" name="hidden_id" value="<?php echo $single[0]['administradores_id']; ?>">

                        <div class="form-group">
                            <input type="text" name="nombre" placeholder="Título" class="form-input" value="<?php echo $single[0]['adm_user']; ?>" autocomplete="OFF">
                        </div>

                        <div class="form-group">
                            <input type="text" name="newpass" placeholder="Nueva contraseña" class="form-input" autocomplete="OFF">
                        </div>

                        <div class="form-group">
                            <input type="text" name="newpass_confirm" placeholder="Confirmar nueva contraseña" class="form-input" autocomplete="OFF">
                        </div>

                        <div class="form-group select-group">

                            <select name="prioridad" required>
                                <option selected value="<?php echo $single[0]['id_prioridades']; ?>">
                                    <?php echo $single[0]['prio_titulo']; ?>
                                </option>
                                <?php 
                                    foreach ($prioridades as $item){ if($item['prioridades_id'] !== $single[0]['prioridades_id']){ 
                                ?>
                                <option value="<?php echo $item['prioridades_id'] ?>">
                                    <?php echo $item['prio_titulo'] ?>
                                </option>
                                <?php 
                                    }} 
                                ?>
                            </select>

                        </div>


                        <div class="form-submit">
                            <input type="submit" value="Editar Administrador">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
<script src="<?php echo RUTA; ?>/js/functions.js"></script>
</body>
</html>