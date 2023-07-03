<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
//var_dump($datos['usuario']);
?>
<link rel="stylesheet" type="text/css" href="../public/css/home.css">
    
<div class="container">
  <div class="row flex">
    <!-- Columna perfil -->
    <div class="col-md-3">
      <div class="containerP">
        <div class="card">
          <div class="imgBx">
            <a href="#">
              <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" alt="" width="30px" height="30px">
            </a>
            <a href="<?php echo URL_PROJECT?>/perfil/<?php echo $datos['usuario']->usuario?>">
              <h4 class="text-center"><?php echo $datos['perfil']->nombreCompleto ?></h4>
            </a>
                <a href="#">Publicaciones <br>0</a>
                <a href="#">Me gustas <br>0</a>
          </div>
        </div>
      </div>



      <div class="well">
        <a>Temas que te pueden interesar</a>
        <div class="container">
          <a>TY en el mundo</a>
        </div>
      </div>
    </div>
      


    <!-- Columna principal -->
    <div class="col-md-6">
      <div class="containerP">
        <a href="<?php echo URL_PROJECT?>/perfil"><img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt="" width="30px" height="30px"></a>
        <form action="" class="form-publicar ml-2">
          <textarea name="" id="" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
          <div class="imgBx">
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
    </div>
  </div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>
