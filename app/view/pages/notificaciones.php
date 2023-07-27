<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>
<div class="container mt-2">
    <br>
    <br>
    <br>
    <div class="container-notificaciones-usuario">
        <div class="contenido-notificaciones-usuario">
            <h3 class="text-center">Tienes <?php echo $datos['misNotificaciones']?> Notificaciones</h3>
        </div>
        <div class="container-notificaciones-usuario-revisar">
            <?php foreach ($datos['notificaciones'] as $datosNotificaciones):?>
                <a href="<?php echo URL_PROJECT ?>/notificaciones/eliminar/<?php echo $datosNotificaciones->idnotificacion?>" class="link-notification mb-1" style="text-decoration: none;">
                    <div class="alert alert-success">
                        <strong><?php echo $datosNotificaciones->usuario; ?></strong> <?php echo '<span class="texto">' . $datosNotificaciones->mensajeNotificacion . " en la publicación: " . '</span>';?> <strong><?php echo $datosNotificaciones->contenidoPublicacion;?></strong>
                    </div>
                </a>
            <?php endforeach?> 
        </div>
    </div>
</div>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>
