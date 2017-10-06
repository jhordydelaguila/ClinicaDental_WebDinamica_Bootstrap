<?php

class RepositorioContactoMensaje {

    public static function obtener_contacto_mensaje($conexion) {
        
        $contacto_mensaje = array();
        if (isset($conexion)) {
            try{   
                include_once '../admin/app/class/ContactoMensaje.php';

                $sql = "SELECT * FROM contacto_mensaje";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                         $contacto_mensaje[] = new ContactoMensaje(
                            $fila['id'],
                            $fila['nombre'],
                            $fila['telefono'],
                            $fila['email'],
                            $fila['mensaje'], 
                            $fila['fecha']);
                    }
                }

            }catch(PDOException $ex) {
                print 'Error:'  . $ex->getMessage();
            }
        }
        return $contacto_mensaje;
    }

    public static function insertar_mensaje ($conexion,$mensaje) {
        
        $mensaje_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO contacto_mensaje(nombre,telefono,email,mensaje,fecha) "
                        . "VALUES(:nombre,:telefono,:email,:mensaje,NOW())";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $mensaje->getNombre(), PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $mensaje->getTelefono(), PDO::PARAM_STR);
                $sentencia->bindParam(':email', $mensaje->getEmail(), PDO::PARAM_STR);
                $sentencia->bindParam(':mensaje', $mensaje->getMensaje(), PDO::PARAM_STR);

                $mensaje_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                echo 'Error con la funcion de insertar:' . $ex->getMessage();
            }
        }
        return $mensaje_insertado;
    }

}
