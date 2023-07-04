<?php

include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';

?>
<div>
    <div class="container-cover">
        <img src="<?php echo URL_PROJECT ?>/img/RegisterBackground.png" class="imagen-portada-perfil" alt="">
        
    <div>
</div>
    <div class="container-header-usuario">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-6"></div>
                    <div class="container-principal-informacion-usuario">
                        <div class="container-style-main">
                            <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) : ?>
                                <div class="container-usuario-publicar">
                                    <a href="<?php echo URL_PROJECT?>/perfil/<?php echo $datos['usuario']->usuario?>"><img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt=""></a>
                                    <form action="" class="form-publicar ml-2">
                                        <textarea name="" id="" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
                                        <div class="image-upload-file">
                                            <div class="upload-photo">
                                                <button class="btn btn-primary btn-block">
                                                    <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                                                    <div class="input-file">
                                                        <input type="file" name="imagen" id="imagen">
                                                    </div>
                                                    <span class="ml-1">Subir foto</span>    
                                                </button>
                                                <button class="btn btn-primary btn-block">Publicar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php endif ?>        
                        </div>
                    </div>
                </div>

    
    <h1>hola estas en mi perfil</h1>
</div>

                <div class="col-md-2">
                    <div class="container-usuario-contact">
                        <a href="" class="btn btn-primary btn-block"><span class="big"><i class="far fa-envelope"></i></span>Mensaje</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once URL_APP . '/view/custom/footer.php';
#var_dump($datos['usuario']);
?>

