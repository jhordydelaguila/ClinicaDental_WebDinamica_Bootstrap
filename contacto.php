<?php
include_once 'app/Conexion.php';
include_once 'app/config.php';
include_once 'admin/app/class/ContactoInfo.php';
include_once 'admin/app/repository/RepositorioContactoInfo.php';
include_once 'admin/app/validator/ValidadorMensaje.php';
include_once 'admin/app/class/ContactoMensaje.php';
include_once 'admin/app/repository/RepositorioContactoMensaje.php';

function enviarEmail( $email, $usuario_name,$mensaje){
        $email_admin = "jhordydelaguilaquispe@gmail";
        $mensaje_plantilla = '<html>
        <head>
        <title></title>
        </head>
        <body>
        <p>Buen Dia!. Sr(a): '.$usuario_name.'</p>
        <p>Hemos recibido satisfactoriamente tu mensaje, en instantes seras<br>
        comunicado por nuestro representante, para atender tu consulta.
        <p/>
        
        <h3>Gracias!<h3>
        <h4>Atentamente: Clinica Sonrisas SA</h4>
     	</body>
    	</html>';

    	$mensaje_plantilla2 = '<html>
        <head>
        <title></title>
        </head>
        <body>
        <p>Buen Dia!</p>
        <p>El cliente:'.$usuario_name.' le a enviado el siguiente mensaje:</p>
        <hr>
        <p>'.$mensaje.'</p>
     	</body>
    	</html>';
 
	    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
	    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    $cabeceras .= 'From: Clinica Sonrisas Sof <info@clinicasonrisas.pe.hu>' . "\r\n";
	    // Se envia el correo al usuario
	    
	    mail($email, "Clinica Sonrisas", $mensaje_plantilla, $cabeceras);
	    mail($email_admin, "Nuevo Contacto", $mensaje_plantilla2, $cabeceras);

	    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" >
        <meta http-equiv="Content-Language" content="es"/>
        <meta charset="UTF-8">
        <meta name="description" content="Clinica dental sonrisas, para cuidar tu sonrisa">
		<meta name="keywords" content="Clinica dental, sonrisas, facilidad de pago, tratamientos dentales">
		<meta name="author" content="Del aguila Quispe jhordy">
        <meta name="distribution" content="global"/> 
        <title>Contacto</title>
        <link rel="shortcut icon" href="img/icon/2icon.png">
        <link rel="stylesheet"  href="css/bootstrap.min.css">
        <link rel="stylesheet"  href="css/lightbox.min.css">
        <link rel="stylesheet"  href="css/estilos.css">
        
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    </head>
    <body>
<?php
include_once 'inc/navbar.php';
Conexion::abrir_conexion();
if (isset($_POST['enviar'])) {
	$mensaje_insertado = false;
    $validador_mensaje = new ValidadorMensaje($_POST['nombre'], $_POST['telefono'], $_POST['email'], $_POST['mensaje'], $_POST['captcha']);
    if ($validador_mensaje->registro_valido()) {
        $mensaje = new ContactoMensaje('', $validador_mensaje->getNombre(), $validador_mensaje->getTelefono(), $validador_mensaje->getEmail(),$validador_mensaje->getMensaje(),'');
        
        $mensaje_insertado = RepositorioContactoMensaje::insertar_mensaje(Conexion::obtener_conexion(),$mensaje);

        enviarEmail($_POST['email'], $_POST['nombre'], $_POST['mensaje']);
    }
    
}
?>

<div class="container">
	<div class="row">
		<div id="googleMap" style="width:100%px;height:400px;"></div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<h2 class="font-celeste "><strong>Tienes alguna duda</strong></h2>
			<hr>
			<p>Enviamos un mensaje, rellene el formulario de abajo.</p>
			<div class="panel panel-default">
				<div class="panel-body">
					<form role="form" id="form-control" method="post">
					<?php 
						if (isset($_POST['enviar'])) {
							include_once 'admin/app/mensaje_validado.php';
						} else {
							include_once 'admin/app/mensaje_vacio.php';
						}
					?>
					<?php if (isset($_POST['enviar']) && $mensaje_insertado) {?>
					<div class="alert alert-success">
						<strong>Exito!</strong> El mensaje ha sido enviado, Gracias por su mensaje.
					</div>
					<?php } ?>
					</form>
				</div>
			</div>
		</div>
		<?php $contacto_info = RepositorioContactoInfo::obtener_contacto_info(Conexion::obtener_conexion()); ?>
		<div class="col-md-5 col-md-offset-1">
			<section>
				<h2 class="font-celeste"><strong>Contacto</strong></h2>
				<hr>
				<p><?php echo $contacto_info->getComentario(); ?></p>
				<p><b>Consultorio</b></p>
				<p><span class="glyphicon glyphicon-map-marker"></span>
				<?php echo $contacto_info->getLugar(); ?>
				</p>
				<p><b>Telefono</b></p>
				<p><span class="glyphicon glyphicon-phone"></span>
				<?php echo $contacto_info->getTelefono(); ?>
				</p> 
				<p><b>Correo</b></p> 
				<p><span class="glyphicon glyphicon-envelope"></span>
				<?php echo $contacto_info->getEmail(); ?>
				</p> 
				<p><b>Horario</b></p>
				<p><span class="glyphicon glyphicon-calendar"></span>
				<?php echo $contacto_info->getHorario(); ?>
				<hr>
				<div class="well">
					<p><?php echo $contacto_info->getMensaje(); ?></p>
				</div>
			</section>
		</div>
	</div>
</div>

<script>
			var myCenter=new google.maps.LatLng(-8.2213011,-78.97641469999996);

			function initialize()
			{
			var mapProp = {
			  center: myCenter,
			  zoom:15,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			  };

			var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var marker = new google.maps.Marker({
			  position: myCenter,
			  title:'Click to zoom'
			  });

			marker.setMap(map);
			google.maps.event.addListener(marker,'click',function() {
			  map.setZoom(9);
			  map.setCenter(marker.getPosition());
			  });
			}
			google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php
Conexion::cerrar_conexion();
include_once 'inc/footer.php';
include_once 'inc/footer_common.php';
?>
