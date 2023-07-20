<?php

include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>
<body>
  <div class="container py-5">
    <div class="row">
      <!-- Perfil -->
      <div class="col-lg-4">
        <br>
        <div class="card mb-4">
          <div class="card-body text-center">
            <div class="card-body text-center">
              <img src="<?php echo URL_PROJECT ?>/<?php echo $datos['perfil']->fotoPerfil ?>"
              class="imagen-perfil-usuario rounded-circle img-fluid" style="width: 150px;" alt="FotoPerfil">
              <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) { ?>
                <div class="imagen-perfil-cambiar">
                  <form action="<?php echo URL_PROJECT ?>/perfil/cambiarImagen" method="POST"
                    enctype="multipart/form-data">
                    <button class="btn btn-primary btn-block">Editar</button>
                    <label for="imagen" class="camera-icon">
                      <i class="fas fa-camera" id="camera-icon"></i>
                      <input type="file" name="imagen" id="imagen" style="display: none;">
                    </label>
                    <div class="input-file">
                      <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado'] ?>">
                    </div>
                  </form>
                </div>
              <?php } ?>
              <h5 class="my-3">
              <?php echo $datos['perfil']->nombreCompleto ?>
              </h5>
              <?php if ($datos['perfil']->idPrivilegio == 2): ?>
                <p class="text-muted mb-1">
                  <?php echo 'Carrera que estudia: ' . $datos['perfil']->Carrer ?>
                </p>
              <?php else: ?>
                <p class="text-muted mb-1">
                  <?php echo 'Carrera que estudio ' . $datos['perfil']->ca_estudio ?>
                </p>
              <?php endif ?>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
              </div>
            </div>
            <h5 class="my-3">
            <?php echo ucwords($datos['usuario']->usuario) ?>
            </h5>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <?php if ($datos['perfil']->github != "") { ?>
                  <a href="<?php echo $datos['perfil']->github ?>" target="_blank" style="color: black; text-decoration: none;">
                    <p class="mb-0">Perfil de GitHub</p>
                  </a>
                <?php } else { ?>
                  <p class="mb-0">Perfil no disponible</p>
                <?php } ?>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <?php if ($datos['perfil']->instagram != "") { ?>
                  <a href="<?php echo $datos['perfil']->instagram ?>" target="_blank" style="color: black; text-decoration: none;">
                    <p class="mb-0">Perfil de Instagram</p>
                  </a>
                <?php } else { ?>
                  <p class="mb-0">Perfil no disponible</p>
                <?php } ?>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <?php if ($datos['perfil']->facebook != "") { ?>
                  <a href="<?php echo $datos['perfil']->facebook ?>" target="_blank" style="color: black; text-decoration: none;">
                    <p class="mb-0">Perfil de Facebook</p>
                  </a>
                <?php } else { ?>
                  <p class="mb-0">Perfil no disponible</p>
                <?php } ?>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-linkedin-in fa-lg" style="color: #0077B5;"></i>
                <?php if ($datos['perfil']->linkedin != "") { ?>
                  <a href="<?php echo $datos['perfil']->linkedin ?>" target="_blank" style="color: black; text-decoration: none;">
                    <p class="mb-0">Perfil de LinkedIn</p>
                  </a>
                <?php } else { ?>
                  <p class="mb-0">Perfil no disponible</p>
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
        <!-- Desde aqui es la seccion para actualizar las redes sociales -->
        <!-- Condicion solo para que pueda actulizar sus redes el dueño del perfil -->
        <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']): ?>
          <!-- Modal para editar los enlaces de las redes sociales -->
          <div class="container mt-5">
            <!-- Botón que abrirá el modal -->
            <div class="text-center">
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Editar redes sociales
              </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información del Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Aquí colocamos los campos para solicitar la información -->
                    <form action="<?php echo URL_PROJECT ?>/home/actualizaredes" method="POST">
                      <div class="form-group">
                        <label for="github">Link de GitHub</label>
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado'] ?>">
                        <input type="text" class="form-control"  name="github" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label for="instagram">Link de Instagram</label>
                        <input type="text" class="form-control"  name="instagram" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label for="facebook">Link de Facebook</label>
                        <input type="text" class="form-control"  name="facebook" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label for="linkedin">Link de LinkedIn</label>
                        <input type="text" class="form-control"  name="linkedin" placeholder="" required>
                      </div>
                      <!-- Agrega más campos aquí si necesitas más información -->
                      <br>
                      <button class="btn btn-primary btn-block" type="submit">Actulizar</button>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        <?php endif ?>
      </div>
      <!-- Publicar -->
      <div class="col-lg-6">
        <!-- Information card -->
        <br>
        <?php if ($datos['perfil']->idPrivilegio != 2): ?>
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Profesion</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php echo $datos['perfil']->profesion ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Salario</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php echo $datos['perfil']->Salary ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Cedula de ID</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php echo $datos['perfil']->cedula; ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Pais Actual</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php echo $datos['perfil']->PaisActual; ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Inicio de estudios</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php echo $datos['perfil']->fi_estudio; ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Fecha graduacion</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php echo $datos['perfil']->f_grado; ?>
                  </p>
                </div>
              </div>
              <hr>
            </div>
          </div>
        <?php endif ?>
        <!-- information card -->
        <!-- Seccion para comentar -->
        <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']): ?>
          <div class="ContainerPublicPerfil">
            <a href="<?php echo URL_PROJECT ?>/perfil/index/<?php echo $datos['usuario']->usuario ?>">
            <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt=""></a>
            <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $datos['usuario']->idusuario ?>"
              method="POST" enctype="multipart/form-data" class="form-publicar ml-2">
              <textarea name="contenido" id="contenido" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
              <div class="upload-photo">
                <label for="imagen" class="btnSubirFoto">
                  <div class="upload-photo">
                    <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                    <span class="btn btn-primary btn-block">Subir foto</span>
                  </div>
                </label>
                <input type="file" name="imagen" class="form-control" id="imagen" aria-describedby="inputGroupFileAddon04"
                  aria-label="Upload" style="display: none">
                <button class="btn btn-primary btn-block">Publicar</button>
              </div>
            </form>
          </div>
        <?php endif ?>
        <!-- Desplege de las publicaciones de propietario del perfil -->
        <?php foreach ($datos['publicacionesMain'] as $datosPublicacion): ?>
          <div class="container-usuarios-publicaciones">
            <div class="usuarios-publicaciones-top">
              <?php if ($datosPublicacion->idusuario == $_SESSION['logueado']): ?>
                <div class=" acciones-publicacion-usuario">
                  <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminar/<?php echo $datosPublicacion->idpublicacion ?>"><i
                  class="far fa-trash-alt float-right"></i></a>
                </div>
              <?php endif ?>
              <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil ?>" alt="" class="image-border">
              <div class="informacion-usuario-publico">
                <h6 class="mb-0"><a
                  href="<?php echo URL_PROJECT ?>/perfil/index/<?php echo $datosPublicacion->usuario ?>"><?php echo ucwords
                  ($datosPublicacion->usuario) ?></a>
                </h6>
                <span>
                  <?php echo $datosPublicacion->fechaPublicacion ?>
                </span>
              </div>
            </div>
            <div class="cotenido-pubicacion-usuario">
              <p class="mb-1">
                <?php echo $datosPublicacion->contenidoPublicacion ?>
              </p>
              <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion ?>" alt="" class="cotenidoPhoto">
            </div>
            <hr>
            <!-- likes -->
            <div class="acciones-usuario-publicar mt-2">
              <a href="<?php echo URL_PROJECT ?>/publicaciones/megusta/<?php echo $datosPublicacion->idpublicacion . '/' . $_SESSION['logueado'] . '/'
                   . $datosPublicacion->idusuario ?>" class="
                    like-button
                    <? foreach ($datos['misLikes'] as $misLikesUser) {
                      if ($misLikesUser->idPublicacion == $datosPublicacion->idpublicacion) {
                        echo 'like-active';
                      }
                    }
                    ?>
                  "><i class="fas fa-heart mr-1"></i>Me gusta <span>
                  <?php echo $datosPublicacion->num_likes ?>
                </span></a>
            </div>
            <hr>
            <!-- Comentarios -->
            <div class="formulario-comentarios">
              <img src="<?php echo URL_PROJECT . '/' . $datos['perfil2']->fotoPerfil ?>" alt="" class='image-border mr-2'>
              <div class="acciones-formulario-comentario">
                <form action="<?php echo URL_PROJECT ?>/publicaciones/comentar" method="POST">
                  <input type="hidden" name="iduserPropietario" value="<?php echo $datosPublicacion->idusuario ?>">
                  <input type="hidden" name="iduser" value="<?php echo $_SESSION['logueado'] ?>">
                  <input type="hidden" name="idpublicacion" value="<?php echo $datosPublicacion->idpublicacion ?>">
                  <input type="text" name="comentario" class='form-comentario-usuario' placeholder="Agregar un comentario">
                  <div class="btn-comentario-container">
                    <button class="btn-purple">Comentar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Comentarios cajones -->
          <button type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModal-<?php echo $datosPublicacion->idpublicacion ?>">
            Ver comentarios!
          </button>
          <?php foreach ($datos['publicacionesMain'] as $datosPublicacion): ?>
            <!-- Modal de la publicación actual -->
            <div class="modal fade" id="exampleModal-<?php echo $datosPublicacion->idpublicacion ?>" tabindex="-1"
              role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comentarios de la Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php foreach ($datos['comentarios'] as $datosComentarios): ?>
                      <?php if ($datosComentarios->idPublicacion == $datosPublicacion->idpublicacion): ?>
                        <div class="contianer-contenido-comentario">
                          <img src="<?php echo URL_PROJECT . '/' . $datosComentarios->fotoPerfil ?>" alt="" class="image-border mr-2">
                          <div class="contenido-comentario-usuario">
                            <?php if ($datosComentarios->idusuario == $_SESSION['logueado']): ?>
                              <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminarComentario/<?php echo $datosComentarios->idcomentario ?>"
                              class="float-right"><i class="far fa-trash-alt"></i></a>
                            <?php endif ?>
                            <a href="<?php echo URL_PROJECT ?>/perfil/index/<?php echo $datosComentarios->usuario ?>"
                            class="big mr-2"><?php echo $datosComentarios->usuario ?></a>
                            <span>
                              <?php echo $datosComentarios->fechaComentario ?>
                            </span>
                            <p>
                              <?php echo $datosComentarios->contenidoComentario ?>
                            </p>
                          </div>
                        </div>
                      <?php endif ?>
                    <?php endforeach ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?> <!-- Fin modal -->
        <?php endforeach ?>
      </div>
    </div>
  </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>