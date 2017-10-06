<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';
include_once '../admin/app/class/PrincipalAnuncios.php';
include_once '../admin/app/repository/RepositorioPrincipalAnuncios.php';
include_once '../admin/app/validator/ValidadorAnuncio.php';

if(isset($_POST['enviar'])) {
    Conexion::abrir_conexion();
    $validador = new ValidadorAnuncio($_POST['titulo'],$_FILES['imagen']['name'],$_FILES['imagen']['tmp_name'],$_FILES['imagen']['type'],$_FILES['imagen']['size'],$_POST['estado']);
    if($validador->registro_valido()){
        $anuncio = new PrincipalAnuncios('',$validador->getTitulo(), $validador->getImagen(), $validador->getEstado());
        
        $anuncio_insertado = RepositorioPrincipalAnuncios::insertar_anuncio(Conexion::obtener_conexion(),$anuncio);
        if ($anuncio_insertado) {
            Redireccion::redirigir("formprincipal_slider.php");
           
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
                            <h2>Crear Anuncio</h2>
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
                                    include_once 'app/anuncio_validado.php';
                                } else {
                                    include_once 'app/anuncio_vacio.php';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
include_once 'inc/sidebar_cierre.php'; 
include_once 'inc/footer_common.php'; 
?>
