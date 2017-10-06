<?php

class RepositorioSlider {

    public static function obtener_slider($conexion) {
        $slider = array();

        if (isset($conexion)) {
            try{
                //include_once '../admin/app/class/Slider.php';

                $sql = "SELECT * FROM principal_slider";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $slider[] = new Slider($fila['id'],$fila['titulo'],$fila['imagen'],$fila['estado']);
                    }
                }
                
            }catch(PDOException $ex) {
                print 'Error con el slider: ' . $ex->getMessage();
            }
        }
        return $slider;
    }
    
    public static function insertar_slider($conexion,$slider) {

        $slider_insertado = false;
        
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO principal_slider(titulo,imagen,estado) "
                        . "VALUES(:titulo,:imagen,:estado)";
                $sentencia1 = $conexion->prepare($sql);
                $sentencia1->bindParam(':titulo', $slider->getTitulo(), PDO::PARAM_STR);
                $sentencia1->bindParam(':imagen', $slider->getImagen(), PDO::PARAM_STR);
                $sentencia1->bindParam(':estado', $slider->getEstado(), PDO::PARAM_STR);

                $slider_insertado = $sentencia1->execute();
            } catch (PDOException $ex) {
                echo 'Error:' . $ex->getMessage();
            }
        }
        return $slider_insertado;
    }

    public static function eliminar_slider($conexion,$slider_id,$slider_imagen) {

        $slider_eliminado = false;
        if (isset($conexion)) {
            try {
                $ruta = "../img/";
                $imagen = $slider_imagen;
                $sql = "DELETE FROM principal_slider WHERE id = :idslider";
                
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':idslider',$slider_id,PDO::PARAM_INT);
                $slider_eliminado = $sentencia->execute();
                unlink("../img/".$imagen);  

            } catch (PDOException $ex) {
                print 'Error eliminar: ' . $ex->getMessage();
            }
        }
        return $slider_eliminado;
    }

    public static function obtener_slider_por_id($conexion,$id) {
        
        $slider_encontrado = false;
        if (isset($conexion)) {
            try{
                include_once 'admin/app/class/Slider.php';

                $sql = "SELECT * FROM principal_slider where id = :id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $slider_encontrado = new Slider(
                        $resultado['id'],
                        $resultado['titulo'],
                        $resultado['imagen'],
                        $resultado['estado']);
                }
                
            }catch(PDOException $ex) {
                print 'Error con el slider: ' . $ex->getMessage();
            }
        }
        return $slider_encontrado;
    }

    public static function modificar_slider($conexion,$slider) {
        
        $slider_modificado = false;
        if (isset($conexion)) {
            try{
                include_once 'admin/app/class/Slider.php';

                $sql = "UPDATE principal_slider SET 
                        titulo = :titulo,
                        imagen = :imagen, 
                        estado = :estado
                        WHERE id = :id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':titulo', $slider->getTitulo(), PDO::PARAM_STR);
                $sentencia->bindParam(':imagen', $slider->getImagen(), PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $slider->getEstado(), PDO::PARAM_STR);
                $sentencia->bindParam(':id', $slider->getId(), PDO::PARAM_INT);

                $slider_modificado = $sentencia->execute();
            }catch(PDOException $ex) {
                print 'Error con el slider: ' . $ex->getMessage();
            }
        }
        return $slider_modificado;
    }

}
