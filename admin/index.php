<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';

//if (!ControlSession::sesion_iniciada()) {
//    Redireccion::redirigir(RUTA_LOGIN);
//}

include_once '../admin/inc/header_common.php';
include_once '../admin/inc/header.php';
include_once '../admin/inc/sidebar_inicio.php';
?>
	<div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
            	<div class="row">
            		<div class="col-md-12">
	            		<h2>Bienvenido</h2>
		                <p><?php echo $_SESSION['usuario_nombre']; ?></p>
						<hr>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4"></div>
							<div class="col-md-4">
		                    	<div class="panel panel-default">
		                        	<div class="panel-heading">
		                            	<i class="fa fa-bell fa-fw"></i> Panel de Notificaciones
		                        	</div>
		                        <!-- /.panel-heading -->
		                        	<div class="panel-body">
		                            	<div class="list-group">
		                                	<a href="#" class="list-group-item">
		                                    	<i class="fa fa-comment fa-fw"></i> New Comment
		                                    	<span class="pull-right text-muted small"><em>4 minutes ago</em>
		                                    	</span>
		                                	</a>
		                                	<a href="#" class="list-group-item">
			                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
			                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
			                                    </span>
		                                	</a>
		                            	</div>
		                            	<a href="#" class="btn btn-default btn-block">Ver todas las alertas</a>
		                        	</div>
		                        </div>
		                    </div>
						</div>
	            	</div>
            	</div>
            </div>
        </div>
    </div>
<?php
include_once '../admin/inc/sidebar_cierre.php';
include_once '../admin/inc/footer_common.php';
?>
