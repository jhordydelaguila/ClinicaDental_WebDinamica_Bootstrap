<?php
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$idusuario = $_POST['idusuario'];
$token = $_POST['token'];
 
if( $password1 != "" && $password2 != "" && $idusuario != "" && $token != "" ){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Restablecer contraseña </title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" role="main">
      <div class="col-md-2"></div>
      <div class="col-md-8">
<?php
Conexion::abrir_conexion();
$cConexion = Conexion::obtener_conexion();
  //$conexion = new mysqli('localhost', 'root', '', 'ejemplobd');
   $sql = " SELECT * FROM resetpass WHERE token = '$token' ";
   $resultado = $cConexion->query($sql);
  
  if( $resultado->num_rows > 0 ){
      $usuario = $resultado->fetch_assoc();
      if( sha1( $usuario['idusuario'] === $idusuario ) ){
        if( $password1 === $password2 ){
            $sql = "UPDATE usuario SET UsuarioClave = '".sha1($password1)."' WHERE id = ".$usuario['idusuario'];
            $resultado = $cConexion->query($sql);
            if($resultado){
              $sql = "DELETE FROM resetepass WHERE token = '$token';";
              $resultado = $cConexion->query( $sql );
              ?>
               <p class="alert alert-info"> La contraseña se actualizó con exito. </p>
              <?php
            }
            else{
            ?>
              <p class="alert alert-danger"> Ocurrió un error al actualizar la contraseña, intentalo más tarde </p>
            <?php
            }
         }
        else{
        ?>
           <p class="alert alert-danger"> Las contraseñas no coinciden </p>
        <?php
        }
      }
      else{
      ?>
        <p class="alert alert-danger"> El token no es válido </p>
      <?php
      }
  }
  else{
  ?>
  <p class="alert alert-danger"> El token no es válido </p>
  <?php
  }
  ?>
</div>
<div class="col-md-2"></div>
</div> <!-- /container -->
<script src="js/jquery-1.12.3.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
else{
   header('Location:index.php');
}
?>