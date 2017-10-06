<?php 
include_once 'app/Conexion.php';
include_once 'app/config.php';
include_once 'admin/app/class/Tratamiento.php';
include_once 'admin/app/repository/RepositorioTratamiento.php';
include_once 'admin/app/class/TratamientoAnuncio.php';
include_once 'admin/app/repository/RepositorioTratamientoAnuncio.php';

include_once 'inc/header_common.php';
include_once 'inc/navbar.php';
Conexion::abrir_conexion();
?>
<div class="container">
	<div class="row">
		<h1 class="titulo-principal">Tratamientos Dentales</h1>
		<hr>
	</div>
	<?php $tratamientos = RepositorioTratamiento::obtener_tratamiento(Conexion::obtener_conexion()); ?>
	<div class="row contenido1">
		<div class="col-md-9">
			<div class="row">
			<?php $par = 0; $impar = 0;
			foreach($tratamientos as $fila) { ?>
			<?php if ($par%2 == 0) { ?>
					<div class="col-md-5">
                        <div class="thumbnail">
                            <img src="img/<?php echo $fila->getImagen(); ?>">
                            <h3><?php echo $fila->getTitulo(); ?></h3>
                            <p><?php echo $fila->getContenido(); ?></p>
                            <p><a href="#" class="btn btn-default">Ver Mas</a></p>
                        </div>
                    </div>
            <?php } if ($impar%2 !=0) { ?>
					<div class="col-md-5 col-md-offset-2">
                        <div class="thumbnail">
                            <img src="img/<?php echo $fila->getImagen(); ?>">
                            <h3><?php echo $fila->getTitulo(); ?></h3>
                            <p><?php echo $fila->getContenido(); ?></p>
                            <p><a href="#" class="btn btn-default">Ver Mas</a></p>
                        </div>
                    </div>
			<?php }
			$par++; $impar++;
			} ?>
			</div>
		</div>
		<div class="col-md-3">
			<div class="list-group">
				<article>
				<?php foreach ($tratamientos as $fila){ ?>
					<a href="#" class="list-group-item"><?php echo $fila->getTitulo(); ?></a>
				<?php } ?>
				</article>
			</div>	
			<?php $tratamiento_anuncio = RepositorioTratamientoAnuncio::obtener_tratamiento_anuncio(Conexion::obtener_conexion()); ?>
			<?php foreach($tratamiento_anuncio as $filaAnuncio){?>
			<article>
				<h2 class="font-celeste "><?php echo $filaAnuncio->getTitulo(); ?></h2>
				<p><?php echo $filaAnuncio->getContenido(); ?></p>
			</article>
			<?php } ?>
		</div>
	</div>
</div>

<?php
Conexion::cerrar_conexion();
include_once 'inc/footer.php';
include_once 'inc/footer_common.php';
?>