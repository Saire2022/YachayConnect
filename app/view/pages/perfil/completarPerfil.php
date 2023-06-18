<?php
include_once URL_APP . '/view/custom/header.php';
?>
<div class="completar_Perfil">
    <div class="container">
        <div class="container-perfil">
            <h2 class="text-center">Completa tu perfil </h2>
            <h6 class="text-center">Antes de continuar deberas completar tu perfil</h6>
            <hr>
            <div class="conten-comletar-perfil-center">
                <form action="<?php echo URL_PROJECT?>/home/insertarRegistroPerfil" method="POST" enctype="multipart/from-data">
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
                        <input type="file" class="custom-file-input" name="image" id="image" required>
                        <label class="custom-file-label" for="image">Seleccionar una foto</label>
                    </div>
                </div>
                <button class="btn-purple btn-block">Registrar datos</button>
                </form>
            </div>
        </div>
    </div>
</div>

<a class="dropdown-item text-dark" href="<?php echo URL_PROJECT?>/home/logout">Salir</a>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>