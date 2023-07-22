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
                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail" name='email' placeholder="Email" required>
                            <label for="floatingInput">Email</label>
                        </div>
                        <!-- Usuario -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingUser" name='usuario' placeholder="Usuario" required>
                            <label for="floatingUser">Usuario</label>
                        </div>
                        <!-- Contrasenia -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name='contrasena' placeholder="Contraseña" required>
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                        <!-- Privilegio -->

                        <select class="form-select" name="privilegio" required>
                            <option value="" disabled selected>Selecciona un tipo de usuario</option>
                            <option value="2">Estudiante</option>
                            <option value="3">Graduado</option>
                        </select>
                        <br>
                        <!-- fecha de nacimiento -->
                        <div class="form-group">
                            <a>Fecha de nacimiento<input type="date" name="date" placeholder="Fecha de nacimiento" required></label>
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
