<?php include 'views/header.php' ?>

    <div class="container">
        <div class="image-container">
            <img src="<?php echo RUTA; ?>/media/access.bg.png" alt="">
        </div>
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                <div class="form-header">
                    <h4>INICIAR SESIÓN</h4>
                    <span>Bienvenido/a</span>
                </div>

                <div class="group">      
                <input name="usuario" type="text" required autocomplete="off">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Usuario</label>
                </div>
                
                <div class="group">      
                <input name="password" type="password" required autocomplete="off">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Contraseña</label>
                </div>
                
                <input name="submit" value="Acceder" type="submit" class="submit_button">

            </form>
        </div> 
    </div>

<script src="<?php echo RUTA; ?>/js/mobile-navbar.js"></script>
<script src="<?php echo RUTA; ?>/js/functions.js"></script>
</body>
</html>