<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/repository/RepositorioClinicaInstalaciones.php';


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
                        <h2>Instalaciones</h2>
                    </div>
                    <div class="panel-options">
                        <a href="#">Nuevo</a>&nbsp;&nbsp;
                        <a href="#">Salir</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="content-box-header">
                        <div class="panel-title">Lista de Imagenes</div>
                    </div>
                    <div class="content-box-large box-with-header"> 
                        <?php $instalaciones = RepositorioClinicaInstalaciones::obtener_instalaciones(Conexion::obtener_conexion());?>
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>Imagen</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($instalaciones as $fila){ ?>
                                        <tr>
                                            <td width="10%"><?php echo $fila->getId();?></td>
                                            <td width="60%"><?php echo $fila->getNombre();?></td>
                                            <td class="text-center">
                                            <a class="example-image-link" href="../img/<?php echo $fila->getImagen();?>" data-lightbox="example-1">
                                            <img src="../img/<?php echo $fila->getImagen();?>" width="100%"></a>
                                            </td>
                                            <td width="20%">
                                                <a href="../app/procesardelete.php?id=<?php echo $fila->getId();?>&imagen=<?php echo $fila->getImagen();?>" class="btn btn-warning btn-xs">Eliminar</a>
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
