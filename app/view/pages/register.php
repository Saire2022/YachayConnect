<?php
include_once URL_APP . '/view/custom/header.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<body class="background">

    <div class="container d-flex align-items-center justify-content-center">
        <div class="container-content center">
            <div class="container-action center">
                <div class="col">
                    <h4 class="mb-4">Registrarme</h4>
                    <form action="<?php echo URL_PROJECT ?>/home/register" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name='email' placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name='usuario' placeholder="Usuario" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name='contrasena' placeholder="Contraseña" required>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Registrarme</button>
                    </form>
                    <?php if(isset($_SESSION['usarioError'])):?>
                        <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                            <?php echo $_SESSION['usarioError']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span arial-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php unset($_SESSION['usarioError']); 
                    endif ?>
                    <div class="contenido-link mt-2">
                        <span class="mr-2">Ya tienes una cuenta?</span><a href="<?php echo URL_PROJECT?>/home/login">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>
