<?php
//include_once "../view/custom/header.php";
//include_once "../view/custom/navbar.php";
?>
<head>
    <link rel="stylesheet" href="<?php echo URL_PROJECT ?>/css/style.css">
</head>

<div class="container-center center">
    <div class="container-content center">
        <div class="container-action center">
            <h4>Registrarme</h4>
            <form action="<?php echo URL_PROJECT ?>/home/register" method="POST">
                <input type="email" name ='email' placeholder="Email" required>
                <input type="text" name='usuario' placeholder="Usuario" required>
                <input type="password" name='contrasena' placeholder="Contraseña" required>
                <button class="btn-purple btn-block" type="submit">Registrarme</button>
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
        <div class="content-image center">
            <img src="<?php echo URL_PROJECT ?>/img/vector.png" alt="Hombre sentado con una computadora">
        </div>
    </div>
</div>

<?php
include_once "../view/custom/footer.php";
?>
