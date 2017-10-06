<?php 
include_once '../admin/app/config.php';
include_once '../admin/app/Conexion.php';
include_once '../admin/app/Redireccion.php';
include_once '../app/RepositorioSlider.php';
	
	if (isset($_GET['id']) and !empty($_GET['id'])) {
		Conexion::abrir_conexion();

		$id = $_GET['id'];
		
		$slider_encontrado = RepositorioSlider::obtener_slider_por_id(Conexion::obtener_conexion(),$id);
		if ($slider_encontrado) {
			Redireccion::redirigir("../admin/formprincipal_slider_modificar.php");
		}

		Conexion::cerrar_conexion();		
	}

?>