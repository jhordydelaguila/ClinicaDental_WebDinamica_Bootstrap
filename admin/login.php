<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/repository/RepositorioUsuario.php';
include_once '../admin/app/validator/ValidadorLogin.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';

if (ControlSession::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_ADMIN);
}

if (isset($_POST['login'])) {
    Conexion::abrir_conexion();
    $validador = new ValidadorLogin($_POST['usuario'], $_POST['clave'], Conexion::obtener_conexion());

    if ($validador->getError() === '' && !is_null($validador->getUsuario())) {
        ControlSession::iniciar_sesion(
                $validador->getUsuario()->getCodigo_persona(), $validador->getUsuario()->getUsuario(), $validador->getPersona()->getNombre().' '.$validador->getPersona()->getApellido());
        Redireccion::redirigir(RUTA_ADMIN);
    }

    Conexion::cerrar_conexion();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Administrador</title>   
        <link rel="stylesheet" href="../css/bootstrap.min.css" >
        <link rel="stylesheet" href="../admin/css/styles.css">
    </head>
    <body class="login-bg">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Logo -->
                        <div class="logo">
                            <h1><a href="<?php echo RUTA_LOGIN ?>">Administrador</a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-wrapper">
                        <div class="box">
                            <div class="content-wrap">
                                <h1>Clinca dental Sonrisas</h1>
                                <hr>
                                <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                    <input class="form-control" type="text" placeholder="Usuario" name="usuario" 
                                    <?php
                                    if (isset($_POST['login']) && isset($_POST['usuario']) && !empty($_POST['usuario'])) {
                                        echo 'value="' . $_POST['usuario'] . '"';
                                    }
                                    ?>>
                                    <input class="form-control" type="password" placeholder="Password" name="clave" >
                                    <?php
                                    if (isset($_POST['login'])) {
                                        $validador->mostrar_error();
                                    }
                                    ?>
                                    <div class="action">
                                        <button type="submit" name="login" class="btn btn-primary signup">INGRESAR</button>
                                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" name="Borrar" class="btn btn-link signup">CANCELAR</a>
                                    </div>
                                    <br><br>
                                    <div>
                                        <a href="login_password.php">¿Olvidó su contraseña?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include_once 'inc/footer_common.php'; ?>
