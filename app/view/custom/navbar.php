<header>
<link rel="stylesheet" href="/css/navbar.css">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="#"><img src="https://cdn.icon-icons.com/icons2/3245/PNG/512/facebook_messenger_icon_198194.png" alt="Logo" width=30px height=30px></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"> 
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><span class="big"><i class="fas fa-home mr-1"></i></span>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><span class="big"><i class="fas fa-users mr-1"></i></span>Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <form action="" class="type-form form-inline my-2 my-lg-0">
                            <input type="text" name="buscar" class="form-control" placeholder="Buscar" /> 
                            <button class="btn-form" type="submit">
                                <i class="fa fa-search"></i>
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
                <div class="dropdown">
                    <span class="btn-radio dropdown-toggle" id="actionPerfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
<<<<<<< HEAD
                    <img src="<?php echo URL_PROJECT . '/' . $datosRed['ruta']->rutaImagen ?>" alt="perfil" width="30px" height="30px" /> 

                     
=======
                    <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" alt="perfil" width="30px" height="30px" /> 
>>>>>>> 5c443effa3a5c0476c5d56e7c397578ea7335ca6
                    <?php echo ucwords($_SESSION['usuario']); ?>
                    
                    </span>
                    <div class="dropdown-menu" aria-labelledby="actionPerfil">
                        <!-- <a class="dropdown-item text-dark" href="#">Action</a>
                        <a class="dropdown-item text-dark" href="#">Another action</a> -->
                        <a class="dropdown-item text-dark" href="<?php echo URL_PROJECT?>/home/logout">Salir</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
