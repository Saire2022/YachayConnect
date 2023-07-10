<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';

?>

<div class="container mt-2">
    <br>
    <br>
    <br>
    
    <div class="container-notificaciones-usuario">
        <?php if ($datos['misNotificaciones']<0):?>
            <h3 class="text-center">No tienes notificaciones</h3>
            <?php else:?>
                <div class="contenido-notificaciones-usuario">
                    <h3 class="text-center">Tienes <?php echo $datos['misNotificaciones']?> Notificaciones</h3>
                </div>
                <div class="container-notificaciones-usuario-revisar">
                    <?php foreach ($datos['notificaciones'] as $datosNotificaciones):?>
                        <a href="<?php echo URL_PROJECT ?>/notificaciones/eliminar/<?php echo $datosNotificaciones->idnotificacion?>" class="link-notification mb-1">
                        <div class="alert alert-success"><?php echo $datosNotificaciones->usuario . ' ' . $datosNotificaciones->mensajeNotificacion . ' ' . $datosNotificaciones->contenidoPublicacion?></div>
                        </a>
                    <?php endforeach?> 
                </div>
        <?php endif?>
        <!-- <?php var_dump($datos['notificaciones']); ?> -->
    </div>
</div>



<?php
include_once URL_APP . '/view/custom/footer.php';
?>
