<header>
    <nav class="navbar navbar-expand-lg bg-primary navbar-light fixed-top">
        <div class="container-fluid">

                <!-- Toggle button -->
                <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <i class="fas fa-bars"></i>
                </button>
            <a class="navbar-brand" href="<?php echo URL_PROJECT?>/home"><img src="<?php echo URL_PROJECT ?>/img/YT-logo.png" alt="Logo" width="30px" height="30px" class="d-inline-block align-text-top"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo URL_PROJECT?>/home"><span class="big"><i class="fas fa-home mr-1"></i></span>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><span class="big"><i class="fas fa-users mr-1"></i></span><span class="mb-0 ml-1">Usuarios</span></a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light" type="submit"><i class="fas fa-search mr-1"></i></button>
                </form>
                <div class="navbar-nav ml-auto">
                    <a class="nav-link text-white" href="#"><span class="big"><i class="fa fa-envelope"></i></span><span class="mb-0 ml-1">Mensajes</span></a>
                    <a  class="nav-link text-white" href="<?php echo URL_PROJECT?>/notificaciones">
                        <span class="big"><i class="fa fa-bell"></i></span>
                        <?php if ($datos['misNotificaciones']>0):?>
                            <span class="mb-0 ml-1 badge rounded-pill badge-notification bg-danger">
                                <?php echo $datos['misNotificaciones']?>                                
                            </span>
                        <?php endif?>
                    </a>
                        <div class="dropdown">
                            <a class="btn-radio dropdown-toggle text-white" id="actionPerfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <img class="profile-image" src="<?php echo URL_PROJECT . '/' . $datos['perfil2']->fotoPerfil ?>" alt="perfil">
                                <?php echo ucwords($_SESSION['usuario']); ?>
                                
                                
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionPerfil" style="font-family: Arial, sans-serif;">
                                <a class="dropdown-item text-dark" href="<?php echo URL_PROJECT?>/home/logout">Salir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


</header>