<?php
//include_once "config/config.php"; 
include_once URL_APP . '/view/custom/header.php';
//include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container-center center">
    <div class="container-content center">
        <div class="container-action center">
            <h4>Iniciar sesión</h4>
            <form action="<?php echo URL_PROJECT ?>/home/login" method="POST">
                <input type="text" name='usuario' placeholder="Usuario" required>
                <input type="password" name= 'contrasena' placeholder="Contraseña" required>
                <button type="btn-purple btn-block"> Ingresar </button>
            </form>
            <!-- Error. Alerta para cuando la contraseña o el usuario es incorrecto -->
            <?php if(isset($_SESSION['errorLogin'])):?>
                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">  
                <?php echo $_SESSION['errorLogin']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            unset($_SESSION['errorLogin']); endif
            ?>
            <!-- Alerta que muestra que el registro se completo -->
            <?php if(isset($_SESSION['LoginComplete'])):?>
                <div class="alert alert-succes alert-dismissible fade show mt-2 mb-2" role="alert">
<!--                 <strong>Holy guacamole!</strong> You should check in on some of those fields below.-->  
                <?php echo $_SESSION['LoginComplete']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            unset($_SESSION['LoginComplete']); endif
            ?>

            <div class="contenido-link mt-2">
                <span class="mr-2">No tienes una cuenta?</span><a href="<?php echo URL_PROJECT?>/home/register">Registrarme</a>
            </div>
        </div>
        <div class="content-image center">
            <img src="<?php echo URL_PROJECT?>/img/vector.png" alt="Hombre sentado con una silla">
        </div>
    </div>
</div>


<?php
include_once URL_APP . '/view/custom/footer.php';
?>
