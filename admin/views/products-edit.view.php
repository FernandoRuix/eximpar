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
                        <a href="<?php echo RUTA; ?>/admin/products-list.php" class="button_new">Lista de Productos</a>
                    </div>
                </div>
                <div class="form-container">

                    <form enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="form">

                        <input type="hidden" name="hidden_id" value="<?php echo $single[0]['productos_id']; ?>">
                        <input type="hidden" name="saved_thumb" value="<?php echo $single[0]['prd_thumb']; ?>">
                        <input type="hidden" name="saved_pdf" value="<?php echo $single[0]['prd_pdf']; ?>">

                        <div class="form-group">
                            <input type="text" name="nombre" placeholder="Título" class="form-input" value="<?php echo $single[0]['prd_titulo']; ?>" autocomplete="OFF">
                        </div>

                        <textarea id="editorck" name="descripcion" placeholder="Descripción del producto..."><?php echo $single[0]['prd_descripcion']; ?></textarea>

                        <div class="form-group">
                            <input type="text" name="presentacion" placeholder="Presentacion" class="form-input" value="<?php echo $single[0]['prd_presentacion']; ?>" autocomplete="OFF">
                        </div>

                        <div class="form-group">
                            <input type="text" name="codigo" placeholder="Código" class="form-input" value="<?php echo $single[0]['prd_codigo']; ?>" autocomplete="OFF">
                        </div>

                        <div class="form-group select-group">
                            
                            <select name="categoria" required>
                                <option selected value="<?php echo $single[0]['id_categorias']; ?>">
                                    <?php echo $single[0]['cate_titulo']; ?>
                                </option>
                                <?php 
                                    foreach ($categorias as $item){ if($item['categorias_id'] !== $single[0]['categorias_id']){ 
                                ?>
                                <option value="<?php echo $item['categorias_id'] ?>">
                                    <?php echo $item['cate_titulo'] ?>
                                </option>
                                <?php 
                                    }} 
                                ?>
                            </select>
                            
                            <select name="subcategoria" required>
                                <option selected value="<?php echo $single[0]['id_subcategorias']; ?>">
                                    <?php echo $single[0]['subca_titulo']; ?>
                                </option>
                                <?php 
                                    foreach ($subcategorias as $item){ if($item['subcategorias_id'] !== $single[0]['subcategorias_id']){ 
                                ?>
                                <option value="<?php echo $item['subcategorias_id'] ?>">
                                    <?php echo $item['subca_titulo'] ?>
                                </option>
                                <?php 
                                    }} 
                                ?>
                            </select>
                            
                            <select name="marca" required>
                                <option selected value="<?php echo $single[0]['id_marcas']; ?>">
                                    <?php echo $single[0]['mar_titulo']; ?>
                                </option>
                                <?php 
                                    foreach ($marcas as $item){ if($item['marcas_id'] !== $single[0]['marcas_id']){ 
                                ?>
                                <option value="<?php echo $item['marcas_id'] ?>">
                                    <?php echo $item['mar_titulo'] ?>
                                </option>
                                <?php 
                                    }} 
                                ?>
                            </select>

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
                        
                        <div>
                            <div class="uploadOuter">
                                <label for="uploadFile" class="btn btn-primary">Seleccionar Imagen</label>
                                <strong>OR</strong>
                                <span class="dragBox" >
                                    Arrastra una Imagen Hasta Aqui
                                <input name="thumb" type="file" onChange="dragNdrop(event)"  ondragover="drag()" ondrop="drop()" id="uploadFile"/>
                                </span>
                                <h4>Previzualización</h4>
                                <div id="preview">
                                    <img src="<?php echo RUTA; ?>/images/<?php echo $single[0]['prd_thumb']; ?>" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="input-file-container">  
                            <input name="pdf" type="file" class="input-file" id="my-file">
                            <label tabindex="0" for="my-file" class="input-file-trigger">Selecciona un PDF</label>
                        </div>
                        <p class="file-return"></p>


                        <div class="form-submit">
                            <input type="submit" value="Editar Producto">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
<script src="<?php echo RUTA; ?>/js/functions.js"></script>
<script src="<?php echo RUTA; ?>/admin/editor/ckeditor/ckeditor.js"></script>
<script src="<?php echo RUTA; ?>/js/dragImage.js"></script>
<script src="<?php echo RUTA; ?>/js/dragPdf.js"></script>
<script>
        CKEDITOR.replace('editorck');
</script>
</body>
</html>