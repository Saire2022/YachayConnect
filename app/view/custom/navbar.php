<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light text-white">
            <a class="navbar-brand" href="#"><img src="https://cdn.freeblesupply.com/logos/large/2x/facebook-messenger-Iogo-black-and-white.png" alt="Logo"
            class="image-logo"></a>
            <button class="navbar-toggler" type="button" data-topgle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"> 
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><span class="big"><i class="fas fa-home mr-1"></i></span>Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#"><span class="big"><i class="fas fa-home mr-1"></i></span>Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <form action="" class="tipe-form form-inline my-2 my-lg-0">
                        <input type="text" name="buscar" class="form-style" placeholder="Buscar" /> 
                        <button class="btn-form" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        </form>
                    </li>
                </ul>
                <div class="links">
                    <a href=""><span class="big"><i class="fa fa-envelope"></i></span><span class="mb-0 ml-1">Mensajes</div></span></a>
                </div>
                <div class="links">
                    <a href=""><span class="big"><i class="fa fa-bell"></i></span><span class="mb-0 ml-1">Notificaciones</div></span></a>
                </div>
                <div class="dropdown">

                    <span class="btn-radio dropdown-toggle" id="actionPerfil" data-toggle="dropdown" aria-faspopup="true" aria-expanded="false"> 
                        <img src="https://e.radio-lazona.io/large/2017/12/07/523752_533515.png" alt="perfil" class="ing-perfil" />
                        <?php echo ucwords ($_SESSION[ 'usuario']); ?>

                    </span>

                    <div class="dropdown-menu" aria-labelledby="actionPerfil">

                    <a class="dropdown-item text-dark" href="#">Action</a>

                    <a class="dropdown-item text-dark" href="#">Another action</a>

                    <a class="dropdown-item text-dark" href="<?php echo URL PROJECT?>/home/logout">Salir</>

                    </div>

                </div>

            </div>

        </nav>

    </div>

</header>

