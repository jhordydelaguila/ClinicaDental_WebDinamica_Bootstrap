<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';
include_once '../admin/app/class/Slider.php';
include_once '../admin/app/repository/RepositorioSlider.php';
include_once '../admin/app/validator/ValidadorSlider.php';

if(isset($_POST['enviar'])) {
Conexion::abrir_conexion();
    $validador = new ValidadorSlider($_POST['titulo'],$_FILES['imagen']['name'],$_FILES['imagen']['tmp_name'],$_FILES['imagen']['type'],$_FILES['imagen']['size'],$_POST['estado']);
    $slider_insertado = false;
    if($validador->registro_valido()){
        $slider = new Slider('',$validador->getTitulo(), $validador->getImagen(), $validador->getEstado());
        $slider_insertado = RepositorioSlider::insertar_slider(Conexion::obtener_conexion(),$slider);
        if ($slider_insertado) {
            Redireccion::redirigir("formprincipal_slider.php");
        }
    }
Conexion::cerrar_conexion();
}

 
include_once '../admin/inc/header_common.php'; 
include_once '../admin/inc/header.php';
include_once '../admin/inc/sidebar_inicio.php'; 
?>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2>Crear Portada</h2>
                        </div>
                        <div class="panel-options">
                            <a href="formprincipal_slider.php">Regresar</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="content-box-header">
                            <div class="panel-title">Nuevo</div>
                        </div>
                        <div class="content-box-large box-with-header"> 
                            <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <?php 
                                if (isset($_POST['enviar'])) {
                                    include_once 'app/slider_validado.php';
                                } else {
                                    include_once 'app/slider_vacio.php';
                                }?>
                            </form>
                        </div>
                        <?php if (isset($_POST['enviar'])) {if($slider_insertado){ ?>
                            <div class="alert alert-success alert-dismissable fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Exito! Se ha creado correctamente la portada.
                            </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
<?php 
include_once '../admin/inc/sidebar_cierre.php'; 
include_once '../admin/inc/footer_common.php'; 
?>
