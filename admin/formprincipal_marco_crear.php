<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';
include_once '../admin/app/class/PrincipalMarco.php';
include_once '../admin/app/repository/RepositorioPrincipalMarco.php';
include_once '../admin/app/validator/ValidadorMarco.php';


if(isset($_POST['enviar'])) {
    Conexion::abrir_conexion();
    $validador = new ValidadorMarco($_POST['titulo'],$_FILES['imagen']['name'],$_FILES['imagen']['tmp_name'],$_FILES['imagen']['type'],$_FILES['imagen']['size'],$_POST['contenido'],$_POST['estado']);
    if($validador->registro_valido()){
        $marco = new PrincipalMarco('',$validador->getTitulo(), $validador->getImagen(), $validador->getMarco(),$validador->getEstado());
        
        $marco_insertado = RepositorioPrincipalMarco::insertar_marco(Conexion::obtener_conexion(),$marco);
        if ($marco_insertado) {
            Redireccion::redirigir("formprincipal_marco.php");
           
        }
    }
    Conexion::cerrar_conexion();
}

?>

<?php 
include_once 'inc/header_common.php'; 
?>
        <?php include_once 'inc/header.php'; ?>
        <?php include_once 'inc/sidebar_inicio.php'; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2>Crear Portada</h2>
                        </div>
                        <div class="panel-options">
                            <a href="formprincipal_marco.php">Regresar</a>
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
                                    include_once 'app/marco_validado.php';
                                } else {
                                    include_once 'app/marco_vacio.php';
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
include_once 'inc/sidebar_cierre.php'; 
include_once 'inc/footer_common.php'; 
?>
