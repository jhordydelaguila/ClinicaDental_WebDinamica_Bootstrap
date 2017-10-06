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
                            <h2>Pagina Final</h2> Informacion
                        </div>
                        <div class="panel-options">
                            <a href="formfooter.php">Regresar</a>
                        </div>
                </div>
                <div class="panel-body">
                    <div class="content-box-header">
                            <div class="panel-title">Lista de información</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <div class="row">
                            <div class="col-md-8">
                                <form role="form">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Estado</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <a href="#" class="btn btn-danger">Eliminar</a>
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
    //include_once 'inc/footer.php'; 
    ?>
<?php 
include_once 'inc/footer_common.php'; 
?>
