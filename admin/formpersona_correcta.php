<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/repository/RepositorioPersona.php';
include_once '../admin/app/repository/RepositorioUsuario.php';
include_once '../admin/app/class/Redireccion.php';
include_once '../admin/app/class/ControlSesion.php';

if (isset($_GET['nombre']) && !empty($_GET['nombre']) &&
        isset($_GET['usuario']) && !empty($_GET['usuario'])) {
    $nombre = $_GET['nombre'];
    $usuario = $_GET['usuario'];
} else {
    Redireccion::redirigir(SERVIDOR);
}
?>

<?php 
    include_once 'inc/header_common.php'; 
?>

        <?php include_once 'inc/header.php'; ?>
        <?php include_once 'inc/sidebar_inicio.php'; ?>
        <div class="row">
            <div class="col-md-9">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">REGISTRO CORRECTO
                            <hr>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>Usuario registrado correctamente.<p>
                        <p>Su nombre es <strong><?php echo $nombre; ?></strong> con el usuario: <strong><?php echo $usuario; ?></strong></p>
                        <p>
                            <a href="<?php echo RUTA_ADMIN ?>">Inicio</a>&nbsp; ó &nbsp;
                            <a href="<?php echo RUTA_FORMPERSONA ?>">Registrar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <?php include_once 'inc/sidebar_cierre.php'; ?>
<?php 
    include_once 'inc/footer_common.php'; 
?>
