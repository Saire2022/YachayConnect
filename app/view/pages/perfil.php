<?php

include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container">
    <div class="container-fluid">
        <img src="<?php echo URL_PROJECT ?>/img/RegisterBackground.png" class="imagen-portada-perfil" width=100% height=400px>
        <div class="row h-100">
            <!-- Perfil -->
            <div class="col-md-4">
                <div class="containerPer">
                    <div class="cardP">
                        <div class="imgBxP">
                            <img src="<?php echo URL_PROJECT?>/<?php echo $datos['perfil']->fotoPerfil?>" class="imagen-perfil-usuario" alt="FotoPerfil">
                            <?php if ($datos['usuario']->idusuario==$_SESSION['logueado']) : ?>
                                <div class="imagen-perfil-cambiar">
                                    <form action="<?php echo URL_PROJECT?>/perfil/cambiarImagen" method="POST" enctype="multipart/form-data">
                                        <label for="imagen" class="camera-icon">
                                            <i class="fas fa-camera" id="camera-icon" style="position: absolute; top: -75px; left: 200px;font-size: 2em;"></i>
                                        </label>
                                        <input type="file" name="imagen" id="imagen" style="display: none;">

                                        <div class="editar-perfil">
                                                <button class="btn-change-image">Editar</button>
                                            </div>
                                        <div class="input-file">
                                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado']?>">
                                        </div>
                                            
                                </form>
                                </div>
                            <?php endif ?>
                            <div class="datos-personales-usuario">
                                <h3><?php echo ucwords ($datos['usuario']->usuario)?></h3>
                                <div class="descripcion-usuario">
                                    <span><?php echo $datos['perfil']->nombreCompleto?></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publicar -->
            <div class="col-md-6">
                <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) : ?>
                    <div class="container-usuario-publicar">
                        <a href="<?php echo URL_PROJECT?>/perfil/<?php echo $datos['usuario']->usuario?>">
                        <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt=""></a>
                        <form action="" class="form-publicar ml-2">
                            <textarea name="" id="" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
                            <div class="image-upload-file">
                                <div class="upload-photo">
                                    <img src="<?php echo URL_PROJECT ?>/img/image.png" alt="" class="image-public">
                                    <div class="input-file">
                                        <input type="file" name="imagen" id="imagen">
                                    </div>
                                    <span class="ml-1">Subir foto</span>    
                                </div>
                                <button class="btn-publi">Publicar</button>
                            </div>
                        </form>
                    </div>
                <?php endif ?>        
            </div>

            <!-- Mensajeria -->  

            <div class="col-md-1">
                <div class="container-usuario-contact">
                    <a href="" class="btn-message"><span class="big"><i class="far fa-envelope"></i></span>Mensaje</a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>