<?php
include_once 'app/config.php';
include_once 'app/Conexion.php';
include_once 'app/ControlSesion.php';
include_once 'app/Redireccion.php';

?>

<?php 
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
                            <h2>Titulo</h2>
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
                            <div class="col-md-7">
                                    <form role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">SubTitulo</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Contenido</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                            <div class="col-md-offset-1 col-md-4">
                                <div class="form-group" >
                                    <button type="submit" class="btn btn-warning">Modificar</button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Limpiar</button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include_once 'inc/sidebar_cierre.php';
    include_once 'inc/footer.php'; 
    ?>
<?php 
include_once 'inc/footer_common.php'; 
?>
