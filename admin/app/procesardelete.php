<?php 
include_once '../../app/config.php';
include_once '../../app/Conexion.php';
include_once '../../admin/app/repository/RepositorioSlider.php';
include_once '../../admin/app/class/Redireccion.php';
	
	if (isset($_GET['id']) and !empty($_GET['id']) 
		and isset($_GET['imagen']) and !empty($_GET['imagen'])) {
		Conexion::abrir_conexion();

		$id = $_GET['id'];
		$imagen = $_GET['imagen'];
		$slider_eliminado = RepositorioSlider::eliminar_slider(Conexion::obtener_conexion(),$id,$imagen);
		if ($slider_eliminado) {
			Redireccion::redirigir("../../admin/formprincipal_slider.php");
		}
	}
?>