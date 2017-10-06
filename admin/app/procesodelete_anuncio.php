<?php 
include_once '../admin/app/config.php';
include_once '../admin/app/Conexion.php';
include_once '../admin/app/Redireccion.php';
include_once '../app/RepositorioPrincipalAnuncios.php';
	
	if (isset($_GET['id']) and !empty($_GET['id']) 
		and isset($_GET['imagen']) and !empty($_GET['imagen'])) {
		Conexion::abrir_conexion();
		$id = $_GET['id'];
		$imagen = $_GET['imagen'];
		$anuncio_eliminado = RepositorioPrincipalAnuncios::eliminar_anuncio(Conexion::obtener_conexion(),$id,$imagen);
		if ($anuncio_eliminado) {
			//Redireccion::redirigir("../admin/formprincipal_anuncios.php");
		}
		Conexion::cerrar_conexion();
	}else {
		echo "eoror";
	}
?>