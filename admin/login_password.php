<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';
include_once '../admin/app/repository/RepositorioUsuario.php';
include_once '../admin/app/validator/ValidadorLogin.php';

if (ControlSession::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_ADMIN);
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
                                <h4 class="">
                                  ¿Olvido su contraseña?
                                </h4>
                                <form id="frmRestablecer" role="form" method="post" action="validaremail.php" >
                                    <span class="help-block">
                                    Ingrese su dirección de correo electrónico para poder enviarle su nueva contraseña.
                                    </span>
                                    <input class="form-control" type="email" placeholder="Correo electronico" id="email" name="email" required>
                                    <div class="action">
                                        <button type="submit" name="login" class="btn btn-primary signup">ENVIAR</button>
                                        <a href="login.php" name="Borrar" class="btn btn-link signup">REGRESAR</a>
                                    </div>
                                </form>
                                <div id="mensaje">
                                    <script>
                                      $(document).ready(function(){
                                        $("#frmRestablecer").submit(function(event){
                                          event.preventDefault();
                                          $.ajax({
                                            url:'validaremail.php',
                                            type:'post',
                                            dataType:'json',
                                            data:$("#frmRestablecer").serializeArray()
                                          }).done(function(respuesta){
                                            $("#mensaje").html(respuesta.mensaje);
                                            $("#email").val('');
                                          });
                                        });
                                      });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
<?php include_once 'inc/footer_common.php'; ?>
