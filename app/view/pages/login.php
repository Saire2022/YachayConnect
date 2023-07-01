<?php
include_once URL_APP . '/view/custom/header.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<body class="background">

    <div class="content">
        <div class="container">
            <div class="row d-flex align-items-center">
                <!-- First column -->
               
                <div class="col-md-6 mr-auto text-center">
                        <img src="../img/Welcome-to-YT-Connect!.svg" alt="Welcome">
                        <p style="color: #fff; font-size: 100px;">
                        <h2 class="Text">YTConnect es una página web tipo red social que te ayuda a conocer más de nuestros <span class="graduados">graduados</span></h2>
                </div>

                <!-- Second Column -->

                <div class="col-md-6 mr-auto text-center ">

                    <p style="color: #fff; font-size: 50px;">
                    <div class="container-content center"> <!-- Agregamos margen superior -->
                       <div class="container-action">
                            <img src="../img/logo-yt.svg" alt="Logo YT">
                            <form action="<?php echo URL_PROJECT ?>/home/login" method="POST">
                                <div class="mb-4">
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
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
                        </did>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>
