<?php
include_once URL_APP . '/view/custom/header.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<body class="background">

    <div class="content">
        <div class="container">
            <div class="row">
            <!-- First column -->

                <div class="col-md-5 mr-auto">
                    <h3 class="YTConnect">Welcome to YT-Connect!</h3>
                    <h2 class="Text">YTConnect es una página web tipo red social que te ayuda a conocer más de nuestros <span class="graduados">graduados</span>.</h2>
                </div>

                <!-- Second Column -->

                <div class="col-md-6">
                <div class="logoUni center" ></div>

                    <div class="contentLogin text-center mt-4 justify-content-center"> <!-- Agregamos margen superior -->
            <!--             <div class="logoUni"></div>
            -->                <div class="col-md-6 offset-md-3">
                                <form action="<?php echo URL_PROJECT ?>/home/login" method="POST">
                                    <div class="mb-3">
<!--                                         <label for="usuario" class="form-label">Usuario</label>
 -->                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                                    </div>
                                    <div class="mb-3">
<!--                                         <label for="contrasena" class="form-label">Contraseña</label>
 -->                                        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                </form>
                                <?php if (isset($_SESSION['loginComplete'])) : ?>
                                    <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
                                        <?php echo $_SESSION['loginComplete']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php unset($_SESSION['loginComplete']);
                                endif ?>
                                <?php if (isset($_SESSION['errorLogin'])) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                                        <?php echo $_SESSION['errorLogin']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php unset($_SESSION['errorLogin']);
                                endif ?>
                                <div class="contenido-link mt-2">
                                    <span class="mr-2">No tienes una cuenta?</span>
                                    <a href="<?php echo URL_PROJECT ?>/home/register">Registrarme</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>
