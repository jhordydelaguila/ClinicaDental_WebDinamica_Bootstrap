<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';


include_once 'inc/header_common.php'; 
?>
    <?php 
    include_once 'inc/header.php';
    include_once 'inc/sidebar_inicio.php'; 
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                        <div class="panel-title">
                            <h2>Final Pagina</h2>
                        </div>
                        <div class="panel-options">
                            <a href="#">Nuevo</a>&nbsp;&nbsp;
                            <a href="#">Salir</a>
                        </div>
                </div>
                <div class="panel-body">
                    <div class="content-box-header">
                            <div class="panel-title">Actualizar</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <div class="row">
                            <div class="col-md-8">
                                <form role="form">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="100%">Titulo</th>
                                                    <th width="20%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Información</td>
                                                    <td>
                                                        <a href="formfooter_informacion.php" class="btn btn-warning">Editar</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Redes sociales</td>
                                                    <td>
                                                        <a href="formfooter_redes.php" class="btn btn-warning">Editar</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include_once 'inc/sidebar_cierre.php';
    ?>
<?php 
include_once 'inc/footer_common.php'; 
?>
