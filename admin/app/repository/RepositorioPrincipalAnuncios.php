<?php

class RepositorioPrincipalAnuncios {

    public static function obtener_principal_sec($conexion) {
        
        $principal_sec = array();

        if (isset($conexion)) {
            try{
                //include_once 'admin/app/class/PrincipalAnuncios.php';

                $sql = "SELECT * FROM  principal_anuncios";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $principal_sec[] = new PrincipalAnuncios($fila['id'],$fila['titulo'],$fila['imagen'],$fila['estado']);
                    }
                }

            }catch(PDOException $ex){
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $principal_sec;
    }

    public static function insertar_anuncio($conexion,$anuncio) {

        $anuncio_insertado = false;
        
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO principal_anuncios(titulo,imagen,estado) "
                        . "VALUES(:titulo,:imagen,:estado)";
                $sentencia1 = $conexion->prepare($sql);
                $sentencia1->bindParam(':titulo', $anuncio->getTitulo(), PDO::PARAM_STR);
                $sentencia1->bindParam(':imagen', $anuncio->getImagen(), PDO::PARAM_STR);
                $sentencia1->bindParam(':estado', $anuncio->getEstado(), PDO::PARAM_STR);
                $anuncio_insertado = $sentencia1->execute();
                
            } catch (PDOException $ex) {
                echo 'Error:' . $ex->getMessage();
            }
        }
        return $anuncio_insertado;
    }
    
    public static function eliminar_anuncio($conexion,$anuncio_id,$anuncio_imagen) {

        $anuncio_eliminado = false;
        if (isset($conexion)) {
            try {
                $ruta = "img/";
                $imagen = $anuncio_imagen;
                $sql = "DELETE FROM principal_anuncios WHERE id = :idslider";
                
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':idslider',$anuncio_id,PDO::PARAM_INT);
                $anuncio_eliminado = $sentencia->execute();
                unlink($ruta.$imagen);  

            } catch (PDOException $ex) {
                print 'Error eliminar: ' . $ex->getMessage();
            }
        }
        return $anuncio_eliminado;
    }
}