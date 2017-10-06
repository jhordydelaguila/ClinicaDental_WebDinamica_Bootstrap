<?php 
include_once 'app/Conexion.php';
include_once 'app/config.php';
include_once 'admin/app/class/ClinicaInicio.php';
include_once 'admin/app/repository/RepositorioClinicaInicio.php';
include_once 'admin/app/class/ClinicaAnuncio.php';
include_once 'admin/app/repository/RepositorioClinicaAnuncio.php';
include_once 'admin/app/class/ClinicaInstalaciones.php';
include_once 'admin/app/repository/RepositorioClinicaInstalaciones.php';

include_once 'inc/header_common.php';
include_once 'inc/navbar.php';
Conexion::abrir_conexion();
?>
<?php $clinica_inicio = RepositorioClinicaInicio::obtener_clinica_inicio(Conexion::obtener_conexion()); ?>
<div class="container">
	<div class="row">
		<figure>
			<img src="img/<?php echo $clinica_inicio->getImagen(); ?>" class="img-responsive" width="100%">
		</figure>	
	</div>
	<div class="row">
		<h1 class="titulo-principal"><strong><?php echo $clinica_inicio->getTitulo(); ?></strong></h1>
		<hr>
	</div>
	<div class="row">
		<div class="col-md-9">
			<p class="lead"><?php echo $clinica_inicio->getContenido(); ?><br></p>
		</div>

		<div class="col-md-3">
			<figure>
				<img src="img/<?php echo $clinica_inicio->getImagenMediana(); ?>" class="img-responsive">
			</figure>
		</div>
	</div>
		
	<div class="row">
		<h1 class="titulo-principal"><strong>Nuestras Instalaciones</strong></h1>
		<hr>
	</div>
	<?php $instalaciones = RepositorioClinicaInstalaciones::obtener_instalaciones(Conexion::obtener_conexion());?>
	<div class="row contenido1">
		<div class="col-md-8">
			<div class="row">
				<?php foreach($instalaciones as $fila){ ?>
				<div class="col-md-4">
					<div class="thumbnail">
						<a class="example-image-link" href="img/<?php echo $fila->getImagen();?>" data-lightbox="example-1">
      					<img class="example-image" src="img/<?php echo $fila->getImagen();?>" alt="image-1" />
      					</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="row">
				<a data-toggle="modal" href="#screen-modal" class="btn btn-default">Ver imagenes</a>
				<div class="modal" id="screen-modal">
					<div class="modal-dialog" style="width:512px !important;margin-top:150px !important">
      					<div class="modal-content">
      						<div id="carousel-screen" class="carousel slide" data-ride="carousel">
      						<?php $contador1=0; ?>
								<!-- Indicators -->
								<ol class="carousel-indicators">
								<?php foreach($instalaciones as $fila) {?>
									<?php if($contador1 == 0){ ?>
									    <li data-target="#carousel-screen" data-slide-to="<?php echo $contador;?>" class="active"></li>
									<?php } else{ ?>
										<li data-target="#carousel-screen" data-slide-to="<?php echo $contador;?>"></li>
									<?php } $contador1++;?>
								 <?php } ?>
								</ol>
								<!-- Wrapper for slides -->
								<?php $contador2=0; ?>
								<div class="carousel-inner" role="listbox">
								<?php  foreach($instalaciones as $fila){?>
									<?php if($contador2 === 0){ ?>
								    <div class="item active">
								      <img src="img/<?php echo $fila->getImagen();?>"/>
									</div>
									<?php } else{ ?>
									<div class="item">
										<img src="img/<?php echo $fila->getImagen();?>"/>	
									</div> 	
									<?php } $contador2++;?>
								<?php } ?>
								</div>
								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-screen" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-screen" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
      				</div>
    			</div>
			</div>

		</div>
		<?php $clinica_anuncio = RepositorioClinicaAnuncio::obtener_clinica_anuncio(Conexion::obtener_conexion()); ?>
		<div class="col-md-3 col-md-offset-1">
		<?php foreach($clinica_anuncio as $fila){?>
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="title"><?php echo $fila->getTitulo(); ?></div>
					</div>
					<div class="panel-body">
				    	<p><?php echo $fila->getContenido(); ?></p>
				 	</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>

<?php
Conexion::cerrar_conexion();
include_once 'inc/footer.php';
include_once 'inc/footer_common.php';
?>