<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Principal.php';
include_once '../admin/app/repository/RepositorioPrincipal.php';

Conexion::abrir_conexion();
$boton_estado = false;
if (isset($_POST['modificar'])){
    $boton_estado= true;
}

if (isset($_POST['guardar'])) {
    $principalClass = new Principal('1',$_POST['titulo'],$_POST['subtitulo'],$_POST['contenido']);
    $principal_actualizado = RepositorioPrincipal::actualizar_principal(Conexion::obtener_conexion(),$principalClass);   
}

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
                        <h2>Clinica</h2>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="content-box-header">
                        <div class="panel-title">Actualizar Titulo Principal</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <div class="row">
                        <?php $principal = RepositorioPrincipal::obtener_principal(Conexion::obtener_conexion())?>
                            <form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <?php 
                                if(isset($_POST['modificar'])){
                                    include_once 'app/inicio_unlock.php';
                                } else {
                                    include_once 'app/inicio_lock.php';
                                }
                                ?>
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                <?php if (!$boton_estado) {?>
                                    <div class="form-group" >
                                        <button type="submit" class="btn btn-warning  btn-block" name="modificar">Modificar</button>
                                    </div>
                                <?php } else{?>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary  btn-block" name="guardar">Guardar</button>
                                    </div>
                                    <div class="form-group">
                                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="btn btn-danger  btn-block" name="limpiar">Regresar</a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="col-md-1"></div>
                            </form>
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
Conexion::cerrar_conexion();
include_once 'inc/footer_common.php'; 
?>
