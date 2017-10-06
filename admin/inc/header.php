<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="#">Administrador</a></h1>
                </div>
            </div>
            <div class="col-md-7">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <?php //if (ControlSession::sesion_iniciada()) { ?>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <?php //echo $_SESSION['usuario']; ?><b class="caret"></b>
                                    </a>
                                    <?php
                                //} else {
                                //    Redireccion::redirigir($url);
                                //}
                                ?>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="#">Mi Perfil</a></li>
                                    <li><a href="<?php echo RUTA_LOGOUT; ?>">Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
