<?php
include_once URL_APP . '/view/custom/header.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/style.css">

<body class="background">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">

                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="../img/logo-yt.svg" alt="Logo YT"  style="width: 185px;" alt="logo">
                                </div>

                                    <form action="<?php echo URL_PROJECT ?>/home/login" method="POST">
                                        <div class="mb-4">
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block center">Ingresar</button>
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
                    
                        <!--  text-->
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="../img/Welcome-to-YT-Connect!.svg" alt="Welcome" style="width:250px; heigth: 200px: text-aligth:center">
                                </div>
                                <p class="small mb-0">YTConnect es una página web tipo red social que te ayuda a conocer más de nuestros <span class="graduados">graduados</span></p>
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
