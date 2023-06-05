
<?php
include_once "config/config.php"; 
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container-center center">
    <div class="container-content center">
        <div class="container-action center">
            <h4>Iniciar sesión</h4>
            <form>
                <input type="text" placeholder="Usuario" required>
                <input type="password" placeholder="Contraseña" required>
                <button type="btn-purple btn-block"> Ingresar </button>
            </form>
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
