<?php 

//include_once '../app/config.php';
//include_once '../app/Conexion.php';
function generarLinkTemporal($idusuario, $username){

  //Conexion::abrir_conexion();
  //$cConexion = Conexion::obtener_conexion();

   // Se genera una cadena para validar el cambio de contraseña
   $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);
 
  $conexion = new mysqli('localhost', 'root', 'delaguila', 'clinica1');

   // Se inserta el registro en la tabla tblreseteopass
   $sql = "INSERT INTO resetpass (idusuario, usuario, token, fecha)
            VALUES($idusuario,'$username','$token',NOW());";
   $resultado = $conexion->query($sql);
   
   if($resultado){
      // Se devuelve el link que se enviara al usuario
      $enlace = $_SERVER["SERVER_NAME"].'/admin/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
      return $enlace;
   }
   else
      return false;
}
 
function enviarEmail( $email, $link, $usuario_name){
   $mensaje = '<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
        <p>Buen Dia!. Sr(a): '.$usuario_name.'<p>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="'.$link.'"> Restablecer contraseña </a>
       </p>
     </body>
    </html>';
 
  $cabeceras = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $cabeceras .= 'From: Clinica Sonrisas Sof <info@clinicasonrisas.pe.hu>' . "\r\n";
   // Se envia el correo al usuario
  if ($email != ""){
    mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
  }
  

}

$email = $_POST['email'];
$respuesta = new stdClass();
 
if( $email != "" ){
  //Conexion::abrir_conexion();
  //$cConexion = Conexion::obtener_conexion();
  $conexion = new mysqli('localhost', 'root', 'delaguila', 'clinica1');
  $sql1 = "SELECT * FROM persona p INNER JOIN usuario u on u.PersonaCodigo= p.PersonaCodigo where p.PersonaEmail = '$email'";
   
   $sql = " SELECT * FROM usuario WHERE email = '$email' ";
   $resultado = $conexion->query($sql1);

   if($resultado->num_rows > 0){
      $usuario = $resultado->fetch_assoc();
      $usuario_name = $usuario['PersonaNombre'];
      $linkTemporal = generarLinkTemporal( $usuario['PersonaCodigo'], $usuario['UsuarioCodigo'] );
      if($linkTemporal){
        enviarEmail( $email, $linkTemporal,$usuario_name);

        include_once 'login_plantilla1.php';
      ?>
        <br>
        <div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña</div>'
      <?php
        include_once 'login_plantilla2.php';
      }
   }
   else {
    include_once 'login_plantilla1.php';
    ?>
      <br>
      <div class="alert alert-warning"> No existe una cuenta asociada al correo ingresado. </div>
    <?php
    include_once 'login_plantilla2.php';

   }
}
else {
  include_once 'login_plantilla1.php';
  ?>
  <br>
    <div class="alert alert-warning"> Debes introducir el email de la cuenta </div>
  <?php
       include_once 'login_plantilla2.php';
}
