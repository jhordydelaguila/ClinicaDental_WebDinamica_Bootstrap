<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';
include_once '../admin/app/repository/RepositorioSlider.php';
include_once '../admin/app/class/Slider.php';

include_once '../admin/inc/header_common.php'; 
Conexion::abrir_conexion();
include_once '../admin/inc/header.php';
include_once '../admin/inc/sidebar_inicio.php'; 
?>
        <div class="row">
            <div class="col-md-12">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2>Portada</h2>
                        </div>
                        <div class="panel-options">
                            <a href="formprincipal_slider_crear.php">Nuevo</a>&nbsp;&nbsp;
                            <a href="#">Salir</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="content-box-header">
                            <div class="panel-title">Lista de Imagenes.</div>
                        </div>
                        <div class="content-box-large box-with-header"> 
                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <?php $slider = RepositorioSlider::obtener_slider(Conexion::obtener_conexion()); ?>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Titulo</th>
                                            <th>Imagen</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($slider as $fila) { ?>
                                        <tr>
                                            <td><?php echo $fila->getId();?></td>
                                            <td width="50%"><?php echo $fila->getTitulo();?></td>
                                            <td class="text-center"><img src="../img/<?php echo $fila->getImagen();?>" width="100%"></td>
                                            <td width="10%">
                                                <?php 
                                                $estaDisponible = $fila->getEstado() ;
                                                if ($estaDisponible == 1) {
                                                    echo 'Disponible';
                                                }else {
                                                    echo 'No disponible';
                                                }
                                                ?>
                                            </td>
                                            <td width="20%">
                                                <a href="app/procesardelete.php?id=<?php echo $fila->getId();?>&imagen=<?php echo $fila->getImagen();?>" class="btn btn-warning btn-xs">Eliminar</a>

                                                <a data-href="clinica/app/procesardelete.php?id=<?php echo $fila->getId();?>" data-toggle="modal" data-target="#confirm-delete" href="#"></a><br>

                                                <div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
                                                            </div>                                                   
                                                            <div class="modal-body">
                                                                Desea eliminar

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                <a href="#" class="btn btn-danger danger">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
include_once '../admin/inc/sidebar_cierre.php';
include_once '../admin/inc/footer_common.php'; 
?>
