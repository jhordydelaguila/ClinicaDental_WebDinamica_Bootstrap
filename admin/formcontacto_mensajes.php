<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/ContactoMensaje.php';
include_once '../admin/app/repository/RepositorioContactoMensaje.php';

include_once 'inc/header_common.php'; 
include_once 'inc/header.php'; 
include_once 'inc/sidebar_inicio.php'; 
Conexion::abrir_conexion();
?>
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h2>Contacto</h2>
                    </div>
                    <div class="panel-options">
                        <a href="#">Salir</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="content-box-header">
                        <div class="panel-title">Mensajes</div>
                    </div>
                    <div class="content-box-large box-with-header"> 
                    <?php $mensajes = RepositorioContactoMensaje::obtener_contacto_mensaje(Conexion::obtener_conexion());?>
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th>Mensaje</th>
                                            <th>Fecha</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($mensajes as $fila){ ?>
                                        <tr>
                                            <td><?php echo $fila->getNombre();?></td>
                                            <td><?php echo $fila->getTelefono();?></td>
                                            <td><?php echo $fila->getEmail();?></td>
                                            <td><?php echo $fila->getMensaje();?></td>
                                            <td><?php echo $fila->getFecha();?></td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-xs">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
Conexion::cerrar_conexion();
include_once 'inc/sidebar_cierre.php';
include_once 'inc/footer_common.php'; 
?>
