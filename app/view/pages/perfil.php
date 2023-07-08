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
                                                <button class="btn btn-primary btn-block">Editar</button>
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
                <div class="ContainerPublic">
                    <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) : ?>
                            <a href="<?php echo URL_PROJECT?>/perfil/<?php echo $datos['usuario']->usuario?>">
                            <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt=""></a>
                            <form action="" class="form-publicar ml-2">
                                <textarea name="" id="" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
                                <div class="imgBx">
                                    <div class="upload-photo">
                                        <label for="imagen" class="btnSubirFoto">
                                            <div class="upload-photo">
                                                <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                                                <span class="btn btn-primary btn-block">Subir foto</span>    
                                            </div>
                                        </label>
                                        <button class="btn btn-primary btn-block">Publicar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endif ?>  
                </div>      
            </div>

            <!-- Mensajeria -->  

            <div class="col-md-1">
                <div class="container-usuario-contact">
                    <a href="" class="btn btn-primary btn-block"><span class="big"><i class="far fa-envelope"></i></span>Mensaje</a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>