<?php
include_once URL_APP . '/view/custom/header.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<body class="background">

    <div class="container d-flex align-items-center justify-content-center" style= "margin-top:100px">
        <div class="container-content center">
            <div class="container-action center" style= "margin-top:100px">
                <div class="col">
                    <h4 class="text-center">Completa tu perfil </h4>
                    <h6 class="text-center">Llenar los campos correspondientes</h6>
                    <hr>
                    <div class="conten-comletar-perfil-center">
                    <!-- Form para los graduados -->
                    <?php if ($datos['usuario']->idPrivilegio ==3):?>
                    <form action="<?php echo URL_PROJECT ?>/home/insertarRegistrosPerfil" method="POST" enctype="multipart/form-data" id="registroFormGraduado">
                        <input type="hidden" name="id_user" value="<?php echo $datos['usuario']->idusuario?>">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                            <!-- Fecha inicio -->
                            <label for="date">Fecha de inicio de estudios</label>
                            <input type="date" name="fiestudio" class="form-control" required>
                            <!-- Fecha grado -->
                            <label for="date">Fecha de grado</label>
                            <input type="date" name="fgrado" class="form-control" placeholder="Fecha de grado" required>

                            <input type="text" name="paisactual" class="form-control" placeholder="Pais Actual" required>
                            <br>
                            <!-- Carrera Estudio -->
                            <div class="form-group">
                            <select class="form-control" name="caestudio" required>
                                <option value="" disabled selected>Selecciona la carrera que estudio</option>
                                <option value="Computacion">Computación</option>
                                <option value="Matematicas">Matemáticas</option>
                                <option value="Tecnologias de la informacion">Tecnologías de la información</option>
                                <option value="Fisica">Física</option>
                                <option value="Nanotecnologia">Nanotecnología</option>
                                <option value="Biomedicina">Biomedicina</option>
                                <option value="Biologia">Biologia</option>
                                <option value="Quimica">Química</option>
                                <option value="Materiales">Materiales</option>
                                <option value="Geologia">Geología</option>
                                <option value="Agroindustria">Agroindustria</option>
                            </select>
                        </div>
                        <br>
                        <!-- /// -->

                            <input type="text" name="profesion" class="form-control" placeholder="Profesión" required>
                            <input type="text" name="salario" class="form-control" placeholder="Salario" required>
                            <input type="text" name="cedula" class="form-control" placeholder="Cedula" required>
                        </div> 
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="imagen" id="image" required>
                                <label class="input-group-text" for="image">Seleccionar una perfil</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block">Registrar datos</button>
                    </form>
                    <!-- Form para los estudiantes -->
                    <?php else:?>
                        <form action="<?php echo URL_PROJECT ?>/home/insertarRegistrosPerfil" method="POST" enctype="multipart/form-data" id="registroFormEstudiante">
                        <input type="hidden" name="id_user" value="<?php echo $datos['usuario']->idusuario?>">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                            <select class="form-control" name="carrer" required>
                                <option value="" disabled selected>Selecciona la carrera que estudia</option>
                                <option value="Computacion">Computación</option>
                                <option value="Matematicas">Matemáticas</option>
                                <option value="Tecnologias de la informacion">Tecnologías de la información</option>
                                <option value="Fisica">Física</option>
                                <option value="Nanotecnologia">Nanotecnología</option>
                                <option value="Biomedicina">Biomedicina</option>
                                <option value="Biologia">Biologia</option>
                                <option value="Quimica">Química</option>
                                <option value="Materiales">Materiales</option>
                                <option value="Geologia">Geología</option>
                                <option value="Agroindustria">Agroindustria</option>
                            </select>
                        </div> 
                        <br>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="imagen" id="image" required>
                                <label class="input-group-text" for="image">Seleccionar foto</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block">Registrar datos</button>
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
