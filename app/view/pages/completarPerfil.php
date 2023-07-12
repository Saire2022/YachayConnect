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
                    <!-- Form para los graduados -->
                    <?php if ($datos['usuario']->idPrivilegio ==3):?>
                    <form action="<?php echo URL_PROJECT ?>/home/insertarRegistrosPerfil" method="POST" enctype="multipart/form-data" id="registroFormGraduado">
                        <input type="hidden" name="id_user" value="<?php echo $datos['usuario']->idusuario?>">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                            <label for="date">Fecha de inicio de estudios</label>
                            <input type="date" name="fiestudio" class="form-control" placeholder="Fecha inicio estudios" required>
                            <label for="date">Fecha de grado</label>
                            <input type="date" name="fgrado" class="form-control" placeholder="Fecha de grado" required>
                            <input type="text" name="paisactual" class="form-control" placeholder="Pais Actual" required>
                            <input type="text" name="caestudio" class="form-control" placeholder="Carrera que estudio" required>
                            <input type="text" name="profesion" class="form-control" placeholder="Profesión" required>
                            <input type="text" name="salario" class="form-control" placeholder="Salario" required>
                            <input type="text" name="cedula" class="form-control" placeholder="Cedula" required>
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
                    <!-- Form para los estudiantes -->
                    <?php else:?>
                        <form action="<?php echo URL_PROJECT ?>/home/insertarRegistrosPerfil" method="POST" enctype="multipart/form-data" id="registroFormEstudiante">
                        <input type="hidden" name="id_user" value="<?php echo $datos['usuario']->idusuario?>">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                            <input type="text" name="carrer" class="form-control" placeholder="Carrera que estudia" required>
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
                    <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>
