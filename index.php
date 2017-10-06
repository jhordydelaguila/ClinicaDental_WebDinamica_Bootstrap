<?php
include_once 'app/Conexion.php';
include_once 'app/config.php';
include_once 'admin/app/class/Slider.php';
include_once 'admin/app/repository/RepositorioSlider.php';
include_once 'admin/app/class/Principal.php';
include_once 'admin/app/repository/RepositorioPrincipal.php';
include_once 'admin/app/class/PrincipalAnuncios.php';
include_once 'admin/app/repository/RepositorioPrincipalAnuncios.php';
include_once 'admin/app/class/PrincipalMarco.php';
include_once 'admin/app/repository/RepositorioPrincipalMarco.php';

include_once 'inc/header_common.php';
include_once 'inc/navbar.php';
Conexion::abrir_conexion();
?>
<div class="container">
    <div class="row">
        <div id="idSlider" class="carousel">
            <ol class="carousel-indicators">
                <?php $slider = RepositorioSlider::obtener_slider(Conexion::obtener_conexion()); 
                $a = 0;
                foreach ($slider as $fila) {
                    if ($a === 0) {
                        echo '<li data-target="#idSlider" data-slide-to="0" class="active"></li>';
                    } else {
                        echo '<li data-target="#idSlider" data-slide-to="' . $a . '"></li>';
                    }
                    $a++;
                }
                ?>
            </ol>
            <div class="carousel-inner">
                <?php
                $b = 0; 
                foreach ($slider as $fila) {
                    if ($b === 0) {
                        echo '<div class="item active">';
                    } else {
                        echo '<div class="item">';
                    }
                    echo '<figure>';
                    echo '<img src="img/' . $fila->getImagen() . '" width="100%">';
                    echo '</figure>';
                    echo '</div>';
                    $b++;
                } ?>
            </div>
            
            <a href="#idSlider" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <a href="#idSlider" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>

   <?php $principal = RepositorioPrincipal::obtener_principal(Conexion::obtener_conexion());?>
    <div class="row">
        <div class="jumbotron">
            <h1 class="pacifico"><?php echo $principal->getTitulo(); ?></h1>
            <h2><?php echo $principal->getSubTitulo(); ?></h2>
            <p><?php echo $principal->getContenido(); ?></p>
        </div>
    </div>
</div>

<?php  $principal_sec = RepositorioPrincipalAnuncios::obtener_principal_sec(Conexion::obtener_conexion())?>
<div class="container-fluid fondo-celeste ">
    <div class="container">
        <div class="row">
        <?php foreach ($principal_sec as $fila) {?>
                <div class="col-md-4 inicio">
                <figure>
                <img src="img/<?php echo $fila->getImagen(); ?>" class="img-circle">
                </figure>
                <h3><?php echo $fila->getTitulo(); ?></h3>
                </div>
        <?php } ?>        
        </div>
    </div>
</div>

<?php $principal_marco = RepositorioPrincipalMarco::obtener_principal_marco(Conexion::obtener_conexion()); ?>
<div class="container contenido2">
    <?php 
    $c = 0;
    foreach($principal_marco as $fila) {?>
        <div class="row">
        <?php if($c%2 == 0) {?>
             <div class="col-md-7">
                 <h1 class="titulo-grande"><?php echo $fila->getTitulo(); ?></h1>
                 <p class="p-mediano "><?php echo $fila->getContenido(); ?></p>
             </div>
             <div class="col-md-5">
                 <div class="thumbnail">
                     <figure>
                        <img src="img/<?php echo $fila->getImagen(); ?>">
                     </figure>
                 </div>
             </div>
        <?php } else {?>
             <div class="col-md-5">
                 <div class="thumbnail">
                     <figure>
                        <img src="img/<?php echo $fila->getImagen(); ?>">
                     </figure>
                 </div>
             </div>
             <div class="col-md-7">
                 <h1 class="titulo-grande"><?php echo $fila->getTitulo(); ?></h1>
                 <p class="p-mediano "><?php echo $fila->getContenido(); ?></p>
             </div>
        <?php } ?>
        </div>
    <?php $c++; 
    }?>
</div>

<?php
Conexion::cerrar_conexion();
include_once 'inc/footer.php';
include_once 'inc/footer_common.php';
?>