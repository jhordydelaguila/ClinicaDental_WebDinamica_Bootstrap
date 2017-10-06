<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/PrincipalAnuncios.php';
include_once '../admin/app/repository/RepositorioPrincipalAnuncios.php';


include_once 'inc/header_common.php'; 
Conexion::abrir_conexion();
?>
        <?php include_once 'inc/header.php'; ?>
        <?php include_once 'inc/sidebar_inicio.php'; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2>Clinica Anuncios</h2>
                        </div>
                        <div class="panel-options">
                            <a href="formprincipal_anuncios_crear.php">Nuevo</a>&nbsp;&nbsp;
                            <a href="#">Salir</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="content-box-header">
                            <div class="panel-title">Lista</div>
                        </div>
                        <div class="content-box-large box-with-header"> 
                        <?php $principal_anuncios = RepositorioPrincipalAnuncios::obtener_principal_sec(Conexion::obtener_conexion()); ?>
                            <form role="form">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Imagen</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  foreach($principal_anuncios as $fila) { ?>
                                        <tr>
                                            <td width="50%"><?php echo $fila->getTitulo();?></td>
                                            <td><img src="../img/<?php echo $fila->getImagen();?>" width="100%"></td>
                                            <td width="20%">
                                                <?php
                                                    if ($fila->getEstado() == 1){
                                                        echo "Disponible";
                                                    } else {
                                                        echo "No disponible";
                                                    }
                                                ?>
                                            </td>
                                            <td width="20%">
                                                <a href="app/procesodelete_anuncio.php?id=<?php echo $fila->getId();?>&imagen=<?php echo $fila->getImagen();?>" class="btn btn-danger btn-xs">Eliminar</a>
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
    //include_once 'inc/footer.php'; 
    ?>
<?php 
include_once 'inc/footer_common.php'; 
?>
