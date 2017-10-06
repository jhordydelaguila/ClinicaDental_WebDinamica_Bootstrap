<?php
//include_once '../app/config.php';
//include_once '../app/Conexion.php';

$token = $_GET['token'];
$idusuario = $_GET['idusuario'];
 
//Conexion::abrir_conexion();
//$cConexion = Conexion::obtener_conexion();

$conexion = new mysqli('localhost', 'root', 'delaguila', 'clinica1');
 
$sql = "SELECT * FROM resetpass WHERE token = '$token'";
$resultado = $conexion->query($sql);
 
if( $resultado->num_rows > 0 ){
  $usuario = $resultado->fetch_assoc();
  if( sha1($usuario['idusuario']) == $idusuario ){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Restablecer contraseña </title>
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
                                  Restaurar contraseña
                                </h4>
                                <form action="cambiarpassword.php" method="post" role="form">

                                        <input type="password" class="form-control" name="password1" required class="form-control" placeholder="Nueva contraseña">

                                        <input type="password" class="form-control" name="password2" required placeholder="Confirmar contraseña">

                                       <input type="hidden" name="token" value="<?php echo $token ?>">
                                       <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">

                                       <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Recuperar contraseña" >
                                       </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
<?php include_once 'inc/footer_common.php'; ?>

<?php
   }
   else{
     header('Location:index.php');
   }
 }
 else{
     header('Location:index.php');
 }
?>