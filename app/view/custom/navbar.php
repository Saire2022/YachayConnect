<header>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../public/css/navbar.css">
    <nav class="navbar navbar-expand-lg bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../img/YT-logo.png" alt="Logo" width=30px height=30px class="d-inline-block align-text-top"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><span class="big"><i class="fas fa-home mr-1"></i></span>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><span class="big"><i class="fas fa-users mr-1"></i><span class="mb-0 ml-1">Usuarios</span></a>
                    </li>
                    <li class="nav-item ">
                        <form action="" class="type-form form-inline my-2 my-lg-0 ">
                            <input type="text" name="buscar" class="form-control" placeholder="Buscar" /> 
                            <button class="btn-form" type="submit">
                                <i class="fas fa-search mr-1"></i>
                            </button>
                        </form>
                    </li>
                </ul>
                <div class="links">
                    <a href="#" class="text-white"><span class="big"><i class="fa fa-envelope"></i></span><span class="mb-0 ml-1">Mensajes</span></a>
                </div>
                <div class="links">
                    <a href="#" class="text-white"><span class="big"><i class="fa fa-bell"></i></span><span class="mb-0 ml-1">Notificaciones</span></a>
                </div>

                <div class="dropdown ml-auto">
                    <span class="btn-radio dropdown-toggle" id="actionPerfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <img class="profile-image" src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" alt="perfil">
                        <?php echo ucwords($_SESSION['usuario']); ?>
                    </span>
                    <div class="dropdown-menu" aria-labelledby="actionPerfil" style="font-family: Arial, sans-serif;">
                    
                    <a class="dropdown-item text-dark" href="<?php echo URL_PROJECT?>/home/logout">Salir</a>
                </div>
                </div>
            </div>
        </div>
    </nav>
</header>
