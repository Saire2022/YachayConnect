<?php
include_once URL_APP . '/view/custom/header.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<body class="background">

    <div class="container d-flex align-items-center justify-content-center">
        <div class="container-content center">
            <div class="container-action center">
                <div class="col">
                    <h4 class="text-center">Completa tu perfil </h4>
                    <h6 class="text-center">Antes de continuar debes seleccionar el tipo de usuario y llenar los campos correspondientes</h6>
                    <hr>
                    <div class="conten-comletar-perfil-center">
                    <div class="dropdown center">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Selecciona el tipo de usuario
                        </button>
                        <div class="dropdown-menu fade" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="#" name='graduado' value=0 >Graduado</a>
                            <a class="dropdown-item" href="#">Estudiante</a>
                        </div>
                    </div>
                        <form action="<?php echo URL_PROJECT ?>/home/insertarRegistrosPerfil" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado']?>">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                                <input type="text" name="carrer" class="form-control" placeholder="Carrer" required>
                                <input type="text" name="salario" class="form-control" placeholder="Salario" required>
                                <input type="text" name="major" class="form-control" placeholder="Major" required>
                                <input type="text" name="paisactual" class="form-control" placeholder="Pais Actual" required>
                            </div> 
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagen" id="image" required>
                                    <label class="custom-file-label" for="image">Seleccionar una foto</label>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block">Registrar datos</button>
                            <a class="dropdown-item text-dark bg-transparent" href="<?php echo URL_PROJECT?>/home/logout" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='transparent'">Salir</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>
