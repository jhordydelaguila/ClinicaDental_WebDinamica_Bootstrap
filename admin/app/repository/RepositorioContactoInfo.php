<?php

class RepositorioContactoInfo {

    public static function obtener_contacto_info($conexion) {
        
        $contacto_info = null;
        if (isset($conexion)) {
            try{   

                include_once 'admin/app/class/ContactoInfo.php';

                $sql = "SELECT * FROM contactoinfo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $contacto_info = new ContactoInfo(
                        $resultado['id'],
                        $resultado['comentario'],
                        $resultado['lugar'],
                        $resultado['telefono'],
                        $resultado['email'],
                        $resultado['horario'],
                        $resultado['mensaje']);
                }

            }catch(PDOException $ex) {
                print 'Error:'  . $ex->getMessage();
            }
        }
        return $contacto_info;
    }

}
